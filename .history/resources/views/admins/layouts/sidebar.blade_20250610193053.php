 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">

         <li class="nav-item nav-profile">
             <a href="#" class="nav-link">
             
                 <div class="nav-profile-text d-flex flex-column">
                     <span class="font-weight-bold mb-2">{{ Auth::user()->username }}</span>
                     <span class="text-secondary text-small">{{ Auth::user()->role }}</span>
                 </div>
                 <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="{{ route('dashboard') }}">
                 <span class="menu-title">Dashboard</span>
                 <i class="mdi mdi-home menu-icon"></i>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="{{ route('orders.index') }}">
                 <span class="menu-title">Orders</span>
                 {{-- <i class="mdi mdi-receipt menu-icon"></i> --}}
                 <i class="mdi mdi-cart-outline menu-icon"></i>

             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link" href="{{ route('notifications.index') }}">
                 <span class="menu-title">Notifications</span>
                 <i class="mdi mdi-bell-outline menu-icon"></i>
             </a>
         </li>


         <li class="nav-item">
             <a class="nav-link" href="{{ route('services.index') }}">
                 <span class="menu-title">Services</span>
                 <i class="mdi mdi-briefcase-outline menu-icon"></i>
             </a>
         </li>

               <li class="nav-item">
             <a class="nav-link" href="{{ route('services.index') }}">
                 <span class="menu-title">Contac</span>
                 <i class="mdi mdi-briefcase-outline menu-icon"></i>
             </a>
         </li>


     </ul>
 </nav>
