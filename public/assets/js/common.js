document.addEventListener('DOMContentLoaded', function() {
    // Check if user is logged in
    updateNavigation();
    
    // Set up logout functionality
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            logout();
        });
    }
    
    // Add smooth scrolling to all links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.getAttribute('href') !== '#') {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});

// Update navigation based on login status
function updateNavigation(currentUserStr) {
    if (!currentUserStr) {
        currentUserStr = localStorage.getItem('currentUser');
    }
    
    const loginNavItem = document.getElementById('loginNavItem');
    const accountNavItem = document.getElementById('accountNavItem');
    const historyNavItem = document.getElementById('historyNavItem');
    const logoutNavItem = document.getElementById('logoutNavItem');
    
    if (currentUserStr) {
        // User is logged in
        if (loginNavItem) loginNavItem.style.display = 'none';
        if (accountNavItem) accountNavItem.style.display = 'block';
        if (historyNavItem) historyNavItem.style.display = 'block';
        if (logoutNavItem) logoutNavItem.style.display = 'block';
    } else {
        // User is logged out
        if (loginNavItem) loginNavItem.style.display = 'block';
        if (accountNavItem) accountNavItem.style.display = 'none';
        if (historyNavItem) historyNavItem.style.display = 'none';
        if (logoutNavItem) logoutNavItem.style.display = 'none';
    }
}

// Logout function
function logout() {
    localStorage.removeItem('currentUser');
    localStorage.removeItem('orders');
    updateNavigation();
    window.location.href = 'index.html';
}

// Format date function
function formatDate(dateString) {
    if (!dateString) return '-';
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', { 
        day: '2-digit', 
        month: '2-digit', 
        year: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit' 
    });
}

// Format currency function
function formatCurrency(amount) {
    return amount.toFixed(2) + ' DH';
}

// Generate order ID
function generateOrderId() {
    return 'AF' + Math.floor(Math.random() * 10000).toString().padStart(5, '0');
}

// Get URL parameter
function getUrlParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Show alert message
function showAlert(message, type = 'danger', container = 'alertContainer') {
    const alertContainer = document.getElementById(container);
    if (alertContainer) {
        alertContainer.innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        
        // Auto hide after 5 seconds
        setTimeout(() => {
            const alertElement = document.querySelector(`#${container} .alert`);
            if (alertElement) {
                const bsAlert = new bootstrap.Alert(alertElement);
                bsAlert.close();
            }
        }, 5000);
    }
}

// Get current user
function getCurrentUser() {
    const currentUserStr = localStorage.getItem('currentUser');
    return currentUserStr ? JSON.parse(currentUserStr) : null;
}

// Save order to local storage
function saveOrder(order) {
    let orders = JSON.parse(localStorage.getItem('orders') || '[]');
    orders.push(order);
    localStorage.setItem('orders', JSON.stringify(orders));
    return order;
}

// Get orders for current user
function getUserOrders() {
    const user = getCurrentUser();
    if (!user) return [];
    
    const orders = JSON.parse(localStorage.getItem('orders') || '[]');
    return orders.filter(order => order.userId === user.id);
}

// Get order by ID
function getOrderById(orderId) {
    const orders = JSON.parse(localStorage.getItem('orders') || '[]');
    return orders.find(order => order.id === orderId);
}

// Validate email
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Validate phone number
function validatePhone(phone) {
    const re = /^(\+\d{1,3})?[\s.-]?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;
    return re.test(phone);
}

// Calculate password strength
function calculatePasswordStrength(password) {
    let strength = 0;
    
    if (password.length >= 8) strength += 1;
    if (password.match(/[a-z]+/)) strength += 1;
    if (password.match(/[A-Z]+/)) strength += 1;
    if (password.match(/[0-9]+/)) strength += 1;
    if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength += 1;
    
    return strength;
}

// Update password strength UI
function updatePasswordStrength(password, strengthMeter, strengthText) {
    const strength = calculatePasswordStrength(password);
    
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
}
