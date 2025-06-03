<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Afrilavage</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/indrive-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer-enhancement.css') }}">
    <style>
        .input-with-icon {
            position: relative;
        }

        .input-with-icon input {
            width: 100%;
            padding: 12px 15px;
            padding-right: 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .input-with-icon i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .strength-meter {
            height: 5px;
            background-color: #e9e9e9;
            border-radius: 3px;
            margin-top: 8px;
            margin-bottom: 5px;
            overflow: hidden;
        }

        .strength-meter div {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-check-input {
            margin-right: 10px;
            width: 18px;
            height: 18px;
        }

        .forgot-link {
            color: var(--primary-color);
            font-weight: 500;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="nav-container">
                <a href="index.html" class="logo">
                    <span>Afri</span>lavage
                </a>
                <button class="mobile-toggle" id="mobileToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="nav-menu" id="navMenu">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a href="services.html" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="order.html" class="nav-link">Commander</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item" id="historyNavItem" style="display: none;">
                        <a href="history.html" class="nav-link">Historique</a>
                    </li>
                    <li class="nav-item" id="loginNavItem">
                        <a href="login.html" class="nav-link">Connexion</a>
                    </li>
                    <li class="nav-item" id="accountNavItem" style="display: none;">
                        <a href="dashboard.html" class="nav-link">Mon compte</a>
                    </li>
                    <li class="nav-item" id="logoutNavItem" style="display: none;">
                        <a href="#" class="nav-link" id="logoutBtn">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="auth-container slide-up">
                        <div class="auth-header">
                            <h2 class="auth-title">Créer un compte</h2>
                            <p class="auth-subtitle">Rejoignez Afrilavage pour profiter de nos services</p>
                        </div>

                        <form id="registerForm" class="auth-form">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="fullName">Nom complet</label>
                                    <div class="input-with-icon">
                                        <input type="text" id="fullName" placeholder="Votre nom complet" required>
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <div class="input-with-icon">
                                        <input type="email" id="email" placeholder="Votre adresse email" required>
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone">Téléphone</label>
                                    <div class="input-with-icon">
                                        <input type="tel" id="phone" placeholder="Votre numéro de téléphone"
                                            required>
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password">Mot de passe</label>
                                    <div class="input-with-icon">
                                        <input type="password" id="password" placeholder="Créer un mot de passe"
                                            required>
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <div class="strength-meter">
                                        <div id="strengthMeter"></div>
                                    </div>
                                    <small id="passwordStrengthText">Force du mot de passe</small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="confirmPassword">Confirmer le mot de passe</label>
                                    <div class="input-with-icon">
                                        <input type="password" id="confirmPassword"
                                            placeholder="Confirmer votre mot de passe" required>
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" id="termsCheck" class="form-check-input" required>
                                <label for="termsCheck" class="form-check-label">
                                    J'accepte les <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#termsModal">termes et conditions</a>
                                </label>
                            </div>

                            <div id="registerError" class="alert alert-danger" style="display: none;"></div>

                            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                        </form>

                        <div class="auth-footer">
                            <p>Vous avez déjà un compte? <a href="login.html">Se connecter</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms and Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Termes et Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>1. Introduction</h6>
                    <p>Bienvenue sur Afrilavage. En vous inscrivant sur notre plateforme, vous acceptez les présents
                        termes et conditions d'utilisation.</p>

                    <h6>2. Services</h6>
                    <p>Afrilavage propose des services de lavage de vêtements et de véhicules au Maroc. Nos prestataires
                        s'engagent à fournir un service de qualité dans les délais convenus.</p>

                    <h6>3. Utilisation du service</h6>
                    <p>Vous êtes responsable de l'exactitude des informations que vous fournissez lors de la commande.
                        Afrilavage ne peut être tenu responsable des erreurs résultant d'informations incorrectes.</p>

                    <h6>4. Annulation et remboursement</h6>
                    <p>Les annulations sont possibles jusqu'à 2 heures avant l'heure prévue de collecte. Passé ce délai,
                        le service sera facturé.</p>

                    <h6>5. Confidentialité</h6>
                    <p>Afrilavage s'engage à protéger vos données personnelles conformément à la législation en vigueur.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">J'ai compris</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Afrilavage</h3>
                    <p>Service de lavage premium pour vos vêtements et véhicules au Maroc.</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="footer-column">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li><a href="order.html?service=pressing">Pressing</a></li>
                        <li><a href="order.html?service=car">Lavage Auto</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Liens rapides</h3>
                    <ul class="footer-links">
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="login.html">Connexion</a></li>
                        <li><a href="register.html">Inscription</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Contact</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-envelope me-2"></i> contact@afrilavage.com</li>
                        <li><i class="fas fa-phone me-2"></i> +212 522 123 456</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Casablanca, Maroc</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="copyright">© 2023 Afrilavage. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
    <script src="{{ asset('assets/js/header-utils.js') }}"></script>
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileToggle = document.getElementById('mobileToggle');
            const navMenu = document.getElementById('navMenu');

            if (mobileToggle && navMenu) {
                mobileToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('active');
                    mobileToggle.querySelector('i').classList.toggle('fa-bars');
                    mobileToggle.querySelector('i').classList.toggle('fa-times');
                });
            }

            // Password strength meter
            const password = document.getElementById('password');
            const strengthMeter = document.getElementById('strengthMeter');
            const strengthText = document.getElementById('passwordStrengthText');

            if (password && strengthMeter && strengthText) {
                password.addEventListener('input', function() {
                    const value = this.value;
                    let strength = 0;

                    if (value.length >= 8) strength += 1;
                    if (value.match(/[a-z]+/)) strength += 1;
                    if (value.match(/[A-Z]+/)) strength += 1;
                    if (value.match(/[0-9]+/)) strength += 1;
                    if (value.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength += 1;

                    let width = (strength / 5) * 100;
                    let color = '';
                    let text = '';

                    switch (strength) {
                        case 0:
                            color = '#dc3545';
                            text = 'Très faible';
                            break;
                        case 1:
                            color = '#dc3545';
                            text = 'Faible';
                            break;
                        case 2:
                            color = '#ffc107';
                            text = 'Moyen';
                            break;
                        case 3:
                            color = '#28a745';
                            text = 'Bon';
                            break;
                        case 4:
                            color = '#28a745';
                            text = 'Fort';
                            break;
                        case 5:
                            color = '#20c997';
                            text = 'Très fort';
                            break;
                    }

                    strengthMeter.style.width = width + '%';
                    strengthMeter.style.backgroundColor = color;
                    strengthText.textContent = `Force du mot de passe: ${text}`;
                    strengthText.style.color = color;
                });
            }
        });
    </script>
    <!-- Scripts pour les éléments uniformisés -->
    <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
    <script src="{{ asset('assets/js/header-utils.js') }}"></script>
</body>

</html>
