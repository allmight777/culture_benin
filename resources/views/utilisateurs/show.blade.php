@extends('layout')

@section('title', 'Détails de l\'utilisateur')

@section('content')
<!-- Configuration Tailwind -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: {
                        50: '#f0f9ff',
                        100: '#e0f2fe',
                        500: '#0ea5e9',
                        600: '#0284c7',
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'system-ui', 'sans-serif'],
                }
            }
        }
    }
</script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-user text-primary-500 mr-3"></i>
                    Détails de l'utilisateur
                </h1>
                <p class="text-gray-600 mt-2">Informations complètes sur l'utilisateur</p>
            </div>
            <a href="{{ route('utilisateurs.index') }}" 
               class="flex items-center px-4 py-2 bg-white text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow-md">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour à la liste
            </a>
        </div>

        <!-- Grille principale avec les 3 cartes côte à côte -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <!-- Carte principale - Informations de l'utilisateur -->
            <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- En-tête de la carte -->
                <div class="bg-gradient-to-r from-primary-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-info-circle text-primary-500 mr-2"></i>
                            Informations de l'utilisateur
                        </h2>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800">
                                <i class="fas fa-hashtag mr-1"></i>
                                ID: {{ $utilisateur->id }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Corps de la carte -->
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Colonne gauche - Informations personnelles -->
                        <div class="space-y-6">
                            <!-- Photo et nom -->
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    @if($utilisateur->photo)
                                        <img class="h-20 w-20 rounded-full object-cover border-2 border-white shadow-lg" 
                                             src="{{ asset('adminlte/img/'.$utilisateur->photo) }}" 
                                             alt="{{ $utilisateur->prenom }}"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="h-20 w-20 rounded-full bg-gradient-to-r from-primary-500 to-primary-600 flex items-center justify-center text-white font-bold text-xl hidden">
                                            {{ substr($utilisateur->prenom, 0, 1) }}{{ substr($utilisateur->nom, 0, 1) }}
                                        </div>
                                    @else
                                        <div class="h-20 w-20 rounded-full bg-gradient-to-r from-primary-500 to-primary-600 flex items-center justify-center text-white font-bold text-xl shadow-lg">
                                            {{ substr($utilisateur->prenom, 0, 1) }}{{ substr($utilisateur->nom, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</h3>
                                    <p class="text-gray-600">{{ $utilisateur->email }}</p>
                                </div>
                            </div>

                            <!-- Informations personnelles -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide flex items-center">
                                    <i class="fas fa-user-circle text-gray-500 mr-2"></i>
                                    Informations personnelles
                                </h3>
                                
                                <!-- Email -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Email</label>
                                    <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                        <i class="fas fa-envelope text-primary-500 mr-3"></i>
                                        {{ $utilisateur->email }}
                                    </div>
                                </div>

                                <!-- Sexe -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Sexe</label>
                                    <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                        <i class="fas fa-{{ $utilisateur->sexe === 'M' ? 'male' : 'female' }} text-primary-500 mr-3"></i>
                                        {{ $utilisateur->sexe === 'M' ? 'Masculin' : ($utilisateur->sexe === 'F' ? 'Féminin' : 'Non spécifié') }}
                                    </div>
                                </div>

                                <!-- Date de naissance -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Date de naissance</label>
                                    <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                        <i class="fas fa-birthday-cake text-primary-500 mr-3"></i>
                                        @if($utilisateur->date_naissance)
                                            {{ \Carbon\Carbon::parse($utilisateur->date_naissance)->format('d/m/Y') }}
                                            ({{ \Carbon\Carbon::parse($utilisateur->date_naissance)->age }} ans)
                                        @else
                                            <span class="text-gray-500">—</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne droite - Informations du compte -->
                        <div class="space-y-6">
                            <!-- Statut et Rôle -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide flex items-center">
                                    <i class="fas fa-cog text-gray-500 mr-2"></i>
                                    Informations du compte
                                </h3>

                                <!-- Statut -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Statut</label>
                                    @php
                                        $statusConfig = [
                                            'Administrateur' => ['class' => 'bg-red-100 text-red-800 border-red-200', 'icon' => 'user-shield'],
                                            'Modérateur' => ['class' => 'bg-amber-100 text-amber-800 border-amber-200', 'icon' => 'user-check'],
                                            'Éditeur' => ['class' => 'bg-purple-100 text-purple-800 border-purple-200', 'icon' => 'user-edit'],
                                            'Utilisateur' => ['class' => 'bg-blue-100 text-blue-800 border-blue-200', 'icon' => 'user']
                                        ];
                                        $config = $statusConfig[$utilisateur->statut] ?? $statusConfig['Utilisateur'];
                                    @endphp
                                    <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold border {{ $config['class'] }}">
                                        <i class="fas fa-{{ $config['icon'] }} mr-2"></i>
                                        {{ $utilisateur->statut }}
                                    </div>
                                </div>

                                <!-- Rôle -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Rôle</label>
                                    @if($utilisateur->role)
                                        @php
                                            $roleConfig = [
                                                'Super Admin' => ['class' => 'bg-purple-100 text-purple-800 border-purple-200', 'icon' => 'star'],
                                                'Admin' => ['class' => 'bg-red-100 text-red-800 border-red-200', 'icon' => 'user-shield'],
                                                'Manager' => ['class' => 'bg-orange-100 text-orange-800 border-orange-200', 'icon' => 'user-tie'],
                                                'Editor' => ['class' => 'bg-blue-100 text-blue-800 border-blue-200', 'icon' => 'edit'],
                                                'User' => ['class' => 'bg-green-100 text-green-800 border-green-200', 'icon' => 'user'],
                                            ];
                                            $roleName = $utilisateur->role->nom;
                                            $roleConfig = $roleConfig[$roleName] ?? $roleConfig['User'];
                                        @endphp
                                        <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold border {{ $roleConfig['class'] }}">
                                            <i class="fas fa-{{ $roleConfig['icon'] }} mr-2"></i>
                                            {{ $roleName }}
                                        </div>
                                    @else
                                        <span class="text-gray-500 bg-gray-100 border border-gray-200 rounded-lg px-4 py-2">Aucun rôle</span>
                                    @endif
                                </div>

                                <!-- Langue -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Langue</label>
                                    <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                        <i class="fas fa-language text-primary-500 mr-3"></i>
                                        {{ $utilisateur->langue->nom_langue ?? 'Non spécifiée' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Dates importantes -->
                            <div class="space-y-4">
                                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide flex items-center">
                                    <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                                    Dates importantes
                                </h3>

                                <!-- Date d'inscription -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Date d'inscription</label>
                                    <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                        <i class="fas fa-calendar-plus text-primary-500 mr-3"></i>
                                        {{ \Carbon\Carbon::parse($utilisateur->date_inscription)->format('d/m/Y à H:i') }}
                                        <span class="ml-2 text-sm text-gray-500">
                                            (il y a {{ \Carbon\Carbon::parse($utilisateur->date_inscription)->diffForHumans() }})
                                        </span>
                                    </div>
                                </div>

                                <!-- Dernière mise à jour -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Dernière mise à jour</label>
                                    <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                        <i class="fas fa-sync-alt text-primary-500 mr-3"></i>
                                        {{ \Carbon\Carbon::parse($utilisateur->updated_at)->format('d/m/Y à H:i') }}
                                        <span class="ml-2 text-sm text-gray-500">
                                            (il y a {{ \Carbon\Carbon::parse($utilisateur->updated_at)->diffForHumans() }})
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex flex-wrap gap-3 justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-clock mr-2"></i>
                                Compte créé le {{ \Carbon\Carbon::parse($utilisateur->created_at)->format('d/m/Y à H:i') }}
                            </div>
                            <div class="flex space-x-3">
                                <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-all duration-200 shadow-sm hover:shadow-md">
                                    <i class="fas fa-edit mr-2"></i>
                                    Modifier
                                </a>
                                <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-200 shadow-sm hover:shadow-md"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                        <i class="fas fa-trash mr-2"></i>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite avec les 2 cartes empilées -->
            <div class="space-y-6">
                <!-- Carte Statistiques -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-bar text-primary-500 mr-2"></i>
                        Statistiques
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Commentaires:</span>
                            <span class="font-bold text-gray-800">{{ $utilisateur->commentaires->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Membre depuis:</span>
                            <span class="font-medium text-gray-800">
                                {{ \Carbon\Carbon::parse($utilisateur->date_inscription)->diffInDays() }} jours
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Carte Actions rapides -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt text-primary-500 mr-2"></i>
                        Actions rapides
                    </h3>
                    <div class="space-y-3">
                        <a href="mailto:{{ $utilisateur->email }}" 
                           class="w-full flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-200">
                            <i class="fas fa-envelope mr-2"></i>
                            Envoyer un email
                        </a>
                        <button class="w-full flex items-center justify-center px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all duration-200">
                            <i class="fas fa-key mr-2"></i>
                            Réinitialiser le mot de passe
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection