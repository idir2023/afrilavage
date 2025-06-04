<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de commande | Afrilavage</title>
    <!-- Polices Google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('assets/css/indrive-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer-enhancement.css') }}">
    <style>
        /* Styles spécifiques à la page de suivi */
        body {
            background-color: var(--off-white);
        }

        .tracking-container {
            padding: 6rem 0 4rem;
        }

        .tracking-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .tracking-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 0.75rem;
        }

        .tracking-subtitle {
            font-size: 1.1rem;
            color: var(--dark-gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .tracking-form-container {
            max-width: 600px;
            margin: 0 auto 3rem;
            background-color: var(--white);
            border-radius: var(--radius-xl);
            padding: 2rem;
            box-shadow: var(--shadow-md);
        }

        .tracking-form {
            position: relative;
        }

        .tracking-form-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .tracking-input-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .tracking-input {
            flex: 1;
            padding: 1rem;
            font-size: 1rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            transition: var(--transition-normal);
        }

        .tracking-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: var(--shadow-focus);
        }

        .tracking-btn {
            padding: 1rem 1.5rem;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tracking-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .tracking-btn:active {
            transform: translateY(0);
        }

        .tracking-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .tracking-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .tracking-option:hover {
            color: var(--primary-dark);
        }

        .tracking-option i {
            font-size: 0.85rem;
        }

        /* Styles pour le résultat de suivi */
        .tracking-result {
            max-width: 900px;
            margin: 0 auto;
            background-color: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            display: none;
        }

        .tracking-result.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .tracking-result-header {
            background: var(--gradient-primary);
            color: var(--white);
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .tracking-result-header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .tracking-result-header::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -100px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
            border-radius: 50%;
        }

        .tracking-result-title {
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 1;
        }

        .tracking-order-id {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .tracking-order-date {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .tracking-order-summary {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            position: relative;
            z-index: 1;
        }

        .tracking-summary-item {
            flex: 1;
            min-width: 160px;
        }

        .tracking-summary-label {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 0.25rem;
        }

        .tracking-summary-value {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .tracking-result-body {
            padding: 2rem;
        }

        .tracking-result-actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .tracking-result-action {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem;
            border-radius: var(--radius-md);
            background-color: var(--off-white);
            transition: var(--transition-normal);
            width: 100px;
            text-align: center;
            color: var(--secondary-color);
        }

        .tracking-result-action:hover {
            background-color: var(--primary-bg);
            transform: translateY(-2px);
        }

        .tracking-result-action i {
            font-size: 1.25rem;
            color: var(--primary-color);
        }

        .tracking-result-action span {
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Progress Tracker */
        .tracking-progress {
            margin-bottom: 2rem;
        }

        .progress-tracker {
            display: flex;
            position: relative;
            margin: 0 auto 2rem;
        }

        .progress-step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .progress-step-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--white);
            border: 2px solid var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
            position: relative;
            z-index: 2;
            color: var(--dark-gray);
            font-size: 1.25rem;
            transition: var(--transition-normal);
        }

        .progress-step.active .progress-step-icon {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--white);
            box-shadow: 0 0 0 4px rgba(0, 188, 53, 0.2);
        }

        .progress-step.completed .progress-step-icon {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--white);
        }

        .progress-step-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--dark-gray);
            transition: var(--transition-normal);
        }

        .progress-step.active .progress-step-label,
        .progress-step.completed .progress-step-label {
            color: var(--primary-color);
            font-weight: 600;
        }

        .progress-step-time {
            font-size: 0.8rem;
            color: var(--dark-gray);
            margin-top: 0.25rem;
        }

        .progress-tracker::before {
            content: '';
            position: absolute;
            top: 25px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: var(--light-gray);
            z-index: 1;
        }

        .progress-tracker::after {
            content: '';
            position: absolute;
            top: 25px;
            left: 0;
            height: 2px;
            background-color: var(--primary-color);
            z-index: 1;
            width: 0;
            transition: width 1s ease;
        }

        .progress-tracker.step-1::after {
            width: 25%;
        }

        .progress-tracker.step-2::after {
            width: 50%;
        }

        .progress-tracker.step-3::after {
            width: 75%;
        }

        .progress-tracker.step-4::after {
            width: 100%;
        }

        /* Timeline Details */
        .tracking-timeline {
            position: relative;
            margin-top: 3rem;
        }

        .tracking-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 24px;
            width: 2px;
            background-color: var(--light-gray);
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            padding-bottom: 1.5rem;
            position: relative;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--white);
            border: 2px solid var(--light-gray);
            color: var(--dark-gray);
            font-size: 1.25rem;
            position: relative;
            z-index: 2;
        }

        .timeline-item.completed .timeline-icon {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--white);
        }

        .timeline-item.active .timeline-icon {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--white);
            box-shadow: 0 0 0 4px rgba(0, 188, 53, 0.2);
        }

        .timeline-content {
            flex: 1;
            padding-top: 0.5rem;
        }

        .timeline-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .timeline-date {
            font-size: 0.85rem;
            color: var(--dark-gray);
            font-weight: 400;
        }

        .timeline-description {
            color: var(--dark-gray);
            margin-top: 0.5rem;
        }

        .timeline-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
            color: var(--dark-gray);
            font-size: 0.9rem;
        }

        .timeline-location i {
            color: var(--primary-color);
        }

        .timeline-note {
            background-color: var(--primary-bg);
            padding: 0.75rem 1rem;
            border-radius: var(--radius-md);
            margin-top: 0.75rem;
            font-size: 0.9rem;
            color: var(--primary-dark);
            position: relative;
        }

        .timeline-note::before {
            content: '';
            position: absolute;
            top: -8px;
            left: 20px;
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid var(--primary-bg);
        }

        /* Map Container */
        .map-container {
            height: 300px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-bottom: 2rem;
            position: relative;
            background-color: #e9eef2;
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
            background-color: var(--off-white);
        }

        .map-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        /* Tracking Details */
        .tracking-details {
            margin-top: 2rem;
            border-top: 1px solid var(--light-gray);
            padding-top: 2rem;
        }

        .tracking-details-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .details-item {
            background-color: var(--off-white);
            border-radius: var(--radius-md);
            padding: 1.25rem;
        }

        .details-item-title {
            font-size: 0.9rem;
            color: var(--dark-gray);
            margin-bottom: 0.5rem;
        }

        .details-item-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .details-items-list {
            margin-top: 2rem;
        }

        .details-items-list-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .details-item-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background-color: var(--off-white);
            border-radius: var(--radius-md);
            margin-bottom: 0.75rem;
        }

        .details-item-image {
            width: 50px;
            height: 50px;
            border-radius: var(--radius-md);
            background-color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.5rem;
        }

        .details-item-info {
            flex: 1;
        }

        .details-item-name {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .details-item-meta {
            font-size: 0.85rem;
            color: var(--dark-gray);
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .details-item-price {
            font-weight: 600;
            color: var(--secondary-color);
        }

        /* Toast notifications */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            max-width: 300px;
        }

        .toast {
            padding: 1rem;
            margin-bottom: 0.75rem;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transform: translateX(120%);
            transition: transform 0.3s ease;
            background-color: var(--white);
            border-left: 4px solid var(--primary-color);
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--primary-bg);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--secondary-color);
        }

        .toast-message {
            font-size: 0.85rem;
            color: var(--dark-gray);
        }

        .toast-close {
            color: var(--dark-gray);
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .toast-close:hover {
            color: var(--secondary-color);
        }

        /* Custom animations */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Mobile styles */
        @media (max-width: 768px) {
            .tracking-input-group {
                flex-direction: column;
            }

            .tracking-btn {
                width: 100%;
                justify-content: center;
            }

            .tracking-options {
                justify-content: center;
            }

            .tracking-result-header,
            .tracking-result-body {
                padding: 1.5rem;
            }

            .tracking-order-summary {
                flex-direction: column;
                gap: 1rem;
            }

            .progress-tracker {
                flex-direction: column;
                align-items: flex-start;
                gap: 2rem;
            }

            .progress-tracker::before,
            .progress-tracker::after {
                left: 25px;
                top: 0;
                bottom: 0;
                width: 2px;
                height: auto;
            }

            .progress-tracker::after {
                height: 0;
                width: 2px;
            }

            .progress-tracker.step-1::after {
                height: 25%;
                width: 2px;
            }

            .progress-tracker.step-2::after {
                height: 50%;
                width: 2px;
            }

            .progress-tracker.step-3::after {
                height: 75%;
                width: 2px;
            }

            .progress-tracker.step-4::after {
                height: 100%;
                width: 2px;
            }

            .progress-step {
                display: flex;
                align-items: center;
                text-align: left;
                width: 100%;
                gap: 1rem;
            }

            .progress-step-icon {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <!-- En-tête -->
    @include('clients.layouts.header')


    <!-- Conteneur principal de suivi -->
    <main class="tracking-container">
        <div class="container">
            <div class="tracking-header">
                <h1 class="tracking-title">Suivi de votre commande</h1>
                <p class="tracking-subtitle">Suivez l'état de votre commande en temps réel et recevez des mises à jour à
                    chaque étape du processus.</p>
            </div>

            <div class="tracking-form-container">
                <div class="tracking-form-title">Entrez votre numéro de commande</div>
                <form class="tracking-form" id="trackingForm">
                    <div class="tracking-input-group">
                        <input type="text" class="tracking-input" id="trackingInput" placeholder="Ex: ORD-2365"
                            required>
                        <button type="submit" class="tracking-btn">
                            <span>Suivre</span>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div class="tracking-options">
                        <a href="#" class="tracking-option" id="loginOption">
                            <i class="fas fa-user"></i>
                            <span>Se connecter pour voir toutes mes commandes</span>
                        </a>
                        <a href="#" class="tracking-option" id="helpOption">
                            <i class="fas fa-question-circle"></i>
                            <span>Besoin d'aide ?</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Résultat du suivi (caché par défaut) -->
            <div class="tracking-result" id="trackingResult">
                <!-- En-tête du résultat -->
                <div class="tracking-result-header">
                    <div class="tracking-result-title">Suivi de commande</div>
                    <div class="tracking-order-id">#ORD-2365</div>
                    <div class="tracking-order-date">Commandé le 15 Mai 2023</div>

                    <div class="tracking-order-summary">
                        <div class="tracking-summary-item">
                            <div class="tracking-summary-label">Service</div>
                            <div class="tracking-summary-value">Pressing Express</div>
                        </div>
                        <div class="tracking-summary-item">
                            <div class="tracking-summary-label">Statut</div>
                            <div class="tracking-summary-value">En livraison</div>
                        </div>
                        <div class="tracking-summary-item">
                            <div class="tracking-summary-label">Prix total</div>
                            <div class="tracking-summary-value">120 DH</div>
                        </div>
                    </div>
                </div>

                <!-- Corps du résultat -->
                <div class="tracking-result-body">
                    <!-- Actions rapides -->
                    <div class="tracking-result-actions">
                        <a href="#" class="tracking-result-action" id="contactAction">
                            <i class="fas fa-headset"></i>
                            <span>Contacter</span>
                        </a>
                        <a href="#" class="tracking-result-action" id="invoiceAction">
                            <i class="fas fa-file-invoice"></i>
                            <span>Facture</span>
                        </a>
                        <a href="#" class="tracking-result-action" id="shareAction">
                            <i class="fas fa-share-alt"></i>
                            <span>Partager</span>
                        </a>
                        <a href="#" class="tracking-result-action" id="notifyAction">
                            <i class="fas fa-bell"></i>
                            <span>Notifier</span>
                        </a>
                    </div>

                    <!-- Suivi de progression -->
                    <div class="tracking-progress">
                        <div class="progress-tracker step-3" id="progressTracker">
                            <div class="progress-step completed" data-step="1">
                                <div class="progress-step-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <div class="progress-step-label">Commande traitée</div>
                                    <div class="progress-step-time">15 Mai, 09:30</div>
                                </div>
                            </div>
                            <div class="progress-step completed" data-step="2">
                                <div class="progress-step-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <div class="progress-step-label">En nettoyage</div>
                                    <div class="progress-step-time">15 Mai, 14:45</div>
                                </div>
                            </div>
                            <div class="progress-step active" data-step="3">
                                <div class="progress-step-icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div>
                                    <div class="progress-step-label">En livraison</div>
                                    <div class="progress-step-time">16 Mai, 10:15</div>
                                </div>
                            </div>
                            <div class="progress-step" data-step="4">
                                <div class="progress-step-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div>
                                    <div class="progress-step-label">Livré</div>
                                    <div class="progress-step-time">Prévu: 16 Mai, 15:00</div>
                                </div>
                            </div>
                        </div>

                        <!-- Carte de suivi -->
                        <div class="map-container">
                            <div class="map-placeholder">
                                <i class="fas fa-map-marked-alt"></i>
                                <p>Carte de suivi en temps réel</p>
                                <p style="font-size: 0.85rem; opacity: 0.7;">Votre commande est en route vers votre
                                    adresse</p>
                            </div>
                        </div>

                        <!-- Estimation de livraison -->
                        <div
                            style="background-color: var(--primary-bg); padding: 1rem 1.25rem; border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                            <div>
                                <div style="font-weight: 600; margin-bottom: 0.25rem; color: var(--secondary-color);">
                                    Livraison prévue aujourd'hui</div>
                                <div style="color: var(--dark-gray); font-size: 0.9rem;">Votre commande arrivera entre
                                    <strong>14:30</strong> et <strong>15:30</strong>
                                </div>
                            </div>
                            <button class="btn btn-primary" id="trackOnMap">Suivre en direct</button>
                        </div>
                    </div>

                    <!-- Timeline détaillée -->
                    <div class="tracking-timeline">
                        <div class="timeline-item completed">
                            <div class="timeline-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">
                                    <span>Commande confirmée</span>
                                    <span class="timeline-date">15 Mai, 09:30</span>
                                </div>
                                <div class="timeline-description">Votre commande a été reçue et confirmée par notre
                                    système.</div>
                            </div>
                        </div>

                        <div class="timeline-item completed">
                            <div class="timeline-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">
                                    <span>Collecte effectuée</span>
                                    <span class="timeline-date">15 Mai, 11:15</span>
                                </div>
                                <div class="timeline-description">Nos agents ont récupéré vos articles à l'adresse
                                    indiquée.</div>
                                <div class="timeline-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>123 Rue des Fleurs, Casablanca</span>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item completed">
                            <div class="timeline-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">
                                    <span>Traitement démarré</span>
                                    <span class="timeline-date">15 Mai, 13:45</span>
                                </div>
                                <div class="timeline-description">Vos articles sont en cours de nettoyage dans notre
                                    centre.</div>
                            </div>
                        </div>

                        <div class="timeline-item completed">
                            <div class="timeline-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">
                                    <span>Nettoyage terminé</span>
                                    <span class="timeline-date">15 Mai, 17:30</span>
                                </div>
                                <div class="timeline-description">Le nettoyage de vos articles est terminé et ils sont
                                    prêts pour la livraison.</div>
                                <div class="timeline-note">
                                    <i class="fas fa-info-circle"></i> Une attention particulière a été portée aux
                                    taches signalées sur votre chemise bleue.
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item active">
                            <div class="timeline-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">
                                    <span>En cours de livraison</span>
                                    <span class="timeline-date">16 Mai, 10:15</span>
                                </div>
                                <div class="timeline-description">Vos articles sont en route vers votre adresse de
                                    livraison.</div>
                                <div class="timeline-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>123 Rue des Fleurs, Casablanca</span>
                                </div>
                                <div class="timeline-note">
                                    <i class="fas fa-info-circle"></i> Votre livreur, Mohammed, arrivera dans environ 4
                                    heures. Vous recevrez une notification 30 minutes avant l'arrivée.
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">
                                    <span>Livraison prévue</span>
                                    <span class="timeline-date">16 Mai, 14:30 - 15:30</span>
                                </div>
                                <div class="timeline-description">Vos articles seront livrés à votre adresse.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Détails de la commande -->
                    <div class="tracking-details">
                        <h3 class="tracking-details-title">Détails de la commande</h3>

                        <div class="details-grid">
                            <div class="details-item">
                                <div class="details-item-title">Service</div>
                                <div class="details-item-value">Pressing Express</div>
                            </div>
                            <div class="details-item">
                                <div class="details-item-title">Date de commande</div>
                                <div class="details-item-value">15 Mai 2023, 09:30</div>
                            </div>
                            <div class="details-item">
                                <div class="details-item-title">Client</div>
                                <div class="details-item-value">John Doe</div>
                            </div>
                            <div class="details-item">
                                <div class="details-item-title">Adresse de livraison</div>
                                <div class="details-item-value">123 Rue des Fleurs, Casablanca</div>
                            </div>
                            <div class="details-item">
                                <div class="details-item-title">Téléphone</div>
                                <div class="details-item-value">+212 6XX XXX XXX</div>
                            </div>
                            <div class="details-item">
                                <div class="details-item-title">Méthode de paiement</div>
                                <div class="details-item-value">Carte bancaire</div>
                            </div>
                            <div class="details-item">
                                <div class="details-item-title">Montant total</div>
                                <div class="details-item-value">120 DH</div>
                            </div>
                            <div class="details-item">
                                <div class="details-item-title">Instructions spéciales</div>
                                <div class="details-item-value">Attention particulière à la tache sur la chemise bleue
                                </div>
                            </div>
                        </div>

                        <!-- Liste des articles -->
                        <div class="details-items-list">
                            <h4 class="details-items-list-title">Articles (5)</h4>

                            <div class="details-item-card">
                                <div class="details-item-image">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <div class="details-item-info">
                                    <div class="details-item-name">Chemise bleue</div>
                                    <div class="details-item-meta">
                                        <span>Nettoyage à sec</span>
                                        <span>Repassage délicat</span>
                                    </div>
                                </div>
                                <div class="details-item-price">25 DH</div>
                            </div>

                            <div class="details-item-card">
                                <div class="details-item-image">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <div class="details-item-info">
                                    <div class="details-item-name">Pantalon noir</div>
                                    <div class="details-item-meta">
                                        <span>Nettoyage standard</span>
                                        <span>Repassage</span>
                                    </div>
                                </div>
                                <div class="details-item-price">30 DH</div>
                            </div>

                            <div class="details-item-card">
                                <div class="details-item-image">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <div class="details-item-info">
                                    <div class="details-item-name">Veste grise</div>
                                    <div class="details-item-meta">
                                        <span>Nettoyage à sec</span>
                                        <span>Traitement anti-taches</span>
                                    </div>
                                </div>
                                <div class="details-item-price">40 DH</div>
                            </div>

                            <div class="details-item-card">
                                <div class="details-item-image">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <div class="details-item-info">
                                    <div class="details-item-name">T-shirt blanc</div>
                                    <div class="details-item-meta">
                                        <span>Lavage délicat</span>
                                    </div>
                                </div>
                                <div class="details-item-price">15 DH</div>
                            </div>

                            <div class="details-item-card">
                                <div class="details-item-image">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <div class="details-item-info">
                                    <div class="details-item-name">Cravate soie</div>
                                    <div class="details-item-meta">
                                        <span>Nettoyage délicat à sec</span>
                                    </div>
                                </div>
                                <div class="details-item-price">10 DH</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Conteneur de notifications toast -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Footer -->
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

            // Formulaire de suivi
            const trackingForm = document.getElementById('trackingForm');
            const trackingInput = document.getElementById('trackingInput');
            const trackingResult = document.getElementById('trackingResult');

            if (trackingForm) {
                trackingForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const trackingNumber = trackingInput.value.trim();

                    if (trackingNumber) {
                        // Afficher le resultat de suivi (simulé)
                        trackingResult.classList.add('active');

                        // Scroller vers le résultat
                        trackingResult.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // Pour la démonstration, montrer un toast de notification après 3 secondes
                        setTimeout(function() {
                            showToast('Mise à jour en direct',
                                'Le livreur est maintenant à 5 km de votre adresse.', 'info');
                        }, 3000);
                    }
                });
            }

            // Options de tracking
            const loginOption = document.getElementById('loginOption');
            const helpOption = document.getElementById('helpOption');

            if (loginOption) {
                loginOption.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = 'login.html';
                });
            }

            if (helpOption) {
                helpOption.addEventListener('click', function(e) {
                    e.preventDefault();
                    showToast('Besoin d\'aide ?',
                        'Un conseiller va vous contacter dans les prochaines minutes.', 'success');
                });
            }

            // Actions sur le résultat de suivi
            const contactAction = document.getElementById('contactAction');
            const invoiceAction = document.getElementById('invoiceAction');
            const shareAction = document.getElementById('shareAction');
            const notifyAction = document.getElementById('notifyAction');

            if (contactAction) {
                contactAction.addEventListener('click', function(e) {
                    e.preventDefault();
                    showToast('Contact', 'Un conseiller va vous contacter dans les prochaines minutes.',
                        'success');
                });
            }

            if (invoiceAction) {
                invoiceAction.addEventListener('click', function(e) {
                    e.preventDefault();
                    showToast('Facture', 'La facture a été envoyée à votre adresse email.', 'success');
                });
            }

            if (shareAction) {
                shareAction.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Simuler le partage
                    const shareData = {
                        title: 'Suivi de commande Afrilavage',
                        text: 'Suivez ma commande #ORD-2365 chez Afrilavage',
                        url: window.location.href
                    };

                    if (navigator.share) {
                        navigator.share(shareData)
                            .then(() => showToast('Partage', 'Le lien de suivi a été partagé avec succès.',
                                'success'))
                            .catch(err => showToast('Erreur', 'Impossible de partager le lien.', 'error'));
                    } else {
                        // Copier le lien dans le presse-papier
                        const dummyInput = document.createElement('input');
                        dummyInput.value = window.location.href;
                        document.body.appendChild(dummyInput);
                        dummyInput.select();
                        document.execCommand('copy');
                        document.body.removeChild(dummyInput);

                        showToast('Copié', 'Le lien de suivi a été copié dans le presse-papier.',
                        'success');
                    }
                });
            }

            if (notifyAction) {
                notifyAction.addEventListener('click', function(e) {
                    e.preventDefault();
                    showToast('Notifications',
                        'Vous recevrez des notifications à chaque mise à jour de votre commande.',
                        'success');
                });
            }

            // Bouton de suivi sur la carte
            const trackOnMap = document.getElementById('trackOnMap');

            if (trackOnMap) {
                trackOnMap.addEventListener('click', function(e) {
                    e.preventDefault();
                    showToast('Carte en direct',
                        'La carte de suivi en temps réel n\'est pas disponible pour le moment.', 'info');
                });
            }

            // Fonction pour montrer les toasts
            function showToast(title, message, type = 'info') {
                const toastContainer = document.getElementById('toastContainer');

                if (!toastContainer) return;

                const toast = document.createElement('div');
                toast.className = 'toast';

                const icons = {
                    'success': 'fa-check-circle',
                    'error': 'fa-exclamation-circle',
                    'warning': 'fa-exclamation-triangle',
                    'info': 'fa-info-circle'
                };

                const iconClass = icons[type] || icons.info;

                toast.innerHTML = `
                    <div class="toast-icon">
                        <i class="fas ${iconClass}"></i>
                    </div>
                    <div class="toast-content">
                        <div class="toast-title">${title}</div>
                        <div class="toast-message">${message}</div>
                    </div>
                    <div class="toast-close">
                        <i class="fas fa-times"></i>
                    </div>
                `;

                toastContainer.appendChild(toast);

                // Afficher le toast
                setTimeout(() => toast.classList.add('show'), 10);

                // Fermer le toast
                const closeBtn = toast.querySelector('.toast-close');
                closeBtn.addEventListener('click', function() {
                    toast.classList.remove('show');
                    setTimeout(() => toast.remove(), 300);
                });

                // Fermer automatiquement après 5 secondes
                setTimeout(function() {
                    if (toast.parentElement) {
                        toast.classList.remove('show');
                        setTimeout(() => toast.remove(), 300);
                    }
                }, 5000);
            }

            // Vérifier si un identifiant de suivi est présent dans l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const trackId = urlParams.get('track');

            if (trackId) {
                trackingInput.value = trackId;
                trackingForm.dispatchEvent(new Event('submit'));
            }
        });
    </script>

    <!-- Scripts pour les éléments uniformisés -->
    <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
    <script src="{{ asset('assets/js/header-utils.js') }}"></script>
</body>

</html>
