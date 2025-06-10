<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Services | Afrilavage</title>
    <!-- Polices Google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personnalisé -->

    <link rel="stylesheet" href="{{ asset('assets/css/indrive-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer-enhancement.css') }}">
    <style>
        /* Styles spécifiques à la page de services */
        .services-hero {
            padding: 6rem 0 4rem;
            background: var(--gradient-primary);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .services-hero::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .services-hero::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: var(--spacing-md);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: var(--spacing-xl);
            opacity: 0.9;
        }

        .hero-search {
            position: relative;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: none;
            border-radius: var(--radius-full);
            font-size: 1rem;
            box-shadow: var(--shadow-lg);
        }

        .search-input:focus {
            outline: none;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-gray);
        }

        .services-categories {
            background-color: var(--white);
            padding: 2rem 0;
            margin-top: -2rem;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
            position: relative;
            z-index: 2;
        }

        .categories-tabs {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: var(--spacing-md);
        }

        .category-tab {
            padding: 0.75rem 1.5rem;
            background-color: var(--white);
            border: 1px solid var(--light-gray);
            border-radius: var(--radius-full);
            font-weight: 500;
            color: var(--secondary-color);
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }

        .category-tab:hover {
            background-color: var(--primary-bg);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .category-tab.active {
            background-color: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }

        .category-tab i {
            font-size: 1.1rem;
        }

        /* Services list section */
        .services-list {
            padding: 4rem 0;
            background-color: var(--off-white);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: var(--spacing-xl);
        }

        .service-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition-normal);
            position: relative;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .service-image {
            height: 180px;
            background-color: var(--primary-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .service-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.1) 0%, transparent 70%);
        }

        .service-icon {
            font-size: 3rem;
            color: var(--primary-color);
            z-index: 1;
            position: relative;
        }

        .service-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.25rem 0.75rem;
            background-color: var(--white);
            color: var(--primary-color);
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: var(--radius-full);
            z-index: 2;
        }

        .service-content {
            padding: var(--spacing-lg);
        }

        .service-title {
            font-size: 1.25rem;
            margin-bottom: var(--spacing-sm);
            color: var(--secondary-color);
            font-weight: 600;
        }

        .service-description {
            color: var(--dark-gray);
            font-size: 0.95rem;
            margin-bottom: var(--spacing-md);
        }

        .service-features {
            margin-bottom: var(--spacing-md);
        }

        .service-feature {
            display: flex;
            align-items: center;
            margin-bottom: var(--spacing-xs);
            font-size: 0.9rem;
        }

        .service-feature i {
            color: var(--primary-color);
            margin-right: var(--spacing-sm);
            font-size: 0.8rem;
        }

        .service-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: var(--spacing-md);
            border-top: 1px solid var(--light-gray);
        }

        .service-price {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--secondary-color);
        }

        .service-price span {
            font-size: 0.85rem;
            font-weight: 400;
            color: var(--dark-gray);
        }

        .service-action {
            color: var(--primary-color);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: var(--spacing-xs);
            transition: var(--transition-normal);
        }

        .service-action:hover {
            color: var(--primary-dark);
        }

        .service-action i {
            font-size: 0.8rem;
        }

        /* How it works section */
        .how-it-works {
            padding: 4rem 0;
            background-color: var(--white);
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--spacing-xl);
            margin-top: var(--spacing-xl);
        }

        .process-step {
            text-align: center;
            padding: var(--spacing-xl);
            position: relative;
        }

        .process-step::after {
            content: '';
            position: absolute;
            top: 25%;
            right: -30px;
            width: 60px;
            height: 12px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='12' fill='none'%3E%3Cpath d='M0 6h54.5' stroke='%2300BC35' stroke-width='2' stroke-dasharray='3 3'/%3E%3Cpath d='M54 1l5 5-5 5' stroke='%2300BC35' stroke-width='2'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
        }

        .process-step:last-child::after {
            display: none;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto var(--spacing-md);
            position: relative;
        }

        .step-number::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px dashed var(--primary-color);
            border-radius: 50%;
            opacity: 0.3;
        }

        .step-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: var(--spacing-sm);
            color: var(--secondary-color);
        }

        .step-description {
            color: var(--dark-gray);
            font-size: 0.95rem;
        }

        /* Special offers */
        .special-offers {
            padding: 4rem 0;
            background-color: var(--primary-bg);
        }

        .offers-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--spacing-xl);
            margin-top: var(--spacing-xl);
        }

        .offer-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            display: flex;
            flex-direction: column;
        }

        .offer-header {
            padding: var(--spacing-lg) var(--spacing-lg) 0;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .offer-info {
            flex-grow: 1;
        }

        .offer-tag {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background-color: var(--primary-bg);
            color: var(--primary-color);
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: var(--spacing-sm);
        }

        .offer-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: var(--spacing-xs);
            color: var(--secondary-color);
        }

        .offer-subtitle {
            color: var(--dark-gray);
            font-size: 0.9rem;
            margin-bottom: var(--spacing-sm);
        }

        .offer-discount {
            width: 60px;
            height: 60px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            line-height: 1;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .offer-discount span {
            font-size: 0.7rem;
            font-weight: 400;
        }

        .offer-body {
            padding: var(--spacing-lg);
            flex-grow: 1;
        }

        .offer-features {
            margin-bottom: var(--spacing-md);
        }

        .offer-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: var(--spacing-sm);
            font-size: 0.9rem;
        }

        .offer-feature i {
            color: var(--primary-color);
            margin-right: var(--spacing-sm);
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        .offer-cta {
            padding: var(--spacing-lg);
            border-top: 1px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .offer-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }

        .offer-original {
            font-size: 0.95rem;
            font-weight: 400;
            color: var(--dark-gray);
            text-decoration: line-through;
        }

        /* Testimonials */
        .testimonials {
            padding: 4rem 0;
            background-color: var(--white);
        }

        .testimonials-intro {
            max-width: 700px;
            margin: 0 auto var(--spacing-xl);
            text-align: center;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--spacing-xl);
        }

        .testimonial-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            padding: var(--spacing-xl);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--light-gray);
            position: relative;
        }

        .testimonial-quote {
            position: absolute;
            top: -15px;
            left: var(--spacing-lg);
            width: 30px;
            height: 30px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .testimonial-content {
            font-style: italic;
            color: var(--secondary-color);
            margin-bottom: var(--spacing-lg);
            line-height: 1.6;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: var(--spacing-md);
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-bg);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .author-info {
            flex-grow: 1;
        }

        .author-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--secondary-color);
        }

        .author-title {
            font-size: 0.85rem;
            color: var(--dark-gray);
        }

        .testimonial-rating {
            color: #FFB800;
            font-size: 0.9rem;
            display: flex;
            gap: 0.25rem;
        }

        /* FAQ Section in Services */
        .services-faq {
            padding: 4rem 0;
            background-color: var(--off-white);
        }

        /* Mobile styles */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .process-step::after {
                display: none;
            }

            .category-tab {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .offer-header {
                flex-direction: column;
                gap: var(--spacing-md);
            }

            .offer-discount {
                align-self: flex-end;
            }

            .offer-cta {
                flex-direction: column;
                gap: var(--spacing-md);
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    <!-- En-tête -->
    @include('clients.layouts.header')


    <!-- Hero section -->
    <section class="services-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Nos services de qualité sur mesure</h1>
                <p class="hero-subtitle">Découvrez notre gamme complète de services de nettoyage professionnel pour vos
                    vêtements et véhicules.</p>

                <div class="hero-search">
                    <input type="text" class="search-input" placeholder="Rechercher un service...">
                    <i class="fas fa-search search-icon"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Catégories -->
    <section class="services-categories">
        <div class="container">
            {{-- <div class="categories-tabs">
                <div class="category-tab active" data-category="all">
                    <i class="fas fa-th-large"></i>
                    <span>Tous</span>
                </div>
                <div class="category-tab" data-category="pressing">
                    <i class="fas fa-tshirt"></i>
                    <span>Pressing</span>
                </div>
                <div class="category-tab" data-category="car">
                    <i class="fas fa-car"></i>
                    <span>Lavage auto</span>
                </div>
                <div class="category-tab" data-category="express">
                    <i class="fas fa-bolt"></i>
                    <span>Express</span>
                </div>
                <div class="category-tab" data-category="premium">
                    <i class="fas fa-gem"></i>
                    <span>Premium</span>
                </div>
                <div class="category-tab" data-category="pack">
                    <i class="fas fa-box"></i>
                    <span>Packs</span>
                </div>
            </div> --}}
            <div class="categories-tabs">
                {{-- Onglet "Tous" --}}
                <div class="category-tab active" data-category="all">
                    <i class="fas fa-th-large"></i>
                    <span>Tous</span>
                </div>

                {{-- Onglets dynamiques --}}
                @foreach ($categories as $category)
                    <div class="category-tab" data-category="{{ Str::slug($category->name) }}">
                        <i class="{{ $category->icon }}"></i>
                        <span>{{ ucfirst($category->name) }}</span>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Liste des services -->
    <section class="services-list" id="servicesList">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Nos services</div>
                <h2 class="section-title">Solutions de nettoyage professionnelles</h2>
                <p class="section-description">Choisissez parmi notre large gamme de services adaptés à vos besoins
                    spécifiques.</p>
            </div>
            {{--             
            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card" data-category="pressing">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-tshirt"></i>
                        </div>
                        <div class="service-badge">Populaire</div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Pressing Standard</h3>
                        <p class="service-description">Un service de nettoyage professionnel pour tous vos vêtements du
                            quotidien avec livraison en 48h.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Nettoyage et repassage soignés</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Traitement des taches légères</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Emballage protecteur</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Livraison sous 48h</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                50 DH <span>/ 5 vêtements</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'standard']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="service-card" data-category="pressing express">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="service-badge">Express</div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Pressing Express</h3>
                        <p class="service-description">Service prioritaire avec traitement accéléré et livraison en 24h
                            pour les besoins urgents.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Traitement prioritaire</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Nettoyage et repassage premium</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Traitement anti-taches avancé</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Livraison sous 24h</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                80 DH <span>/ 5 vêtements</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'express']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="service-card" data-category="pressing premium">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <div class="service-badge">Premium</div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Pressing Luxe</h3>
                        <p class="service-description">Service haut de gamme pour vos vêtements délicats et de luxe
                            avec traitement personnalisé.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Traitement textile délicat</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Repassage à la main</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Protection anti-UV et anti-mites</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Emballage premium et parfumé</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                120 DH <span>/ 5 vêtements</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'luxe']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="service-card" data-category="car">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Lavage Auto Extérieur</h3>
                        <p class="service-description">Nettoyage complet de l'extérieur de votre véhicule avec produits
                            professionnels.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Lavage carrosserie haute pression</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Nettoyage des jantes et pneus</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Séchage à la microfibre</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Nettoyage des vitres</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                80 DH <span>/ véhicule</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'car-exterior']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="service-card" data-category="car">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Lavage Auto Intérieur</h3>
                        <p class="service-description">Nettoyage profond de l'intérieur de votre véhicule pour un
                            habitacle comme neuf.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Aspiration complète</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Nettoyage tableau de bord et plastiques</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Traitement des sièges et tissus</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Désodorisation de l'habitacle</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                100 DH <span>/ véhicule</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'car-interior']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="service-card" data-category="car premium">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-car-alt"></i>
                        </div>
                        <div class="service-badge">Premium</div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Lavage Auto Complet</h3>
                        <p class="service-description">Combinaison des services extérieur et intérieur pour un
                            nettoyage intégral de votre véhicule.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Tous les services extérieur et intérieur</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Traitement céramique (protection)</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Lustrage et polissage carrosserie</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Traitement cuir et plastiques premium</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                150 DH <span>/ véhicule</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'car-complete']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 7 -->
                <div class="service-card" data-category="pack">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="service-badge">Économique</div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Pack Famille</h3>
                        <p class="service-description">Solution économique pour les familles avec une grande quantité
                            de vêtements.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Pressing standard pour 15 vêtements</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Traitement spécial taches enfants</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Service de raccommodage basique</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Livraison gratuite</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                150 DH <span>/ pack</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'pack-family']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 8 -->
                <div class="service-card" data-category="pack premium express">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="service-badge">Tout inclus</div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Pack Premium All-In</h3>
                        <p class="service-description">Notre service le plus complet combinant pressing et lavage auto
                            avec traitement premium.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Pressing Luxe pour 10 vêtements</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Lavage Auto Complet</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Service prioritaire express</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Livraison VIP programmée</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                250 DH <span>/ pack</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'pack-premium']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 9 -->
                <div class="service-card" data-category="pressing">
                    <div class="service-image">
                        <div class="service-icon">
                            <i class="fas fa-socks"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Pressing Spécifique</h3>
                        <p class="service-description">Services spécialisés pour types de vêtements spécifiques
                            nécessitant un traitement particulier.</p>

                        <div class="service-features">
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Vêtements en soie et cachemire</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Uniformes et tenues professionnelles</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Rideaux et textiles d'ameublement</span>
                            </div>
                            <div class="service-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Tenues de cérémonie</span>
                            </div>
                        </div>

                        <div class="service-footer">
                            <div class="service-price">
                                Dès 40 DH <span>/ pièce</span>
                            </div>
                            <a href="{{ route('order', ['service' => 'specific']) }}" class="service-action">
                                <span>Commander</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="services-grid">
                @foreach ($services as $service)
                    <div class="service-card" data-category="{{ $service->category }}">
                        <div class="service-image">
                            <div class="service-icon">
                                <i class="{{ $service->icon ?? 'fas fa-cogs' }}"></i>
                            </div>
                            @if ($service->badge)
                                <div class="service-badge">{{ $service->badge }}</div>
                            @endif
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">{{ $service->titre }}</h3>
                            <p class="service-description">{{ $service->description }}</p>

                            @if (!empty($service->features) && is_array($service->features))
                                <div class="service-features">
                                    @foreach ($service->features as $feature)
                                        <div class="service-feature">
                                            <i class="fas fa-check-circle"></i>
                                            <span>{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="service-footer">
                                <div class="service-price">
                                    {{ $service->price }} DH <span>/ {{ $service->unit }}</span>
                                </div>
                                <a href="{{ route('order', ['service' => $service->route]) }}" class="service-action">
                                    <span>Commander</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>

    <!-- Comment ça marche -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Processus simple</div>
                <h2 class="section-title">Comment ça marche</h2>
                <p class="section-description">Découvrez comment notre service fonctionne en 4 étapes simples.</p>
            </div>

            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Commandez en ligne</h3>
                    <p class="step-description">Choisissez votre service, planifiez une date et heure de collecte qui
                        vous convient.</p>
                </div>

                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Collecte à domicile</h3>
                    <p class="step-description">Notre équipe vient récupérer vos vêtements ou votre véhicule à
                        l'adresse indiquée.</p>
                </div>

                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Traitement professionnel</h3>
                    <p class="step-description">Nos experts traitent votre commande selon le service choisi avec un
                        soin méticuleux.</p>
                </div>

                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Livraison</h3>
                    <p class="step-description">Nous vous livrons vos articles propres et parfaitement traités à
                        l'heure convenue.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Offres spéciales -->
    <section class="special-offers">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Économisez plus</div>
                <h2 class="section-title">Offres spéciales</h2>
                <p class="section-description">Profitez de nos promotions et offres limitées pour économiser sur vos
                    commandes.</p>
            </div>

            <div class="offers-container">
                <div class="offer-card">
                    <div class="offer-header">
                        <div class="offer-info">
                            <div class="offer-tag">Nouveaux clients</div>
                            <h3 class="offer-title">Offre de bienvenue</h3>
                            <p class="offer-subtitle">Pour votre première commande</p>
                        </div>
                        <div class="offer-discount">
                            20% <span>OFF</span>
                        </div>
                    </div>

                    <div class="offer-body">
                        <div class="offer-features">
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>Valable sur tous nos services pressing et lavage auto</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>Applicable à votre première commande uniquement</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>Aucun minimum d'achat requis</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-info-circle"></i>
                                <div>Utilisez le code <strong>BIENVENUE20</strong> lors de votre commande</div>
                            </div>
                        </div>
                    </div>

                    <div class="offer-cta">
                        <div class="offer-price">
                            <span class="offer-original">250 DH</span>
                            200 DH
                        </div>
                        <a href="{{ route('order', ['promo' => 'BIENVENUE20']) }}" class="btn btn-primary">Profiter
                            de l'offre</a>
                    </div>
                </div>

                <div class="offer-card">
                    <div class="offer-header">
                        <div class="offer-info">
                            <div class="offer-tag">Offre limitée</div>
                            <h3 class="offer-title">Pack Mensuel</h3>
                            <p class="offer-subtitle">Service régulier économique</p>
                        </div>
                        <div class="offer-discount">
                            30% <span>OFF</span>
                        </div>
                    </div>

                    <div class="offer-body">
                        <div class="offer-features">
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>4 services pressing standard (20 vêtements) par mois</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>1 lavage auto extérieur par mois</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>Collecte et livraison gratuites</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>Engagement minimum de 3 mois</div>
                            </div>
                        </div>
                    </div>

                    <div class="offer-cta">
                        <div class="offer-price">
                            <span class="offer-original">500 DH</span>
                            350 DH
                        </div>
                        <a href="{{ route('order', ['promo' => 'MENSUEL30']) }}"
                            class="btn btn-primary">S'abonner</a>
                    </div>
                </div>

                <div class="offer-card">
                    <div class="offer-header">
                        <div class="offer-info">
                            <div class="offer-tag">Premium</div>
                            <h3 class="offer-title">Forfait Famille VIP</h3>
                            <p class="offer-subtitle">Solution complète pour familles</p>
                        </div>
                        <div class="offer-discount">
                            25% <span>OFF</span>
                        </div>
                    </div>

                    <div class="offer-body">
                        <div class="offer-features">
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>Pressing pour 30 vêtements par mois</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>2 lavages auto complets par mois</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>Service de raccommodage et retouches inclus</div>
                            </div>
                            <div class="offer-feature">
                                <i class="fas fa-check-circle"></i>
                                <div>Assistant personnel dédié</div>
                            </div>
                        </div>
                    </div>

                    <div class="offer-cta">
                        <div class="offer-price">
                            <span class="offer-original">800 DH</span>
                            600 DH
                        </div>
                        <a href="{{ route('order', ['promo' => 'FAMILLYVIP']) }}"
                            class="btn btn-primary">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="testimonials">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Avis clients</div>
                <h2 class="section-title">Ce que nos clients disent de nous</h2>
            </div>

            <div class="testimonials-intro">
                <p>Nous sommes fiers de la satisfaction de nos clients. Découvrez leurs témoignages authentiques sur nos
                    services de pressing et lavage auto.</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <p class="testimonial-content">Afrilavage a révolutionné ma routine de nettoyage. Le service de
                        collecte et livraison est ponctuel, et la qualité du pressing est irréprochable. Mes vêtements
                        n'ont jamais été aussi bien entretenus !</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SM</div>
                        <div class="author-info">
                            <div class="author-name">Samir M.</div>
                            <div class="author-title">Client depuis 2 ans</div>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <p class="testimonial-content">Le Pack Premium a été un investissement judicieux pour ma famille.
                        Nous économisons du temps et de l'argent, et nos vêtements comme notre voiture sont toujours
                        impeccables. Le service client est également excellent !</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">LB</div>
                        <div class="author-info">
                            <div class="author-name">Laila B.</div>
                            <div class="author-title">Cliente régulière</div>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <p class="testimonial-content">J'utilise le service de lavage auto premium et je suis toujours
                        bluffé par la qualité du travail. Ma voiture ressort comme neuve à chaque fois, avec une
                        attention aux détails exceptionnelle. Service hautement recommandé !</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">KA</div>
                        <div class="author-info">
                            <div class="author-name">Karim A.</div>
                            <div class="author-title">Client VIP</div>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Services -->
    <section class="services-faq">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Questions fréquentes</div>
                <h2 class="section-title">FAQ sur nos services</h2>
                <p class="section-description">Trouvez des réponses aux questions les plus courantes concernant nos
                    services.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item active">
                    <div class="faq-question">
                        <span>Quels types de vêtements acceptez-vous pour le pressing ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nous acceptons tous types de vêtements, des articles quotidiens (chemises, pantalons, robes)
                            aux pièces délicates (soie, cachemire, laine). Notre équipe est formée pour traiter chaque
                            type de textile avec les produits et techniques appropriés. Pour les articles très
                            spécifiques ou de grande valeur, nous recommandons notre service Pressing Luxe qui offre un
                            traitement personnalisé.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Comment fonctionne la collecte et la livraison ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Notre service de collecte et livraison est disponible dans toutes les grandes villes du
                            Maroc. Lors de votre commande, vous choisissez une plage horaire pour la collecte. Notre
                            livreur se présente à l'adresse indiquée, récupère vos articles, et les apporte à notre
                            centre de traitement. Une fois le service terminé, nous vous livrons vos articles à
                            l'adresse et l'horaire de votre choix. Vous pouvez suivre l'état de votre commande en temps
                            réel via notre application ou site web.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Quelles sont les différences entre vos services de lavage auto ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nous proposons trois niveaux de service pour le lavage auto :</p>
                        <ul>
                            <li><strong>Lavage Extérieur</strong> : nettoyage complet de la carrosserie, jantes, vitres
                                et séchage professionnel.</li>
                            <li><strong>Lavage Intérieur</strong> : aspiration, nettoyage des surfaces intérieures,
                                traitement des sièges et désodorisation.</li>
                            <li><strong>Lavage Complet</strong> : combine les deux services précédents avec des
                                prestations premium comme la protection céramique et le traitement des cuirs.</li>
                        </ul>
                        <p>Le choix dépend de vos besoins spécifiques et de l'état de votre véhicule.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Comment fonctionnent les abonnements et packs ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nos abonnements et packs sont conçus pour offrir des économies substantielles aux clients
                            réguliers. En souscrivant à un abonnement, vous prépayez un certain nombre de services à
                            utiliser sur une période déterminée. Les avantages incluent des tarifs préférentiels, des
                            services prioritaires et des prestations exclusives.</p>
                        <p>Par exemple, le Pack Mensuel vous permet d'avoir 4 services de pressing et 1 lavage auto par
                            mois à un prix réduit de 30%. Vous pouvez programmer vos collectes selon votre convenance,
                            et le forfait est automatiquement renouvelé chaque mois.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Quels produits utilisez-vous pour le nettoyage ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nous utilisons uniquement des produits professionnels de haute qualité, respectueux de
                            l'environnement et hypoallergéniques. Pour le pressing, nous sélectionnons des détergents
                            adaptés à chaque type de tissu pour garantir un nettoyage efficace sans endommager les
                            fibres.</p>
                        <p>Pour le lavage auto, nos produits sont sans silicone et sans produits corrosifs, ce qui
                            protège la peinture et les surfaces de votre véhicule. Notre gamme Premium utilise des
                            produits biodégradables et écologiques qui offrent une protection longue durée.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-container">
                <h2 class="cta-title">Prêt à essayer nos services premium ?</h2>
                <p class="cta-description">Rejoignez les milliers de clients satisfaits et découvrez pourquoi
                    Afrilavage est le choix numéro un au Maroc pour les services de nettoyage de qualité.</p>
                <div class="cta-buttons">
                    <a href="{{ route('order') }}" class="btn btn-white btn-lg">Commander maintenant</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-white btn-lg">Nous contacter</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-logo">
                    <span>Afri</span>lavage
                </div>
                <div class="footer-social">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-content">
                <div class="footer-col">
                    <h3 class="footer-title">Services</h3>
                    <ul class="footer-links">
                        <li><a href="services.html">Pressing</a></li>
                        <li><a href="services.html">Lavage Auto</a></li>
                        <li><a href="services.html">Services Express</a></li>
                        <li><a href="services.html">Offres Premium</a></li>
                        <li><a href="services.html">Packs & Abonnements</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3 class="footer-title">Entreprise</h3>
                    <ul class="footer-links">
                        <li><a href="about.html">À propos</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Carrières</a></li>
                        <li><a href="#">Partenaires</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3 class="footer-title">Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">Centre d'aide</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Conditions d'utilisation</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Livraison & Retours</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3 class="footer-title">Contact</h3>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Avenue Mohammed V, Casablanca</li>
                        <li><i class="fas fa-phone-alt"></i> +212 522 123 456</li>
                        <li><i class="fas fa-envelope"></i> contact@afrilavage.com</li>
                    </ul>
                    <div class="footer-app">
                        <p>Téléchargez notre application</p>
                        <div class="app-buttons">
                            <a href="#" class="app-button">
                                <i class="fab fa-apple"></i>
                                <span>App Store</span>
                            </a>
                            <a href="#" class="app-button">
                                <i class="fab fa-google-play"></i>
                                <span>Google Play</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2023 Afrilavage. Tous droits réservés.</p>
                <div class="footer-payment">
                    <span>Paiements sécurisés</span>
                    <div class="payment-icons">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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

            // Tabs de catégories
            const categoryTabs = document.querySelectorAll('.category-tab');
            const serviceCards = document.querySelectorAll('.service-card');

            categoryTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');

                    // Activer l'onglet cliqué
                    categoryTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    // Filtrer les services
                    serviceCards.forEach(card => {
                        const cardCategories = card.getAttribute('data-category');

                        if (category === 'all' || cardCategories.includes(category)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });

            // Recherche de services
            const searchInput = document.querySelector('.search-input');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();

                    serviceCards.forEach(card => {
                        const title = card.querySelector('.service-title').textContent
                            .toLowerCase();
                        const description = card.querySelector('.service-description').textContent
                            .toLowerCase();
                        const features = card.querySelector('.service-features').textContent
                            .toLowerCase();

                        if (title.includes(searchTerm) || description.includes(searchTerm) ||
                            features.includes(searchTerm)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    // Réinitialiser les onglets de catégorie
                    categoryTabs.forEach(tab => tab.classList.remove('active'));
                    document.querySelector('[data-category="all"]').classList.add('active');
                });
            }

            // Accordéon FAQ
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');

                question.addEventListener('click', function() {
                    const isActive = item.classList.contains('active');

                    // Fermer tous les autres éléments
                    faqItems.forEach(faq => {
                        faq.classList.remove('active');
                    });

                    // Ouvrir l'élément cliqué s'il n'était pas déjà ouvert
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
        });
    </script>

    <!-- Scripts pour les éléments uniformisés -->
    <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
    <script src="{{ asset('assets/js/header-utils.js') }}"></script>
</body>

</html>
