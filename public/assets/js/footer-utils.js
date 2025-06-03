/**
 * Utilities pour le footer amélioré
 * Cette fonction permet d'ajouter le footer amélioré et le bouton retour en haut sur n'importe quelle page
 */

// Fonction pour initialiser le footer amélioré
function initEnhancedFooter() {
    // Ajout du CSS s'il n'est pas déjà chargé
    if (!document.querySelector('link[href="assets/css/footer-enhancement.css"]')) {
        const footerCSS = document.createElement('link');
        footerCSS.rel = 'stylesheet';
        footerCSS.href = 'assets/css/footer-enhancement.css';
        document.head.appendChild(footerCSS);
    }

    // Mise en place du bouton retour en haut s'il n'existe pas déjà
    if (!document.getElementById('backToTop')) {
        const backToTopBtn = document.createElement('div');
        backToTopBtn.className = 'back-to-top';
        backToTopBtn.id = 'backToTop';
        backToTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
        document.body.appendChild(backToTopBtn);
    }

    // Écouteur d'événement pour le défilement (afficher/masquer le bouton)
    window.addEventListener('scroll', function() {
        const backToTopBtn = document.getElementById('backToTop');
        if (backToTopBtn) {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        }
    });

    // Fonctionnalité du bouton retour en haut
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Fonction pour mettre à jour un footer existant
    function updateExistingFooter() {
        const footer = document.querySelector('footer');
        
        if (footer) {
            // Ajouter la classe pour le style amélioré
            footer.classList.add('footer-enhanced');
            
            // Mettre à jour le contenu du footer
            footer.innerHTML = `
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
                        <p>&copy; 2025 Afrilavage. Tous droits réservés.</p>
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
            `;
        }
    }

    // Mettre à jour le footer existant
    updateExistingFooter();
}

// Exécuter l'initialisation quand le DOM est chargé
document.addEventListener('DOMContentLoaded', initEnhancedFooter);