<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FedaPayService;
use App\Models\Payment;

class PaymentController extends Controller
{
    protected $fedapay;
    
    public function __construct(FedaPayService $fedapay)
    {
        $this->fedapay = $fedapay;
    }
    
    /**
     * INITIATE PAYMENT - Version ULTRA RAPIDE
     * Temps cible : < 2 secondes
     */
    public function initiatePayment(Request $request)
    {
        // 1. Vérification EXPRESS (100ms)
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Non authentifié'
            ], 401);
        }
        
        $user = Auth::user();
        
        // 2. Validation EXPRESS (200ms)
        $data = $this->validateExpress($request);
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Données invalides'
            ], 422);
        }
        
        // 3. Vérifier accès existant (100ms)
        if ($this->hasAccess($user->id, $data)) {
            return response()->json([
                'success' => true,
                'has_access' => true,
                'message' => 'Accès déjà existant'
            ]);
        }
        
        // 4. Accès auto pour rôles spéciaux (50ms)
        if ($this->isAutoAccess($user)) {
            $payment = $this->createAutoPayment($user->id, $data);
            return response()->json([
                'success' => true,
                'has_access' => true,
                'payment_id' => $payment->id,
                'message' => 'Accès auto-granté'
            ]);
        }
        
        // 5. Créer paiement en attente IMMÉDIATEMENT (200ms)
        $payment = Payment::create([
            'user_id' => $user->id,
            'transaction_id' => 'temp_' . uniqid(),
            'content_type' => $data['type_contenu'],
            'content_id' => $data['id_contenu'],
            'amount' => $data['montant'],
            'status' => 'initializing',
            'metadata' => [
                'title' => $data['titre'] ?? null,
                'initiated_at' => now()->toDateTimeString(),
                'user_agent' => $request->userAgent(),
                'ip' => $request->ip(),
            ]
        ]);
        
        // 6. Répondre IMMÉDIATEMENT (sans attendre FedaPay)
        return response()->json([
            'success' => true,
            'payment_id' => $payment->id,
            'status' => 'processing',
            'check_url' => route('payment.check', ['id' => $payment->id]),
            'message' => 'Paiement en cours d\'initialisation'
        ]);
        
        // FedaPay sera appelé en arrière-plan (Job ou setTimeout côté client)
    }
    
    /**
     * API pour vérifier l'état du paiement
     */
    public function checkPayment($id)
    {
        $payment = Payment::find($id);
        
        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Paiement non trouvé'
            ], 404);
        }
        
        // Si toujours en initialisation, essayer FedaPay
        if ($payment->status === 'initializing') {
            $this->processWithFedaPay($payment);
        }
        
        return response()->json([
            'success' => true,
            'status' => $payment->status,
            'has_access' => $payment->status === 'completed',
            'payment_url' => $payment->metadata['payment_url'] ?? null,
            'updated_at' => $payment->updated_at->toDateTimeString()
        ]);
    }
    
    /**
     * Traiter avec FedaPay (en arrière-plan)
     */
    private function processWithFedaPay($payment)
    {
        try {
            set_time_limit(15);
            
            // Préparer données FedaPay
            $fedapayData = [
                'description' => 'Accès contenu premium',
                'amount' => $payment->amount,
                'callback_url' => route('payment.callback'),
                'customer' => [
                    'firstname' => $payment->user->first_name ?? 'Client',
                    'lastname' => $payment->user->last_name ?? '',
                    'email' => $payment->user->email,
                ]
            ];
            
            // Appeler FedaPay
            $result = $this->fedapay->createTransaction($fedapayData);
            
            if ($result['success']) {
                $payment->update([
                    'transaction_id' => $result['transaction_id'],
                    'status' => 'pending',
                    'metadata' => array_merge($payment->metadata, [
                        'payment_url' => $result['payment_url'],
                        'fedapay_processed_at' => now()->toDateTimeString(),
                        'simulated' => $result['simulated'] ?? false
                    ])
                ]);
            } else {
                $payment->update([
                    'status' => 'failed',
                    'metadata' => array_merge($payment->metadata, [
                        'error' => $result['error'],
                        'failed_at' => now()->toDateTimeString()
                    ])
                ]);
            }
            
        } catch (\Exception $e) {
            $payment->update([
                'status' => 'failed',
                'metadata' => array_merge($payment->metadata, [
                    'exception' => $e->getMessage(),
                    'failed_at' => now()->toDateTimeString()
                ])
            ]);
        }
    }
    
    /**
     * Callback FedaPay - SIMPLIFIÉ
     */
    public function paymentCallback(Request $request)
    {
        $transactionId = $request->input('id') ?: $request->input('transaction_id');
        
        if (!$transactionId) {
            return redirect('/')->with('info', 'Aucun ID de transaction');
        }
        
        // Trouver le paiement
        $payment = Payment::where('transaction_id', $transactionId)->first();
        
        if ($payment) {
            // Marquer comme complété
            $payment->update([
                'status' => 'completed',
                'metadata' => array_merge($payment->metadata, [
                    'callback_received_at' => now()->toDateTimeString(),
                    'callback_data' => $request->all()
                ])
            ]);
            
            // Rediriger vers le contenu
            return redirect()->route('content.show', $payment->content_id)
                ->with('success', 'Paiement réussi !');
        }
        
        return redirect('/')->with('info', 'Merci pour votre paiement');
    }
    
    /**
     * Vérifier accès - ULTRA RAPIDE
     */
    public function checkAccess(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['has_access' => false]);
        }
        
        $user = Auth::user();
        
        // Accès auto pour admin/auteur
        if ($this->isAutoAccess($user)) {
            return response()->json(['has_access' => true]);
        }
        
        // Vérification en base
        $hasAccess = Payment::where('user_id', $user->id)
            ->where('content_type', $request->type_contenu)
            ->where('content_id', $request->id_contenu)
            ->where('status', 'completed')
            ->exists();
            
        return response()->json(['has_access' => $hasAccess]);
    }
    
    // ========== MÉTHODES PRIVÉES ==========
    
    private function validateExpress(Request $request)
    {
        try {
            return [
                'type_contenu' => $request->input('type_contenu', 'premium'),
                'id_contenu' => intval($request->input('id_contenu', 0)),
                'montant' => floatval($request->input('montant', 500)),
                'titre' => substr($request->input('titre', ''), 0, 100)
            ];
        } catch (\Exception $e) {
            return false;
        }
    }
    
    private function hasAccess($userId, $data)
    {
        return Payment::where('user_id', $userId)
            ->where('content_type', $data['type_contenu'])
            ->where('content_id', $data['id_contenu'])
            ->where('status', 'completed')
            ->exists();
    }
    
    private function isAutoAccess($user)
    {
        $roleName = strtolower($user->role->name ?? '');
        return in_array($roleName, ['admin', 'author', 'éditeur', 'moderator']);
    }
    
    private function createAutoPayment($userId, $data)
    {
        return Payment::create([
            'user_id' => $userId,
            'transaction_id' => 'auto_' . uniqid(),
            'content_type' => $data['type_contenu'],
            'content_id' => $data['id_contenu'],
            'amount' => $data['montant'],
            'status' => 'completed',
            'metadata' => [
                'title' => $data['titre'] ?? null,
                'auto_granted' => true,
                'granted_at' => now()->toDateTimeString()
            ]
        ]);
    }
}