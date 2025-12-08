<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - Culture Bénin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #008751;
            --primary-dark: #006b40;
            --secondary: #fcd116;
            --accent: #e4002b;
            --light: #f9f9f9;
            --dark: #333333;
            --success: #10b981;
            --warning: #f59e0b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
        }

        .ticket-border {
            position: relative;
            border: 2px dashed #e2e8f0;
            padding: 20px;
            border-radius: 12px;
        }

        .ticket-border::before {
            content: '';
            position: absolute;
            top: -6px;
            left: -6px;
            right: -6px;
            bottom: -6px;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            z-index: -1;
        }

        .payment-step {
            transition: all 0.3s ease;
        }

        .payment-step.active {
            border-color: var(--primary);
            background-color: rgba(0, 135, 81, 0.05);
        }

        .payment-step.completed {
            border-color: var(--success);
            background-color: rgba(16, 185, 129, 0.05);
        }

        .ticket-perforation {
            background: repeating-linear-gradient(
                to right,
                transparent,
                transparent 10px,
                #e2e8f0 10px,
                #e2e8f0 20px
            );
            height: 2px;
            margin: 0 -20px;
        }

        .receipt-shadow {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 
                        inset 0 0 0 1px rgba(255, 255, 255, 0.8);
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 135, 81, 0.3);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 135, 81, 0.4);
        }

        .qr-code {
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        .method-card {
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
        }

        .method-card:hover {
            transform: translateY(-3px);
            border-color: var(--primary);
        }

        .method-card.selected {
            border-color: var(--primary);
            background-color: rgba(0, 135, 81, 0.05);
            box-shadow: 0 4px 15px rgba(0, 135, 81, 0.1);
        }

        .success-animation {
            animation: successPulse 2s ease infinite;
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .print-area {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        @media print {
            .no-print {
                display: none !important;
            }
            .print-area {
                box-shadow: none;
                padding: 0;
            }
            body {
                background: white !important;
            }
        }
    </style>
</head>
<body class="py-8 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <header class="mb-10 text-center">
            <div class="flex items-center justify-center mb-6">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#008751] to-[#006b40] flex items-center justify-center mr-3">
                    <i class="fas fa-ticket-alt text-white text-xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">Paiement Culture Bénin</h1>
            </div>
            <p class="text-gray-600 max-w-2xl mx-auto">Accédez aux contenus premium de la culture béninoise en quelques clics. Téléchargez votre reçu après paiement.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonne de gauche : Contenu du ticket et étapes -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Ticket du contenu -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-[#008751] to-[#006b40] p-6 text-white">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="text-2xl font-bold">Ticket d'accès premium</h2>
                                <p class="text-green-100 mt-1">Accès illimité au contenu sélectionné</p>
                            </div>
                            <div class="bg-white/20 p-3 rounded-full">
                                <i class="fas fa-crown text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="ticket-border">
                            <!-- Détails du contenu -->
                            <div class="flex flex-col md:flex-row gap-6">
                                <div class="md:w-1/3">
                                    <img src="{{ asset('adminlte/img/vodonday.jpg') }}" 
                                         alt="Festival Ouidah" 
                                         class="w-full h-48 object-cover rounded-lg shadow-md">
                                    <div class="mt-4 text-center">
                                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold">
                                            <i class="fas fa-star mr-1"></i> PREMIUM
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="md:w-2/3">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2" id="contentTitle">
                                        Festival International Ouidah 2024
                                    </h3>
                                    <p class="text-gray-600 mb-4">
                                        Célébration annuelle de la culture vodoun avec des cérémonies, danses et rituels traditionnels. 
                                        Accès exclusif aux photos, vidéos et interviews des participants.
                                    </p>
                                    
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                                <i class="fas fa-calendar text-green-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">Validité</p>
                                                <p class="font-semibold">30 jours</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                                <i class="fas fa-clock text-blue-600"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">Contenu</p>
                                                <p class="font-semibold">Article + Vidéo</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="text-sm text-gray-500">Prix original</p>
                                                <p class="text-lg font-bold text-gray-800">1 000 FCFA</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm text-green-600 font-semibold">Promotion -50%</p>
                                                <p class="text-2xl font-bold text-[#008751]" id="ticketPrice">500 FCFA</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Perforation du ticket -->
                            <div class="ticket-perforation my-6"></div>
                            
                            <!-- Informations additionnelles -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <i class="fas fa-download text-[#008751] text-lg mb-2"></i>
                                    <p class="text-sm font-medium">Téléchargement</p>
                                    <p class="text-xs text-gray-500">PDF + Images</p>
                                </div>
                                
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <i class="fas fa-video text-[#008751] text-lg mb-2"></i>
                                    <p class="text-sm font-medium">Vidéo HD</p>
                                    <p class="text-xs text-gray-500">1080p disponible</p>
                                </div>
                                
                                <div class="text-center p-3 bg-gray-50 rounded-lg">
                                    <i class="fas fa-headphones text-[#008751] text-lg mb-2"></i>
                                    <p class="text-sm font-medium">Audio</p>
                                    <p class="text-xs text-gray-500">Podcast inclus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Étapes du paiement -->
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-wallet mr-3 text-[#008751]"></i>
                        Étapes du paiement
                    </h3>
                    
                    <div class="space-y-4">
                        <!-- Étape 1 -->
                        <div class="payment-step p-4 border-2 border-gray-200 rounded-xl active" id="step1">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-[#008751] text-white flex items-center justify-center mr-4 font-bold">
                                    1
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">Sélectionnez votre méthode de paiement</h4>
                                    <p class="text-sm text-gray-600">Choisissez comment vous souhaitez payer</p>
                                </div>
                                <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            </div>
                        </div>
                        
                        <!-- Étape 2 -->
                        <div class="payment-step p-4 border-2 border-gray-200 rounded-xl" id="step2">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center mr-4 font-bold">
                                    2
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">Confirmez et payez</h4>
                                    <p class="text-sm text-gray-600">Vérifiez les détails et procédez au paiement</p>
                                </div>
                                <i class="fas fa-arrow-right text-gray-400 text-xl"></i>
                            </div>
                        </div>
                        
                        <!-- Étape 3 -->
                        <div class="payment-step p-4 border-2 border-gray-200 rounded-xl" id="step3">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center mr-4 font-bold">
                                    3
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">Téléchargez votre reçu</h4>
                                    <p class="text-sm text-gray-600">Recevez votre ticket et facture</p>
                                </div>
                                <i class="fas fa-receipt text-gray-400 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section de paiement (Étape 2) -->
                <div class="bg-white rounded-2xl shadow-xl p-6" id="paymentSection">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-credit-card mr-3 text-[#008751]"></i>
                        Méthodes de paiement
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <!-- Mobile Money -->
                        <div class="method-card p-4 rounded-xl cursor-pointer selected" data-method="mobile_money">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-mobile-alt text-orange-600 text-lg"></i>
                                </div>
                                <h4 class="font-semibold text-gray-800">Mobile Money</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Payer avec votre téléphone mobile</p>
                            <div class="flex items-center text-green-600 text-sm">
                                <i class="fas fa-bolt mr-1"></i>
                                <span>Transaction instantanée</span>
                            </div>
                        </div>
                        
                        <!-- Carte Bancaire -->
                        <div class="method-card p-4 rounded-xl cursor-pointer" data-method="card">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-credit-card text-blue-600 text-lg"></i>
                                </div>
                                <h4 class="font-semibold text-gray-800">Carte Bancaire</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Visa, Mastercard, etc.</p>
                            <div class="flex items-center text-green-600 text-sm">
                                <i class="fas fa-shield-alt mr-1"></i>
                                <span>Sécurisé SSL</span>
                            </div>
                        </div>
                        
                        <!-- Virement Bancaire -->
                        <div class="method-card p-4 rounded-xl cursor-pointer" data-method="transfer">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-university text-purple-600 text-lg"></i>
                                </div>
                                <h4 class="font-semibold text-gray-800">Virement Bancaire</h4>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Transfert direct vers notre compte</p>
                            <div class="flex items-center text-yellow-600 text-sm">
                                <i class="fas fa-clock mr-1"></i>
                                <span>24-48 heures</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Formulaire de paiement (Mobile Money) -->
                    <div id="mobileMoneyForm" class="payment-form">
                        <h4 class="font-bold text-gray-700 mb-4">Détails du paiement Mobile Money</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Opérateur</label>
                                <div class="grid grid-cols-3 gap-3">
                                    <button class="operator-btn p-3 border rounded-lg text-center hover:border-[#008751] hover:bg-green-50" data-operator="mtn">
                                        <div class="w-8 h-8 bg-yellow-500 rounded-full mx-auto mb-2"></div>
                                        <span class="text-sm font-medium">MTN</span>
                                    </button>
                                    <button class="operator-btn p-3 border rounded-lg text-center hover:border-[#008751] hover:bg-green-50" data-operator="moov">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full mx-auto mb-2"></div>
                                        <span class="text-sm font-medium">Moov</span>
                                    </button>
                                    <button class="operator-btn p-3 border rounded-lg text-center hover:border-[#008751] hover:bg-green-50" data-operator="flooz">
                                        <div class="w-8 h-8 bg-green-500 rounded-full mx-auto mb-2"></div>
                                        <span class="text-sm font-medium">Flooz</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de téléphone</label>
                                <div class="flex">
                                    <div class="flex items-center px-3 bg-gray-100 rounded-l-lg border border-r-0 border-gray-300">
                                        <span class="text-gray-600">+229</span>
                                    </div>
                                    <input type="tel" 
                                           class="flex-1 border border-gray-300 rounded-r-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#008751] focus:border-transparent"
                                           placeholder="XX XX XX XX"
                                           id="phoneNumber">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Code de confirmation</label>
                                <input type="text" 
                                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#008751] focus:border-transparent"
                                       placeholder="Entrez le code reçu par SMS"
                                       id="confirmationCode">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Formulaire de paiement (Carte) -->
                    <div id="cardForm" class="payment-form hidden">
                        <!-- Formulaire pour carte bancaire -->
                        <h4 class="font-bold text-gray-700 mb-4">Informations de la carte</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de carte</label>
                                <div class="flex items-center border border-gray-300 rounded-lg px-4 py-3 focus-within:ring-2 focus-within:ring-[#008751] focus-within:border-transparent">
                                    <input type="text" 
                                           class="flex-1 outline-none"
                                           placeholder="1234 5678 9012 3456"
                                           id="cardNumber">
                                    <i class="fas fa-credit-card text-gray-400 ml-2"></i>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Date d'expiration</label>
                                    <input type="text" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#008751] focus:border-transparent"
                                           placeholder="MM/AA"
                                           id="cardExpiry">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                                    <input type="text" 
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#008751] focus:border-transparent"
                                           placeholder="123"
                                           id="cardCvv">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Formulaire de paiement (Virement) -->
                    <div id="transferForm" class="payment-form hidden">
                        <h4 class="font-bold text-gray-700 mb-4">Détails du virement bancaire</h4>
                        <div class="bg-gray-50 p-4 rounded-lg mb-4">
                            <p class="text-sm text-gray-700 mb-2">Veuillez effectuer le virement aux coordonnées suivantes :</p>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Banque :</span>
                                    <span class="font-semibold">BOA Bénin</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">IBAN :</span>
                                    <span class="font-semibold">BJ06 1234 5678 9012 3456 7890 12</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">BIC :</span>
                                    <span class="font-semibold">BOABBJXXX</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Bénéficiaire :</span>
                                    <span class="font-semibold">Culture Bénin</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Montant :</span>
                                    <span class="font-bold text-[#008751]">500 FCFA</span>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Référence du virement</label>
                            <input type="text" 
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#008751] focus:border-transparent"
                                   placeholder="Entrez la référence de votre virement"
                                   id="transferRef">
                            <p class="text-xs text-gray-500 mt-2">Cette référence sera utilisée pour valider votre paiement</p>
                        </div>
                    </div>
                    
                    <!-- QR Code pour paiement mobile -->
                    <div class="mt-8 p-4 bg-gray-50 rounded-lg text-center">
                        <h4 class="font-bold text-gray-700 mb-4">Paiement par QR Code</h4>
                        <div class="qr-code inline-block">
                            <div class="w-48 h-48 bg-gray-300 mb-4 flex items-center justify-center">
                                <!-- Placeholder pour QR code -->
                                <div class="text-center">
                                    <i class="fas fa-qrcode text-4xl text-gray-500 mb-2"></i>
                                    <p class="text-sm text-gray-600">Scanner pour payer</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Scannez ce QR code avec votre application mobile money</p>
                        </div>
                    </div>
                    
                    <!-- Bouton de paiement -->
                    <div class="mt-8">
                        <button id="payButton" class="w-full btn-gradient text-white font-bold py-4 px-6 rounded-lg text-lg flex items-center justify-center">
                            <i class="fas fa-lock mr-3"></i>
                            Payer maintenant 500 FCFA
                        </button>
                        <p class="text-center text-gray-500 text-sm mt-3">
                            <i class="fas fa-shield-alt mr-1"></i>
                            Paiement sécurisé - Vos données sont protégées
                        </p>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite : Résumé et reçu -->
            <div class="space-y-8">
                <!-- Résumé du paiement -->
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-file-invoice-dollar mr-3 text-[#008751]"></i>
                        Résumé
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Contenu premium</span>
                            <span class="font-semibold">Festival Ouidah 2024</span>
                        </div>
                        
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Prix original</span>
                            <span class="font-semibold">1 000 FCFA</span>
                        </div>
                        
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Réduction</span>
                            <span class="font-semibold text-green-600">-50%</span>
                        </div>
                        
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Frais de service</span>
                            <span class="font-semibold">0 FCFA</span>
                        </div>
                        
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">TVA (18%)</span>
                            <span class="font-semibold">90 FCFA</span>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-300">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-gray-800">Total à payer</span>
                                <span class="text-2xl font-bold text-[#008751]" id="totalAmount">500 FCFA</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-3"></i>
                            <p class="text-sm text-blue-700">
                                Vous aurez accès au contenu immédiatement après le paiement réussi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Reçu / Ticket final (masqué initialement) -->
                <div id="receiptSection" class="bg-white rounded-2xl shadow-xl p-6 hidden">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-4 success-animation">
                            <i class="fas fa-check text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Paiement réussi !</h3>
                        <p class="text-gray-600">Votre accès premium est activé</p>
                    </div>
                    
                    <div class="print-area">
                        <div class="text-center mb-6">
                            <h4 class="font-bold text-lg text-gray-800 mb-2">Reçu de paiement</h4>
                            <div class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold mb-4">
                                <i class="fas fa-check-circle mr-1"></i> Validé
                            </div>
                        </div>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center pb-2 border-b">
                                <span class="text-gray-600">Référence :</span>
                                <span class="font-mono font-bold text-gray-800" id="receiptRef">CB-2024-001234</span>
                            </div>
                            
                            <div class="flex justify-between items-center pb-2 border-b">
                                <span class="text-gray-600">Date :</span>
                                <span class="font-semibold" id="receiptDate">15 mars 2024, 14:30</span>
                            </div>
                            
                            <div class="flex justify-between items-center pb-2 border-b">
                                <span class="text-gray-600">Méthode :</span>
                                <span class="font-semibold" id="receiptMethod">Mobile Money (MTN)</span>
                            </div>
                            
                            <div class="flex justify-between items-center pb-2 border-b">
                                <span class="text-gray-600">Contenu :</span>
                                <span class="font-semibold text-right" id="receiptContent">Festival Ouidah 2024</span>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Montant :</span>
                                <span class="text-xl font-bold text-[#008751]" id="receiptAmount">500 FCFA</span>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <p class="text-sm text-gray-700 mb-3">
                                <i class="fas fa-key mr-2 text-[#008751]"></i>
                                <strong>Clé d'accès :</strong>
                            </p>
                            <div class="bg-white p-3 rounded border border-gray-300">
                                <p class="font-mono text-center text-lg font-bold tracking-wider text-gray-800" id="accessKey">
                                    CB-VID-2024-OUIDAH-5A9B2C
                                </p>
                            </div>
                            <p class="text-xs text-gray-500 mt-2 text-center">Utilisez ce code pour accéder au contenu</p>
                        </div>
                        
                        <div class="text-center">
                            <p class="text-sm text-gray-600 mb-4">
                                Ce reçu fait office de justificatif de paiement.<br>
                                Conservez-le pour toute réclamation.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                                <button id="downloadReceiptBtn" class="px-4 py-3 bg-[#008751] text-white rounded-lg font-semibold hover:bg-[#006b40] transition-colors flex items-center justify-center">
                                    <i class="fas fa-download mr-2"></i>
                                    Télécharger le reçu
                                </button>
                                <button id="printReceiptBtn" class="px-4 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center">
                                    <i class="fas fa-print mr-2"></i>
                                    Imprimer
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 text-center">
                        <a href="#" class="inline-flex items-center text-[#008751] font-semibold hover:underline">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Accéder au contenu maintenant
                        </a>
                    </div>
                </div>

                <!-- Informations de support -->
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-headset mr-3 text-[#008751]"></i>
                        Besoin d'aide ?
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-phone text-blue-500 mr-3"></i>
                            <div>
                                <p class="text-sm font-medium text-blue-800">Support téléphonique</p>
                                <p class="text-sm text-blue-600">+229 96 00 00 00</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <i class="fas fa-envelope text-green-500 mr-3"></i>
                            <div>
                                <p class="text-sm font-medium text-green-800">Email de support</p>
                                <p class="text-sm text-green-600">support@culturebenin.bj</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-3 bg-amber-50 rounded-lg">
                            <i class="fas fa-clock text-amber-500 mr-3"></i>
                            <div>
                                <p class="text-sm font-medium text-amber-800">Horaires d'ouverture</p>
                                <p class="text-sm text-amber-600">Lun-Ven: 8h-18h</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-700 mb-3">
                            <i class="fas fa-shield-alt text-[#008751] mr-2"></i>
                            <strong>Paiement 100% sécurisé</strong>
                        </p>
                        <div class="flex space-x-4">
                            <div class="w-10 h-6 bg-gray-300 rounded"></div>
                            <div class="w-10 h-6 bg-gray-300 rounded"></div>
                            <div class="w-10 h-6 bg-gray-300 rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-12 pt-8 border-t border-gray-200 text-center">
            <div class="flex justify-center space-x-6 mb-6">
                <a href="#" class="text-gray-500 hover:text-[#008751]">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-[#008751]">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-[#008751]">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-[#008751]">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            
            <p class="text-gray-600 text-sm">
                &copy; 2024 Culture Bénin. Tous droits réservés. 
                <a href="#" class="text-[#008751] hover:underline ml-2">Politique de confidentialité</a> | 
                <a href="#" class="text-[#008751] hover:underline">Conditions d'utilisation</a>
            </p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables
            let currentPaymentMethod = 'mobile_money';
            let currentOperator = null;
            let paymentCompleted = false;
            
            // Initialisation
            initializePaymentMethods();
            initializeOperators();
            initializePaymentButton();
            initializeReceiptButtons();
            
            // Initialiser les méthodes de paiement
            function initializePaymentMethods() {
                const methodCards = document.querySelectorAll('.method-card');
                
                methodCards.forEach(card => {
                    card.addEventListener('click', function() {
                        // Désélectionner toutes les cartes
                        methodCards.forEach(c => c.classList.remove('selected'));
                        
                        // Sélectionner la carte cliquée
                        this.classList.add('selected');
                        
                        // Mettre à jour la méthode de paiement
                        currentPaymentMethod = this.dataset.method;
                        
                        // Afficher le formulaire correspondant
                        showPaymentForm(currentPaymentMethod);
                    });
                });
            }
            
            // Initialiser les opérateurs Mobile Money
            function initializeOperators() {
                const operatorBtns = document.querySelectorAll('.operator-btn');
                
                operatorBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        // Désélectionner tous les boutons
                        operatorBtns.forEach(b => {
                            b.classList.remove('bg-green-50', 'border-[#008751]');
                        });
                        
                        // Sélectionner le bouton cliqué
                        this.classList.add('bg-green-50', 'border-[#008751]');
                        currentOperator = this.dataset.operator;
                    });
                });
            }
            
            // Afficher le formulaire de paiement correspondant
            function showPaymentForm(method) {
                // Masquer tous les formulaires
                document.querySelectorAll('.payment-form').forEach(form => {
                    form.classList.add('hidden');
                });
                
                // Afficher le formulaire correspondant
                document.getElementById(`${method}Form`).classList.remove('hidden');
                
                // Mettre à jour le texte du bouton de paiement
                const payButton = document.getElementById('payButton');
                const amount = document.getElementById('totalAmount').textContent;
                
                switch(method) {
                    case 'mobile_money':
                        payButton.innerHTML = `<i class="fas fa-mobile-alt mr-3"></i>Payer avec Mobile Money - ${amount}`;
                        break;
                    case 'card':
                        payButton.innerHTML = `<i class="fas fa-credit-card mr-3"></i>Payer par carte - ${amount}`;
                        break;
                    case 'transfer':
                        payButton.innerHTML = `<i class="fas fa-university mr-3"></i>Confirmer le virement - ${amount}`;
                        break;
                }
            }
            
            // Initialiser le bouton de paiement
            function initializePaymentButton() {
                const payButton = document.getElementById('payButton');
                
                payButton.addEventListener('click', function() {
                    if (paymentCompleted) return;
                    
                    // Validation
                    if (!validatePayment()) {
                        showError('Veuillez remplir tous les champs obligatoires');
                        return;
                    }
                    
                    // Simuler le processus de paiement
                    simulatePayment();
                });
            }
            
            // Valider le paiement
            function validatePayment() {
                switch(currentPaymentMethod) {
                    case 'mobile_money':
                        if (!currentOperator) {
                            showError('Veuillez sélectionner un opérateur');
                            return false;
                        }
                        if (!document.getElementById('phoneNumber').value.trim()) {
                            showError('Veuillez entrer votre numéro de téléphone');
                            return false;
                        }
                        if (!document.getElementById('confirmationCode').value.trim()) {
                            showError('Veuillez entrer le code de confirmation');
                            return false;
                        }
                        break;
                        
                    case 'card':
                        if (!document.getElementById('cardNumber').value.trim()) {
                            showError('Veuillez entrer le numéro de carte');
                            return false;
                        }
                        if (!document.getElementById('cardExpiry').value.trim()) {
                            showError('Veuillez entrer la date d\'expiration');
                            return false;
                        }
                        if (!document.getElementById('cardCvv').value.trim()) {
                            showError('Veuillez entrer le code CVV');
                            return false;
                        }
                        break;
                        
                    case 'transfer':
                        if (!document.getElementById('transferRef').value.trim()) {
                            showError('Veuillez entrer la référence du virement');
                            return false;
                        }
                        break;
                }
                
                return true;
            }
            
            // Simuler le paiement
            function simulatePayment() {
                const payButton = document.getElementById('payButton');
                
                // Désactiver le bouton
                payButton.disabled = true;
                payButton.innerHTML = `<i class="fas fa-spinner fa-spin mr-3"></i>Traitement en cours...`;
                
                // Mettre à jour l'étape 2
                updateStep(2, 'inProgress');
                
                // Simuler un délai de traitement
                setTimeout(() => {
                    // Simuler un paiement réussi
                    processPaymentSuccess();
                }, 3000);
            }
            
            // Traiter le succès du paiement
            function processPaymentSuccess() {
                // Mettre à jour les étapes
                updateStep(2, 'completed');
                updateStep(3, 'active');
                
                // Générer des informations de reçu
                generateReceiptInfo();
                
                // Afficher la section de reçu
                document.getElementById('receiptSection').classList.remove('hidden');
                document.getElementById('paymentSection').classList.add('hidden');
                
                // Marquer le paiement comme terminé
                paymentCompleted = true;
                
                // Défilement vers le reçu
                document.getElementById('receiptSection').scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
                
                // Afficher une notification de succès
                showSuccess('Paiement réussi ! Votre accès a été activé.');
            }
            
            // Mettre à jour l'état d'une étape
            function updateStep(stepNumber, status) {
                const step = document.getElementById(`step${stepNumber}`);
                const icon = step.querySelector('i');
                const numberDiv = step.querySelector('div:first-child');
                
                switch(status) {
                    case 'active':
                        step.classList.add('active');
                        step.classList.remove('completed');
                        numberDiv.className = 'w-8 h-8 rounded-full bg-[#008751] text-white flex items-center justify-center mr-4 font-bold';
                        icon.className = 'fas fa-arrow-right text-gray-400 text-xl';
                        break;
                        
                    case 'inProgress':
                        numberDiv.className = 'w-8 h-8 rounded-full bg-amber-500 text-white flex items-center justify-center mr-4 font-bold';
                        icon.className = 'fas fa-spinner fa-spin text-amber-500 text-xl';
                        break;
                        
                    case 'completed':
                        step.classList.add('completed');
                        step.classList.remove('active');
                        numberDiv.className = 'w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center mr-4 font-bold';
                        icon.className = 'fas fa-check-circle text-green-500 text-xl';
                        break;
                }
            }
            
            // Générer les informations du reçu
            function generateReceiptInfo() {
                // Générer une référence unique
                const ref = 'CB-' + new Date().getFullYear() + '-' + 
                          Math.random().toString(36).substring(2, 10).toUpperCase();
                document.getElementById('receiptRef').textContent = ref;
                
                // Date actuelle
                const now = new Date();
                const options = { 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                };
                document.getElementById('receiptDate').textContent = 
                    now.toLocaleDateString('fr-FR', options);
                
                // Méthode de paiement
                let methodText = '';
                switch(currentPaymentMethod) {
                    case 'mobile_money':
                        methodText = `Mobile Money (${currentOperator ? currentOperator.toUpperCase() : 'MTN'})`;
                        break;
                    case 'card':
                        methodText = 'Carte bancaire';
                        break;
                    case 'transfer':
                        methodText = 'Virement bancaire';
                        break;
                }
                document.getElementById('receiptMethod').textContent = methodText;
                
                // Contenu
                document.getElementById('receiptContent').textContent = 
                    document.getElementById('contentTitle').textContent;
                
                // Montant
                document.getElementById('receiptAmount').textContent = 
                    document.getElementById('totalAmount').textContent;
                
                // Clé d'accès
                const accessKey = 'CB-' + 
                                Math.random().toString(36).substring(2, 6).toUpperCase() + '-' +
                                Math.random().toString(36).substring(2, 6).toUpperCase() + '-' +
                                Math.random().toString(36).substring(2, 6).toUpperCase();
                document.getElementById('accessKey').textContent = accessKey;
            }
            
            // Initialiser les boutons du reçu
            function initializeReceiptButtons() {
                // Télécharger le reçu
                document.getElementById('downloadReceiptBtn').addEventListener('click', function() {
                    downloadReceipt();
                });
                
                // Imprimer le reçu
                document.getElementById('printReceiptBtn').addEventListener('click', function() {
                    printReceipt();
                });
            }
            
            // Télécharger le reçu
            function downloadReceipt() {
                // Simuler le téléchargement d'un PDF
                showSuccess('Téléchargement du reçu en cours...');
                
                // Dans une vraie application, on générerait un PDF ici
                setTimeout(() => {
                    showSuccess('Reçu téléchargé avec succès !');
                }, 1500);
            }
            
            // Imprimer le reçu
            function printReceipt() {
                window.print();
            }
            
            // Afficher une erreur
            function showError(message) {
                // Créer une notification d'erreur
                const errorDiv = document.createElement('div');
                errorDiv.className = 'fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg z-50 flex items-center';
                errorDiv.innerHTML = `
                    <i class="fas fa-exclamation-circle mr-3"></i>
                    <span>${message}</span>
                    <button class="ml-4 text-red-700 hover:text-red-900" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                document.body.appendChild(errorDiv);
                
                // Supprimer automatiquement après 5 secondes
                setTimeout(() => {
                    if (errorDiv.parentElement) {
                        errorDiv.remove();
                    }
                }, 5000);
            }
            
            // Afficher un succès
            function showSuccess(message) {
                // Créer une notification de succès
                const successDiv = document.createElement('div');
                successDiv.className = 'fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg z-50 flex items-center';
                successDiv.innerHTML = `
                    <i class="fas fa-check-circle mr-3"></i>
                    <span>${message}</span>
                    <button class="ml-4 text-green-700 hover:text-green-900" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                document.body.appendChild(successDiv);
                
                // Supprimer automatiquement après 5 secondes
                setTimeout(() => {
                    if (successDiv.parentElement) {
                        successDiv.remove();
                    }
                }, 5000);
            }
            
            // Formater le numéro de téléphone
            document.getElementById('phoneNumber').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 8) value = value.substring(0, 8);
                
                // Formater en groupes de 2 chiffres
                const formatted = value.match(/.{1,2}/g)?.join(' ') || '';
                e.target.value = formatted;
            });
            
            // Formater le numéro de carte
            document.getElementById('cardNumber').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 16) value = value.substring(0, 16);
                
                // Formater en groupes de 4 chiffres
                const formatted = value.match(/.{1,4}/g)?.join(' ') || '';
                e.target.value = formatted;
            });
            
            // Formater la date d'expiration
            document.getElementById('cardExpiry').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 4) value = value.substring(0, 4);
                
                // Formater en MM/AA
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2);
                }
                e.target.value = value;
            });
            
            // Limiter le CVV à 3 chiffres
            document.getElementById('cardCvv').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 3) value = value.substring(0, 3);
                e.target.value = value;
            });
        });
    </script>
</body>
</html>