@extends('layout')

@section('title', 'Détails du média')

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
                    <i class="fas fa-image text-primary-500 mr-3"></i>
                    Détails du média
                </h1>
                <p class="text-gray-600 mt-2">Informations complètes sur le fichier média</p>
            </div>
            <a href="{{ route('medias.index') }}" 
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
                                Informations du média
                            </h2>
                            <div class="flex items-center space-x-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800">
                                    <i class="fas fa-hashtag mr-1"></i>
                                    ID: {{ $medias->id }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Corps de la carte -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Colonne gauche -->
                            <div class="space-y-6">
                                <!-- Aperçu du média -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-eye text-gray-500 mr-2"></i>
                                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Aperçu</h3>
                                    </div>
                                    <div class="flex justify-center items-center bg-white rounded-lg border-2 border-dashed border-gray-300 p-6">
                                        @php
                                            $extension = pathinfo($medias->chemin, PATHINFO_EXTENSION);
                                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
                                            $isVideo = in_array(strtolower($extension), ['mp4', 'avi', 'mov', 'wmv']);
                                            $isAudio = in_array(strtolower($extension), ['mp3', 'wav', 'ogg', 'm4a']);
                                        @endphp
                                        
                                        @if($isImage)
                                            <div class="text-center">
                                                <img src="{{ asset($medias->chemin) }}" 
                                                     alt="{{ $medias->description ?? 'Image' }}" 
                                                     class="max-w-full h-48 object-cover rounded-lg shadow-sm mx-auto">
                                                <p class="text-sm text-gray-500 mt-2">Image - {{ strtoupper($extension) }}</p>
                                            </div>
                                        @elseif($isVideo)
                                            <div class="text-center">
                                                <i class="fas fa-file-video text-6xl text-blue-500 mb-2"></i>
                                                <p class="text-sm text-gray-500">Fichier vidéo - {{ strtoupper($extension) }}</p>
                                            </div>
                                        @elseif($isAudio)
                                            <div class="text-center">
                                                <i class="fas fa-file-audio text-6xl text-green-500 mb-2"></i>
                                                <p class="text-sm text-gray-500">Fichier audio - {{ strtoupper($extension) }}</p>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <i class="fas fa-file text-6xl text-gray-400 mb-2"></i>
                                                <p class="text-sm text-gray-500">Fichier - {{ strtoupper($extension) }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Chemin du fichier -->
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-folder text-gray-500 mr-2"></i>
                                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Chemin du fichier</h3>
                                    </div>
                                    <div class="flex items-center justify-between bg-white rounded-lg px-4 py-3 border border-gray-200">
                                        <code class="text-sm text-gray-800 font-mono break-all">{{ $medias->chemin }}</code>
                                        <button onclick="copyToClipboard('{{ $medias->chemin }}')" 
                                                class="ml-2 flex items-center px-3 py-1 text-xs bg-gray-100 text-gray-600 rounded hover:bg-gray-200 transition-colors">
                                            <i class="fas fa-copy mr-1"></i>
                                            Copier
                                        </button>
                                    </div>
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
                                            <span class="flex-1">{{ $medias->description ?? 'Aucune description' }}</span>
                                        </div>
                                    </div>

                                    <!-- Type de média -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Type de média</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-tag text-primary-500 mr-3"></i>
                                            @php
                                                $typeColor = match(true) {
                                                    $isImage => 'bg-green-100 text-green-800 border-green-200',
                                                    $isVideo => 'bg-blue-100 text-blue-800 border-blue-200',
                                                    $isAudio => 'bg-purple-100 text-purple-800 border-purple-200',
                                                    default => 'bg-gray-100 text-gray-800 border-gray-200'
                                                };
                                                $typeIcon = match(true) {
                                                    $isImage => 'fa-image',
                                                    $isVideo => 'fa-video',
                                                    $isAudio => 'fa-music',
                                                    default => 'fa-file'
                                                };
                                                $typeText = match(true) {
                                                    $isImage => 'Image',
                                                    $isVideo => 'Vidéo',
                                                    $isAudio => 'Audio',
                                                    default => 'Document'
                                                };
                                            @endphp
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $typeColor }} ml-2">
                                                <i class="fas {{ $typeIcon }} mr-1"></i>
                                                {{ $typeText }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Extension -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Extension</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-code text-primary-500 mr-3"></i>
                                            <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">{{ strtoupper($extension) }}</span>
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
                                            {{ \Carbon\Carbon::parse($medias->created_at)->format('d/m/Y à H:i') }}
                                        </div>
                                    </div>

                                    <!-- Dernière modification -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Dernière modification</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-sync-alt text-primary-500 mr-3"></i>
                                            {{ \Carbon\Carbon::parse($medias->updated_at)->format('d/m/Y à H:i') }}
                                            <span class="ml-2 text-sm text-gray-500">
                                                (il y a {{ \Carbon\Carbon::parse($medias->updated_at)->diffForHumans() }})
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Taille du fichier -->
                                    <div>
                                        <label class="block text-xs font-medium text-gray-500 mb-1">Informations techniques</label>
                                        <div class="flex items-center text-gray-800 bg-white border border-gray-200 rounded-lg px-4 py-3">
                                            <i class="fas fa-hdd text-primary-500 mr-3"></i>
                                            <span class="text-sm">Informations non disponibles</span>
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
                                    Média créé le {{ \Carbon\Carbon::parse($medias->created_at)->format('d/m/Y à H:i') }}
                                </div>
                                <div class="flex space-x-3">
                                    @if($isImage)
                                        <a href="{{ asset($medias->chemin) }}" 
                                           target="_blank"
                                           class="flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all duration-200 shadow-sm hover:shadow-md">
                                            <i class="fas fa-external-link-alt mr-2"></i>
                                            Voir en grand
                                        </a>
                                    @endif
                                    <a href="{{ route('medias.edit', $medias->id) }}" 
                                       class="flex items-center px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-all duration-200 shadow-sm hover:shadow-md">
                                        <i class="fas fa-edit mr-2"></i>
                                        Modifier
                                    </a>
                                    <form action="{{ route('medias.destroy', $medias->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-200 shadow-sm hover:shadow-md"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce média ?')">
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
                            <span class="text-sm text-gray-600">Nom du fichier:</span>
                            <span class="font-medium text-gray-800 text-sm">{{ basename($medias->chemin) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Répertoire:</span>
                            <span class="font-medium text-gray-800 text-sm">{{ dirname($medias->chemin) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Format:</span>
                            <span class="font-medium text-gray-800">{{ strtoupper($extension) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Type MIME:</span>
                            <span class="font-medium text-gray-800 text-sm">
                                @php
                                    $mimeTypes = [
                                        'jpg' => 'image/jpeg',
                                        'jpeg' => 'image/jpeg',
                                        'png' => 'image/png',
                                        'gif' => 'image/gif',
                                        'pdf' => 'application/pdf',
                                        'mp4' => 'video/mp4',
                                        'mp3' => 'audio/mpeg',
                                    ];
                                @endphp
                                {{ $mimeTypes[strtolower($extension)] ?? 'application/octet-stream' }}
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
                        <a href="{{ asset($medias->chemin) }}" 
                           download
                           class="flex items-center justify-between p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors group">
                            <div class="flex items-center">
                                <i class="fas fa-download text-green-500 mr-3"></i>
                                <span class="text-sm font-medium text-gray-700">Télécharger le fichier</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-500"></i>
                        </a>
                        
                        <button onclick="copyToClipboard('{{ asset($medias->chemin) }}')" 
                                class="w-full flex items-center justify-between p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors group">
                            <div class="flex items-center">
                                <i class="fas fa-link text-blue-500 mr-3"></i>
                                <span class="text-sm font-medium text-gray-700">Copier le lien public</span>
                            </div>
                            <i class="fas fa-copy text-gray-400 group-hover:text-blue-500"></i>
                        </button>

                        <a href="{{ route('medias.edit', $medias->id) }}" 
                           class="flex items-center justify-between p-3 bg-amber-50 rounded-lg hover:bg-amber-100 transition-colors group">
                            <div class="flex items-center">
                                <i class="fas fa-edit text-amber-500 mr-3"></i>
                                <span class="text-sm font-medium text-gray-700">Modifier les informations</span>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-amber-500"></i>
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
            document.title = "✓ Lien copié !";
            setTimeout(() => {
                document.title = originalTitle;
            }, 2000);
        }).catch(function(err) {
            console.error('Erreur lors de la copie : ', err);
            alert('Erreur lors de la copie du lien');
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