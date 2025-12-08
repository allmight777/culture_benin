<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Culture Bénin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .checkbox-custom {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            border: 2px solid #d1d5db;
            transition: all 0.2s ease;
        }
        
        input[type="checkbox"]:checked + .checkbox-custom {
            background-color: #008751;
            border-color: #008751;
        }
        
        input[type="checkbox"]:checked + .checkbox-custom::after {
            content: '✓';
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 font-['Poppins']">
    <!-- Contenu principal -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <!-- Bouton retour -->
        <a href="{{ route('accueil') }}" class="absolute top-6 left-6 text-gray-600 hover:text-green-600 transition-colors duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Retour à l'accueil
        </a>

        <div class="max-w-lg w-full">
            <!-- Logo et en-tête -->
            <div class="text-center mb-10">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg border border-gray-100">
                        <i class="fas fa-monument text-3xl text-green-600"></i>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Culture<span class="text-green-600">Bénin</span></h1>
                <p class="text-gray-600">Accédez à votre espace personnel</p>
            </div>

            <!-- Carte de connexion -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Se connecter</h2>
                    <p class="text-gray-600">Accédez à votre compte pour continuer</p>
                </div>

                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 p-3 rounded">
                        <ul class="list-disc pl-5 mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 p-3 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="space-y-5" action="{{ route('login.perform') }}" method="POST">
                    @csrf
                    
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-gray-400"></i>Adresse email
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            autocomplete="email" 
                            required 
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-800 placeholder-gray-400"
                            placeholder="votre@email.com"
                            value="{{ old('email') }}">
                    </div>

                    <!-- Mot de passe -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock mr-2 text-gray-400"></i>Mot de passe
                        </label>
                        <div class="relative">
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                autocomplete="current-password" 
                                required 
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-800 placeholder-gray-400 pr-12"
                                placeholder="Votre mot de passe">
                            <button type="button" onclick="togglePassword('password')" 
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex items-center h-5 relative">
                                <input 
                                    id="remember" 
                                    name="remember" 
                                    type="checkbox" 
                                    class="sr-only">
                                <div class="checkbox-custom flex items-center justify-center cursor-pointer"></div>
                            </div>
                            <label for="remember" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                                Se souvenir de moi
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-green-600 hover:text-green-700 transition-colors duration-300">
                                Mot de passe oublié ?
                            </a>
                        </div>
                    </div>

                    <!-- Bouton de connexion -->
                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full py-3 px-6 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition-all duration-300 flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-3"></i>
                            Se connecter
                        </button>
                    </div>
                </form>

                <!-- Séparateur -->
                <div class="flex items-center my-6">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-4 text-gray-400 text-sm">Ou continuer avec</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <!-- Boutons de connexion sociale -->
                <div class="grid grid-cols-2 gap-3 mb-6">
                    <button type="button" 
                            class="py-2.5 px-4 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300 flex items-center justify-center">
                        <i class="fab fa-google text-red-500 mr-2"></i>
                        <span class="text-gray-700 text-sm">Google</span>
                    </button>
                    <button type="button" 
                            class="py-2.5 px-4 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-300 flex items-center justify-center">
                        <i class="fab fa-facebook text-blue-600 mr-2"></i>
                        <span class="text-gray-700 text-sm">Facebook</span>
                    </button>
                </div>

                <!-- Lien d'inscription -->
                <div class="text-center pt-4 border-t border-gray-100">
                    <p class="text-gray-600 text-sm">
                        Pas encore de compte ? 
                        <a href="{{ route('register') }}" 
                           class="text-green-600 hover:text-green-700 font-medium inline-flex items-center transition-colors duration-300">
                            <i class="fas fa-user-plus mr-1"></i>S'inscrire
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer légal -->
            <div class="mt-6 text-center text-gray-500 text-xs">
                <p>© 2024 Culture Bénin. Tous droits réservés.</p>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById('togglePasswordIcon');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                field.type = 'password';
                icon.className = 'fas fa-eye';
            }
        }

        // Checkbox custom
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const customCheckbox = this.nextElementSibling;
                    if (this.checked) {
                        customCheckbox.style.backgroundColor = '#008751';
                        customCheckbox.style.borderColor = '#008751';
                    } else {
                        customCheckbox.style.backgroundColor = '';
                        customCheckbox.style.borderColor = '#d1d5db';
                    }
                });
            });
        });
    </script>
</body>
</html>