/**
 * Utilities pour le header uniformisé
 * Cette fonction permet d'ajouter un header cohérent à toutes les pages
 */

// Fonction pour initialiser le header uniformisé
function initUniformHeader() {
    // Fonction pour mettre à jour un header existant
    // function updateExistingHeader() {
    //     const header = document.querySelector('header');
        
    //     if (header) {
    //         // Conserver la classe originale du header
    //         const originalClasses = header.className;
            
    //         // Déterminer quelle page est active
    //         const currentPage = window.location.pathname.split('/').pop();
            
    //         // Mettre à jour le contenu du header
    //         header.innerHTML = `
    //             <div class="container">
    //                 <nav class="navbar">
    //                     <a href="index.html" class="logo">
    //                         <span>Afri</span>lavage
    //                     </a>
    //                     <button class="mobile-toggle" id="mobileToggle">
    //                         <i class="fas fa-bars"></i>
    //                     </button>
    //                     <ul class="nav-menu" id="navMenu">
    //                         <li class="nav-item">
    //                             <a href="index.html" class="nav-link ${currentPage === 'index.html' || currentPage === '' ? 'active' : ''}">Accueil</a>
    //                         </li>
    //                         <li class="nav-item">
    //                             <a href="services.html" class="nav-link ${currentPage === 'services.html' ? 'active' : ''}">Services</a>
    //                         </li>
    //                         <li class="nav-item">
    //                             <a href="order.html" class="nav-link ${currentPage === 'order.html' ? 'active' : ''}">Commander</a>
    //                         </li>
    //                         <li class="nav-item">
    //                             <a href="tracking.html" class="nav-link ${currentPage === 'tracking.html' ? 'active' : ''}">Suivi</a>
    //                         </li>
    //                         <li class="nav-item">
    //                             <a href="contact.html" class="nav-link ${currentPage === 'contact.html' ? 'active' : ''}">Contact</a>
    //                         </li>
    //                         <li class="nav-item">
    //                             <a href="about.html" class="nav-link ${currentPage === 'about.html' ? 'active' : ''}">À propos</a>
    //                         </li>
    //                         <li class="nav-item" id="historyNavItem" style="display: none;">
    //                             <a href="history.html" class="nav-link ${currentPage === 'history.html' ? 'active' : ''}">Historique</a>
    //                         </li>
    //                         <li class="nav-item" id="loginNavItem">
    //                             <a href="login.html" class="nav-link ${currentPage === 'login.html' ? 'active' : ''}">Connexion</a>
    //                         </li>
    //                         <li class="nav-item" id="registerNavItem">
    //                             <a href="register.html" class="nav-link ${currentPage === 'register.html' ? 'active' : ''}">Inscription</a>
    //                         </li>
    //                         <li class="nav-item" id="dashboardNavItem" style="display: none;">
    //                             <a href="dashboard.html" class="nav-link ${currentPage === 'dashboard.html' ? 'active' : ''}">Tableau de bord</a>
    //                         </li>
    //                         <li class="nav-item" id="adminNavItem" style="display: none;">
    //                             <a href="admin.html" class="nav-link ${currentPage === 'admin.html' ? 'active' : ''}">Admin</a>
    //                         </li>
    //                         <li class="nav-item" id="logoutNavItem" style="display: none;">
    //                             <a href="#" class="nav-link" id="logoutLink">Déconnexion</a>
    //                         </li>
    //                     </ul>
    //                 </nav>
    //             </div>
    //         `;
            
    //         // Réappliquer les classes originales
    //         if (originalClasses) {
    //             header.className = originalClasses;
    //         }
            
    //         // Réinitialiser les écouteurs d'événements
    //         const mobileToggle = document.getElementById('mobileToggle');
    //         const navMenu = document.getElementById('navMenu');
            
    //         if (mobileToggle && navMenu) {
    //             mobileToggle.addEventListener('click', function() {
    //                 navMenu.classList.toggle('active');
    //             });
    //         }
            
    //         // Gestion de la déconnexion
    //         const logoutLink = document.getElementById('logoutLink');
    //         if (logoutLink) {
    //             logoutLink.addEventListener('click', function(e) {
    //                 e.preventDefault();
    //                 // Simuler une déconnexion
    //                 localStorage.removeItem('currentUser');
    //                 window.location.href = 'index.html';
    //             });
    //         }
            
    //         // Mettre à jour la navigation en fonction de l'état de connexion
    //         updateNavigationBasedOnAuth();
    //     }
    // }
    
    // Mettre à jour la navigation en fonction de l'état de connexion
    function updateNavigationBasedOnAuth() {
        // Vérifier si un utilisateur est connecté
        const currentUser = localStorage.getItem('currentUser');
        const isLoggedIn = !!currentUser;
        const isAdmin = currentUser && JSON.parse(currentUser).isAdmin;
        
        // Éléments de navigation à afficher/masquer
        const loginNavItem = document.getElementById('loginNavItem');
        const registerNavItem = document.getElementById('registerNavItem');
        const historyNavItem = document.getElementById('historyNavItem');
        const dashboardNavItem = document.getElementById('dashboardNavItem');
        const adminNavItem = document.getElementById('adminNavItem');
        const logoutNavItem = document.getElementById('logoutNavItem');
        
        if (isLoggedIn) {
            // Utilisateur connecté
            if (loginNavItem) loginNavItem.style.display = 'none';
            if (registerNavItem) registerNavItem.style.display = 'none';
            if (historyNavItem) historyNavItem.style.display = 'block';
            if (dashboardNavItem) dashboardNavItem.style.display = 'block';
            if (logoutNavItem) logoutNavItem.style.display = 'block';
            
            // Afficher le lien admin si l'utilisateur est administrateur
            if (adminNavItem) {
                adminNavItem.style.display = isAdmin ? 'block' : 'none';
            }
        } else {
            // Utilisateur non connecté
            if (loginNavItem) loginNavItem.style.display = 'block';
            if (registerNavItem) registerNavItem.style.display = 'block';
            if (historyNavItem) historyNavItem.style.display = 'none';
            if (dashboardNavItem) dashboardNavItem.style.display = 'none';
            if (adminNavItem) adminNavItem.style.display = 'none';
            if (logoutNavItem) logoutNavItem.style.display = 'none';
        }
    }
    
    // Mettre à jour le header existant
    // updateExistingHeader();
    
    // Mettre à jour lorsque le statut d'authentification change
    window.addEventListener('storage', function(e) {
        if (e.key === 'currentUser') {
            updateNavigationBasedOnAuth();
        }
    });
}

// Exécuter l'initialisation quand le DOM est chargé
document.addEventListener('DOMContentLoaded', initUniformHeader);