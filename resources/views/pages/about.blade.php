@extends('layouts.app')

@section('title', 'Culture Bénin - A propos')

@section('content')
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
                <img src="{{ asset('adminlte/img/art.jpg') }}" alt="Culture béninoise">
            </div>
        </div>
    </div>
</section>

<style>
    .about-content {
        display: flex;
        align-items: center;
        gap: 60px;
    }

    .about-text {
        flex: 1;
    }

    .about-text p {
        margin-bottom: 25px;
        font-size: 18px;
        color: var(--text);
    }

    .about-stats {
        display: flex;
        gap: 30px;
        margin-top: 40px;
    }

    .stat {
        text-align: center;
    }

    .stat-number {
        font-size: 42px;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
    }

    .stat-label {
        font-size: 16px;
        color: var(--text-light);
        margin-top: 5px;
    }

    .about-image {
        flex: 1;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: var(--transition);
        position: relative;
    }

    .about-image:hover {
        transform: translateY(-10px) rotate(2deg);
        box-shadow: var(--shadow-hover);
    }

    .about-image img {
        width: 100%;
        height: auto;
        display: block;
        transition: var(--transition);
    }

    .about-image:hover img {
        transform: scale(1.05);
    }

    @media (max-width: 900px) {
        .about-content {
            flex-direction: column;
        }
        
        .about-stats {
            flex-direction: column;
            gap: 20px;
        }
    }
</style>
@endsection