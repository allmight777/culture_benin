@extends('layout')
@section('content')
<!-- IMPORTANT: définir la config Tailwind AVANT d'inclure le CDN -->
<script>
    window.tailwind = window.tailwind || {};
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: {
                        50: '#f0f9ff',
                        100: '#e0f2fe',
                        200: '#bae6fd',
                        300: '#7dd3fc',
                        400: '#38bdf8',
                        500: '#0ea5e9',
                        600: '#0284c7',
                        700: '#0369a1',
                        800: '#075985',
                        900: '#0c4a6e',
                    },
                    secondary: {
                        50: '#f5f3ff',
                        100: '#ede9fe',
                        200: '#ddd6fe',
                        300: '#c4b5fd',
                        400: '#a78bfa',
                        500: '#8b5cf6',
                        600: '#7c3aed',
                        700: '#6d28d9',
                        800: '#5b21b6',
                        900: '#4c1d95',
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
            }
        }
    }
</script>

<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- jQuery (doit être avant DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="" crossorigin="anonymous"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<style>
    .animate-bounce-slow {
        animation: bounce-slow 3s infinite;
    }
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .progress-bar {
        height: 8px;
        border-radius: 4px;
        overflow: hidden;
    }
    .progress-bar-fill {
        height: 100%;
        transition: width 0.6s ease;
    }

    /* Style pour DataTables */
    #mediasTable {
        width: 100% !important;
        border-collapse: separate;
        border-spacing: 0;
    }

    /* Styles personnalisés pour DataTables */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #e5e7eb !important;
        border-radius: 0.375rem !important;
        margin-left: 0.25rem !important;
        padding: 0.5rem 0.75rem !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #0ea5e9 !important;
        color: white !important;
        border-color: #0ea5e9 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #f3f4f6 !important;
        border-color: #d1d5db !important;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        padding: 0.5rem;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        padding: 0.5rem;
        margin-left: 0.5rem;
    }

    /* Animation pour les boutons */
    .btn-action {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-action::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transition: all 0.3s ease;
        transform: translate(-50%, -50%);
    }

    .btn-action:hover::after {
        width: 100px;
        height: 100px;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête avec titre et bouton -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-images text-primary-500 mr-3"></i>
                    Gestion des Médias
                </h1>
                <p class="text-gray-600 mt-2">Liste de tous les médias disponibles</p>
            </div>
            <a href="{{ route('medias.create') }}" 
                class="flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all duration-200 shadow-lg shadow-green-500/25 hover:shadow-green-500/40 font-semibold">
                <i class="fas fa-plus mr-2"></i>
                Ajouter un média
            </a>
        </div>

        <!-- Section des cartes d'information -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-3">
            <!-- Carte statistiques -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-200 p-6 transform hover:scale-105 tion-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-chart-bar text-primary-500 mr-2"></i>
                        Statistiques
                    </h3>
                    <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-chart-pie text-primary-600"></i>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-3 bg-primary-50 rounded-lg">
                        <span class="text-sm font-medium text-gray-700">Total des médias:</span>
                        <span class="font-bold text-primary-600 text-lg">{{ $medias->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-amber-50 rounded-lg">
                        <span class="text-sm font-medium text-gray-700">Dernier ajout:</span>
                        <span class="text-sm font-semibold text-amber-600">
                            {{ $medias->last() ? \Carbon\Carbon::parse($medias->last()->created_at)->diffForHumans() : 'N/A' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Carte actions rapides -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-200 p-6 transform hover:scale-105 transition-transform duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-bolt text-amber-500 mr-2"></i>
                        Actions rapides
                    </h3>
                    <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-rocket text-amber-600"></i>
                    </div>
                </div>
                <div class="space-y-3">
                    <a href="{{ route('medias.create') }}" 
                       class="flex items-center justify-between p-3 bg-gradient-to-r from-primary-50 to-blue-50 rounded-lg hover:from-primary-100 hover:to-blue-100 transition-all duration-200 group">
                        <div class="flex items-center">
                            <i class="fas fa-plus-circle text-primary-500 mr-3 group-hover:text-primary-600"></i>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Ajouter un média</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-primary-500"></i>
                    </a>
                    <a href="#" 
                       class="flex items-center justify-between p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg hover:from-green-100 hover:to-emerald-100 transition-all duration-200 group">
                        <div class="flex items-center">
                            <i class="fas fa-download text-green-500 mr-3 group-hover:text-green-600"></i>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Exporter la liste</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-500"></i>
                    </a>
                </div>
            </div>

            <!-- Carte aide -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-200 p-6 transform hover:scale-105 transition-transform duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-question-circle text-green-500 mr-2"></i>
                        Aide & Support
                    </h3>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-life-ring text-green-600"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                    Gérez facilement vos médias avec les actions disponibles. Utilisez les boutons pour voir, modifier ou supprimer vos fichiers.
                </p>
                <div class="flex items-center text-xs text-gray-500">
                    <i class="fas fa-info-circle mr-2"></i>
                    Cliquez sur les en-têtes pour trier le tableau
                </div>
            </div>
        </div>

        <!-- Séparateur visuel -->
        <div class="relative mb-12">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-4 bg-gray-50 text-sm text-gray-500">
                    <i class="fas fa-table mr-2"></i>
                    Liste des médias
                </span>
            </div>
        </div>

        <!-- Carte principale du tableau -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                    <table id="mediasTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-image mr-2 text-primary-500"></i>
                                        Chemin du fichier
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-align-left mr-2 text-primary-500"></i>
                                        Description
                                    </div>
                                </th>
                                 <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-tag mr-2 text-primary-500"></i>
                                        Type Media
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-weight-hanging mr-2 text-primary-500"></i>
                                        Taille
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-cogs mr-2 text-primary-500"></i>
                                        Actions
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($medias as $media)
                            <tr class="hover:bg-gray-50 transition-all duration-200 group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow duration-200">
                                            <i class="fas fa-file text-primary-600 text-lg"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900 truncate max-w-xs group-hover:text-primary-700 transition-colors duration-200">
                                                {{ $media->chemin }}
                                            </div>
                                            <div class="text-xs text-gray-500 flex items-center mt-1">
                                                <i class="fas fa-hashtag mr-1"></i>
                                                ID: {{ $media->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-md group-hover:text-gray-700 transition-colors duration-200">
                                        {{ $media->description ?: 
                                            '<span class="text-gray-400 italic">Aucune description</span>' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $media->type_media?->nom_media ?? '—' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $media->taille }} Ko
                                    </div>
                                </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-1">
                                    <!-- Bouton Voir (show) - Bleu -->
                                    <a href="{{ route('medias.show', $media->id) }}" 
                                    class="inline-flex items-center p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition-all duration-200 border border-blue-200 hover:border-blue-300"
                                    title="Voir détails">
                                        <i class="fas fa-eye w-4 h-4"></i>
                                    </a>
                                    
                                    <!-- Bouton Modifier (edit) - Orange/Ambre -->
                                    <a href="{{ route('medias.edit', $media->id) }}" 
                                    class="inline-flex items-center p-2 text-amber-600 bg-amber-50 hover:bg-amber-100 rounded-lg transition-all duration-200 border border-amber-200 hover:border-amber-300"
                                    title="Modifier">
                                        <i class="fas fa-edit w-4 h-4"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer (destroy) - Rouge -->
                                    <form action="{{ route('medias.destroy', $media->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-all duration-200 border border-red-200 hover:border-red-300"
                                                title="Supprimer"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                            <i class="fas fa-trash-alt w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>   

<!-- Initialisation DataTables -->
<script>
    $(document).ready(function() {
        $('#mediasTable').DataTable({
            paging: true,
            pageLength: 10,
            lengthChange: true,
            language: {
                search: "Rechercher:",
                lengthMenu: "Afficher _MENU_ éléments par page",
                info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                infoEmpty: "Affichage de 0 à 0 sur 0 éléments",
                infoFiltered: "(filtrés depuis _MAX_ éléments au total)",
                paginate: {
                    first: "Premier",
                    last: "Dernier",
                    next: "Suivant",
                    previous: "Précédent"
                }
            },
            dom: '<"flex flex-col lg:flex-row justify-between items-center lg:items-start mb-6"lfr>t<"flex flex-col lg:flex-row justify-between items-center mt-6"ip>',
            initComplete: function() {
                // Ajouter des classes Tailwind aux éléments de contrôle
                $('.dataTables_length select').addClass('border border-gray-300 rounded-lg px-4 py-2 shadow-sm');
                $('.dataTables_filter input').addClass('border border-gray-300 rounded-lg px-4 py-2 ml-2 shadow-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500');
                
                // Style supplémentaire pour les contrôles
                $('.dataTables_length').addClass('text-sm text-gray-600');
                $('.dataTables_filter').addClass('text-sm text-gray-600');
            }
        });
    });
</script>
@endsection