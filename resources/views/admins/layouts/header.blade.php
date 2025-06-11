 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
         <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
             <div class="nav-profile-image d-flex align-items-center">
                 <h4 class="m-0 font-weight-bold">
                     <span style="color: #000000;">Afri</span>
                     <span style="color: #00d25b;">Lavage</span>
                 </h4>
                 <span class="login-status online ms-2"></span>
             </div>

         </a>
         <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
             <div class="nav-profile-image d-flex align-items-center">
                 <h4 class="m-0 font-weight-bold">
                     <span style="color: #000000;">A</span>
                     <span style="color: #00d25b;">L</span>
                 </h4>
                 <span class="login-status online ms-2"></span>
             </div>
         </a>
     </div>

     <div class="navbar-menu-wrapper d-flex align-items-stretch">
         <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
             <span class="mdi mdi-menu"></span>
         </button>



         <ul class="navbar-nav navbar-nav-right">


             <!-- Fullscreen Button -->
             <li class="nav-item d-none d-lg-block full-screen-link">
                 <a class="nav-link" href="#">
                     <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                 </a>
             </li>

             @php
                 use App\Models\Notification;

                 $notifications = Notification::with('order.user')
                     ->where('is_read', false)
                     ->orderBy('created_at', 'desc')
                     ->get();
             @endphp

             <!-- Notifications Dropdown -->
             <li class="nav-item dropdown">
                 <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="mdi mdi-bell-outline"></i>
                     @if ($notifications->count() > 0)
                         <span class="count-symbol bg-danger">{{ $notifications->count() }}</span>
                     @endif
                 </a>

                 <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
                     aria-labelledby="notificationDropdown">
                     <h6 class="p-3 mb-0 text-center">Notifications</h6>
                     <div class="dropdown-divider"></div>

                     @forelse ($notifications as $notification)
                         <a href="#" class="dropdown-item preview-item">
                             <div class="preview-thumbnail">
                                 <div
                                     class="preview-icon 
                                    @switch($notification->type)
                                        @case('order_created') bg-success @break
                                        @case('order_update') bg-warning @break
                                        @case('payment') bg-info @break
                                        @default bg-secondary
                                    @endswitch
                                ">
                                     <i class="mdi mdi-bell-ring"></i>
                                 </div>
                             </div>
                             <div class="preview-item-content d-flex flex-column justify-content-center">
                                 <h6 class="preview-subject font-weight-bold mb-1">{{ $notification->title }}</h6>
                                 <small class="text-muted mb-1">
                                     Commande par : <span
                                         class="text-primary">{{ $notification->order->user->username ?? 'Client inconnu' }}</span>
                                 </small>
                                 <small class="text-muted mb-1">
                                     Date commande :
                                     {{ $notification->order->created_at->format('d/m/Y H:i') ?? 'N/A' }}
                                 </small>
                                 <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                 {{-- <button class="btn-read-notification btn btn-sm btn-primary"
                                     data-id="{{ $notification->id }}" title="Marquer comme lu">
                                     <i class="mdi mdi-eye"></i>
                                 </button> --}}
                                 <button class="btn btn-sm btn-outline-success btn-read-notification m-2"
                                     data-id="{{ $notification->id }}" title="Marquer comme lu">
                                     <i class="mdi mdi-eye-check-outline"></i> Lire
                                 </button>


                             </div>
                         </a>
                         <div class="dropdown-divider"></div>
                     @empty
                         <p class="text-center p-3 mb-0">Aucune notification</p>
                     @endforelse
                 </div>
             </li>

             <!-- Profile Dropdown -->
             <li class="nav-item nav-profile dropdown">
                 <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                     aria-expanded="false">

                     <div class="nav-profile-text">
                         <p class="mb-1 text-black">{{ Auth::user()->username }}</p>
                     </div>
                 </a>
                 <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </div>
             </li>

         </ul>

         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
             data-toggle="offcanvas">
             <span class="mdi mdi-menu"></span>
         </button>
     </div>
 </nav>
 