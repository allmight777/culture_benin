@extends('layouts')

@section('title')
<div class="flex justify-between items-center">
    <div>
        <ol class="flex items-center space-x-2 text-sm">
            <li><a href="#" class="text-gray-500 hover:text-gray-700">Home</a></li>
            <li class="flex items-center">
                <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
            </li>
            <li class="text-primary-600 font-medium">Contenus</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Contenu - Culture Bénin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Quill Editor CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #008751;
            --primary-dark: #006b40;
            --secondary: #fcd116;
            --accent: #e4002b;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Éditeur Quill personnalisé */
        .ql-toolbar.ql-snow {
            border: 1px solid #e5e7eb !important;
            border-radius: 8px 8px 0 0;
            background: #f9fafb;
        }
        
        .ql-container.ql-snow {
            border: 1px solid #e5e7eb !important;
            border-top: none !important;
            border-radius: 0 0 8px 8px;
            min-height: 300px;
            font-size: 16px;
        }
        
        .ql-editor {
            min-height: 300px;
            font-family: 'Poppins', sans-serif;
        }
        
        .ql-editor.ql-blank::before {
            color: #9ca3af !important;
            font-style: normal !important;
            font-family: 'Poppins', sans-serif;
        }
        
        /* Tags input */
        .tag {
            transition: all 0.2s ease;
        }
        
        .tag:hover {
            transform: translateY(-1px);
        }
        
        /* Preview card */
        .preview-card {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
        }
        
        .preview-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Drag and drop */
        .drag-drop-area {
            border: 2px dashed #d1d5db;
            transition: all 0.3s ease;
        }
        
        .drag-drop-area.drag-over {
            border-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.05);
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
        
        /* Scrollbar personnalisée */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
        
        /* Loader */
        .loader {
            border-top-color: #3b82f6;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-edit text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Création de Contenu</h1>
                        <p class="text-sm text-gray-500">Rédigez et publiez du contenu pour Culture Bénin</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Statut -->
                    <div class="hidden md:flex items-center space-x-6">
                        <div class="text-center">
                            <div class="text-lg font-bold text-green-600">3</div>
                            <div class="text-xs text-gray-500">En brouillon</div>
                        </div>
                        <div class="text-center">
                            <div class="text-lg font-bold text-blue-600">12</div>
                            <div class="text-xs text-gray-500">Publiés</div>
                        </div>
                    </div>
                    
                    <!-- Boutons d'action -->
                    <div class="flex items-center space-x-2">
                        <button id="saveDraftBtn"
                                class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium flex items-center space-x-2 hover:bg-gray-50 transition-all duration-200">
                            <i class="fas fa-save"></i>
                            <span class="hidden md:inline">Brouillon</span>
                        </button>
                        <button id="previewBtn"
                                class="border border-blue-300 text-blue-700 px-4 py-2 rounded-lg font-medium flex items-center space-x-2 hover:bg-blue-50 transition-all duration-200">
                            <i class="fas fa-eye"></i>
                            <span class="hidden md:inline">Prévisualiser</span>
                        </button>
                        <button id="publishBtn"
                                class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-2 rounded-lg font-medium flex items-center space-x-2 transition-all duration-200 hover:shadow-lg">
                            <i class="fas fa-paper-plane"></i>
                            <span>Publier</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonne de gauche : Formulaire principal -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Titre -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label class="block text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-heading text-green-600 mr-2"></i>
                        Titre du contenu
                    </label>
                    <input type="text" 
                           id="contentTitle"
                           placeholder="Entrez un titre accrocheur..."
                           class="w-full text-2xl font-bold text-gray-900 placeholder-gray-400 border-0 focus:ring-0 focus:outline-none">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-2"></i>
                        <span>Le titre doit être descriptif et attrayant (50-60 caractères recommandés)</span>
                    </div>
                </div>

                <!-- Éditeur de contenu -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <label class="block text-lg font-semibold text-gray-800">
                            <i class="fas fa-edit text-green-600 mr-2"></i>
                            Contenu principal
                        </label>
                    </div>
                    <div class="p-6">
                        <!-- Toolbar personnalisé -->
                        <div class="flex flex-wrap gap-2 mb-4 p-3 bg-gray-50 rounded-lg">
                            <button class="ql-bold p-2 text-gray-700 hover:bg-gray-200 rounded" title="Gras">
                                <i class="fas fa-bold"></i>
                            </button>
                            <button class="ql-italic p-2 text-gray-700 hover:bg-gray-200 rounded" title="Italique">
                                <i class="fas fa-italic"></i>
                            </button>
                            <button class="ql-underline p-2 text-gray-700 hover:bg-gray-200 rounded" title="Souligné">
                                <i class="fas fa-underline"></i>
                            </button>
                            <div class="w-px h-6 bg-gray-300"></div>
                            <button class="ql-list p-2 text-gray-700 hover:bg-gray-200 rounded" value="bullet" title="Liste à puces">
                                <i class="fas fa-list-ul"></i>
                            </button>
                            <button class="ql-list p-2 text-gray-700 hover:bg-gray-200 rounded" value="ordered" title="Liste numérotée">
                                <i class="fas fa-list-ol"></i>
                            </button>
                            <div class="w-px h-6 bg-gray-300"></div>
                            <button class="ql-link p-2 text-gray-700 hover:bg-gray-200 rounded" title="Lien">
                                <i class="fas fa-link"></i>
                            </button>
                            <button class="ql-image p-2 text-gray-700 hover:bg-gray-200 rounded" title="Image">
                                <i class="fas fa-image"></i>
                            </button>
                            <button class="ql-video p-2 text-gray-700 hover:bg-gray-200 rounded" title="Vidéo">
                                <i class="fas fa-video"></i>
                            </button>
                        </div>
                        
                        <!-- Éditeur Quill -->
                        <div id="editor" class="min-h-[400px]"></div>
                        
                        <!-- Compteur de mots -->
                        <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                            <div>
                                <i class="fas fa-font mr-1"></i>
                                <span id="wordCount">0</span> mots • <span id="charCount">0</span> caractères
                            </div>
                            <div>
                                <span id="readingTime">0 min</span> de lecture
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Extrait et métadonnées -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <label class="block text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-file-alt text-green-600 mr-2"></i>
                        Extrait et métadonnées
                    </label>
                    
                    <div class="space-y-6">
                        <!-- Extrait -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Extrait (description courte)
                            </label>
                            <textarea id="excerpt" 
                                      rows="3"
                                      placeholder="Décrivez brièvement votre contenu (150-160 caractères pour le SEO)..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"></textarea>
                            <div class="mt-1 flex justify-between text-xs text-gray-500">
                                <span>Recommandé pour le référencement</span>
                                <span id="excerptCount">0/160</span>
                            </div>
                        </div>
                        
                        <!-- Mots-clés -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Mots-clés (tags)
                            </label>
                            <div class="flex flex-wrap gap-2 mb-3" id="tagsContainer">
                                <!-- Tags seront ajoutés ici dynamiquement -->
                            </div>
                            <div class="flex">
                                <input type="text" 
                                       id="tagInput"
                                       placeholder="Ajouter un mot-clé (Entrée pour valider)"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                                <button onclick="addTag()"
                                        class="px-4 py-2 bg-green-600 text-white rounded-r-lg hover:bg-green-700 transition-colors duration-200">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="mt-2 text-xs text-gray-500">
                                <i class="fas fa-lightbulb mr-1"></i>
                                Ajoutez des mots-clés pertinents pour améliorer la découvrabilité
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite : Options et paramètres -->
            <div class="space-y-8">
                <!-- Statut et publication -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-calendar-alt text-green-600 mr-2"></i>
                        Publication
                    </h3>
                    
                    <div class="space-y-4">
                        <!-- Statut -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Statut
                            </label>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-green-50 transition-all duration-200">
                                    <input type="radio" name="status" value="draft" checked class="text-green-600 focus:ring-green-500 mr-3">
                                    <div>
                                        <div class="font-medium text-gray-800">Brouillon</div>
                                        <div class="text-xs text-gray-500">Enregistrer en privé</div>
                                    </div>
                                </label>
                                <label class="flex items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all duration-200">
                                    <input type="radio" name="status" value="published" class="text-blue-600 focus:ring-blue-500 mr-3">
                                    <div>
                                        <div class="font-medium text-gray-800">Publié</div>
                                        <div class="text-xs text-gray-500">Visible publiquement</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Date de publication -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Date de publication
                            </label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="publishDate" value="now" checked class="text-green-600 focus:ring-green-500 mr-2">
                                    <span class="text-sm text-gray-700">Publier immédiatement</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="publishDate" value="schedule" class="text-green-600 focus:ring-green-500 mr-2">
                                    <span class="text-sm text-gray-700">Planifier la publication</span>
                                </label>
                                <div id="scheduleDateContainer" class="hidden ml-6">
                                    <input type="datetime-local" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Visibilité -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Visibilité
                            </label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
                                <option value="public">Public (tout le monde)</option>
                                <option value="members">Membres seulement</option>
                                <option value="premium">Premium seulement</option>
                                <option value="private">Privé (moi uniquement)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Catégorie et type -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-tags text-green-600 mr-2"></i>
                        Catégorisation
                    </h3>
                    
                    <div class="space-y-4">
                        <!-- Catégorie principale -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Catégorie principale *
                            </label>
                            <select id="mainCategory" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
                                <option value="">Sélectionner une catégorie</option>
                                <option value="art">Art et artisanat</option>
                                <option value="music">Musique et danse</option>
                                <option value="food">Gastronomie</option>
                                <option value="history">Histoire et patrimoine</option>
                                <option value="festivals">Festivals et événements</option>
                                <option value="language">Langues et traditions</option>
                            </select>
                        </div>
                        
                        <!-- Type de contenu -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Type de contenu
                            </label>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all duration-200">
                                    <input type="radio" name="contentType" value="article" checked class="text-blue-600 focus:ring-blue-500 mb-2">
                                    <i class="fas fa-newspaper text-blue-600 text-xl mb-1"></i>
                                    <span class="text-sm font-medium">Article</span>
                                </label>
                                <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-purple-500 hover:bg-purple-50 transition-all duration-200">
                                    <input type="radio" name="contentType" value="video" class="text-purple-600 focus:ring-purple-500 mb-2">
                                    <i class="fas fa-video text-purple-600 text-xl mb-1"></i>
                                    <span class="text-sm font-medium">Vidéo</span>
                                </label>
                                <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-green-50 transition-all duration-200">
                                    <input type="radio" name="contentType" value="podcast" class="text-green-600 focus:ring-green-500 mb-2">
                                    <i class="fas fa-podcast text-green-600 text-xl mb-1"></i>
                                    <span class="text-sm font-medium">Podcast</span>
                                </label>
                                <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-yellow-500 hover:bg-yellow-50 transition-all duration-200">
                                    <input type="radio" name="contentType" value="gallery" class="text-yellow-600 focus:ring-yellow-500 mb-2">
                                    <i class="fas fa-images text-yellow-600 text-xl mb-1"></i>
                                    <span class="text-sm font-medium">Galerie</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Langue -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Langue
                            </label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white">
                                <option value="fr">Français</option>
                                <option value="fon">Fon</option>
                                <option value="yo">Yoruba</option>
                                <option value="en">Anglais</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Image de couverture -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-image text-green-600 mr-2"></i>
                        Image de couverture
                    </h3>
                    
                    <div id="coverImageContainer" class="mb-4">
                        <!-- Zone de drag & drop -->
                        <div id="dropZone" 
                             class="drag-drop-area rounded-lg p-8 text-center cursor-pointer transition-all duration-200">
                            <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl"></i>
                            </div>
                            <p class="text-gray-600 mb-2">
                                <span class="font-medium text-green-600">Cliquez pour télécharger</span> ou glissez-déposez
                            </p>
                            <p class="text-sm text-gray-500">
                                PNG, JPG ou WebP • Max 5MB • 1200x630px recommandé
                            </p>
                            <input type="file" 
                                   id="coverImageInput" 
                                   accept="image/*"
                                   class="hidden">
                        </div>
                        
                        <!-- Aperçu de l'image -->
                        <div id="imagePreview" class="hidden mt-4">
                            <div class="relative rounded-lg overflow-hidden">
                                <img id="previewImage" class="w-full h-48 object-cover">
                                <button onclick="removeCoverImage()"
                                        class="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-full hover:bg-red-700 transition-colors duration-200">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-1"></i>
                        L'image de couverture apparaîtra en haut de votre contenu et dans les aperçus
                    </div>
                </div>

                <!-- Aperçu en temps réel -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-magic text-green-600 mr-2"></i>
                        Aperçu instantané
                    </h3>
                    
                    <div class="preview-card border border-gray-200 rounded-lg p-4">
                        <div class="mb-3">
                            <div class="w-full h-32 bg-gradient-to-r from-green-400 to-green-600 rounded-lg mb-2"></div>
                        </div>
                        <div class="mb-2">
                            <span class="inline-block px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded">
                                <span id="previewCategory">Catégorie</span>
                            </span>
                        </div>
                        <h4 id="previewTitle" class="font-semibold text-gray-800 mb-2 text-sm">
                            Titre apparaîtra ici
                        </h4>
                        <p id="previewExcerpt" class="text-xs text-gray-600 mb-3">
                            L'extrait apparaîtra ici. C'est une brève description de votre contenu.
                        </p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span><i class="far fa-clock mr-1"></i> <span id="previewTime">0 min</span></span>
                            <span><i class="far fa-calendar mr-1"></i> Aujourd'hui</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-sm text-gray-500">
                        <i class="fas fa-sync-alt mr-1"></i>
                        L'aperçu se met à jour automatiquement
                    </div>
                </div>

                <!-- Options avancées -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <i class="fas fa-cog text-green-600 mr-2"></i>
                        Options avancées
                    </h3>
                    
                    <div class="space-y-3">
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700">Autoriser les commentaires</span>
                            <input type="checkbox" checked class="toggle-checkbox">
                        </label>
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700">Mettre en avant</span>
                            <input type="checkbox" class="toggle-checkbox">
                        </label>
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700">Partage sur réseaux sociaux</span>
                            <input type="checkbox" checked class="toggle-checkbox">
                        </label>
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700">Notification par email</span>
                            <input type="checkbox" class="toggle-checkbox">
                        </label>
                        <label class="flex items-center justify-between">
                            <span class="text-sm text-gray-700">Protéger par mot de passe</span>
                            <input type="checkbox" class="toggle-checkbox">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: Prévisualisation -->
    <div id="previewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden modal-enter">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200 bg-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-eye text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Prévisualisation</h3>
                                <p class="text-sm text-gray-500">Votre contenu tel qu'il apparaîtra aux visiteurs</p>
                            </div>
                        </div>
                        <button onclick="closePreviewModal()" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Contenu de prévisualisation -->
                <div class="p-6 overflow-y-auto custom-scrollbar" style="max-height: calc(90vh - 120px)">
                    <div class="max-w-3xl mx-auto">
                        <!-- Image de couverture -->
                        <div class="mb-8">
                            <div class="w-full h-64 bg-gradient-to-r from-green-400 to-green-600 rounded-xl"></div>
                        </div>
                        
                        <!-- Catégorie et date -->
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                                    Catégorie
                                </span>
                            </div>
                            <div class="text-sm text-gray-500">
                                <i class="far fa-calendar mr-1"></i>
                                Publié le <span id="previewDate">24 janvier 2024</span>
                            </div>
                        </div>
                        
                        <!-- Titre -->
                        <h1 id="previewModalTitle" class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                            Titre du contenu apparaîtra ici
                        </h1>
                        
                        <!-- Extrait -->
                        <div class="bg-gray-50 border-l-4 border-green-500 p-4 mb-8 rounded-r">
                            <p id="previewModalExcerpt" class="text-gray-700 italic">
                                L'extrait de votre contenu apparaîtra ici. C'est une brève introduction qui donne envie de lire la suite.
                            </p>
                        </div>
                        
                        <!-- Contenu -->
                        <div id="previewModalContent" class="prose prose-lg max-w-none mb-8">
                            <p>Le contenu de votre article apparaîtra ici avec une mise en forme complète.</p>
                            <p>Vous pourrez voir les images, les vidéos, les listes et tout le formatage que vous avez appliqué.</p>
                        </div>
                        
                        <!-- Tags -->
                        <div class="mb-8">
                            <div class="flex flex-wrap gap-2" id="previewModalTags">
                                <!-- Les tags apparaîtront ici -->
                            </div>
                        </div>
                        
                        <!-- Auteur -->
                        <div class="border-t border-gray-200 pt-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold text-lg mr-3">
                                    JD
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">John Doe</div>
                                    <div class="text-sm text-gray-500">Éditeur Culture Bénin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            Ceci est une prévisualisation. Les visiteurs verront cette page.
                        </div>
                        <div class="flex items-center space-x-3">
                            <button onclick="closePreviewModal()" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                Retour à l'édition
                            </button>
                            <button onclick="publishContent()" 
                                    class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 font-medium transition-all duration-200 hover:shadow-lg">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Publier maintenant
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loader overlay -->
    <div id="loaderOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl p-6 flex flex-col items-center">
            <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div>
            <p class="text-gray-700">Publication en cours...</p>
        </div>
    </div>

    <!-- Quill Editor JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Initialisation de Quill Editor
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                }
            },
            placeholder: 'Composez votre contenu ici...'
        });

        // Variables globales
        let tags = [];
        let coverImage = null;
        
        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            // Compteur de mots
            quill.on('text-change', updateWordCount);
            
            // Mise à jour de l'aperçu en temps réel
            document.getElementById('contentTitle').addEventListener('input', updatePreview);
            document.getElementById('excerpt').addEventListener('input', updatePreview);
            document.getElementById('mainCategory').addEventListener('change', updatePreview);
            
            // Planification de date
            document.querySelectorAll('input[name="publishDate"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.getElementById('scheduleDateContainer').classList.toggle('hidden', this.value !== 'schedule');
                });
            });
            
            // Drag and drop pour l'image
            setupDragAndDrop();
            
            // Boutons d'action
            document.getElementById('saveDraftBtn').addEventListener('click', saveAsDraft);
            document.getElementById('previewBtn').addEventListener('click', openPreviewModal);
            document.getElementById('publishBtn').addEventListener('click', publishContent);
            
            // Input de tags
            document.getElementById('tagInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addTag();
                }
            });
            
            // Initialiser l'aperçu
            updatePreview();
        });
        
        // Gestion des tags
        function addTag() {
            const input = document.getElementById('tagInput');
            const tag = input.value.trim();
            
            if (tag && !tags.includes(tag)) {
                tags.push(tag);
                renderTags();
                input.value = '';
                updatePreview();
            }
        }
        
        function removeTag(index) {
            tags.splice(index, 1);
            renderTags();
            updatePreview();
        }
        
        function renderTags() {
            const container = document.getElementById('tagsContainer');
            container.innerHTML = '';
            
            tags.forEach((tag, index) => {
                const tagElement = document.createElement('div');
                tagElement.className = 'tag inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full';
                tagElement.innerHTML = `
                    ${tag}
                    <button onclick="removeTag(${index})" class="ml-2 text-green-600 hover:text-green-800">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                container.appendChild(tagElement);
            });
        }
        
        // Drag and drop pour l'image
        function setupDragAndDrop() {
            const dropZone = document.getElementById('dropZone');
            const fileInput = document.getElementById('coverImageInput');
            
            dropZone.addEventListener('click', () => fileInput.click());
            
            fileInput.addEventListener('change', function(e) {
                if (this.files[0]) {
                    handleImageUpload(this.files[0]);
                }
            });
            
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                dropZone.classList.add('drag-over');
            }
            
            function unhighlight() {
                dropZone.classList.remove('drag-over');
            }
            
            dropZone.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files[0]) {
                    handleImageUpload(files[0]);
                }
            }
        }
        
        function handleImageUpload(file) {
            // Vérification du type de fichier
            if (!file.type.match('image.*')) {
                showNotification('Veuillez sélectionner une image valide', 'error');
                return;
            }
            
            // Vérification de la taille (5MB max)
            if (file.size > 5 * 1024 * 1024) {
                showNotification('L\'image doit faire moins de 5MB', 'error');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                coverImage = e.target.result;
                
                // Afficher l'aperçu
                document.getElementById('previewImage').src = coverImage;
                document.getElementById('dropZone').classList.add('hidden');
                document.getElementById('imagePreview').classList.remove('hidden');
                
                showNotification('Image de couverture téléchargée avec succès', 'success');
            };
            
            reader.readAsDataURL(file);
        }
        
        function removeCoverImage() {
            coverImage = null;
            document.getElementById('coverImageInput').value = '';
            document.getElementById('dropZone').classList.remove('hidden');
            document.getElementById('imagePreview').classList.add('hidden');
        }
        
        // Compteur de mots
        function updateWordCount() {
            const text = quill.getText().trim();
            const words = text.split(/\s+/).filter(word => word.length > 0);
            const characters = text.length;
            
            document.getElementById('wordCount').textContent = words.length;
            document.getElementById('charCount').textContent = characters;
            
            // Temps de lecture estimé (200 mots/min)
            const readingTime = Math.ceil(words.length / 200);
            document.getElementById('readingTime').textContent = readingTime;
            document.getElementById('previewTime').textContent = readingTime;
            
            updatePreview();
        }
        
        // Compteur d'extrait
        document.getElementById('excerpt').addEventListener('input', function() {
            const count = this.value.length;
            document.getElementById('excerptCount').textContent = `${count}/160`;
            
            if (count > 160) {
                document.getElementById('excerptCount').classList.add('text-red-600');
                document.getElementById('excerptCount').classList.remove('text-gray-500');
            } else {
                document.getElementById('excerptCount').classList.remove('text-red-600');
                document.getElementById('excerptCount').classList.add('text-gray-500');
            }
        });
        
        // Mise à jour de l'aperçu en temps réel
        function updatePreview() {
            const title = document.getElementById('contentTitle').value || 'Titre apparaîtra ici';
            const excerpt = document.getElementById('excerpt').value || 'L\'extrait apparaîtra ici. C\'est une brève description de votre contenu.';
            const category = document.getElementById('mainCategory').options[document.getElementById('mainCategory').selectedIndex]?.text || 'Catégorie';
            
            document.getElementById('previewTitle').textContent = title.length > 60 ? title.substring(0, 60) + '...' : title;
            document.getElementById('previewExcerpt').textContent = excerpt.length > 100 ? excerpt.substring(0, 100) + '...' : excerpt;
            document.getElementById('previewCategory').textContent = category;
            
            // Aperçu modal
            document.getElementById('previewModalTitle').textContent = title;
            document.getElementById('previewModalExcerpt').textContent = excerpt;
            
            // Mettre à jour le contenu de l'éditeur dans l'aperçu
            const content = quill.root.innerHTML;
            document.getElementById('previewModalContent').innerHTML = content || '<p>Le contenu de votre article apparaîtra ici avec une mise en forme complète.</p>';
            
            // Mettre à jour les tags dans l'aperçu
            const tagsContainer = document.getElementById('previewModalTags');
            tagsContainer.innerHTML = '';
            tags.forEach(tag => {
                const tagElement = document.createElement('span');
                tagElement.className = 'inline-block px-3 py-1 bg-gray-100 text-gray-800 text-sm font-medium rounded-full';
                tagElement.textContent = tag;
                tagsContainer.appendChild(tagElement);
            });
        }
        
        // Modal de prévisualisation
        function openPreviewModal() {
            // Mettre à jour l'aperçu avant d'ouvrir
            updatePreview();
            
            // Date actuelle formatée
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('previewDate').textContent = now.toLocaleDateString('fr-FR', options);
            
            document.getElementById('previewModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closePreviewModal() {
            document.getElementById('previewModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Sauvegarde en brouillon
        function saveAsDraft() {
            const contentData = collectContentData();
            contentData.status = 'draft';
            
            // Simulation de sauvegarde
            showNotification('Contenu sauvegardé en brouillon', 'success');
            console.log('Brouillon sauvegardé:', contentData);
        }
        
        // Publication
        function publishContent() {
            // Validation
            if (!validateContent()) {
                return;
            }
            
            // Afficher le loader
            document.getElementById('loaderOverlay').classList.remove('hidden');
            
            // Collecter les données
            const contentData = collectContentData();
            
            // Simulation de publication
            setTimeout(() => {
                document.getElementById('loaderOverlay').classList.add('hidden');
                showNotification('Contenu publié avec succès !', 'success');
                console.log('Contenu publié:', contentData);
                
                // Redirection ou réinitialisation
                if (confirm('Votre contenu a été publié. Voulez-vous créer un nouveau contenu ?')) {
                    resetForm();
                }
            }, 2000);
        }
        
        // Validation
        function validateContent() {
            const title = document.getElementById('contentTitle').value.trim();
            const content = quill.getText().trim();
            const category = document.getElementById('mainCategory').value;
            
            if (!title) {
                showNotification('Veuillez ajouter un titre', 'error');
                document.getElementById('contentTitle').focus();
                return false;
            }
            
            if (!content || content.length < 50) {
                showNotification('Le contenu doit faire au moins 50 caractères', 'error');
                quill.focus();
                return false;
            }
            
            if (!category) {
                showNotification('Veuillez sélectionner une catégorie', 'error');
                document.getElementById('mainCategory').focus();
                return false;
            }
            
            return true;
        }
        
        // Collecte des données
        function collectContentData() {
            return {
                title: document.getElementById('contentTitle').value,
                content: quill.root.innerHTML,
                excerpt: document.getElementById('excerpt').value,
                tags: tags,
                category: document.getElementById('mainCategory').value,
                contentType: document.querySelector('input[name="contentType"]:checked').value,
                status: document.querySelector('input[name="status"]:checked').value,
                visibility: document.querySelector('select').value,
                coverImage: coverImage,
                allowComments: document.querySelector('input[type="checkbox"]').checked,
                publishDate: document.querySelector('input[name="publishDate"]:checked').value === 'schedule' 
                    ? document.querySelector('input[type="datetime-local"]').value 
                    : 'now',
                wordCount: document.getElementById('wordCount').textContent,
                readingTime: document.getElementById('readingTime').textContent
            };
        }
        
        // Réinitialisation du formulaire
        function resetForm() {
            document.getElementById('contentTitle').value = '';
            quill.setText('');
            document.getElementById('excerpt').value = '';
            tags = [];
            renderTags();
            removeCoverImage();
            document.getElementById('mainCategory').selectedIndex = 0;
            document.querySelector('input[name="status"][value="draft"]').checked = true;
            document.querySelector('input[name="publishDate"][value="now"]').checked = true;
            document.getElementById('scheduleDateContainer').classList.add('hidden');
            
            updatePreview();
            updateWordCount();
            
            showNotification('Formulaire réinitialisé. Prêt pour un nouveau contenu !', 'info');
        }
        
        // Notifications
        function showNotification(message, type = 'info') {
            // Créer notification
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transform translate-x-full transition-transform duration-300 animate-fade-in ${
                type === 'success' ? 'bg-green-600' :
                type === 'error' ? 'bg-red-600' :
                type === 'warning' ? 'bg-yellow-600' : 'bg-blue-600'
            }`;
            notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : type === 'warning' ? 'exclamation-triangle' : 'info-circle'}"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Animation d'entrée
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 10);
            
            // Auto-remove après 3 secondes
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
        
        // Style pour les checkbox toggle
        const style = document.createElement('style');
        style.textContent = `
            .toggle-checkbox {
                position: relative;
                width: 44px;
                height: 24px;
                appearance: none;
                background: #d1d5db;
                border-radius: 12px;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            
            .toggle-checkbox:checked {
                background: #10b981;
            }
            
            .toggle-checkbox::before {
                content: '';
                position: absolute;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background: white;
                top: 2px;
                left: 2px;
                transition: all 0.3s ease;
            }
            
            .toggle-checkbox:checked::before {
                left: 22px;
            }
        `;
        document.head.appendChild(style);
        
        // Fermer modals avec ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePreviewModal();
            }
        });
    </script>
</body>
</html>
@endsection