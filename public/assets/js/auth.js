document.addEventListener('DOMContentLoaded', function() {
    // Check if user is already logged in
    const currentUser = localStorage.getItem('currentUser');
    if (currentUser) {
        // If on login or register page, redirect to dashboard
        if (window.location.pathname.includes('login.html') || 
            window.location.pathname.includes('register.html')) {
            window.location.href = 'dashboard.html';
        }
    }
    
    // Initialize all auth related forms
    initLoginForm();
    initRegisterForm();
});

// Initialize login form
function initLoginForm() {
    const loginForm = document.getElementById('loginForm');
    if (!loginForm) return;
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const loginError = document.getElementById('loginError');
        
        // Validate email
        if (!validateEmail(email)) {
            loginError.textContent = 'Veuillez entrer une adresse email valide.';
            loginError.style.display = 'block';
            return;
        }
        
        // Validate password
        if (password.length < 6) {
            loginError.textContent = 'Le mot de passe doit contenir au moins 6 caractères.';
            loginError.style.display = 'block';
            return;
        }
        
        // Simulate login with local storage
        const users = JSON.parse(localStorage.getItem('users') || '[]');
        const user = users.find(u => u.email === email);
        
        if (!user) {
            loginError.textContent = 'Aucun utilisateur trouvé avec cette adresse email.';
            loginError.style.display = 'block';
            return;
        }
        
        // Simple password validation (in a real app, you'd use bcrypt or similar)
        if (user.password !== password) {
            loginError.textContent = 'Mot de passe incorrect.';
            loginError.style.display = 'block';
            return;
        }
        
        // Login successful
        const sessionUser = {
            id: user.id,
            fullName: user.fullName,
            email: user.email,
            phone: user.phone
        };
        
        localStorage.setItem('currentUser', JSON.stringify(sessionUser));
        
        // Redirect to dashboard or previous page
        const redirectUrl = getUrlParameter('redirect') || 'dashboard.html';
        window.location.href = redirectUrl;
    });
    
    // Password toggle
    const togglePassword = document.getElementById('togglePassword');
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    }
}

// Initialize registration form
function initRegisterForm() {
    const registerForm = document.getElementById('registerForm');
    if (!registerForm) return;
    
    // Password strength meter
    const password = document.getElementById('password');
    const strengthMeter = document.getElementById('strengthMeter');
    const strengthText = document.getElementById('passwordStrengthText');
    
    if (password && strengthMeter && strengthText) {
        password.addEventListener('input', function() {
            updatePasswordStrength(this.value, strengthMeter, strengthText);
        });
    }
    
    // Password toggle
    const togglePassword = document.getElementById('togglePassword');
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    }
    
    // Form submission
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const termsCheck = document.getElementById('termsCheck').checked;
        const registerError = document.getElementById('registerError');
        
        // Validate full name
        if (fullName.length < 3) {
            registerError.textContent = 'Le nom complet doit contenir au moins 3 caractères.';
            registerError.style.display = 'block';
            return;
        }
        
        // Validate email
        if (!validateEmail(email)) {
            registerError.textContent = 'Veuillez entrer une adresse email valide.';
            registerError.style.display = 'block';
            return;
        }
        
        // Validate phone
        if (!validatePhone(phone)) {
            registerError.textContent = 'Veuillez entrer un numéro de téléphone valide.';
            registerError.style.display = 'block';
            return;
        }
        
        // Validate password
        if (password.length < 6) {
            registerError.textContent = 'Le mot de passe doit contenir au moins 6 caractères.';
            registerError.style.display = 'block';
            return;
        }
        
        // Validate password strength
        if (calculatePasswordStrength(password) < 3) {
            registerError.textContent = 'Votre mot de passe est trop faible. Utilisez des lettres majuscules, minuscules, des chiffres et des caractères spéciaux.';
            registerError.style.display = 'block';
            return;
        }
        
        // Validate password match
        if (password !== confirmPassword) {
            registerError.textContent = 'Les mots de passe ne correspondent pas.';
            registerError.style.display = 'block';
            return;
        }
        
        // Validate terms
        if (!termsCheck) {
            registerError.textContent = 'Vous devez accepter les termes et conditions.';
            registerError.style.display = 'block';
            return;
        }
        
        // Check if email already exists
        const users = JSON.parse(localStorage.getItem('users') || '[]');
        if (users.some(u => u.email === email)) {
            registerError.textContent = 'Cette adresse email est déjà utilisée.';
            registerError.style.display = 'block';
            return;
        }
        
        // Create new user
        const newUser = {
            id: Date.now().toString(),
            fullName,
            email,
            phone,
            password, // In a real app, this would be hashed
            createdAt: new Date().toISOString()
        };
        
        // Save user
        users.push(newUser);
        localStorage.setItem('users', JSON.stringify(users));
        
        // Auto login
        const sessionUser = {
            id: newUser.id,
            fullName: newUser.fullName,
            email: newUser.email,
            phone: newUser.phone
        };
        
        localStorage.setItem('currentUser', JSON.stringify(sessionUser));
        
        // Redirect to dashboard
        window.location.href = 'dashboard.html';
    });
}
