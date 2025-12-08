@extends('layouts.app')

@section('title', 'Galerie Culturelle - Culture Bénin')

@section('content')
<section class="gallery-section">
    <div class="container">
        <div class="section-title">
            <h2>Galerie Culturelle</h2>
            <p>Découvrez la beauté du Bénin à travers nos photos</p>
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
            <div class="gallery-item">
                <img src="{{ asset('adminlte/img/afro.jpg') }}" alt="Festival">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('adminlte/img/sofitel.jpg') }}" alt="Traditions">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('adminlte/img/zey.jpg') }}" alt="Architecture">
            </div>
            <div class="gallery-item">
                <img src="{{ asset('adminlte/img/mur.jpg') }}" alt="Paysage">
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .gallery-section {
        background: linear-gradient(135deg, var(--light) 0%, var(--white) 100%);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-template-rows: repeat(8, 150px);
        gap: 20px;
    }

    .gallery-item {
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }

    .gallery-item:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-hover);
        z-index: 10;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    .gallery-item:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 40%, rgba(0,0,0,0.7));
        opacity: 0;
        transition: var(--transition);
    }

    .gallery-item:hover:after {
        opacity: 1;
    }

    .gallery-item:nth-child(1) {
        grid-column: 1 / 5;
        grid-row: 1 / 4;
    }

    .gallery-item:nth-child(2) {
        grid-column: 5 / 9;
        grid-row: 1 / 3;
    }

    .gallery-item:nth-child(3) {
        grid-column: 9 / 13;
        grid-row: 1 / 4;
    }

    .gallery-item:nth-child(4) {
        grid-column: 1 / 5;
        grid-row: 4 / 7;
    }

    .gallery-item:nth-child(5) {
        grid-column: 5 / 9;
        grid-row: 3 / 6;
    }

    .gallery-item:nth-child(6) {
        grid-column: 9 / 13;
        grid-row: 4 / 7;
    }

    .gallery-item:nth-child(7) {
        grid-column: 1 / 5;
        grid-row: 7 / 9;
    }

    .gallery-item:nth-child(8) {
        grid-column: 5 / 13;
        grid-row: 6 / 9;
    }

    @media (max-width: 1100px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: auto;
        }
        
        .gallery-item {
            grid-column: auto !important;
            grid-row: auto !important;
            height: 250px;
        }
    }

    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }
        
        .gallery-item {
            height: 200px;
        }
    }
</style>
@endsection