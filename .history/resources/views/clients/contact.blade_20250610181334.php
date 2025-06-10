<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Afrilavage</title>
    <!-- Polices Google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personnalisé -->

    <link rel="stylesheet" href="{{ asset('assets/css/indrive-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer-enhancement.css') }}">
    <style>
        /* Styles spécifiques à la page de contact */
        .contact-hero {
            padding: 6rem 0 3rem;
            background: var(--gradient-primary);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .contact-hero::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .contact-hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-hero-subtitle {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .contact-hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .contact-hero-description {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .contact-cards {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
            margin-top: 2rem;
        }

        .contact-card {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            text-align: center;
            width: 220px;
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            background-color: rgba(255, 255, 255, 0.2);
        }

        .contact-card-icon {
            width: 60px;
            height: 60px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1.25rem;
        }

        .contact-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .contact-card-text {
            margin-bottom: 0;
            opacity: 0.9;
            font-size: 0.95rem;
        }

        /* Main content */
        .contact-main {
            padding: 5rem 0;
            background-color: var(--white);
            margin-top: -2rem;
            border-radius: 2rem 2rem 0 0;
            position: relative;
            z-index: 2;
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Contact form */
        .contact-form-container {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 2.5rem;
            position: relative;
        }

        .contact-form-header {
            margin-bottom: 2rem;
        }

        .contact-form-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .contact-form-subtitle {
            font-size: 1.1rem;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.75rem;
            color: var(--secondary-color);
        }

        .form-input,
        .form-textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: var(--shadow-focus);
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-input.error,
        .form-textarea.error {
            border-color: var(--danger);
        }

        .form-error {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: none;
        }

        .form-error.visible {
            display: block;
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
        }

        .form-col {
            flex: 1;
        }

        .form-select {
            width: 100%;
            padding: 1rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236b7280' viewBox='0 0 16 16'%3E%3Cpath d='M8 11.5l-6.327-6.327 1.061-1.061 5.266 5.266 5.266-5.266 1.061 1.061-6.327 6.327z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-color: var(--white);
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: var(--shadow-focus);
        }

        .contact-btn {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: var(--radius-md);
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .contact-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .contact-btn:active {
            transform: translateY(0);
        }

        /* Map and info */
        .contact-info-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .map-container {
            height: 300px;
            background-color: var(--off-white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            position: relative;
        }

        .map-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--dark-gray);
        }

        .map-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .info-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 2rem;
        }

        .info-card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .info-card-title i {
            color: var(--primary-color);
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.25rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid var(--light-gray);
        }

        .info-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-bg);
            color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .info-content {
            flex-grow: 1;
        }

        .info-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .info-text {
            color: var(--dark-gray);
            line-height: 1.6;
            margin: 0;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-bg);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* Hours card */
        .hours-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 2rem;
        }

        .hours-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .hours-title i {
            color: var(--primary-color);
        }

        .hours-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .hours-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--light-gray);
        }

        .hours-item:last-child {
            border-bottom: none;
        }

        .hours-day {
            font-weight: 500;
            color: var(--secondary-color);
        }

        .hours-time {
            color: var(--dark-gray);
        }

        .hours-day.current {
            color: var(--primary-color);
            font-weight: 600;
        }

        .hours-time.current {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* FAQ Section */
        .contact-faq {
            padding: 5rem 0;
            background-color: var(--off-white);
        }

        .faq-title-container {
            text-align: center;
            margin-bottom: 3rem;
        }

        .faq-subtitle {
            font-size: 1.1rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .faq-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .faq-description {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .faq-item {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: var(--shadow-md);
        }

        .faq-question {
            padding: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 600;
            color: var(--secondary-color);
            font-size: 1.1rem;
        }

        .faq-question i {
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 1.5rem;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding: 0 1.5rem 1.5rem;
            max-height: 500px;
        }

        .faq-answer p {
            margin: 0;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* CTA Section */
        .contact-cta {
            padding: 5rem 0;
            background-color: var(--white);
            text-align: center;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .cta-description {
            font-size: 1.1rem;
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .cta-btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: var(--radius-md);
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .cta-btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .cta-btn-secondary {
            background-color: var(--white);
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: var(--radius-md);
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .cta-btn-secondary:hover {
            background-color: var(--primary-bg);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /* Success message */
        .success-message {
            display: none;
            background-color: #F0FDF4;
            border: 1px solid #86EFAC;
            color: #166534;
            padding: 1rem;
            border-radius: var(--radius-md);
            margin-bottom: 2rem;
            text-align: center;
        }

        .success-message.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .contact-hero-title {
                font-size: 2.5rem;
            }

            .faq-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .contact-hero-title {
                font-size: 2rem;
            }

            .contact-cards {
                gap: 1rem;
            }

            .contact-card {
                width: 100%;
            }

            .form-row {
                flex-direction: column;
                gap: 1.5rem;
            }

            .cta-title {
                font-size: 2rem;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- En-tête -->
      @include('clients.layouts.header')


    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-content">
                <div class="contact-hero-subtitle">Contact</div>
                <h1 class="contact-hero-title">Comment pouvons-nous vous aider ?</h1>
                <p class="contact-hero-description">Notre équipe est là pour répondre à toutes vos questions et vous
                    accompagner dans vos besoins de nettoyage. N'hésitez pas à nous contacter !</p>

                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-card-title">Téléphone</div>
                        <p class="contact-card-text">+212 522 123 456</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-card-title">Email</div>
                        <p class="contact-card-text">contact@afrilavage.com</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-card-title">Adresse</div>
                        <p class="contact-card-text">123 Av. Mohammed V, Casablanca</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="contact-main">
        <div class="container">
            <div class="contact-container">
                <!-- Contact Form -->
                <div class="contact-form-container">
                    <div class="contact-form-header">
                        <h2 class="contact-form-title">Envoyez-nous un message</h2>
                        <p class="contact-form-subtitle">Remplissez le formulaire ci-dessous et nous vous répondrons
                            dans les plus brefs délais.</p>
                    </div>

                    <div class="success-message" id="successMessage">
                        <i class="fas fa-check-circle"></i> Votre message a été envoyé avec succès ! Nous vous
                        contacterons très bientôt.
                    </div>

    <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="name" class="form-label">Nom complet</label>
                                    <input type="text" id="name" name="name" class="form-input"
                                        placeholder="Votre nom complet" required>
                                    <div class="form-error" id="nameError">Veuillez entrer votre nom complet.</div>
                                </div>
                            </div>

                            <div class="form-col">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-input"
                                        placeholder="Votre adresse email" required>
                                    <div class="form-error" id="emailError">Veuillez entrer une adresse email valide.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Téléphone</label>
                                    <input type="tel" id="phone" name="phone" class="form-input"
                                        placeholder="Votre numéro de téléphone">
                                    <div class="form-error" id="phoneError">Veuillez entrer un numéro de téléphone
                                        valide.</div>
                                </div>
                            </div>

                            <div class="form-col">
                                <div class="form-group">
                                    <label for="subject" class="form-label">Sujet</label>
                                    <select id="subject" name="subject" class="form-select" required>
                                        <option value="" selected disabled>Sélectionnez un sujet</option>
                                        <option value="service-information">Information sur les services</option>
                                        <option value="order-question">Question sur une commande</option>
                                        <option value="price-quote">Demande de devis</option>
                                        <option value="feedback">Commentaires et suggestions</option>
                                        <option value="complaint">Réclamation</option>
                                        <option value="partnership">Partenariat</option>
                                        <option value="other">Autre</option>
                                    </select>
                                    <div class="form-error" id="subjectError">Veuillez sélectionner un sujet.</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" class="form-textarea" placeholder="Votre message" required></textarea>
                            <div class="form-error" id="messageError">Veuillez entrer votre message.</div>
                        </div>

                        <div class="form-group">
                            <div style="display: flex; align-items: flex-start;">
                                <input type="checkbox" id="privacy" name="privacy"
                                    style="margin-right: 10px; margin-top: 4px;" required>
                                <label for="privacy">J'accepte que mes données soient traitées conformément à la <a
                                        href="#" style="color: var(--primary-color);">politique de
                                        confidentialité</a>.</label>
                            </div>
                            <div class="form-error" id="privacyError">Vous devez accepter la politique de
                                confidentialité.</div>
                        </div>

                      <button type="submit" class="contact-btn">
        <span>Envoyer le message</span>
        <i class="fas fa-paper-plane"></i>
    </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="contact-info-container">
                    <!-- Map -->
                    <div class="map-container">
                        <div class="map-placeholder">
                            <i class="fas fa-map-marked-alt"></i>
                            <p>Carte interactive</p>
                        </div>
                    </div>

                    <!-- Info Card -->
                    <div class="info-card">
                        <h3 class="info-card-title">
                            <i class="fas fa-info-circle"></i>
                            Informations de contact
                        </h3>

                        <ul class="info-list">
                            <li class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Adresse</div>
                                    <p class="info-text">123 Avenue Mohammed V, Quartier Maarif, Casablanca 20100,
                                        Maroc</p>
                                </div>
                            </li>

                            <li class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Téléphone</div>
                                    <p class="info-text">+212 522 123 456</p>
                                    <p class="info-text">+212 661 234 567 (Whatsapp)</p>
                                </div>
                            </li>

                            <li class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Email</div>
                                    <p class="info-text">contact@afrilavage.com</p>
                                    <p class="info-text">support@afrilavage.com</p>
                                </div>
                            </li>

                          
                        </ul>
                    </div>

                    <!-- Hours Card -->
                    <div class="hours-card">
                        <h3 class="hours-title">
                            <i class="fas fa-clock"></i>
                            Heures d'ouverture
                        </h3>

                        <ul class="hours-list">
                            <li class="hours-item">
                                <div class="hours-day">Lundi</div>
                                <div class="hours-time">8:00 - 20:00</div>
                            </li>
                            <li class="hours-item">
                                <div class="hours-day">Mardi</div>
                                <div class="hours-time">8:00 - 20:00</div>
                            </li>
                            <li class="hours-item">
                                <div class="hours-day">Mercredi</div>
                                <div class="hours-time">8:00 - 20:00</div>
                            </li>
                            <li class="hours-item">
                                <div class="hours-day">Jeudi</div>
                                <div class="hours-time">8:00 - 20:00</div>
                            </li>
                            <li class="hours-item">
                                <div class="hours-day">Vendredi</div>
                                <div class="hours-time">8:00 - 20:00</div>
                            </li>
                            <li class="hours-item">
                                <div class="hours-day">Samedi</div>
                                <div class="hours-time">9:00 - 18:00</div>
                            </li>
                            <li class="hours-item">
                                <div class="hours-day">Dimanche</div>
                                <div class="hours-time">10:00 - 16:00</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="contact-faq">
        <div class="container">
            <div class="faq-title-container">
                <div class="faq-subtitle">Questions fréquentes</div>
                <h2 class="faq-title">Besoin d'aide ?</h2>
                <p class="faq-description">Trouvez rapidement des réponses à vos questions les plus courantes. Si vous
                    ne trouvez pas ce que vous cherchez, n'hésitez pas à nous contacter directement.</p>
            </div>

            <div class="faq-grid">
                <div class="faq-item active">
                    <div class="faq-question">
                        <span>Comment puis-je suivre ma commande ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Vous pouvez suivre votre commande en temps réel sur notre site web ou notre application
                            mobile. Il vous suffit de vous connecter à votre compte et d'accéder à la section "Mes
                            commandes" ou d'utiliser la fonction "Suivi" en saisissant votre numéro de commande. Vous
                            recevrez également des notifications par SMS ou e-mail à chaque étape du processus.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Quels sont vos délais de livraison ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nos délais de livraison varient en fonction du service choisi. Pour le pressing standard,
                            comptez 48h, pour le service express, 24h. Pour le lavage auto, nous proposons des délais
                            similaires. Lors de votre commande, vous pourrez choisir une plage horaire de livraison qui
                            vous convient. Nous respectons scrupuleusement ces délais et vous tenons informé de
                            l'avancement de votre commande.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Comment puis-je annuler ou modifier ma commande ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Pour annuler ou modifier votre commande, vous pouvez nous contacter par téléphone au +212 522
                            123 456 ou par email à support@afrilavage.com dans les plus brefs délais. Veuillez noter que
                            les commandes déjà en cours de traitement peuvent être soumises à des frais d'annulation.
                            Les modifications sont possibles selon l'état d'avancement de votre commande.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Quelles sont les zones desservies par Afrilavage ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Afrilavage dessert actuellement 12 villes au Maroc, notamment Casablanca, Rabat, Marrakech,
                            Fès, Tanger, Agadir, Meknès, Oujda, Kénitra, Tétouan, El Jadida et Safi. Dans chaque ville,
                            nous couvrons la plupart des quartiers. Lors de votre commande, vous pourrez vérifier si
                            votre adresse est dans notre zone de service. Nous élargissons constamment notre couverture
                            géographique.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Quelles méthodes de paiement acceptez-vous ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nous acceptons plusieurs méthodes de paiement pour votre confort : carte bancaire en ligne,
                            paiement mobile, paiement à la livraison (espèces ou carte via TPE mobile), et système de
                            crédit pour nos clients abonnés. Tous nos paiements en ligne sont sécurisés par une
                            plateforme certifiée et vos données bancaires ne sont jamais stockées sur nos serveurs.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Proposez-vous des abonnements ou des offres spéciales ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Oui, nous proposons plusieurs formules d'abonnement adaptées à différents besoins, comme le
                            Pack Mensuel ou le Pack Famille VIP. Ces abonnements offrent des tarifs préférentiels et des
                            services exclusifs. Nous proposons également régulièrement des offres spéciales et des
                            promotions saisonnières. Inscrivez-vous à notre newsletter ou suivez-nous sur les réseaux
                            sociaux pour être informé de nos dernières offres.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="contact-cta">
        <div class="container">
            <div class="cta-container">
                <h2 class="cta-title">Prêt à simplifier votre quotidien ?</h2>
                <p class="cta-description">Économisez du temps et profitez de la vie en confiant vos tâches de
                    nettoyage à Afrilavage. Commandez dès maintenant et découvrez pourquoi des milliers de clients nous
                    font confiance.</p>

                <div class="cta-buttons">
                    <a href="{{ route('order') }}" class="cta-btn-primary">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Commander maintenant</span>
                    </a>
                    <a href="tel:+212522123456" class="cta-btn-secondary">
                        <i class="fas fa-phone-alt"></i>
                        <span>Nous appeler</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

   
   @include('clients.layouts.footer')
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navigation mobile
            const mobileToggle = document.getElementById('mobileToggle');
            const navMenu = document.getElementById('navMenu');

            if (mobileToggle && navMenu) {
                mobileToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('active');
                });
            }

            // Validation du formulaire de contact
            const contactForm = document.getElementById('contactForm');
            const successMessage = document.getElementById('successMessage');

            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Reset previous errors
                    document.querySelectorAll('.form-error').forEach(error => {
                        error.classList.remove('visible');
                    });

                    // Validate form
                    let isValid = true;

                    // Name validation
                    const name = document.getElementById('name');
                    if (!name.value.trim()) {
                        document.getElementById('nameError').classList.add('visible');
                        name.classList.add('error');
                        isValid = false;
                    } else {
                        name.classList.remove('error');
                    }

                    // Email validation
                    const email = document.getElementById('email');
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email.value.trim())) {
                        document.getElementById('emailError').classList.add('visible');
                        email.classList.add('error');
                        isValid = false;
                    } else {
                        email.classList.remove('error');
                    }

                    // Phone validation (optional)
                    const phone = document.getElementById('phone');
                    if (phone.value.trim() && !validatePhone(phone.value.trim())) {
                        document.getElementById('phoneError').classList.add('visible');
                        phone.classList.add('error');
                        isValid = false;
                    } else {
                        phone.classList.remove('error');
                    }

                    // Subject validation
                    const subject = document.getElementById('subject');
                    if (!subject.value) {
                        document.getElementById('subjectError').classList.add('visible');
                        subject.classList.add('error');
                        isValid = false;
                    } else {
                        subject.classList.remove('error');
                    }

                    // Message validation
                    const message = document.getElementById('message');
                    if (!message.value.trim()) {
                        document.getElementById('messageError').classList.add('visible');
                        message.classList.add('error');
                        isValid = false;
                    } else {
                        message.classList.remove('error');
                    }

                    // Privacy checkbox validation
                    const privacy = document.getElementById('privacy');
                    if (!privacy.checked) {
                        document.getElementById('privacyError').classList.add('visible');
                        isValid = false;
                    }

                    // If valid, show success message
                    if (isValid) {
                        // Simulate form submission
                        const submitBtn = contactForm.querySelector('.contact-btn');
                        submitBtn.innerHTML =
                            '<span>Envoi en cours...</span><i class="fas fa-spinner fa-spin"></i>';
                        submitBtn.disabled = true;

                        setTimeout(() => {
                            contactForm.reset();
                            successMessage.classList.add('show');
                            submitBtn.innerHTML =
                                '<span>Envoyer le message</span><i class="fas fa-paper-plane"></i>';
                            submitBtn.disabled = false;

                            // Hide success message after 5 seconds
                            setTimeout(() => {
                                successMessage.classList.remove('show');
                            }, 5000);
                        }, 1500);
                    }
                });
            }

            // Phone validation helper
            function validatePhone(phone) {
                // Simple phone validation - can be improved for specific country format
                return phone.length >= 8 && /^[0-9+\-\s()]*$/.test(phone);
            }

            // FAQ accordion functionality
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');

                question.addEventListener('click', function() {
                    // Toggle active class for clicked item
                    item.classList.toggle('active');

                    // Close other items if needed
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                        }
                    });
                });
            });

            // Highlight current day in hours list
            const today = new Date().getDay(); // 0 = Sunday, 1 = Monday, ...
            const days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
            const currentDay = days[today];

            document.querySelectorAll('.hours-item').forEach(item => {
                const dayName = item.querySelector('.hours-day').textContent;
                if (dayName === currentDay) {
                    item.querySelector('.hours-day').classList.add('current');
                    item.querySelector('.hours-time').classList.add('current');
                }
            });
        });
    </script>
    <!-- Scripts pour les éléments uniformisés -->
   <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
     <script src="{{ asset('assets/js/header-utils.js') }}"></script>
</body>

</html>
