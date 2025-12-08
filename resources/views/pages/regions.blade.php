@extends('layouts.app')

@section('title', 'Régions du Bénin - Culture Bénin')

@section('content')
<section class="regions-section">
    <div class="container">
        <div class="section-title">
            <h2>Régions & Villes du Bénin</h2>
            <p>Explorez la diversité géographique et culturelle des différentes régions du Bénin</p>
        </div>
        
        <div class="regions-map-container">
            <div class="region-item">
                <div class="region-icon">
                    <i class="fas fa-city"></i>
                </div>
                <div class="region-info">
                    <div class="region-name">Cotonou</div>
                    <div class="region-desc">Capitale économique, plus grande ville du Bénin avec son célèbre marché Dantokpa</div>
                </div>
            </div>
            
            <div class="region-item">
                <div class="region-icon">
                    <i class="fas fa-landmark"></i>
                </div>
                <div class="region-info">
                    <div class="region-name">Porto-Novo</div>
                    <div class="region-desc">Capitale administrative, riche en patrimoine architectural et musées</div>
                </div>
            </div>
            
            <div class="region-item">
                <div class="region-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="region-info">
                    <div class="region-name">Abomey</div>
                    <div class="region-desc">Ancienne capitale du royaume du Dahomey, classée au patrimoine mondial de l'UNESCO</div>
                </div>
            </div>
            
            <div class="region-item">
                <div class="region-icon">
                    <i class="fas fa-anchor"></i>
                </div>
                <div class="region-info">
                    <div class="region-name">Ouidah</div>
                    <div class="region-desc">Port historique de la traite négrière, capitale mondiale du Vodoun</div>
                </div>
            </div>
            
            <div class="region-item">
                <div class="region-icon">
                    <i class="fas fa-mountain"></i>
                </div>
                <div class="region-info">
                    <div class="region-name">Natitingou</div>
                    <div class="region-desc">Porte d'entrée de la région des montagnes de l'Atakora</div>
                </div>
            </div>
            
            <div class="region-item">
                <div class="region-icon">
                    <i class="fas fa-tree"></i>
                </div>
                <div class="region-info">
                    <div class="region-name">Bohicon</div>
                    <div class="region-desc">Important carrefour commercial au cœur du pays</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .regions-map-container {
        background: var(--white);
        border-radius: 15px;
        padding: 30px;
        box-shadow: var(--shadow);
        margin-top: 50px;
    }

    .region-item {
        display: flex;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid #eee;
        transition: var(--transition);
        cursor: pointer;
    }

    .region-item:last-child {
        border-bottom: none;
    }

    .region-item:hover {
        background: rgba(0, 135, 81, 0.05);
        transform: translateX(10px);
    }

    .region-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        margin-right: 20px;
        flex-shrink: 0;
    }

    .region-info {
        flex: 1;
    }

    .region-name {
        font-size: 20px;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 5px;
    }

    .region-desc {
        color: var(--text-light);
        font-size: 15px;
    }

    @media (max-width: 768px) {
        .region-item {
            flex-direction: column;
            text-align: center;
            padding: 25px 15px;
        }
        
        .region-icon {
            margin-right: 0;
            margin-bottom: 15px;
        }
        
        .region-item:hover {
            transform: translateY(-5px);
        }
    }
</style>
@endsection