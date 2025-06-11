 @extends('admins.layouts.master')

 @section('title', 'Notification')

 @section('content')
     <div class="page-header">
         <h3 class="page-title">
             <span class="page-title-icon bg-gradient-primary text-white me-2">
                 <i class="mdi mdi-cart-outline"></i>
             </span>
             Notification
         </h3>
         <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                 <li class="breadcrumb-item active" aria-current="page">
                     Overview
                     <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                 </li>
             </ul>
         </nav>
     </div>

     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">Liste des notifications</h4>
                 </div>
                 <div class="card-body">
                     @if ($notifications->count() > 0)
                         <div class="table-responsive">
                             <table class="table table-striped table-hover">
                                 <thead>
                                     <tr>
                                         <th>#ID</th>
                                         <th>Client</th>
                                         <th>Titre</th>
                                         <th>Message</th>
                                         <th>Commande</th>
                                         <th>Type</th>
                                         <th>Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($notifications as $notification)
                                         <tr>
                                             <td>{{ $notification->id }}</td>
                                             <td>{{ $notification->user->username ?? '-' }}</td>
                                             <td>{{ $notification->title }}</td>
                                             <td>{{ $notification->message }}</td>
                                             <td>
                                                 {{ $notification->order ? 'ORD-' . $notification->order->id : '-' }}
                                             </td>
                                             <td>{{ ucfirst($notification->type) }}</td>
                                             <td>

                                                 <form action="{{ route('notifications.destroy', $notification->id) }}"
                                                     method="POST" style="display:inline;">
                                                     @csrf
                                                     @method('DELETE')
                                                     <button class="btn btn-sm btn-danger"
                                                         onclick="return confirm('Confirmer la suppression ?')"
                                                         title="Supprimer">
                                                         <i class="mdi mdi-delete"></i>
                                                     </button>
                                                 </form>
                                             </td>

                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>

                             {{-- Pagination --}}
                             <div class="d-flex justify-content-end mt-3">
                                 {{ $notifications->links('pagination::bootstrap-5') }}
                             </div>
                         </div>
                     @else
                         <p class="text-center">Aucune notification trouvée.</p>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 @endsection
