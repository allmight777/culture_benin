@extends('layouts.app')

@section('title', 'Langues du Bénin - Culture Bénin')

@section('content')
<section class="languages-section">
    <div class="container">
        <div class="section-title">
            <h2>Langues du Bénin</h2>
            <p>Découvrez la diversité linguistique du Bénin, véritable reflet de sa richesse culturelle</p>
        </div>
        
        <div class="languages-grid">
            <div class="language-card">
                <div class="language-header">
                    <div class="language-icon">
                        <i class="fas fa-language"></i>
                    </div>
                    <div class="language-name">Fon</div>
                </div>
                <div class="language-stats">
                    <div class="language-stat">
                        <div class="stat-number">45%</div>
                        <div class="stat-label">Population</div>
                    </div>
                    <div class="language-stat">
                        <div class="stat-number">Sud</div>
                        <div class="stat-label">Région</div>
                    </div>
                </div>
                <div class="language-details">
                    <p>Le fon est la langue la plus parlée au Bénin, utilisée principalement dans les régions du sud. C'est la langue maternelle du peuple Fon et elle joue un rôle important dans la vie culturelle et religieuse, notamment dans la pratique du Vodoun.</p>
                </div>
            </div>
            
            <div class="language-card">
                <div class="language-header">
                    <div class="language-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="language-name">Yoruba</div>
                </div>
                <div class="language-stats">
                    <div class="language-stat">
                        <div class="stat-number">12%</div>
                        <div class="stat-label">Population</div>
                    </div>
                    <div class="language-stat">
                        <div class="stat-number">Sud-Est</div>
                        <div class="stat-label">Région</div>
                    </div>
                </div>
                <div class="language-details">
                    <p>Le yoruba est parlé par les populations du sud-est du Bénin, particulièrement dans la région de Porto-Novo. Cette langue est riche en proverbes et en expressions culturelles qui reflètent la philosophie et les traditions du peuple Yoruba.</p>
                </div>
            </div>
            
            <div class="language-card">
                <div class="language-header">
                    <div class="language-icon">
                        <i class="fas fa-volume-up"></i>
                    </div>
                    <div class="language-name">Bariba</div>
                </div>
                <div class="language-stats">
                    <div class="language-stat">
                        <div class="stat-number">10%</div>
                        <div class="stat-label">Population</div>
                    </div>
                    <div class="language-stat">
                        <div class="stat-number">Nord</div>
                        <div class="stat-label">Région</div>
                    </div>
                </div>
                <div class="language-details">
                    <p>Le bariba est la langue principale des populations du nord du Bénin, notamment dans les départements du Borgou et de l'Alibori. Elle est étroitement liée à l'histoire du royaume de Nikki et aux traditions des cavaliers Bariba.</p>
                </div>
            </div>
            
            <div class="language-card">
                <div class="language-header">
                    <div class="language-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="language-name">Dendi</div>
                </div>
                <div class="language-stats">
                    <div class="language-stat">
                        <div class="stat-number">5%</div>
                        <div class="stat-label">Population</div>
                    </div>
                    <div class="language-stat">
                        <div class="stat-number">Nord-Est</div>
                        <div class="stat-label">Région</div>
                    </div>
                </div>
                <div class="language-details">
                    <p>Le dendi est parlé dans la région du nord-est, notamment autour de la ville de Malanville. Cette langue fait partie du continuum linguistique Songhai et témoigne des liens historiques avec l'empire Songhai.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .languages-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }

    .language-card {
        background: var(--white);
        border-radius: 15px;
        padding: 30px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        border: 1px solid #eaeaea;
    }

    .language-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hover);
    }

    .language-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        gap: 15px;
    }

    .language-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #4ade80, #22c55e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
    }

    .language-name {
        font-size: 24px;
        font-weight: 700;
        color: var(--dark);
    }

    .language-stats {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .language-stat {
        text-align: center;
        flex: 1;
    }

    .stat-number {
        font-size: 28px;
        font-weight: 800;
        color: var(--primary);
        line-height: 1;
    }

    .stat-label {
        font-size: 14px;
        color: var(--text-light);
        margin-top: 5px;
    }

    .language-details {
        color: var(--text);
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .languages-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection