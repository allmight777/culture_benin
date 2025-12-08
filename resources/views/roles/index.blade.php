@extends('layout')
@section('title')
<div class="row">
  <div class="col-sm-6"><h3 class="mb-0">Rôles</h3></div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-end">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Rôles</li>
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
    <title>Gestion des Rôles - Culture Bénin Admin</title>
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
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
     <div class="flex items-center space-x-4">                
                    <!-- Bouton Créer -->
                    <button onclick="openCreateModal()" 
                            class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg font-medium flex items-center space-x-2 transition-all duration-200 hover:shadow-lg">
                        <i class="fas fa-plus"></i>
                        <span>Nouveau Rôle</span>
                    </button>
                </div>
    <div class="container mx-auto px-4 py-8">

        <!-- Tableau des rôles -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <span>Rôle</span>
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <i class="fas fa-sort"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Permissions
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Utilisateurs
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Statut
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Rôle 1: Super Admin -->
                        <tr class="hover:bg-blue-50/30 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-crown text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">Super Admin</div>
                                        <div class="text-xs text-gray-500">Niveau 1</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 max-w-xs">Accès complet à toutes les fonctionnalités du système. Peut créer/modifier/supprimer tous les éléments.</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1 max-w-xs">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">All Permissions</span>
                                </div>
                                <div class="text-xs text-gray-500 mt-1">16 permissions</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">1</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-400 to-green-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">2</div>
                                    </div>
                                    <div class="ml-3 text-sm text-gray-900 font-medium">2</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    <i class="fas fa-circle text-red-500 mr-1"></i>
                                    Système
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <button onclick="openViewModal('super-admin')" 
                                            class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="openEditModal('super-admin')" 
                                            class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                                            title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="openPermissionsModal('super-admin')" 
                                            class="text-purple-600 hover:text-purple-900 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200"
                                            title="Permissions">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button disabled
                                            class="text-gray-400 p-2 cursor-not-allowed"
                                            title="Non supprimable">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Rôle 2: Administrateur -->
                        <tr class="hover:bg-blue-50/30 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-user-tie text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">Administrateur</div>
                                        <div class="text-xs text-gray-500">Niveau 2</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 max-w-xs">Gestion complète des contenus et utilisateurs. Accès limité aux paramètres système.</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1 max-w-xs">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Gestion Contenu</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Gestion Utilisateurs</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Accès Statistiques</span>
                                </div>
                                <div class="text-xs text-gray-500 mt-1">12 permissions</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-400 to-green-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">1</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">2</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pink-400 to-pink-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">3</div>
                                    </div>
                                    <div class="ml-3 text-sm text-gray-900 font-medium">3</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-circle text-green-500 mr-1"></i>
                                    Actif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <button onclick="openViewModal('administrateur')" 
                                            class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="openEditModal('administrateur')" 
                                            class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="openPermissionsModal('administrateur')" 
                                            class="text-purple-600 hover:text-purple-900 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button onclick="confirmDelete('administrateur')" 
                                            class="text-red-600 hover:text-red-900 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Rôle 3: Éditeur -->
                        <tr class="hover:bg-blue-50/30 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-edit text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">Éditeur</div>
                                        <div class="text-xs text-gray-500">Niveau 3</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 max-w-xs">Peut créer et modifier des contenus, mais ne peut pas gérer les utilisateurs ou les paramètres.</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1 max-w-xs">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Créer Contenu</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Modifier Contenu</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Voir Statistiques</span>
                                </div>
                                <div class="text-xs text-gray-500 mt-1">8 permissions</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">1</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-teal-400 to-teal-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">2</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">3</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-400 to-indigo-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">4</div>
                                    </div>
                                    <div class="ml-3 text-sm text-gray-900 font-medium">4</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-circle text-green-500 mr-1"></i>
                                    Actif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <button onclick="openViewModal('editeur')" 
                                            class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="openEditModal('editeur')" 
                                            class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="openPermissionsModal('editeur')" 
                                            class="text-purple-600 hover:text-purple-900 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button onclick="confirmDelete('editeur')" 
                                            class="text-red-600 hover:text-red-900 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Rôle 4: Lecteur -->
                        <tr class="hover:bg-blue-50/30 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-eye text-white"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">Lecteur</div>
                                        <div class="text-xs text-gray-500">Niveau 4</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 max-w-xs">Accès en lecture seule. Peut visualiser les contenus mais ne peut rien modifier.</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1 max-w-xs">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Voir Contenu</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Voir Statistiques</span>
                                </div>
                                <div class="text-xs text-gray-500 mt-1">4 permissions</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">1</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">2</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">3</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">4</div>
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white flex items-center justify-center text-white text-xs font-bold">5</div>
                                    </div>
                                    <div class="ml-3 text-sm text-gray-900 font-medium">16</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-circle text-green-500 mr-1"></i>
                                    Actif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <button onclick="openViewModal('lecteur')" 
                                            class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="openEditModal('lecteur')" 
                                            class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="openPermissionsModal('lecteur')" 
                                            class="text-purple-600 hover:text-purple-900 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button onclick="confirmDelete('lecteur')" 
                                            class="text-red-600 hover:text-red-900 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Affichage de <span class="font-medium">1</span> à <span class="font-medium">4</span> sur <span class="font-medium">4</span> rôles
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            Précédent
                        </button>
                        <button class="px-3 py-1 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700">
                            1
                        </button>
                        <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Suivant
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats et informations -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <!-- Card 1: Rôle le plus utilisé -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Rôle le plus utilisé</h3>
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-white"></i>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-eye text-white"></i>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">Lecteur</div>
                        <div class="text-sm text-gray-500">16 utilisateurs</div>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="text-sm text-gray-500">Ratio d'utilisation</div>
                    <div class="flex items-center mt-2">
                        <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-600 rounded-full" style="width: 64%"></div>
                        </div>
                        <div class="ml-3 text-sm font-semibold text-blue-600">64%</div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Permissions par défaut -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Permissions moyennes</h3>
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-key text-white"></i>
                    </div>
                </div>
                <div class="text-center mb-4">
                    <div class="text-3xl font-bold text-gray-900">10</div>
                    <div class="text-sm text-gray-500">Permissions par rôle</div>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Super Admin</span>
                        <span class="text-sm font-semibold text-red-600">16</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Administrateur</span>
                        <span class="text-sm font-semibold text-blue-600">12</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Éditeur</span>
                        <span class="text-sm font-semibold text-green-600">8</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Lecteur</span>
                        <span class="text-sm font-semibold text-gray-600">4</span>
                    </div>
                </div>
            </div>

            <!-- Card 3: Actions rapides -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Actions rapides</h3>
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-bolt text-white"></i>
                    </div>
                </div>
                <div class="space-y-3">
                    <button onclick="openPermissionsModal('all')" 
                            class="w-full flex items-center justify-between p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-key text-purple-600"></i>
                            <span class="font-medium text-gray-800">Gérer toutes les permissions</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </button>
                    
                    <button onclick="openImportModal()" 
                            class="w-full flex items-center justify-between p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-import text-blue-600"></i>
                            <span class="font-medium text-gray-800">Importer des rôles</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </button>
                    
                    <button onclick="openExportModal()" 
                            class="w-full flex items-center justify-between p-3 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-export text-green-600"></i>
                            <span class="font-medium text-gray-800">Exporter les rôles</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </button>
                    
                    <button onclick="openAuditModal()" 
                            class="w-full flex items-center justify-between p-3 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-colors duration-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-history text-yellow-600"></i>
                            <span class="font-medium text-gray-800">Journal d'audit</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: Création de rôle -->
    <div id="createRoleModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl modal-enter">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Créer un nouveau rôle</h3>
                                <p class="text-sm text-gray-500">Définissez les paramètres du rôle</p>
                            </div>
                        </div>
                        <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Form -->
                <form id="createRoleForm" class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nom du rôle -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Nom du rôle *</label>
                            <input type="text" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                   placeholder="Ex: Modérateur">
                        </div>
                        
                        <!-- Niveau -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Niveau de permission *</label>
                            <select required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white">
                                <option value="">Sélectionner un niveau</option>
                                <option value="1">Niveau 1 (Administrateur système)</option>
                                <option value="2">Niveau 2 (Administrateur)</option>
                                <option value="3">Niveau 3 (Éditeur)</option>
                                <option value="4">Niveau 4 (Lecteur)</option>
                                <option value="5">Niveau 5 (Invité)</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea rows="3" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                  placeholder="Décrivez le rôle et ses responsabilités..."></textarea>
                    </div>
                    
                    <!-- Permissions -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Permissions</label>
                        <div class="border border-gray-300 rounded-lg p-4 max-h-60 overflow-y-auto">
                            <div class="space-y-3">
                                <!-- Catégorie 1 -->
                                <div>
                                    <div class="font-medium text-gray-700 mb-2">Gestion des contenus</div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                        <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Créer du contenu</span>
                                        </label>
                                        <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Modifier le contenu</span>
                                        </label>
                                        <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Supprimer du contenu</span>
                                        </label>
                                        <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Publier du contenu</span>
                                        </label>
                                    </div>
                                </div>
                                
                                <!-- Catégorie 2 -->
                                <div>
                                    <div class="font-medium text-gray-700 mb-2">Gestion des utilisateurs</div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                        <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Voir les utilisateurs</span>
                                        </label>
                                        <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Créer des utilisateurs</span>
                                        </label>
                                        <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Modifier les utilisateurs</span>
                                        </label>
                                        <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                            <input type="checkbox" class="rounded text-blue-600 focus:ring-blue-500">
                                            <span class="text-sm text-gray-700">Supprimer des utilisateurs</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Statut -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Statut</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="status" value="active" checked class="text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Actif</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="status" value="inactive" class="text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Inactif</span>
                            </label>
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
                        <button type="submit" form="createRoleForm"
                                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 font-medium transition-all duration-200 hover:shadow-lg">
                            Créer le rôle
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL: Suppression -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-y-auto">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md modal-enter">
                <div class="p-6">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-red-500 to-red-600 rounded-full">
                        <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Supprimer le rôle</h3>
                    <p class="text-gray-600 text-center mb-6">
                        Êtes-vous sûr de vouloir supprimer ce rôle ? Cette action est irréversible.
                        <span class="block text-sm text-red-600 font-medium mt-2" id="deleteWarning">
                            Les utilisateurs associés seront affectés.
                        </span>
                    </p>
                    <div class="flex items-center justify-center space-x-3">
                        <button onclick="closeDeleteModal()" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                            Annuler
                        </button>
                        <button onclick="deleteRole()" 
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
        let currentRoleId = null;
        
        // Modal: Création
        function openCreateModal() {
            document.getElementById('createRoleModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeCreateModal() {
            document.getElementById('createRoleModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Modal: Suppression
        function confirmDelete(roleId) {
            currentRoleId = roleId;
            const roleName = getRoleName(roleId);
            document.getElementById('deleteWarning').textContent = 
                `Le rôle "${roleName}" sera définitivement supprimé.`;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            currentRoleId = null;
        }
        
        function deleteRole() {
            // Simulation de suppression
            console.log(`Suppression du rôle: ${currentRoleId}`);
            
            // Afficher notification
            showNotification(`Rôle "${getRoleName(currentRoleId)}" supprimé avec succès`, 'success');
            
            closeDeleteModal();
        }
        
        // Autres modals (simplifiés)
        function openViewModal(roleId) {
            showNotification(`Affichage du rôle: ${getRoleName(roleId)}`, 'info');
        }
        
        function openEditModal(roleId) {
            showNotification(`Édition du rôle: ${getRoleName(roleId)}`, 'info');
        }
        
        function openPermissionsModal(roleId) {
            showNotification(`Gestion des permissions pour: ${getRoleName(roleId)}`, 'info');
        }
        
        // Helper functions
        function getRoleName(roleId) {
            const roles = {
                'super-admin': 'Super Admin',
                'administrateur': 'Administrateur',
                'editeur': 'Éditeur',
                'lecteur': 'Lecteur',
                'all': 'tous les rôles'
            };
            return roles[roleId] || roleId;
        }
        
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
        
        // Gestion du formulaire de création
        document.getElementById('createRoleForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulation de création
            const formData = new FormData(this);
            const roleName = formData.get('name') || 'Nouveau rôle';
            
            showNotification(`Rôle "${roleName}" créé avec succès`, 'success');
            closeCreateModal();
            this.reset();
        });
        
        // Fermer modals avec ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCreateModal();
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>
@endsection
