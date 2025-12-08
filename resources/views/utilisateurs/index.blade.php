@extends('layout')

@section('title')
<div class="flex justify-between items-center">
    <div>
        <ol class="flex items-center space-x-2 text-sm">
            <li><a href="#" class="text-gray-500 hover:text-gray-700">Home</a></li>
            <li class="flex items-center">
                <i class="fas fa-chevron-right text-gray-400 text-xs mx-2"></i>
            </li>
            <li class="text-primary-600 font-medium">Utilisateurs</li>
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
                    sans: ['Inter', 'system-ui', 'sans-serif'],
                },
                animation: {
                    'fade-in': 'fadeIn 0.5s ease-in-out',
                    'slide-in': 'slideIn 0.3s ease-out',
                    'bounce-subtle': 'bounceSubtle 2s infinite',
                }
            }
        }
    }
</script>

<!-- CDN et Styles -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideIn {
        from { transform: translateY(-10px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes bounceSubtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
    }

    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .stats-card {
        position: relative;
        overflow: hidden;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--tw-gradient-from), var(--tw-gradient-to));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stats-card:hover::before {
        opacity: 1;
    }

    .avatar-placeholder {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .action-btn {
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    /* Styles personnalisés pour DataTables */
    .dataTables_wrapper {
        padding: 0 !important;
    }

    .dataTables_filter input {
        border-radius: 10px !important;
        padding: 10px 16px !important;
        border: 1px solid #e5e7eb !important;
        transition: all 0.3s ease !important;
    }

    .dataTables_filter input:focus {
        border-color: #0ea5e9 !important;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1) !important;
    }

    .dataTables_length select {
        border-radius: 10px !important;
        padding: 8px 12px !important;
        border: 1px solid #e5e7eb !important;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête avec bouton d'action -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 animate-fade-in">
                    <i class="fas fa-users text-primary-600 mr-3 animate-bounce-subtle"></i>
                    Utilisateurs
                </h1>
                <p class="text-gray-600 mt-2 animate-fade-in" style="animation-delay: 0.1s;">
                    Gérez les accès et permissions des utilisateurs
                </p>
            </div>
            <a href="{{ route('utilisateurs.create') }}" 
              class="group relative flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all duration-300 shadow-lg shadow-green-500/25 hover:shadow-green-500/40 font-semibold animate-fade-in"
              style="animation-delay: 0.2s;">
                <i class="fas fa-plus mr-2 transition-transform group-hover:rotate-90 duration-300"></i>
                Nouveau Utilisateur
                <div class="absolute inset-0 rounded-xl bg-white opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
            </a>
        </div>

        <!-- Cartes de statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="stats-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover-lift" 
                 style="--tw-gradient-from: #0ea5e9; --tw-gradient-to: #0369a1;">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-primary-50 text-primary-600 mr-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Utilisateurs</p>
                        <p class="text-2xl font-bold text-gray-800">{{ count($utilisateurs) }}</p>
                    </div>
                    <div class="text-green-500 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>
                        2.5%
                    </div>
                </div>
            </div>

            <div class="stats-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover-lift"
                 style="--tw-gradient-from: #dc2626; --tw-gradient-to: #991b1b;">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-red-50 text-red-600 mr-4">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 mb-1">Administrateurs</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $utilisateurs->where('statut', 'actif')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="stats-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover-lift"
                 style="--tw-gradient-from: #d97706; --tw-gradient-to: #92400e;">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-amber-50 text-amber-600 mr-4">
                        <i class="fas fa-user-check text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 mb-1">Modérateurs</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $utilisateurs->where('statut', 'inactif')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="stats-card bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover-lift"
                 style="--tw-gradient-from: #2563eb; --tw-gradient-to: #1e40af;">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-50 text-blue-600 mr-4">
                         <i class="fas fa-eye text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 mb-1">Lecteurs</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $utilisateurs->where('statut', 'Utilisateur')->count() }}</p>
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
                    Liste des utilisateurs
                </span>
            </div>
        </div>

        <!-- Tableau des utilisateurs -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6">
                <table id="utilisateursTable" class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-user-circle text-primary-500 mr-2 text-sm"></i>
                                    Utilisateur
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-primary-500 mr-2 text-sm"></i>
                                    Email
                                </div>
                            </th>
                            <!-- <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-badge-check text-primary-500 mr-2 text-sm"></i>
                                    Statut
                                </div>
                            </th> -->
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-language text-primary-500 mr-2 text-sm"></i>
                                    Langue
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-user-tag text-primary-500 mr-2 text-sm"></i>
                                    Rôle
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-plus text-primary-500 mr-2 text-sm"></i>
                                    Inscription
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
                        @foreach($utilisateurs as $utilisateur)
                        <tr class="hover:bg-gray-50/80 transition-all duration-200 group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        @if($utilisateur->photo)
                                            <img class="h-12 w-12 rounded-full object-cover border-2 border-white shadow-sm group-hover:border-primary-200 transition-colors duration-200" 
                                                 src="{{ asset('images/'.$utilisateur->photo) }}" 
                                                 alt="{{ $utilisateur->prenom }}"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            <div class="h-12 w-12 rounded-full avatar-placeholder flex items-center justify-center text-white font-semibold text-sm hidden">
                                                <i class="fas fa-user text-sm"></i>
                                            </div>
                                        @else
                                            <div class="h-12 w-12 rounded-full avatar-placeholder flex items-center justify-center text-white font-semibold text-sm shadow-sm">
                                                <i class="fas fa-user text-sm"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900 flex items-center">
                                            <i class="fas fa-user text-gray-400 mr-2 text-xs"></i>
                                            {{ $utilisateur->prenom }} {{ $utilisateur->nom }}
                                        </div>
                                        <div class="text-xs text-gray-500 flex items-center mt-1">
                                            <i class="fas fa-id-card text-gray-400 mr-1 text-xs"></i>
                                            ID: {{ $utilisateur->id }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-sm text-gray-900">
                                    <i class="fas fa-at text-gray-400 mr-2 text-xs"></i>
                                    {{ $utilisateur->email }}
                                </div>
                            </td>
                            <!-- <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusConfig = [
                                        'Administrateur' => ['class' => 'bg-red-100 text-red-800 border-red-200 shadow-sm', 'icon' => 'user-shield', 'gradient' => 'from-red-500 to-red-600'],
                                        'Modérateur' => ['class' => 'bg-amber-100 text-amber-800 border-amber-200 shadow-sm', 'icon' => 'user-check', 'gradient' => 'from-amber-500 to-amber-600'],
                                        'Éditeur' => ['class' => 'bg-purple-100 text-purple-800 border-purple-200 shadow-sm', 'icon' => 'user-edit', 'gradient' => 'from-purple-500 to-purple-600'],
                                        'Utilisateur' => ['class' => 'bg-blue-100 text-blue-800 border-blue-200 shadow-sm', 'icon' => 'user', 'gradient' => 'from-blue-500 to-blue-600']
                                    ];
                                    $config = $statusConfig[$utilisateur->statut] ?? $statusConfig['Utilisateur'];
                                @endphp
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold border {{ $config['class'] }} group-hover:shadow-md transition-shadow duration-200">
                                    <i class="fas fa-{{ $config['icon'] }} mr-1.5"></i>
                                    {{ $utilisateur->statut }}
                                </span>
                            </td> -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-sm text-gray-900">
                                    <i class="fas fa-globe text-gray-400 mr-2"></i>
                                    {{ optional($utilisateur->langue)->nom_langue ?? '-' }}
                                </div>
                            </td>
                           
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $roleConfig = [
                                        'Administrateur' => ['class' => 'bg-purple-100 text-purple-800 border-purple-200 shadow-sm', 'icon' => 'crown'],
                                        'Manager' => ['class' => 'bg-orange-100 text-orange-800 border-orange-200 shadow-sm', 'icon' => 'user-tie'],
                                        'Traducteur' => ['class' => 'bg-blue-100 text-blue-800 border-blue-200 shadow-sm', 'icon' => 'language'],
                                        'Utilisateur' => ['class' => 'bg-gray-100 text-gray-800 border-gray-200 shadow-sm', 'icon' => 'user'],
                                        'Lecteur' => ['class' => 'bg-green-100 text-green-800 border-green-200 shadow-sm', 'icon' => 'eye'],
                                        'Moderateur' => ['class' => 'bg-amber-100 text-amber-800 border-amber-200 shadow-sm', 'icon' => 'user-shield'],
                                    ];
                                    $roleName = optional($utilisateur->role)->nom ?? 'Utilisateur';
                                    $config = $roleConfig[$roleName] ?? $roleConfig['Utilisateur'];
                                @endphp
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold border {{ $config['class'] }} group-hover:shadow-md transition-shadow duration-200">
                                    <i class="fas fa-{{ $config['icon'] }} mr-1.5"></i>
                                    {{ $roleName }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-sm text-gray-900">
                                    <i class="fas fa-clock text-gray-400 mr-2"></i>
                                    {{ \Carbon\Carbon::parse($utilisateur->date_inscription)->format('d/m/Y') }}
                                </div>
                                <div class="text-xs text-gray-500 flex items-center mt-1">
                                    <i class="fas fa-history text-gray-400 mr-1 text-xs"></i>
                                    {{ \Carbon\Carbon::parse($utilisateur->date_inscription)->diffForHumans() }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-1">
                                    <!-- Bouton Voir -->
                                    <a href="{{ route('utilisateurs.show', $utilisateur->id) }}" 
                                      class="action-btn inline-flex items-center p-2 text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition-all duration-200 border border-blue-200 hover:border-blue-300 shadow-sm group/action"
                                      title="Voir détails">
                                        <i class="fas fa-eye w-4 h-4 group-hover/action:scale-110 transition-transform"></i>
                                    </a>
                                    
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('utilisateurs.edit', $utilisateur->id)}}" 
                                        class="action-btn inline-flex items-center p-2 text-amber-600 bg-amber-50 hover:bg-amber-100 rounded-lg transition-all duration-200 border border-amber-200 hover:border-amber-300 shadow-sm group/action"
                                        title="Modifier">
                                        <i class="fas fa-edit w-4 h-4 group-hover/action:scale-110 transition-transform"></i>
                                    </a>
                                    
                                    <!-- Bouton Supprimer -->
                                    <button data-id="{{ $utilisateur->id }}" 
                                            data-name="{{ $utilisateur->prenom }} {{ $utilisateur->nom }}"
                                             class="action-btn inline-flex items-center p-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-all duration-200 border border-red-200 hover:border-red-300 shadow-sm btn-delete group/action"
                                             title="Supprimer">
                                        <i class="fas fa-trash-alt w-4 h-4 group-hover/action:scale-110 transition-transform"></i>
                                    </button>
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

<!-- Modal de Suppression -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden animate-fade-in">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 animate-slide-in transform transition-all duration-300">
        <div class="flex items-center mb-4">
            <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 text-red-600">
                <i class="fas fa-exclamation-triangle text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900">Confirmer la suppression</h3>
            </div>
        </div>
        <div class="mt-2">
            <p class="text-sm text-gray-500">Êtes-vous sûr de vouloir supprimer l'utilisateur <span id="userName" class="font-medium text-gray-900"></span> ? Cette action est irréversible.</p>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
            <button id="cancelDelete" class="px-4 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 transition-all duration-200 font-medium">
                Annuler
            </button>
            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2.5 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all duration-200 font-medium shadow-lg shadow-red-600/25 hover:shadow-red-600/40">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Notification -->
<div id="notification" class="fixed top-4 right-4 z-50 hidden">
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-4 max-w-sm animate-slide-in">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
            <div>
                <p id="notificationText" class="text-sm font-medium text-gray-900">Opération réussie</p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialisation de DataTables avec configuration améliorée
        var table = $('#utilisateursTable').DataTable({
            paging: true,
            pageLength: 10,
            lengthChange: true,
            responsive: true,
            autoWidth: false,
            order: [[5, 'desc']], // Tri par date d'inscription décroissante
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
            },
            dom: '<"flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-4 sm:space-y-0"<"flex"l><"flex"f>>rt<"flex flex-col sm:flex-row justify-between items-start sm:items-center mt-4 space-y-4 sm:space-y-0"<"flex"i><"flex"p>>',
            initComplete: function() {
                // Styles personnalisés pour les contrôles DataTables
                $('.dataTables_length select').addClass('border border-gray-200 rounded-xl px-3 py-2 focus:ring-2 focus:ring-primary-500 bg-gray-50 focus:bg-white');
                $('.dataTables_filter input').addClass('border border-gray-200 rounded-xl px-3 py-2 focus:ring-2 focus:ring-primary-500 bg-gray-50 focus:bg-white');
            },
            drawCallback: function() {
                // Réattacher les événements après le redessinage du tableau
                $('.btn-delete').off('click').on('click', handleDeleteClick);
            }
        });

        // Recherche personnalisée
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Filtrage par statut
        $('#statutFilter').on('change', function() {
            table.column(2).search(this.value).draw();
        });

        // Gestion de la suppression
        function handleDeleteClick() {
            var userId = $(this).data('id');
            var userName = $(this).data('name');
            
            $('#userName').text(userName);
            $('#deleteForm').attr('action', '{{ url("utilisateurs") }}/' + userId);
            $('#deleteModal').removeClass('hidden').addClass('flex');
        }

        $('.btn-delete').on('click', handleDeleteClick);

        $('#cancelDelete').on('click', function() {
            $('#deleteModal').removeClass('flex').addClass('hidden');
        });

        // Export des données
        $('#exportBtn').on('click', function() {
            showNotification('Export en cours...', 'info');
            // Implémentez ici la logique d'export
            setTimeout(() => showNotification('Export terminé avec succès', 'success'), 1000);
        });

        // Fonction pour afficher les notifications
        function showNotification(message, type = 'success') {
            var notification = $('#notification');
            var notificationText = $('#notificationText');
            var icon = $('#notification i');
            
            notificationText.text(message);
            
            // Mise à jour des couleurs selon le type
            notification.removeClass('bg-red-50 border-red-200').removeClass('bg-blue-50 border-blue-200').removeClass('bg-green-50 border-green-200');
            
            if (type === 'success') {
                icon.removeClass().addClass('fas fa-check-circle text-green-500 text-xl mr-3');
                notification.addClass('bg-green-50 border-green-200');
            } else if (type === 'error') {
                icon.removeClass().addClass('fas fa-exclamation-circle text-red-500 text-xl mr-3');
                notification.addClass('bg-red-50 border-red-200');
            } else if (type === 'info') {
                icon.removeClass().addClass('fas fa-info-circle text-blue-500 text-xl mr-3');
                notification.addClass('bg-blue-50 border-blue-200');
            }
            
            notification.removeClass('hidden');
            
            setTimeout(function() {
                notification.addClass('hidden');
            }, 3000);
        }

        // Fermer les modals en cliquant à l'extérieur
        $(document).on('click', function(e) {
            if ($(e.target).is('#deleteModal')) {
                $('#deleteModal').removeClass('flex').addClass('hidden');
            }
        });

        // Gestion des erreurs d'image
        $('img').on('error', function() {
            $(this).hide();
            $(this).next('.avatar-placeholder').show();
        });

        // Afficher une notification si l'URL contient un paramètre de succès
        @if(session('success'))
            showNotification('{{ session('success') }}', 'success');
        @endif

        @if(session('error'))
            showNotification('{{ session('error') }}', 'error');
        @endif
    });
</script>
@endsection