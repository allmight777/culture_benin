@extends('layouts.app')

@section('title', 'Culture Bénin - Accueil')

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="accueil">
        <div class="container">
            <div class="hero-content floating">
                <h1>Découvrez la richesse culturelle du Bénin</h1>
                <p>Plongez au cœur des traditions, de l'art et de l'histoire d'une culture millénaire qui continue d'inspirer le monde.</p>
                <div class="hero-btns">
                    <a href="#apropos" class="btn">
                        <i class="fas fa-compass"></i>
                        Explorer la culture
                    </a>
                    <a href="#galerie" class="btn btn-secondary">
                        <i class="fas fa-images"></i>
                        Voir la galerie
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sections principales -->
    @include('pages.about')
    @include('pages.domaines')
    @include('pages.gallery')
    @include('pages.contact')
@endsection

@section('styles')
<style>
    .hero {
        position: relative;
        background-image: url("{{ asset('adminlte/img/fond.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 180px 0;
        color: var(--white);
        text-align: center;
        overflow: hidden;
    }

    .hero:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, var(--primary) 10%, transparent 30%, transparent 70%, var(--secondary) 90%);
        opacity: 0.2;
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero h1 {
        font-size: 60px;
        margin-bottom: 25px;
        color: var(--white);
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        line-height: 1.2;
    }

    .hero p {
        font-size: 22px;
        margin-bottom: 40px;
        color: var(--white);
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
    }

    .hero-btns {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .floating {
        animation: float 5s ease-in-out infinite;
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 36px;
        }
        
        .hero p {
            font-size: 18px;
        }
        
        .hero {
            padding: 100px 0;
        }
    }
</style>
@endsection