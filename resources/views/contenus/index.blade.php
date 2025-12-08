@extends('layout')

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
<!-- Configuration Tailwind -->
<script>
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
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
            }
        }
    }
</script>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<style>
    .animate-fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .hover-lift {
        transition: all 0.3s ease;
    }
    
    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        padding: 8px 12px;
        border: 1px solid #d1d5db;
    }

    .dataTables_wrapper .dataTables_length select {
        border-radius: 8px;
        padding: 6px 8px;
        border: 1px solid #d1d5db;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-file-alt text-primary-500 mr-3"></i>
                    Gestion des contenus
                </h1>
                <p class="text-gray-600 mt-2">Liste de tous les contenus du système</p>
            </div>
            <a href="{{ route('contenus.create') }}" 
               class="flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all duration-200 shadow-lg shadow-green-500/25 hover:shadow-green-500/40 font-semibold">
                <i class="fas fa-plus mr-2"></i>
                Nouveau contenu
            </a>
        </div>

        <!-- Cartes de statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover-lift">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-primary-50 text-primary-600 mr-4">
                        <i class="fas fa-file text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total contenus</p>
                        <p class="text-2xl font-bold text-gray-800">{{ count($contenus) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover-lift">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-green-50 text-green-600 mr-4">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Contenus valides</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $contenus->where('statut', 'valide')->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover-lift">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-amber-50 text-amber-600 mr-4">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Auteurs</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $contenus->pluck('utilisateur_id')->unique()->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover-lift">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-purple-50 text-purple-600 mr-4">
                        <i class="fas fa-language text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Langues</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $contenus->pluck('langue_id')->unique()->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

<div class="relative mb-12">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-4 bg-gray-50 text-sm text-gray-500">
                    <i class="fas fa-table mr-2"></i>
                    Liste des contenus
                </span>
            </div>
        </div>

        <!-- Tableau -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <table id="contenusTable" class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-heading text-primary-500 mr-2 text-sm"></i>
                                    Titre
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-user-edit text-primary-500 mr-2 text-sm"></i>
                                    Auteur
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-tag text-primary-500 mr-2 text-sm"></i>
                                    Statut
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-primary-500 mr-2 text-sm"></i>
                                    Région
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-globe text-primary-500 mr-2 text-sm"></i>
                                    Langue
                                </div>
                            </th>
                            <!-- <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-layer-group text-primary-500 mr-2 text-sm"></i>
                                    Type
                                </div>
                            </th> -->
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt text-primary-500 mr-2 text-sm"></i>
                                    Date création
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-cogs text-primary-500 mr-2 text-sm"></i>
                                    Actions
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($contenus as $contenu)
                        <tr class="hover:bg-gray-50/80 transition-all duration-200 group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-primary-100 rounded-lg flex items-center justify-center text-primary-600 mr-3">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900">{{ Str::limit($contenu->titre, 30) }}</div>
                                        <div class="text-xs text-gray-500 mt-1">{{ Str::limit($contenu->texte, 40) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-3">
                                        <i class="fas fa-user text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-900">
                                            {{ $contenu->utilisateur->prenom ?? '-' }} {{ $contenu->utilisateur->nom ?? '' }}
                                        </div>
                                        <div class="text-xs text-gray-500">{{ $contenu->utilisateur->email ?? '' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusConfig = [
                                        'Actif' => ['class' => 'bg-emerald-100 text-emerald-800 border-emerald-200', 'icon' => 'check-circle'],
                                        'Inactif' => ['class' => 'bg-rose-100 text-rose-800 border-rose-200', 'icon' => 'times-circle'],
                                        'Brouillon' => ['class' => 'bg-amber-100 text-amber-800 border-amber-200', 'icon' => 'edit'],
                                        'En attente' => ['class' => 'bg-blue-100 text-blue-800 border-blue-200', 'icon' => 'clock'],
                                        'Publié' => ['class' => 'bg-green-100 text-green-800 border-green-200', 'icon' => 'globe'],
                                    ];
                                    $statut = $contenu->statut ?? 'Brouillon';
                                    $config = $statusConfig[$statut] ?? $statusConfig['Brouillon'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $config['class'] }}">
                                    <i class="fas fa-{{ $config['icon'] }} mr-1 text-xs"></i>
                                    {{ $statut }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 mr-3">
                                        <i class="fas fa-map-marker-alt text-xs"></i>
                                    </div>
                                    <div class="text-sm text-gray-900">
                                        {{ $contenu->region->nom_region ?? '-' }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 mr-3">
                                        <i class="fas fa-language text-xs"></i>
                                    </div>
                                    <div class="text-sm text-gray-900">
                                        {{ $contenu->langue->nom_langue ?? '-' }}
                                    </div>
                                </div>
                            </td>
                            <!-- <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 mr-3">
                                        <i class="fas fa-tag text-xs"></i>
                                    </div>
                                    <div class="text-sm text-gray-900">
                                        {{ $contenu->typecontenu->nom_contenu ?? '-' }}
                                    </div>
                                </div>
                            </td> -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 mr-3">
                                        <i class="fas fa-calendar text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($contenu->date_creation)->format('d/m/Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($contenu->date_creation)->format('H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-1">
                                    <!-- Bouton Voir (show) - Bleu -->
                                    <a href="{{ route('contenus.show', $contenu->id) }}" 
                                    class="inline-flex items-center p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition-all duration-200 border border-blue-200 hover:border-blue-300 group/action"
                                    title="Voir détails">
                                        <i class="fas fa-eye w-4 h-4 group-hover/action:scale-110 transition-transform"></i>
                                    </a>
                                    
                                    <!-- Bouton Modifier (edit) - Orange/Ambre -->
                                    <a href="{{ route('contenus.edit', $contenu->id) }}" 
                                    class="inline-flex items-center p-2 text-amber-600 bg-amber-50 hover:bg-amber-100 rounded-lg transition-all duration-200 border border-amber-200 hover:border-amber-300 group/action"
                                    title="Modifier">
                                        <i class="fas fa-edit w-4 h-4 group-hover/action:scale-110 transition-transform"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer (destroy) - Rouge -->
                                    <form action="{{ route('contenus.destroy', $contenu->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-all duration-200 border border-red-200 hover:border-red-300 group/action"
                                                title="Supprimer"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                            <i class="fas fa-trash-alt w-4 h-4 group-hover/action:scale-110 transition-transform"></i>
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
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
    <div class="bg-white rounded-2xl max-w-md w-full p-6">
        <div class="flex items-center mb-4">
            <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 text-red-600">
                <i class="fas fa-exclamation-triangle text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900">Confirmer la suppression</h3>
            </div>
        </div>
        <div class="mt-2">
            <p class="text-sm text-gray-500">Êtes-vous sûr de vouloir supprimer ce contenu ? Cette action est irréversible.</p>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
            <button id="cancelDelete" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-all duration-200 font-medium">
                Annuler
            </button>
            <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-200 font-medium">
                Supprimer
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialisation de DataTables
        var table = $('#contenusTable').DataTable({
            paging: true,
            pageLength: 10,
            lengthChange: true,
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
            },
            dom: '<"flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-4 sm:space-y-0"<"flex"l><"flex"f>>rt<"flex flex-col sm:flex-row justify-between items-start sm:items-center mt-4 space-y-4 sm:space-y-0"<"flex"i><"flex"p>>',
            initComplete: function() {
                $('.dataTables_length select').addClass('border border-gray-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500');
                $('.dataTables_filter input').addClass('border border-gray-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-primary-500');
            }
        });

        // Recherche personnalisée
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Gestion de la suppression avec confirmation
        $('form').on('submit', function(e) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')) {
                e.preventDefault();
            }
        });
    });
</script>
@endsection