 <header class="header">
     <div class="container">
         <nav class="navbar">
             <a href="{{ route('home') }}" class="logo">
                 <span>Afri</span>lavage
             </a>
             <button class="mobile-toggle" id="mobileToggle">
                 <i class="fas fa-bars"></i>
             </button>
             <ul class="nav-menu" id="navMenu">
                 <li class="nav-item">
                     <a href="{{ route('home') }}"
                         class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('service') }}"
                         class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}">Services</a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('order') }}"
                         class="nav-link {{ request()->routeIs('order') ? 'active' : '' }}">Commander</a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('tracking') }}"
                         class="nav-link {{ request()->routeIs('tracking') ? 'active' : '' }}">Suivi</a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('contact') }}"
                         class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('about') }}"
                         class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">À propos</a>
                 </li>

                 {{-- Optionnel : logique basée sur l'auth --}}
                 @auth

                     <li class="nav-item">
                         <a href="{{ route('dashboard') }}" class="nav-link">Mon compte</a>
                     </li>
                     <li class="nav-item">
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <button type="submit" class="nav-link"
                                 style="background: none; border: none; cursor: pointer;">
                                 Déconnexion
                             </button>
                         </form>
                     </li>
                 @else
                     <li class="nav-item">
                         <a href="{{ route('login') }}" class="nav-link">Connexion</a>
                     </li>
                 @endauth
             </ul>
         </nav>
     </div>
 </header>
