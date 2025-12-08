@extends('layouts.app')

@section('title', 'Contenus Culturels - Culture Bénin')

@section('content')
<section class="content-section">
    <div class="container">
        <div class="section-title">
            <h2>Contenus Culturels</h2>
            <p>Explorez notre riche collection d'articles, vidéos, podcasts et interviews sur la culture béninoise</p>
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
        
        <div class="content-grid">
            <!-- Articles - 2 premium, 1 gratuit -->
            <div class="content-card content-category-filter premium-content" data-category="article">
                <div class="premium-badge">
                    <i class="fas fa-crown"></i> PREMIUM
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/vodunday.jpg') }}" alt="Festival Ouidah">
                </div>
                <div class="content-details">
                    <div class="content-category">Article • Festival</div>
                    <h3>Festival International Ouidah 2024</h3>
                    <p>Célébration annuelle de la culture vodoun avec des cérémonies, danses et rituels traditionnels. Des milliers de participants venus du monde entier se réunissent pour honorer les traditions ancestrales.</p>
                    <div class="content-cta">
                        <a href="#" class="btn access-content-btn" data-content-id="festival-ouidah">
                            <i class="fas fa-lock"></i>
                            Accéder à l'article - 500 FCFA
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content-card content-category-filter" data-category="article">
                <div class="free-badge">
                    <i class="fas fa-unlock"></i> GRATUIT
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/gaani.jpg') }}" alt="Fête du Gani">
                </div>
                <div class="content-details">
                    <div class="content-category">Article • Cérémonie</div>
                    <h3>Fête du Gaani à Nikki</h3>
                    <p>Cérémonie traditionnelle des Bariba avec défilés, danses masquées et célébrations royales. Un événement unique qui met en valeur la riche culture du Nord Bénin.</p>
                    <div class="content-cta">
                        <a href="#" class="btn view-content-btn" data-content-id="gaani-nikki">
                            <i class="fas fa-book-open"></i>
                            Lire l'article gratuit
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content-card content-category-filter premium-content" data-category="article">
                <div class="premium-badge">
                    <i class="fas fa-crown"></i> PREMIUM
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/abomey.jpg') }}" alt="Semaine culturelle">
                </div>
                <div class="content-details">
                    <div class="content-category">Article • Événement</div>
                    <h3>Semaine Culturelle d'Abomey</h3>
                    <p>Hommage à l'histoire du royaume du Dahomey avec reconstitutions historiques et expositions. Découvrez l'héritage des rois d'Abomey à travers des spectacles grandioses.</p>
                    <div class="content-cta">
                        <a href="#" class="btn access-content-btn" data-content-id="semaine-abomey">
                            <i class="fas fa-lock"></i>
                            Accéder à l'article - 500 FCFA
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Vidéos - 2 premium, 1 gratuit -->
            <div class="content-card content-category-filter premium-content" data-category="video">
                <div class="premium-badge">
                    <i class="fas fa-crown"></i> PREMIUM
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/roi.jpg') }}" alt="Documentaire culturel">
                </div>
                <div class="content-details">
                    <div class="content-category">Vidéo • Documentaire</div>
                    <h3>Les Rois du Dahomey : Histoire et Héritage</h3>
                    <p>Documentaire exclusif sur l'histoire des rois du Dahomey et leur influence sur la culture béninoise contemporaine. Un voyage à travers le temps et les traditions.</p>
                    <div class="content-cta">
                        <a href="#" class="btn access-content-btn" data-content-id="rois-dahomey">
                            <i class="fas fa-lock"></i>
                            Regarder la vidéo - 500 FCFA
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content-card content-category-filter" data-category="video">
                <div class="free-badge">
                    <i class="fas fa-unlock"></i> GRATUIT
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/ballet.jpg') }}" alt="Spectacle de danse">
                </div>
                <div class="content-details">
                    <div class="content-category">Vidéo • Spectacle</div>
                    <h3>Ballet National du Bénin : Rythmes Sacrés</h3>
                    <p>Captation du spectacle "Rythmes Sacrés" mettant en scène les danses traditionnelles des différentes ethnies du Bénin. Une explosion de couleurs et d'énergie.</p>
                    <div class="content-cta">
                        <a href="#" class="btn view-content-btn" data-content-id="ballet-benin">
                            <i class="fas fa-play-circle"></i>
                            Regarder gratuitement
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content-card content-category-filter premium-content" data-category="video">
                <div class="premium-badge">
                    <i class="fas fa-crown"></i> PREMIUM
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/pagne.jpg') }}" alt="Atelier d'artisanat">
                </div>
                <div class="content-details">
                    <div class="content-category">Vidéo • Tutoriel</div>
                    <h3>L'Art du Pagne Wax : Technique et Symbolisme</h3>
                    <p>Découvrez les secrets de fabrication du pagne wax, ses motifs traditionnels et leur signification culturelle. Une immersion dans l'univers textile béninois.</p>
                    <div class="content-cta">
                        <a href="#" class="btn access-content-btn" data-content-id="pagne-wax">
                            <i class="fas fa-lock"></i>
                            Regarder la vidéo - 500 FCFA
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Podcasts - 2 premium, 1 gratuit -->
            <div class="content-card content-category-filter" data-category="podcast">
                <div class="free-badge">
                    <i class="fas fa-unlock"></i> GRATUIT
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/femme.jpg') }}" alt="Podcast traditions">
                </div>
                <div class="content-details">
                    <div class="content-category">Podcast • Traditions</div>
                    <h3>Vodoun : Mythes et Réalités</h3>
                    <p>Une série de podcasts explorant les origines, les pratiques et les malentendus autour du Vodoun, religion traditionnelle du Bénin. Avec des experts et praticiens.</p>
                    <div class="content-cta">
                        <a href="#" class="btn view-content-btn" data-content-id="vodoun-podcast">
                            <i class="fas fa-headphones"></i>
                            Écouter gratuitement
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content-card content-category-filter premium-content" data-category="podcast">
                <div class="premium-badge">
                    <i class="fas fa-crown"></i> PREMIUM
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/tambour.jpg') }}" alt="Podcast musique">
                </div>
                <div class="content-details">
                    <div class="content-category">Podcast • Musique</div>
                    <h3>Les Tambours Parlants du Bénin</h3>
                    <p>Décryptage des rythmes et messages transmis par les tambours traditionnels béninois. Un voyage sonore au cœur de la communication ancestrale.</p>
                    <div class="content-cta">
                        <a href="#" class="btn access-content-btn" data-content-id="tambours-parlants">
                            <i class="fas fa-lock"></i>
                            Écouter le podcast - 500 FCFA
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content-card content-category-filter premium-content" data-category="podcast">
                <div class="premium-badge">
                    <i class="fas fa-crown"></i> PREMIUM
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/esclave.jpg') }}" alt="Podcast histoire">
                </div>
                <div class="content-details">
                    <div class="content-category">Podcast • Histoire</div>
                    <h3>La Route des Esclaves : Mémoire et Réconciliation</h3>
                    <p>Récit audio de l'histoire de la traite négrière à Ouidah et des efforts de préservation de la mémoire. Témoignages et analyses historiques.</p>
                    <div class="content-cta">
                        <a href="#" class="btn access-content-btn" data-content-id="route-esclaves">
                            <i class="fas fa-lock"></i>
                            Écouter le podcast - 500 FCFA
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Interviews - 2 premium, 1 gratuit -->
            <div class="content-card content-category-filter premium-content" data-category="interview">
                <div class="premium-badge">
                    <i class="fas fa-crown"></i> PREMIUM
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/masque.jpg') }}" alt="Interview artiste">
                </div>
                <div class="content-details">
                    <div class="content-category">Interview • Artiste</div>
                    <h3>Rencontre avec un Maître Sculpteur de Porto-Novo</h3>
                    <p>Interview exclusive d'un artiste renommé qui perpétue l'art de la sculpture sur bois selon les techniques ancestrales. Parcours, inspirations et défis.</p>
                    <div class="content-cta">
                        <a href="#" class="btn access-content-btn" data-content-id="sculpteur-portonovo">
                            <i class="fas fa-lock"></i>
                            Lire l'interview - 500 FCFA
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content-card content-category-filter" data-category="interview">
                <div class="free-badge">
                    <i class="fas fa-unlock"></i> GRATUIT
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/chef.jpg') }}" alt="Interview chef traditionnel">
                </div>
                <div class="content-details">
                    <div class="content-category">Interview • Tradition</div>
                    <h3>Un Chef Traditionnel Raconte : Coutumes et Évolution</h3>
                    <p>Dialogue avec un chef coutumier sur le rôle des traditions dans la société béninoise moderne et les défis de la transmission culturelle.</p>
                    <div class="content-cta">
                        <a href="#" class="btn view-content-btn" data-content-id="chef-traditionnel">
                            <i class="fas fa-microphone-alt"></i>
                            Lire l'interview gratuite
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content-card content-category-filter premium-content" data-category="interview">
                <div class="premium-badge">
                    <i class="fas fa-crown"></i> PREMIUM
                </div>
                <div class="content-image">
                    <img src="{{ asset('adminlte/img/cuisine.jpg') }}" alt="Interview cuisinière">
                </div>
                <div class="content-details">
                    <div class="content-category">Interview • Gastronomie</div>
                    <h3>Les Secrets de la Cuisine Béninoise avec la cheffe Georgiana VIOU</h3>
                    <p>Rencontre avec une cuisinière traditionnelle qui partage ses recettes ancestrales et les histoires derrière les plats emblématiques du Bénin.</p>
                    <div class="content-cta">
                        <a href="#" class="btn access-content-btn" data-content-id="cuisine-benin">
                            <i class="fas fa-lock"></i>
                            Lire l'interview - 500 FCFA
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section détail du contenu (inclus à l'intérieur du même container/section) -->
        @include('partials.content-detail')

    </div> <!-- .container -->
</section>
@endsection

@section('styles')
<style>
    :root{
        --white: #ffffff;
        --light: #f7fafc;
        --primary: #087d4f;
        --primary-dark: #065f3e;
        --secondary: #fcd116;
        --dark: #1f2937;
        --text-light: #6b7280;
        --shadow: 0 6px 18px rgba(12, 18, 35, 0.06);
        --shadow-hover: 0 18px 60px rgba(12, 18, 35, 0.12);
        --transition: all .35s cubic-bezier(.25,.8,.25,1);
    }

    .content-section {
        padding: 60px 0;
        background-color: #fff;
    }

    .section-title h2 {
        font-size: 32px;
        margin-bottom: 6px;
        color: var(--dark);
    }

    .section-title p {
        color: var(--text-light);
        margin-bottom: 30px;
    }

    .content-tabs {
        display: flex;
        justify-content: center;
        margin-bottom: 50px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .content-tab {
        padding: 14px 28px;
        background-color: var(--light);
        border: none;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .content-tab.active {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
    }

    .content-tab:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

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

    /* Styles pour le contenu premium */
    .premium-content {
        position: relative;
        border: 2px solid transparent;
        background: linear-gradient(135deg, var(--white), var(--white)) padding-box,
                    linear-gradient(135deg, var(--secondary), var(--primary)) border-box;
    }

    .premium-content:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 20px 50px rgba(252, 209, 22, 0.2);
    }

    .premium-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, var(--secondary), #e6b400);
        color: var(--dark);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        z-index: 2;
        box-shadow: 0 4px 12px rgba(252, 209, 22, 0.3);
    }

    /* Styles pour le contenu gratuit */
    .free-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        z-index: 2;
        box-shadow: 0 4px 12px rgba(0, 135, 81, 0.3);
    }

@media (max-width: 768px) {
    .content-tabs {
        flex-direction: column;
        align-items: center;
    }
    
    .content-tab {
        width: 200px;
        justify-content: center;
    }
}
</style>
@endsection

@section('scripts')
<script>
    // Données des contenus détaillés
    const contentData = {
        'gaani-nikki': {
            title: 'Fête du Gaani à Nikki',
            category: 'Article • Cérémonie',
            image: "{{ asset('adminlte/img/gaani.jpg') }}",
            meta: 'Temps de lecture : 5 min • Gratuit',
            body: `
                <h2>La célébration ancestrale des Bariba</h2>
                <p>La fête du Gaani, célébrée annuellement dans la ville de Nikki, représente l'un des événements culturels les plus importants du Nord-Bénin. Cette cérémonie traditionnelle des Bariba plonge ses racines dans l'histoire du royaume de Nikki, l'un des plus anciens royaumes du Bénin.</p>
                
                <h3>Origines et signification</h3>
                <p>Le Gaani trouve ses origines dans les traditions séculaires du peuple Bariba. Célébrée chaque année, cette fête marque le renouveau et la perpétuation des valeurs culturelles ancestrales.</p>
                
                <h3>Déroulement des festivités</h3>
                <p>Pendant trois jours, la ville de Nikki s'anime au rythme des cérémonies traditionnelles :</p>
                <ul>
                    <li><strong>Défilés royaux</strong> avec le roi (Saa) et sa cour en tenues d'apparat</li>
                    <li><strong>Danses masquées</strong> des guerriers Bariba exécutant des chorégraphies ancestrales</li>
                    <li><strong>Cérémonies de bénédiction</strong> et sacrifices traditionnels pour la prospérité</li>
                    <li><strong>Exhibitions équestres</strong> et démonstrations d'arts martiaux traditionnels</li>
                    <li><strong>Rituels sacrés</strong> au palais royal avec les notables du royaume</li>
                </ul>
                
                <h3>Symbolisme et importance culturelle</h3>
                <p>Le Gaani n'est pas seulement une célébration, c'est également :</p>
                <ul>
                    <li>Une démonstration de l'unité du peuple Bariba</li>
                    <li>Une transmission des valeurs ancestrales aux jeunes générations</li>
                    <li>Une affirmation de l'identité culturelle face à la modernité</li>
                    <li>Un moment de cohésion sociale et de renforcement des liens communautaires</li>
                </ul>
            `
        },

        'ballet-benin': {
            title: 'Ballet National du Bénin : Rythmes Sacrés',
            category: 'Vidéo • Spectacle',
            image: "{{ asset('adminlte/img/ballet.jpg') }}",
            meta: 'Durée : 15:30 • Gratuit',
            body: `
                <div class="video-player">
                    <iframe width="722" height="406" src="https://www.youtube.com/embed/Rvcg1sXOD8Q" title="BALLET NATIONAL DU BENIN MAQUETTE SPECTACLE &quot;DOHOUE&quot; 2022" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <video controls poster="{{ asset('adminlte/img/ballet-poster.jpg') }}" style="display:block; margin-top:12px; max-width:100%;">
                        <source src="{{ asset('videos/ballet-benin.mp4') }}" type="video/mp4">
                        <source src="{{ asset('videos/ballet-benin.webm') }}" type="video/webm">
                        Votre navigateur ne supporte pas la lecture vidéo.
                    </video>
                </div>
                
                <h2>Spectacle "Rythmes Sacrés"</h2>
                <p>Le Ballet National du Bénin présente "Rythmes Sacrés", une captivation spectacle mettant en scène les danses traditionnelles des différentes ethnies du Bénin. Une explosion de couleurs, de rythmes et d'énergie qui raconte l'histoire culturelle de notre pays.</p>
            `
        },

        'vodoun-podcast': {
            title: 'Vodoun : Mythes et Réalités',
            category: 'Podcast • Traditions',
            image: "{{ asset('adminlte/img/femme.jpg') }}",
            meta: 'Durée : 28:15 • Gratuit',
            body: `
                <div class="audio-player">
                    <div style="background: #f5f5f5; padding: 50px; text-align: center; border-radius: 10px;">
                        <i class="fas fa-headphones" style="font-size: 48px; margin-bottom: 20px; color: var(--primary);"></i>
                        <h3>Podcast : Vodoun - Mythes et Réalités</h3>
                        <p>Écoutez cet épisode gratuitement</p>
                        <audio controls style="width: 100%; margin-top: 20px;">
                            <source src="{{ asset('adminlte/img/voodoo.mp3') }}" type="audio/mpeg">
                            Votre navigateur ne supporte pas l'élément audio.
                        </audio>
                    </div>
                </div>

                <h2>Une exploration approfondie du Vodoun</h2>
                <p>Cette série de podcasts explore les origines, les pratiques et les malentendus autour du Vodoun, religion traditionnelle du Bénin. Avec des experts et praticiens.</p>
            `
        },

        'chef-traditionnel': {
            title: 'Un Chef Traditionnel Raconte : Coutumes et Évolution',
            category: 'Interview • Tradition',
            image: "{{ asset('adminlte/img/chef.jpg') }}",
            meta: 'Temps de lecture : 8 min • Gratuit',
            body: `
                <h2>Dialogue avec la sagesse ancestrale</h2>
                <p>Rencontre exclusive avec le Chef Adéwalé, chef coutumier respecté, qui partage sa vision sur le rôle des traditions dans la société béninoise moderne et les défis de la transmission culturelle.</p>
            `
        }
    };

    // Initialisation des onglets de contenu et des boutons
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.content-tab');
        const contentCards = document.querySelectorAll('.content-category-filter');
        const detailInclude = document.querySelector('#content-detail') || null;

        // Afficher tous les éléments au chargement
        contentCards.forEach(card => {
            card.style.display = 'flex';
        });

        // Gestion des tabs
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                contentCards.forEach(card => {
                    if (filter === 'all') {
                        card.style.display = 'flex';
                    } else {
                        if (card.getAttribute('data-category') === filter) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        });

        // Gestion des actions "view-content-btn" et "access-content-btn"
        document.querySelectorAll('.view-content-btn, .access-content-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.dataset.contentId;
                if (!id) return;

                const data = contentData[id];
                if (!data) return;

                // Si tu utilises une partial #content-detail, remplis-la ; sinon ouvre un modal/simple overlay
                const detail = document.querySelector('#content-detail');
                if (detail) {
                    detail.querySelector('.detail-title').innerHTML = data.title;
                    detail.querySelector('.detail-category').innerHTML = data.category;
                    detail.querySelector('.detail-meta').innerHTML = data.meta;
                    detail.querySelector('.detail-body').innerHTML = data.body;
                    // Afficher le détail (classe .open ou style)
                    detail.classList.add('open');
                    // Scroll vers le détail
                    detail.scrollIntoView({ behavior: 'smooth' });
                } else {
                    // fallback: simple alert (développement)
                    alert(data.title + "\\n\\n" + (data.meta || ''));
                }
            });
        });

        // Si ta partial contient un bouton de fermeture
        const detail = document.querySelector('#content-detail');
        if (detail) {
            const closeBtn = detail.querySelector('.detail-close');
            if (closeBtn) {
                closeBtn.addEventListener('click', function(){
                    detail.classList.remove('open');
                });
            }
        }
    });
</script>
@endsection
