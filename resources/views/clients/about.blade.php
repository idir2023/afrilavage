<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos | Afrilavage</title>
    <!-- Polices Google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('assets/css/indrive-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer-enhancement.css') }}">
    <style>
        /* Styles spécifiques à la page À propos */
        .about-hero {
            padding: 8rem 0 6rem;
            background: var(--gradient-primary);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .about-hero::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .about-hero::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .about-hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .about-hero-subtitle {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .about-hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .about-hero-description {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .about-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex-wrap: wrap;
            margin-top: 3rem;
        }

        .about-stat {
            text-align: center;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Mission & Vision */
        .mission-vision {
            padding: 5rem 0;
            background-color: var(--white);
            position: relative;
        }

        .mission-vision-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .mission-card,
        .vision-card {
            padding: 3rem 2rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .mission-card:hover,
        .vision-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .mission-card {
            background-color: var(--white);
            border: 1px solid var(--primary-color);
        }

        .vision-card {
            background-color: var(--primary-bg);
        }

        .card-icon {
            width: 80px;
            height: 80px;
            background-color: var(--primary-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--primary-color);
            margin: 0 auto 1.5rem;
        }

        .vision-card .card-icon {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .card-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
        }

        .card-description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--dark-gray);
            margin-bottom: 1.5rem;
        }

        .card-decoration {
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: rgba(0, 188, 53, 0.05);
            z-index: 0;
        }

        .card-decoration-1 {
            top: -50px;
            right: -50px;
        }

        .card-decoration-2 {
            bottom: -50px;
            left: -50px;
        }

        /* Histoire */
        .about-history {
            padding: 6rem 0;
            background-color: var(--off-white);
            position: relative;
        }

        .history-title-container {
            text-align: center;
            margin-bottom: 4rem;
        }

        .history-subtitle {
            font-size: 1.1rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .history-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .history-description {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .timeline {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: var(--primary-color);
            left: 50%;
            transform: translateX(-50%);
        }

        .timeline-item {
            padding: 20px 0;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item:nth-child(odd) {
            padding-right: 40px;
            text-align: right;
            left: 0;
        }

        .timeline-item:nth-child(even) {
            padding-left: 40px;
            left: 50%;
            text-align: left;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: var(--white);
            border: 4px solid var(--primary-color);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .timeline-item:nth-child(odd)::before {
            right: -14px;
        }

        .timeline-item:nth-child(even)::before {
            left: -14px;
        }

        .timeline-year {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .timeline-content {
            background-color: var(--white);
            padding: 1.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            position: relative;
        }

        .timeline-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.75rem;
        }

        .timeline-text {
            font-size: 1rem;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* Équipe */
        .about-team {
            padding: 6rem 0;
            background-color: var(--white);
            position: relative;
        }

        .team-title-container {
            text-align: center;
            margin-bottom: 4rem;
        }

        .team-subtitle {
            font-size: 1.1rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .team-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .team-description {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .team-member {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-md);
        }

        .member-image {
            width: 100%;
            height: 250px;
            background-color: var(--primary-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--primary-color);
        }

        .member-info {
            padding: 1.5rem;
            text-align: center;
        }

        .member-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .member-position {
            font-size: 0.9rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .member-bio {
            font-size: 0.95rem;
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .member-social {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .member-social a {
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

        .member-social a:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* Valeurs */
        .about-values {
            padding: 6rem 0;
            background-color: var(--off-white);
            position: relative;
        }

        .values-title-container {
            text-align: center;
            margin-bottom: 4rem;
        }

        .values-subtitle {
            font-size: 1.1rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .values-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .values-description {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .value-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 2rem;
            transition: all 0.3s ease;
            border-top: 4px solid var(--primary-color);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .value-icon {
            width: 60px;
            height: 60px;
            background-color: var(--primary-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .value-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .value-description {
            font-size: 1rem;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* Témoignages */
        .about-testimonials {
            padding: 6rem 0;
            background-color: var(--white);
            position: relative;
        }

        .testimonials-title-container {
            text-align: center;
            margin-bottom: 4rem;
        }

        .testimonials-subtitle {
            font-size: 1.1rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .testimonials-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .testimonials-description {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .testimonial-slider {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            padding: 0 50px;
        }

        .testimonial-slide {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 3rem;
            margin: 1rem;
            position: relative;
        }

        .testimonial-quote {
            font-size: 1.25rem;
            color: var(--secondary-color);
            line-height: 1.6;
            margin-bottom: 2rem;
            font-style: italic;
            position: relative;
        }

        .testimonial-quote::before {
            content: '\201C';
            font-size: 4rem;
            color: var(--primary-color);
            opacity: 0.2;
            position: absolute;
            top: -20px;
            left: -20px;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--primary-bg);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .author-info {
            flex-grow: 1;
        }

        .author-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .author-title {
            font-size: 0.9rem;
            color: var(--dark-gray);
        }

        .author-rating {
            display: flex;
            gap: 0.25rem;
            color: #FFB800;
            margin-top: 0.5rem;
        }

        .slide-navigation {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .slide-nav-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--white);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid var(--primary-color);
        }

        .slide-nav-btn:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /* Partenaires */
        .about-partners {
            padding: 6rem 0;
            background-color: var(--off-white);
            position: relative;
        }

        .partners-title-container {
            text-align: center;
            margin-bottom: 4rem;
        }

        .partners-subtitle {
            font-size: 1.1rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .partners-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }

        .partners-description {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .partner-card {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 150px;
        }

        .partner-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .partner-logo {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .partner-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--secondary-color);
        }

        /* CTA */
        .about-cta {
            padding: 6rem 0;
            background-color: var(--white);
            position: relative;
        }

        .cta-container {
            max-width: 1000px;
            margin: 0 auto;
            background: var(--gradient-primary);
            padding: 4rem;
            border-radius: var(--radius-lg);
            color: var(--white);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-container::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .cta-container::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .cta-description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            position: relative;
            z-index: 1;
            flex-wrap: wrap;
        }

        .cta-btn {
            padding: 0.85rem 2rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .cta-btn-primary {
            background-color: var(--white);
            color: var(--primary-color);
            border: none;
        }

        .cta-btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .cta-btn-secondary {
            background-color: transparent;
            color: var(--white);
            border: 2px solid var(--white);
        }

        .cta-btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .about-hero-title {
                font-size: 2.5rem;
            }

            .about-stats {
                gap: 2rem;
            }

            .timeline::before {
                left: 0;
            }

            .timeline-item {
                width: 100%;
                padding-left: 30px;
                padding-right: 0;
                text-align: left;
                left: 0;
            }

            .timeline-item:nth-child(even) {
                left: 0;
            }

            .timeline-item::before,
            .timeline-item:nth-child(even)::before {
                left: -9px;
            }

            .testimonial-slide {
                padding: 2rem;
            }

            .cta-container {
                padding: 3rem 2rem;
            }
        }

        @media (max-width: 768px) {
            .about-hero-title {
                font-size: 2rem;
            }

            .about-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .mission-vision-container {
                gap: 2rem;
            }

            .testimonial-slide {
                padding: 1.5rem;
            }

            .testimonial-quote {
                font-size: 1.1rem;
            }

            .cta-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- En-tête -->
     @include('clients.layouts.header')

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <div class="about-hero-content">
                <div class="about-hero-subtitle">Notre histoire</div>
                <h1 class="about-hero-title">Une startup innovante née de la passion de jeunes entrepreneurs</h1>
                <p class="about-hero-description">Afrilavage est une startup fondée par des auto-entrepreneurs et des
                    étudiants passionnés basés au Maroc. Pour exercer légalement à l'international, nous avons créé une
                    LLC aux États-Unis et travaillons actuellement à l'établissement d'une SARL pour consolider notre
                    activité localement.</p>

                <div class="about-stats">
                    <div class="about-stat">
                        <div class="stat-value">2</div>
                        <div class="stat-label">Pays d'opération</div>
                    </div>
                    <div class="about-stat">
                        <div class="stat-value">Maroc</div>
                        <div class="stat-label">Base d'opération</div>
                    </div>
                    <div class="about-stat">
                        <div class="stat-value">USA LLC</div>
                        <div class="stat-label">Structure légale</div>
                    </div>
                    <div class="about-stat">
                        <div class="stat-value">SARL</div>
                        <div class="stat-label">En cours de création</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="mission-vision">
        <div class="container">
            <div class="mission-vision-container">
                <div class="mission-card">
                    <div class="card-decoration card-decoration-1"></div>
                    <div class="card-decoration card-decoration-2"></div>

                    <div class="card-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>

                    <h2 class="card-title">Notre mission</h2>

                    <p class="card-description">En tant que jeunes entrepreneurs passionnés, notre mission est de
                        révolutionner l'industrie du nettoyage au Maroc en apportant innovation, accessibilité et
                        excellence. Nous combinons l'agilité entrepreneuriale avec une structure légale internationale
                        pour servir nos clients de manière optimale.</p>

                    <ul style="text-align: left; color: var(--dark-gray); line-height: 1.6;">
                        <li>Démocratiser l'accès aux services de nettoyage de qualité</li>
                        <li>Innover constamment grâce à notre mentalité startup</li>
                        <li>Créer des opportunités d'emploi pour les jeunes Marocains</li>
                        <li>Construire une entreprise socialement responsable et durable</li>
                    </ul>
                </div>

                <div class="vision-card">
                    <div class="card-decoration card-decoration-1"></div>
                    <div class="card-decoration card-decoration-2"></div>

                    <div class="card-icon">
                        <i class="fas fa-eye"></i>
                    </div>

                    <h2 class="card-title">Notre vision</h2>

                    <p class="card-description">Construire une entreprise de nettoyage moderne et internationale, ancrée
                        au Maroc mais capable d'opérer à l'échelle globale. Notre double structure légale (LLC USA et
                        future SARL Maroc) nous permet de grandir sereinement tout en restant fidèles à nos racines
                        entrepreneuriales.</p>

                    <ul style="text-align: left; color: var(--dark-gray); line-height: 1.6;">
                        <li>Développer une plateforme technologique de pointe</li>
                        <li>Créer un modèle d'entreprise reproductible internationalement</li>
                        <li>Inspirer d'autres jeunes entrepreneurs africains</li>
                        <li>Établir des partenariats stratégiques internationaux</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Histoire -->
    <section class="about-history">
        <div class="container">
            <div class="history-title-container">
                <div class="history-subtitle">Notre parcours entrepreneurial</div>
                <h2 class="history-title">De l'idée à la réalité internationale</h2>
                <p class="history-description">L'aventure Afrilavage a commencé avec l'ambition de jeunes entrepreneurs
                    marocains déterminés à créer quelque chose d'impactant. Voici les étapes clés de notre
                    développement.</p>
            </div>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-year">2023</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">L'idée entrepreneuriale</h3>
                        <p class="timeline-text">Conception du projet Afrilavage par une équipe d'auto-entrepreneurs et
                            d'étudiants marocains passionnés, identifiant une opportunité dans le secteur des services
                            de nettoyage.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2024</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Développement et structuration</h3>
                        <p class="timeline-text">Phase de développement intensif de la plateforme, étude de marché
                            approfondie et préparation des bases légales pour l'entreprise.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2024</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Création de la LLC aux USA</h3>
                        <p class="timeline-text">Établissement officiel d'Afrilavage LLC aux États-Unis pour permettre
                            les opérations internationales et faciliter les partenariats globaux.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2025</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Lancement de la plateforme</h3>
                        <p class="timeline-text">Mise en ligne officielle de la plateforme Afrilavage avec des
                            fonctionnalités complètes de commande, suivi et gestion des services de nettoyage.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2025</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Démarches pour la SARL Maroc</h3>
                        <p class="timeline-text">Processus en cours pour l'établissement d'une SARL au Maroc afin de
                            consolider notre présence locale et optimiser nos opérations nationales.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">Futur</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Expansion et croissance</h3>
                        <p class="timeline-text">Plans d'expansion des services, développement de partenariats
                            stratégiques et croissance de l'équipe pour servir un plus grand nombre de clients.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Équipe -->
    <section class="about-team">
        <div class="container">
            <div class="team-title-container">
                <div class="team-subtitle">Notre équipe</div>
                <h2 class="team-title">Les experts derrière Afrilavage</h2>
                <p class="team-description">Découvrez les visages qui font d'Afrilavage ce qu'elle est aujourd'hui. Une
                    équipe passionnée, dévouée et experte qui travaille sans relâche pour vous offrir le meilleur
                    service.</p>
            </div>

            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="member-info">
                        <h3 class="member-name">Mohammed Alami</h3>
                        <div class="member-position">Fondateur & PDG</div>
                        <p class="member-bio">Fort de 20 ans d'expérience dans l'industrie du service, Mohammed a fondé
                            Afrilavage avec la vision de révolutionner le secteur du nettoyage au Maroc.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="member-info">
                        <h3 class="member-name">Samira Benali</h3>
                        <div class="member-position">Directrice des Opérations</div>
                        <p class="member-bio">Avec son expertise en optimisation des processus, Samira veille à ce que
                            chaque commande soit traitée avec la plus grande attention et dans les délais impartis.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="member-info">
                        <h3 class="member-name">Karim Tazi</h3>
                        <div class="member-position">Directeur Technique</div>
                        <p class="member-bio">Ingénieur de formation, Karim est le cerveau derrière notre plateforme
                            technologique et nos innovations qui facilitent l'expérience client.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="member-info">
                        <h3 class="member-name">Leila Mansouri</h3>
                        <div class="member-position">Responsable Service Client</div>
                        <p class="member-bio">Passionnée par l'excellence du service client, Leila s'assure que chaque
                            interaction avec Afrilavage soit une expérience positive et mémorable.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Valeurs -->
    <section class="about-values">
        <div class="container">
            <div class="values-title-container">
                <div class="values-subtitle">Nos valeurs</div>
                <h2 class="values-title">Les principes qui nous guident</h2>
                <p class="values-description">Chez Afrilavage, nos valeurs sont au cœur de tout ce que nous faisons.
                    Elles définissent notre culture d'entreprise et guident nos décisions au quotidien.</p>
            </div>

            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="value-title">Excellence</h3>
                    <p class="value-description">Nous visons l'excellence dans chaque aspect de notre service, de la
                        qualité du nettoyage à l'expérience client, en passant par notre plateforme technologique.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="value-title">Passion</h3>
                    <p class="value-description">Nous sommes passionnés par ce que nous faisons et nous mettons tout
                        notre cœur dans chaque commande pour assurer la satisfaction de nos clients.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="value-title">Intégrité</h3>
                    <p class="value-description">Nous agissons avec honnêteté, transparence et éthique dans toutes nos
                        relations avec nos clients, employés, partenaires et la communauté.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="value-title">Innovation</h3>
                    <p class="value-description">Nous cherchons constamment à innover et à améliorer nos services, en
                        adoptant les dernières technologies et en développant de nouvelles solutions.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="value-title">Communauté</h3>
                    <p class="value-description">Nous valorisons notre communauté et nous nous engageons à avoir un
                        impact positif sur les villes et les quartiers que nous servons.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="value-title">Durabilité</h3>
                    <p class="value-description">Nous sommes engagés à adopter des pratiques respectueuses de
                        l'environnement et à réduire notre empreinte écologique dans tous nos centres.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="about-testimonials">
        <div class="container">
            <div class="testimonials-title-container">
                <div class="testimonials-subtitle">Ce que disent nos clients</div>
                <h2 class="testimonials-title">Témoignages</h2>
                <p class="testimonials-description">Découvrez ce que nos clients pensent de nos services et pourquoi
                    ils continuent à nous faire confiance pour leurs besoins de nettoyage.</p>
            </div>

            <div class="testimonial-slider">
                <div class="testimonial-slide">
                    <div class="testimonial-quote">
                        J'utilise Afrilavage depuis plus de 2 ans maintenant, et je suis toujours impressionné par la
                        qualité du service. Mes vêtements sont parfaitement nettoyés et repassés, et le service de
                        collecte et livraison est vraiment pratique pour mon emploi du temps chargé.
                    </div>

                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <div class="author-name">Ahmed Khalil</div>
                            <div class="author-title">Cadre dans une banque à Casablanca</div>
                            <div class="author-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide-navigation">
                    <div class="slide-nav-btn">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <div class="slide-nav-btn">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partenaires -->
    <section class="about-partners">
        <div class="container">
            <div class="partners-title-container">
                <div class="partners-subtitle">Nos collaborations</div>
                <h2 class="partners-title">Partenaires de confiance</h2>
                <p class="partners-description">Nous sommes fiers de collaborer avec ces organisations et entreprises
                    qui partagent notre engagement envers l'excellence et la qualité.</p>
            </div>

            <div class="partners-grid">
                <div class="partner-card">
                    <div class="partner-logo">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="partner-name">Royal Mansour</div>
                </div>

                <div class="partner-card">
                    <div class="partner-logo">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <div class="partner-name">Sofitel Casablanca</div>
                </div>

                <div class="partner-card">
                    <div class="partner-logo">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="partner-name">BMCE Bank</div>
                </div>

                <div class="partner-card">
                    <div class="partner-logo">
                        <i class="fas fa-plane"></i>
                    </div>
                    <div class="partner-name">Royal Air Maroc</div>
                </div>

                <div class="partner-card">
                    <div class="partner-logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="partner-name">Université Mohamed V</div>
                </div>

                <div class="partner-card">
                    <div class="partner-logo">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <div class="partner-name">Clinique Privée Casablanca</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="about-cta">
        <div class="container">
            <div class="cta-container">
                <h2 class="cta-title">Prêt à découvrir la différence Afrilavage ?</h2>
                <p class="cta-description">Rejoignez les milliers de clients satisfaits qui nous font confiance pour
                    leurs besoins de nettoyage. Commandez dès aujourd'hui et découvrez pourquoi nous sommes le choix
                    numéro un au Maroc.</p>

                <div class="cta-buttons">
                    <a href="order.html" class="cta-btn cta-btn-primary">Commander maintenant</a>
                    <a href="contact.html" class="cta-btn cta-btn-secondary">Nous contacter</a>
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

            // Animation des statistiques (compteur)
            const stats = document.querySelectorAll('.stat-value');

            function animateStats() {
                stats.forEach(stat => {
                    const target = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
                    const duration = 2000; // 2 secondes
                    const step = target / (duration / 16); // 16ms par frame (60fps)
                    let current = 0;

                    const counterInterval = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            stat.textContent = stat.textContent.includes('+') ?
                                target.toLocaleString() + '+' : target.toLocaleString();
                            clearInterval(counterInterval);
                        } else {
                            stat.textContent = stat.textContent.includes('+') ?
                                Math.floor(current).toLocaleString() + '+' : Math.floor(current)
                                .toLocaleString();
                        }
                    }, 16);
                });
            }

            // Observer pour démarrer l'animation lorsque les stats sont visibles
            const statsSection = document.querySelector('.about-stats');

            if (statsSection) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateStats();
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.5
                });

                observer.observe(statsSection);
            }

            // Navigation du slider de témoignages
            const navPrev = document.querySelector('.slide-nav-btn:first-child');
            const navNext = document.querySelector('.slide-nav-btn:last-child');

            if (navPrev && navNext) {
                // Pour une démo simple, nous n'avons qu'un seul témoignage
                // Dans une implémentation réelle, on aurait un carousel avec plusieurs témoignages

                navPrev.addEventListener('click', function() {
                    alert('Témoignage précédent');
                });

                navNext.addEventListener('click', function() {
                    alert('Témoignage suivant');
                });
            }
        });
    </script>
    <!-- Scripts pour les éléments uniformisés -->
    <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
    <script src="{{ asset('assets/js/header-utils.js') }}"></script>
</body>

</html>
