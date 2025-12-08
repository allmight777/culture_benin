<header>
    <div class="container">
        <div class="header-content">
            <a href="{{ route('home') }}" class="logo">
                <i class="fas fa-monument"></i>
                Culture<span>Bénin</span>
            </a>
            <nav>
                <ul>
                    <li><a href="{{ route('about') }}">À propos</a></li>
                    <li><a href="{{ route('domaines') }}">Domaines</a></li>
                    
                    <!-- Menu déroulant Culture -->
                    <li class="nav-dropdown">
                        <div class="nav-select-wrapper relative">
                            <select id="nav-content-select" 
                                    class="nav-select appearance-none bg-white border border-gray-300 text-gray-700 font-semibold py-2 pl-4 pr-10 rounded-full cursor-pointer transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#008751] focus:border-transparent hover:border-[#008751] hover:shadow-md w-48 shadow-sm">
                                <option value="">Culture</option>
                                <option value="langue">Langues</option>
                                <option value="region">Régions</option>
                                <option value="contenus">Contenus</option>
                                <option value="all">Tout afficher</option>
                            </select>
                            
                            <!-- Icône flèche personnalisée -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-[#008751]">
                                <svg class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </li>
                    
                    <li><a href="{{ route('gallery') }}">Galerie</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    
                    @auth
                        <li><a href="{{ route('dashboard') }}" class="login-btn">Tableau de bord</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="signup-btn">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('register') }}" class="signup-btn">Inscription</a></li>
                        <li><a href="{{ route('login') }}" class="login-btn">Connexion</a></li>
                    @endauth
                </ul>
            </nav>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>
</header>

<style>
    /* Styles du header */
    header {
        background-color: var(--white);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 0;
        z-index: 1000;
        transition: var(--transition);
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
        color: var(--primary);
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        transition: var(--transition);
    }

    .logo:hover {
        transform: scale(1.05);
    }

    .logo span {
        color: var(--secondary);
    }

    .logo i {
        font-size: 24px;
    }

    nav ul {
        display: flex;
        list-style: none;
        align-items: center;
        gap: 15px;
    }

    nav ul li {
        position: relative;
    }

    nav ul li a {
        text-decoration: none;
        color: var(--dark);
        font-weight: 600;
        transition: var(--transition);
        padding: 8px 0;
        position: relative;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    nav ul li a:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: var(--primary);
        transition: var(--transition);
    }

    nav ul li a:hover {
        color: var(--primary);
    }

    nav ul li a:hover:after {
        width: 100%;
    }

    .signup-btn {
        background-color: transparent;
        color: var(--dark);
        padding: 10px 25px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
        border: 2px solid var(--secondary);
    }

    .signup-btn:hover {
        background-color: transparent;
        color: var(--dark);
        border-color: var(--secondary);
    }

    .login-btn {
        background-color: var(--primary);
        color: var(--white);
        padding: 10px 25px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
        border: 2px solid var(--primary);
    }

    .login-btn:hover {
        background-color: transparent;
        color: var(--primary);
    }

    .mobile-menu {
        display: none;
        font-size: 24px;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }
        
        nav ul {
            margin-top: 20px;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .mobile-menu {
            display: block;
        }
    }
</style>