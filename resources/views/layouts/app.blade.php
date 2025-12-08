<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Culture Bénin')</title>
    
    @if(View::hasSection('icon'))
        @yield('icon')
    @else
        <link rel="icon" href="{{ asset('adminlte/img/culture1.jpg') }}" type="image/jpg">
    @endif
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
    <!-- Styles généraux -->
    <style>
        /* Variables et reset */
        :root {
            --primary: #008751;
            --primary-dark: #006b40;
            --secondary: #fcd116;
            --accent: #e4002b;
            --light: #f9f9f9;
            --dark: #333333;
            --text: #444444;
            --text-light: #666666;
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.15);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--white);
            color: var(--text);
            line-height: 1.7;
            overflow-x: hidden;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        section {
            padding: 100px 0;
            position: relative;
        }

        .section-title {
            text-align: center;
            margin-bottom: 70px;
        }

        .section-title h2 {
            font-size: 42px;
            color: var(--dark);
            position: relative;
            display: inline-block;
            padding-bottom: 20px;
        }

        .section-title h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: var(--primary);
            color: var(--white);
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: var(--shadow);
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .btn-secondary {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        /* Styles pour les sections conditionnelles */
        .content-section {
            display: none;
            animation: fadeIn 0.5s ease-out;
        }

        .content-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Styles communs pour tous les modules de contenu */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
            gap: 20px;
        }

        .content-card {
            background-color: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .content-card:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-hover);
        }

        .content-image {
            height: 260px;
            overflow: hidden;
            position: relative;
        }

        .content-image:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(transparent, rgba(0,0,0,0.5));
        }

        .content-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .content-card:hover .content-image img {
            transform: scale(1.1);
        }

        .content-details {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .content-category {
            color: var(--primary);
            font-weight: bold;
            margin-bottom: 12px;
            display: inline-block;
            background-color: rgba(0, 135, 81, 0.1);
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 14px;
            align-self: flex-start;
        }

        .content-details h3 {
            margin-bottom: 12px;
            color: var(--dark);
            font-size: 22px;
            line-height: 1.3;
        }

        .content-details p {
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .content-cta {
            margin-top: auto;
        }

        /* Modal de paiement */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
            background-color: var(--white);
            margin: 5% auto;
            padding: 40px;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            position: relative;
            box-shadow: var(--shadow-hover);
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 28px;
            cursor: pointer;
            color: var(--text-light);
        }

        .close:hover {
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-title h2 {
                font-size: 32px;
            }
            
            section {
                padding: 60px 0;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Header -->
    @include('partials.header')
    
    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Modal de paiement -->
    @include('partials.payment-modal')

    <!-- Scripts -->
    <script>
        // Données des contenus détaillés
        const contentData = {
            // Données existantes...
        };

        // Variables globales
        let currentContentId = null;

        // Initialisation principale
        document.addEventListener('DOMContentLoaded', function() {
            initializeNavContentSelect();
            initializeContentButtons();
            initializeBackButton();
            initializeAnimations();
            initializePaymentSystem();
        });

        // Initialisation du sélecteur de contenu dans la navigation
        function initializeNavContentSelect() {
            const navContentSelect = document.getElementById('nav-content-select');
            if (!navContentSelect) return;
            
            navContentSelect.addEventListener('change', function() {
                const selectedValue = this.value;
                
                if (selectedValue) {
                    // Rediriger vers la page correspondante
                    const routes = {
                        'langue': '{{ route("langues") }}',
                        'region': '{{ route("regions") }}',
                        'contenus': '{{ route("content") }}',
                        'all': '{{ route("home") }}'
                    };
                    
                    if (routes[selectedValue]) {
                        window.location.href = routes[selectedValue];
                    } else {
                        // Si pas de route spécifique, afficher la section correspondante
                        filterContentBySelection(selectedValue);
                    }
                }
            });
        }

        function filterContentBySelection(selectedValue) {
            // Cette fonction peut être surchargée dans les pages spécifiques
            console.log('Filtrage:', selectedValue);
        }

        // Autres fonctions JavaScript communes...
    </script>
    
    @yield('scripts')
</body>
</html>