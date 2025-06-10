 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Afrilavage | Service de lavage premium au Maroc</title>
     <!-- Polices Google -->
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <!-- CSS personnalisé -->
     <link rel="stylesheet" href="{{ asset('assets/css/indrive-style.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/footer-enhancement.css') }}">
 </head>

 <body>
     <!-- En-tête -->
     @include('clients.layouts.header')

     <!-- Section Hero -->
     <section class="hero">
         <div class="container hero-container">
             <div class="hero-content">
                 <h1 class="hero-title">Service de <span>lavage premium</span> à votre porte</h1>
                 <p class="hero-subtitle">La meilleure solution de pressing & lavage auto au Maroc</p>
                 <p class="hero-description">Afrilavage révolutionne le nettoyage au Maroc avec un service premium à
                     domicile pour vos vêtements et véhicules. Confort, qualité et rapidité garantis.</p>

                 <div class="hero-features">
                     <div class="hero-feature">
                         <i class="fas fa-truck"></i>
                         <span>Collecte et livraison gratuites</span>
                     </div>
                     <div class="hero-feature">
                         <i class="fas fa-bolt"></i>
                         <span>Service express en 24h</span>
                     </div>
                     <div class="hero-feature">
                         <i class="fas fa-mobile-alt"></i>
                         <span>Suivi en temps réel</span>
                     </div>
                 </div>

                 <div class="hero-cta">
                     <a href="{{ route('order') }}" class="btn btn-primary btn-lg">Commander maintenant</a>
                     <a href="{{ route('service') }}" class="btn btn-outline btn-lg">Nos services</a>
                 </div>
             </div>

             <div class="hero-image-container">
                 <div class="hero-image">
                     <img src="https://images.unsplash.com/photo-1545173168-9f1947eebb7f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1051&q=80"
                         alt="Service de lavage premium">
                 </div>
                 <div class="hero-badge">
                     <i class="fas fa-star"></i>
                     <span>Service 5 étoiles</span>
                 </div>
             </div>
         </div>
     </section>

     <!-- Services Section - Style Application Mobile -->
     <section class="services section">
         <div class="container">
             <div class="section-header">
                 <div class="section-subtitle">Nos services</div>
                 <h2 class="section-title">Solutions de nettoyage professionnelles</h2>
                 <p class="section-description">Découvrez notre gamme complète de services de nettoyage de qualité
                     professionnelle pour vos vêtements et véhicules.</p>
             </div>

             <style>
                 /* Styles spécifiques pour la section Services Mobile */
                 .services-tabs {
                     display: flex;
                     background-color: var(--white);
                     border-radius: var(--radius-lg);
                     box-shadow: var(--shadow-sm);
                     margin-bottom: var(--spacing-xl);
                     position: sticky;
                     top: 80px;
                     z-index: 10;
                     overflow-x: auto;
                     scrollbar-width: none;
                     -ms-overflow-style: none;
                 }

                 .services-tabs::-webkit-scrollbar {
                     display: none;
                 }

                 .service-tab {
                     padding: 1rem 1.5rem;
                     text-align: center;
                     white-space: nowrap;
                     color: var(--secondary-color);
                     font-weight: var(--body-font-weight-medium);
                     position: relative;
                     cursor: pointer;
                     flex: 1;
                     transition: var(--transition-normal);
                 }

                 .service-tab.active {
                     color: var(--primary-color);
                 }

                 .service-tab.active::after {
                     content: '';
                     position: absolute;
                     bottom: 0;
                     left: 0;
                     width: 100%;
                     height: 3px;
                     background-color: var(--primary-color);
                     border-top-left-radius: 3px;
                     border-top-right-radius: 3px;
                 }

                 .service-mobile-cards {
                     display: flex;
                     flex-direction: column;
                     gap: var(--spacing-lg);
                 }

                 .service-mobile-card {
                     background-color: var(--white);
                     border-radius: var(--radius-lg);
                     box-shadow: var(--shadow-md);
                     overflow: hidden;
                     transition: var(--transition-normal);
                     border-left: 4px solid var(--primary-color);
                     animation: slideUp 0.5s forwards;
                     opacity: 0;
                 }

                 .service-mobile-card:nth-child(1) {
                     animation-delay: 0.1s;
                 }

                 .service-mobile-card:nth-child(2) {
                     animation-delay: 0.2s;
                 }

                 .service-mobile-card:nth-child(3) {
                     animation-delay: 0.3s;
                 }

                 .service-mobile-card:hover {
                     transform: translateY(-5px);
                     box-shadow: var(--shadow-lg);
                 }

                 .service-mobile-header {
                     display: flex;
                     justify-content: space-between;
                     align-items: center;
                     padding: var(--spacing-lg);
                     border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                 }

                 .service-mobile-icon-wrapper {
                     display: flex;
                     align-items: center;
                     gap: var(--spacing-md);
                 }

                 .service-mobile-icon {
                     width: 48px;
                     height: 48px;
                     border-radius: var(--radius-lg);
                     background-color: var(--primary-bg);
                     color: var(--primary-color);
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     font-size: 1.5rem;
                 }

                 .service-mobile-title {
                     margin: 0;
                     font-size: 1.2rem;
                     font-weight: 600;
                 }

                 .service-mobile-badge {
                     padding: 0.25rem 0.75rem;
                     border-radius: var(--radius-full);
                     font-size: 0.75rem;
                     font-weight: 500;
                 }

                 .service-badge-popular {
                     background-color: var(--accent-bg);
                     color: var(--accent-dark);
                 }

                 .service-badge-new {
                     background-color: var(--primary-bg);
                     color: var(--primary-color);
                 }

                 .service-mobile-content {
                     padding: var(--spacing-lg);
                 }

                 .service-mobile-description {
                     margin-bottom: var(--spacing-lg);
                     color: var(--dark-gray);
                 }

                 .service-mobile-features {
                     display: flex;
                     flex-wrap: wrap;
                     gap: var(--spacing-md);
                     margin-bottom: var(--spacing-lg);
                 }

                 .service-mobile-feature {
                     display: flex;
                     align-items: center;
                     gap: var(--spacing-sm);
                     background-color: var(--off-white);
                     padding: 0.5rem 0.75rem;
                     border-radius: var(--radius-md);
                     font-size: 0.85rem;
                 }

                 .service-mobile-feature i {
                     color: var(--primary-color);
                     font-size: 0.9rem;
                 }

                 .service-mobile-footer {
                     display: flex;
                     align-items: center;
                     justify-content: space-between;
                     margin-top: var(--spacing-lg);
                 }

                 .service-mobile-price {
                     font-weight: 700;
                     color: var(--primary-color);
                     font-size: 1.25rem;
                 }

                 .service-mobile-rating {
                     display: flex;
                     align-items: center;
                     gap: var(--spacing-xs);
                 }

                 .service-mobile-rating i {
                     color: var(--accent-color);
                     font-size: 0.85rem;
                 }

                 .service-mobile-rating span {
                     color: var(--dark-gray);
                     font-size: 0.8rem;
                 }

                 .service-mobile-options {
                     margin-top: var(--spacing-md);
                     display: flex;
                     flex-wrap: wrap;
                     gap: var(--spacing-sm);
                 }

                 .service-mobile-option {
                     padding: 0.5rem 0.75rem;
                     background-color: var(--white);
                     border: 1px solid var(--light-gray);
                     border-radius: var(--radius-full);
                     font-size: 0.8rem;
                     font-weight: 500;
                     color: var(--secondary-color);
                 }

                 .service-mobile-actions {
                     display: flex;
                     gap: var(--spacing-md);
                     margin-top: var(--spacing-lg);
                 }

                 .service-mobile-actions .btn {
                     flex: 1;
                 }

                 /* Animation d'affichage progressif */
                 @keyframes fadeInRight {
                     from {
                         opacity: 0;
                         transform: translateX(20px);
                     }

                     to {
                         opacity: 1;
                         transform: translateX(0);
                     }
                 }

                 .fade-in-feature {
                     opacity: 0;
                     animation: fadeInRight 0.5s forwards;
                 }

                 .service-mobile-feature:nth-child(1) {
                     animation-delay: 0.2s;
                 }

                 .service-mobile-feature:nth-child(2) {
                     animation-delay: 0.3s;
                 }

                 .service-mobile-feature:nth-child(3) {
                     animation-delay: 0.4s;
                 }

                 .service-mobile-feature:nth-child(4) {
                     animation-delay: 0.5s;
                 }
             </style>

             <!-- Onglets de services (style app mobile) -->
             <div class="services-tabs">
                 <div class="service-tab active" data-tab="all">Tout</div>
                 <div class="service-tab" data-tab="pressing">Pressing</div>
                 <div class="service-tab" data-tab="car">Lavage Auto</div>
                 <div class="service-tab" data-tab="premium">Premium</div>
                 <div class="service-tab" data-tab="subscription">Abonnements</div>
             </div>

             <!-- Cartes de services style mobile -->
             <div class="service-mobile-cards">
                 <!-- Service 1: Pressing -->
                 <div class="service-mobile-card" data-category="pressing">
                     <div class="service-mobile-header">
                         <div class="service-mobile-icon-wrapper">
                             <div class="service-mobile-icon">
                                 <i class="fas fa-tshirt"></i>
                             </div>
                             <h3 class="service-mobile-title">Pressing & Repassage</h3>
                         </div>
                         <div class="service-mobile-badge service-badge-popular">Populaire</div>
                     </div>
                     <div class="service-mobile-content">
                         <p class="service-mobile-description">Service professionnel de nettoyage à sec et de repassage
                             pour tous vos vêtements, avec un soin particulier pour les tissus délicats.</p>

                         <div class="service-mobile-features">
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-clock"></i>
                                 <span>Livraison sous 48h</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-spray-can"></i>
                                 <span>Traitement anti-taches</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-leaf"></i>
                                 <span>Produits écologiques</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-truck"></i>
                                 <span>Livraison gratuite</span>
                             </div>
                         </div>

                         <div class="service-mobile-options">
                             <div class="service-mobile-option">Chemise 15 DH</div>
                             <div class="service-mobile-option">Pantalon 20 DH</div>
                             <div class="service-mobile-option">Costume 50 DH</div>
                             <div class="service-mobile-option">Robe 30 DH</div>
                         </div>

                         <div class="service-mobile-footer">
                             <div class="service-mobile-price">À partir de 50 DH</div>
                             <div class="service-mobile-rating">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star-half-alt"></i>
                                 <span>(230 avis)</span>
                             </div>
                         </div>

                         <div class="service-mobile-actions">
                             <a href="{{ route('order', ['service' => 'pressing']) }}" class="btn btn-primary">Commander</a>
                             {{-- <a href="services.html#pressing" class="btn btn-outline">Détails</a> --}}
                         </div>
                     </div>
                 </div>

                 <!-- Service 2: Lavage Auto -->
                 <div class="service-mobile-card" data-category="car">
                     <div class="service-mobile-header">
                         <div class="service-mobile-icon-wrapper">
                             <div class="service-mobile-icon">
                                 <i class="fas fa-car"></i>
                             </div>
                             <h3 class="service-mobile-title">Lavage Automobile</h3>
                         </div>
                         <div class="service-mobile-badge service-badge-popular">⭐ 5.0</div>
                     </div>
                     <div class="service-mobile-content">
                         <p class="service-mobile-description">Nettoyage complet de votre véhicule, intérieur et
                             extérieur, avec des produits de qualité et une finition exceptionnelle.</p>

                         <div class="service-mobile-features">
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-shower"></i>
                                 <span>Lavage haute pression</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-couch"></i>
                                 <span>Nettoyage intérieur</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-shield-alt"></i>
                                 <span>Protection carrosserie</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-spray-can"></i>
                                 <span>Désinfection habitacle</span>
                             </div>
                         </div>

                         <div class="service-mobile-options">
                             <div class="service-mobile-option">Citadine 80 DH</div>
                             <div class="service-mobile-option">Berline 120 DH</div>
                             <div class="service-mobile-option">SUV/4x4 160 DH</div>
                             <div class="service-mobile-option">+ Cire 40 DH</div>
                         </div>

                         <div class="service-mobile-footer">
                             <div class="service-mobile-price">À partir de 120 DH</div>
                             <div class="service-mobile-rating">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <span>(185 avis)</span>
                             </div>
                         </div>

                         <div class="service-mobile-actions">
                             <a href="{{ route('order', ['service' => 'car']) }}" class="btn btn-primary">Commander</a>
                             {{-- <a href="services.html#car" class="btn btn-outline">Détails</a> --}}
                         </div>
                     </div>
                 </div>

                 <!-- Service 3: Pack Premium -->
                 <div class="service-mobile-card" data-category="premium">
                     <div class="service-mobile-header">
                         <div class="service-mobile-icon-wrapper">
                             <div class="service-mobile-icon">
                                 <i class="fas fa-gem"></i>
                             </div>
                             <h3 class="service-mobile-title">Pack Premium</h3>
                         </div>
                         <div class="service-mobile-badge service-badge-new">Nouveau</div>
                     </div>
                     <div class="service-mobile-content">
                         <p class="service-mobile-description">Combo économique comprenant le nettoyage de vos
                             vêtements et de votre véhicule avec une remise spéciale de 20%.</p>

                         <div class="service-mobile-features">
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-percentage"></i>
                                 <span>Économie de 20%</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-tshirt"></i>
                                 <span>5 vêtements au choix</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-car-side"></i>
                                 <span>Lavage extérieur</span>
                             </div>
                             <div class="service-mobile-feature fade-in-feature">
                                 <i class="fas fa-clock"></i>
                                 <span>Service prioritaire</span>
                             </div>
                         </div>

                         <div class="service-mobile-options">
                             <div class="service-mobile-option">Pack Basic 150 DH</div>
                             <div class="service-mobile-option">Pack Plus 250 DH</div>
                             <div class="service-mobile-option">Pack Family 350 DH</div>
                         </div>

                         <div class="service-mobile-footer">
                             <div class="service-mobile-price">À partir de 150 DH</div>
                             <div class="service-mobile-rating">
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="fas fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <span>(42 avis)</span>
                             </div>
                         </div>

                         <div class="service-mobile-actions">
                             <a href="{{ route('order', ['service' => 'premium']) }}" class="btn btn-primary">Commander</a>
                             {{-- <a href="services.html#premium" class="btn btn-outline">Détails</a> --}}
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Bannière Promotionnelle -->
             {{-- <div
                 style="margin-top: var(--spacing-2xl); background: var(--gradient-primary); padding: var(--spacing-lg); border-radius: var(--radius-lg); color: var(--white); position: relative; overflow: hidden;">
                 <div
                     style="position: absolute; top: -20px; right: -20px; background-color: rgba(255,255,255,0.1); width: 150px; height: 150px; border-radius: 50%;">
                 </div>
                 <div
                     style="position: absolute; bottom: -40px; left: -40px; background-color: rgba(255,255,255,0.1); width: 180px; height: 180px; border-radius: 50%;">
                 </div>
                 <h3 style="font-size: 1.5rem; margin-bottom: var(--spacing-sm); position: relative;">Abonnez-vous et
                     économisez 30%</h3>
                 <p style="margin-bottom: var(--spacing-md); max-width: 80%; position: relative;">Profitez de nos
                     forfaits mensuels pour vos besoins réguliers de nettoyage. Service VIP et prix préférentiels.</p>
                 <a href="services.html#subscription"
                     style="display: inline-block; padding: 0.75rem 1.5rem; background-color: var(--white); color: var(--primary-color); border-radius: var(--radius-full); font-weight: var(--body-font-weight-bold); transition: var(--transition-normal); position: relative;">
                     Découvrir les abonnements <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
                 </a>
             </div> --}}
         </div>
     </section>

     <script>
         // Script pour les onglets de services
         document.addEventListener('DOMContentLoaded', function() {
             const serviceTabs = document.querySelectorAll('.service-tab');
             const serviceCards = document.querySelectorAll('.service-mobile-card');

             serviceTabs.forEach(tab => {
                 tab.addEventListener('click', function() {
                     // Désactiver tous les onglets
                     serviceTabs.forEach(t => t.classList.remove('active'));

                     // Activer l'onglet cliqué
                     this.classList.add('active');

                     const category = this.getAttribute('data-tab');

                     // Filtrer les services
                     serviceCards.forEach(card => {
                         if (category === 'all' || card.getAttribute('data-category') ===
                             category) {
                             card.style.display = 'block';
                             // Réinitialiser l'animation
                             card.style.animation = 'none';
                             setTimeout(() => {
                                 card.style.animation = 'slideUp 0.5s forwards';
                             }, 10);
                         } else {
                             card.style.display = 'none';
                         }
                     });
                 });
             });

             // Animation des caractéristiques au survol
             const serviceCards2 = document.querySelectorAll('.service-mobile-card');
             serviceCards2.forEach(card => {
                 card.addEventListener('mouseenter', function() {
                     const features = this.querySelectorAll('.service-mobile-feature');
                     features.forEach((feature, index) => {
                         feature.style.animation = 'none';
                         setTimeout(() => {
                             feature.style.animation =
                                 `fadeInRight 0.5s ${index * 0.1}s forwards`;
                         }, 10);
                     });
                 });
             });
         });
     </script>

     <!-- Features Section - Style App Mobile -->
     <section class="features section">
         <div class="container">
             <div class="section-header">
                 <div class="section-subtitle">Pourquoi nous choisir</div>
                 <h2 class="section-title">Une expérience de lavage exceptionnelle</h2>
                 <p class="section-description">Afrilavage combine technologie et expertise pour vous offrir le
                     meilleur service de nettoyage au Maroc.</p>
             </div>

             <style>
                 /* Styles pour la section Fonctionnalités */
                 .features-mobile-container {
                     margin-top: var(--spacing-xl);
                 }

                 .feature-tab-container {
                     background: var(--white);
                     padding: var(--spacing-sm);
                     border-radius: var(--radius-lg);
                     box-shadow: var(--shadow-sm);
                     margin-bottom: var(--spacing-xl);
                     position: relative;
                     z-index: 2;
                     display: flex;
                     justify-content: space-around;
                 }

                 .feature-tab {
                     padding: 0.75rem 1rem;
                     flex: 1;
                     text-align: center;
                     color: var(--dark-gray);
                     border-radius: var(--radius-md);
                     font-weight: 500;
                     font-size: 0.9rem;
                     cursor: pointer;
                     transition: var(--transition-normal);
                 }

                 .feature-tab.active {
                     background-color: var(--primary-color);
                     color: var(--white);
                     box-shadow: var(--shadow-sm);
                 }

                 .features-content {
                     position: relative;
                     min-height: 400px;
                 }

                 .feature-panel {
                     display: none;
                     position: absolute;
                     top: 0;
                     left: 0;
                     width: 100%;
                     opacity: 0;
                     transition: opacity 0.3s ease;
                 }

                 .feature-panel.active {
                     display: block;
                     opacity: 1;
                     z-index: 1;
                 }

                 .feature-card {
                     background: var(--white);
                     border-radius: var(--radius-lg);
                     box-shadow: var(--shadow-md);
                     overflow: hidden;
                     padding-bottom: var(--spacing-lg);
                     border-top: 4px solid var(--primary-color);
                 }

                 .feature-hero {
                     background: var(--gradient-primary);
                     padding: var(--spacing-xl);
                     position: relative;
                     overflow: hidden;
                     display: flex;
                     align-items: center;
                     color: white;
                 }

                 .feature-hero::before {
                     content: '';
                     position: absolute;
                     top: 0;
                     right: 0;
                     width: 200px;
                     height: 200px;
                     background: radial-gradient(rgba(255, 255, 255, 0.2) 0%, transparent 70%);
                     border-radius: 50%;
                     transform: translate(30%, -30%);
                 }

                 .feature-hero::after {
                     content: '';
                     position: absolute;
                     bottom: 0;
                     left: 0;
                     width: 150px;
                     height: 150px;
                     background: radial-gradient(rgba(255, 255, 255, 0.15) 0%, transparent 70%);
                     border-radius: 50%;
                     transform: translate(-30%, 30%);
                 }

                 .feature-hero-icon {
                     width: 70px;
                     height: 70px;
                     background: rgba(255, 255, 255, 0.2);
                     border-radius: var(--radius-xl);
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     font-size: 2rem;
                     margin-right: var(--spacing-lg);
                     position: relative;
                     z-index: 2;
                 }

                 .feature-hero-content {
                     position: relative;
                     z-index: 2;
                 }

                 .feature-hero-title {
                     font-size: 1.5rem;
                     margin-bottom: var(--spacing-sm);
                     font-weight: 700;
                 }

                 .feature-hero-subtitle {
                     opacity: 0.9;
                     font-weight: 400;
                     font-size: 1rem;
                 }

                 .feature-detail-list {
                     padding: var(--spacing-lg);
                 }

                 .feature-detail-item {
                     display: flex;
                     padding: var(--spacing-md) 0;
                     border-bottom: 1px solid var(--light-gray);
                 }

                 .feature-detail-item:last-child {
                     border-bottom: none;
                 }

                 .feature-detail-icon {
                     width: 40px;
                     height: 40px;
                     min-width: 40px;
                     background: var(--primary-bg);
                     color: var(--primary-color);
                     border-radius: var(--radius-md);
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     font-size: 1.2rem;
                     margin-right: var(--spacing-md);
                 }

                 .feature-detail-content h4 {
                     margin: 0 0 var(--spacing-xs);
                     font-size: 1.1rem;
                     font-weight: 600;
                 }

                 .feature-detail-content p {
                     color: var(--dark-gray);
                     font-size: 0.9rem;
                     margin: 0;
                 }

                 .feature-action {
                     text-align: center;
                     padding: 0 var(--spacing-lg);
                 }

                 .feature-action .btn {
                     width: 100%;
                 }

                 /* Animation pour les changements de panneaux */
                 @keyframes featureSlideIn {
                     from {
                         opacity: 0;
                         transform: translateX(30px);
                     }

                     to {
                         opacity: 1;
                         transform: translateX(0);
                     }
                 }

                 .feature-panel.animate-in {
                     animation: featureSlideIn 0.5s forwards;
                 }
             </style>

             <div class="features-mobile-container">
                 <div class="feature-tab-container">
                     <div class="feature-tab active" data-panel="livraison">Livraison</div>
                     <div class="feature-tab" data-panel="express">Express</div>
                     <div class="feature-tab" data-panel="suivi">Suivi</div>
                     <div class="feature-tab" data-panel="eco">Écologique</div>
                 </div>

                 <div class="features-content">
                     <!-- Panel 1: Livraison -->
                     <div class="feature-panel active" id="panel-livraison">
                         <div class="feature-card">
                             <div class="feature-hero">
                                 <div class="feature-hero-icon">
                                     <i class="fas fa-truck"></i>
                                 </div>
                                 <div class="feature-hero-content">
                                     <h3 class="feature-hero-title">Collecte & Livraison</h3>
                                     <p class="feature-hero-subtitle">Service gratuit dans toute la ville</p>
                                 </div>
                             </div>

                             <div class="feature-detail-list">
                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon">
                                         <i class="fas fa-map-marker-alt"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>À Votre Porte</h4>
                                         <p>Nous venons chercher vos vêtements et véhicules directement à votre domicile
                                             ou bureau, sans frais supplémentaires.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon">
                                         <i class="fas fa-calendar-check"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Planification Flexible</h4>
                                         <p>Choisissez le jour et l'heure qui vous conviennent pour la collecte et la
                                             livraison, y compris les soirs et week-ends.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon">
                                         <i class="fas fa-shield-alt"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Sécurité Garantie</h4>
                                         <p>Vos articles sont manipulés avec soin et emballés dans des housses de
                                             protection pour préserver leur qualité.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon">
                                         <i class="fas fa-hand-holding-usd"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Entièrement Gratuit</h4>
                                         <p>Le service de collecte et livraison est totalement gratuit, quelle que soit
                                             la valeur de votre commande, dans un rayon de 15 km.</p>
                                     </div>
                                 </div>
                             </div>

                             <div class="feature-action">
                                 <a href="{{ route('order') }}" class="btn btn-primary">Programmer un enlèvement</a>
                             </div>
                         </div>
                     </div>

                     <!-- Panel 2: Express -->
                     <div class="feature-panel" id="panel-express">
                         <div class="feature-card">
                             <div class="feature-hero"
                                 style="background: linear-gradient(135deg, #FF9500 0%, #FF2D55 100%);">
                                 <div class="feature-hero-icon">
                                     <i class="fas fa-bolt"></i>
                                 </div>
                                 <div class="feature-hero-content">
                                     <h3 class="feature-hero-title">Service Express</h3>
                                     <p class="feature-hero-subtitle">Lavage prioritaire en 24h</p>
                                 </div>
                             </div>

                             <div class="feature-detail-list">
                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(255, 149, 0, 0.1); color: #FF9500;">
                                         <i class="fas fa-tachometer-alt"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Traitement Accéléré</h4>
                                         <p>Vos articles sont traités en priorité absolue et prêts en 24h seulement,
                                             idéal pour les situations urgentes.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(255, 149, 0, 0.1); color: #FF9500;">
                                         <i class="fas fa-truck-loading"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Livraison Prioritaire</h4>
                                         <p>Service de livraison prioritaire dès que vos articles sont prêts, même en
                                             dehors des horaires standard.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(255, 149, 0, 0.1); color: #FF9500;">
                                         <i class="fas fa-star"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Qualité Premium</h4>
                                         <p>Malgré la rapidité, nous maintenons des standards de qualité exceptionnels
                                             avec une attention particulière aux détails.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(255, 149, 0, 0.1); color: #FF9500;">
                                         <i class="fas fa-percentage"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Supplément Raisonnable</h4>
                                         <p>Supplément de seulement 30% par rapport au tarif standard pour un service
                                             ultra-rapide sans compromis.</p>
                                     </div>
                                 </div>
                             </div>

                             <div class="feature-action">
                                 <a href="{{ route('order', ['service' => 'express']) }}" class="btn btn-primary"
                                     style="background-color: #FF9500;">Commander en Express</a>
                             </div>
                         </div>
                     </div>

                     <!-- Panel 3: Suivi -->
                     <div class="feature-panel" id="panel-suivi">
                         <div class="feature-card">
                             <div class="feature-hero"
                                 style="background: linear-gradient(135deg, #007AFF 0%, #5856D6 100%);">
                                 <div class="feature-hero-icon">
                                     <i class="fas fa-mobile-alt"></i>
                                 </div>
                                 <div class="feature-hero-content">
                                     <h3 class="feature-hero-title">Suivi en Temps Réel</h3>
                                     <p class="feature-hero-subtitle">Suivez chaque étape du processus</p>
                                 </div>
                             </div>

                             <div class="feature-detail-list">
                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(0, 122, 255, 0.1); color: #007AFF;">
                                         <i class="fas fa-bell"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Notifications Instantanées</h4>
                                         <p>Recevez des notifications en temps réel à chaque étape du processus de
                                             nettoyage, de la collecte à la livraison.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(0, 122, 255, 0.1); color: #007AFF;">
                                         <i class="fas fa-map-marked-alt"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Localisation en Direct</h4>
                                         <p>Suivez la position de votre livreur en temps réel lors de la collecte et de
                                             la livraison pour une meilleure planification.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(0, 122, 255, 0.1); color: #007AFF;">
                                         <i class="fas fa-history"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Statut Détaillé</h4>
                                         <p>Visualisez l'état précis de vos articles: collecte, inspection, lavage,
                                             séchage, repassage, contrôle qualité, et livraison.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(0, 122, 255, 0.1); color: #007AFF;">
                                         <i class="fas fa-comments"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Communication Directe</h4>
                                         <p>Chattez directement avec notre équipe depuis l'application pour toute
                                             question ou demande spécifique.</p>
                                     </div>
                                 </div>
                             </div>

                             <div class="feature-action">
                                 <a href="tracking.html" class="btn btn-primary"
                                     style="background-color: #007AFF;">Suivre ma commande</a>
                             </div>
                         </div>
                     </div>

                     <!-- Panel 4: Écologique -->
                     <div class="feature-panel" id="panel-eco">
                         <div class="feature-card">
                             <div class="feature-hero"
                                 style="background: linear-gradient(135deg, #34C759 0%, #32D74B 100%);">
                                 <div class="feature-hero-icon">
                                     <i class="fas fa-leaf"></i>
                                 </div>
                                 <div class="feature-hero-content">
                                     <h3 class="feature-hero-title">Engagement Écologique</h3>
                                     <p class="feature-hero-subtitle">Lavage respectueux de l'environnement</p>
                                 </div>
                             </div>

                             <div class="feature-detail-list">
                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(52, 199, 89, 0.1); color: #34C759;">
                                         <i class="fas fa-tint"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Économie d'Eau</h4>
                                         <p>Nos machines à haute efficacité réduisent la consommation d'eau de 40% par
                                             rapport aux lavages traditionnels.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(52, 199, 89, 0.1); color: #34C759;">
                                         <i class="fas fa-flask"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Produits Biodégradables</h4>
                                         <p>Utilisation exclusive de détergents et produits de nettoyage écologiques et
                                             biodégradables, sans phosphates ni perturbateurs endocriniens.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(52, 199, 89, 0.1); color: #34C759;">
                                         <i class="fas fa-recycle"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Emballage Recyclable</h4>
                                         <p>Tous nos emballages sont fabriqués à partir de matériaux recyclés et sont
                                             entièrement recyclables.</p>
                                     </div>
                                 </div>

                                 <div class="feature-detail-item">
                                     <div class="feature-detail-icon"
                                         style="background-color: rgba(52, 199, 89, 0.1); color: #34C759;">
                                         <i class="fas fa-sun"></i>
                                     </div>
                                     <div class="feature-detail-content">
                                         <h4>Énergie Renouvelable</h4>
                                         <p>Notre centre de nettoyage est partiellement alimenté par des panneaux
                                             solaires pour réduire notre empreinte carbone.</p>
                                     </div>
                                 </div>
                             </div>

                             <div class="feature-action">
                                 <a href="about.html#eco" class="btn btn-primary"
                                     style="background-color: #34C759;">Découvrir notre démarche éco</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <script>
         // Script pour la section des fonctionnalités
         document.addEventListener('DOMContentLoaded', function() {
             const featureTabs = document.querySelectorAll('.feature-tab');
             const featurePanels = document.querySelectorAll('.feature-panel');

             featureTabs.forEach(tab => {
                 tab.addEventListener('click', function() {
                     // Désactiver tous les onglets
                     featureTabs.forEach(t => t.classList.remove('active'));

                     // Activer l'onglet cliqué
                     this.classList.add('active');

                     // Masquer tous les panneaux
                     featurePanels.forEach(panel => {
                         panel.classList.remove('active');
                         panel.classList.remove('animate-in');
                     });

                     // Afficher le panneau correspondant
                     const panelId = 'panel-' + this.getAttribute('data-panel');
                     const panel = document.getElementById(panelId);
                     panel.classList.add('active');
                     panel.classList.add('animate-in');
                 });
             });
         });
     </script>

     <!-- Testimonials Section - Mobile App Style -->
     <section class="testimonials section">
         <div class="container">
             <div class="section-header">
                 <div class="section-subtitle">Témoignages</div>
                 <h2 class="section-title">Ce que disent nos clients</h2>
                 <p class="section-description">Découvrez les expériences de nos clients avec nos services de nettoyage
                     premium.</p>
             </div>

             <style>
                 /* Styles pour les témoignages style app mobile */
                 .testimonials-carousel-container {
                     position: relative;
                     overflow: hidden;
                     padding: 0 var(--spacing-lg);
                 }

                 .testimonials-tabs {
                     display: flex;
                     justify-content: center;
                     gap: var(--spacing-md);
                     margin-bottom: var(--spacing-xl);
                 }

                 .testimonial-tab {
                     width: 12px;
                     height: 12px;
                     border-radius: 50%;
                     background-color: var(--light-gray);
                     cursor: pointer;
                     transition: var(--transition-normal);
                 }

                 .testimonial-tab.active {
                     background-color: var(--primary-color);
                     transform: scale(1.2);
                 }

                 .testimonials-carousel {
                     display: flex;
                     transition: transform 0.5s ease;
                 }

                 .testimonial-slide {
                     min-width: 100%;
                     padding: 0 var(--spacing-md);
                 }

                 .testimonial-mobile-card {
                     background-color: var(--white);
                     border-radius: var(--radius-lg);
                     box-shadow: var(--shadow-md);
                     padding: var(--spacing-lg);
                     position: relative;
                     margin-top: 40px;
                     transition: var(--transition-normal);
                 }

                 .testimonial-mobile-card:hover {
                     transform: translateY(-5px);
                     box-shadow: var(--shadow-lg);
                 }

                 .testimonial-mobile-card::before {
                     content: '"';
                     position: absolute;
                     top: -30px;
                     left: 30px;
                     font-size: 100px;
                     color: var(--primary-color);
                     opacity: 0.1;
                     line-height: 1;
                     font-family: serif;
                 }

                 .testimonial-profile {
                     display: flex;
                     align-items: center;
                     margin-bottom: var(--spacing-lg);
                 }

                 .testimonial-avatar-wrapper {
                     position: relative;
                     margin-right: var(--spacing-lg);
                 }

                 .testimonial-avatar-circle {
                     width: 70px;
                     height: 70px;
                     border-radius: 50%;
                     background-color: var(--primary-color);
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     color: var(--white);
                     font-size: 1.8rem;
                     font-weight: bold;
                     text-transform: uppercase;
                 }

                 .testimonial-verified-badge {
                     position: absolute;
                     bottom: 0;
                     right: 0;
                     background-color: var(--primary-color);
                     color: var(--white);
                     border-radius: 50%;
                     width: 24px;
                     height: 24px;
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     font-size: 0.8rem;
                     border: 2px solid var(--white);
                     box-shadow: var(--shadow-sm);
                 }

                 .testimonial-info h3 {
                     margin: 0 0 var(--spacing-xs);
                     font-size: 1.2rem;
                     font-weight: 600;
                 }

                 .testimonial-info p {
                     margin: 0;
                     font-size: 0.9rem;
                     color: var(--dark-gray);
                 }

                 .testimonial-rating-row {
                     display: flex;
                     align-items: center;
                     margin-top: var(--spacing-xs);
                 }

                 .testimonial-stars {
                     display: flex;
                     align-items: center;
                     color: var(--accent-color);
                     margin-right: var(--spacing-sm);
                 }

                 .testimonial-date {
                     font-size: 0.8rem;
                     color: var(--dark-gray);
                 }

                 .testimonial-text {
                     color: var(--secondary-color);
                     font-size: 1rem;
                     line-height: 1.6;
                     margin-bottom: var(--spacing-lg);
                 }

                 .testimonial-service-tag {
                     display: inline-flex;
                     align-items: center;
                     padding: 0.5rem 0.75rem;
                     background-color: var(--primary-bg);
                     color: var(--primary-color);
                     border-radius: var(--radius-full);
                     font-size: 0.8rem;
                     font-weight: 500;
                     margin-right: var(--spacing-sm);
                 }

                 .testimonial-service-tag i {
                     margin-right: var(--spacing-xs);
                 }

                 .testimonial-actions {
                     display: flex;
                     justify-content: space-between;
                     align-items: center;
                     margin-top: var(--spacing-lg);
                     padding-top: var(--spacing-md);
                     border-top: 1px solid var(--light-gray);
                 }

                 .testimonial-helpful {
                     display: flex;
                     align-items: center;
                     gap: var(--spacing-md);
                 }

                 .testimonial-helpful-btn {
                     display: flex;
                     align-items: center;
                     background: none;
                     border: none;
                     color: var(--dark-gray);
                     font-size: 0.9rem;
                     cursor: pointer;
                     padding: 0.3rem 0.5rem;
                     transition: var(--transition-normal);
                 }

                 .testimonial-helpful-btn:hover {
                     color: var(--primary-color);
                 }

                 .testimonial-helpful-btn i {
                     margin-right: var(--spacing-xs);
                 }

                 .testimonial-share {
                     color: var(--dark-gray);
                     font-size: 0.9rem;
                 }

                 .testimonial-control-btn {
                     position: absolute;
                     top: 50%;
                     transform: translateY(-50%);
                     width: 40px;
                     height: 40px;
                     border-radius: 50%;
                     background-color: var(--white);
                     box-shadow: var(--shadow-md);
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     border: none;
                     color: var(--primary-color);
                     cursor: pointer;
                     transition: var(--transition-normal);
                     z-index: 2;
                 }

                 .testimonial-control-btn:hover {
                     background-color: var(--primary-color);
                     color: var(--white);
                 }

                 .testimonial-prev {
                     left: 0;
                 }

                 .testimonial-next {
                     right: 0;
                 }

                 .testimonial-progress-container {
                     margin-top: var(--spacing-lg);
                     display: flex;
                     justify-content: center;
                     gap: var(--spacing-sm);
                 }

                 .testimonial-progress-point {
                     width: 8px;
                     height: 8px;
                     background-color: var(--light-gray);
                     border-radius: 50%;
                     cursor: pointer;
                     transition: var(--transition-normal);
                 }

                 .testimonial-progress-point.active {
                     background-color: var(--primary-color);
                     transform: scale(1.5);
                 }
             </style>

             <div class="testimonials-carousel-container">
                 <button class="testimonial-control-btn testimonial-prev">
                     <i class="fas fa-chevron-left"></i>
                 </button>

                 <div class="testimonials-carousel">
                     <!-- Témoignage 1 -->
                     <div class="testimonial-slide">
                         <div class="testimonial-mobile-card">
                             <div class="testimonial-profile">
                                 <div class="testimonial-avatar-wrapper">
                                     <div class="testimonial-avatar-circle">
                                         SB
                                     </div>
                                     <div class="testimonial-verified-badge">
                                         <i class="fas fa-check"></i>
                                     </div>
                                 </div>
                                 <div class="testimonial-info">
                                     <h3>Salma Benani</h3>
                                     <p>Casablanca, Maroc</p>
                                     <div class="testimonial-rating-row">
                                         <div class="testimonial-stars">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                         </div>
                                         <div class="testimonial-date">Il y a 3 jours</div>
                                     </div>
                                 </div>
                             </div>

                             <p class="testimonial-text">Afrilavage a complètement changé ma façon de faire nettoyer
                                 mes vêtements. Le service est impeccable, rapide et tellement pratique avec la collecte
                                 à domicile. Mes vêtements sont toujours parfaitement propres et bien repassés, je ne
                                 peux plus m'en passer !</p>

                             <div class="testimonial-service-tags">
                                 <span class="testimonial-service-tag">
                                     <i class="fas fa-tshirt"></i>
                                     Pressing Standard
                                 </span>
                                 <span class="testimonial-service-tag">
                                     <i class="fas fa-truck"></i>
                                     Livraison
                                 </span>
                             </div>

                             <div class="testimonial-actions">
                                 <div class="testimonial-helpful">
                                     <button class="testimonial-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         Utile (24)
                                     </button>
                                     <button class="testimonial-helpful-btn">
                                         <i class="fas fa-comment-alt"></i>
                                         Commenter
                                     </button>
                                 </div>
                                 <div class="testimonial-share">
                                     <i class="fas fa-share-alt"></i>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Témoignage 2 -->
                     <div class="testimonial-slide">
                         <div class="testimonial-mobile-card">
                             <div class="testimonial-profile">
                                 <div class="testimonial-avatar-wrapper">
                                     <div class="testimonial-avatar-circle" style="background-color: #FF9500;">
                                         KM
                                     </div>
                                     <div class="testimonial-verified-badge">
                                         <i class="fas fa-check"></i>
                                     </div>
                                 </div>
                                 <div class="testimonial-info">
                                     <h3>Karim Moussaoui</h3>
                                     <p>Rabat, Maroc</p>
                                     <div class="testimonial-rating-row">
                                         <div class="testimonial-stars">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half-alt"></i>
                                         </div>
                                         <div class="testimonial-date">Il y a 1 semaine</div>
                                     </div>
                                 </div>
                             </div>

                             <p class="testimonial-text">Le service de lavage auto est exceptionnel ! Ma voiture n'a
                                 jamais été aussi propre, et le fait qu'ils viennent chez moi est un gain de temps
                                 incroyable. L'équipe est professionnelle et le résultat vaut vraiment le prix. Je
                                 recommande particulièrement l'option de protection céramique.</p>

                             <div class="testimonial-service-tags">
                                 <span class="testimonial-service-tag"
                                     style="background-color: rgba(255, 149, 0, 0.1); color: #FF9500;">
                                     <i class="fas fa-car"></i>
                                     Lavage Complet
                                 </span>
                                 <span class="testimonial-service-tag"
                                     style="background-color: rgba(255, 149, 0, 0.1); color: #FF9500;">
                                     <i class="fas fa-shield-alt"></i>
                                     Protection Céramique
                                 </span>
                             </div>

                             <div class="testimonial-actions">
                                 <div class="testimonial-helpful">
                                     <button class="testimonial-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         Utile (37)
                                     </button>
                                     <button class="testimonial-helpful-btn">
                                         <i class="fas fa-comment-alt"></i>
                                         Commenter
                                     </button>
                                 </div>
                                 <div class="testimonial-share">
                                     <i class="fas fa-share-alt"></i>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Témoignage 3 -->
                     <div class="testimonial-slide">
                         <div class="testimonial-mobile-card">
                             <div class="testimonial-profile">
                                 <div class="testimonial-avatar-wrapper">
                                     <div class="testimonial-avatar-circle" style="background-color: #5856D6;">
                                         NT
                                     </div>
                                     <div class="testimonial-verified-badge">
                                         <i class="fas fa-check"></i>
                                     </div>
                                 </div>
                                 <div class="testimonial-info">
                                     <h3>Nadia Tazi</h3>
                                     <p>Marrakech, Maroc</p>
                                     <div class="testimonial-rating-row">
                                         <div class="testimonial-stars">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                         </div>
                                         <div class="testimonial-date">Il y a 2 semaines</div>
                                     </div>
                                 </div>
                             </div>

                             <p class="testimonial-text">J'utilise régulièrement le Pack Premium pour nettoyer à la
                                 fois mes vêtements et ma voiture. C'est économique et la qualité est toujours au
                                 rendez-vous. Je suis abonnée depuis 6 mois et le service est constant. L'application
                                 mobile est facile à utiliser et le suivi en temps réel est très pratique.</p>

                             <div class="testimonial-service-tags">
                                 <span class="testimonial-service-tag"
                                     style="background-color: rgba(88, 86, 214, 0.1); color: #5856D6;">
                                     <i class="fas fa-gem"></i>
                                     Pack Premium
                                 </span>
                                 <span class="testimonial-service-tag"
                                     style="background-color: rgba(88, 86, 214, 0.1); color: #5856D6;">
                                     <i class="fas fa-sync-alt"></i>
                                     Abonnement
                                 </span>
                             </div>

                             <div class="testimonial-actions">
                                 <div class="testimonial-helpful">
                                     <button class="testimonial-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         Utile (19)
                                     </button>
                                     <button class="testimonial-helpful-btn">
                                         <i class="fas fa-comment-alt"></i>
                                         Commenter
                                     </button>
                                 </div>
                                 <div class="testimonial-share">
                                     <i class="fas fa-share-alt"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <button class="testimonial-control-btn testimonial-next">
                     <i class="fas fa-chevron-right"></i>
                 </button>

                 <div class="testimonial-progress-container">
                     <div class="testimonial-progress-point active" data-index="0"></div>
                     <div class="testimonial-progress-point" data-index="1"></div>
                     <div class="testimonial-progress-point" data-index="2"></div>
                 </div>
             </div>

             <div style="text-align: center; margin-top: var(--spacing-2xl);">
                 <a href="#" class="btn btn-outline">Voir tous les témoignages</a>
             </div>
         </div>
     </section>

     <script>
         // Script pour le carrousel de témoignages
         document.addEventListener('DOMContentLoaded', function() {
             const carousel = document.querySelector('.testimonials-carousel');
             const slides = document.querySelectorAll('.testimonial-slide');
             const prevBtn = document.querySelector('.testimonial-prev');
             const nextBtn = document.querySelector('.testimonial-next');
             const progressPoints = document.querySelectorAll('.testimonial-progress-point');

             let currentIndex = 0;
             const slideWidth = 100; // En pourcentage

             // Initialisation
             updateCarousel();

             // Navigation par boutons
             prevBtn.addEventListener('click', function() {
                 if (currentIndex > 0) {
                     currentIndex--;
                     updateCarousel();
                 }
             });

             nextBtn.addEventListener('click', function() {
                 if (currentIndex < slides.length - 1) {
                     currentIndex++;
                     updateCarousel();
                 }
             });

             // Navigation par points
             progressPoints.forEach((point, index) => {
                 point.addEventListener('click', function() {
                     currentIndex = index;
                     updateCarousel();
                 });
             });

             // Mise à jour du carrousel
             function updateCarousel() {
                 // Déplacement du carrousel
                 carousel.style.transform = `translateX(-${currentIndex * slideWidth}%)`;

                 // Mise à jour des points de progression
                 progressPoints.forEach((point, index) => {
                     if (index === currentIndex) {
                         point.classList.add('active');
                     } else {
                         point.classList.remove('active');
                     }
                 });

                 // Ajustement des boutons précédent/suivant
                 prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
                 nextBtn.style.opacity = currentIndex === slides.length - 1 ? '0.5' : '1';
             }

             // Défilement automatique (optionnel)
             let autoSlide = setInterval(function() {
                 if (currentIndex < slides.length - 1) {
                     currentIndex++;
                 } else {
                     currentIndex = 0;
                 }
                 updateCarousel();
             }, 5000);

             // Pause du défilement automatique au survol
             carousel.addEventListener('mouseenter', function() {
                 clearInterval(autoSlide);
             });

             carousel.addEventListener('mouseleave', function() {
                 autoSlide = setInterval(function() {
                     if (currentIndex < slides.length - 1) {
                         currentIndex++;
                     } else {
                         currentIndex = 0;
                     }
                     updateCarousel();
                 }, 5000);
             });
         });
     </script>

     <!-- CTA Section - Style App Mobile -->
     <section class="cta">
         <div class="container">
             <style>
                 /* Styles pour CTA mobile */
                 .cta-mobile-container {
                     position: relative;
                     z-index: 1;
                     overflow: hidden;
                     border-radius: var(--radius-xl);
                     box-shadow: var(--shadow-lg);
                 }

                 .cta-mobile-wrapper {
                     background: var(--gradient-primary);
                     padding: var(--spacing-2xl) var(--spacing-xl);
                     position: relative;
                     overflow: hidden;
                 }

                 .cta-mobile-decoration {
                     position: absolute;
                     border-radius: 50%;
                     background: rgba(255, 255, 255, 0.1);
                     z-index: 0;
                 }

                 .cta-mobile-decoration-1 {
                     width: 300px;
                     height: 300px;
                     top: -150px;
                     right: -100px;
                 }

                 .cta-mobile-decoration-2 {
                     width: 200px;
                     height: 200px;
                     bottom: -100px;
                     left: -80px;
                 }

                 .cta-mobile-decoration-3 {
                     width: 80px;
                     height: 80px;
                     top: 50%;
                     right: 20%;
                     opacity: 0.2;
                 }

                 .cta-mobile-content {
                     position: relative;
                     z-index: 2;
                     max-width: 600px;
                     margin: 0 auto;
                     text-align: center;
                 }

                 .cta-mobile-badge {
                     display: inline-block;
                     padding: 0.5rem 1rem;
                     background-color: rgba(255, 255, 255, 0.2);
                     color: var(--white);
                     border-radius: var(--radius-full);
                     margin-bottom: var(--spacing-md);
                     font-weight: 500;
                     font-size: 0.85rem;
                     backdrop-filter: blur(5px);
                     -webkit-backdrop-filter: blur(5px);
                 }

                 .cta-mobile-title {
                     font-size: 2.5rem;
                     margin-bottom: var(--spacing-md);
                     color: var(--white);
                     line-height: 1.2;
                     font-weight: 800;
                 }

                 .cta-mobile-subtitle {
                     font-size: 1.1rem;
                     margin-bottom: var(--spacing-xl);
                     color: rgba(255, 255, 255, 0.9);
                     font-weight: 400;
                 }

                 .cta-mobile-features {
                     display: flex;
                     flex-wrap: wrap;
                     justify-content: center;
                     gap: var(--spacing-md);
                     margin-bottom: var(--spacing-xl);
                 }

                 .cta-mobile-feature {
                     display: flex;
                     align-items: center;
                     background: rgba(255, 255, 255, 0.15);
                     padding: 0.5rem 1rem;
                     border-radius: var(--radius-full);
                     color: var(--white);
                     font-size: 0.85rem;
                     backdrop-filter: blur(5px);
                     -webkit-backdrop-filter: blur(5px);
                 }

                 .cta-mobile-feature i {
                     margin-right: var(--spacing-sm);
                     font-size: 1rem;
                 }

                 .cta-mobile-action {
                     display: flex;
                     flex-direction: column;
                     gap: var(--spacing-md);
                     max-width: 400px;
                     margin: 0 auto;
                 }

                 .cta-mobile-main-btn {
                     background-color: var(--white);
                     color: var(--primary-color);
                     border-radius: var(--radius-lg);
                     padding: 1rem 1.5rem;
                     font-weight: 600;
                     font-size: 1.1rem;
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                     transition: var(--transition-normal);
                     gap: var(--spacing-sm);
                 }

                 .cta-mobile-main-btn:hover {
                     transform: translateY(-3px);
                     box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                 }

                 .cta-mobile-main-btn i {
                     transition: transform 0.3s ease;
                 }

                 .cta-mobile-main-btn:hover i {
                     transform: translateX(5px);
                 }

                 .cta-mobile-secondary-btn {
                     background-color: transparent;
                     color: var(--white);
                     border: 1px solid rgba(255, 255, 255, 0.3);
                     border-radius: var(--radius-lg);
                     padding: 0.75rem 1.5rem;
                     font-weight: 500;
                     font-size: 1rem;
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     transition: var(--transition-normal);
                 }

                 .cta-mobile-secondary-btn:hover {
                     background-color: rgba(255, 255, 255, 0.1);
                 }

                 .cta-mobile-footer {
                     margin-top: var(--spacing-lg);
                     color: rgba(255, 255, 255, 0.7);
                     font-size: 0.85rem;
                     text-align: center;
                 }

                 .cta-mobile-brands {
                     display: flex;
                     justify-content: center;
                     align-items: center;
                     gap: var(--spacing-xl);
                     margin-top: var(--spacing-xl);
                     padding-top: var(--spacing-lg);
                     border-top: 1px solid rgba(255, 255, 255, 0.1);
                 }

                 .cta-mobile-brand {
                     color: rgba(255, 255, 255, 0.8);
                     font-weight: 600;
                     font-size: 0.9rem;
                     letter-spacing: 0.05em;
                 }

                 /* Animation */
                 @keyframes float {

                     0%,
                     100% {
                         transform: translateY(0);
                     }

                     50% {
                         transform: translateY(-10px);
                     }
                 }

                 .cta-mobile-decoration-3 {
                     animation: float 4s ease-in-out infinite;
                 }

                 /* Compteur chiffres */
                 .cta-counter-container {
                     display: flex;
                     justify-content: center;
                     gap: var(--spacing-xl);
                     margin-top: var(--spacing-2xl);
                     flex-wrap: wrap;
                 }

                 .cta-counter-item {
                     text-align: center;
                     min-width: 150px;
                 }

                 .cta-counter-value {
                     font-size: 2.5rem;
                     font-weight: 700;
                     color: var(--primary-color);
                     margin-bottom: var(--spacing-xs);
                     line-height: 1;
                     position: relative;
                     display: inline-block;
                 }

                 .cta-counter-value::after {
                     content: '+';
                     position: absolute;
                     top: 0;
                     right: -20px;
                     font-size: 1.5rem;
                     color: var(--primary-light);
                 }

                 .cta-counter-label {
                     font-size: 1rem;
                     color: var(--dark-gray);
                     font-weight: 500;
                 }

                 /* Responsive design */
                 @media (max-width: 768px) {
                     .cta-mobile-title {
                         font-size: 2rem;
                     }

                     .cta-mobile-features {
                         flex-direction: column;
                         align-items: center;
                     }

                     .cta-counter-container {
                         gap: var(--spacing-lg);
                     }

                     .cta-counter-item {
                         min-width: 120px;
                     }
                 }
             </style>

             <div class="cta-mobile-container">
                 <div class="cta-mobile-wrapper">
                     <!-- Décorations d'arrière-plan -->
                     <div class="cta-mobile-decoration cta-mobile-decoration-1"></div>
                     <div class="cta-mobile-decoration cta-mobile-decoration-2"></div>
                     <div class="cta-mobile-decoration cta-mobile-decoration-3"></div>

                     <div class="cta-mobile-content">
                         <div class="cta-mobile-badge">
                             <i class="fas fa-gift"></i> Offre spéciale nouveaux clients
                         </div>

                         <h2 class="cta-mobile-title">Essayez Afrilavage dès aujourd'hui</h2>
                         <p class="cta-mobile-subtitle">Profitez de 20% de réduction sur votre première commande et
                             rejoignez des milliers de clients satisfaits au Maroc.</p>

                         <div class="cta-mobile-features">
                             <div class="cta-mobile-feature">
                                 <i class="fas fa-check-circle"></i>
                                 <span>Sans engagement</span>
                             </div>
                             <div class="cta-mobile-feature">
                                 <i class="fas fa-clock"></i>
                                 <span>Livraison sous 48h</span>
                             </div>
                             <div class="cta-mobile-feature">
                                 <i class="fas fa-shield-alt"></i>
                                 <span>Satisfait ou remboursé</span>
                             </div>
                         </div>

                         <div class="cta-mobile-action">
                             <a href="{{ route('order') }}" class="cta-mobile-main-btn">
                                 Commander maintenant
                                 <i class="fas fa-arrow-right"></i>
                             </a>
                             
                             <a href="{{ route('contact') }}" class="cta-mobile-secondary-btn">
                                 <i class="fas fa-headset"></i>
                                 Besoin d'aide ?
                             </a>
                         </div>

                         <div class="cta-mobile-footer">
                             Offre valable pour une durée limitée. Conditions générales applicables.
                         </div>

                         <div class="cta-mobile-brands">
                             <div class="cta-mobile-brand">CONFIANCE</div>
                             <div class="cta-mobile-brand">QUALITÉ</div>
                             <div class="cta-mobile-brand">PREMIUM</div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Statistiques -->
             <div class="cta-counter-container">
                 <div class="cta-counter-item">
                     <div class="cta-counter-value" data-count="25000">25000</div>
                     <div class="cta-counter-label">Clients satisfaits</div>
                 </div>
                 <div class="cta-counter-item">
                     <div class="cta-counter-value" data-count="250">250</div>
                     <div class="cta-counter-label">Experts en nettoyage</div>
                 </div>
                 <div class="cta-counter-item">
                     <div class="cta-counter-value" data-count="98">98</div>
                     <div class="cta-counter-label">% de satisfaction</div>
                 </div>
                 <div class="cta-counter-item">
                     <div class="cta-counter-value" data-count="12">12</div>
                     <div class="cta-counter-label">Villes desservies</div>
                 </div>
             </div>
         </div>
     </section>

     <script>
         // Animation des compteurs
         document.addEventListener('DOMContentLoaded', function() {
             const counterElements = document.querySelectorAll('.cta-counter-value');
             const animationDuration = 2000; // 2 secondes
             const frameDuration = 1000 / 60; // 60 fps

             // Fonction pour animation fluide des compteurs
             function animateCounter(el, target) {
                 const frames = animationDuration / frameDuration;
                 const increment = target / frames;
                 let current = 0;

                 const counter = setInterval(() => {
                     current += increment;
                     const value = Math.floor(current);

                     if (current >= target) {
                         el.textContent = target;
                         clearInterval(counter);
                     } else {
                         el.textContent = value;
                     }
                 }, frameDuration);
             }

             // Observer pour démarrer l'animation quand les éléments sont visibles
             const observer = new IntersectionObserver((entries) => {
                 entries.forEach(entry => {
                     if (entry.isIntersecting) {
                         const target = parseInt(entry.target.getAttribute('data-count'));
                         animateCounter(entry.target, target);
                         observer.unobserve(entry.target);
                     }
                 });
             }, {
                 threshold: 0.5
             });

             // Observer chaque compteur
             counterElements.forEach(counter => {
                 observer.observe(counter);
             });
         });
     </script>

     <!-- FAQ Section - Style app mobile -->
     <section class="faq section">
         <div class="container">
             <div class="section-header">
                 <div class="section-subtitle">Questions fréquentes</div>
                 <h2 class="section-title">Besoin d'aide ?</h2>
                 <p class="section-description">Trouvez des réponses aux questions les plus fréquemment posées
                     concernant nos services.</p>
             </div>

             <style>
                 /* Styles pour FAQ app mobile */
                 .faq-container {
                     margin-top: var(--spacing-xl);
                 }

                 .faq-search {
                     position: relative;
                     margin-bottom: var(--spacing-xl);
                 }

                 .faq-search-input {
                     width: 100%;
                     padding: 1rem 1rem 1rem 3rem;
                     border: 1px solid var(--light-gray);
                     border-radius: var(--radius-full);
                     font-size: 1rem;
                     transition: var(--transition-normal);
                     box-shadow: var(--shadow-sm);
                 }

                 .faq-search-input:focus {
                     outline: none;
                     border-color: var(--primary-color);
                     box-shadow: var(--shadow-focus);
                 }

                 .faq-search-icon {
                     position: absolute;
                     left: 1rem;
                     top: 50%;
                     transform: translateY(-50%);
                     color: var(--dark-gray);
                     pointer-events: none;
                 }

                 .faq-categories {
                     display: flex;
                     justify-content: center;
                     gap: var(--spacing-md);
                     margin-bottom: var(--spacing-xl);
                     flex-wrap: wrap;
                 }

                 .faq-category {
                     padding: 0.75rem 1.25rem;
                     background-color: var(--white);
                     border: 1px solid var(--light-gray);
                     border-radius: var(--radius-full);
                     cursor: pointer;
                     transition: var(--transition-normal);
                     font-size: 0.9rem;
                     font-weight: 500;
                     display: flex;
                     align-items: center;
                     gap: var(--spacing-sm);
                 }

                 .faq-category.active {
                     background-color: var(--primary-color);
                     color: var(--white);
                     border-color: var(--primary-color);
                 }

                 .faq-category:hover:not(.active) {
                     background-color: var(--primary-bg);
                     border-color: var(--primary-color);
                 }

                 .faq-mobile-list {
                     margin-top: var(--spacing-xl);
                 }

                 .faq-mobile-item {
                     background-color: var(--white);
                     border-radius: var(--radius-lg);
                     box-shadow: var(--shadow-sm);
                     margin-bottom: var(--spacing-md);
                     overflow: hidden;
                     transition: var(--transition-normal);
                     border-left: 3px solid transparent;
                 }

                 .faq-mobile-item:hover {
                     box-shadow: var(--shadow-md);
                 }

                 .faq-mobile-item.active {
                     border-left-color: var(--primary-color);
                     box-shadow: var(--shadow-md);
                 }

                 .faq-mobile-question {
                     padding: var(--spacing-lg);
                     display: flex;
                     justify-content: space-between;
                     align-items: center;
                     cursor: pointer;
                     user-select: none;
                 }

                 .faq-mobile-question-text {
                     font-weight: 600;
                     font-size: 1.1rem;
                     color: var(--secondary-color);
                     max-width: 90%;
                 }

                 .faq-mobile-item.active .faq-mobile-question-text {
                     color: var(--primary-color);
                 }

                 .faq-mobile-toggle {
                     width: 24px;
                     height: 24px;
                     border-radius: 50%;
                     background-color: var(--light-gray);
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     color: var(--dark-gray);
                     transition: var(--transition-normal);
                     font-size: 0.7rem;
                 }

                 .faq-mobile-item.active .faq-mobile-toggle {
                     background-color: var(--primary-color);
                     color: var(--white);
                     transform: rotate(180deg);
                 }

                 .faq-mobile-answer {
                     padding: 0 var(--spacing-lg) var(--spacing-lg);
                     color: var(--dark-gray);
                     line-height: 1.6;
                     max-height: 0;
                     overflow: hidden;
                     transition: max-height 0.5s ease, padding 0.3s ease;
                 }

                 .faq-mobile-item.active .faq-mobile-answer {
                     max-height: 500px;
                     padding: 0 var(--spacing-lg) var(--spacing-lg);
                 }

                 .faq-mobile-meta {
                     display: flex;
                     align-items: center;
                     justify-content: space-between;
                     margin-top: var(--spacing-md);
                     padding-top: var(--spacing-md);
                     border-top: 1px solid var(--light-gray);
                     font-size: 0.8rem;
                     color: var(--dark-gray);
                 }

                 .faq-mobile-helpful {
                     display: flex;
                     align-items: center;
                     gap: var(--spacing-lg);
                 }

                 .faq-mobile-helpful-btn {
                     display: flex;
                     align-items: center;
                     gap: var(--spacing-xs);
                     cursor: pointer;
                     transition: var(--transition-normal);
                     background: none;
                     border: none;
                     color: var(--dark-gray);
                     padding: 0.25rem 0.5rem;
                     border-radius: var(--radius-sm);
                 }

                 .faq-mobile-helpful-btn:hover {
                     color: var(--primary-color);
                     background-color: var(--primary-bg);
                 }

                 .faq-mobile-date {
                     font-style: italic;
                 }

                 .faq-more-container {
                     text-align: center;
                     margin-top: var(--spacing-xl);
                 }

                 .faq-more-btn {
                     padding: 0.75rem 1.5rem;
                     background-color: var(--white);
                     border: 1px solid var(--light-gray);
                     border-radius: var(--radius-lg);
                     display: inline-flex;
                     align-items: center;
                     gap: var(--spacing-sm);
                     font-weight: 500;
                     transition: var(--transition-normal);
                 }

                 .faq-more-btn:hover {
                     background-color: var(--primary-bg);
                     border-color: var(--primary-color);
                     color: var(--primary-color);
                 }

                 .faq-contact {
                     margin-top: var(--spacing-2xl);
                     background-color: var(--primary-bg);
                     border-radius: var(--radius-lg);
                     padding: var(--spacing-xl);
                     display: flex;
                     align-items: center;
                     justify-content: space-between;
                     flex-wrap: wrap;
                     gap: var(--spacing-lg);
                 }

                 .faq-contact-text {
                     flex: 1;
                     min-width: 250px;
                 }

                 .faq-contact-title {
                     font-size: 1.5rem;
                     margin-bottom: var(--spacing-sm);
                     color: var(--secondary-color);
                 }

                 .faq-contact-desc {
                     color: var(--dark-gray);
                     margin-bottom: 0;
                 }

                 .faq-contact-actions {
                     display: flex;
                     gap: var(--spacing-md);
                     flex-wrap: wrap;
                 }

                 .faq-contact-btn {
                     padding: 0.75rem 1.5rem;
                     border-radius: var(--radius-md);
                     font-weight: 500;
                     display: flex;
                     align-items: center;
                     gap: var(--spacing-sm);
                     transition: var(--transition-normal);
                 }

                 .faq-contact-btn-primary {
                     background-color: var(--primary-color);
                     color: var(--white);
                 }

                 .faq-contact-btn-primary:hover {
                     background-color: var(--primary-dark);
                     transform: translateY(-2px);
                     box-shadow: var(--shadow-md);
                 }

                 .faq-contact-btn-outline {
                     background-color: transparent;
                     color: var(--primary-color);
                     border: 1px solid var(--primary-color);
                 }

                 .faq-contact-btn-outline:hover {
                     background-color: var(--primary-bg);
                     transform: translateY(-2px);
                 }

                 /* Badge FAQ populaire */
                 .faq-mobile-popular {
                     display: inline-flex;
                     align-items: center;
                     padding: 0.25rem 0.5rem;
                     background-color: var(--accent-bg);
                     color: var(--accent-dark);
                     border-radius: var(--radius-full);
                     font-size: 0.7rem;
                     font-weight: 600;
                     margin-left: var(--spacing-md);
                     line-height: 1;
                     vertical-align: middle;
                 }

                 /* Animation pour le déploiement des réponses */
                 @keyframes slideDown {
                     from {
                         max-height: 0;
                         opacity: 0;
                     }

                     to {
                         max-height: 500px;
                         opacity: 1;
                     }
                 }

                 .faq-mobile-item.active .faq-mobile-answer {
                     animation: slideDown 0.5s ease forwards;
                 }
             </style>

             <div class="faq-container">
                 <div class="faq-search">
                     <input type="text" class="faq-search-input" placeholder="Rechercher une question..."
                         id="faqSearch">
                     <i class="fas fa-search faq-search-icon"></i>
                 </div>

                 <div class="faq-categories">
                     <div class="faq-category active" data-category="all">
                         <i class="fas fa-th-large"></i>
                         <span>Toutes les questions</span>
                     </div>
                     <div class="faq-category" data-category="service">
                         <i class="fas fa-tshirt"></i>
                         <span>Services</span>
                     </div>
                     <div class="faq-category" data-category="delivery">
                         <i class="fas fa-truck"></i>
                         <span>Livraison</span>
                     </div>
                     <div class="faq-category" data-category="account">
                         <i class="fas fa-user"></i>
                         <span>Compte</span>
                     </div>
                     <div class="faq-category" data-category="payment">
                         <i class="fas fa-credit-card"></i>
                         <span>Paiement</span>
                     </div>
                 </div>

                 <div class="faq-mobile-list">
                     <!-- Question 1 -->
                     <div class="faq-mobile-item active" data-category="delivery">
                         <div class="faq-mobile-question">
                             <div class="faq-mobile-question-text">
                                 Comment fonctionne le service de collecte et livraison ?
                                 <span class="faq-mobile-popular">Populaire</span>
                             </div>
                             <div class="faq-mobile-toggle">
                                 <i class="fas fa-chevron-down"></i>
                             </div>
                         </div>
                         <div class="faq-mobile-answer">
                             <p>Notre service de collecte et livraison est disponible dans toutes les grandes villes du
                                 Maroc. Lorsque vous passez une commande, vous choisissez une plage horaire qui vous
                                 convient, et notre équipe vient récupérer vos articles à l'adresse indiquée. Une fois
                                 le service terminé, nous vous livrons vos articles propres à la même adresse ou à une
                                 autre de votre choix.</p>

                             <p>Étapes du processus :</p>
                             <ol>
                                 <li>Vous passez commande via notre site ou application</li>
                                 <li>Vous sélectionnez une plage horaire pour la collecte</li>
                                 <li>Notre livreur récupère vos articles</li>
                                 <li>Nous traitons votre commande dans notre centre</li>
                                 <li>Nous vous livrons vos articles propres</li>
                             </ol>

                             <div class="faq-mobile-meta">
                                 <div class="faq-mobile-helpful">
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         <span>Utile (48)</span>
                                     </button>
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-down"></i>
                                         <span>Pas utile (2)</span>
                                     </button>
                                 </div>
                                 <div class="faq-mobile-date">Mis à jour le 10 avril 2023</div>
                             </div>
                         </div>
                     </div>

                     <!-- Question 2 -->
                     <div class="faq-mobile-item" data-category="service">
                         <div class="faq-mobile-question">
                             <div class="faq-mobile-question-text">
                                 Quels types de vêtements acceptez-vous ?
                             </div>
                             <div class="faq-mobile-toggle">
                                 <i class="fas fa-chevron-down"></i>
                             </div>
                         </div>
                         <div class="faq-mobile-answer">
                             <p>Nous acceptons tous types de vêtements : vêtements du quotidien, costumes, robes,
                                 vêtements en soie, cachemire, laine, etc. Nous avons des processus spécifiques pour
                                 chaque type de textile afin de garantir un nettoyage optimal tout en préservant la
                                 qualité de vos vêtements.</p>

                             <p>Nos services spécialisés incluent :</p>
                             <ul>
                                 <li>Nettoyage à sec pour les vêtements délicats</li>
                                 <li>Lavage et repassage pour les vêtements quotidiens</li>
                                 <li>Traitement des taches tenaces</li>
                                 <li>Nettoyage des articles en cuir</li>
                                 <li>Nettoyage des couettes et couvertures</li>
                                 <li>Service de blanchisserie pour les draps et serviettes</li>
                             </ul>

                             <div class="faq-mobile-meta">
                                 <div class="faq-mobile-helpful">
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         <span>Utile (35)</span>
                                     </button>
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-down"></i>
                                         <span>Pas utile (1)</span>
                                     </button>
                                 </div>
                                 <div class="faq-mobile-date">Mis à jour le 15 mars 2023</div>
                             </div>
                         </div>
                     </div>

                     <!-- Question 3 -->
                     <div class="faq-mobile-item" data-category="service">
                         <div class="faq-mobile-question">
                             <div class="faq-mobile-question-text">
                                 Combien coûte le service de lavage auto ?
                             </div>
                             <div class="faq-mobile-toggle">
                                 <i class="fas fa-chevron-down"></i>
                             </div>
                         </div>
                         <div class="faq-mobile-answer">
                             <p>Les tarifs du lavage auto varient en fonction du type de véhicule et du niveau de
                                 service choisi. Les prix commencent à 120 DH pour un lavage extérieur standard d'une
                                 voiture compacte, jusqu'à 350 DH pour un nettoyage complet intérieur/extérieur d'un SUV
                                 ou d'un véhicule de grande taille.</p>

                             <p>Grille tarifaire :</p>
                             <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                                 <thead style="background-color: var(--primary-bg);">
                                     <tr>
                                         <th
                                             style="padding: 10px; text-align: left; border-bottom: 1px solid var(--light-gray);">
                                             Type de véhicule</th>
                                         <th
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             Lavage extérieur</th>
                                         <th
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             Lavage intérieur</th>
                                         <th
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             Lavage complet</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td style="padding: 10px; border-bottom: 1px solid var(--light-gray);">
                                             Citadine</td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             60 DH</td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             80 DH</td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             120 DH</td>
                                     </tr>
                                     <tr>
                                         <td style="padding: 10px; border-bottom: 1px solid var(--light-gray);">Berline
                                         </td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             80 DH</td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             100 DH</td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             150 DH</td>
                                     </tr>
                                     <tr>
                                         <td style="padding: 10px; border-bottom: 1px solid var(--light-gray);">SUV /
                                             4x4</td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             100 DH</td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             120 DH</td>
                                         <td
                                             style="padding: 10px; text-align: right; border-bottom: 1px solid var(--light-gray);">
                                             180 DH</td>
                                     </tr>
                                 </tbody>
                             </table>

                             <p>Options supplémentaires :</p>
                             <ul>
                                 <li>Protection céramique : +100 DH</li>
                                 <li>Traitement anti-bactérien : +30 DH</li>
                                 <li>Nettoyage des jantes : +20 DH</li>
                                 <li>Polissage : +50 DH</li>
                             </ul>

                             <div class="faq-mobile-meta">
                                 <div class="faq-mobile-helpful">
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         <span>Utile (61)</span>
                                     </button>
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-down"></i>
                                         <span>Pas utile (3)</span>
                                     </button>
                                 </div>
                                 <div class="faq-mobile-date">Mis à jour le 5 mai 2023</div>
                             </div>
                         </div>
                     </div>

                     <!-- Question 4 -->
                     <div class="faq-mobile-item" data-category="account">
                         <div class="faq-mobile-question">
                             <div class="faq-mobile-question-text">
                                 Comment puis-je suivre ma commande ?
                             </div>
                             <div class="faq-mobile-toggle">
                                 <i class="fas fa-chevron-down"></i>
                             </div>
                         </div>
                         <div class="faq-mobile-answer">
                             <p>Vous pouvez suivre l'état de votre commande en temps réel sur notre site web ou notre
                                 application mobile. Il vous suffit de vous connecter à votre compte et d'accéder à la
                                 section "Mes commandes" ou d'utiliser la fonction "Suivi" en saisissant votre numéro de
                                 commande. Vous recevrez également des notifications par SMS ou e-mail à chaque étape du
                                 processus.</p>

                             <p>Les étapes de suivi incluent :</p>
                             <ol>
                                 <li><strong>Commande reçue</strong> - Votre commande a été enregistrée dans notre
                                     système</li>
                                 <li><strong>Collecte planifiée</strong> - Un livreur a été affecté à votre commande
                                 </li>
                                 <li><strong>En route pour la collecte</strong> - Le livreur est en chemin vers votre
                                     adresse</li>
                                 <li><strong>Articles collectés</strong> - Vos articles ont été récupérés</li>
                                 <li><strong>En traitement</strong> - Vos articles sont en cours de nettoyage</li>
                                 <li><strong>Prêt pour livraison</strong> - Vos articles sont prêts à être livrés</li>
                                 <li><strong>En cours de livraison</strong> - Le livreur est en route pour vous livrer
                                 </li>
                                 <li><strong>Livré</strong> - La commande a été livrée avec succès</li>
                             </ol>

                             <div class="faq-mobile-meta">
                                 <div class="faq-mobile-helpful">
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         <span>Utile (42)</span>
                                     </button>
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-down"></i>
                                         <span>Pas utile (0)</span>
                                     </button>
                                 </div>
                                 <div class="faq-mobile-date">Mis à jour le 22 avril 2023</div>
                             </div>
                         </div>
                     </div>

                     <!-- Question 5 -->
                     <div class="faq-mobile-item" data-category="service">
                         <div class="faq-mobile-question">
                             <div class="faq-mobile-question-text">
                                 Que faire en cas de problème avec mes vêtements ?
                             </div>
                             <div class="faq-mobile-toggle">
                                 <i class="fas fa-chevron-down"></i>
                             </div>
                         </div>
                         <div class="faq-mobile-answer">
                             <p>En cas de problème avec vos vêtements après le service, nous vous invitons à nous
                                 contacter dans les 48 heures suivant la livraison. Notre équipe examinera le problème
                                 et proposera une solution adaptée. Nous offrons une garantie satisfaction sur tous nos
                                 services et, en cas de dommage avéré, nous vous proposons une compensation conforme à
                                 notre politique de remboursement.</p>

                             <p>Pour signaler un problème, vous pouvez :</p>
                             <ul>
                                 <li>Nous appeler au +212 522 123 456</li>
                                 <li>Nous envoyer un e-mail à support@afrilavage.com</li>
                                 <li>Utiliser la fonction "Signaler un problème" dans votre compte client</li>
                                 <li>Contacter directement votre livreur via l'application</li>
                             </ul>

                             <p>Notre équipe d'assistance est disponible 7j/7 de 8h à 22h pour répondre à vos questions
                                 et résoudre tout problème éventuel.</p>

                             <div class="faq-mobile-meta">
                                 <div class="faq-mobile-helpful">
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         <span>Utile (29)</span>
                                     </button>
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-down"></i>
                                         <span>Pas utile (1)</span>
                                     </button>
                                 </div>
                                 <div class="faq-mobile-date">Mis à jour le 18 avril 2023</div>
                             </div>
                         </div>
                     </div>

                     <!-- Question 6 -->
                     <div class="faq-mobile-item" data-category="payment">
                         <div class="faq-mobile-question">
                             <div class="faq-mobile-question-text">
                                 Quels modes de paiement acceptez-vous ?
                             </div>
                             <div class="faq-mobile-toggle">
                                 <i class="fas fa-chevron-down"></i>
                             </div>
                         </div>
                         <div class="faq-mobile-answer">
                             <p>Nous acceptons plusieurs modes de paiement pour vous offrir un maximum de flexibilité :
                             </p>

                             <ul>
                             
                                 <li><strong>Paiement à la livraison</strong> : Espèces ou carte bancaire via TPE mobile
                                 </li>
                                
                             </ul>

                             <p>Tous nos paiements en ligne sont sécurisés par une plateforme de paiement certifiée. Vos
                                 données bancaires ne sont jamais stockées sur nos serveurs.</p>

                             <div class="faq-mobile-meta">
                                 <div class="faq-mobile-helpful">
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-up"></i>
                                         <span>Utile (38)</span>
                                     </button>
                                     <button class="faq-mobile-helpful-btn">
                                         <i class="fas fa-thumbs-down"></i>
                                         <span>Pas utile (0)</span>
                                     </button>
                                 </div>
                                 <div class="faq-mobile-date">Mis à jour le 28 mars 2023</div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="faq-more-container">
                     <a href="faq.html" class="faq-more-btn">
                         <span>Voir toutes les questions</span>
                         <i class="fas fa-arrow-right"></i>
                     </a>
                 </div>

                 <div class="faq-contact">
                     <div class="faq-contact-text">
                         <h3 class="faq-contact-title">Vous n'avez pas trouvé votre réponse ?</h3>
                         <p class="faq-contact-desc">Notre équipe d'assistance est disponible 7j/7 pour répondre à
                             toutes vos questions.</p>
                     </div>
                     <div class="faq-contact-actions">
                         <a href="contact.html" class="faq-contact-btn faq-contact-btn-primary">
                             <i class="fas fa-headset"></i>
                             <span>Contacter le support</span>
                         </a>
                         <a href="tel:+212522123456" class="faq-contact-btn faq-contact-btn-outline">
                             <i class="fas fa-phone-alt"></i>
                             <span>+212 522 123 456</span>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <script>
         // Script pour la section FAQ
         document.addEventListener('DOMContentLoaded', function() {
             // Toggle pour les questions/réponses
             const faqItems = document.querySelectorAll('.faq-mobile-item');

             faqItems.forEach(item => {
                 const question = item.querySelector('.faq-mobile-question');

                 question.addEventListener('click', function() {
                     // Fermer toutes les autres questions
                     faqItems.forEach(otherItem => {
                         if (otherItem !== item && otherItem.classList.contains('active')) {
                             otherItem.classList.remove('active');
                         }
                     });

                     // Toggle l'état actif
                     item.classList.toggle('active');
                 });
             });

             // Filtrage par catégorie
             const categoryButtons = document.querySelectorAll('.faq-category');

             categoryButtons.forEach(button => {
                 button.addEventListener('click', function() {
                     // Désactiver tous les boutons
                     categoryButtons.forEach(btn => btn.classList.remove('active'));

                     // Activer le bouton cliqué
                     this.classList.add('active');

                     const category = this.getAttribute('data-category');

                     // Filtrer les FAQs
                     faqItems.forEach(item => {
                         if (category === 'all' || item.getAttribute('data-category') ===
                             category) {
                             item.style.display = 'block';
                         } else {
                             item.style.display = 'none';
                         }
                     });
                 });
             });

             // Recherche dans les FAQs
             const searchInput = document.getElementById('faqSearch');

             if (searchInput) {
                 searchInput.addEventListener('input', function() {
                     const searchTerm = this.value.toLowerCase();

                     if (searchTerm.length > 2) {
                         faqItems.forEach(item => {
                             const questionText = item.querySelector('.faq-mobile-question-text')
                                 .textContent.toLowerCase();
                             const answerText = item.querySelector('.faq-mobile-answer').textContent
                                 .toLowerCase();

                             if (questionText.includes(searchTerm) || answerText.includes(
                                 searchTerm)) {
                                 item.style.display = 'block';
                             } else {
                                 item.style.display = 'none';
                             }
                         });
                     } else if (searchTerm.length === 0) {
                         // Réinitialiser l'affichage si le champ est vide
                         faqItems.forEach(item => {
                             item.style.display = 'block';
                         });
                     }
                 });
             }

             // Gestion des boutons "Utile" / "Pas utile"
             const helpfulButtons = document.querySelectorAll('.faq-mobile-helpful-btn');

             helpfulButtons.forEach(button => {
                 button.addEventListener('click', function(e) {
                     e.stopPropagation(); // Empêcher la propagation au parent

                     // Animation de clic
                     this.style.transform = 'scale(1.1)';
                     setTimeout(() => {
                         this.style.transform = 'scale(1)';
                     }, 200);

                     // Ici on pourrait ajouter une logique pour enregistrer le vote
                     const voteType = this.querySelector('i').classList.contains('fa-thumbs-up') ?
                         'up' : 'down';
                     const currentCount = parseInt(this.querySelector('span').textContent.match(
                         /\d+/)[0]);

                     // Incrémenter le compteur (pour la démonstration)
                     this.querySelector('span').textContent = this.querySelector('span').textContent
                         .replace(
                             /\d+/, (currentCount + 1)
                         );

                     // Désactiver le bouton après vote
                     this.style.opacity = '0.7';
                     this.style.pointerEvents = 'none';
                 });
             });
         });
     </script>

     <!-- Footer -->
     @include('clients.layouts.footer')

     <!-- Bouton retour en haut -->
     <div class="back-to-top" id="backToTop">
         <i class="fas fa-chevron-up"></i>
     </div>

     <!-- Script principal -->
     <script>
         // Navigation mobile
         const mobileToggle = document.getElementById('mobileToggle');
         const navMenu = document.getElementById('navMenu');

         if (mobileToggle && navMenu) {
             mobileToggle.addEventListener('click', function() {
                 navMenu.classList.toggle('active');
             });
         }

         // Gestion du header lors du défilement
         window.addEventListener('scroll', function() {
             const header = document.querySelector('.header');
             if (header) {
                 if (window.scrollY > 50) {
                     header.classList.add('scrolled');
                 } else {
                     header.classList.remove('scrolled');
                 }
             }

             // Gestion du bouton "retour en haut"
             const backToTopBtn = document.getElementById('backToTop');
             if (backToTopBtn) {
                 if (window.scrollY > 300) {
                     backToTopBtn.classList.add('visible');
                 } else {
                     backToTopBtn.classList.remove('visible');
                 }
             }
         });

         // Fonctionnalité du bouton "retour en haut"
         const backToTopBtn = document.getElementById('backToTop');
         if (backToTopBtn) {
             backToTopBtn.addEventListener('click', function() {
                 window.scrollTo({
                     top: 0,
                     behavior: 'smooth'
                 });
             });
         }

         // FAQ accordéon
         const faqQuestions = document.querySelectorAll('.faq-question');

         faqQuestions.forEach(question => {
             question.addEventListener('click', function() {
                 const faqItem = this.parentElement;

                 // Ferme tous les autres éléments ouverts
                 document.querySelectorAll('.faq-item').forEach(item => {
                     if (item !== faqItem) {
                         item.classList.remove('active');
                     }
                 });

                 // Ouvre ou ferme l'élément cliqué
                 faqItem.classList.toggle('active');
             });
         });
     </script>
     <!-- Scripts pour les éléments uniformisés -->
     <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
     <script src="{{ asset('assets/js/header-utils.js') }}"></script>
 </body>

 </html>
