@extends('layout')

@section('title', 'Détails du contenu')

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

<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-file-alt text-primary-500 mr-3"></i>
                    Détails du contenu
                </h1>
                <p class="text-gray-600 mt-2">Informations complètes sur le contenu</p>
            </div>
            <a href="{{ route('contenus.index') }}" 
               class="flex items-center px-4 py-2 bg-white text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow-md">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour à la liste
            </a>
        </div>

        <!-- Conteneur principal avec disposition en grille -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <!-- Carte principale (occupe 2 colonnes) -->
            <div class="xl:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden h-full">
                    <!-- En-tête de la carte -->
                    <div class="bg-gradient-to-r from-primary-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                                <i class="fas fa-info-circle text-primary-500 mr-2"></i>
                                Informations du contenu
                            </h2>
                            <div class="flex items-center space-x-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800">
                                    <i class="fas fa-hashtag mr-1"></i>
                                    ID: {{ $contenu->id }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Corps de la carte -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Colonne gauche -->
                            <div class="space-y-6">
                                <!-- Titre et description -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-heading text-gray-500 mr-2"></i>
                                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Titre du contenu</h3>
                                    </div>
                                    <p class="text-gray-800 leading-relaxed font-medium">{{ $contenu->titre }}</p>
                                </div>

                                <!-- Texte du contenu -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-align-left text-gray-500 mr-2"></i>
                                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Contenu</h3>
                                    </div>
                                    <p class="text-gray-800 leading-relaxed">{{ $contenu->texte }}</p>
                                </div>

                                <!-- Statut -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                        <i class="fas fa-tag text-primary-500 mr-2"></i>
                                        Statut
                                    </label>
                                    @php
                                        $isValid = $contenu->est_valide ?? true; // Suppose que vous avez un champ 'est_valide'
                                        if ($isValid) {
                                            $statusClass = 'bg-emerald-100 text-emerald-800 border-emerald-200';
                                            $statusIcon = 'check-circle';
                                            $statusText = 'Valide';
                                        } else {
                                            $statusClass = 'bg-rose-100 text-rose-800 border-rose-200';
                                            $statusIcon = 'times-circle';
                                            $statusText = 'Invalide';
                                        }
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $statusClass }}">
                                        <i class="fas fa-{{ $statusIcon }} mr-1 text-xs"></i>
                                        {{ $statusText }}
                                    </span>
                                </div>
                            </div>

                            <!-- Colonne droite -->
                            <div class="space-y-6">
                                <!-- Informations générales -->
                                <div class="space-y-4">
                                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide flex items-center">
                                        <i class="fas fa-info-circle text-gray-500 mr-2"></i>
                                        Informations générales
                                    </h3>
                                    
                                    <!-- Date de création -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Date de création</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-calendar-plus text-primary-500 mr-3"></i>
                                            {{ \Carbon\Carbon::parse($contenu->date_creation)->format('d/m/Y à H:i') }}
                                        </div>
                                    </div>

                                    <!-- Auteur -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Auteur</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-user text-primary-500 mr-3"></i>
                                            @if($contenu->utilisateur)
                                                <div class="flex flex-col">
                                                    <span class="font-medium">{{ $contenu->utilisateur->prenom }} {{ $contenu->utilisateur->nom }}</span>
                                                    <span class="text-sm text-gray-500 mt-1">{{ $contenu->utilisateur->email }}</span>
                                                </div>
                                            @else
                                                <span class="text-gray-500">—</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Région -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Région</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-map-marker-alt text-primary-500 mr-3"></i>
                                            {{ $contenu->region->nom_region ?? 'Non spécifiée' }}
                                        </div>
                                    </div>

                                    <!-- Langue -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Langue</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-language text-primary-500 mr-3"></i>
                                            {{ $contenu->langue->nom_langue ?? 'Non spécifiée' }}
                                        </div>
                                    </div>

                                    <!-- Type de contenu -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Type de contenu</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-tag text-primary-500 mr-3"></i>
                                            {{ $contenu->typecontenu->nom_contenu ?? 'Non spécifié' }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Métadonnées -->
                                <div class="space-y-4">
                                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide flex items-center">
                                        <i class="fas fa-database text-gray-500 mr-2"></i>
                                        Métadonnées
                                    </h3>

                                    <!-- Date de modification -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Dernière modification</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-sync-alt text-primary-500 mr-3"></i>
                                            {{ \Carbon\Carbon::parse($contenu->updated_at)->format('d/m/Y à H:i') }}
                                            <span class="ml-2 text-sm text-gray-500">
                                                (il y a {{ \Carbon\Carbon::parse($contenu->updated_at)->diffForHumans() }})
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Date de création (technique) -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Créé le</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-plus-circle text-primary-500 mr-3"></i>
                                            {{ \Carbon\Carbon::parse($contenu->created_at)->format('d/m/Y à H:i') }}
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
                                    Contenu créé le {{ \Carbon\Carbon::parse($contenu->created_at)->format('d/m/Y à H:i') }}
                                </div>
                                <div class="flex space-x-3">
                                    <a href="{{ route('contenus.edit', $contenu->id) }}" 
                                       class="flex items-center px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-all duration-200 shadow-sm hover:shadow-md">
                                        <i class="fas fa-edit mr-2"></i>
                                        Modifier
                                    </a>
                                    <form action="{{ route('contenus.destroy', $contenu->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-200 shadow-sm hover:shadow-md"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                            <i class="fas fa-trash mr-2"></i>
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cartes supplémentaires (occupe 1 colonne) -->
            <div class="space-y-6">
                <!-- Carte Auteur -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-user-circle text-primary-500 mr-2"></i>
                        Informations de l'auteur
                    </h3>
                    @if($contenu->utilisateur)
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Nom complet:</span>
                                <span class="font-medium text-gray-800">{{ $contenu->utilisateur->prenom }} {{ $contenu->utilisateur->nom }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Email:</span>
                                <span class="font-medium text-gray-800">{{ $contenu->utilisateur->email }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Statut:</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $contenu->utilisateur->statut ?? 'Utilisateur' }}
                                </span>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">Aucun auteur associé</p>
                    @endif
                </div>

                <!-- Carte Métadonnées -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-bar text-primary-500 mr-2"></i>
                        Statistiques
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Durée depuis création:</span>
                            <span class="font-medium text-gray-800">
                                {{ \Carbon\Carbon::parse($contenu->date_creation)->diffForHumans() }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Longueur du texte:</span>
                            <span class="font-medium text-gray-800">
                                {{ strlen($contenu->texte) }} caractères
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Type:</span>
                            <span class="font-medium text-gray-800">{{ $contenu->typecontenu->nom_contenu ?? '-' }}</span>
                        </div>
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