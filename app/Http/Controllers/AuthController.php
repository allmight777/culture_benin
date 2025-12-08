<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire d'inscription
     */
    public function showRegisterForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    /**
     * Traite le formulaire d'inscription
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'mot_de_passe' => 'required|string|min:6|confirmed',
        ]);

        // Par défaut on assigne un rôle 'lecteur' (ou 'user' si tu préfères)
        // Si ta table utilise id_role au lieu d'une colonne role, adapte ici.
        $defaultRole = Role::where('nom', 'lecteur')->orWhere('slug', 'lecteur')->first();

        $userData = [
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'mot_de_passe' => Hash::make($validated['mot_de_passe']),
            'date_inscription' => now(),
        ];

        // si tu as une colonne id_role
        if ($defaultRole) {
            $userData['id_role'] = $defaultRole->id;
        } else {
            // fallback : si ta table possède une colonne 'role' en string
            $userData['role'] = 'lecteur';
        }

        $user = Utilisateur::create($userData);

        Auth::login($user);

        // Mettre infos en session utiles pour UI / paiement
        session([
            'user_role' => $this->resolveRoleName($user),
            'can_access_premium' => $this->canAccessPremium($user),
        ]);

        return redirect()->route('accueil')->with('success', 'Inscription réussie !');
    }

    /**
     * Affiche le formulaire de connexion
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Traite la connexion et redirige selon rôle
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Utilisateur::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->mot_de_passe)) {
            return back()->withErrors(['email' => 'Ces identifiants ne correspondent pas'])->onlyInput('email');
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        // Résolution robuste du nom du rôle
        $roleName = $this->resolveRoleName($user);
        $roleKey = strtolower(trim($roleName));

        // Mettre les infos utiles en session (pour UI / paiement)
        session([
            'user_role' => $roleName,
            'can_access_premium' => $this->canAccessPremium($user),
        ]);

        // Redirections selon rôle
        if ($roleKey === 'administrateur' || $roleKey === 'admin') {
            return redirect()->route('dashboard');
        }

        if ($roleKey === 'moderateur' || $roleKey === 'moderator' || $roleKey === 'modérateur') {
            // modérateur -> dashboard admin (ou autre route)
            return redirect()->route('dashboard');
        }

        if ($roleKey === 'traducteur' || $roleKey === 'translator') {
            // traducteur -> accès backoffice de traduction ou dashboard
            return redirect()->route('dashboard');
        }

         if ($roleKey === 'editeur' || $roleKey === 'editor') {
            // traducteur -> accès backoffice de traduction ou dashboard
            return redirect()->route('editeur.dashboard');
        }

        if ($roleKey === 'lecteur' || $roleKey === 'reader' || $roleKey === 'user') {
            // lecteur -> page d'accueil; il pourra initier un paiement via Fedapay pour premium
            return redirect()->route('accueil')->with('success', 'Connexion réussie. Vous pouvez accéder aux contenus gratuits et effectuer un paiement pour les contenus premium.');
        }

        // default fallback
        return redirect()->route('accueil');
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('accueil');
    }

    /**
     * Résout le nom de rôle de façon robuste depuis l'utilisateur
     */
    protected function resolveRoleName(Utilisateur $user): string
    {
        // 1) relation role existante
        if (isset($user->role) && is_object($user->role) && isset($user->role->nom)) {
            return $user->role->nom;
        }

        // 2) s'il y a une colonne 'role' (string)
        if (!empty($user->role) && is_string($user->role)) {
            return $user->role;
        }

        // 3) s'il y a id_role, essayer de récupérer le modèle Role
        if (!empty($user->id_role)) {
            $r = Role::find($user->id_role);
            if ($r) return $r->nom ?? ($r->name ?? '');
        }

        // 4) pas trouvé -> return vide
        return '';
    }

    /**
     * Détermine si l'utilisateur a le droit d'accéder au contenu premium (au minimum 'lecteur')
     */
    protected function canAccessPremium(Utilisateur $user): bool
    {
        $roleName = strtolower(trim($this->resolveRoleName($user)));

        // Roles autorisés à accéder/payer les contenus premium
        $allowed = [
            'lecteur', 'reader', 'user',
            'moderateur', 'moderator',
            'administrateur', 'admin',
            'traducteur', 'translator',
            'editeur', 'editor', 'user'
        ];

        return in_array($roleName, $allowed, true);
    }
}
