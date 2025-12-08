@extends('layout')

@section('title', 'Détails de la langue')

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
                    <i class="fas fa-language text-primary-500 mr-3"></i>
                    Détails de la langue
                </h1>
                <p class="text-gray-600 mt-2">Informations complètes sur la langue</p>
            </div>
            <a href="{{ route('langues.index') }}" 
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
                                Informations de la langue
                            </h2>
                            <div class="flex items-center space-x-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800">
                                    <i class="fas fa-hashtag mr-1"></i>
                                    ID: {{ $langue->id }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Corps de la carte -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Colonne gauche -->
                            <div class="space-y-6">
                                <!-- Code langue -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-code text-gray-500 mr-2"></i>
                                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Code Langue</h3>
                                    </div>
                                    <div class="flex items-center justify-between bg-white rounded-lg px-4 py-3 border border-gray-200">
                                        <span class="text-lg font-mono font-bold text-gray-800">{{ $langue->code_langue }}</span>
                                        <button onclick="copyToClipboard('{{ $langue->code_langue }}')" 
                                                class="ml-2 flex items-center px-3 py-1 text-xs bg-gray-100 text-gray-600 rounded hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-copy mr-1"></i>
                                            Copier
                                        </button>
                                    </div>
                                </div>

                                <!-- Nom langue -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-globe text-gray-500 mr-2"></i>
                                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Nom de la Langue</h3>
                                    </div>
                                    <p class="text-xl font-semibold text-gray-800 bg-white rounded-lg px-4 py-3 border border-gray-200">
                                        {{ $langue->nom_langue }}
                                    </p>
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
                                    
                                    <!-- Description -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Description</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3 min-h-[3rem]">
                                            <i class="fas fa-align-left text-primary-500 mr-3"></i>
                                            <span class="flex-1">{{ $langue->description ?? 'Aucune description' }}</span>
                                        </div>
                                    </div>

                                    <!-- Statut -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Statut</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-circle text-green-500 mr-3"></i>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                                <i class="fas fa-check mr-1"></i>
                                                Actif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Métadonnées -->
                                <div class="space-y-4">
                                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide flex items-center">
                                        <i class="fas fa-database text-gray-500 mr-2"></i>
                                        Métadonnées
                                    </h3>

                                    <!-- Date de création -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Date de création</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-calendar-plus text-primary-500 mr-3"></i>
                                            {{ \Carbon\Carbon::parse($langue->created_at)->format('d/m/Y à H:i') }}
                                        </div>
                                    </div>

                                    <!-- Dernière modification -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Dernière modification</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-sync-alt text-primary-500 mr-3"></i>
                                            {{ \Carbon\Carbon::parse($langue->updated_at)->format('d/m/Y à H:i') }}
                                            <span class="ml-2 text-sm text-gray-500">
                                                (il y a {{ \Carbon\Carbon::parse($langue->updated_at)->diffForHumans() }})
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
                                    Langue créée le {{ \Carbon\Carbon::parse($langue->created_at)->format('d/m/Y à H:i') }}
                                </div>
                                <div class="flex space-x-3">
                                    <a href="{{ route('langues.edit', $langue->id) }}" 
                                       class="flex items-center px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-all duration-200 shadow-sm hover:shadow-md">
                                        <i class="fas fa-edit mr-2"></i>
                                        Modifier
                                    </a>
                                    <form action="{{ route('langues.destroy', $langue->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-200 shadow-sm hover:shadow-md"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette langue ?')">
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
                <!-- Carte Informations techniques -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-cogs text-primary-500 mr-2"></i>
                        Informations techniques
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Code ISO:</span>
                            <span class="font-medium text-gray-800 font-mono">{{ $langue->code_langue }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Nom complet:</span>
                            <span class="font-medium text-gray-800">{{ $langue->nom_langue }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Longueur description:</span>
                            <span class="font-medium text-gray-800">
                                {{ strlen($langue->description ?? '0') }} caractères
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Dans la base depuis:</span>
                            <span class="font-medium text-gray-800">
                                {{ \Carbon\Carbon::parse($langue->created_at)->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Carte Actions rapides -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt text-amber-500 mr-2"></i>
                        Actions rapides
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('langues.edit', $langue->id) }}" 
                           class="flex items-center justify-between p-3 bg-amber-50 rounded-lg hover:bg-amber-100 transition-colors group">
                            <div class="flex items-center">
                                <i class="fas fa-edit text-amber-500 mr-3"></i>
                                <span class="text-sm font-medium text-gray-700">Modifier cette langue</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-amber-500"></i>
                        </a>
                        
                        <a href="{{ route('langues.create') }}" 
                           class="flex items-center justify-between p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors group">
                            <div class="flex items-center">
                                <i class="fas fa-plus text-green-500 mr-3"></i>
                                <span class="text-sm font-medium text-gray-700">Ajouter une nouvelle langue</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-500"></i>
                        </a>

                        <button onclick="copyToClipboard('{{ $langue->code_langue }}')" 
                                class="w-full flex items-center justify-between p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors group">
                            <div class="flex items-center">
                                <i class="fas fa-copy text-blue-500 mr-3"></i>
                                <span class="text-sm font-medium text-gray-700">Copier le code langue</span>
                            </div>
                            <i class="fas fa-clipboard text-gray-400 group-hover:text-blue-500"></i>
                        </button>

                        <a href="{{ route('langues.index') }}" 
                           class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors group">
                            <div class="flex items-center">
                                <i class="fas fa-list text-gray-500 mr-3"></i>
                                <span class="text-sm font-medium text-gray-700">Voir toutes les langues</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-gray-500"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Message de succès simple
            const originalTitle = document.title;
            document.title = "✓ Copié !";
            setTimeout(() => {
                document.title = originalTitle;
            }, 2000);
        }).catch(function(err) {
            console.error('Erreur lors de la copie : ', err);
            alert('Erreur lors de la copie');
        });
    }

    // Animation d'apparition progressive
    document.addEventListener('DOMContentLoaded', function() {
        const elements = document.querySelectorAll('.bg-white');
        elements.forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            setTimeout(() => {
                el.style.transition = 'all 0.6s ease';
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
</script>

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