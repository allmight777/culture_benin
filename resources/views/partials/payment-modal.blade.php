<div id="paymentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Accéder au contenu premium</h3>
        <div class="payment-info">
            <p id="paymentContentTitle">Pour accéder à ce contenu exclusif, veuillez effectuer le paiement.</p>
            <div class="price">Prix : <strong>500 FCFA</strong></div>
        </div>
        <div class="payment-methods">
            <h4>Méthodes de paiement</h4>
            <div class="methods-grid">
                <div class="method-card active" data-method="mobile_money">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Mobile Money</span>
                </div>
                <div class="method-card" data-method="credit_card">
                    <i class="fas fa-credit-card"></i>
                    <span>Carte Bancaire</span>
                </div>
                <div class="method-card" data-method="bank_transfer">
                    <i class="fas fa-university"></i>
                    <span>Virement Bancaire</span>
                </div>
            </div>
        </div>
        <button id="proceedPayment" class="btn">
            <i class="fas fa-lock"></i>
            Payer maintenant
        </button>
        <div class="loading">
            <i class="fas fa-spinner fa-spin"></i> Initialisation du paiement...
        </div>
    </div>
</div>

<style>
    .payment-info {
        background: var(--light);
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
        text-align: center;
    }

    .price {
        font-size: 24px;
        color: var(--primary);
        margin: 15px 0;
    }

    .payment-methods {
        margin: 30px 0;
    }

    .payment-methods h4 {
        margin-bottom: 15px;
        color: var(--dark);
    }

    .methods-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-top: 15px;
    }

    .method-card {
        background: var(--white);
        border: 2px solid var(--light);
        border-radius: 10px;
        padding: 20px 10px;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
    }

    .method-card:hover,
    .method-card.active {
        border-color: var(--primary);
        background: rgba(0, 135, 81, 0.05);
    }

    .method-card i {
        font-size: 24px;
        color: var(--primary);
        margin-bottom: 10px;
    }

    .method-card span {
        display: block;
        font-size: 12px;
        font-weight: 600;
    }

    #proceedPayment {
        width: 100%;
        justify-content: center;
        margin-top: 20px;
    }

    .loading {
        display: none;
        text-align: center;
        margin: 20px 0;
        padding: 20px;
        color: var(--primary);
    }

    @media (max-width: 768px) {
        .methods-grid {
            grid-template-columns: 1fr;
        }
        
        .modal-content {
            padding: 30px 20px;
        }
    }
</style>

<script>
    // Gestion du système de paiement
    function initializePaymentSystem() {
        const modal = document.getElementById('paymentModal');
        const closeBtn = document.querySelector('.close');
        const proceedBtn = document.getElementById('proceedPayment');
        const methodCards = document.querySelectorAll('.method-card');
        const loadingElement = document.querySelector('.loading');
        const paymentContentTitle = document.getElementById('paymentContentTitle');
        
        if (!modal || !closeBtn || !proceedBtn) return;
        
        let selectedMethod = 'mobile_money';
        let currentContent = null;

        // Gestion des clics sur les boutons de contenu PREMIUM
        document.querySelectorAll('.access-content-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                const card = this.closest('.content-card');
                const contentId = this.getAttribute('data-content-id');
                const contentTitle = card.querySelector('h3').textContent;
                
                currentContent = {
                    id: contentId,
                    title: contentTitle,
                    isPremium: true
                };
                
                // Mettre à jour le texte du modal
                paymentContentTitle.textContent = `Pour accéder à "${contentTitle}", veuillez effectuer le paiement.`;
                openPaymentModal();
            });
        });

        function openPaymentModal() {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            resetPaymentUI();
        }

        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            currentContent = null;
            resetPaymentUI();
        }

        function resetPaymentUI() {
            if (loadingElement) loadingElement.style.display = 'none';
            if (proceedBtn) proceedBtn.style.display = 'flex';
            if (methodCards.length > 0) {
                methodCards[0].classList.add('active');
                selectedMethod = 'mobile_money';
                methodCards.forEach((card, index) => {
                    if (index !== 0) card.classList.remove('active');
                });
            }
        }

        methodCards.forEach(card => {
            card.addEventListener('click', function() {
                methodCards.forEach(m => m.classList.remove('active'));
                this.classList.add('active');
                selectedMethod = this.dataset.method;
            });
        });

        closeBtn.addEventListener('click', closeModal);
        window.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        proceedBtn.addEventListener('click', async function() {
            if (!currentContent) return;

            if (loadingElement) loadingElement.style.display = 'block';
            this.style.display = 'none';

            try {
                // Simulation de paiement
                setTimeout(() => {
                    alert('Paiement réussi ! Accès au contenu premium accordé.');
                    closeModal();
                    
                    // Ici, vous pourriez rediriger vers le contenu ou l'afficher
                    // showContentDetail(currentContent.id);
                }, 2000);

            } catch (error) {
                if (loadingElement) {
                    loadingElement.innerHTML = `<i class="fas fa-exclamation-triangle"></i> Erreur: ${error.message}`;
                    setTimeout(() => {
                        loadingElement.style.display = 'none';
                        proceedBtn.style.display = 'flex';
                        loadingElement.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Initialisation du paiement...';
                    }, 3000);
                }
            }
        });
    }
</script>