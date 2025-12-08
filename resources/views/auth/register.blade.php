<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | Culture Bénin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .password-strength {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        .strength-weak { background: #ef4444; width: 25%; }
        .strength-medium { background: #f59e0b; width: 50%; }
        .strength-good { background: #10b981; width: 75%; }
        .strength-strong { background: #008751; width: 100%; }
        
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
                <p class="text-gray-600">Rejoignez notre communauté culturelle</p>
            </div>

            <!-- Carte d'inscription -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Créer un compte</h2>
                    <p class="text-gray-600">Commencez votre voyage culturel dès aujourd'hui</p>
                </div>

<form method="POST" action="{{ route('register.perform') }}" class="space-y-5">
    @csrf

    <!-- Prénom et Nom -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-user mr-2 text-gray-400"></i>Prénom
            </label>
            <input id="prenom" name="prenom" type="text" 
                   class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-800 placeholder-gray-400"
                   placeholder="Votre prénom"
                   required 
                   value="{{ old('prenom') }}" />
            @error('prenom') 
                <p class="text-red-500 text-sm mt-2 flex items-center">
                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-user-tag mr-2 text-gray-400"></i>Nom
            </label>
            <input id="nom" name="nom" type="text" 
                   class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-800 placeholder-gray-400"
                   placeholder="Votre nom"
                   required 
                   value="{{ old('nom') }}" />
            @error('nom') 
                <p class="text-red-500 text-sm mt-2 flex items-center">
                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    <!-- Email -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-envelope mr-2 text-gray-400"></i>Adresse email
        </label>
        <input id="email" name="email" type="email" 
               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-800 placeholder-gray-400"
               placeholder="votre@email.com"
               required 
               value="{{ old('email') }}" />
        @error('email') 
            <p class="text-red-500 text-sm mt-2 flex items-center">
                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Mot de passe -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-lock mr-2 text-gray-400"></i>Mot de passe
        </label>
        <div class="relative">
            <input id="mot_de_passe" name="mot_de_passe" type="password" 
                   class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-800 placeholder-gray-400 pr-12"
                   placeholder="Votre mot de passe"
                   required />
            <button type="button" onclick="togglePassword('mot_de_passe')" 
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                <i class="fas fa-eye" id="toggleMotDePasseIcon"></i>
            </button>
        </div>

        <!-- Indicateur de force du mot de passe -->
        <div class="mt-3">
            <div class="flex justify-between text-sm text-gray-500 mb-1">
                <span>Force du mot de passe :</span>
                <span id="strengthText" class="font-medium">Faible</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div id="strengthBar" class="password-strength strength-weak rounded-full"></div>
            </div>
        </div>

        @error('mot_de_passe') 
            <p class="text-red-500 text-sm mt-2 flex items-center">
                <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Confirmation du mot de passe -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-lock mr-2 text-gray-400"></i>Confirmer le mot de passe
        </label>
        <div class="relative">
            <input id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" type="password" 
                   class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 text-gray-800 placeholder-gray-400 pr-12"
                   placeholder="Confirmez votre mot de passe"
                   required />
            <button type="button" onclick="togglePassword('mot_de_passe_confirmation')" 
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                <i class="fas fa-eye" id="toggleMotDePasseConfirmIcon"></i>
            </button>
        </div>
        <div id="passwordMatch" class="text-sm mt-2 hidden">
            <i class="fas fa-check-circle text-green-500 mr-1"></i>
            <span class="text-green-600">Les mots de passe correspondent</span>
        </div>
        <div id="passwordMismatch" class="text-sm mt-2 hidden">
            <i class="fas fa-times-circle text-red-500 mr-1"></i>
            <span class="text-red-600">Les mots de passe ne correspondent pas</span>
        </div>
    </div>

    <div>
        <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Rôle</label>
        <select id="role" name="role" class="w-full px-4 py-3 border rounded-lg">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->nom }}</option>
            @endforeach
        </select>
    </div>


    <!-- Bouton d'inscription -->
    <div class="pt-4">
        <button type="submit" 
                class="w-full py-3 px-6 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition-all duration-300 flex items-center justify-center">
            <i class="fas fa-user-plus mr-3"></i>
            Créer mon compte
        </button>
    </div>
</form>

<script>
    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const iconId = fieldId === 'mot_de_passe' ? 'toggleMotDePasseIcon' : 'toggleMotDePasseConfirmIcon';
        const icon = document.getElementById(iconId);
        
        if (field.type === 'password') {
            field.type = 'text';
            if (icon) icon.className = 'fas fa-eye-slash';
        } else {
            field.type = 'password';
            if (icon) icon.className = 'fas fa-eye';
        }
    }

    // Check password strength and match
    document.getElementById('mot_de_passe').addEventListener('input', function(e) {
        const password = e.target.value;
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');
        
        let strength = 0;
        if (password.length >= 8) strength++;
        if (/[A-Z]/.test(password) && /[a-z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;
        
        strengthBar.className = 'password-strength rounded-full';
        if (strength === 0) {
            strengthBar.classList.add('strength-weak');
            strengthText.textContent = 'Faible';
            strengthText.className = 'font-medium text-red-500';
        } else if (strength <= 2) {
            strengthBar.classList.add('strength-medium');
            strengthText.textContent = 'Moyen';
            strengthText.className = 'font-medium text-yellow-500';
        } else if (strength === 3) {
            strengthBar.classList.add('strength-good');
            strengthText.textContent = 'Bon';
            strengthText.className = 'font-medium text-green-500';
        } else {
            strengthBar.classList.add('strength-strong');
            strengthText.textContent = 'Fort';
            strengthText.className = 'font-medium text-green-600';
        }

        checkPasswordMatch();
    });

    function checkPasswordMatch() {
        const password = document.getElementById('mot_de_passe').value;
        const confirm = document.getElementById('mot_de_passe_confirmation').value;
        const matchDiv = document.getElementById('passwordMatch');
        const mismatchDiv = document.getElementById('passwordMismatch');

        if (!confirm) {
            matchDiv.classList.add('hidden');
            mismatchDiv.classList.add('hidden');
            return;
        }

        if (password === confirm) {
            matchDiv.classList.remove('hidden');
            mismatchDiv.classList.add('hidden');
        } else {
            matchDiv.classList.add('hidden');
            mismatchDiv.classList.remove('hidden');
        }
    }

    document.getElementById('mot_de_passe_confirmation').addEventListener('input', checkPasswordMatch);

    document.querySelector('form').addEventListener('submit', function(e) {
        const password = document.getElementById('mot_de_passe').value;
        const confirm = document.getElementById('mot_de_passe_confirmation').value;
        
        if (password !== confirm) {
            e.preventDefault();
            alert('Les mots de passe ne correspondent pas.');
        }
    });
</script>
</body>
</html>