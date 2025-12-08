@extends('layouts.app')

@section('title', 'Contact - Culture Bénin')

@section('content')
<section class="contact-section">
    <div class="container">
        <div class="section-title">
            <h2>Contactez-nous</h2>
            <p>Nous serions ravis d'échanger avec vous sur la culture béninoise</p>
        </div>
        
        <div class="contact-content">
            <div class="contact-info">
                <h3>Informations de contact</h3>
                <p>Pour toute question, suggestion ou collaboration, n'hésitez pas à nous contacter.</p>
                
                <div class="contact-details">
                    <div class="contact-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Adresse</strong><br>
                            Cotonou, Bénin
                        </div>
                    </div>
                    <div class="contact-detail">
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Téléphone</strong><br>
                            +229 XX XX XX XX
                        </div>
                    </div>
                    <div class="contact-detail">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email</strong><br>
                            info@culturebenin.bj
                        </div>
                    </div>
                    <div class="contact-detail">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Horaires</strong><br>
                            Lun-Ven: 9h-18h
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <h3>Envoyez-nous un message</h3>
                <form id="contactForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Sujet</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn">
                        <i class="fas fa-paper-plane"></i>
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .contact-content {
        display: flex;
        gap: 60px;
    }

    .contact-info {
        flex: 1;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 20px;
        padding: 50px 40px;
        color: var(--white);
        box-shadow: var(--shadow);
    }

    .contact-info h3 {
        font-size: 28px;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 15px;
    }

    .contact-info h3:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--secondary);
    }

    .contact-info p {
        margin-bottom: 30px;
        font-size: 18px;
    }

    .contact-details {
        margin-top: 40px;
    }

    .contact-detail {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .contact-detail i {
        font-size: 20px;
        color: var(--secondary);
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-form {
        flex: 1;
        background-color: var(--light);
        border-radius: 20px;
        padding: 50px 40px;
        box-shadow: var(--shadow);
    }

    .contact-form h3 {
        font-size: 28px;
        margin-bottom: 25px;
        color: var(--dark);
        position: relative;
        padding-bottom: 15px;
    }

    .contact-form h3:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--dark);
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 16px;
        transition: var(--transition);
        background-color: var(--white);
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0, 135, 81, 0.2);
        outline: none;
    }

    .form-group textarea {
        height: 150px;
        resize: vertical;
    }

    @media (max-width: 900px) {
        .contact-content {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Récupération des données du formulaire
        const formData = new FormData(this);
        
        // Animation du bouton
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
        submitBtn.disabled = true;
        
        // Simulation d'envoi (à remplacer par une vraie requête AJAX)
        setTimeout(() => {
            alert('Message envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
            this.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 1500);
        
        // Pour une vraie implémentation :
        /*
        fetch('/contact', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Message envoyé avec succès !');
                this.reset();
            } else {
                alert('Une erreur est survenue. Veuillez réessayer.');
            }
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Une erreur est survenue. Veuillez réessayer.');
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
        */
    });
</script>
@endsection