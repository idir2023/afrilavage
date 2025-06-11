<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander | Afrilavage</title>
    <!-- Polices Google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('assets/css/indrive-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer-enhancement.css') }}">
    <style>
        .error-alert {
            margin-bottom: 1rem;
            padding: 1rem;
            border-left: 4px solid #f44336;
            background-color: #ffe6e6;
            color: #a94442;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .error-title {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            stroke: #a94442;
        }

        .error-list {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin: 0;
        }

        /* Styles spécifiques à la page de commande */
        body {
            background-color: var(--off-white);
        }

        .order-container {
            padding: 6rem 0 4rem;
        }

        .order-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .order-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 0.75rem;
        }

        .order-subtitle {
            font-size: 1.1rem;
            color: var(--dark-gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .order-process {
            max-width: 800px;
            margin: 0 auto 3rem;
        }

        .process-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 2rem;
        }

        .process-steps::before {
            content: '';
            position: absolute;
            top: 30px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: var(--light-gray);
            z-index: 1;
        }

        .process-step {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 25%;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--white);
            border: 2px solid var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark-gray);
            margin: 0 auto 1rem;
            transition: all 0.3s ease;
        }

        .process-step.active .step-number {
            background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 5px rgba(0, 188, 53, 0.2);
        }

        .process-step.completed .step-number {
            background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }

        .step-title {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--dark-gray);
            margin-bottom: 0.5rem;
        }

        .process-step.active .step-title {
            color: var(--primary-color);
            font-weight: 600;
        }

        .step-desc {
            font-size: 0.85rem;
            color: var(--dark-gray);
            display: none;
        }

        .process-step.active .step-desc {
            display: block;
        }

        /* Order form styling */
        .order-form-container {
            background-color: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            max-width: 800px;
            margin: 0 auto 3rem;
            overflow: hidden;
        }

        .order-form-header {
            background: var(--gradient-primary);
            color: var(--white);
            padding: 1.5rem 2rem;
            position: relative;
        }

        .order-form-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .order-form-subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }

        .order-form-header::before {
            content: '';
            position: absolute;
            right: -30px;
            top: -30px;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .order-form-body {
            padding: 2rem;
        }

        /* Form steps */
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .step-title-bar {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-bg);
            color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 1rem;
        }

        .step-heading {
            flex: 1;
        }

        .step-heading h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .step-heading p {
            font-size: 0.9rem;
            color: var(--dark-gray);
        }

        /* Form groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
        }

        .form-input {
            width: 100%;
            padding: 0.85rem 1rem;
            font-size: 1rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: var(--shadow-focus);
        }

        .form-input.error {
            border-color: var(--danger);
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-gray);
            pointer-events: none;
        }

        .input-group .form-input {
            padding-left: 2.5rem;
        }

        .form-helper {
            font-size: 0.85rem;
            color: var(--dark-gray);
            margin-top: 0.5rem;
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

        /* Form grid and columns */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -0.75rem;
        }

        .form-col {
            padding: 0 0.75rem;
            flex: 1;
            min-width: 0;
            /* Needed for overflow in flex containers */
        }

        .form-col-6 {
            width: 50%;
            padding: 0 0.75rem;
        }

        .form-col-4 {
            width: 33.333333%;
            padding: 0 0.75rem;
        }

        /* Service type selection */
        .service-types {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .service-type {
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            padding: 1.25rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .service-type:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .service-type.active {
            border-color: var(--primary-color);
            background-color: var(--primary-bg);
            box-shadow: var(--shadow-md);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background-color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .service-type.active .service-icon {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .service-name {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .service-price {
            font-size: 0.9rem;
            color: var(--primary-color);
        }

        /* Service options */
        .service-options {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }

        .service-option {
            position: relative;
        }

        .service-option-input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .service-option-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .service-option-input:checked+.service-option-label {
            border-color: var(--primary-color);
            background-color: var(--primary-bg);
            box-shadow: var(--shadow-sm);
        }

        .option-icon {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 0.75rem;
        }

        .option-name {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .option-price {
            font-size: 0.85rem;
            color: var(--primary-color);
        }

        /* Date and time selection */
        .date-time-selection {
            margin-bottom: 1.5rem;
        }

        .date-selection {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 1rem;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .date-option {
            min-width: 80px;
            padding: 0.75rem 0.5rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .date-option:hover {
            border-color: var(--primary-color);
        }

        .date-option.active {
            border-color: var(--primary-color);
            background-color: var(--primary-bg);
        }

        .date-day {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .date-weekday {
            font-size: 0.85rem;
            color: var(--dark-gray);
            margin-bottom: 0.25rem;
        }

        .date-month {
            font-size: 0.75rem;
            color: var(--dark-gray);
            text-transform: uppercase;
        }

        .time-selection {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 0.75rem;
        }

        .time-option {
            padding: 0.75rem 0.5rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .time-option:hover {
            border-color: var(--primary-color);
        }

        .time-option.active {
            border-color: var(--primary-color);
            background-color: var(--primary-bg);
        }

        .time-option.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: var(--light-gray);
        }

        .time-value {
            font-weight: 500;
            color: var(--secondary-color);
        }

        /* Address form */
        .address-container {
            margin-bottom: 1.5rem;
        }

        .saved-addresses {
            margin-bottom: 1.5rem;
        }

        .address-card {
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: flex-start;
        }

        .address-card:hover {
            border-color: var(--primary-color);
        }

        .address-card.active {
            border-color: var(--primary-color);
            background-color: var(--primary-bg);
        }

        .address-card-radio {
            margin-right: 1rem;
            margin-top: 0.25rem;
        }

        .address-card-content {
            flex: 1;
        }

        .address-card-title {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .address-card-line {
            font-size: 0.9rem;
            color: var(--dark-gray);
            margin-bottom: 0.25rem;
        }

        .address-actions {
            display: flex;
            gap: 0.75rem;
        }

        .address-action {
            font-size: 0.85rem;
            color: var(--primary-color);
            cursor: pointer;
        }

        .address-action:hover {
            text-decoration: underline;
        }

        /* Order summary */
        .order-summary {
            background-color: var(--off-white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .summary-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .summary-list {
            margin-bottom: 1.5rem;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--light-gray);
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-item-name {
            color: var(--secondary-color);
        }

        .summary-item-price {
            font-weight: 500;
            color: var(--secondary-color);
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            border-top: 2px dashed var(--light-gray);
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .summary-total-label {
            font-weight: 600;
            color: var(--secondary-color);
            font-size: 1.1rem;
        }

        .summary-total-price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.25rem;
        }

        /* Form actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .action-btn {
            padding: 0.85rem 1.5rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-prev {
            background-color: var(--white);
            color: var(--secondary-color);
            border: 1px solid var(--light-gray);
        }

        .btn-prev:hover {
            background-color: var(--off-white);
        }

        .btn-next {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
        }

        .btn-next:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-next:active {
            transform: translateY(0);
        }

        /* Order success */
        .order-success {
            text-align: center;
            padding: 2rem 0;
            display: none;
        }

        .order-success.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 2rem;
        }

        .success-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .success-message {
            font-size: 1.1rem;
            color: var(--dark-gray);
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .order-details {
            background-color: var(--off-white);
            padding: 1.5rem;
            border-radius: var(--radius-lg);
            max-width: 500px;
            margin: 0 auto 2rem;
        }

        .order-details h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .detail-label {
            color: var(--dark-gray);
        }

        .detail-value {
            font-weight: 500;
            color: var(--secondary-color);
        }

        .success-actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }

        .btn-track {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 0.85rem 2rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-track:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-home {
            color: var(--primary-color);
            font-weight: 500;
        }

        .btn-home:hover {
            text-decoration: underline;
        }

        /* Promo code form */
        .promo-form {
            display: flex;
            margin-bottom: 1.5rem;
        }

        .promo-input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md) 0 0 var(--radius-md);
            font-size: 0.95rem;
        }

        .promo-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .promo-btn {
            padding: 0.75rem 1.25rem;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 0 var(--radius-md) var(--radius-md) 0;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .promo-btn:hover {
            background-color: var(--primary-dark);
        }

        /* Payment methods */
        .payment-methods {
            margin-bottom: 1.5rem;
        }

        .payment-method {
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-md);
            padding: 1rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .payment-method:hover {
            border-color: var(--primary-color);
        }

        .payment-method.active {
            border-color: var(--primary-color);
            background-color: var(--primary-bg);
        }

        .payment-icon {
            width: 40px;
            height: 40px;
            background-color: var(--white);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: var(--secondary-color);
        }

        .payment-info {
            flex: 1;
        }

        .payment-name {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .payment-desc {
            font-size: 0.85rem;
            color: var(--dark-gray);
        }

        /* Item list in pressing */
        .items-list {
            margin-bottom: 1.5rem;
        }

        .item-input-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 0.75rem;
            align-items: center;
        }

        .item-input-name {
            flex: 2;
        }

        .item-input-qty {
            flex: 1;
            max-width: 80px;
        }

        .item-input-action {
            padding: 0.5rem;
            color: var(--danger);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-md);
            transition: all 0.3s ease;
        }

        .item-input-action:hover {
            background-color: rgba(239, 68, 68, 0.1);
        }

        .add-item-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-color);
            background-color: var(--primary-bg);
            padding: 0.65rem 1rem;
            border-radius: var(--radius-md);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid var(--primary-color);
            margin-top: 0.5rem;
        }

        .add-item-btn:hover {
            background-color: rgba(0, 188, 53, 0.15);
        }

        /* Mobile styles */
        @media (max-width: 768px) {
            .process-steps {
                flex-direction: column;
                margin-left: 2rem;
                align-items: flex-start;
                gap: 2rem;
            }

            .process-steps::before {
                left: 30px;
                right: auto;
                top: 0;
                bottom: 0;
                width: 2px;
                height: 100%;
            }

            .process-step {
                display: flex;
                align-items: center;
                text-align: left;
                width: 100%;
            }

            .step-number {
                margin: 0 2rem 0 0;
            }

            .form-row {
                flex-direction: column;
            }

            .form-col-6,
            .form-col-4 {
                width: 100%;
                margin-bottom: 1rem;
            }

            .form-actions {
                flex-direction: column;
                gap: 1rem;
            }

            .action-btn {
                width: 100%;
                justify-content: center;
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

    <!-- Conteneur principal -->
    <main class="order-container">
        <div class="container">
            <div class="order-header">
                <h1 class="order-title">Commandez nos services</h1>
                <p class="order-subtitle">Choisissez les services dont vous avez besoin et nous nous occupons du reste.
                </p>
            </div>

            <!-- Processus de commande -->
            <div class="order-process">
                <div class="process-steps">
                    <div class="process-step active" data-step="1">
                        <div class="step-number">1</div>
                        <div>
                            <div class="step-title">Choix du service</div>
                            <div class="step-desc">Sélectionnez le type de service dont vous avez besoin.</div>
                        </div>
                    </div>

                    <div class="process-step" data-step="2">
                        <div class="step-number">2</div>
                        <div>
                            <div class="step-title">Détails</div>
                            <div class="step-desc">Précisez les détails de votre commande.</div>
                        </div>
                    </div>

                    <div class="process-step" data-step="3">
                        <div class="step-number">3</div>
                        <div>
                            <div class="step-title">Livraison</div>
                            <div class="step-desc">Choisissez une date et une adresse.</div>
                        </div>
                    </div>

                    <div class="process-step" data-step="4">
                        <div class="step-number">4</div>
                        <div>
                            <div class="step-title">Paiement</div>
                            <div class="step-desc">Confirmez et payez votre commande.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulaire de commande -->
            <div class="order-form-container" id="orderFormContainer">
                <div class="order-form-header">
                    <h2 class="order-form-title">Nouvelle commande</h2>
                    <p class="order-form-subtitle">Complétez les informations suivantes pour placer votre commande.</p>
                </div>

                @if ($errors->any())
                    <div class="error-alert">
                        <div class="error-title">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M12 3C7.03 3 3 7.03 3 12s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z" />
                            </svg>
                            Erreurs détectées :
                        </div>
                        <ul class="error-list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <div class="order-form-body">
                    <form id="orderForm" method="post" action="{{ route('order-store') }}">
                        @csrf
                        <!-- Étape 1: Choix du service -->
                        <div class="form-step active" data-step="1" id="step1">
                            <div class="step-title-bar">
                                <div class="step-icon">
                                    <i class="fas fa-list"></i>
                                </div>
                                <div class="step-heading">
                                    <h3>Choisissez votre service</h3>
                                    <p>Sélectionnez le type de service dont vous avez besoin</p>
                                </div>
                            </div>

                            <div class="service-types">
                                <div class="service-type active" data-service="pressing">
                                    <div class="service-icon">
                                        <i class="fas fa-tshirt"></i>
                                    </div>
                                    <div class="service-name">Pressing</div>
                                    <div class="service-price">À partir de 50 DH</div>
                                </div>

                                <div class="service-type" data-service="car">
                                    <div class="service-icon">
                                        <i class="fas fa-car"></i>
                                    </div>
                                    <div class="service-name">Lavage Auto</div>
                                    <div class="service-price">À partir de 60 DH</div>
                                </div>

                                <div class="service-type" data-service="pack">
                                    <div class="service-icon">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <div class="service-name">Pack Complet</div>
                                    <div class="service-price">À partir de 150 DH</div>
                                </div>
                                {{-- @foreach ($services as $service)
                                    <div class="service-type" data-service="{{ strtolower($service->category->name) }}">
                                        <div class="service-icon">
                                            <i class="fas {{ $service->icon }}"></i>
                                        </div>
                                        <div class="service-name">{{ $service->category->name }}</div>
                                        <div class="service-price">À partir de {{ $service->price }} DH</div>
                                    </div>
                                @endforeach --}}

                            </div>

                            <div class="form-group">
                                <label class="form-label">Options du service</label>

                                <!-- Options pour Pressing (visible par défaut) -->
                                <div class="service-options" id="pressingOptions">
                                    <div class="service-option">
                                        <input type="radio" id="pressing-standard" name="pressing-type"
                                            class="service-option-input" value="standard" checked>
                                        <label for="pressing-standard" class="service-option-label">
                                            <i class="fas fa-tshirt option-icon"></i>
                                            <span class="option-name">Standard</span>
                                            <span class="option-price">50 DH</span>
                                        </label>
                                    </div>

                                    <div class="service-option">
                                        <input type="radio" id="pressing-express" name="pressing-type"
                                            class="service-option-input" value="express">
                                        <label for="pressing-express" class="service-option-label">
                                            <i class="fas fa-bolt option-icon"></i>
                                            <span class="option-name">Express</span>
                                            <span class="option-price">80 DH</span>
                                        </label>
                                    </div>

                                    <div class="service-option">
                                        <input type="radio" id="pressing-luxe" name="pressing-type"
                                            class="service-option-input" value="luxe">
                                        <label for="pressing-luxe" class="service-option-label">
                                            <i class="fas fa-gem option-icon"></i>
                                            <span class="option-name">Luxe</span>
                                            <span class="option-price">120 DH</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Options pour Lavage Auto (caché par défaut) -->
                                <div class="service-options" id="carOptions" style="display: none;">
                                    <div class="service-option">
                                        <input type="radio" id="car-exterior" name="car-type"
                                            class="service-option-input" value="exterior" checked>
                                        <label for="car-exterior" class="service-option-label">
                                            <i class="fas fa-car-side option-icon"></i>
                                            <span class="option-name">Extérieur</span>
                                            <span class="option-price">80 DH</span>
                                        </label>
                                    </div>

                                    <div class="service-option">
                                        <input type="radio" id="car-interior" name="car-type"
                                            class="service-option-input" value="interior">
                                        <label for="car-interior" class="service-option-label">
                                            <i class="fas fa-couch option-icon"></i>
                                            <span class="option-name">Intérieur</span>
                                            <span class="option-price">100 DH</span>
                                        </label>
                                    </div>

                                    <div class="service-option">
                                        <input type="radio" id="car-complete" name="car-type"
                                            class="service-option-input" value="complete">
                                        <label for="car-complete" class="service-option-label">
                                            <i class="fas fa-car-alt option-icon"></i>
                                            <span class="option-name">Complet</span>
                                            <span class="option-price">150 DH</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Options pour Pack (caché par défaut) -->
                                <div class="service-options" id="packOptions" style="display: none;">
                                    <div class="service-option">
                                        <input type="radio" id="pack-family" name="pack-type"
                                            class="service-option-input" value="family" checked>
                                        <label for="pack-family" class="service-option-label">
                                            <i class="fas fa-users option-icon"></i>
                                            <span class="option-name">Famille</span>
                                            <span class="option-price">150 DH</span>
                                        </label>
                                    </div>

                                    <div class="service-option">
                                        <input type="radio" id="pack-premium" name="pack-type"
                                            class="service-option-input" value="premium">
                                        <label for="pack-premium" class="service-option-label">
                                            <i class="fas fa-crown option-icon"></i>
                                            <span class="option-name">Premium</span>
                                            <span class="option-price">250 DH</span>
                                        </label>
                                    </div>

                                    <div class="service-option">
                                        <input type="radio" id="pack-business" name="pack-type"
                                            class="service-option-input" value="business">
                                        <label for="pack-business" class="service-option-label">
                                            <i class="fas fa-briefcase option-icon"></i>
                                            <span class="option-name">Business</span>
                                            <span class="option-price">200 DH</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="action-btn btn-prev" style="visibility: hidden;">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Précédent</span>
                                </button>

                                @auth
                                    <button type="button" class="action-btn btn-next" id="step1Next">
                                        <span>Suivant</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                                        <span>Se connecter d'abord</span>
                                        <i class="fas fa-arrow-right" style="margin-left: 5px;"></i>
                                    </a>
                                @endauth

                            </div>
                        </div>

                        <!-- Étape 2: Détails de la commande -->
                        <div class="form-step" data-step="2" id="step2">
                            <div class="step-title-bar">
                                <div class="step-icon">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                                <div class="step-heading">
                                    <h3>Détails de la commande</h3>
                                    <p>Précisez les détails spécifiques de votre commande</p>
                                </div>
                            </div>

                            <!-- Détails pour le pressing (visible conditionnellement) -->
                            <div id="pressingDetails">
                                <div class="form-group">
                                    <label class="form-label">Articles à nettoyer</label>
                                    <div class="items-list" id="itemsList">
                                        <div class="item-input-row">
                                            <div class="item-input-name">
                                                <input type="text" class="form-input"
                                                    placeholder="Nom de l'article (ex: Chemise)" name="item-name[]">
                                            </div>
                                            <div class="item-input-qty">
                                                <input type="number" class="form-input" placeholder="Qté"
                                                    min="1" value="1" name="item-qty[]">
                                            </div>
                                            <div class="item-input-action remove-item" style="visibility: hidden;">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="add-item-btn" id="addItemBtn">
                                        <i class="fas fa-plus"></i>
                                        <span>Ajouter un article</span>
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Instructions spéciales</label>
                                    <textarea class="form-input" rows="3"
                                        placeholder="Indiquez toute instruction spéciale pour le traitement de vos vêtements"
                                        name="pressing-instructions"></textarea>
                                </div>
                            </div>

                            <!-- Détails pour le lavage auto (caché par défaut) -->
                            <div id="carDetails" style="display: none;">
                                <div class="form-row">
                                    <div class="form-col">
                                        <div class="form-group">
                                            <label class="form-label">Type de véhicule</label>
                                            <select class="form-input" name="car-type-select">
                                                <option value="city-car">Citadine</option>
                                                <option value="sedan">Berline</option>
                                                <option value="suv">SUV / 4x4</option>
                                                <option value="van">Utilitaire</option>
                                                <option value="luxury">Véhicule de luxe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-col">
                                        <div class="form-group">
                                            <label class="form-label">Marque et modèle</label>
                                            <input type="text" class="form-input" placeholder="Ex: Renault Clio"
                                                name="car-model">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Options supplémentaires</label>
                                    <div class="service-options">
                                        <div class="service-option">
                                            <input type="checkbox" id="option-ceramic" name="car-option[]"
                                                class="service-option-input" value="ceramic">
                                            <label for="option-ceramic" class="service-option-label">
                                                <i class="fas fa-shield-alt option-icon"></i>
                                                <span class="option-name">Protection céramique</span>
                                                <span class="option-price">+100 DH</span>
                                            </label>
                                        </div>

                                        <div class="service-option">
                                            <input type="checkbox" id="option-antibacterial" name="car-option[]"
                                                class="service-option-input" value="antibacterial">
                                            <label for="option-antibacterial" class="service-option-label">
                                                <i class="fas fa-spray-can option-icon"></i>
                                                <span class="option-name">Traitement anti-bactérien</span>
                                                <span class="option-price">+30 DH</span>
                                            </label>
                                        </div>

                                        <div class="service-option">
                                            <input type="checkbox" id="option-wheels" name="car-option[]"
                                                class="service-option-input" value="wheels">
                                            <label for="option-wheels" class="service-option-label">
                                                <i class="fas fa-dharmachakra option-icon"></i>
                                                <span class="option-name">Nettoyage jantes</span>
                                                <span class="option-price">+20 DH</span>
                                            </label>
                                        </div>

                                        <div class="service-option">
                                            <input type="checkbox" id="option-polish" name="car-option[]"
                                                class="service-option-input" value="polish">
                                            <label for="option-polish" class="service-option-label">
                                                <i class="fas fa-brush option-icon"></i>
                                                <span class="option-name">Polissage</span>
                                                <span class="option-price">+50 DH</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Instructions spéciales</label>
                                    <textarea class="form-input" rows="3"
                                        placeholder="Indiquez toute instruction spéciale pour le nettoyage de votre véhicule" name="car-instructions"></textarea>
                                </div>
                            </div>

                            <!-- Détails pour les packs (caché par défaut) -->
                            <div id="packDetails" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label">Contenu du pack</label>
                                    <div id="packContentDisplay">
                                        <div
                                            style="background-color: var(--primary-bg); padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1rem;">
                                            <h4 style="margin-bottom: 0.5rem; color: var(--secondary-color);">Pack
                                                Famille</h4>
                                            <ul
                                                style="margin-bottom: 0; padding-left: 1.5rem; color: var(--dark-gray);">
                                                <li>Pressing standard pour 15 vêtements</li>
                                                <li>Traitement spécial taches enfants</li>
                                                <li>Service de raccommodage basique</li>
                                                <li>Livraison gratuite</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Nombre de personnes dans le foyer</label>
                                    <select class="form-input" name="pack-people">
                                        <option value="1-2">1-2 personnes</option>
                                        <option value="3-4" selected>3-4 personnes</option>
                                        <option value="5+">5+ personnes</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Fréquence souhaitée</label>
                                    <select class="form-input" name="pack-frequency">
                                        <option value="once">Une seule fois</option>
                                        <option value="weekly">Hebdomadaire</option>
                                        <option value="biweekly">Bi-hebdomadaire</option>
                                        <option value="monthly">Mensuelle</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Instructions spéciales</label>
                                    <textarea class="form-input" rows="3" placeholder="Indiquez toute instruction spéciale pour votre pack"
                                        name="pack-instructions"></textarea>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="action-btn btn-prev" id="step2Prev">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Précédent</span>
                                </button>

                                <button type="button" class="action-btn btn-next" id="step2Next">
                                    <span>Suivant</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Étape 3: Date et adresse de livraison -->
                        <div class="form-step" data-step="3" id="step3">
                            <div class="step-title-bar">
                                <div class="step-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="step-heading">
                                    <h3>Programmation et livraison</h3>
                                    <p>Choisissez une date, une heure et une adresse</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Date de collecte</label>
                                <div class="date-time-selection">
                                    <div class="date-selection" id="dateSelection">
                                        <!-- Les dates seront générées dynamiquement par JS -->
                                    </div>

                                    <label class="form-label">Heure de collecte</label>
                                    <div class="time-selection" id="timeSelection">
                                        <!-- Les heures seront générées dynamiquement par JS -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Adresse de collecte et livraison</label>

                                <div class="address-container" id="addressContainer">
                                    <!-- Adresses enregistrées (visible si connecté) -->
                                    <div class="saved-addresses" id="savedAddresses" style="display: none;">
                                        <div class="address-card active">
                                            <input type="radio" name="address" value="address1"
                                                class="address-card-radio" checked>
                                            <div class="address-card-content">
                                                <div class="address-card-title">Domicile</div>
                                                <div class="address-card-line">123 Rue des Fleurs, Apt 4B</div>
                                                <div class="address-card-line">Casablanca, 20000</div>
                                                <div class="address-actions">
                                                    <span class="address-action edit-address">Modifier</span>
                                                    <span class="address-action delete-address">Supprimer</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="address-card">
                                            <input type="radio" name="address" value="address2"
                                                class="address-card-radio">
                                            <div class="address-card-content">
                                                <div class="address-card-title">Bureau</div>
                                                <div class="address-card-line">456 Avenue Mohammed V, 3ème étage</div>
                                                <div class="address-card-line">Casablanca, 20100</div>
                                                <div class="address-actions">
                                                    <span class="address-action edit-address">Modifier</span>
                                                    <span class="address-action delete-address">Supprimer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Formulaire d'adresse (toujours visible) -->
                                    <div id="addressForm">
                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label class="form-label">Nom complet</label>
                                                    <input type="text" class="form-input"
                                                        placeholder="Votre nom complet" name="fullname">
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label class="form-label">Téléphone</label>
                                                    <input type="tel" class="form-input"
                                                        placeholder="Votre numéro de téléphone" name="phone">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Adresse</label>
                                            <input type="text" class="form-input"
                                                placeholder="Rue, numéro, appartement" name="address">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label class="form-label">Ville</label>
                                                    <input type="text" class="form-input" placeholder="Ville"
                                                        name="city">
                                                </div>
                                            </div>
                                            <div class="form-col">
                                                <div class="form-group">
                                                    <label class="form-label">Code postal</label>
                                                    <input type="text" class="form-input"
                                                        placeholder="Code postal" name="zip">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Instructions de livraison</label>
                                            <textarea class="form-input" rows="2" placeholder="Instructions pour le livreur (code d'entrée, étage, etc.)"
                                                name="delivery-instructions"></textarea>
                                        </div>

                                        <div class="form-group" id="saveAddressGroup" style="display: none;">
                                            <div style="display: flex; align-items: center;">
                                                <input type="checkbox" id="saveAddress" name="save-address"
                                                    style="margin-right: 10px;">
                                                <label for="saveAddress">Enregistrer cette adresse pour mes prochaines
                                                    commandes</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="action-btn btn-prev" id="step3Prev">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Précédent</span>
                                </button>

                                <button type="button" class="action-btn btn-next" id="step3Next">
                                    <span>Suivant</span>
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Étape 4: Récapitulatif et paiement -->
                        <div class="form-step" data-step="4" id="step4">
                            <div class="step-title-bar">
                                <div class="step-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="step-heading">
                                    <h3>Récapitulatif et paiement</h3>
                                    <p>Vérifiez votre commande et procédez au paiement</p>
                                </div>
                            </div>

                            <div class="order-summary">
                                <h3 class="summary-title">Récapitulatif de la commande</h3>

                                <div class="summary-list" id="summaryItems">
                                    <!-- Les éléments du récapitulatif seront générés dynamiquement -->
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Code promo</label>
                                    <div class="promo-form">
                                        <input type="text" class="promo-input"
                                            placeholder="Entrez votre code promo" id="promoCode">
                                        <button type="button" class="promo-btn" id="applyPromo">Appliquer</button>
                                    </div>
                                </div>

                                <div class="summary-total">
                                    <div class="summary-total-label">Total</div>
                                    <div class="summary-total-price" id="orderTotal">120 DH</div>
                                    <input type="text" value="" name="total_price" id="TotalPrice">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Méthode de paiement</label>

                                <div class="payment-methods">
                                    <div class="payment-method active">
                                        <input type="radio" name="payment-method" value="card" id="payment-card"
                                            checked style="display: none;">
                                        <div class="payment-icon">
                                            <i class="fas fa-credit-card"></i>
                                        </div>
                                        <div class="payment-info">
                                            <div class="payment-name">Carte bancaire</div>
                                            <div class="payment-desc">Paiement sécurisé par carte bancaire</div>
                                        </div>
                                    </div>

                                    <div class="payment-method">
                                        <input type="radio" name="payment-method" value="cash" id="payment-cash"
                                            style="display: none;">
                                        <div class="payment-icon">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                        <div class="payment-info">
                                            <div class="payment-name">Paiement à la livraison</div>
                                            <div class="payment-desc">Payez en espèces lors de la livraison</div>
                                        </div>
                                    </div>

                                    <div class="payment-method">
                                        <input type="radio" name="payment-method" value="mobile"
                                            id="payment-mobile" style="display: none;">
                                        <div class="payment-icon">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <div class="payment-info">
                                            <div class="payment-name">Paiement mobile</div>
                                            <div class="payment-desc">Payez via votre application bancaire mobile</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="cardPaymentForm">
                                <div class="form-row">
                                    <div class="form-col">
                                        <label class="form-label">Numéro de carte</label>
                                        <div class="input-group">
                                            <i class="fas fa-credit-card input-icon"></i>
                                            <input type="text" class="form-input"
                                                placeholder="1234 5678 9012 3456" name="card-number">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-col">
                                        <label class="form-label">Titulaire de la carte</label>
                                        <input type="text" class="form-input" placeholder="Nom sur la carte"
                                            name="card-name">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-col">
                                        <label class="form-label">Date d'expiration</label>
                                        <input type="text" class="form-input" placeholder="MM/AA"
                                            name="card-expiry">
                                    </div>
                                    <div class="form-col">
                                        <label class="form-label">Code CVC</label>
                                        <input type="text" class="form-input" placeholder="123" name="card-cvc">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div style="display: flex; align-items: flex-start; margin-bottom: 1rem;">
                                    <input type="checkbox" id="termsAgree" name="terms-agree"
                                        style="margin-right: 10px; margin-top: 4px;">
                                    <label for="termsAgree">J'accepte les <a href="#"
                                            style="color: var(--primary-color);">conditions générales</a> et la <a
                                            href="#" style="color: var(--primary-color);">politique de
                                            confidentialité</a>.</label>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="action-btn btn-prev" id="step4Prev">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Précédent</span>
                                </button>

                                <button type="submit" class="action-btn btn-next" id="placeOrderBtn">
                                    <span>Confirmer et payer</span>
                                    <i class="fas fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Message de succès (caché par défaut) -->
            <div class="order-success" id="orderSuccess">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>

                <h2 class="success-title">Commande confirmée !</h2>
                <p class="success-message">Votre commande a été enregistrée avec succès. Nous vous avons envoyé un
                    email de confirmation avec les détails de votre commande.</p>

                <div class="order-details">
                    <h3>Détails de la commande</h3>

                    <div class="detail-row">
                        <div class="detail-label">Numéro de commande :</div>
                        <div class="detail-value" id="confirmOrderId">#ORD-2365</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Service :</div>
                        <div class="detail-value" id="confirmService">Pressing Express</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Date de collecte :</div>
                        <div class="detail-value" id="confirmDate">17 Mai 2023, 10:00 - 12:00</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Montant total :</div>
                        <div class="detail-value" id="confirmAmount">120 DH</div>
                    </div>
                </div>

                <div class="success-actions">
                    <a href="tracking.html" class="btn-track">
                        <i class="fas fa-search-location"></i>
                        <span>Suivre ma commande</span>
                    </a>

                    <a href="index.html" class="btn-home">Retour à l'accueil</a>
                </div>
            </div>

            @if (session('success_data'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById('confirmOrderId').textContent = '#ORD-{{ session('success_data.order_id') }}';
                        document.getElementById('confirmService').textContent =
                            '{{ strtoupper(str_replace('_', ' ', session('success_data.service_type'))) }}';
                        document.getElementById('confirmDate').textContent =
                            '{{ \Carbon\Carbon::parse(session('success_data.scheduled_date'))->format('d M Y') }} ({{ session('success_data.time_slot') }})';
                        document.getElementById('confirmAmount').textContent = '{{ session('success_data.total_price') }} DH';

                        // Show success block
                        document.getElementById('orderSuccess').style.display = 'block';
                    });
                </script>
            @endif

        </div>
    </main>

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

            // Variables pour suivre l'état de la commande
            let selectedService = 'pressing';
            let serviceOptions = {
                pressing: 'standard',
                car: 'exterior',
                pack: 'family'
            };
            let totalPrice = 80; // Prix de départ (pressing standard)

            // Sélection du service
            const serviceTypes = document.querySelectorAll('.service-type');
            const pressingOptions = document.getElementById('pressingOptions');
            const carOptions = document.getElementById('carOptions');
            const packOptions = document.getElementById('packOptions');

            // Détails des services
            const pressingDetails = document.getElementById('pressingDetails');
            const carDetails = document.getElementById('carDetails');
            const packDetails = document.getElementById('packDetails');

            // Gestion des articles de pressing
            const itemsList = document.getElementById('itemsList');
            const addItemBtn = document.getElementById('addItemBtn');

            // Navigation entre les étapes
            const formSteps = document.querySelectorAll('.form-step');
            const processSteps = document.querySelectorAll('.process-step');
            const stepBtns = {
                step1Next: document.getElementById('step1Next'),
                step2Prev: document.getElementById('step2Prev'),
                step2Next: document.getElementById('step2Next'),
                step3Prev: document.getElementById('step3Prev'),
                step3Next: document.getElementById('step3Next'),
                step4Prev: document.getElementById('step4Prev')
            };

            // Éléments de date et heure
            const dateSelection = document.getElementById('dateSelection');
            const timeSelection = document.getElementById('timeSelection');

            // Formulaire de commande et récapitulatif
            const orderForm = document.getElementById('orderForm');
            const orderFormContainer = document.getElementById('orderFormContainer');
            const orderSuccess = document.getElementById('orderSuccess');
            const summaryItems = document.getElementById('summaryItems');
            const orderTotal = document.getElementById('orderTotal');
            const TotalPrice = document.getElementById('TotalPrice');

            // Mise à jour des prix (tarifs plus abordables)
            const priceMap = {
                pressing: {
                    standard: 50,
                    express: 80,
                    luxe: 120
                },
                car: {
                    exterior: 80,
                    interior: 100,
                    complete: 150
                },
                pack: {
                    family: 150,
                    premium: 250,
                    business: 200
                }
            };

            const optionPriceMap = {
                ceramic: 100,
                antibacterial: 30,
                wheels: 20,
                polish: 50
            };

            // Sélectionner un type de service
            serviceTypes.forEach(type => {
                type.addEventListener('click', function() {
                    // Mise à jour de l'UI
                    serviceTypes.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    // Mise à jour de la variable de suivi
                    selectedService = this.getAttribute('data-service');

                    // Afficher les options correspondantes
                    pressingOptions.style.display = selectedService === 'pressing' ? 'grid' :
                        'none';
                    carOptions.style.display = selectedService === 'car' ? 'grid' : 'none';
                    packOptions.style.display = selectedService === 'pack' ? 'grid' : 'none';

                    // Mettre à jour le prix
                    updatePrice();
                });
            });

            // Sélectionner une option de service
            const serviceOptionInputs = document.querySelectorAll('.service-option-input');

            serviceOptionInputs.forEach(input => {
                input.addEventListener('change', function() {
                    if (this.checked) {
                        const serviceType = this.name.split('-')[
                            0]; // pressing-type, car-type, etc.
                        const optionValue = this.value; // standard, express, etc.

                        // Mettre à jour les options sélectionnées
                        if (serviceType === 'pressing') {
                            serviceOptions.pressing = optionValue;
                        } else if (serviceType === 'car') {
                            serviceOptions.car = optionValue;
                        } else if (serviceType === 'pack') {
                            serviceOptions.pack = optionValue;
                            updatePackContent(optionValue);
                        }

                        // Mettre à jour le prix
                        updatePrice();
                    }
                });
            });

            // Fonction pour mettre à jour le contenu du pack
            function updatePackContent(packType) {
                const packContentDisplay = document.getElementById('packContentDisplay');

                let content = '';

                if (packType === 'family') {
                    content = `
                        <div style="background-color: var(--primary-bg); padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1rem;">
                            <h4 style="margin-bottom: 0.5rem; color: var(--secondary-color);">Pack Famille</h4>
                            <ul style="margin-bottom: 0; padding-left: 1.5rem; color: var(--dark-gray);">
                                <li>Pressing standard pour 15 vêtements</li>
                                <li>Traitement spécial taches enfants</li>
                                <li>Service de raccommodage basique</li>
                                <li>Livraison gratuite</li>
                            </ul>
                        </div>
                    `;
                } else if (packType === 'premium') {
                    content = `
                        <div style="background-color: var(--primary-bg); padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1rem;">
                            <h4 style="margin-bottom: 0.5rem; color: var(--secondary-color);">Pack Premium All-In</h4>
                            <ul style="margin-bottom: 0; padding-left: 1.5rem; color: var(--dark-gray);">
                                <li>Pressing Luxe pour 10 vêtements</li>
                                <li>Lavage Auto Complet</li>
                                <li>Service prioritaire express</li>
                                <li>Livraison VIP programmée</li>
                            </ul>
                        </div>
                    `;
                } else if (packType === 'business') {
                    content = `
                        <div style="background-color: var(--primary-bg); padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1rem;">
                            <h4 style="margin-bottom: 0.5rem; color: var(--secondary-color);">Pack Business</h4>
                            <ul style="margin-bottom: 0; padding-left: 1.5rem; color: var(--dark-gray);">
                                <li>Pressing Express pour costumes et tenues professionnelles</li>
                                <li>Service de raccommodage et retouches</li>
                                <li>Traitement anti-froissement longue durée</li>
                                <li>Livraison prioritaire au bureau</li>
                            </ul>
                        </div>
                    `;
                }

                packContentDisplay.innerHTML = content;
            }

            // Fonction pour mettre à jour le prix
            function updatePrice() {
                let basePrice = priceMap[selectedService][serviceOptions[selectedService]];
                totalPrice = basePrice;

                // Ajouter les options pour le lavage auto
                if (selectedService === 'car') {
                    const selectedOptions = document.querySelectorAll('input[name="car-option[]"]:checked');
                    selectedOptions.forEach(option => {
                        totalPrice += optionPriceMap[option.value] || 0;
                    });
                }

                // Mettre à jour l'affichage du prix total
                if (orderTotal) {
                    orderTotal.textContent = `${totalPrice} DH`;
                    TotalPrice.value = totalPrice;
                }

                // Mettre à jour le récapitulatif
                updateSummary();
            }

            // Fonction pour mettre à jour le récapitulatif
            function updateSummary() {
                if (!summaryItems) return;

                let html = '';

                // Service de base
                const serviceNames = {
                    pressing: {
                        standard: 'Pressing Standard',
                        express: 'Pressing Express',
                        luxe: 'Pressing Luxe'
                    },
                    car: {
                        exterior: 'Lavage Auto Extérieur',
                        interior: 'Lavage Auto Intérieur',
                        complete: 'Lavage Auto Complet'
                    },
                    pack: {
                        family: 'Pack Famille',
                        premium: 'Pack Premium All-In',
                        business: 'Pack Business'
                    }
                };

                const serviceName = serviceNames[selectedService][serviceOptions[selectedService]];
                const servicePrice = priceMap[selectedService][serviceOptions[selectedService]];

                html += `
                    <div class="summary-item">
                        <div class="summary-item-name">${serviceName}</div>
                        <div class="summary-item-price">${servicePrice} DH</div>
                    </div>
                `;

                // Options pour le lavage auto
                if (selectedService === 'car') {
                    const selectedOptions = document.querySelectorAll('input[name="car-option[]"]:checked');
                    selectedOptions.forEach(option => {
                        const optionName = option.nextElementSibling.querySelector('.option-name')
                            .textContent;
                        const optionPrice = optionPriceMap[option.value] || 0;

                        html += `
                            <div class="summary-item">
                                <div class="summary-item-name">Option: ${optionName}</div>
                                <div class="summary-item-price">+${optionPrice} DH</div>
                            </div>
                        `;
                    });
                }

                // Frais de livraison
                html += `
                    <div class="summary-item">
                        <div class="summary-item-name">Frais de livraison</div>
                        <div class="summary-item-price">Gratuit</div>
                    </div>
                `;

                summaryItems.innerHTML = html;
            }

            // Ajouter un article de pressing
            if (addItemBtn) {
                addItemBtn.addEventListener('click', function() {
                    const newRow = document.createElement('div');
                    newRow.className = 'item-input-row';
                    newRow.innerHTML = `
                        <div class="item-input-name">
                            <input type="text" class="form-input" placeholder="Nom de l'article (ex: Chemise)" name="item-name[]">
                        </div>
                        <div class="item-input-qty">
                            <input type="number" class="form-input" placeholder="Qté" min="1" value="1" name="item-qty[]">
                        </div>
                        <div class="item-input-action remove-item">
                            <i class="fas fa-times"></i>
                        </div>
                    `;

                    itemsList.appendChild(newRow);

                    // Activer le bouton de suppression
                    newRow.querySelector('.remove-item').addEventListener('click', function() {
                        newRow.remove();
                    });

                    // Rendre visible le premier bouton de suppression s'il y a plus d'un article
                    if (itemsList.children.length > 1) {
                        itemsList.querySelector('.remove-item').style.visibility = 'visible';
                    }
                });
            }

            // Navigation entre les étapes
            function goToStep(stepNumber) {
                formSteps.forEach(step => {
                    step.classList.remove('active');
                });

                processSteps.forEach(step => {
                    step.classList.remove('active');
                    step.classList.remove('completed');

                    const stepNum = parseInt(step.getAttribute('data-step'));

                    if (stepNum < stepNumber) {
                        step.classList.add('completed');
                    } else if (stepNum === stepNumber) {
                        step.classList.add('active');
                    }
                });

                // Activer l'étape correspondante
                const activeStep = document.querySelector(`.form-step[data-step="${stepNumber}"]`);
                if (activeStep) {
                    activeStep.classList.add('active');
                }

                // Afficher les détails correspondants à l'étape 2
                if (stepNumber === 2) {
                    pressingDetails.style.display = selectedService === 'pressing' ? 'block' : 'none';
                    carDetails.style.display = selectedService === 'car' ? 'block' : 'none';
                    packDetails.style.display = selectedService === 'pack' ? 'block' : 'none';
                }

                // Mettre à jour le récapitulatif à l'étape 4
                if (stepNumber === 4) {
                    updateSummary();
                }

                // Scroller en haut
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }


            // Navigation vers l'étape suivante
            if (stepBtns.step1Next) {
                stepBtns.step1Next.addEventListener('click', function() {
                    goToStep(2);
                });
            }

            if (stepBtns.step2Next) {
                stepBtns.step2Next.addEventListener('click', function() {
                    goToStep(3);
                });
            }

            if (stepBtns.step3Next) {
                stepBtns.step3Next.addEventListener('click', function() {
                    goToStep(4);
                });
            }

            // Navigation vers l'étape précédente
            if (stepBtns.step2Prev) {
                stepBtns.step2Prev.addEventListener('click', function() {
                    goToStep(1);
                });
            }

            if (stepBtns.step3Prev) {
                stepBtns.step3Prev.addEventListener('click', function() {
                    goToStep(2);
                });
            }

            if (stepBtns.step4Prev) {
                stepBtns.step4Prev.addEventListener('click', function() {
                    goToStep(3);
                });
            }

            // Générer les dates de collecte (7 jours à partir d'aujourd'hui)
            function generateDates() {
                if (!dateSelection) return;

                const today = new Date();
                let html = '';

                for (let i = 0; i < 7; i++) {
                    const date = new Date(today);
                    date.setDate(today.getDate() + i);

                    const day = date.getDate();
                    const weekday = date.toLocaleDateString('fr-FR', {
                        weekday: 'short'
                    });
                    const month = date.toLocaleDateString('fr-FR', {
                        month: 'short'
                    });

                    // Rendre active la date de demain par défaut
                    const isActive = i === 1 ? 'active' : '';

                    html += `
                        <div class="date-option ${isActive}" data-date="${date.toISOString().split('T')[0]}">
                            <div class="date-day">${day}</div>
                            <div class="date-weekday">${weekday}</div>
                            <div class="date-month">${month}</div>
                        </div>
                    `;
                }

                dateSelection.innerHTML = html;

                // Ajouter les événements de clic
                const dateOptions = document.querySelectorAll('.date-option');
                dateOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        dateOptions.forEach(o => o.classList.remove('active'));
                        this.classList.add('active');
                        generateTimeSlots();
                    });
                });

                generateTimeSlots();
            }

            // Générer les créneaux horaires
            function generateTimeSlots() {
                if (!timeSelection) return;

                const activeDate = document.querySelector('.date-option.active');
                if (!activeDate) return;

                const selectedDate = activeDate.getAttribute('data-date');
                const today = new Date().toISOString().split('T')[0];

                // Créneaux de temps
                const timeSlots = [{
                        time: '08:00 - 10:00',
                        available: true
                    },
                    {
                        time: '10:00 - 12:00',
                        available: true
                    },
                    {
                        time: '12:00 - 14:00',
                        available: true
                    },
                    {
                        time: '14:00 - 16:00',
                        available: true
                    },
                    {
                        time: '16:00 - 18:00',
                        available: selectedDate !== today
                    },
                    {
                        time: '18:00 - 20:00',
                        available: selectedDate !== today
                    }
                ];

                // Si c'est aujourd'hui, rendre indisponibles les créneaux déjà passés
                if (selectedDate === today) {
                    const currentHour = new Date().getHours();
                    timeSlots.forEach((slot, index) => {
                        const slotStartHour = parseInt(slot.time.split(':')[0]);
                        if (slotStartHour <= currentHour + 1) {
                            timeSlots[index].available = false;
                        }
                    });
                }

                let html = '';

                timeSlots.forEach((slot, index) => {
                    const isDisabled = !slot.available ? 'disabled' : '';
                    // Rendre actif le premier créneau disponible
                    let isActive = '';
                    if (!isDisabled && !document.querySelector('.time-option.active')) {
                        isActive = 'active';
                    }

                    html += `
                        <div class="time-option ${isActive} ${isDisabled}" data-time="${slot.time}">
                            <div class="time-value">${slot.time}</div>
                        </div>
                    `;
                });

                timeSelection.innerHTML = html;

                // Ajouter les événements de clic
                const timeOptions = document.querySelectorAll('.time-option:not(.disabled)');
                timeOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        timeOptions.forEach(o => o.classList.remove('active'));
                        this.classList.add('active');
                    });
                });
            }

            // Initialiser les dates et heures
            generateDates();

            // Sélection du mode de paiement
            const paymentMethods = document.querySelectorAll('.payment-method');
            const cardPaymentForm = document.getElementById('cardPaymentForm');

            paymentMethods.forEach(method => {
                method.addEventListener('click', function() {
                    // Sélectionner le radio button
                    const radio = this.querySelector('input[type="radio"]');
                    if (radio) {
                        radio.checked = true;
                    }

                    // Mise à jour de l'UI
                    paymentMethods.forEach(m => m.classList.remove('active'));
                    this.classList.add('active');

                    // Afficher/masquer le formulaire de carte
                    if (cardPaymentForm) {
                        cardPaymentForm.style.display = radio.value === 'card' ? 'block' : 'none';
                    }
                });
            });

            // Traitement du formulaire
            // if (orderForm) {
            //     orderForm.addEventListener('submit', function(e) {
            //         e.preventDefault();

            //         // Valider le formulaire
            //         if (!validateFinalStep()) {
            //             return;
            //         }

            //         // Simuler le traitement de la commande
            //         const placeOrderBtn = document.getElementById('placeOrderBtn');
            //         placeOrderBtn.disabled = true;
            //         placeOrderBtn.innerHTML =
            //             '<span>Traitement en cours...</span><i class="fas fa-spinner fa-spin"></i>';

            //         setTimeout(function() {
            //             // Masquer le formulaire
            //             orderFormContainer.style.display = 'none';

            //             // Mettre à jour les détails de confirmation
            //             const confirmOrderId = document.getElementById('confirmOrderId');
            //             const confirmService = document.getElementById('confirmService');
            //             const confirmDate = document.getElementById('confirmDate');
            //             const confirmAmount = document.getElementById('confirmAmount');

            //             const serviceNames = {
            //                 pressing: {
            //                     standard: 'Pressing Standard',
            //                     express: 'Pressing Express',
            //                     luxe: 'Pressing Luxe'
            //                 },
            //                 car: {
            //                     exterior: 'Lavage Auto Extérieur',
            //                     interior: 'Lavage Auto Intérieur',
            //                     complete: 'Lavage Auto Complet'
            //                 },
            //                 pack: {
            //                     family: 'Pack Famille',
            //                     premium: 'Pack Premium All-In',
            //                     business: 'Pack Business'
            //                 }
            //             };

            //             if (confirmOrderId) confirmOrderId.textContent = '#ORD-' + Math.floor(1000 +
            //                 Math.random() * 9000);
            //             if (confirmService) confirmService.textContent = serviceNames[
            //                 selectedService][serviceOptions[selectedService]];

            //             // Date et heure
            //             const activeDate = document.querySelector('.date-option.active');
            //             const activeTime = document.querySelector('.time-option.active');

            //             if (confirmDate && activeDate && activeTime) {
            //                 const dateStr = activeDate.getAttribute('data-date');
            //                 const timeStr = activeTime.getAttribute('data-time');
            //                 const dateObj = new Date(dateStr);
            //                 const formattedDate = dateObj.toLocaleDateString('fr-FR', {
            //                     day: 'numeric',
            //                     month: 'long',
            //                     year: 'numeric'
            //                 });

            //                 confirmDate.textContent = `${formattedDate}, ${timeStr}`;
            //             }

            //             if (confirmAmount) confirmAmount.textContent = `${totalPrice} DH`;

            //             // Afficher le message de succès
            //             orderSuccess.classList.add('active');

            //             // Scroller vers le haut
            //             window.scrollTo({
            //                 top: 0,
            //                 behavior: 'smooth'
            //             });
            //         }, 2000);
            //     });
            // }

            // Validation du formulaire
            function validateFinalStep() {
                let isValid = true;

                // Vérifier si les termes sont acceptés
                const termsAgree = document.getElementById('termsAgree');
                if (termsAgree && !termsAgree.checked) {
                    alert('Veuillez accepter les conditions générales pour continuer.');
                    isValid = false;
                }

                // Vérifier le formulaire de carte si le paiement par carte est sélectionné
                const paymentCard = document.getElementById('payment-card');
                if (paymentCard && paymentCard.checked) {
                    const cardNumber = document.querySelector('input[name="card-number"]').value;
                    const cardName = document.querySelector('input[name="card-name"]').value;
                    const cardExpiry = document.querySelector('input[name="card-expiry"]').value;
                    const cardCvc = document.querySelector('input[name="card-cvc"]').value;

                    if (!cardNumber || !cardName || !cardExpiry || !cardCvc) {
                        alert('Veuillez remplir tous les champs du formulaire de paiement.');
                        isValid = false;
                    }
                }

                return isValid;
            }

            // Application du code promo
            const promoCodeInput = document.getElementById('promoCode');
            const applyPromoBtn = document.getElementById('applyPromo');

            if (promoCodeInput && applyPromoBtn) {
                applyPromoBtn.addEventListener('click', function() {
                    const promoCode = promoCodeInput.value.trim().toUpperCase();

                    if (promoCode === 'BIENVENUE20') {
                        // Appliquer une réduction de 20%
                        const discount = Math.round(totalPrice * 0.2);
                        totalPrice -= discount;

                        // Mettre à jour l'affichage
                        orderTotal.textContent = `${totalPrice} DH`;

                        // Ajouter la réduction au récapitulatif
                        const discountItem = document.createElement('div');
                        discountItem.className = 'summary-item';
                        discountItem.innerHTML = `
                            <div class="summary-item-name">Remise (BIENVENUE20)</div>
                            <div class="summary-item-price">-${discount} DH</div>
                        `;

                        summaryItems.appendChild(discountItem);

                        // Désactiver le bouton et l'input
                        promoCodeInput.disabled = true;
                        applyPromoBtn.disabled = true;
                        applyPromoBtn.textContent = 'Appliqué';

                        alert('Code promo BIENVENUE20 appliqué avec succès !');
                    } else if (promoCode === 'MENSUEL30') {
                        // Appliquer une réduction de 30%
                        const discount = Math.round(totalPrice * 0.3);
                        totalPrice -= discount;

                        // Mettre à jour l'affichage
                        orderTotal.textContent = `${totalPrice} DH`;

                        // Ajouter la réduction au récapitulatif
                        const discountItem = document.createElement('div');
                        discountItem.className = 'summary-item';
                        discountItem.innerHTML = `
                            <div class="summary-item-name">Remise (MENSUEL30)</div>
                            <div class="summary-item-price">-${discount} DH</div>
                        `;

                        summaryItems.appendChild(discountItem);

                        // Désactiver le bouton et l'input
                        promoCodeInput.disabled = true;
                        applyPromoBtn.disabled = true;
                        applyPromoBtn.textContent = 'Appliqué';

                        alert('Code promo MENSUEL30 appliqué avec succès !');
                    } else {
                        alert('Code promo invalide. Veuillez réessayer.');
                    }
                });
            }

            // Vérifier les paramètres d'URL pour pré-sélectionner un service
            const urlParams = new URLSearchParams(window.location.search);
            const serviceParam = urlParams.get('service');
            const promoParam = urlParams.get('promo');

            if (serviceParam) {
                // Mapping des services depuis les URL vers l'interface
                const serviceMapping = {
                    'standard': {
                        type: 'pressing',
                        option: 'standard'
                    },
                    'express': {
                        type: 'pressing',
                        option: 'express'
                    },
                    'luxe': {
                        type: 'pressing',
                        option: 'luxe'
                    },
                    'car-exterior': {
                        type: 'car',
                        option: 'exterior'
                    },
                    'car-interior': {
                        type: 'car',
                        option: 'interior'
                    },
                    'car-complete': {
                        type: 'car',
                        option: 'complete'
                    },
                    'pack-family': {
                        type: 'pack',
                        option: 'family'
                    },
                    'pack-premium': {
                        type: 'pack',
                        option: 'premium'
                    },
                    'pack-business': {
                        type: 'pack',
                        option: 'business'
                    }
                };

                const mappedService = serviceMapping[serviceParam];

                if (mappedService) {
                    // Sélectionner le type de service
                    serviceTypes.forEach(type => {
                        if (type.getAttribute('data-service') === mappedService.type) {
                            // Simuler un clic sur le type de service
                            type.click();
                        }
                    });

                    // Sélectionner l'option
                    const optionInput = document.getElementById(`${mappedService.type}-${mappedService.option}`);
                    if (optionInput) {
                        optionInput.checked = true;
                        // Déclencher l'événement change
                        const event = new Event('change');
                        optionInput.dispatchEvent(event);
                    }
                }
            }

            // Appliquer un code promo depuis l'URL
            if (promoParam && promoCodeInput && applyPromoBtn) {
                promoCodeInput.value = promoParam;
                setTimeout(() => {
                    applyPromoBtn.click();
                }, 1000);
            }
        });
    </script>
    <!-- Scripts pour les éléments uniformisés -->
    <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
    <script src="{{ asset('assets/js/header-utils.js') }}"></script>
</body>

</html>
