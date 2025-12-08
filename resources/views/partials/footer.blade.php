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
                    <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Accueil</a></li>
                    <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> À propos</a></li>
                    <li><a href="{{ route('domaines') }}"><i class="fas fa-chevron-right"></i> Domaines</a></li>
                    <li><a href="{{ route('content') }}"><i class="fas fa-chevron-right"></i> Contenu</a></li>
                    <li><a href="{{ route('gallery') }}"><i class="fas fa-chevron-right"></i> Galerie</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Ressources</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Blog culturel</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Publications</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Médias</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Partenaires</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Événements</a></li>
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
            <p>&copy; {{ date('Y') }} Culture Bénin. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<style>
    footer {
        background: linear-gradient(135deg, var(--dark) 0%, #222 100%);
        color: var(--white);
        padding: 80px 0 30px;
        position: relative;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 40px;
        margin-bottom: 50px;
    }

    .footer-column h3 {
        margin-bottom: 25px;
        font-size: 20px;
        position: relative;
        padding-bottom: 15px;
    }

    .footer-column h3:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background-color: var(--secondary);
    }

    .footer-column ul {
        list-style: none;
    }

    .footer-column ul li {
        margin-bottom: 12px;
    }

    .footer-column ul li a {
        color: #ccc;
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

    .footer-column p {
        color: #ccc;
        margin-bottom: 20px;
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

    .newsletter-form {
        display: flex;
        margin-top: 15px;
    }

    .newsletter-form input {
        flex-grow: 1;
        padding: 12px 15px;
        border: none;
        border-radius: 5px 0 0 5px;
        font-size: 16px;
    }

    .newsletter-form button {
        background: var(--primary);
        color: var(--white);
        border: none;
        padding: 0 20px;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        transition: var(--transition);
    }

    .newsletter-form button:hover {
        background: var(--primary-dark);
    }

    .copyright {
        text-align: center;
        padding-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 14px;
        color: #999;
    }

    @media (max-width: 768px) {
        .footer-content {
            grid-template-columns: 1fr;
            text-align: center;
        }
        
        .footer-column h3:after {
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>