@extends('layout')
@section('title')
<div class="row">
  <div class="col-sm-6">
    <div class="flex items-center space-x-3">
      <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg animate-pulse-glow">
        <i class="fas fa-chart-pie text-white text-lg"></i>
      </div>
      <div>
        <h3 class="mb-0 font-bold text-gray-900 text-2xl">Tableau de Bord Administrateur</h3>
<p class="text-base text-gray-500 mt-1">Aperçu de vos performances et statistiques</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-end">
      <li class="breadcrumb-item"><a href="#" class="text-primary-600 hover:text-primary-700">Accueil</a></li>
      <li class="breadcrumb-item active text-gray-700">Tableau de Bord</li>
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
    <title>Dashboard - Administration</title>
    
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
                        'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                        'progress-grow': 'progressGrow 1.5s ease-out forwards',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                        'glow': '0 0 20px rgba(14, 165, 233, 0.15)',
                    }
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
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(10px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        @keyframes slideIn {
            from { 
                transform: translateY(-10px); 
                opacity: 0; 
            }
            to { 
                transform: translateY(0); 
                opacity: 1; 
            }
        }

        @keyframes bounceSubtle {
            0%, 100% { 
                transform: translateY(0); 
            }
            50% { 
                transform: translateY(-3px); 
            }
        }

        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
            }
            50% {
                box-shadow: 0 0 30px rgba(236, 72, 153, 0.4);
            }
        }

        @keyframes progressGrow {
            from {
                width: 0%;
            }
            to {
                width: var(--target-width);
            }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .gradient-border {
            position: relative;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2px;
            border-radius: 16px;
        }

        .gradient-border > div {
            background: white;
            border-radius: 14px;
        }

        .stats-gradient-1 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stats-gradient-2 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .stats-gradient-3 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .stats-gradient-4 {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .animate-stagger > * {
            opacity: 0;
            animation: fadeIn 0.6s ease forwards;
        }

        .animate-stagger > *:nth-child(1) { animation-delay: 0.1s; }
        .animate-stagger > *:nth-child(2) { animation-delay: 0.2s; }
        .animate-stagger > *:nth-child(3) { animation-delay: 0.3s; }
        .animate-stagger > *:nth-child(4) { animation-delay: 0.4s; }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-ring-circle {
            transition: stroke-dashoffset 0.5s ease;
        }

        .user-role-card {
            transition: all 0.3s ease;
        }

        .user-role-card:hover {
            transform: translateX(5px);
            background: linear-gradient(90deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">

    <!-- Main Content -->
    <div class="main-content flex-1 flex flex-col overflow-hidden">
        <!-- Main Content Area -->          
        <main class="flex-1 overflow-y-auto p-6">
            <!-- Statistiques principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 animate-stagger">
                <!-- Carte Utilisateurs -->
                <div class="group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
                    <div class="stats-card bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-soft border border-white/50 hover-lift relative z-10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 mb-1">Utilisateurs totaux</p>
                                <p class="text-3xl font-bold text-gray-800 mb-2">{{ $usersCount }}</p>
                                <div class="flex items-center">
                                    <div class="w-16 bg-gray-200 rounded-full h-1.5 mr-2">
                                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 75%"></div>
                                    </div>
                                    <span class="text-xs text-green-500 font-medium">+12.5%</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-blue-50 text-blue-600 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Contenus -->
                <div class="group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-blue-500 rounded-2xl opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
                    <div class="stats-card bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-soft border border-white/50 hover-lift relative z-10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 mb-1">Contenus publiés</p>
                                <p class="text-3xl font-bold text-gray-800 mb-2">{{ $contenusCount }}</p>
                                <div class="flex items-center">
                                    <div class="w-16 bg-gray-200 rounded-full h-1.5 mr-2">
                                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 60%"></div>
                                    </div>
                                    <span class="text-xs text-green-500 font-medium">+8.2%</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-green-50 text-green-600 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-file-alt text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Commentaires -->
                <div class="group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
                    <div class="stats-card bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-soft border border-white/50 hover-lift relative z-10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 mb-1">Commentaires</p>
                                <p class="text-3xl font-bold text-gray-800 mb-2">{{ $commentsCount }}</p>
                                <div class="flex items-center">
                                    <div class="w-16 bg-gray-200 rounded-full h-1.5 mr-2">
                                        <div class="bg-red-500 h-1.5 rounded-full" style="width: 40%"></div>
                                    </div>
                                    <span class="text-xs text-red-500 font-medium">-3.4%</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-amber-50 text-amber-600 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-comments text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carte Engagement -->
                <div class="group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl opacity-10 group-hover:opacity-20 transition-opacity duration-300"></div>
                    <div class="stats-card bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-soft border border-white/50 hover-lift relative z-10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 mb-1">Taux d'engagement</p>
                                <p class="text-3xl font-bold text-gray-800 mb-2">{{ $mediasCount }}%</p>
                                <div class="flex items-center">
                                    <div class="w-16 bg-gray-200 rounded-full h-1.5 mr-2">
                                        <div class="bg-green-500 h-1.5 rounded-full" style="width: 55%"></div>
                                    </div>
                                    <span class="text-xs text-green-500 font-medium">+5.1%</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-purple-50 text-purple-600 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-chart-line text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Graphiques et contenu principal -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Graphique principal -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-soft border border-white/50">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Activité des utilisateurs</h3>
                            <p class="text-sm text-gray-500">Performance hebdomadaire</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white/50">
                                <option>7 derniers jours</option>
                                <option>30 derniers jours</option>
                                <option>3 derniers mois</option>
                            </select>
                            <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                <i class="fas fa-download text-gray-600"></i>
                            </button>
                        </div>
                    </div>
                    <div class="h-80">
                        <canvas id="activityChart"></canvas>
                    </div>
                </div>

                <!-- Types d'utilisateurs amélioré -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-soft border border-white/50">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Répartition des utilisateurs</h3>
                            <p class="text-sm text-gray-500">Analyse par rôle et permissions</p>
                        </div>
                        <div class="flex items-center space-x-2 bg-primary-50 rounded-lg px-3 py-1">
                            <i class="fas fa-users text-primary-600 text-sm"></i>
                            <span class="text-xs font-medium text-primary-700">{{ $usersCount }} total</span>
                        </div>
                    </div>
                    

                    <div class="space-y-4">
                        <!-- Administrateurs -->
                        <div class="user-role-card flex items-center justify-between p-4 bg-gradient-to-r rounded-xl border cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-md">
                                    <i class="fas fa-crown text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800">Administrateurs</span>
                                    <p class="text-xs text-gray-600">Accès complet au système</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-lg font-bold text-red-600">{{ $adminCount ?? 5 }}</span>
                                <div class="flex items-center space-x-2 mt-1">
                                    <div class="w-20 bg-red-200 rounded-full h-2">
                                        <div class="bg-red-500 h-2 rounded-full animate-progress-grow" 
                                             style="--target-width: {{ ($adminCount ?? 5) / ($usersCount ?? 100) * 100 }}%"></div>
                                    </div>
                                    <span class="text-xs text-red-600 font-medium">{{ round(($adminCount ?? 5) / ($usersCount ?? 100) * 100) }}%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Modérateurs -->
                        <div class="user-role-card flex items-center justify-between p-4 bg-gradient-to-r rounded-xl border cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                    <i class="fas fa-shield-alt text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800">Modérateurs</span>
                                    <p class="text-xs text-gray-600">Gestion des contenus et commentaires</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-lg font-bold text-blue-600">{{ $moderatorCount ?? 12 }}</span>
                                <div class="flex items-center space-x-2 mt-1">
                                    <div class="w-20 bg-blue-200 rounded-full h-2">
                                        <div class="bg-blue-500 h-2 rounded-full animate-progress-grow" 
                                             style="--target-width: {{ ($moderatorCount ?? 12) / ($usersCount ?? 100) * 100 }}%"></div>
                                    </div>
                                    <span class="text-xs text-blue-600 font-medium">{{ round(($moderatorCount ?? 12) / ($usersCount ?? 100) * 100) }}%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Éditeurs -->
                        <div class="user-role-card flex items-center justify-between p-4 bg-gradient-to-r rounded-xl border cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-md">
                                    <i class="fas fa-edit text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800">Éditeurs</span>
                                    <p class="text-xs text-gray-600">Création et modification de contenu</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-lg font-bold text-green-600">{{ $editorCount ?? 25 }}</span>
                                <div class="flex items-center space-x-2 mt-1">
                                    <div class="w-20 bg-green-200 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full animate-progress-grow" 
                                             style="--target-width: {{ ($editorCount ?? 25) / ($usersCount ?? 100) * 100 }}%"></div>
                                    </div>
                                    <span class="text-xs text-green-600 font-medium">{{ round(($editorCount ?? 25) / ($usersCount ?? 100) * 100) }}%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Lecteurs -->
                        <div class="user-role-card flex items-center justify-between p-4 bg-gradient-to-r rounded-xl border cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800">Lecteurs</span>
                                    <p class="text-xs text-gray-600">Consultation et interaction</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-lg font-bold text-purple-600">{{ $readerCount ?? 58 }}</span>
                                <div class="flex items-center space-x-2 mt-1">
                                    <div class="w-20 bg-purple-200 rounded-full h-2">
                                        <div class="bg-purple-500 h-2 rounded-full animate-progress-grow" 
                                             style="--target-width: {{ ($readerCount ?? 58) / ($usersCount ?? 100) * 100 }}%"></div>
                                    </div>
                                    <span class="text-xs text-purple-600 font-medium">{{ round(($readerCount ?? 58) / ($usersCount ?? 100) * 100) }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dernières activités et statistiques rapides -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Derniers utilisateurs -->
                <div class="lg:col-span-2 bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-soft border border-white/50">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Derniers utilisateurs</h3>
                            <p class="text-sm text-gray-500">Utilisateurs récemment inscrits</p>
                        </div>
                        <a href="{{ route('utilisateurs.index') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium flex items-center">
                            Voir tout
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                    <div class="space-y-3">
                        @foreach($latestUsers as $u)
                        <div class="flex items-center justify-between p-4 hover:bg-white/50 rounded-xl transition-all duration-200 group border border-transparent hover:border-gray-200">
                            <div class="flex items-center space-x-4">
                                <div class="relative">
                                    <img class="h-12 w-12 rounded-xl object-cover border-2 border-white shadow-sm" 
                                        src="{{ $u->photo ? asset('adminlte/img/'.$u->photo) : 'https://ui-avatars.com/api/?name='.urlencode($u->nom.' '.$u->prenom) }}" 
                                        alt="{{ $u->nom }}">
                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $u->nom }} {{ $u->prenom }}</p>
                                    <p class="text-xs text-gray-500 flex items-center">
                                        <i class="fas fa-clock mr-1 text-xs"></i>
                                        Inscrit le {{ \Carbon\Carbon::parse($u->date_inscription)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                {{ $u->statut ?? 'Actif' }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Actions rapides -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-soft border border-white/50">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Actions rapides</h3>
                            <p class="text-sm text-gray-500">Accès rapide aux fonctionnalités</p>
                        </div>
                        <div class="w-8 h-8 bg-primary-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bolt text-primary-600 text-sm"></i>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <a href="{{ route('utilisateurs.create') }}" class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl hover:from-blue-100 hover:to-blue-200 transition-all duration-200 group border border-blue-200/50">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-user-plus text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800">Ajouter un utilisateur</span>
                                    <p class="text-xs text-gray-600">Créer un nouveau compte</p>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-blue-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all"></i>
                        </a>

                        <a href="{{ route('contenus.create') }}" class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-xl hover:from-green-100 hover:to-green-200 transition-all duration-200 group border border-green-200/50">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-file-alt text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800">Créer un contenu</span>
                                    <p class="text-xs text-gray-600">Publier un nouvel article</p>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-green-400 group-hover:text-green-600 group-hover:translate-x-1 transition-all"></i>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gradient-to-r from-amber-50 to-amber-100 rounded-xl hover:from-amber-100 hover:to-amber-200 transition-all duration-200 group border border-amber-200/50">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-chart-bar text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800">Voir les rapports</span>
                                    <p class="text-xs text-gray-600">Analyses détaillées</p>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-amber-400 group-hover:text-amber-600 group-hover:translate-x-1 transition-all"></i>
                        </a>

                        <a href="#" class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl hover:from-purple-100 hover:to-purple-200 transition-all duration-200 group border border-purple-200/50">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-cog text-white text-sm"></i>
                                </div>
                                <div>
                                    <span class="text-sm font-semibold text-gray-800">Paramètres</span>
                                    <p class="text-xs text-gray-600">Configurer la plateforme</p>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-purple-400 group-hover:text-purple-600 group-hover:translate-x-1 transition-all"></i>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialisation des graphiques
        document.addEventListener('DOMContentLoaded', function() {
            // Graphique d'activité
            const ctx = document.getElementById('activityChart').getContext('2d');
            const activityChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                    datasets: [
                        {
                            label: 'Nouveaux utilisateurs',
                            data: [65, 78, 66, 72, 80, 55, 70],
                            borderColor: '#0ea5e9',
                            backgroundColor: 'rgba(14, 165, 233, 0.1)',
                            tension: 0.4,
                            fill: true,
                            borderWidth: 3,
                            pointBackgroundColor: '#0ea5e9',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 6,
                            pointHoverRadius: 8
                        },
                        {
                            label: 'Contenus publiés',
                            data: [40, 45, 35, 50, 55, 30, 45],
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            tension: 0.4,
                            fill: true,
                            borderWidth: 3,
                            pointBackgroundColor: '#10b981',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2,
                            pointRadius: 6,
                            pointHoverRadius: 8
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    family: 'Inter'
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.9)',
                            titleColor: '#1f2937',
                            bodyColor: '#374151',
                            borderColor: '#e5e7eb',
                            borderWidth: 1,
                            cornerRadius: 8,
                            displayColors: true,
                            usePointStyle: true,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false,
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: {
                                    family: 'Inter'
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    family: 'Inter'
                                }
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    }
                }
            });

            // Graphique de répartition des utilisateurs
            const userCtx = document.getElementById('userDistributionChart').getContext('2d');
            const userDistributionChart = new Chart(userCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Administrateurs', 'Modérateurs', 'Éditeurs', 'Lecteurs'],
                    datasets: [{
                        data: [
                            {{ $adminCount ?? 5 }},
                            {{ $moderatorCount ?? 12 }},
                            {{ $editorCount ?? 25 }},
                            {{ $readerCount ?? 58 }}
                        ],
                        backgroundColor: [
                            '#ef4444',
                            '#3b82f6',
                            '#10b981',
                            '#8b5cf6'
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 2,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = {{ $usersCount ?? 100 }};
                                    const value = context.raw;
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    return `${context.label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });

            // Animation au scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);

            // Observer les éléments à animer
            document.querySelectorAll('.animate-fade-in, .animate-stagger > *').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
@endsection