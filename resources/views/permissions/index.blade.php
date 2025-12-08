<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Permissions - Culture Bénin Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        
        /* Animation pour les modals */
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .modal-enter {
            animation: modalFadeIn 0.3s ease-out;
        }
        
        /* Animation pour les cartes */
        .permission-card {
            transition: all 0.3s ease;
        }
        
        .permission-card:hover {
            transform: translateY(-4px);
        }
        
        /* Scrollbar personnalisée */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
        
        /* Badge animations */
        @keyframes badgePulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.6;
            }
        }
        
        .badge-pulse {
            animation: badgePulse 2s infinite;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-key text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Gestion des Permissions</h1>
                        <p class="text-sm text-gray-500">Administration des permissions système</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Stats -->
                    <div class="hidden md:flex items-center space-x-6">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-600">42</div>
                            <div class="text-xs text-gray-500">Permissions</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">8</div>
                            <div class="text-xs text-gray-500">Catégories</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">96</div>
                            <div class="text-xs text-gray-500">Assignations</div>
                        </div>
                    </div>
                    
                    <!-- Boutons d'action -->
                    <div class="flex items-center space-x-2">
                        <button onclick="openImportModal()" 
                                class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium flex items-center space-x-2 hover:bg-gray-50 transition-all duration-200">
                            <i class="fas fa-file-import"></i>
                            <span class="hidden md:inline">Importer</span>
                        </button>
                        <button onclick="openExportModal()" 
                                class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium flex items-center space-x-2 hover:bg-gray-50 transition-all duration-200">
                            <i class="fas fa-file-export"></i>
                            <span class="hidden md:inline">Exporter</span>
                        </button>
                        <button onclick="openCreateModal()" 
                                class="bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white px-4 py-2 rounded-lg font-medium flex items-center space-x-2 transition-all duration-200 hover:shadow-lg">
                            <i class="fas fa-plus"></i>
                            <span>Nouvelle Permission</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
        <!-- Barre de recherche et filtres -->
        <div class="mb-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" 
                               id="searchInput"
                               placeholder="Rechercher une permission..." 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                               onkeyup="filterPermissions()">
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Filtre par catégorie -->
                    <select id="categoryFilter" onchange="filterPermissions()" 
                            class="border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white min-w-[180px]">
                        <option value="">Toutes les catégories</option>
                        <option value="content">Contenu</option>
                        <option value="users">Utilisateurs</option>
                        <option value="system">Système</option>
                        <option value="media">Médias</option>
                        <option value="settings">Paramètres</option>
                        <option value="reports">Rapports</option>
                    </select>
                    
                    <!-- Filtre par type -->
                    <select id="typeFilter" onchange="filterPermissions()"
                            class="border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white min-w-[180px]">
                        <option value="">Tous les types</option>
                        <option value="create">Création</option>
                        <option value="read">Lecture</option>
                        <option value="update">Modification</option>
                        <option value="delete">Suppression</option>
                        <option value="manage">Gestion</option>
                    </select>
                    
                    <!-- Filtre par statut -->
                    <select id="statusFilter" onchange="filterPermissions()"
                            class="border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white min-w-[180px]">
                        <option value="">Tous les statuts</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                        <option value="system">Système</option>
                    </select>
                    
                    <!-- Bouton de réinitialisation -->
                    <button onclick="resetFilters()"
                            class="text-gray-600 hover:text-gray-900 p-3 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                            title="Réinitialiser les filtres">
                        <i class="fas fa-redo"></i>
                    </button>
                </div>
            </div>
            
            <!-- Tags de filtres actifs -->
            <div id="activeFilters" class="flex flex-wrap gap-2 mt-4 hidden">
                <!-- Les tags seront générés dynamiquement -->
            </div>
        </div>

        <!-- Vue en grille des permissions -->
        <div id="gridView" class="mb-8">
            <!-- En-tête de la vue grille -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Permissions système</h2>
                    <p class="text-sm text-gray-500" id="permissionCount">42 permissions trouvées</p>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Toggle vue -->
                    <div class="flex items-center bg-gray-100 rounded-lg p-1">
                        <button id="viewGridBtn" class="px-3 py-2 rounded-md bg-white shadow-sm text-gray-800">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button id="viewTableBtn" class="px-3 py-2 rounded-md text-gray-600 hover:text-gray-800">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                    
                    <!-- Bouton gestion des catégories -->
                    <button onclick="openCategoriesModal()"
                            class="flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        <i class="fas fa-tags"></i>
                        <span>Catégories</span>
                    </button>
                </div>
            </div>
            
            <!-- Grille des permissions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Permission 1 -->
                <div class="permission-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md" data-category="content" data-type="create" data-status="active">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Contenu</span>
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Création</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-lg mb-1">contenu.create</h3>
                            <p class="text-sm text-gray-600 mb-4">Permet de créer de nouveaux contenus</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <!-- Rôles associés -->
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Rôles assignés</div>
                            <div class="flex flex-wrap gap-1">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Super Admin</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Administrateur</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Éditeur</span>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <div class="flex items-center space-x-3">
                                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded">
                                    <i class="fas fa-circle text-green-500 mr-1"></i>
                                    Active
                                </span>
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>3 rôles
                                </span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <button onclick="openEditPermission('contenu.create')"
                                        class="text-gray-500 hover:text-blue-600 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                        title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="openAssignModal('contenu.create')"
                                        class="text-gray-500 hover:text-purple-600 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200"
                                        title="Assigner">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button onclick="confirmDeletePermission('contenu.create')"
                                        class="text-gray-500 hover:text-red-600 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200"
                                        title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permission 2 -->
                <div class="permission-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md" data-category="users" data-type="delete" data-status="active">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Utilisateurs</span>
                                <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full">Suppression</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-lg mb-1">users.delete</h3>
                            <p class="text-sm text-gray-600 mb-4">Permet de supprimer des utilisateurs</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-trash text-white"></i>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <!-- Rôles associés -->
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Rôles assignés</div>
                            <div class="flex flex-wrap gap-1">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Super Admin</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Administrateur</span>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <div class="flex items-center space-x-3">
                                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded">
                                    <i class="fas fa-circle text-green-500 mr-1"></i>
                                    Active
                                </span>
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>2 rôles
                                </span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <button onclick="openEditPermission('users.delete')"
                                        class="text-gray-500 hover:text-blue-600 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="openAssignModal('users.delete')"
                                        class="text-gray-500 hover:text-purple-600 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button onclick="confirmDeletePermission('users.delete')"
                                        class="text-gray-500 hover:text-red-600 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permission 3 -->
                <div class="permission-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md" data-category="system" data-type="manage" data-status="system">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">Système</span>
                                <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">Gestion</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-lg mb-1">system.backup</h3>
                            <p class="text-sm text-gray-600 mb-4">Permet de gérer les sauvegardes système</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-database text-white"></i>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <!-- Rôles associés -->
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Rôles assignés</div>
                            <div class="flex flex-wrap gap-1">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 badge-pulse">Super Admin</span>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <div class="flex items-center space-x-3">
                                <span class="text-xs font-medium text-red-600 bg-red-50 px-2 py-1 rounded">
                                    <i class="fas fa-shield-alt text-red-500 mr-1"></i>
                                    Système
                                </span>
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>1 rôle
                                </span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <button disabled
                                        class="text-gray-300 p-2 cursor-not-allowed"
                                        title="Permission système">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="openAssignModal('system.backup')"
                                        class="text-gray-500 hover:text-purple-600 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button disabled
                                        class="text-gray-300 p-2 cursor-not-allowed"
                                        title="Permission système">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permission 4 -->
                <div class="permission-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md" data-category="media" data-type="read" data-status="active">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2 py-1 bg-pink-100 text-pink-800 text-xs font-medium rounded-full">Médias</span>
                                <span class="px-2 py-1 bg-teal-100 text-teal-800 text-xs font-medium rounded-full">Lecture</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-lg mb-1">media.view</h3>
                            <p class="text-sm text-gray-600 mb-4">Permet de visualiser les médias</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-eye text-white"></i>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <!-- Rôles associés -->
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Rôles assignés</div>
                            <div class="flex flex-wrap gap-1">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Super Admin</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Administrateur</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Éditeur</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Lecteur</span>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <div class="flex items-center space-x-3">
                                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded">
                                    <i class="fas fa-circle text-green-500 mr-1"></i>
                                    Active
                                </span>
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>4 rôles
                                </span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <button onclick="openEditPermission('media.view')"
                                        class="text-gray-500 hover:text-blue-600 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="openAssignModal('media.view')"
                                        class="text-gray-500 hover:text-purple-600 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button onclick="confirmDeletePermission('media.view')"
                                        class="text-gray-500 hover:text-red-600 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permission 5 -->
                <div class="permission-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md" data-category="settings" data-type="update" data-status="active">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Paramètres</span>
                                <span class="px-2 py-1 bg-orange-100 text-orange-800 text-xs font-medium rounded-full">Modification</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-lg mb-1">settings.update</h3>
                            <p class="text-sm text-gray-600 mb-4">Permet de modifier les paramètres système</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-cog text-white"></i>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <!-- Rôles associés -->
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Rôles assignés</div>
                            <div class="flex flex-wrap gap-1">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Super Admin</span>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <div class="flex items-center space-x-3">
                                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded">
                                    <i class="fas fa-circle text-green-500 mr-1"></i>
                                    Active
                                </span>
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>1 rôle
                                </span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <button onclick="openEditPermission('settings.update')"
                                        class="text-gray-500 hover:text-blue-600 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="openAssignModal('settings.update')"
                                        class="text-gray-500 hover:text-purple-600 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button onclick="confirmDeletePermission('settings.update')"
                                        class="text-gray-500 hover:text-red-600 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permission 6 -->
                <div class="permission-card bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md" data-category="reports" data-type="read" data-status="inactive">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2 py-1 bg-cyan-100 text-cyan-800 text-xs font-medium rounded-full">Rapports</span>
                                <span class="px-2 py-1 bg-teal-100 text-teal-800 text-xs font-medium rounded-full">Lecture</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-lg mb-1">reports.view</h3>
                            <p class="text-sm text-gray-600 mb-4">Permet de visualiser les rapports</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chart-bar text-white"></i>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <!-- Rôles associés -->
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Rôles assignés</div>
                            <div class="flex flex-wrap gap-1">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Super Admin</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Administrateur</span>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                            <div class="flex items-center space-x-3">
                                <span class="text-xs font-medium text-gray-600 bg-gray-50 px-2 py-1 rounded">
                                    <i class="fas fa-circle text-gray-500 mr-1"></i>
                                    Inactive
                                </span>
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>2 rôles
                                </span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <button onclick="openEditPermission('reports.view')"
                                        class="text-gray-500 hover:text-blue-600 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="openAssignModal('reports.view')"
                                        class="text-gray-500 hover:text-purple-600 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button onclick="confirmDeletePermission('reports.view')"
                                        class="text-gray-500 hover:text-red-600 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte d'ajout -->
                <div onclick="openCreateModal()" 
                     class="permission-card border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-purple-400 hover:bg-purple-50/20 transition-all duration-200 cursor-pointer flex flex-col items-center justify-center text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-full flex items-center justify-center mb-4 group-hover:from-purple-200 group-hover:to-purple-300 transition-all duration-200">
                        <i class="fas fa-plus text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-2 group-hover:text-purple-700">Ajouter une permission</h3>
                    <p class="text-sm text-gray-600 mb-4">Créez une nouvelle permission système</p>
                    <span class="px-4 py-2 bg-purple-100 text-purple-700 rounded-lg text-sm font-medium group-hover:bg-purple-200 transition-colors duration-200">
                        Nouvelle permission
                    </span>
                </div>
            </div>
        </div>

        <!-- Vue tableau (cachée par défaut) -->
        <div id="tableView" class="hidden">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Catégorie
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Type
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Description
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Rôles
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Statut
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Les données seront chargées dynamiquement -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Statistiques et résumé -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <!-- Card: Distribution par catégorie -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Par catégorie</h3>
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-pie text-white"></i>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">Contenu</span>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">12</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">Utilisateurs</span>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">8</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">Système</span>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">6</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">Médias</span>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">5</span>
                    </div>
                </div>
            </div>

            <!-- Card: Distribution par type -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Par type d'action</h3>
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-tasks text-white"></i>
                    </div>
                </div>
                <div class="space-y-2">
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Création</span>
                            <span>15%</span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 rounded-full" style="width: 15%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Lecture</span>
                            <span>25%</span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-green-500 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Modification</span>
                            <span>35%</span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-yellow-500 rounded-full" style="width: 35%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Suppression</span>
                            <span>25%</span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-red-500 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Actions rapides -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Actions rapides</h3>
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-bolt text-white"></i>
                    </div>
                </div>
                <div class="space-y-3">
                    <button onclick="openBatchAssignModal()"
                            class="w-full flex items-center justify-between p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-user-plus text-purple-600"></i>
                            <span class="font-medium text-gray-800">Assigner en lot</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </button>
                    
                    <button onclick="generateDefaultPermissions()"
                            class="w-full flex items-center justify-between p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-magic text-blue-600"></i>
                            <span class="font-medium text-gray-800">Générer par défaut</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </button>
                    
                    <button onclick="openAuditLog()"
                            class="w-full flex items-center justify-between p-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-history text-yellow-600"></i>
                            <span class="font-medium text-gray-800">Journal des modifications</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </button>
                    
                    <button onclick="exportToCSV()"
                            class="w-full flex items-center justify-between p-3 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-csv text-green-600"></i>
                            <span class="font-medium text-gray-800">Exporter en CSV</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: Création de permission -->
    <div id="createPermissionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl modal-enter">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Nouvelle permission</h3>
                                <p class="text-sm text-gray-500">Définissez une nouvelle permission système</p>
                            </div>
                        </div>
                        <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Form -->
                <form id="createPermissionForm" class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nom -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Nom *</label>
                            <input type="text" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                   placeholder="Ex: contenu.create">
                            <p class="text-xs text-gray-500">Format: resource.action (en minuscules)</p>
                        </div>
                        
                        <!-- Catégorie -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Catégorie *</label>
                            <select required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white">
                                <option value="">Sélectionner une catégorie</option>
                                <option value="content">Contenu</option>
                                <option value="users">Utilisateurs</option>
                                <option value="system">Système</option>
                                <option value="media">Médias</option>
                                <option value="settings">Paramètres</option>
                                <option value="reports">Rapports</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Type d'action -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Type d'action *</label>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
                            <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all duration-200">
                                <input type="radio" name="actionType" value="create" class="text-blue-600 focus:ring-blue-500 mb-2">
                                <i class="fas fa-plus text-blue-600 text-xl mb-1"></i>
                                <span class="text-sm font-medium">Création</span>
                            </label>
                            <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-green-500 hover:bg-green-50 transition-all duration-200">
                                <input type="radio" name="actionType" value="read" class="text-green-600 focus:ring-green-500 mb-2">
                                <i class="fas fa-eye text-green-600 text-xl mb-1"></i>
                                <span class="text-sm font-medium">Lecture</span>
                            </label>
                            <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-yellow-500 hover:bg-yellow-50 transition-all duration-200">
                                <input type="radio" name="actionType" value="update" class="text-yellow-600 focus:ring-yellow-500 mb-2">
                                <i class="fas fa-edit text-yellow-600 text-xl mb-1"></i>
                                <span class="text-sm font-medium">Modification</span>
                            </label>
                            <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-red-500 hover:bg-red-50 transition-all duration-200">
                                <input type="radio" name="actionType" value="delete" class="text-red-600 focus:ring-red-500 mb-2">
                                <i class="fas fa-trash text-red-600 text-xl mb-1"></i>
                                <span class="text-sm font-medium">Suppression</span>
                            </label>
                            <label class="flex flex-col items-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-purple-500 hover:bg-purple-50 transition-all duration-200">
                                <input type="radio" name="actionType" value="manage" class="text-purple-600 focus:ring-purple-500 mb-2">
                                <i class="fas fa-cog text-purple-600 text-xl mb-1"></i>
                                <span class="text-sm font-medium">Gestion</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Description *</label>
                        <textarea rows="3" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                  placeholder="Décrivez l'action permise..."></textarea>
                    </div>
                    
                    <!-- Assignation initiale -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Assigner aux rôles</label>
                        <div class="border border-gray-300 rounded-lg p-4 max-h-40 overflow-y-auto scrollbar-thin">
                            <div class="space-y-2">
                                <label class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                    <input type="checkbox" class="rounded text-purple-600 focus:ring-purple-500">
                                    <div class="w-6 h-6 bg-gradient-to-br from-red-500 to-red-600 rounded flex items-center justify-center">
                                        <i class="fas fa-crown text-white text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Super Admin</span>
                                </label>
                                <label class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                    <input type="checkbox" class="rounded text-purple-600 focus:ring-purple-500">
                                    <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded flex items-center justify-center">
                                        <i class="fas fa-user-tie text-white text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Administrateur</span>
                                </label>
                                <label class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                    <input type="checkbox" class="rounded text-purple-600 focus:ring-purple-500">
                                    <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-green-600 rounded flex items-center justify-center">
                                        <i class="fas fa-edit text-white text-xs"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Éditeur</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
                
                <!-- Footer -->
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                    <div class="flex items-center justify-end space-x-3">
                        <button onclick="closeCreateModal()" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                            Annuler
                        </button>
                        <button type="submit" form="createPermissionForm"
                                class="px-4 py-2 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg hover:from-purple-600 hover:to-purple-700 font-medium transition-all duration-200 hover:shadow-lg">
                            Créer la permission
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: Suppression -->
    <div id="deletePermissionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md modal-enter">
                <div class="p-6">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-red-500 to-red-600 rounded-full">
                        <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Supprimer la permission</h3>
                    <p class="text-gray-600 text-center mb-6">
                        Êtes-vous sûr de vouloir supprimer cette permission ?
                        <span class="block text-sm text-red-600 font-medium mt-2" id="deletePermissionWarning">
                            Cette action affectera les rôles associés.
                        </span>
                    </p>
                    <div class="flex items-center justify-center space-x-3">
                        <button onclick="closeDeletePermissionModal()" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                            Annuler
                        </button>
                        <button onclick="deletePermission()" 
                                class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 font-medium transition-all duration-200 hover:shadow-lg">
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
        // Variables globales
        let currentPermissionId = null;
        let currentView = 'grid';
        
        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser les boutons de vue
            document.getElementById('viewGridBtn').addEventListener('click', () => switchView('grid'));
            document.getElementById('viewTableBtn').addEventListener('click', () => switchView('table'));
            
            // Gestion du formulaire de création
            document.getElementById('createPermissionForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const permissionName = formData.get('name') || 'Nouvelle permission';
                
                showNotification(`Permission "${permissionName}" créée avec succès`, 'success');
                closeCreateModal();
                this.reset();
                filterPermissions(); // Rafraîchir la liste
            });
            
            // Initialiser le compteur
            updatePermissionCount();
        });
        
        // Gestion des vues
        function switchView(view) {
            currentView = view;
            
            if (view === 'grid') {
                document.getElementById('gridView').classList.remove('hidden');
                document.getElementById('tableView').classList.add('hidden');
                document.getElementById('viewGridBtn').classList.add('bg-white', 'shadow-sm', 'text-gray-800');
                document.getElementById('viewGridBtn').classList.remove('text-gray-600');
                document.getElementById('viewTableBtn').classList.remove('bg-white', 'shadow-sm', 'text-gray-800');
                document.getElementById('viewTableBtn').classList.add('text-gray-600');
            } else {
                document.getElementById('gridView').classList.add('hidden');
                document.getElementById('tableView').classList.remove('hidden');
                document.getElementById('viewTableBtn').classList.add('bg-white', 'shadow-sm', 'text-gray-800');
                document.getElementById('viewTableBtn').classList.remove('text-gray-600');
                document.getElementById('viewGridBtn').classList.remove('bg-white', 'shadow-sm', 'text-gray-800');
                document.getElementById('viewGridBtn').classList.add('text-gray-600');
                
                // Charger les données dans le tableau si nécessaire
                loadTableView();
            }
        }
        
        // Filtrage des permissions
        function filterPermissions() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const category = document.getElementById('categoryFilter').value;
            const type = document.getElementById('typeFilter').value;
            const status = document.getElementById('statusFilter').value;
            
            const permissions = document.querySelectorAll('.permission-card');
            let visibleCount = 0;
            
            // Mettre à jour les tags de filtre actifs
            updateActiveFilters(searchTerm, category, type, status);
            
            permissions.forEach(card => {
                const name = card.querySelector('h3').textContent.toLowerCase();
                const cardCategory = card.dataset.category;
                const cardType = card.dataset.type;
                const cardStatus = card.dataset.status;
                
                const matchesSearch = !searchTerm || name.includes(searchTerm);
                const matchesCategory = !category || cardCategory === category;
                const matchesType = !type || cardType === type;
                const matchesStatus = !status || cardStatus === status;
                
                if (matchesSearch && matchesCategory && matchesType && matchesStatus) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });
            
            // Mettre à jour le compteur
            document.getElementById('permissionCount').textContent = `${visibleCount} permission${visibleCount !== 1 ? 's' : ''} trouvée${visibleCount !== 1 ? 's' : ''}`;
        }
        
        function updateActiveFilters(searchTerm, category, type, status) {
            const activeFiltersContainer = document.getElementById('activeFilters');
            activeFiltersContainer.innerHTML = '';
            
            const filters = [];
            
            if (searchTerm) {
                filters.push({
                    text: `Recherche: "${searchTerm}"`,
                    type: 'search',
                    value: searchTerm
                });
            }
            
            if (category) {
                const categoryNames = {
                    'content': 'Contenu',
                    'users': 'Utilisateurs',
                    'system': 'Système',
                    'media': 'Médias',
                    'settings': 'Paramètres',
                    'reports': 'Rapports'
                };
                filters.push({
                    text: `Catégorie: ${categoryNames[category] || category}`,
                    type: 'category',
                    value: category
                });
            }
            
            if (type) {
                const typeNames = {
                    'create': 'Création',
                    'read': 'Lecture',
                    'update': 'Modification',
                    'delete': 'Suppression',
                    'manage': 'Gestion'
                };
                filters.push({
                    text: `Type: ${typeNames[type] || type}`,
                    type: 'type',
                    value: type
                });
            }
            
            if (status) {
                const statusNames = {
                    'active': 'Actif',
                    'inactive': 'Inactif',
                    'system': 'Système'
                };
                filters.push({
                    text: `Statut: ${statusNames[status] || status}`,
                    type: 'status',
                    value: status
                });
            }
            
            if (filters.length > 0) {
                activeFiltersContainer.classList.remove('hidden');
                
                filters.forEach(filter => {
                    const tag = document.createElement('div');
                    tag.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800';
                    tag.innerHTML = `
                        ${filter.text}
                        <button onclick="removeFilter('${filter.type}')" class="ml-2 text-blue-600 hover:text-blue-800">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    activeFiltersContainer.appendChild(tag);
                });
            } else {
                activeFiltersContainer.classList.add('hidden');
            }
        }
        
        function removeFilter(filterType) {
            switch(filterType) {
                case 'search':
                    document.getElementById('searchInput').value = '';
                    break;
                case 'category':
                    document.getElementById('categoryFilter').value = '';
                    break;
                case 'type':
                    document.getElementById('typeFilter').value = '';
                    break;
                case 'status':
                    document.getElementById('statusFilter').value = '';
                    break;
            }
            filterPermissions();
        }
        
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('typeFilter').value = '';
            document.getElementById('statusFilter').value = '';
            filterPermissions();
        }
        
        // Modal: Création
        function openCreateModal() {
            document.getElementById('createPermissionModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeCreateModal() {
            document.getElementById('createPermissionModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Modal: Suppression
        function confirmDeletePermission(permissionId) {
            currentPermissionId = permissionId;
            document.getElementById('deletePermissionWarning').textContent = 
                `La permission "${permissionId}" sera définitivement supprimée.`;
            document.getElementById('deletePermissionModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeDeletePermissionModal() {
            document.getElementById('deletePermissionModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            currentPermissionId = null;
        }
        
        function deletePermission() {
            // Simulation de suppression
            console.log(`Suppression de la permission: ${currentPermissionId}`);
            
            showNotification(`Permission "${currentPermissionId}" supprimée avec succès`, 'success');
            closeDeletePermissionModal();
            
            // Mettre à jour l'affichage
            setTimeout(() => {
                filterPermissions();
            }, 300);
        }
        
        // Autres modals (simplifiés)
        function openEditPermission(permissionId) {
            showNotification(`Édition de la permission: ${permissionId}`, 'info');
        }
        
        function openAssignModal(permissionId) {
            showNotification(`Assignation de la permission: ${permissionId}`, 'info');
        }
        
        function openCategoriesModal() {
            showNotification('Gestion des catégories de permissions', 'info');
        }
        
        function openImportModal() {
            showNotification('Importation des permissions', 'info');
        }
        
        function openExportModal() {
            showNotification('Exportation des permissions', 'info');
        }
        
        function openBatchAssignModal() {
            showNotification('Assignation en lot des permissions', 'info');
        }
        
        function generateDefaultPermissions() {
            showNotification('Permissions par défaut générées avec succès', 'success');
        }
        
        function openAuditLog() {
            showNotification('Ouverture du journal d\'audit', 'info');
        }
        
        function exportToCSV() {
            showNotification('Export CSV en cours...', 'info');
        }
        
        // Helper functions
        function updatePermissionCount() {
            const total = document.querySelectorAll('.permission-card').length - 1; // -1 pour la carte d'ajout
            document.getElementById('permissionCount').textContent = `${total} permission${total !== 1 ? 's' : ''} trouvée${total !== 1 ? 's' : ''}`;
        }
        
        function loadTableView() {
            // Simuler le chargement des données dans le tableau
            const tbody = document.querySelector('#tableView tbody');
            if (tbody && tbody.children.length === 0) {
                // Ajouter des données de démonstration
                const permissions = [
                    {
                        name: 'contenu.create',
                        category: 'Contenu',
                        type: 'Création',
                        description: 'Permet de créer de nouveaux contenus',
                        roles: 3,
                        status: 'Actif'
                    },
                    {
                        name: 'users.delete',
                        category: 'Utilisateurs',
                        type: 'Suppression',
                        description: 'Permet de supprimer des utilisateurs',
                        roles: 2,
                        status: 'Actif'
                    },
                    {
                        name: 'system.backup',
                        category: 'Système',
                        type: 'Gestion',
                        description: 'Permet de gérer les sauvegardes système',
                        roles: 1,
                        status: 'Système'
                    }
                ];
                
                permissions.forEach(perm => {
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">${perm.name}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">${perm.category}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">${perm.type}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">${perm.description}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900">${perm.roles} rôle${perm.roles !== 1 ? 's' : ''}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium ${perm.status === 'Actif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'} rounded-full">
                                ${perm.status}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-purple-600 hover:text-purple-900">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            }
        }
        
        // Système de notifications
        function showNotification(message, type = 'info') {
            // Créer notification
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transform translate-x-full transition-transform duration-300 ${
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
        
        // Fermer modals avec ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCreateModal();
                closeDeletePermissionModal();
            }
        });
    </script>
</body>
</html>