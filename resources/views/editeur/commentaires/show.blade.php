@extends('layout')

@section('title', 'Détails du commentaire')

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
                    <i class="fas fa-comment text-primary-500 mr-3"></i>
                    Détails du commentaire
                </h1>
                <p class="text-gray-600 mt-2">Informations complètes sur le commentaire</p>
            </div>
            <a href="{{ route('commentaires.index') }}" 
               class="flex items-center px-4 py-2 bg-white text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow-md">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour à la liste
            </a>
        </div>

        <!-- Grille principale avec les 3 cartes côte à côte -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <!-- Carte principale - Informations du commentaire -->
            <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- En-tête de la carte -->
                <div class="bg-gradient-to-r from-primary-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-info-circle text-primary-500 mr-2"></i>
                            Informations du commentaire
                        </h2>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800">
                                <i class="fas fa-hashtag mr-1"></i>
                                ID: {{ $commentaire->id }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Corps de la carte -->
                <div class="p-6">
                    <div class="space-y-6">
                        <!-- Texte du commentaire -->
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-comment-dots text-gray-500 mr-2"></i>
                                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Texte du commentaire</h3>
                            </div>
                            <p class="text-gray-800 leading-relaxed">{{ $commentaire->texte }}</p>
                        </div>

                        <!-- Note -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-star text-amber-500 mr-2"></i>
                                Note
                            </label>
                            <div class="flex items-center">
                                @if($commentaire->note)
                                    <div class="flex items-center bg-amber-50 border border-amber-200 rounded-lg px-4 py-3">
                                        <span class="text-amber-600 font-bold text-lg mr-2">{{ $commentaire->note }}/5</span>
                                        <div class="flex">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star text-{{ $i <= $commentaire->note ? 'amber-400' : 'gray-300' }} mr-1"></i>
                                            @endfor
                                        </div>
                                    </div>
                                @else
                                    <span class="text-gray-500 bg-gray-100 border border-gray-200 rounded-lg px-4 py-3">-</span>
                                @endif
                            </div>
                        </div>

                        <!-- Informations générales -->
                        <div class="space-y-4">
                            <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide flex items-center">
                                <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                                Informations générales
                            </h3>
                            
                            <!-- Date -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Date</label>
                                <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                    <i class="fas fa-calendar text-primary-500 mr-3"></i>
                                    {{ \Carbon\Carbon::parse($commentaire->date)->format('d/m/Y à H:i') }}
                                </div>
                            </div>

                            <!-- Utilisateur -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Utilisateur</label>
                                <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                    <i class="fas fa-user text-primary-500 mr-3"></i>
                                    @if($commentaire->utilisateur)
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $commentaire->utilisateur->prenom }} {{ $commentaire->utilisateur->nom }}</span>
                                            <span class="mx-2 text-gray-300">•</span>
                                            <span class="text-sm text-gray-500">{{ $commentaire->utilisateur->email }}</span>
                                        </div>
                                    @else
                                        <span class="text-gray-500">—</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Contenu -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Contenu associé</label>
                                <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                    <i class="fas fa-file-alt text-primary-500 mr-3"></i>
                                    @if($commentaire->contenu)
                                        <span class="font-medium">{{ $commentaire->contenu->titre }}</span>
                                    @else
                                        <span class="text-gray-500">—</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Statut</label>
                            <div class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                <i class="fas fa-check-circle mr-2"></i>
                                Actif
                            </div>
                        </div>
                    </div>

                    <!-- Section Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex flex-wrap gap-3 justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-clock mr-2"></i>
                                Créé le {{ \Carbon\Carbon::parse($commentaire->created_at)->format('d/m/Y à H:i') }}
                            </div>
                            <div class="flex space-x-3">
                                <a href="{{ route('commentaires.edit', $commentaire->id) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-all duration-200 shadow-sm hover:shadow-md">
                                    <i class="fas fa-edit mr-2"></i>
                                    Modifier
                                </a>
                                <form action="{{ route('commentaires.destroy', $commentaire->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-200 shadow-sm hover:shadow-md"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
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
                <!-- Carte Utilisateur -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-user-circle text-primary-500 mr-2"></i>
                        Informations utilisateur
                    </h3>
                    @if($commentaire->utilisateur)
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Nom complet:</span>
                                <span class="font-medium text-gray-800">{{ $commentaire->utilisateur->prenom }} {{ $commentaire->utilisateur->nom }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Email:</span>
                                <span class="font-medium text-gray-800">{{ $commentaire->utilisateur->email }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Statut:</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $commentaire->utilisateur->statut }}
                                </span>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">Aucun utilisateur associé</p>
                    @endif
                </div>

                <!-- Carte Contenu -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-file-contract text-primary-500 mr-2"></i>
                        Contenu associé
                    </h3>
                    @if($commentaire->contenu)
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Titre:</span>
                                <span class="font-medium text-gray-800 text-right">{{ $commentaire->contenu->titre }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Type:</span>
                                <span class="font-medium text-gray-800">{{ class_basename($commentaire->contenu) }}</span>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">Aucun contenu associé</p>
                    @endif
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