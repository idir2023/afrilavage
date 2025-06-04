 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Connexion | Afrilavage</title>
     <!-- Polices Google -->
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <!-- CSS personnalisé -->
     <link rel="stylesheet" href="{{ asset('assets/css/indrive-style.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/footer-enhancement.css') }}">
     <style>
         /* Styles spécifiques à la page de connexion */
         body {
             background-color: var(--off-white);
         }

         .login-container {
             max-width: 420px;
             margin: 80px auto;
             padding: 0 var(--spacing-lg);
         }

         .login-card {
             background-color: var(--white);
             border-radius: var(--radius-xl);
             box-shadow: var(--shadow-lg);
             overflow: hidden;
             position: relative;
         }

         .login-header {
             background: var(--gradient-primary);
             padding: var(--spacing-xl) var(--spacing-xl) var(--spacing-2xl);
             text-align: center;
             position: relative;
         }

         .login-header::before {
             content: '';
             position: absolute;
             top: -50px;
             right: -50px;
             width: 150px;
             height: 150px;
             background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
             border-radius: 50%;
         }

         .login-header::after {
             content: '';
             position: absolute;
             bottom: -30px;
             left: -30px;
             width: 100px;
             height: 100px;
             background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
             border-radius: 50%;
         }

         .login-logo {
             font-size: 1.8rem;
             font-weight: 800;
             color: var(--white);
             margin-bottom: var(--spacing-md);
             display: inline-block;
             position: relative;
             z-index: 2;
         }

         .login-logo span {
             color: rgba(255, 255, 255, 0.85);
         }

         .login-title {
             color: var(--white);
             font-size: 1.8rem;
             margin-bottom: var(--spacing-sm);
             position: relative;
             z-index: 2;
         }

         .login-subtitle {
             color: rgba(255, 255, 255, 0.85);
             font-size: 1rem;
             position: relative;
             z-index: 2;
         }

         .login-body {
             padding: var(--spacing-2xl);
         }

         .login-tabs {
             display: flex;
             margin-bottom: var(--spacing-xl);
             position: relative;
             border-bottom: 1px solid var(--light-gray);
         }

         .login-tab {
             flex: 1;
             text-align: center;
             padding: var(--spacing-md) var(--spacing-md);
             cursor: pointer;
             color: var(--dark-gray);
             font-weight: 500;
             position: relative;
             transition: var(--transition-normal);
         }

         .login-tab.active {
             color: var(--primary-color);
         }

         .login-tab.active::after {
             content: '';
             position: absolute;
             left: 0;
             bottom: -1px;
             width: 100%;
             height: 2px;
             background-color: var(--primary-color);
             border-top-left-radius: 2px;
             border-top-right-radius: 2px;
         }

         .login-form-container {
             position: relative;
         }

         .login-form {
             display: none;
         }

         .login-form.active {
             display: block;
             animation: fadeIn 0.5s ease forwards;
         }

         .form-group {
             margin-bottom: var(--spacing-lg);
         }

         .form-label {
             font-weight: 500;
             margin-bottom: var(--spacing-xs);
             display: block;
             color: var(--secondary-color);
         }

         .form-control-icon {
             position: relative;
         }

         .form-control-icon input {
             padding-left: 3rem;
         }

         .form-control-icon i {
             position: absolute;
             left: 1rem;
             top: 50%;
             transform: translateY(-50%);
             color: var(--dark-gray);
         }

         .form-input {
             width: 100%;
             padding: 0.85rem 1rem;
             border: 1px solid var(--light-gray);
             border-radius: var(--radius-md);
             font-size: 1rem;
             transition: var(--transition-normal);
             background-color: var(--white);
         }

         .form-input:focus {
             border-color: var(--primary-color);
             box-shadow: var(--shadow-focus);
             outline: none;
         }

         .form-input.error {
             border-color: var(--danger);
         }

         .form-helper {
             display: block;
             margin-top: var(--spacing-xs);
             font-size: 0.85rem;
             color: var(--dark-gray);
         }

         .form-error {
             color: var(--danger);
             font-size: 0.85rem;
             margin-top: var(--spacing-xs);
             display: none;
         }

         .form-error.visible {
             display: block;
             animation: fadeIn 0.3s ease;
         }

         .password-toggle {
             position: absolute;
             right: 1rem;
             top: 50%;
             transform: translateY(-50%);
             color: var(--dark-gray);
             cursor: pointer;
             z-index: 2;
         }

         .form-options {
             display: flex;
             justify-content: space-between;
             align-items: center;
             margin-bottom: var(--spacing-lg);
         }

         .form-checkbox {
             display: flex;
             align-items: center;
         }

         .form-checkbox input {
             width: 18px;
             height: 18px;
             margin-right: var(--spacing-xs);
             accent-color: var(--primary-color);
         }

         .form-checkbox label {
             font-size: 0.9rem;
             color: var(--dark-gray);
             cursor: pointer;
         }

         .forgot-password {
             color: var(--primary-color);
             font-size: 0.9rem;
             text-decoration: none;
             font-weight: 500;
         }

         .forgot-password:hover {
             text-decoration: underline;
         }

         .login-btn {
             width: 100%;
             padding: 0.85rem;
             background-color: var(--primary-color);
             color: var(--white);
             border: none;
             border-radius: var(--radius-md);
             font-size: 1rem;
             font-weight: 600;
             cursor: pointer;
             transition: var(--transition-normal);
             display: flex;
             align-items: center;
             justify-content: center;
             gap: var(--spacing-sm);
         }

         .login-btn:hover {
             background-color: var(--primary-dark);
             transform: translateY(-2px);
             box-shadow: var(--shadow-md);
         }

         .login-btn:active {
             transform: translateY(0);
         }

         .login-divider {
             display: flex;
             align-items: center;
             margin: var(--spacing-xl) 0;
             color: var(--dark-gray);
             font-size: 0.9rem;
         }

         .login-divider::before,
         .login-divider::after {
             content: '';
             flex: 1;
             height: 1px;
             background-color: var(--light-gray);
         }

         .login-divider::before {
             margin-right: var(--spacing-md);
         }

         .login-divider::after {
             margin-left: var(--spacing-md);
         }

         .social-logins {
             display: grid;
             grid-template-columns: 1fr 1fr;
             gap: var(--spacing-md);
             margin-bottom: var(--spacing-lg);
         }

         .social-login-btn {
             display: flex;
             align-items: center;
             justify-content: center;
             gap: var(--spacing-sm);
             padding: 0.75rem;
             border-radius: var(--radius-md);
             font-weight: 500;
             font-size: 0.9rem;
             transition: var(--transition-normal);
             border: 1px solid var(--light-gray);
             background-color: var(--white);
             color: var(--secondary-color);
         }

         .social-login-btn:hover {
             background-color: var(--off-white);
             transform: translateY(-2px);
         }

         .facebook-btn {
             color: #4267B2;
             border-color: #4267B2;
         }

         .facebook-btn:hover {
             background-color: rgba(66, 103, 178, 0.1);
         }

         .google-btn {
             color: #DB4437;
             border-color: #DB4437;
         }

         .google-btn:hover {
             background-color: rgba(219, 68, 55, 0.1);
         }

         .login-footer {
             text-align: center;
             margin-top: var(--spacing-lg);
             color: var(--dark-gray);
             font-size: 0.9rem;
         }

         .login-footer a {
             color: var(--primary-color);
             font-weight: 500;
         }

         .login-footer a:hover {
             text-decoration: underline;
         }

         /* Animation de chargement pour le bouton */
         .login-btn.loading {
             pointer-events: none;
             position: relative;
         }

         .login-btn.loading .btn-text {
             visibility: hidden;
         }

         .login-btn.loading::after {
             content: "";
             position: absolute;
             width: 20px;
             height: 20px;
             border: 2px solid transparent;
             border-top-color: var(--white);
             border-radius: 50%;
             animation: spin 0.8s linear infinite;
         }

         @keyframes spin {
             0% {
                 transform: rotate(0deg);
             }

             100% {
                 transform: rotate(360deg);
             }
         }

         /* Animation pour validation du formulaire */
         @keyframes shake {

             0%,
             100% {
                 transform: translateX(0);
             }

             10%,
             30%,
             50%,
             70%,
             90% {
                 transform: translateX(-5px);
             }

             20%,
             40%,
             60%,
             80% {
                 transform: translateX(5px);
             }
         }

         .shake {
             animation: shake 0.5s ease;
         }

         /* Affichage de l'indicateur de force du mot de passe */
         .password-strength {
             height: 5px;
             margin-top: var(--spacing-sm);
             border-radius: var(--radius-sm);
             background-color: var(--light-gray);
             overflow: hidden;
         }

         .password-strength-meter {
             height: 100%;
             width: 0;
             transition: width 0.3s ease, background-color 0.3s ease;
         }

         .strength-text {
             font-size: 0.8rem;
             margin-top: var(--spacing-xs);
             text-align: right;
         }

         .strength-weak {
             background-color: var(--danger);
             width: 25%;
         }

         .strength-medium {
             background-color: var(--warning);
             width: 50%;
         }

         .strength-good {
             background-color: var(--primary-color);
             width: 75%;
         }

         .strength-strong {
             background-color: var(--success);
             width: 100%;
         }

         /* Animation de succès */
         .login-success {
             display: none;
             text-align: center;
             padding: var(--spacing-xl) 0;
         }

         .login-success.show {
             display: block;
             animation: fadeIn 0.5s ease;
         }

         .success-icon {
             width: 80px;
             height: 80px;
             background-color: var(--primary-color);
             color: var(--white);
             border-radius: 50%;
             display: flex;
             align-items: center;
             justify-content: center;
             font-size: 2.5rem;
             margin: 0 auto var(--spacing-lg);
         }

         .success-title {
             font-size: 1.5rem;
             color: var(--secondary-color);
             margin-bottom: var(--spacing-sm);
         }

         .success-message {
             color: var(--dark-gray);
             margin-bottom: var(--spacing-xl);
         }

         .success-btn {
             background-color: var(--primary-color);
             color: var(--white);
             padding: 0.75rem 1.5rem;
             border-radius: var(--radius-md);
             font-weight: 500;
             display: inline-block;
             transition: var(--transition-normal);
         }

         .success-btn:hover {
             background-color: var(--primary-dark);
             transform: translateY(-2px);
             box-shadow: var(--shadow-md);
         }
     </style>
 </head>

 <body>
     <!-- En-tête -->
     @include('clients.layouts.header')
     <!-- Conteneur principal de la page -->
     <main>
         <div class="login-container">
             <div class="login-card">
                 <!-- En-tête de la carte de connexion -->
                 <div class="login-header">
                     <a href="index.html" class="login-logo">
                         <span>Afri</span>lavage
                     </a>
                     <h1 class="login-title">Bienvenue</h1>
                     <p class="login-subtitle">Connectez-vous pour accéder à votre compte</p>
                 </div>

                 <!-- Corps de la carte de connexion -->
                 <div class="login-body">
                     <!-- Onglets Connexion/Inscription -->
                     <div class="login-tabs">
                         <div class="login-tab active" data-tab="login">Connexion</div>
                         <div class="login-tab" data-tab="register">Inscription</div>
                     </div>

                     @if ($errors->any())
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif

                     <!-- Formulaires -->
                     <div class="login-form-container">
                         <!-- Formulaire de connexion -->
                         <form method="POST" action="{{ route('login') }}" class="login-form active" id="loginForm">
                             @csrf
                             <div class="form-group">
                                 <label for="loginEmail" class="form-label">Email</label>
                                 <div class="form-control-icon">
                                     <input type="email" id="loginEmail" class="form-input" name="email"
                                         placeholder="Votre adresse email" required>
                                     <i class="fas fa-envelope"></i>
                                 </div>
                                 <div class="form-error" id="loginEmailError">Veuillez entrer une adresse email valide.
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label for="loginPassword" class="form-label">Mot de passe</label>
                                 <div class="form-control-icon">
                                     <input type="password" id="loginPassword" name="password" class="form-input"
                                         placeholder="Votre mot de passe" required>
                                     <i class="fas fa-lock"></i>
                                     <span class="password-toggle" id="loginTogglePassword">
                                         <i class="fas fa-eye"></i>
                                     </span>
                                 </div>
                                 <div class="form-error" id="loginPasswordError">Veuillez entrer votre mot de passe.
                                 </div>
                             </div>

                             <div class="form-options">
                                 <div class="form-checkbox">
                                     <input type="checkbox" id="rememberMe">
                                     <label for="rememberMe">Se souvenir de moi</label>
                                 </div>
                                 <a href="#" class="forgot-password">Mot de passe oublié ?</a>
                             </div>

                             <button type="submit" class="login-btn" id="loginButton">
                                 <span class="btn-text">Se connecter</span>
                                 <i class="fas fa-arrow-right"></i>
                             </button>
                         </form>

                         <!-- Formulaire d'inscription -->
                         <form class="login-form" method="POST" action="{{ route('register') }}" id="registerForm">
                             @csrf

                             {{-- Nom complet --}}
                             <div class="form-group">
                                 <label for="registerName" class="form-label">Nom complet</label>
                                 <div class="form-control-icon">
                                     <input type="text" id="registerName" name="username" class="form-input"
                                         placeholder="Votre nom complet" value="{{ old('username') }}" required>
                                     <i class="fas fa-user"></i>
                                 </div>
                                 @error('username')
                                     <div class="form-error">{{ $message }}</div>
                                 @enderror
                             </div>

                             {{-- Email --}}
                             <div class="form-group">
                                 <label for="registerEmail" class="form-label">Email</label>
                                 <div class="form-control-icon">
                                     <input type="email" id="registerEmail" name="email" class="form-input"
                                         placeholder="Votre adresse email" value="{{ old('email') }}" required>
                                     <i class="fas fa-envelope"></i>
                                 </div>
                                 @error('email')
                                     <div class="form-error">{{ $message }}</div>
                                 @enderror
                             </div>

                             {{-- Téléphone --}}
                             <div class="form-group">
                                 <label for="registerPhone" class="form-label">Téléphone</label>
                                 <div class="form-control-icon">
                                     <input type="tel" id="registerPhone" name="phone" class="form-input"
                                         placeholder="Votre numéro de téléphone" value="{{ old('phone') }}" required>
                                     <i class="fas fa-phone"></i>
                                 </div>
                                 @error('phone')
                                     <div class="form-error">{{ $message }}</div>
                                 @enderror
                             </div>

                             {{-- Mot de passe --}}
                             <div class="form-group">
                                 <label for="registerPassword" class="form-label">Mot de passe</label>
                                 <div class="form-control-icon">
                                     <input type="password" id="registerPassword" name="password" class="form-input"
                                         placeholder="Créez un mot de passe" required>
                                     <i class="fas fa-lock"></i>
                                     <span class="password-toggle" id="registerTogglePassword">
                                         <i class="fas fa-eye"></i>
                                     </span>
                                 </div>
                                 <div class="password-strength">
                                     <div class="password-strength-meter" id="passwordStrengthMeter"></div>
                                 </div>
                                 <div class="strength-text" id="passwordStrengthText"></div>
                                 @error('password')
                                     <div class="form-error">{{ $message }}</div>
                                 @enderror
                             </div>

                             {{-- Confirmation mot de passe --}}
                             <div class="form-group">
                                 <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                                 <div class="form-control-icon">
                                     <input type="password" id="confirmPassword" name="password_confirmation"
                                         class="form-input" placeholder="Confirmer votre mot de passe" required>
                                     <i class="fas fa-lock"></i>
                                 </div>
                             </div>

                             {{-- Conditions d'utilisation --}}
                             <div class="form-group">
                                 <div class="form-checkbox">
                                     <input type="checkbox" id="termsCheckbox" name="terms"
                                         {{ old('terms') ? 'checked' : '' }} required>
                                     <label for="termsCheckbox">
                                         J'accepte les <a href="#" class="terms-link">conditions
                                             d'utilisation</a> et la
                                         <a href="#" class="privacy-link">politique de confidentialité</a>.
                                     </label>
                                 </div>
                                 @error('terms')
                                     <div class="form-error">{{ $message }}</div>
                                 @enderror
                             </div>

                             {{-- Bouton de soumission --}}
                             <button type="submit" class="login-btn" id="registerButton">
                                 <span class="btn-text">Créer un compte</span>
                                 <i class="fas fa-user-plus"></i>
                             </button>
                         </form>

                         <!-- Message de succès (caché par défaut) -->
                         <div class="login-success" id="loginSuccess">
                             <div class="success-icon">
                                 <i class="fas fa-check"></i>
                             </div>
                             <h2 class="success-title">Connexion réussie !</h2>
                             <p class="success-message">Vous allez être redirigé vers votre tableau de bord.</p>
                             <a href="dashboard.html" class="success-btn">Accéder au tableau de bord</a>
                         </div>

                         <div class="login-success" id="registerSuccess">
                             <div class="success-icon">
                                 <i class="fas fa-check"></i>
                             </div>
                             <h2 class="success-title">Inscription réussie !</h2>
                             <p class="success-message">Votre compte a été créé avec succès. Vous pouvez maintenant
                                 vous
                                 connecter.</p>
                             <button class="success-btn" id="goToLoginBtn">Se connecter</button>
                         </div>
                     </div>

                     <!-- Pied de page de la carte -->
                     <div class="login-footer" id="loginFooter">
                         Vous n'avez pas de compte ? <a href="#" id="goToRegisterLink">Inscrivez-vous</a>
                     </div>

                     <div class="login-footer" id="registerFooter" style="display: none;">
                         Vous avez déjà un compte ? <a href="#" id="goToLoginLink">Connectez-vous</a>
                     </div>
                 </div>
             </div>
         </div>
     </main>

     <!-- Script pour la page de connexion -->
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             // Éléments du DOM
             const loginTab = document.querySelector('[data-tab="login"]');
             const registerTab = document.querySelector('[data-tab="register"]');
             const loginForm = document.getElementById('loginForm');
             const registerForm = document.getElementById('registerForm');
             const goToRegisterLink = document.getElementById('goToRegisterLink');
             const goToLoginLink = document.getElementById('goToLoginLink');
             const goToLoginBtn = document.getElementById('goToLoginBtn');
             const loginFooter = document.getElementById('loginFooter');
             const registerFooter = document.getElementById('registerFooter');
             const loginSuccess = document.getElementById('loginSuccess');
             const registerSuccess = document.getElementById('registerSuccess');

             // Toggle entre les onglets Connexion/Inscription
             function showLoginTab() {
                 loginTab.classList.add('active');
                 registerTab.classList.remove('active');
                 loginForm.classList.add('active');
                 registerForm.classList.remove('active');
                 loginFooter.style.display = 'block';
                 registerFooter.style.display = 'none';
                 loginSuccess.classList.remove('show');
                 registerSuccess.classList.remove('show');
             }

             function showRegisterTab() {
                 registerTab.classList.add('active');
                 loginTab.classList.remove('active');
                 registerForm.classList.add('active');
                 loginForm.classList.remove('active');
                 registerFooter.style.display = 'block';
                 loginFooter.style.display = 'none';
                 loginSuccess.classList.remove('show');
                 registerSuccess.classList.remove('show');
             }

             loginTab.addEventListener('click', showLoginTab);
             registerTab.addEventListener('click', showRegisterTab);
             goToRegisterLink.addEventListener('click', function(e) {
                 e.preventDefault();
                 showRegisterTab();
             });
             goToLoginLink.addEventListener('click', function(e) {
                 e.preventDefault();
                 showLoginTab();
             });
             goToLoginBtn.addEventListener('click', function() {
                 showLoginTab();
                 registerSuccess.classList.remove('show');
             });

             // Toggle visibilité du mot de passe
             const loginTogglePassword = document.getElementById('loginTogglePassword');
             const registerTogglePassword = document.getElementById('registerTogglePassword');
             const loginPassword = document.getElementById('loginPassword');
             const registerPassword = document.getElementById('registerPassword');

             function togglePasswordVisibility(passwordField, toggleIcon) {
                 const icon = toggleIcon.querySelector('i');
                 if (passwordField.type === 'password') {
                     passwordField.type = 'text';
                     icon.classList.remove('fa-eye');
                     icon.classList.add('fa-eye-slash');
                 } else {
                     passwordField.type = 'password';
                     icon.classList.remove('fa-eye-slash');
                     icon.classList.add('fa-eye');
                 }
             }

             loginTogglePassword.addEventListener('click', function() {
                 togglePasswordVisibility(loginPassword, this);
             });

             registerTogglePassword.addEventListener('click', function() {
                 togglePasswordVisibility(registerPassword, this);
             });

             // Validation du formulaire de connexion
             //  loginForm.addEventListener('submit', function(e) {
             //      e.preventDefault();

             //      const email = document.getElementById('loginEmail').value;
             //      const password = document.getElementById('loginPassword').value;
             //      let isValid = true;

             //      // Validation email
             //      if (!validateEmail(email)) {
             //          showError('loginEmailError');
             //          isValid = false;
             //      } else {
             //          hideError('loginEmailError');
             //      }

             //      // Validation mot de passe
             //      if (password.length < 6) {
             //          showError('loginPasswordError');
             //          isValid = false;
             //      } else {
             //          hideError('loginPasswordError');
             //      }

             //      if (isValid) {
             //          // Simulation connexion
             //          const loginButton = document.getElementById('loginButton');
             //          loginButton.classList.add('loading');

             //          setTimeout(function() {
             //              loginButton.classList.remove('loading');
             //              loginForm.style.display = 'none';
             //              loginSuccess.classList.add('show');

             //              // Redirection simulée
             //              setTimeout(function() {
             //                  window.location.href = 'dashboard.html';
             //              }, 3000);
             //          }, 1500);
             //      } else {
             //          // Animation d'erreur
             //          loginForm.classList.add('shake');
             //          setTimeout(function() {
             //              loginForm.classList.remove('shake');
             //          }, 500);
             //      }
             //  });

             // Validation du formulaire d'inscription
             //  registerForm.addEventListener('submit', function(e) {
             //      e.preventDefault();

             //      const name = document.getElementById('registerName').value;
             //      const email = document.getElementById('registerEmail').value;
             //      const phone = document.getElementById('registerPhone').value;
             //      const password = document.getElementById('registerPassword').value;
             //      const termsCheckbox = document.getElementById('termsCheckbox');
             //      let isValid = true;

             //      // Validation nom
             //      if (name.length < 3) {
             //          showError('registerNameError');
             //          isValid = false;
             //      } else {
             //          hideError('registerNameError');
             //      }

             //      // Validation email
             //      if (!validateEmail(email)) {
             //          showError('registerEmailError');
             //          isValid = false;
             //      } else {
             //          hideError('registerEmailError');
             //      }

             //      // Validation téléphone
             //      if (!validatePhone(phone)) {
             //          showError('registerPhoneError');
             //          isValid = false;
             //      } else {
             //          hideError('registerPhoneError');
             //      }

             //      // Validation mot de passe
             //      if (!validatePassword(password)) {
             //          showError('registerPasswordError');
             //          isValid = false;
             //      } else {
             //          hideError('registerPasswordError');
             //      }

             //      // Validation conditions
             //      if (!termsCheckbox.checked) {
             //          showError('termsError');
             //          isValid = false;
             //      } else {
             //          hideError('termsError');
             //      }

             //      if (isValid) {
             //          // Simulation inscription
             //          const registerButton = document.getElementById('registerButton');
             //          registerButton.classList.add('loading');

             //          setTimeout(function() {
             //              registerButton.classList.remove('loading');
             //              registerForm.style.display = 'none';
             //              registerSuccess.classList.add('show');
             //          }, 1500);
             //      } else {
             //          // Animation d'erreur
             //          registerForm.classList.add('shake');
             //          setTimeout(function() {
             //              registerForm.classList.remove('shake');
             //          }, 500);
             //      }
             //  });

             // Fonctions utilitaires pour la validation
             function validateEmail(email) {
                 const re =
                     /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                 return re.test(String(email).toLowerCase());
             }

             function validatePhone(phone) {
                 const re = /^\+?[0-9]{8,15}$/;
                 return re.test(String(phone));
             }

             function validatePassword(password) {
                 const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
                 return re.test(String(password));
             }

             function showError(errorId) {
                 const errorElement = document.getElementById(errorId);
                 errorElement.classList.add('visible');
                 errorElement.previousElementSibling.querySelector('input').classList.add('error');
             }

             function hideError(errorId) {
                 const errorElement = document.getElementById(errorId);
                 errorElement.classList.remove('visible');
                 errorElement.previousElementSibling.querySelector('input').classList.remove('error');
             }

             // Indicateur de force du mot de passe
             const passwordInput = document.getElementById('registerPassword');
             const strengthMeter = document.getElementById('passwordStrengthMeter');
             const strengthText = document.getElementById('passwordStrengthText');

             passwordInput.addEventListener('input', function() {
                 const password = this.value;
                 const strength = calculatePasswordStrength(password);

                 strengthMeter.className = 'password-strength-meter';
                 strengthText.textContent = '';

                 if (password.length > 0) {
                     if (strength < 30) {
                         strengthMeter.classList.add('strength-weak');
                         strengthText.textContent = 'Faible';
                         strengthText.style.color = 'var(--danger)';
                     } else if (strength < 60) {
                         strengthMeter.classList.add('strength-medium');
                         strengthText.textContent = 'Moyen';
                         strengthText.style.color = 'var(--warning)';
                     } else if (strength < 80) {
                         strengthMeter.classList.add('strength-good');
                         strengthText.textContent = 'Bon';
                         strengthText.style.color = 'var(--primary-color)';
                     } else {
                         strengthMeter.classList.add('strength-strong');
                         strengthText.textContent = 'Fort';
                         strengthText.style.color = 'var(--success)';
                     }
                 }
             });

             function calculatePasswordStrength(password) {
                 let strength = 0;

                 // Longueur minimum
                 if (password.length >= 8) {
                     strength += 25;
                 } else if (password.length >= 6) {
                     strength += 10;
                 }

                 // Complexité
                 if (password.match(/[a-z]+/)) {
                     strength += 10;
                 }
                 if (password.match(/[A-Z]+/)) {
                     strength += 20;
                 }
                 if (password.match(/[0-9]+/)) {
                     strength += 20;
                 }
                 if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) {
                     strength += 25;
                 }

                 return strength;
             }

             // Navigation mobile
             const mobileToggle = document.getElementById('mobileToggle');
             const navMenu = document.getElementById('navMenu');

             if (mobileToggle && navMenu) {
                 mobileToggle.addEventListener('click', function() {
                     navMenu.classList.toggle('active');
                 });
             }
         });
     </script>
     <!-- Scripts pour les éléments uniformisés -->
     <script src="{{ asset('assets/js/footer-utils.js') }}"></script>
     <script src="{{ asset('assets/js/header-utils.js') }}"></script>
 </body>

 </html>
