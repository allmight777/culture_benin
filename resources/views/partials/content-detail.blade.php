<section class="content-detail-view" id="contentDetail">
    <div class="detail-container">
        <a href="#" class="back-btn" id="backToList">
            <i class="fas fa-arrow-left"></i>
            Retour à la liste des contenus
        </a>
        
        <div class="detail-content">
            <div class="detail-image">
                <img id="detailImage" src="" alt="">
            </div>
            <div class="detail-text">
                <div class="detail-header">
                    <div class="detail-category" id="detailCategory"></div>
                    <h1 class="detail-title" id="detailTitle"></h1>
                    <div class="detail-meta" id="detailMeta"></div>
                </div>
                <div class="detail-body" id="detailBody"></div>
            </div>
        </div>
    </div>
</section>

<style>
    .content-detail-view {
        display: none;
        background-color: var(--white);
    }

    .detail-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--light);
        color: var(--text);
        padding: 12px 24px;
        border-radius: 50px;
        text-decoration: none;
        margin-bottom: 30px;
        transition: var(--transition);
    }

    .back-btn:hover {
        background: var(--primary);
        color: var(--white);
    }

    .detail-content {
        display: flex;
        gap: 60px;
        align-items: flex-start;
    }

    .detail-image {
        flex: 1;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow);
        position: sticky;
        top: 100px;
    }

    .detail-image img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        display: block;
    }

    .detail-text {
        flex: 1.5;
        min-width: 0;
    }

    .detail-header {
        margin-bottom: 40px;
    }

    .detail-category {
        color: var(--primary);
        font-weight: bold;
        margin-bottom: 12px;
        display: inline-block;
        background-color: rgba(0, 135, 81, 0.1);
        padding: 6px 15px;
        border-radius: 50px;
        font-size: 14px;
    }

    .detail-title {
        font-size: 36px;
        color: var(--dark);
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .detail-meta {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
        color: var(--text-light);
        font-size: 14px;
    }

    .detail-body {
        font-size: 18px;
        line-height: 1.8;
        color: var(--text);
    }

    .detail-body h2 {
        color: var(--primary);
        margin: 40px 0 20px 0;
        font-size: 28px;
        border-bottom: 2px solid var(--secondary);
        padding-bottom: 8px;
    }

    .detail-body h3 {
        color: var(--dark);
        margin: 30px 0 15px 0;
        font-size: 22px;
    }

    .detail-body p {
        margin-bottom: 24px;
    }

    .detail-body ul, .detail-body ol {
        margin: 25px 0;
        padding-left: 30px;
    }

    .detail-body li {
        margin-bottom: 12px;
        line-height: 1.6;
    }

    @media (max-width: 1100px) {
        .detail-content {
            flex-direction: column;
        }

        .detail-image img {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .detail-title {
            font-size: 28px;
        }

        .detail-meta {
            flex-direction: column;
            gap: 10px;
        }
        
        .detail-container {
            padding: 20px 15px;
        }
        
        .detail-body {
            font-size: 16px;
        }
        
        .detail-body h2 {
            font-size: 24px;
        }
        
        .detail-body h3 {
            font-size: 20px;
        }
    }
</style>