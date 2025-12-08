<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture Bénin - Découvrez la richesse culturelle du Bénin</title>
    <link rel="icon" href="{{ asset('adminlte/img/culture1.jpg') }}" type="image/jpg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.isUserLoggedIn = @json(Auth::check());
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Variables et reset */
        :root {
            --primary: #008751;
            --primary-dark: #006b40;
            --secondary: #fcd116;
            --accent: #e4002b;
            --light: #f9f9f9;
            --dark: #1a1a1a;
            --text: #ffffff;
            --text-light: #cccccc;
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            --shadow-hover: 0 20px 50px rgba(0, 0, 0, 0.5);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            line-height: 1.7;
            overflow-x: hidden;
            background: #0a0a0a;
            position: relative;
            min-height: 100vh;
        }

        /* FOND ANIMÉ INNOVANT */
        .innovative-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: 
                radial-gradient(circle at 20% 80%, rgba(0, 135, 81, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(252, 209, 22, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(228, 0, 43, 0.08) 0%, transparent 50%);
            background-color: #0a0a0a;
            overflow: hidden;
        }

        /* Motifs africains animés */
        .african-patterns {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0.3;
            background-image: 
                url("data:image/svg+xml,%3Csvg width='200' height='200' viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20,20 C40,0 60,0 80,20 C100,40 100,60 80,80 C60,100 40,100 20,80 C0,60 0,40 20,20 Z' fill='%23008751' opacity='0.1'/%3E%3Cpath d='M120,120 C140,100 160,100 180,120 C200,140 200,160 180,180 C160,200 140,200 120,180 C100,160 100,140 120,120 Z' fill='%23FCD116' opacity='0.1'/%3E%3Cpath d='M70,150 C90,130 110,130 130,150 C150,170 150,190 130,210 C110,230 90,230 70,210 C50,190 50,170 70,150 Z' fill='%23E4002B' opacity='0.1'/%3E%3C/svg%3E");
            background-size: 300px;
            animation: floatPattern 60s linear infinite;
        }

        @keyframes floatPattern {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-150px, -150px); }
        }

        /* Particules flottantes */
        .floating-particles {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .particle {
            position: absolute;
            background: var(--secondary);
            border-radius: 50%;
            opacity: 0.1;
            animation: float 15s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-100px) rotate(180deg); }
        }

        /* Contenu principal */
        .main-content {
            position: relative;
            z-index: 1;
            background: rgba(10, 10, 10, 0.85);
            backdrop-filter: blur(10px);
            min-height: 100vh;
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
            position: relative;
        }

        .section-title h2 {
            font-size: 42px;
            color: var(--white);
            position: relative;
            display: inline-block;
            padding-bottom: 20px;
            font-family: 'Playfair Display', serif;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
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

        /* Header avec effet de verre */
        header {
            background: rgba(26, 26, 26, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--white);
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: var(--transition);
            font-family: 'Playfair Display', serif;
        }

        .logo:hover {
            transform: scale(1.05);
            color: var(--secondary);
        }

        .logo span {
            color: var(--secondary);
            background: linear-gradient(90deg, var(--secondary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Navigation */
        nav ul {
            display: flex;
            list-style: none;
            align-items: center;
            gap: 20px;
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--white);
            font-weight: 500;
            transition: var(--transition);
            padding: 8px 16px;
            border-radius: 50px;
            position: relative;
        }

        nav ul li a:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--secondary);
        }

        /* Dropdown Culture */
        .culture-dropdown {
            position: relative;
        }

        .culture-dropdown-btn {
            background: none;
            border: none;
            color: var(--white);
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .culture-dropdown-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--secondary);
        }

        .culture-dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: rgba(26, 26, 26, 0.95);
            min-width: 200px;
            box-shadow: var(--shadow-hover);
            border-radius: 15px;
            z-index: 1000;
            overflow: hidden;
            margin-top: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .culture-dropdown-content.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .culture-dropdown-content a {
            color: var(--white);
            padding: 12px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            white-space: nowrap;
        }

        .culture-dropdown-content a:last-child {
            border-bottom: none;
        }

        .culture-dropdown-content a:hover {
            background: var(--primary);
            color: var(--white);
        }

        /* Boutons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
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
            position: relative;
            overflow: hidden;
        }

        .btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn:hover:before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 135, 81, 0.3);
        }

        .signup-btn {
            background: rgba(255, 255, 255, 0.1);
            color: var(--white);
            padding: 10px 25px;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .signup-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: var(--secondary);
            color: var(--secondary);
        }

        .login-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 10px 25px;
            border-radius: 50px;
            transition: var(--transition);
        }

        .login-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-3px);
        }

        /* CARROUSEL AMÉLIORÉ */
        .carousel-section {
            padding: 40px 0;
        }

        .carousel-container {
            position: relative;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide {
            flex: 0 0 100%;
            position: relative;
        }

        .carousel-image-container {
            height: 70vh;
            position: relative;
        }

        @media (min-width: 768px) {
            .carousel-image-container {
                height: 85vh;
            }
        }

        .carousel-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 8s ease;
        }

        .carousel-slide:hover .carousel-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
            color: white;
            padding: 3rem;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .carousel-badge {
            background: var(--secondary);
            color: var(--dark);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 1rem;
            box-shadow: 0 4px 12px rgba(252, 209, 22, 0.3);
        }

        /* Contrôles du carrousel */
        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 30;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1.5rem;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .carousel-control:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: translateY(-50%) scale(1.1);
            border-color: var(--primary);
        }

        .carousel-control.prev {
            left: 1.5rem;
        }

        .carousel-control.next {
            right: 1.5rem;
        }

        /* Indicateurs */
        .carousel-indicators-container {
            position: absolute;
            bottom: 2.5rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 30;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px 15px;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .carousel-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0;
        }

        .carousel-indicator.active {
            background: var(--secondary);
            transform: scale(1.3);
        }

        /* Compteur */
        .carousel-counter {
            position: absolute;
            top: 2.5rem;
            right: 2.5rem;
            z-index: 30;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* SECTION À PROPOS */
        .about {
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.8) 0%, rgba(26, 26, 26, 0.8) 100%);
            border-radius: 30px;
            margin: 0 auto;
            max-width: 1400px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .about-text {
            flex: 1;
            color: var(--white);
        }

        .about-text p {
            margin-bottom: 25px;
            font-size: 18px;
            color: var(--text-light);
        }

        .about-stats {
            display: flex;
            gap: 30px;
            margin-top: 40px;
        }

        .stat {
            text-align: center;
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .stat:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 42px;
            font-weight: 800;
            color: var(--secondary);
            line-height: 1;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 16px;
            color: var(--text-light);
        }

        .about-image {
            flex: 1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .about-image:hover {
            transform: translateY(-10px) rotate(1deg);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary);
        }

        .about-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
            transition: var(--transition);
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        /* SECTION DOMAINES */
        .domains {
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.9) 0%, rgba(26, 26, 26, 0.9) 100%);
            border-radius: 30px;
            margin: 0 auto;
            max-width: 1400px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .domain-item {
            background: rgba(26, 26, 26, 0.6);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: var(--transition);
        }

        .domain-item:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-hover);
            transform: translateY(-10px);
        }

        .domain-image {
            flex: 1;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .domain-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
            transition: var(--transition);
        }

        .domain-item:hover .domain-image img {
            transform: scale(1.1);
        }

        .domain-text {
            flex: 1;
            padding: 0 20px;
        }

        .domain-text h3 {
            font-size: 32px;
            margin-bottom: 20px;
            color: var(--white);
            position: relative;
            padding-bottom: 15px;
            font-family: 'Playfair Display', serif;
        }

        .domain-text h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .domain-text p {
            color: var(--text-light);
            line-height: 1.8;
            font-size: 18px;
            margin-bottom: 25px;
        }

        /* SECTIONS CULTURE */
        .culture-section {
            display: none;
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.8) 0%, rgba(26, 26, 26, 0.8) 100%);
            border-radius: 30px;
            margin: 0 auto 50px;
            max-width: 1400px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .culture-section.active {
            display: block;
        }

        /* CARTES CENTRÉES */
        .centered-cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .content-card {
            background: rgba(26, 26, 26, 0.8);
            border-radius: 20px;
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: relative;
            min-height: 500px;
            display: flex;
            flex-direction: column;
        }

        .content-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary);
        }

        .content-image {
            height: 220px;
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
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
            color: var(--white);
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .content-details h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--white);
            font-family: 'Playfair Display', serif;
            line-height: 1.3;
        }

        .content-details p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
            line-height: 1.6;
            flex-grow: 1;
        }

        /* NOUVEAU: Boutons d'action sur les cartes */
        .content-actions {
            display: flex;
            gap: 10px;
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            flex-wrap: wrap;
        }

        .action-btn {
            flex: 1;
            min-width: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: var(--white);
            cursor: pointer;
            transition: var(--transition);
            font-size: 12px;
            text-align: center;
            border: none;
        }

        .action-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--primary);
            transform: translateY(-3px);
        }

        .action-btn i {
            font-size: 16px;
        }

        .comment-btn {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
        }

        .comment-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }

        .view-count {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 10px;
        }

        /* Badges */
        .language-badge,
        .region-badge,
        .premium-badge,
        .free-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            z-index: 2;
            backdrop-filter: blur(10px);
        }

        .language-badge {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
        }

        .region-badge {
            background: linear-gradient(135deg, var(--accent), #c40024);
            color: var(--white);
        }

        .premium-badge {
            background: linear-gradient(135deg, var(--secondary), #e6b400);
            color: var(--dark);
        }

        .free-badge {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
        }

        /* Content Tabs */
        .content-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 50px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .content-tab {
            padding: 14px 28px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--white);
            backdrop-filter: blur(10px);
            border: none;
        }

        .content-tab.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border-color: transparent;
        }

        .content-tab:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
            background: rgba(255, 255, 255, 0.2);
        }

        /* Galerie */
        .gallery {
            background: linear-gradient(135deg, rgba(10, 10, 10, 0.9) 0%, rgba(26, 26, 26, 0.9) 100%);
            border-radius: 30px;
            margin: 0 auto;
            max-width: 1400px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transition: var(--transition);
            aspect-ratio: 1;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: var(--shadow-hover);
            z-index: 10;
            border-color: var(--primary);
        }

        .gallery-item img,
        .gallery-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover img,
        .gallery-item:hover video {
            transform: scale(1.1);
        }

        /* Footer */
        footer {
            background: rgba(26, 26, 26, 0.95);
            color: var(--white);
            padding: 80px 0 30px;
            position: relative;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-column h3 {
            margin-bottom: 25px;
            font-size: 20px;
            position: relative;
            padding-bottom: 15px;
            font-family: 'Playfair Display', serif;
        }

        .footer-column h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--secondary);
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 12px;
        }

        .footer-column ul li a {
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-column ul li a:hover {
            color: var(--secondary);
            transform: translateX(5px);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--white);
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-5px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: var(--text-light);
        }

        /* Mobile Menu */
        .mobile-menu {
            display: none;
            font-size: 24px;
            cursor: pointer;
            background: none;
            border: none;
            color: var(--white);
            padding: 10px;
        }

        /* NOUVEAU: MODALE DE PAIEMENT */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            backdrop-filter: blur(10px);
            animation: fadeIn 0.3s ease;
        }

        .modal.active {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: rgba(26, 26, 26, 0.95);
            border-radius: 25px;
            width: 90%;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow-hover);
            overflow: hidden;
            backdrop-filter: blur(20px);
            animation: slideUp 0.3s ease;
        }

        .modal-header {
            padding: 25px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 24px;
            color: var(--white);
            font-family: 'Playfair Display', serif;
        }

        .close-modal {
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 24px;
            cursor: pointer;
            transition: var(--transition);
            padding: 5px;
        }

        .close-modal:hover {
            color: var(--secondary);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 30px;
        }

        .price-option {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: var(--transition);
        }

        .price-option:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .price-option.selected {
            border-color: var(--secondary);
            background: rgba(252, 209, 22, 0.1);
        }

        .price-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .price-amount {
            font-size: 28px;
            font-weight: 700;
            color: var(--secondary);
        }

        .price-duration {
            font-size: 14px;
            color: var(--text-light);
        }

        .price-features {
            list-style: none;
            margin-top: 15px;
        }

        .price-features li {
            color: var(--text-light);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .price-features li i {
            color: var(--primary);
        }

        .payment-form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-light);
        }

        .form-control {
            width: 100%;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: var(--white);
            font-size: 16px;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }

        .pay-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: 15px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .pay-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 135, 81, 0.3);
        }

        /* NOUVEAU: MODALE DE COMMENTAIRES */
        .comments-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            backdrop-filter: blur(10px);
            overflow-y: auto;
        }

        .comments-modal.active {
            display: block;
        }

        .comments-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        .comments-content {
            background: rgba(26, 26, 26, 0.95);
            border-radius: 25px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow-hover);
        }

        .comments-header {
            padding: 25px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comments-header h3 {
            font-size: 24px;
            color: var(--white);
            font-family: 'Playfair Display', serif;
        }

        .comments-body {
            padding: 30px;
        }

        .comment-form {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .comment-form textarea {
            width: 100%;
            min-height: 100px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: var(--white);
            margin-bottom: 15px;
            resize: vertical;
            font-family: 'Poppins', sans-serif;
        }

        .comment-form textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .comment-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .comment-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .comment-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 600;
        }

        .comment-meta {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: var(--white);
        }

        .comment-date {
            font-size: 12px;
            color: var(--text-light);
        }

        .comment-text {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        /* NOUVEAU: CONTENT VIEW */
        .content-view-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 2000;
            overflow-y: auto;
            backdrop-filter: blur(10px);
        }

        .content-view-modal.active {
            display: block;
        }

        .content-view-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }

        .content-view {
            background: rgba(26, 26, 26, 0.95);
            border-radius: 25px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: var(--shadow-hover);
            animation: slideUp 0.3s ease;
        }

        .content-view-header {
            position: relative;
            height: 400px;
            overflow: hidden;
        }

        .content-view-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content-view-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
            padding: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .content-view-title {
            flex: 1;
        }

        .content-view-actions {
            display: flex;
            gap: 15px;
        }

        .content-view-body {
            padding: 40px;
        }

        .content-meta {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
        }

        .content-description {
            font-size: 18px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 40px;
        }

        .content-description p {
            margin-bottom: 20px;
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .about-content,
            .domain-item {
                flex-direction: column;
            }
            
            .centered-cards-container {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .section-title h2 {
                font-size: 32px;
            }
            
            nav ul {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: rgba(26, 26, 26, 0.95);
                padding: 20px;
                box-shadow: var(--shadow);
                border-radius: 0 0 20px 20px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
            }
            
            nav ul.show {
                display: flex;
            }
            
            .mobile-menu {
                display: block;
            }
            
            .carousel-image-container {
                height: 50vh;
            }
            
            .carousel-control {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
            
            .about-image img {
                height: 300px;
            }
            
            .domain-image img {
                height: 250px;
            }
            
            .centered-cards-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .content-tabs {
                overflow-x: auto;
                justify-content: flex-start;
                padding-bottom: 10px;
            }
            
            .content-tab {
                flex-shrink: 0;
            }
            
            .content-view-container {
                margin: 20px auto;
                padding: 10px;
            }
            
            .content-view-header {
                height: 250px;
            }
            
            .content-view-overlay {
                padding: 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .content-view-body {
                padding: 20px;
            }
            
            .content-meta {
                flex-direction: column;
                gap: 15px;
            }
            
            .comments-container {
                margin: 20px auto;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .header-content {
                flex-direction: column;
                gap: 20px;
            }
            
            .section-title h2 {
                font-size: 28px;
            }
            
            .carousel-image-container {
                height: 40vh;
            }
            
            .image-overlay {
                padding: 1.5rem;
            }
            
            .image-overlay h3 {
                font-size: 1.5rem;
            }
            
            .carousel-indicators-container {
                bottom: 1.5rem;
            }
            
            .modal-content {
                width: 95%;
                margin: 10px;
            }
            
            .comments-content {
                margin: 10px;
            }
        }

        /* Animation d'apparition */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(100px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        /* Loading */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 3000;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
        }

        .loading.active {
            display: flex;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.1);
            border-top: 5px solid var(--secondary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Fond animé innovant -->
    <div class="innovative-background">
        <div class="african-patterns"></div>
        <div class="floating-particles" id="particles"></div>
    </div>

    <!-- Loading -->
    <div class="loading" id="loading">
        <div class="loading-spinner"></div>
        <div style="color: var(--white); font-size: 18px;">Chargement...</div>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <!-- Header -->
        <header>
            <div class="container">
                <div class="header-content">
                    <a href="#accueil" class="logo">
                        <i class="fas fa-monument"></i>
                        Culture<span>Bénin</span>
                    </a>
                    <nav>
                        <ul id="nav-menu">
                            <li><a href="#apropos">À propos</a></li>
                            <li><a href="#domaines">Domaines</a></li>
                            <li class="culture-dropdown">
                                <button class="culture-dropdown-btn">
                                    Culture <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="culture-dropdown-content">
                                    <a href="#" class="culture-tab-btn" data-tab="langue">
                                        <i class="fas fa-language"></i> Langues
                                    </a>
                                    <a href="#" class="culture-tab-btn" data-tab="regions">
                                        <i class="fas fa-map-marked-alt"></i> Régions
                                    </a>
                                    <a href="#" class="culture-tab-btn" data-tab="contenu">
                                        <i class="fas fa-newspaper"></i> Contenus
                                    </a>
                                </div>
                            </li>
                            <li><a href="#galerie">Galerie</a></li>
                            <li><a href="{{ route('register') }}" class="signup-btn">Inscription</a></li>
                            <li><a href="{{ route('login') }}" class="login-btn">Connexion</a></li>
                        </ul>
                    </nav>
                    <button class="mobile-menu" id="mobile-menu-btn">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- CARROUSEL -->
        <section class="carousel-section" id="accueil">
            <div class="container">
                <div class="carousel-container">
                    <div class="carousel-track" id="carousel-track">
                        <!-- Slide 1 -->
                        <div class="carousel-slide">
                            <div class="carousel-image-container">
                                <img src="{{ asset('adminlte/img/ganvié.jpg') }}" 
                                     alt="Ganvié, la Venise de l'Afrique" class="carousel-image">
                                <div class="image-overlay">
                                    <div class="max-w-4xl">
                                        <span class="carousel-badge" style="background-color: #008751; color: white;">
                                            <i class="fas fa-water"></i> Vie lacustre
                                        </span>
                                        <h3 class="text-4xl md:text-5xl font-bold mb-4">Ganvié, la Venise africaine</h3>
                                        <p class="text-xl mb-6 max-w-3xl">Village lacustre construit sur pilotis au milieu du lac Nokoué, Ganvié est le plus grand village sur l'eau d'Afrique avec plus de 20,000 habitants.</p>
                                        <a href="#apropos" class="btn">
                                            <i class="fas fa-ship"></i>
                                            Explorer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-slide">
                            <div class="carousel-image-container">
                                <img src="{{ asset('adminlte/img/palais1.jpg') }}" 
                                     alt="Palais royaux d'Abomey" class="carousel-image">
                                <div class="image-overlay">
                                    <div class="max-w-4xl">
                                        <span class="carousel-badge">
                                            <i class="fas fa-landmark"></i> Patrimoine UNESCO
                                        </span>
                                        <h3 class="text-4xl md:text-5xl font-bold mb-4">Palais Royaux d'Abomey</h3>
                                        <p class="text-xl mb-6 max-w-3xl">Les palais royaux d'Abomey sont un ensemble de structures en terre construites par le peuple Fon entre le milieu du XVIIe et la fin du XIXe siècle.</p>
                                        <a href="#apropos" class="btn">
                                            <i class="fas fa-compass"></i>
                                            Découvrir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 3 -->
                        <div class="carousel-slide">
                            <div class="carousel-image-container">
                                <img src="{{ asset('adminlte/img/arti.jpg') }}" 
                                     alt="Artisanat béninois" class="carousel-image">
                                <div class="image-overlay">
                                    <div class="max-w-4xl">
                                        <span class="carousel-badge" style="background-color: #e4002b; color: white;">
                                            <i class="fas fa-hands"></i> Art & Artisanat
                                        </span>
                                        <h3 class="text-4xl md:text-5xl font-bold mb-4">Sculptures et artisanat traditionnel</h3>
                                        <p class="text-xl mb-6 max-w-3xl">L'artisanat béninois est réputé pour ses sculptures en bois, ses masques cérémoniels, ses textiles en pagne et ses bijoux en perles.</p>
                                        <a href="#domaines" class="btn">
                                            <i class="fas fa-palette"></i>
                                            Explorer l'art
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 4 -->
                        <div class="carousel-slide">
                            <div class="carousel-image-container">
                                <img src="{{ asset('adminlte/img/atassi.jpg') }}" 
                                     alt="Gastronomie béninoise" class="carousel-image">
                                <div class="image-overlay">
                                    <div class="max-w-4xl">
                                        <span class="carousel-badge" style="background-color: #fcd116; color: #333;">
                                            <i class="fas fa-utensils"></i> Saveurs locales
                                        </span>
                                        <h3 class="text-4xl md:text-5xl font-bold mb-4">Gastronomie béninoise</h3>
                                        <p class="text-xl mb-6 max-w-3xl">La cuisine béninoise offre une diversité de saveurs avec des plats comme le poulet yassa, le riz au gras, la pâte d'igname et l'akassa.</p>
                                        <a href="#domaines" class="btn">
                                            <i class="fas fa-utensils"></i>
                                            Découvrir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 5 -->
                        <div class="carousel-slide">
                            <div class="carousel-image-container">
                                <img src="{{ asset('adminlte/img/porte.jpg') }}" 
                                     alt="Porte du Non-Retour" class="carousel-image">
                                <div class="image-overlay">
                                    <div class="max-w-4xl">
                                        <span class="carousel-badge" style="background-color: #6b46c1; color: white;">
                                            <i class="fas fa-history"></i> Mémoire historique
                                        </span>
                                        <h3 class="text-4xl md:text-5xl font-bold mb-4">Porte du Non-Retour à Ouidah</h3>
                                        <p class="text-xl mb-6 max-w-3xl">Monument commémorant les victimes de la traite négrière, la Porte du Non-Retour est un lieu de mémoire et de recueillement.</p>
                                        <a href="#domaines" class="btn">
                                            <i class="fas fa-monument"></i>
                                            Explorer l'histoire
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Slide 6 -->
                        <div class="carousel-slide">
                            <div class="carousel-image-container">
                                <img src="{{ asset('adminlte/img/pendjari.jpg') }}" 
                                     alt="Paysage béninois" class="carousel-image">
                                <div class="image-overlay">
                                    <div class="max-w-4xl">
                                        <span class="carousel-badge" style="background-color: #3182ce; color: white;">
                                            <i class="fas fa-tree"></i> Nature & Paysages
                                        </span>
                                        <h3 class="text-4xl md:text-5xl font-bold mb-4">Parc National de la Pendjari</h3>
                                        <p class="text-xl mb-6 max-w-3xl">Réserve de biosphère abritant une biodiversité exceptionnelle avec éléphants, lions, buffles et de nombreuses espèces d'oiseaux.</p>
                                        <a href="#galerie" class="btn">
                                            <i class="fas fa-mountain"></i>
                                            Découvrir la nature
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contrôles du carrousel -->
                    <button class="carousel-control prev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carousel-control next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Indicateurs -->
                    <div class="carousel-indicators-container">
                        <button class="carousel-indicator" data-index="0"></button>
                        <button class="carousel-indicator" data-index="1"></button>
                        <button class="carousel-indicator" data-index="2"></button>
                        <button class="carousel-indicator" data-index="3"></button>
                        <button class="carousel-indicator" data-index="4"></button>
                        <button class="carousel-indicator" data-index="5"></button>
                    </div>
                    
                    <!-- Compteur -->
                    <div class="carousel-counter">
                        <span id="current-slide">1</span> / <span id="total-slides">6</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section À propos -->
        <section class="about" id="apropos">
            <div class="container">
                <div class="section-title">
                    <h2>À propos de Culture Bénin</h2>
                </div>
                <div class="about-content">
                    <div class="about-text">
                        <p>Le Bénin, berceau de la culture Vodoun et terre des royaumes historiques, possède un patrimoine culturel d'une richesse exceptionnelle. Notre mission est de préserver, promouvoir et partager cette diversité culturelle avec le monde entier.</p>
                        <p>À travers ce projet, nous souhaitons mettre en lumière les différentes facettes de la culture béninoise : ses traditions ancestrales, ses arts vivants, sa musique envoûtante, sa gastronomie savoureuse et ses festivals colorés.</p>
                        <p>Rejoignez-nous dans cette aventure culturelle et découvrez comment le Bénin continue d'influencer et d'enrichir le paysage culturel mondial.</p>
                        
                        <div class="about-stats">
                            <div class="stat">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Traditions</div>
                            </div>
                            <div class="stat">
                                <div class="stat-number">120+</div>
                                <div class="stat-label">Artisans</div>
                            </div>
                            <div class="stat">
                                <div class="stat-number">25+</div>
                                <div class="stat-label">Festivals</div>
                            </div>
                        </div>
                    </div>
                    <div class="about-image">
                        <img src="{{ asset('adminlte/img/benin map.jpg') }}" alt="Culture béninoise">
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Domaines culturels -->
        <section class="domains" id="domaines">
            <div class="container">
                <div class="section-title">
                    <h2>Domaines Culturels</h2>
                </div>
                
                <div class="domain-item">
                    <div class="domain-image">
                        <img src="{{ asset('adminlte/img/fond1.jpg') }}" alt="Artisanat Traditionnel">
                    </div>
                    <div class="domain-text">
                        <h3>Artisanat Traditionnel</h3>
                        <p>Découvrez l'artisanat béninois avec ses textiles, ses poteries, ses sculptures sur bois et ses bijoux uniques. Chaque région du Bénin possède ses spécialités artisanales, transmises de génération en génération.</p>
                        <p>Les tissus en pagne wax, les masques sculptés et les poteries traditionnelles sont des exemples de cet artisanat riche et varié qui raconte l'histoire et les croyances du peuple béninois.</p>
                    </div>
                </div>
                
                <div class="domain-item">
                    <div class="domain-image">
                        <img src="{{ asset('adminlte/img/musique.jpg') }}" alt="Musique et Danse">
                    </div>
                    <div class="domain-text">
                        <h3>Musique et Danse</h3>
                        <p>Explorez les rythmes envoûtants et les danses traditionnelles qui rythment la vie au Bénin. Des tambours sacrés du Vodoun aux mélodies contemporaines, la musique béninoise est un véritable reflet de sa diversité culturelle.</p>
                        <p>Les danses traditionnelles comme le Zinli, l'Agbadja ou le Têkê sont exécutées lors des cérémonies et célébrations, racontant des histoires et préservant la mémoire collective.</p>
                    </div>
                </div>
                
                <div class="domain-item">
                    <div class="domain-image">
                        <img src="{{ asset('adminlte/img/pile.jpg') }}" alt="Gastronomie">
                    </div>
                    <div class="domain-text">
                        <h3>Gastronomie</h3>
                        <p>Savourez les délices de la cuisine béninoise, un mélange unique de saveurs et d'épices. Des plats emblématiques comme le "Agoun" avec sa sauce d'arachide, l'Akassa accompagné de sauce gombo, ou le délicieux Ablo.</p>
                        <p>La cuisine béninoise ravit les papilles avec ses associations de textures et de saveurs authentiques, reflétant la diversité géographique et culturelle du pays.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION LANGUES -->
        <section class="culture-section" id="langue-section">
            <div class="container">
                <div class="section-title">
                    <h2>Langues du Bénin</h2>
                </div>
                
                <div class="centered-cards-container">
                    <!-- Français -->
                    <div class="content-card language-card">
                        <div class="language-badge">
                            <i class="fas fa-language"></i> Langue officielle
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/franc.jpg') }}" alt="Français Bénin">
                        </div>
                        <div class="content-details">
                            <h3>Français</h3>
                            <p>Langue officielle utilisée dans l'administration, l'éducation et les médias. Héritage de la période coloniale, elle est parlée par environ 4 millions de personnes.</p>
                            <div class="content-actions">
                                <button class="action-btn read-btn" data-content-id="10">
                                    <i class="fas fa-book-open"></i>
                                    Lire
                                </button>
                                <button class="action-btn comment-btn" data-content-id="10">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Fon -->
                    <div class="content-card language-card">
                        <div class="language-badge">
                            <i class="fas fa-crown"></i> Langue majoritaire
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/fon1.jpg') }}" alt="Fon Bénin">
                        </div>
                        <div class="content-details">
                            <h3>Fon</h3>
                            <p>Parlée dans le sud du Bénin par plus de 2 millions de personnes. Langue des royaumes du Danhomè et langue du Vodoun.</p>
                            <div class="content-actions">
                                <button class="action-btn read-btn" data-content-id="11">
                                    <i class="fas fa-book-open"></i>
                                    Lire
                                </button>
                                <button class="action-btn comment-btn" data-content-id="11">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION RÉGIONS -->
        <section class="culture-section" id="regions-section">
            <div class="container">
                <div class="section-title">
                    <h2>Régions Culturelles</h2>
                </div>
                
                <div class="centered-cards-container">
                    <!-- Sud Maritime -->
                    <div class="content-card region-card">
                        <div class="region-badge">
                            <i class="fas fa-water"></i> Région côtière
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/ouidah1.jpg') }}" alt="Sud Maritime">
                        </div>
                        <div class="content-details">
                            <h3>Sud Maritime</h3>
                            <p>Région côtière marquée par l'histoire de la traite négrière et le vodoun. Architecture brésilienne unique au Bénin.</p>
                            <div class="content-actions">
                                <button class="action-btn read-btn" data-content-id="20">
                                    <i class="fas fa-book-open"></i>
                                    Lire
                                </button>
                                <button class="action-btn comment-btn" data-content-id="20">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Plateaux -->
                    <div class="content-card region-card">
                        <div class="region-badge">
                            <i class="fas fa-landmark"></i> Cœur historique
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/plat.jpg') }}" alt="Plateaux">
                        </div>
                        <div class="content-details">
                            <h3>Région des Plateaux</h3>
                            <p>Cœur historique du royaume du Danhomè. Palais royaux d'Abomey classés UNESCO et traditions ancestrales.</p>
                            <div class="content-actions">
                                <button class="action-btn read-btn" data-content-id="21">
                                    <i class="fas fa-book-open"></i>
                                    Lire
                                </button>
                                <button class="action-btn comment-btn" data-content-id="21">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION CONTENU -->
        <section class="culture-section active" id="contenu-section">
            <div class="container">
                <div class="section-title">
                    <h2>Contenu Culturel</h2>
                </div>
                
                <div class="content-tabs">
                    <button class="content-tab active" data-filter="all">
                        <i class="fas fa-th-large"></i>
                        Tous
                    </button>
                    <button class="content-tab" data-filter="article">
                        <i class="fas fa-newspaper"></i>
                        Articles
                    </button>
                    <button class="content-tab" data-filter="video">
                        <i class="fas fa-play-circle"></i>
                        Vidéos
                    </button>
                    <button class="content-tab" data-filter="podcast">
                        <i class="fas fa-podcast"></i>
                        Podcasts
                    </button>
                    <button class="content-tab" data-filter="interview">
                        <i class="fas fa-microphone-alt"></i>
                        Interviews
                    </button>
                </div>
                
                <div class="centered-cards-container">
                    <!-- Article Premium -->
                    <div class="content-card content-category-filter premium-content" data-category="article" data-content-id="1">
                        <div class="premium-badge">
                            <i class="fas fa-crown"></i> PREMIUM
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/vodunday.jpg') }}" alt="Festival Ouidah">
                        </div>
                        <div class="content-details">
                            <h3>Festival International Ouidah 2024</h3>
                            <p>Célébration annuelle de la culture vodoun avec des cérémonies, danses et rituels traditionnels.</p>
                            
                            <div class="content-actions">
                                <button class="action-btn read-btn" data-content-id="1" data-type="premium">
                                    <i class="fas fa-book-open"></i>
                                    Lire
                                </button>
                                <button class="action-btn comment-btn" data-content-id="1">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                                <button class="action-btn view-btn" data-content-id="1">
                                    <i class="fas fa-eye"></i>
                                    Voir détails
                                </button>
                            </div>
                            
                            <div class="view-count">
                                <i class="fas fa-eye"></i>
                                <span class="count">1,245 vues</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Article Gratuit -->
                    <div class="content-card content-category-filter" data-category="article" data-content-id="2">
                        <div class="free-badge">
                            <i class="fas fa-unlock"></i> GRATUIT
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/gaani.jpg') }}" alt="Fête du Gani">
                        </div>
                        <div class="content-details">
                            <h3>Fête du Gaani à Nikki</h3>
                            <p>Cérémonie traditionnelle des Bariba avec défilés, danses masquées et célébrations royales.</p>
                            
                            <div class="content-actions">
                                <button class="action-btn read-btn" data-content-id="2" data-type="free">
                                    <i class="fas fa-book-open"></i>
                                    Lire
                                </button>
                                <button class="action-btn comment-btn" data-content-id="2">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                                <button class="action-btn view-btn" data-content-id="2">
                                    <i class="fas fa-eye"></i>
                                    Voir détails
                                </button>
                            </div>
                            
                            <div class="view-count">
                                <i class="fas fa-eye"></i>
                                <span class="count">892 vues</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vidéo Premium -->
                    <div class="content-card content-category-filter premium-content" data-category="video" data-content-id="3">
                        <div class="premium-badge">
                            <i class="fas fa-crown"></i> PREMIUM
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/roi.jpg') }}" alt="Documentaire culturel">
                        </div>
                        <div class="content-details">
                            <h3>Les Rois du Dahomey : Histoire et Héritage</h3>
                            <p>Documentaire exclusif sur l'histoire des rois du Dahomey et leur influence sur la culture béninoise.</p>
                            
                            <div class="content-actions">
                                <button class="action-btn play-btn" data-content-id="3" data-type="premium">
                                    <i class="fas fa-play-circle"></i>
                                    Regarder
                                </button>
                                <button class="action-btn comment-btn" data-content-id="3">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                                <button class="action-btn view-btn" data-content-id="3">
                                    <i class="fas fa-eye"></i>
                                    Voir détails
                                </button>
                            </div>
                            
                            <div class="view-count">
                                <i class="fas fa-eye"></i>
                                <span class="count">2,567 vues</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Vidéo Gratuite -->
                    <div class="content-card content-category-filter" data-category="video" data-content-id="4">
                        <div class="free-badge">
                            <i class="fas fa-unlock"></i> GRATUIT
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/ballet.jpg') }}" alt="Spectacle de danse">
                        </div>
                        <div class="content-details">
                            <h3>Ballet National du Bénin : Rythmes Sacrés</h3>
                            <p>Captation du spectacle "Rythmes Sacrés" mettant en scène les danses traditionnelles des différentes ethnies du Bénin.</p>
                            
                            <div class="content-actions">
                                <button class="action-btn play-btn" data-content-id="4" data-type="free">
                                    <i class="fas fa-play-circle"></i>
                                    Regarder
                                </button>
                                <button class="action-btn comment-btn" data-content-id="4">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                                <button class="action-btn view-btn" data-content-id="4">
                                    <i class="fas fa-eye"></i>
                                    Voir détails
                                </button>
                            </div>
                            
                            <div class="view-count">
                                <i class="fas fa-eye"></i>
                                <span class="count">3,421 vues</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Podcast Gratuit -->
                    <div class="content-card content-category-filter" data-category="podcast" data-content-id="5">
                        <div class="free-badge">
                            <i class="fas fa-unlock"></i> GRATUIT
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/femme.jpg') }}" alt="Podcast traditions">
                        </div>
                        <div class="content-details">
                            <h3>Vodoun : Mythes et Réalités</h3>
                            <p>Une série de podcasts explorant les origines, les pratiques et les malentendus autour du Vodoun.</p>
                            
                            <div class="content-actions">
                                <button class="action-btn listen-btn" data-content-id="5" data-type="free">
                                    <i class="fas fa-headphones"></i>
                                    Écouter
                                </button>
                                <button class="action-btn comment-btn" data-content-id="5">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                                <button class="action-btn view-btn" data-content-id="5">
                                    <i class="fas fa-eye"></i>
                                    Voir détails
                                </button>
                            </div>
                            
                            <div class="view-count">
                                <i class="fas fa-eye"></i>
                                <span class="count">1,789 vues</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Podcast Premium -->
                    <div class="content-card content-category-filter premium-content" data-category="podcast" data-content-id="6">
                        <div class="premium-badge">
                            <i class="fas fa-crown"></i> PREMIUM
                        </div>
                        <div class="content-image">
                            <img src="{{ asset('adminlte/img/tambour.jpg') }}" alt="Podcast musique">
                        </div>
                        <div class="content-details">
                            <h3>Les Tambours Parlants du Bénin</h3>
                            <p>Décryptage des rythmes et messages transmis par les tambours traditionnels béninois.</p>
                            
                            <div class="content-actions">
                                <button class="action-btn view-btn" data-content-id="6">
                                    <i class="fas fa-eye"></i>
                                    Voir détails
                                </button>
                                 <button class="action-btn comment-btn" data-content-id="6">
                                    <i class="fas fa-comment"></i>
                                    Commenter
                                </button>
                            </div>
                            
                            <div class="view-count">
                                <i class="fas fa-eye"></i>
                                <span class="count">956 vues</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Galerie -->
        <section class="gallery" id="galerie">
            <div class="container">
                <div class="section-title">
                    <h2>Galerie Culturelle</h2>
                </div>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="{{ asset('adminlte/img/teni.jpg') }}" alt="Culture béninoise">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('adminlte/img/village.jpg') }}" alt="Artisanat">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('adminlte/img/porto1.jpg') }}" alt="Danse">
                    </div>
                    <div class="gallery-item">
                        <img src="{{ asset('adminlte/img/ouidah.jpg') }}" alt="Cuisine">
                    </div>
                </div>
            </div>
        </section>

        <!-- Pied de page -->
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>Culture Bénin</h3>
                        <p>Promouvoir et préserver la riche culture béninoise à travers le monde.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="footer-column">
                        <h3>Liens rapides</h3>
                        <ul>
                            <li><a href="#accueil"><i class="fas fa-chevron-right"></i> Accueil</a></li>
                            <li><a href="#apropos"><i class="fas fa-chevron-right"></i> À propos</a></li>
                            <li><a href="#domaines"><i class="fas fa-chevron-right"></i> Domaines</a></li>
                            <li><a href="#galerie"><i class="fas fa-chevron-right"></i> Galerie</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Ressources</h3>
                        <ul>
                            <li><a href="#" class="culture-tab-btn" data-tab="langue"><i class="fas fa-chevron-right"></i> Langues</a></li>
                            <li><a href="#" class="culture-tab-btn" data-tab="regions"><i class="fas fa-chevron-right"></i> Régions</a></li>
                            <li><a href="#" class="culture-tab-btn" data-tab="contenu"><i class="fas fa-chevron-right"></i> Contenus</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Newsletter</h3>
                        <p>Abonnez-vous pour recevoir nos actualités culturelles.</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Votre email" required>
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; 2023 Culture Bénin. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- MODALE DE PAIEMENT -->
    <div class="modal" id="payment-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Accéder au Contenu Premium</h3>
                <button class="close-modal" id="close-payment-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="price-option selected" data-price="500">
                    <div class="price-header">
                        <div>
                            <div class="price-amount">500 FCFA</div>
                            <div class="price-duration">Accès 24h</div>
                        </div>
                        <i class="fas fa-check-circle" style="color: var(--secondary); font-size: 24px;"></i>
                    </div>
                    <ul class="price-features">
                        <li><i class="fas fa-check"></i> Accès complet au contenu</li>
                        <li><i class="fas fa-check"></i> Téléchargement disponible</li>
                        <li><i class="fas fa-check"></i> Accès aux commentaires</li>
                    </ul>
                </div>
                
                <div class="price-option" data-price="2500">
                    <div class="price-header">
                        <div>
                            <div class="price-amount">2,500 FCFA</div>
                            <div class="price-duration">Accès 1 mois</div>
                        </div>
                        <i class="fas fa-circle" style="color: var(--text-light); font-size: 24px;"></i>
                    </div>
                    <ul class="price-features">
                        <li><i class="fas fa-check"></i> Tous les avantages de 24h</li>
                        <li><i class="fas fa-check"></i> Accès à tous les contenus premium</li>
                        <li><i class="fas fa-check"></i> Support prioritaire</li>
                    </ul>
                </div>
                
                <div class="payment-form">
                    <div class="form-group">
                        <label>Numéro de téléphone</label>
                        <input type="tel" class="form-control" id="phone-number" placeholder="+229 XX XX XX XX" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Opérateur mobile</label>
                        <select class="form-control" id="mobile-operator" required>
                            <option value="">Sélectionnez votre opérateur</option>
                            <option value="moov">Moov Africa</option>
                            <option value="mtn">MTN Bénin</option>
                            <option value="telecel">Telecel</option>
                        </select>
                    </div>
                    
                    <button class="pay-btn" id="process-payment">
                        <i class="fas fa-lock"></i>
                        Payer maintenant
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODALE DE COMMENTAIRES -->
    <div class="comments-modal" id="comments-modal">
        <div class="comments-container">
            <div class="comments-content">
                <div class="comments-header">
                    <h3>Commentaires</h3>
                    <button class="close-modal" id="close-comments-modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="comments-body">
                    <div class="comment-form">
                        <textarea id="comment-text" placeholder="Ajouter un commentaire..." rows="3"></textarea>
                        <button class="btn" id="submit-comment" style="padding: 12px 24px;">
                            <i class="fas fa-paper-plane"></i>
                            Publier
                        </button>
                    </div>
                    
                    <div class="comment-list" id="comment-list">
                        <!-- Les commentaires seront chargés ici -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODALE CONTENT VIEW -->
    <div class="content-view-modal" id="content-view-modal">
        <div class="content-view-container">
            <div class="content-view" id="content-view">
                <!-- Le contenu sera injecté ici par JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Création des particules animées
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            if (!particlesContainer) return;
            
            const particleCount = window.innerWidth < 768 ? 25 : 50;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                const size = Math.random() * 10 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                
                const colors = ['#008751', '#FCD116', '#E4002B'];
                particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                
                const duration = Math.random() * 20 + 10;
                const delay = Math.random() * 5;
                particle.style.animationDuration = `${duration}s`;
                particle.style.animationDelay = `${delay}s`;
                
                particlesContainer.appendChild(particle);
            }
        }

        // Initialisation du carrousel
        function initCarousel() {
            const carouselTrack = document.getElementById('carousel-track');
            const slides = document.querySelectorAll('.carousel-slide');
            const indicators = document.querySelectorAll('.carousel-indicator');
            const prevBtn = document.querySelector('.carousel-control.prev');
            const nextBtn = document.querySelector('.carousel-control.next');
            const currentSlideEl = document.getElementById('current-slide');
            const totalSlidesEl = document.getElementById('total-slides');
            
            if (!carouselTrack || slides.length === 0) return;
            
            let currentIndex = 0;
            const totalSlides = slides.length;
            
            if (totalSlidesEl) totalSlidesEl.textContent = totalSlides;
            updateCarousel();
            
            function updateCarousel() {
                const slideWidth = slides[0].offsetWidth;
                carouselTrack.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                
                if (currentSlideEl) currentSlideEl.textContent = currentIndex + 1;
                
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentIndex);
                });
            }
            
            function nextSlide() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateCarousel();
            }
            
            function prevSlide() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateCarousel();
            }
            
            function goToSlide(index) {
                currentIndex = index;
                updateCarousel();
            }
            
            if (prevBtn) prevBtn.addEventListener('click', prevSlide);
            if (nextBtn) nextBtn.addEventListener('click', nextSlide);
            
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => goToSlide(index));
            });
            
            let autoSlide = setInterval(nextSlide, 5000);
            
            if (carouselTrack) {
                carouselTrack.addEventListener('mouseenter', () => clearInterval(autoSlide));
                carouselTrack.addEventListener('mouseleave', () => {
                    autoSlide = setInterval(nextSlide, 5000);
                });
            }
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') nextSlide();
                if (e.key === 'ArrowLeft') prevSlide();
            });
            
            window.addEventListener('resize', updateCarousel);
        }

        // Gestion du menu mobile
        function initMobileMenu() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const navMenu = document.getElementById('nav-menu');
            
            if (mobileMenuBtn && navMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    navMenu.classList.toggle('show');
                    mobileMenuBtn.innerHTML = navMenu.classList.contains('show') 
                        ? '<i class="fas fa-times"></i>' 
                        : '<i class="fas fa-bars"></i>';
                });
                
                document.querySelectorAll('#nav-menu a').forEach(link => {
                    link.addEventListener('click', () => {
                        navMenu.classList.remove('show');
                        mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                    });
                });
            }
        }

        // Gestion des onglets Culture
        function initCultureTabs() {
            const tabButtons = document.querySelectorAll('.culture-tab-btn');
            const cultureSections = document.querySelectorAll('.culture-section');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const tab = this.getAttribute('data-tab');
                    const sectionToShow = document.getElementById(`${tab}-section`);
                    
                    if (!sectionToShow) return;
                    
                    cultureSections.forEach(section => {
                        section.classList.remove('active');
                    });
                    
                    sectionToShow.classList.add('active');
                    
                    const dropdown = this.closest('.culture-dropdown-content');
                    if (dropdown) dropdown.classList.remove('show');
                    
                    const navMenu = document.getElementById('nav-menu');
                    if (navMenu && navMenu.classList.contains('show')) {
                        navMenu.classList.remove('show');
                        document.getElementById('mobile-menu-btn').innerHTML = '<i class="fas fa-bars"></i>';
                    }
                    
                    setTimeout(() => {
                        sectionToShow.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'start' 
                        });
                    }, 100);
                });
            });
        }

        // Gestion des dropdowns
        function initDropdowns() {
            const dropdownBtns = document.querySelectorAll('.culture-dropdown-btn');
            
            dropdownBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const dropdown = this.nextElementSibling;
                    dropdown.classList.toggle('show');
                });
            });
            
            document.addEventListener('click', function() {
                document.querySelectorAll('.culture-dropdown-content.show').forEach(dropdown => {
                    dropdown.classList.remove('show');
                });
            });
            
            document.querySelectorAll('.culture-dropdown-content').forEach(dropdown => {
                dropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
        }

        // Gestion des filtres de contenu
        function initContentFilters() {
            const contentTabs = document.querySelectorAll('.content-tab');
            const contentCards = document.querySelectorAll('.content-category-filter');
            
            contentTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    contentTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    
                    contentCards.forEach(card => {
                        if (filter === 'all') {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = card.getAttribute('data-category') === filter 
                                ? 'flex' 
                                : 'none';
                        }
                    });
                });
            });
        }

        // Gestion des boutons d'action
        function initContentActions() {
            document.addEventListener('click', function(e) {
                // Boutons lire/regarder/écouter
                if (e.target.closest('.read-btn, .play-btn, .listen-btn')) {
                    e.preventDefault();
                    const button = e.target.closest('.read-btn, .play-btn, .listen-btn');
                    const contentId = button.getAttribute('data-content-id');
                    const contentType = button.getAttribute('data-type');
                    
                    if (contentType === 'premium') {
                        showPaymentModal(contentId);
                    } else {
                        accessContent(contentId);
                    }
                }
                
                // Bouton commenter
                if (e.target.closest('.comment-btn')) {
                    e.preventDefault();
                    const button = e.target.closest('.comment-btn');
                    const contentId = button.getAttribute('data-content-id');
                    showCommentsModal(contentId);
                }
                
                // Bouton voir détails
                if (e.target.closest('.view-btn')) {
                    e.preventDefault();
                    const button = e.target.closest('.view-btn');
                    const contentId = button.getAttribute('data-content-id');
                    showContentDetails(contentId);
                }
            });
        }

        // Afficher la modale de paiement
        function showPaymentModal(contentId) {
            const modal = document.getElementById('payment-modal');
            modal.classList.add('active');
            modal.setAttribute('data-content-id', contentId);
            
            initPriceOptions();
            
            document.getElementById('close-payment-modal').addEventListener('click', function() {
                modal.classList.remove('active');
            });
            
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
            
            document.getElementById('process-payment').addEventListener('click', processPayment);
        }

        // Initialiser les options de prix
        function initPriceOptions() {
            const options = document.querySelectorAll('.price-option');
            options.forEach(option => {
                option.addEventListener('click', function() {
                    options.forEach(opt => {
                        opt.classList.remove('selected');
                        opt.querySelector('i').className = 'fas fa-circle';
                        opt.querySelector('i').style.color = 'var(--text-light)';
                    });
                    this.classList.add('selected');
                    const checkIcon = this.querySelector('i');
                    checkIcon.className = 'fas fa-check-circle';
                    checkIcon.style.color = 'var(--secondary)';
                });
            });
        }

        // Traitement du paiement
        function processPayment() {
            const modal = document.getElementById('payment-modal');
            const contentId = modal.getAttribute('data-content-id');
            const selectedOption = document.querySelector('.price-option.selected');
            const amount = selectedOption.getAttribute('data-price');
            const phone = document.getElementById('phone-number').value;
            const operator = document.getElementById('mobile-operator').value;
            
            if (!phone || !operator) {
                alert('Veuillez remplir tous les champs');
                return;
            }
            
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                modal.classList.remove('active');
                
                // Simuler un succès de paiement
                alert(`Paiement de ${amount} FCFA réussi ! Accès au contenu autorisé.`);
                
                // Accéder au contenu
                accessContent(contentId);
            }, 2000);
        }

        // Afficher la modale de commentaires
        function showCommentsModal(contentId) {
            const modal = document.getElementById('comments-modal');
            modal.classList.add('active');
            modal.setAttribute('data-content-id', contentId);
            
            // Charger les commentaires
            loadComments(contentId);
            
            document.getElementById('close-comments-modal').addEventListener('click', function() {
                modal.classList.remove('active');
            });
            
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
            
            // Gestion de la soumission des commentaires
            document.getElementById('submit-comment').addEventListener('click', submitComment);
            
            // Fermeture avec Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    modal.classList.remove('active');
                }
            });
        }

        // Charger les commentaires
        function loadComments(contentId) {
            const commentList = document.getElementById('comment-list');
            commentList.innerHTML = '<div style="text-align: center; padding: 20px; color: var(--text-light);">Chargement des commentaires...</div>';
            
            // Simuler le chargement des commentaires
            setTimeout(() => {
                const comments = getCommentsData(contentId);
                commentList.innerHTML = comments;
            }, 500);
        }

        // Soumettre un commentaire
        function submitComment() {
            const modal = document.getElementById('comments-modal');
            const contentId = modal.getAttribute('data-content-id');
            const commentText = document.getElementById('comment-text').value;
            
            if (!commentText.trim()) {
                alert('Veuillez saisir un commentaire');
                return;
            }
            
            // Simuler l'envoi du commentaire
            const commentList = document.getElementById('comment-list');
            const newComment = createCommentElement('Vous', commentText, 'À l\'instant');
            
            // Ajouter le nouveau commentaire en haut de la liste
            if (commentList.firstChild && commentList.firstChild.innerHTML.includes('aucun commentaire')) {
                commentList.innerHTML = newComment;
            } else {
                commentList.innerHTML = newComment + commentList.innerHTML;
            }
            
            // Réinitialiser le champ de texte
            document.getElementById('comment-text').value = '';
            
            // Afficher un message de succès
            const successMsg = document.createElement('div');
            successMsg.style.cssText = 'background: var(--primary); color: white; padding: 10px; border-radius: 10px; margin-bottom: 15px; text-align: center;';
            successMsg.innerHTML = '<i class="fas fa-check"></i> Commentaire publié avec succès';
            commentList.insertBefore(successMsg, commentList.firstChild);
            
            // Supprimer le message après 3 secondes
            setTimeout(() => {
                if (successMsg.parentNode) {
                    successMsg.parentNode.removeChild(successMsg);
                }
            }, 3000);
        }

        // Créer un élément de commentaire
        function createCommentElement(user, text, date) {
            return `
                <div class="comment-item">
                    <div class="comment-header">
                        <div class="comment-user">
                            <div class="user-avatar">${user.charAt(0)}</div>
                            <div class="comment-meta">
                                <div class="user-name">${user}</div>
                                <div class="comment-date">${date}</div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-text">${text}</div>
                </div>
            `;
        }

        // Afficher les détails du contenu
        function showContentDetails(contentId) {
            const modal = document.getElementById('content-view-modal');
            const contentView = document.getElementById('content-view');
            
            // Charger les données du contenu
            const contentData = getContentData(contentId);
            
            // Construire la vue détaillée
            contentView.innerHTML = buildContentView(contentData);
            
            modal.classList.add('active');
            modal.setAttribute('data-content-id', contentId);
            
            // Gestion de la fermeture
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
            
            // Fermeture avec Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    modal.classList.remove('active');
                }
            });
            
            // Gestion des boutons d'action dans la vue détaillée
            const actionBtn = contentView.querySelector('.content-action-btn');
            if (actionBtn) {
                actionBtn.addEventListener('click', function() {
                    const contentType = this.getAttribute('data-type');
                    if (contentType === 'premium') {
                        modal.classList.remove('active');
                        setTimeout(() => showPaymentModal(contentId), 300);
                    } else {
                        accessContent(contentId);
                    }
                });
            }
            
            // Gestion du bouton de commentaires dans la vue détaillée
            const commentBtn = contentView.querySelector('.content-comment-btn');
            if (commentBtn) {
                commentBtn.addEventListener('click', function() {
                    modal.classList.remove('active');
                    setTimeout(() => showCommentsModal(contentId), 300);
                });
            }
        }

        // Construire la vue détaillée
        function buildContentView(data) {
            return `
                <div class="content-view-header">
                    <img src="${data.image}" alt="${data.title}">
                    <div class="content-view-overlay">
                        <div class="content-view-title">
                            <span class="carousel-badge" style="background-color: ${data.badgeColor}; color: white;">
                                ${data.badgeText}
                            </span>
                            <h2 class="text-4xl md:text-5xl font-bold mb-2">${data.title}</h2>
                            <p class="text-xl">${data.author}</p>
                        </div>
                        <div class="content-view-actions">
                            <button class="btn content-action-btn" data-type="${data.type}">
                                <i class="fas fa-${data.icon}"></i>
                                ${data.actionText}
                            </button>
                            <button class="btn content-comment-btn" style="background: rgba(255,255,255,0.1);">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="content-view-body">
                    <div class="content-meta">
                        <div class="meta-item">
                            <i class="far fa-calendar"></i>
                            <span>${data.date}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-eye"></i>
                            <span>${data.views} vues</span>
                        </div>
                        <div class="meta-item">
                            <i class="far fa-clock"></i>
                            <span>${data.duration}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tag"></i>
                            <span>${data.tags}</span>
                        </div>
                    </div>
                    
                    <div class="content-description">
                        ${data.description}
                    </div>
                </div>
            `;
        }

        // Accéder au contenu
        function accessContent(contentId) {
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                
                // Simuler l'accès au contenu
                const contentData = getContentData(contentId);
                alert(`Accès au contenu : "${contentData.title}"\n\nRedirection vers le contenu...`);
                
                // Dans la réalité, rediriger vers la page du contenu
                // window.location.href = `/content/${contentId}`;
            }, 1000);
        }

        // Données des contenus
        function getContentData(contentId) {
            const contentData = {
                '1': {
                    title: 'Festival International Ouidah 2024',
                    author: 'Par Jean K. Agbokou',
                    date: '10 Janvier 2024',
                    views: '1,245',
                    duration: '15 min de lecture',
                    badgeText: 'Article Premium',
                    badgeColor: '#fcd116',
                    type: 'premium',
                    icon: 'book-open',
                    actionText: 'Lire cet article',
                    tags: '#Vodoun #Culture #Tradition',
                    image: '{{ asset('adminlte/img/vodunday.jpg') }}',
                    description: `
                        <p>Le Festival International Ouidah 2024 a été un événement marquant dans le calendrier culturel béninois. Cette célébration annuelle de la culture vodoun a rassemblé des milliers de participants venus du monde entier pour honorer les traditions ancestrales.</p>
                        <p>Au programme : des cérémonies vodoun authentiques, des danses traditionnelles, des rituels sacrés et des conférences sur l'histoire et la signification du vodoun dans la société béninoise contemporaine.</p>
                        <p>Le point culminant du festival a été la grande procession vers la Porte du Non-Retour, symbole de la mémoire de la traite négrière et de la résilience des cultures africaines.</p>
                        <p>Cet article exclusif vous plonge au cœur des célébrations avec des interviews exclusives, des photos inédites et une analyse approfondie de l'importance du vodoun dans la culture béninoise.</p>
                    `
                },
                '2': {
                    title: 'Fête du Gaani à Nikki',
                    author: 'Par Abdoulaye Bako',
                    date: '5 Décembre 2023',
                    views: '892',
                    duration: '8 min de lecture',
                    badgeText: 'Article Gratuit',
                    badgeColor: '#008751',
                    type: 'free',
                    icon: 'book-open',
                    actionText: 'Lire cet article',
                    tags: '#Bariba #Tradition #Royaume',
                    image: '{{ asset('adminlte/img/gaani.jpg') }}',
                    description: `
                        <p>La Fête du Gaani est l'une des plus importantes célébrations traditionnelles du peuple Bariba au nord du Bénin. Cette fête annuelle commémore l'histoire du royaume de Nikki et honore les ancêtres.</p>
                        <p>Pendant trois jours, la ville de Nikki s'anime avec des défilés de cavaliers traditionnels, des danses masquées, des cérémonies royales et des rituels ancestraux. Les participants portent des costumes colorés et des masques représentant différents esprits et ancêtres.</p>
                        <p>La Fête du Gaani est reconnue comme patrimoine culturel immatériel de l'UNESCO depuis 2019, ce qui témoigne de son importance pour la préservation de la culture africaine.</p>
                        <p>Cet article vous emmène à la découverte de cette fête unique, de ses origines historiques à ses manifestations contemporaines, en passant par les significations profondes de chaque rituel.</p>
                    `
                },
                '3': {
                    title: 'Les Rois du Dahomey : Histoire et Héritage',
                    author: 'Par Historien Bénin',
                    date: '15 Mars 2024',
                    views: '2,567',
                    duration: '45 min',
                    badgeText: 'Documentaire Premium',
                    badgeColor: '#fcd116',
                    type: 'premium',
                    icon: 'play-circle',
                    actionText: 'Regarder le documentaire',
                    tags: '#Histoire #Royaume #Dahomey',
                    image: '{{ asset('adminlte/img/roi.jpg') }}',
                    description: `
                        <p>Ce documentaire exclusif explore l'histoire fascinante des rois du Dahomey, de leur ascension au pouvoir à leur héritage dans le Bénin contemporain.</p>
                        <p>À travers des reconstitutions historiques, des interviews d'experts et des images d'archives rares, découvrez comment les rois du Dahomey ont façonné l'histoire de la région.</p>
                        <p>Le documentaire couvre les périodes clés : la fondation du royaume, l'expansion territoriale, l'organisation sociale et militaire, et les relations avec les puissances européennes.</p>
                        <p>Un regard approfondi sur l'héritage culturel, politique et social laissé par ces monarques qui continuent d'influencer la culture béninoise aujourd'hui.</p>
                    `
                }
            };
            
            return contentData[contentId] || contentData['1'];
        }

        // Données des commentaires
        function getCommentsData(contentId) {
            const comments = {
                '1': `
                    ${createCommentElement('Marie Akouété', 'Magnifique reportage ! J\'ai eu la chance d\'assister au festival l\'année dernière et c\'était une expérience inoubliable. La procession vers la Porte du Non-Retour était particulièrement émouvante.', 'Il y a 2 jours')}
                    ${createCommentElement('Koffi Mensah', 'Excellent article qui capture parfaitement l\'essence du vodoun. Trop souvent mal compris, le vodoun mérite ce genre de traitement respectueux et informatif.', 'Il y a 1 semaine')}
                    ${createCommentElement('Amina Diallo', 'Je rêve d\'assister à ce festival depuis des années. Votre article m\'a donné encore plus envie d\'y aller l\'année prochaine !', 'Il y a 3 jours')}
                `,
                '2': `
                    ${createCommentElement('Souleymane Ibrahim', 'Je suis originaire de Nikki et je suis fier de voir notre tradition présentée avec autant de respect. Le Gaani est plus qu\'une fête, c\'est notre identité.', 'Il y a 1 semaine')}
                    ${createCommentElement('Fatoumata Keita', 'Les photos sont magnifiques ! Les costumes et les masques sont d\'une beauté exceptionnelle. Merci pour ce beau reportage.', 'Il y a 2 semaines')}
                `,
                'default': `
                    <div style="text-align: center; padding: 30px; color: var(--text-light);">
                        <i class="fas fa-comments" style="font-size: 48px; margin-bottom: 15px; opacity: 0.5;"></i>
                        <p>Soyez le premier à commenter ce contenu !</p>
                    </div>
                `
            };
            
            return comments[contentId] || comments['default'];
        }

        // Afficher le chargement
        function showLoading() {
            document.getElementById('loading').classList.add('active');
        }

        // Cacher le chargement
        function hideLoading() {
            document.getElementById('loading').classList.remove('active');
        }

        // Animation au défilement
        function initScrollAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-on-scroll');
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('.domain-item, .content-card, .gallery-item, .stat').forEach(el => {
                observer.observe(el);
            });
        }

        // Smooth scroll pour les ancres
        function initSmoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        const headerHeight = document.querySelector('header').offsetHeight;
                        const targetPosition = targetElement.offsetTop - headerHeight;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        }

        // Initialisation complète
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            initCarousel();
            initMobileMenu();
            initCultureTabs();
            initDropdowns();
            initContentFilters();
            initContentActions();
            initScrollAnimations();
            initSmoothScroll();
            
            // Afficher la section contenu par défaut
            document.getElementById('contenu-section').classList.add('active');
        });

        // Gestion du redimensionnement
        window.addEventListener('resize', function() {
            const particlesContainer = document.getElementById('particles');
            if (particlesContainer) {
                particlesContainer.innerHTML = '';
                createParticles();
            }
        });
    </script>
</body>
</html>


<!DOCTYPE html>
<html lang="fr">
<head>
    <style>
        /* ... (garder tous les styles existants) ... */

        /* NOUVEAU: Bouton de retour dans Content View */
        .content-view-header {
            position: relative;
            height: 400px;
            overflow: hidden;
        }

        .back-to-home-btn {
            position: absolute;
            top: 25px;
            left: 25px;
            z-index: 10;
            background: rgba(26, 26, 26, 0.8);
            color: var(--white);
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .back-to-home-btn:hover {
            background: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 135, 81, 0.3);
        }

        .content-view-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
            padding: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        @media (max-width: 768px) {
            .back-to-home-btn {
                top: 15px;
                left: 15px;
                padding: 10px 20px;
                font-size: 14px;
            }
            
            .content-view-header {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- MODALE CONTENT VIEW AVEC BOUTON DE RETOUR -->
    <div class="content-view-modal" id="content-view-modal">
        <div class="content-view-container">
            <div class="content-view" id="content-view">
                <!-- Le contenu sera injecté ici par JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Afficher les détails du contenu avec bouton de retour
        function showContentDetails(contentId) {
            const modal = document.getElementById('content-view-modal');
            const contentView = document.getElementById('content-view');
            
            // Charger les données du contenu
            const contentData = getContentData(contentId);
            
            // Construire la vue détaillée AVEC BOUTON DE RETOUR
            contentView.innerHTML = buildContentView(contentData);
            
            modal.classList.add('active');
            modal.setAttribute('data-content-id', contentId);
            
            // Gestion de la fermeture
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
            
            // Fermeture avec Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    modal.classList.remove('active');
                }
            });
            
            // Gestion du bouton de retour vers l'accueil
            const backBtn = contentView.querySelector('.back-to-home-btn');
            if (backBtn) {
                backBtn.addEventListener('click', function() {
                    modal.classList.remove('active');
                    // Retourner à la section d'accueil
                    setTimeout(() => {
                        document.getElementById('accueil').scrollIntoView({ 
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 300);
                });
            }
            
            // Gestion des boutons d'action dans la vue détaillée
            const actionBtn = contentView.querySelector('.content-action-btn');
            if (actionBtn) {
                actionBtn.addEventListener('click', function() {
                    const contentType = this.getAttribute('data-type');
                    if (contentType === 'premium') {
                        modal.classList.remove('active');
                        setTimeout(() => showPaymentModal(contentId), 300);
                    } else {
                        accessContent(contentId);
                    }
                });
            }
            
            // Gestion du bouton de commentaires dans la vue détaillée
            const commentBtn = contentView.querySelector('.content-comment-btn');
            if (commentBtn) {
                commentBtn.addEventListener('click', function() {
                    modal.classList.remove('active');
                    setTimeout(() => showCommentsModal(contentId), 300);
                });
            }
        }

        // Construire la vue détaillée AVEC BOUTON DE RETOUR
        function buildContentView(data) {
            return `
                <div class="content-view-header">
                    <!-- NOUVEAU BOUTON DE RETOUR -->
                    <button class="back-to-home-btn">
                        <i class="fas fa-arrow-left"></i>
                        Retour à l'accueil
                    </button>
                    
                    <img src="${data.image}" alt="${data.title}">
                    <div class="content-view-overlay">
                        <div class="content-view-title">
                            <span class="carousel-badge" style="background-color: ${data.badgeColor}; color: white;">
                                ${data.badgeText}
                            </span>
                            <h2 class="text-4xl md:text-5xl font-bold mb-2">${data.title}</h2>
                            <p class="text-xl">${data.author}</p>
                        </div>
                        <div class="content-view-actions">
                            <button class="btn content-action-btn" data-type="${data.type}">
                                <i class="fas fa-${data.icon}"></i>
                                ${data.actionText}
                            </button>
                            <button class="btn content-comment-btn" style="background: rgba(255,255,255,0.1);">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="content-view-body">
                    <div class="content-meta">
                        <div class="meta-item">
                            <i class="far fa-calendar"></i>
                            <span>${data.date}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-eye"></i>
                            <span>${data.views} vues</span>
                        </div>
                        <div class="meta-item">
                            <i class="far fa-clock"></i>
                            <span>${data.duration}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tag"></i>
                            <span>${data.tags}</span>
                        </div>
                    </div>
                    
                    <div class="content-description">
                        ${data.description}
                    </div>
                </div>
            `;
        }

        // Données des contenus (exemple)
        function getContentData(contentId) {
            const contentData = {
                '1': {
                    title: 'Festival International Ouidah 2024',
                    author: 'Par Jean K. Agbokou',
                    date: '10 Janvier 2024',
                    views: '1,245',
                    duration: '15 min de lecture',
                    badgeText: 'Article Premium',
                    badgeColor: '#fcd116',
                    type: 'premium',
                    icon: 'book-open',
                    actionText: 'Lire cet article',
                    tags: '#Vodoun #Culture #Tradition',
                    image: '{{ asset('adminlte/img/vodunday.jpg') }}',
                    description: `
                        <p>Le Festival International Ouidah 2024 a été un événement marquant dans le calendrier culturel béninois.</p>
                        <p>Au programme : des cérémonies vodoun authentiques, des danses traditionnelles, des rituels sacrés...</p>
                    `
                }
            };
            
            return contentData[contentId] || contentData['1'];
        }
    </script>
</body>
</html>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture Bénin - Découvrez la richesse culturelle du Bénin</title>
    <link rel="icon" href="{{ asset('adminlte/img/culture1.jpg') }}" type="image/jpg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.isUserLoggedIn = @json(Auth::check());
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ... (tous les styles CSS précédents restent les mêmes) ... */

        /* MODIFICATION: Ajustement pour le bouton retour */
        .back-to-home-btn {
            position: absolute;
            top: 25px;
            left: 25px;
            z-index: 10;
            background: rgba(26, 26, 26, 0.8);
            color: var(--white);
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .back-to-home-btn:hover {
            background: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 135, 81, 0.3);
        }

        /* MODIFICATION: Styles pour le contenu dans content-view */
        .content-body {
            font-size: 18px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
        }

        .content-body p {
            margin-bottom: 20px;
        }

        .content-body h3 {
            font-size: 24px;
            margin: 30px 0 15px;
            color: var(--white);
            font-family: 'Playfair Display', serif;
        }

        .content-body ul, .content-body ol {
            margin: 20px 0;
            padding-left: 30px;
        }

        .content-body li {
            margin-bottom: 10px;
        }

        .content-body blockquote {
            border-left: 4px solid var(--secondary);
            padding-left: 20px;
            margin: 25px 0;
            font-style: italic;
            color: rgba(255, 255, 255, 0.8);
        }

        /* MODIFICATION: Loading */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 3000;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
        }

        .loading.active {
            display: flex;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.1);
            border-top: 5px solid var(--secondary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .back-to-home-btn {
                top: 15px;
                left: 15px;
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- ... (tout le HTML précédent reste le même jusqu'à la section contenu) ... -->

    <!-- SECTION CONTENU -->
    <section class="culture-section active" id="contenu-section">
        <div class="container">
            <div class="section-title">
                <h2>Contenu Culturel</h2>
            </div>
            
            <div class="content-tabs">
                <button class="content-tab active" data-filter="all">
                    <i class="fas fa-th-large"></i>
                    Tous
                </button>
                <button class="content-tab" data-filter="article">
                    <i class="fas fa-newspaper"></i>
                    Articles
                </button>
                <button class="content-tab" data-filter="video">
                    <i class="fas fa-play-circle"></i>
                    Vidéos
                </button>
                <button class="content-tab" data-filter="podcast">
                    <i class="fas fa-podcast"></i>
                    Podcasts
                </button>
                <button class="content-tab" data-filter="interview">
                    <i class="fas fa-microphone-alt"></i>
                    Interviews
                </button>
            </div>
            
            <div class="centered-cards-container">
                <!-- Article Premium - MODIFICATION: Ajout data-type="premium" -->
                <div class="content-card content-category-filter premium-content" data-category="article">
                    <div class="premium-badge">
                        <i class="fas fa-crown"></i> PREMIUM
                    </div>
                    <div class="content-image">
                        <img src="{{ asset('adminlte/img/vodunday.jpg') }}" alt="Festival Ouidah">
                    </div>
                    <div class="content-details">
                        <h3>Festival International Ouidah 2024</h3>
                        <p>Célébration annuelle de la culture vodoun avec des cérémonies, danses et rituels traditionnels.</p>
                        <div class="content-actions">
                            <!-- MODIFICATION: Bouton voir détails avec data-type="premium" -->
                            <button class="action-btn view-btn" data-content-id="1" data-type="premium">
                                <i class="fas fa-eye"></i>
                                Voir détails
                            </button>
                            <button class="action-btn comment-btn" data-content-id="1">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Article Gratuit - MODIFICATION: Ajout data-type="free" -->
                <div class="content-card content-category-filter" data-category="article">
                    <div class="free-badge">
                        <i class="fas fa-unlock"></i> GRATUIT
                    </div>
                    <div class="content-image">
                        <img src="{{ asset('adminlte/img/gaani.jpg') }}" alt="Fête du Gani">
                    </div>
                    <div class="content-details">
                        <h3>Fête du Gaani à Nikki</h3>
                        <p>Cérémonie traditionnelle des Bariba avec défilés, danses masquées et célébrations royales.</p>
                        <div class="content-actions">
                            <!-- MODIFICATION: Bouton voir détails avec data-type="free" -->
                            <button class="action-btn view-btn" data-content-id="2" data-type="free">
                                <i class="fas fa-eye"></i>
                                Voir détails
                            </button>
                            <button class="action-btn comment-btn" data-content-id="2">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Vidéo Premium -->
                <div class="content-card content-category-filter premium-content" data-category="video">
                    <div class="premium-badge">
                        <i class="fas fa-crown"></i> PREMIUM
                    </div>
                    <div class="content-image">
                        <img src="{{ asset('adminlte/img/roi.jpg') }}" alt="Documentaire culturel">
                    </div>
                    <div class="content-details">
                        <h3>Les Rois du Dahomey : Histoire et Héritage</h3>
                        <p>Documentaire exclusif sur l'histoire des rois du Dahomey et leur influence sur la culture béninoise.</p>
                        <div class="content-actions">
                            <button class="action-btn view-btn" data-content-id="3" data-type="premium">
                                <i class="fas fa-eye"></i>
                                Voir détails
                            </button>
                            <button class="action-btn comment-btn" data-content-id="3">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Vidéo Gratuite -->
                <div class="content-card content-category-filter" data-category="video">
                    <div class="free-badge">
                        <i class="fas fa-unlock"></i> GRATUIT
                    </div>
                    <div class="content-image">
                        <img src="{{ asset('adminlte/img/ballet.jpg') }}" alt="Spectacle de danse">
                    </div>
                    <div class="content-details">
                        <h3>Ballet National du Bénin : Rythmes Sacrés</h3>
                        <p>Captation du spectacle "Rythmes Sacrés" mettant en scène les danses traditionnelles des différentes ethnies du Bénin.</p>
                        <div class="content-actions">
                            <button class="action-btn view-btn" data-content-id="4" data-type="free">
                                <i class="fas fa-eye"></i>
                                Voir détails
                            </button>
                            <button class="action-btn comment-btn" data-content-id="4">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Podcast Gratuit -->
                <div class="content-card content-category-filter" data-category="podcast">
                    <div class="free-badge">
                        <i class="fas fa-unlock"></i> GRATUIT
                    </div>
                    <div class="content-image">
                        <img src="{{ asset('adminlte/img/femme.jpg') }}" alt="Podcast traditions">
                    </div>
                    <div class="content-details">
                        <h3>Vodoun : Mythes et Réalités</h3>
                        <p>Une série de podcasts explorant les origines, les pratiques et les malentendus autour du Vodoun.</p>
                        <div class="content-actions">
                            <button class="action-btn view-btn" data-content-id="5" data-type="free">
                                <i class="fas fa-eye"></i>
                                Voir détails
                            </button>
                            <button class="action-btn comment-btn" data-content-id="5">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Podcast Premium -->
                <div class="content-card content-category-filter premium-content" data-category="podcast">
                    <div class="premium-badge">
                        <i class="fas fa-crown"></i> PREMIUM
                    </div>
                    <div class="content-image">
                        <img src="{{ asset('adminlte/img/tambour.jpg') }}" alt="Podcast musique">
                    </div>
                    <div class="content-details">
                        <h3>Les Tambours Parlants du Bénin</h3>
                        <p>Décryptage des rythmes et messages transmis par les tambours traditionnels béninois.</p>
                        <div class="content-actions">
                            <button class="action-btn view-btn" data-content-id="6" data-type="premium">
                                <i class="fas fa-eye"></i>
                                Voir détails
                            </button>
                            <button class="action-btn comment-btn" data-content-id="6">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ... (le reste du HTML reste le même) ... -->

    <!-- MODALE CONTENT VIEW -->
    <div class="content-view-modal" id="content-view-modal">
        <div class="content-view-container">
            <div class="content-view" id="content-view">
                <!-- Le contenu sera injecté ici par JavaScript -->
            </div>
        </div>
    </div>

    <!-- AJOUT: Loading overlay -->
    <div class="loading" id="loading">
        <div class="loading-spinner"></div>
        <div style="color: var(--white); font-size: 18px;">Chargement...</div>
    </div>

    <script>
        // ... (les fonctions précédentes restent les mêmes jusqu'à initContentActions) ...

        // MODIFICATION: Gestion des boutons d'action
        function initContentActions() {
            document.addEventListener('click', function(e) {
                // Bouton voir détails - MODIFICATION: Vérifier si c'est premium ou free
                if (e.target.closest('.view-btn')) {
                    e.preventDefault();
                    const button = e.target.closest('.view-btn');
                    const contentId = button.getAttribute('data-content-id');
                    const contentType = button.getAttribute('data-type');
                    
                    if (contentType === 'premium') {
                        // Si premium, montrer la modale de paiement
                        showPaymentModal(contentId);
                    } else {
                        // Si gratuit, montrer directement les détails
                        showContentDetails(contentId);
                    }
                }
                
                // Bouton commenter
                if (e.target.closest('.comment-btn')) {
                    e.preventDefault();
                    const button = e.target.closest('.comment-btn');
                    const contentId = button.getAttribute('data-content-id');
                    showCommentsModal(contentId);
                }
            });
        }

        // MODIFICATION: Afficher la modale de paiement
        function showPaymentModal(contentId) {
            const modal = document.getElementById('payment-modal');
            modal.classList.add('active');
            modal.setAttribute('data-content-id', contentId);
            
            initPriceOptions();
            
            document.getElementById('close-payment-modal').addEventListener('click', function() {
                modal.classList.remove('active');
            });
            
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
            
            // MODIFICATION: Gestion du paiement pour accéder au contenu
            document.getElementById('process-payment').addEventListener('click', function() {
                processPayment(contentId);
            });
        }

        // MODIFICATION: Traitement du paiement pour accéder au contenu
        function processPayment(contentId) {
            const modal = document.getElementById('payment-modal');
            const selectedOption = document.querySelector('.price-option.selected');
            const amount = selectedOption.getAttribute('data-price');
            const phone = document.getElementById('phone-number').value;
            const operator = document.getElementById('mobile-operator').value;
            
            if (!phone || !operator) {
                alert('Veuillez remplir tous les champs');
                return;
            }
            
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                modal.classList.remove('active');
                
                // Simuler un succès de paiement
                alert(`Paiement de ${amount} FCFA réussi ! Accès au contenu autorisé.`);
                
                // MODIFICATION: Après paiement, afficher les détails du contenu
                showContentDetails(contentId);
            }, 2000);
        }

        // MODIFICATION: Afficher les détails du contenu
        function showContentDetails(contentId) {
            const modal = document.getElementById('content-view-modal');
            const contentView = document.getElementById('content-view');
            
            // Charger les données du contenu
            const contentData = getContentData(contentId);
            
            // Construire la vue détaillée AVEC LE CONTENU COMPLET
            contentView.innerHTML = buildContentView(contentData, contentId);
            
            modal.classList.add('active');
            modal.setAttribute('data-content-id', contentId);
            
            // Gestion de la fermeture
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
            
            // Fermeture avec Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    modal.classList.remove('active');
                }
            });
            
            // MODIFICATION: Gestion du bouton de retour
            const backBtn = contentView.querySelector('.back-to-home-btn');
            if (backBtn) {
                backBtn.addEventListener('click', function() {
                    modal.classList.remove('active');
                    // Retourner directement à la section contenu
                    setTimeout(() => {
                        document.getElementById('contenu-section').scrollIntoView({ 
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 300);
                });
            }
            
            // Gestion du bouton de commentaires
            const commentBtn = contentView.querySelector('.content-comment-btn');
            if (commentBtn) {
                commentBtn.addEventListener('click', function() {
                    modal.classList.remove('active');
                    setTimeout(() => showCommentsModal(contentId), 300);
                });
            }
        }

        // MODIFICATION: Construire la vue détaillée AVEC CONTENU COMPLET
        function buildContentView(data, contentId) {
            const isPremium = data.type === 'premium';
            
            return `
                <div class="content-view-header">
                    <!-- MODIFICATION: Bouton retour vers section contenu -->
                    <button class="back-to-home-btn">
                        <i class="fas fa-arrow-left"></i>
                        Retour aux contenus
                    </button>
                    
                    <img src="${data.image}" alt="${data.title}">
                    <div class="content-view-overlay">
                        <div class="content-view-title">
                            <span class="carousel-badge" style="background-color: ${data.badgeColor}; color: white;">
                                ${data.badgeText}
                            </span>
                            <h2 class="text-4xl md:text-5xl font-bold mb-2">${data.title}</h2>
                            <p class="text-xl">${data.author}</p>
                        </div>
                        <div class="content-view-actions">
                            <!-- MODIFICATION: Bouton d'action selon le type -->
                            ${isPremium ? `
                                <button class="btn content-action-btn" onclick="showPaymentModal('${contentId}')">
                                    <i class="fas fa-lock"></i>
                                    Débloquer ce contenu
                                </button>
                            ` : `
                                <button class="btn content-action-btn" onclick="accessContent('${contentId}')">
                                    <i class="fas fa-${data.icon}"></i>
                                    ${data.actionText}
                                </button>
                            `}
                            <button class="btn content-comment-btn" style="background: rgba(255,255,255,0.1);">
                                <i class="fas fa-comment"></i>
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="content-view-body">
                    <div class="content-meta">
                        <div class="meta-item">
                            <i class="far fa-calendar"></i>
                            <span>${data.date}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-eye"></i>
                            <span>${data.views} vues</span>
                        </div>
                        <div class="meta-item">
                            <i class="far fa-clock"></i>
                            <span>${data.duration}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tag"></i>
                            <span>${data.tags}</span>
                        </div>
                    </div>
                    
                    <!-- MODIFICATION: Ajout du contenu complet -->
                    <div class="content-body">
                        ${data.fullContent}
                    </div>
                </div>
            `;
        }

        // MODIFICATION: Données des contenus AVEC CONTENU COMPLET
        function getContentData(contentId) {
            const contentData = {
                '1': {
                    title: 'Festival International Ouidah 2024',
                    author: 'Par Jean K. Agbokou',
                    date: '10 Janvier 2024',
                    views: '1,245',
                    duration: '15 min de lecture',
                    badgeText: 'Article Premium',
                    badgeColor: '#fcd116',
                    type: 'premium',
                    icon: 'book-open',
                    actionText: 'Lire cet article',
                    tags: '#Vodoun #Culture #Tradition',
                    image: '{{ asset('adminlte/img/vodunday.jpg') }}',
                    fullContent: `
                        <p>Le Festival International Ouidah 2024 a marqué un tournant dans la présentation de la culture vodoun au monde entier. Cette édition, la plus importante à ce jour, a rassemblé des délégations de plus de 30 pays et a été suivie par plus de 50,000 visiteurs.</p>
                        
                        <h3>Les Temps Forts du Festival</h3>
                        <p>Le festival a débuté par une cérémonie d'ouverture solennelle sur la plage de Ouidah, où les prêtres vodoun ont invoqué les divinités des eaux pour bénir l'événement. Des centaines de fidèles vêtus de blanc ont participé à cette cérémonie empreinte de spiritualité.</p>
                        
                        <p>Parmi les moments marquants :</p>
                        <ul>
                            <li>La reconstitution historique de la Route des Esclaves</li>
                            <li>Les danses sacrées des Zangbéto</li>
                            <li>Les initiations aux rituels traditionnels</li>
                            <li>Les conférences sur la philosophie vodoun</li>
                        </ul>
                        
                        <h3>La Grande Procession</h3>
                        <p>Le point culminant a été la grande procession de la Porte du Non-Retour vers le Temple des Pythons. Plus de 5,000 personnes ont défilé en chantant des hymnes traditionnels, portant des offrandes et des symboles religieux.</p>
                        
                        <blockquote>
                            "Ce festival n'est pas seulement une célébration, c'est une réappropriation de notre histoire et de notre spiritualité." - Prêtre vodoun
                        </blockquote>
                        
                        <h3>Impact International</h3>
                        <p>Pour la première fois, des académiciens de renommée mondiale ont participé aux débats sur la place du vodoun dans le patrimoine culturel immatériel de l'humanité. Des accords de coopération culturelle ont été signés avec plusieurs pays.</p>
                        
                        <p>Le festival a également été l'occasion de lancer le projet "Vodoun 2.0", une initiative visant à numériser les connaissances ancestrales et à les rendre accessibles aux jeunes générations.</p>
                    `
                },
                '2': {
                    title: 'Fête du Gaani à Nikki',
                    author: 'Par Abdoulaye Bako',
                    date: '5 Décembre 2023',
                    views: '892',
                    duration: '8 min de lecture',
                    badgeText: 'Article Gratuit',
                    badgeColor: '#008751',
                    type: 'free',
                    icon: 'book-open',
                    actionText: 'Lire cet article',
                    tags: '#Bariba #Tradition #Royaume',
                    image: '{{ asset('adminlte/img/gaani.jpg') }}',
                    fullContent: `
                        <p>La Fête du Gaani, célébrée chaque année à Nikki, est bien plus qu'un simple événement festif. C'est la manifestation vivante de l'histoire et de l'identité du peuple Bariba, gardienne des traditions séculaires du royaume de Nikki.</p>
                        
                        <h3>Origines Historiques</h3>
                        <p>Le Gaani trouve ses racines au XVIe siècle, sous le règne du roi Séro Kpéra. Initialement cérémonie d'hommage aux ancêtres royaux, elle est devenue au fil des siècles la fête identitaire la plus importante des Bariba.</p>
                        
                        <p>La fête commémore trois événements majeurs :</p>
                        <ol>
                            <li>La fondation du royaume de Nikki</li>
                            <li>Les victoires militaires des rois Bariba</li>
                            <li>Les alliances avec les royaumes voisins</li>
                        </ol>
                        
                        <h3>Les Cérémonies</h3>
                        <p>Pendant trois jours, Nikki vit au rythme des traditions :</p>
                        
                        <p><strong>Jour 1 : Les préparatifs</strong><br>
                        Les femmes préparent le tchoukoutou (bière de mil) et les plats traditionnels. Les hommes nettoient et décorent les places publiques.</p>
                        
                        <p><strong>Jour 2 : Les défilés</strong><br>
                        Les cavaliers traditionnels, vêtus de tuniques brodées et armés de lances, défilent devant le roi. Les danseurs masqués exécutent les danses guerrières.</p>
                        
                        <p><strong>Jour 3 : Les rituels</strong><br>
                        Le roi reçoit les hommages des chefs de villages. Des sacrifices symboliques sont offerts aux ancêtres.</p>
                        
                        <h3>Les Masques Traditionnels</h3>
                        <p>Les masques du Gaani sont des œuvres d'art à part entière. Chaque masque représente un ancêtre, un esprit ou un animal totémique. Le plus célèbre est le masque "Gounon", représentant le fondateur mythique du royaume.</p>
                        
                        <blockquote>
                            "Le Gaani, c'est notre livre d'histoire vivant. Chaque geste, chaque chant, chaque masque raconte une page de notre passé." - Ancien du village
                        </blockquote>
                        
                        <h3>Reconnaissance UNESCO</h3>
                        <p>Depuis son inscription au patrimoine culturel immatériel de l'UNESCO en 2019, le Gaani a connu un regain d'intérêt international. Des chercheurs du monde entier viennent étudier cette tradition unique.</p>
                        
                        <p>Le gouvernement béninois, en collaboration avec les chefs traditionnels, a mis en place un programme de préservation qui inclut :</p>
                        <ul>
                            <li>La formation des jeunes aux arts traditionnels</li>
                            <li>La documentation des rituels</li>
                            <li>La promotion touristique responsable</li>
                        </ul>
                        
                        <p>Aujourd'hui, le Gaani n'est plus seulement une fête locale. C'est un symbole de la résilience culturelle africaine et une vitrine du riche patrimoine du Bénin.</p>
                    `
                },
                '3': {
                    title: 'Les Rois du Dahomey : Histoire et Héritage',
                    author: 'Par Historien Bénin',
                    date: '15 Mars 2024',
                    views: '2,567',
                    duration: '45 min',
                    badgeText: 'Documentaire Premium',
                    badgeColor: '#fcd116',
                    type: 'premium',
                    icon: 'play-circle',
                    actionText: 'Regarder le documentaire',
                    tags: '#Histoire #Royaume #Dahomey',
                    image: '{{ asset('adminlte/img/roi.jpg') }}',
                    fullContent: `
                        <p>Ce documentaire exclusif de 45 minutes vous plonge au cœur de l'histoire fascinante du royaume du Dahomey, l'une des puissances les plus redoutables et les plus organisées de l'Afrique précoloniale.</p>
                        
                        <h3>Chapitre 1 : La Fondation</h3>
                        <p>Découvrez comment le prince Gangnihessou a fondé le royaume au XVIIe siècle, unifiant les clans Fon et établissant les bases d'un État centralisé et militaire.</p>
                        
                        <p>À travers des reconstitutions historiques fidèles, voyez comment Abomey est devenue la capitale et comment le système de gouvernement s'est mis en place.</p>
                        
                        <h3>Chapitre 2 : L'Âge d'Or</h3>
                        <p>Explorez l'ère des grands rois : Tegbessou, Kpengla, et surtout Ghézo, qui a transformé le Dahomey en puissance régionale. Découvrez :</p>
                        
                        <ul>
                            <li>L'organisation militaire avec les célèbres Amazones</li>
                            <li>Le système économique basé sur l'agriculture et le commerce</li>
                            <li>Les relations complexes avec les Européens</li>
                        </ul>
                        
                        <h3>Chapitre 3 : Les Amazones</h3>
                        <p>Un focus spécial sur les femmes guerrières, la seule armée entièrement féminine de l'histoire. Le documentaire révèle :</p>
                        
                        <p>Leur entraînement rigoureux, leur code d'honneur, et leur rôle décisif dans les batailles. Des descendants d'Amazones témoignent pour la première fois à l'écran.</p>
                        
                        <h3>Chapitre 4 : L'Héritage Culturel</h3>
                        <p>Comment les traditions du Dahomey survivent-elles aujourd'hui ? Ce chapitre explore :</p>
                        
                        <p>La continuité des rites royaux, l'influence sur l'art contemporain, et la préservation du patrimoine architectural avec les palais classés à l'UNESCO.</p>
                        
                        <blockquote>
                            "Le Dahomey n'a pas disparu. Il vit dans chaque cérémonie vodoun, dans chaque tissu en pagne, dans chaque conte transmis de génération en génération." - Historien local
                        </blockquote>
                        
                        <h3>Bonus Exclusif</h3>
                        <p>Accédez à des archives inédites :</p>
                        <ul>
                            <li>Interview avec le dernier descendant direct de la famille royale</li>
                            <li>Visite guidée des palais royaux avec un conservateur</li>
                            <li>Démonstration de la fabrication des bas-reliefs traditionnels</li>
                        </ul>
                    `
                }
            };
            
            return contentData[contentId] || contentData['1'];
        }

        // MODIFICATION: Afficher le chargement
        function showLoading() {
            const loading = document.getElementById('loading');
            if (loading) {
                loading.classList.add('active');
            }
        }

        // MODIFICATION: Cacher le chargement
        function hideLoading() {
            const loading = document.getElementById('loading');
            if (loading) {
                loading.classList.remove('active');
            }
        }

        // MODIFICATION: Accéder au contenu (pour les contenus gratuits)
        function accessContent(contentId) {
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                
                // Simuler l'accès au contenu
                const contentData = getContentData(contentId);
                alert(`Accès au contenu : "${contentData.title}"\n\nRedirection vers le contenu...`);
                
                // Dans la réalité, rediriger vers la page du contenu
                // window.location.href = `/content/${contentId}`;
            }, 1000);
        }

        // Initialisation complète
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            initCarousel();
            initMobileMenu();
            initCultureTabs();
            initDropdowns();
            initContentFilters();
            initContentActions(); // MODIFICATION: Initialiser les actions de contenu
            initScrollAnimations();
            initSmoothScroll();
            
            // Afficher la section contenu par défaut
            document.getElementById('contenu-section').classList.add('active');
        });

        // ... (le reste du JavaScript reste le même) ...
    </script>
</body>
</html>





<!-- Modale de redirection FedaPay -->
<div class="fedapay-redirect-modal" id="fedapay-redirect-modal">
    <div class="modal-content">
        <div class="modal-body">
            <div class="loader"></div>
            <h4>Initialisation du paiement...</h4>
            <p>Veuillez patienter pendant la connexion à FedaPay</p>
            <div class="fedapay-logo">
                <i class="fas fa-shield-alt"></i>
                <span>Sécurisé par FedaPay</span>
            </div>
            <button class="btn btn-cancel" onclick="document.getElementById('fedapay-redirect-modal').classList.remove('active')">
                Annuler
            </button>
        </div>
    </div>
</div>

<style>
.fedapay-redirect-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.9);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.fedapay-redirect-modal.active {
    display: flex;
}

.fedapay-redirect-modal .modal-content {
    background: #1a1a1a;
    padding: 30px;
    border-radius: 15px;
    text-align: center;
    max-width: 400px;
    width: 90%;
}

.loader {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #008751;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.fedapay-logo {
    margin: 20px 0;
    padding: 10px;
    background: rgba(0,135,81,0.1);
    border-radius: 8px;
    color: #008751;
}

.btn-cancel {
    margin-top: 15px;
    background: transparent;
    border: 1px solid #666;
    color: #999;
}
</style>