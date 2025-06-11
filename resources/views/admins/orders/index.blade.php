 @extends('admins.layouts.master')

 @section('title', 'Orders')

 @section('content')
     <div class="page-header">
         <h3 class="page-title">
             <span class="page-title-icon bg-gradient-primary text-white me-2">
                 <i class="mdi mdi-cart-outline"></i>
             </span>
             Orders
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
                     <h4 class="card-title">Liste des commandes</h4>
                 </div>
                 <div class="card-body">
                     @if ($orders->count() > 0)
                         <div class="table-responsive">
                             <table class="table table-striped table-hover">
                                 <thead>
                                     <tr>
                                         <th>#ID</th>
                                         <th>Client</th>
                                         <th>Service</th>
                                         <th>Date prévue</th>
                                         <th>Créneau horaire</th>
                                         <th>Status</th>
                                         <th>Total</th>
                                         <th>Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($orders as $order)
                                         <tr>
                                             <td>{{ $order->id }}</td>
                                             <td>{{ $order->user->username ?? 'N/A' }}</td>
                                             <td>{{ ucfirst($order->service_type) }}</td>
                                             <td>{{ \Carbon\Carbon::parse($order->scheduled_date)->format('d/m/Y') }}</td>
                                             <td>{{ $order->time_slot }}</td>
                                             <td>
                                                 @if ($order->status == 'pending')
                                                     <span class="badge bg-warning text-dark">En attente</span>
                                                 @elseif ($order->status == 'completed')
                                                     <span class="badge bg-success">Terminée</span>
                                                 @elseif ($order->status == 'canceled')
                                                     <span class="badge bg-danger">Annulée</span>
                                                 @else
                                                     <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                                 @endif
                                             </td>
                                             <td>{{ number_format($order->total_price, 2, ',', ' ') }} €</td>
                                             <td>
                                                 <button type="button" class="btn btn-info btn-sm view-order-btn"
                                                     data-id="{{ $order->id }}">
                                                     <i class="mdi mdi-eye"></i>
                                                 </button>

                                                 {{-- <a href="{{ route('orders.edit', $order->id) }}"
                                                     class="btn btn-warning btn-sm" title="Modifier"
                                                     aria-label="Modifier la commande {{ $order->id }}">
                                                     <i class="mdi mdi-pencil"></i>
                                                 </a> --}}
                                                 <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                     class="d-inline-block"
                                                     onsubmit="return confirm('Confirmer la suppression ?');">
                                                     @csrf
                                                     @method('DELETE')
                                                     <button class="btn btn-danger btn-sm" title="Supprimer"
                                                         aria-label="Supprimer la commande {{ $order->id }}"
                                                         type="submit">
                                                         <i class="mdi mdi-delete"></i>
                                                     </button>
                                                 </form>
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>

                             <!-- Modal -->
                             <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel"
                                 aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title">Détails de la commande</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                 aria-label="Fermer"></button>
                                         </div>
                                         <div class="modal-body" id="orderModalBody">
                                             <!-- AJAX HTML goes here -->
                                         </div>
                                     </div>
                                 </div>
                             </div>


                             {{-- Pagination si tu utilises paginate --}}
                             {{ $orders->links() }}

                         </div>
                     @else
                         <p class="text-center">Aucune commande trouvée.</p>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 @endsection
 @section('scripts')
     <script>
         $(document).ready(function() {
             $('.view-order-btn').on('click', function() {
                 let orderId = $(this).data('id');
                 let modal = new bootstrap.Modal($('#orderModal'));
                 let modalBody = $('#orderModalBody');

                 modal.show();

                 modalBody.html(`
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </div>
            `);

                 $.ajax({
                     url: `/orders/${orderId}`,
                     method: 'GET',
                     dataType: 'json',
                     success: function(response) {
                         modalBody.html(response.html);
                     },
                     error: function(xhr, status, error) {
                         modalBody.html(`<p class="text-danger">Erreur lors du chargement.</p>`);
                         console.error(error);
                     }
                 });
             });
         });
     </script>
 @endsection
