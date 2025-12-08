@extends('layouts.app')

@section('title', 'Domaines Culturels - Culture Bénin')

@section('content')
<section class="domains">
    <div class="container">
        <div class="section-title">
            <h2>Domaines Culturels</h2>
            <p>Explorez les différents aspects de la culture béninoise</p>
        </div>
        
        <div class="domain-item">
            <div class="domain-image">
                <img src="{{ asset('adminlte/img/fond1.jpg') }}" alt="Artisanat Traditionnel">
            </div>
            <div class="domain-text">
                <h3>Artisanat Traditionnel</h3>
                <p>Découvrez l'artisanat béninois avec ses textiles, ses poteries, ses sculptures sur bois et ses bijoux uniques. Chaque région du Bénin possède ses spécialités artisanales, transmises de génération en génération.</p>
                <p>Les tissus en pagne wax, les masques sculptés et les poteries traditionnelles sont des exemples de cet artisanat riche et varié qui raconte l'histoire et les croyances du peuple béninois.</p>
                <a href="#" class="btn">
                    <i class="fas fa-hands"></i>
                    Découvrir l'artisanat
                </a>
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
                <a href="#" class="btn">
                    <i class="fas fa-music"></i>
                    Explorer la musique
                </a>
            </div>
        </div>
        
        <div class="domain-item">
            <div class="domain-image">
                <img src="{{ asset('adminlte/img/agoun.jpg') }}" alt="Gastronomie">
            </div>
            <div class="domain-text">
                <h3>Gastronomie</h3>
                <p>Savourez les délices de la cuisine béninoise, un mélange unique de saveurs et d'épices. Des plats emblématiques comme le "Agoun" avec sa sauce d'arachide, l'Akassa accompagné de sauce gombo, ou le délicieux Ablo.</p>
                <p>La cuisine béninoise ravit les papilles avec ses associations de textures et de saveurs authentiques, reflétant la diversité géographique et culturelle du pays.</p>
                <a href="#" class="btn">
                    <i class="fas fa-utensils"></i>
                    Découvrir la gastronomie
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .domains {
        background: linear-gradient(135deg, var(--light) 0%, var(--white) 100%);
        position: relative;
    }

    .domains:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" fill="%23008751" opacity="0.03"><path d="M20,20 C40,0 60,0 80,20 C100,40 100,60 80,80 C60,100 40,100 20,80 C0,60 0,40 20,20 Z"/></svg>');
        background-size: 200px;
    }

    .domain-item {
        display: flex;
        align-items: center;
        margin-bottom: 100px;
        gap: 60px;
        position: relative;
    }

    .domain-item:nth-child(even) {
        flex-direction: row-reverse;
    }

    .domain-item:last-child {
        margin-bottom: 0;
    }

    .domain-image {
        flex: 1;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: var(--transition);
        position: relative;
    }

    .domain-image:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, var(--primary) 0%, transparent 70%);
        opacity: 0.1;
        z-index: 1;
    }

    .domain-image:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: var(--shadow-hover);
    }

    .domain-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        display: block;
        transition: var(--transition);
    }

    .domain-image:hover img {
        transform: scale(1.1);
    }

    .domain-text {
        flex: 1;
        padding: 20px;
    }

    .domain-text h3 {
        font-size: 32px;
        margin-bottom: 20px;
        color: var(--dark);
        position: relative;
        padding-bottom: 15px;
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

    @media (max-width: 900px) {
        .domain-item {
            flex-direction: column;
        }
        
        .domain-item:nth-child(even) {
            flex-direction: column;
        }
        
        .domain-image img {
            height: 300px;
        }
    }
</style>
@endsection