 @extends('admins.layouts.master')

 @section('title', 'Contacts')

 @section('content')
     <div class="page-header">
         <h3 class="page-title">
             <span class="page-title-icon bg-gradient-primary text-white me-2">
                 <i class="mdi mdi-email-outline"></i>
             </span>
             Contacts
         </h3>
         <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                 <li class="breadcrumb-item active" aria-current="page">
                     Liste des messages reçus
                     <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                 </li>
             </ul>
         </nav>
     </div>

     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">Messages de contact</h4>
                 </div>
                 <div class="card-body">
                     @if ($messages->count() > 0)
                         <div class="table-responsive">
                             <table class="table table-striped table-hover align-middle">
                                 <thead>
                                     <tr>
                                         <th>#ID</th>
                                         <th>Nom</th>
                                         <th>Email</th>
                                         <th>Téléphone</th>
                                         <th>Sujet</th>
                                         <th>Message</th>
                                         <th>Reçu le</th>
                                         <th>Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($messages as $message)
                                         <tr>
                                             <td>{{ $message->id }}</td>
                                             <td>{{ $message->name }}</td>
                                             <td>{{ $message->email }}</td>
                                             <td>{{ $message->phone ?? '—' }}</td>
                                             <td>{{ ucfirst(str_replace('-', ' ', $message->subject)) }}</td>
                                             <td class="text-truncate" style="max-width: 200px;">
                                                 {{ $message->message }}
                                             </td>
                                             <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                             <td>
                                                 {{-- Bouton Supprimer --}}
                                                 <form action="{{ route('contact.destroy', $message->id) }}" method="POST"
                                                     onsubmit="return confirm('Supprimer ce message ?');"
                                                     class="d-inline-block">
                                                     @csrf
                                                     @method('DELETE')
                                                     <button class="btn btn-danger btn-sm">
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

                                 {{ $messages->links('pagination::bootstrap-5') }}
                             </div>
                         </div>
                     @else
                         <p class="text-center">Aucun message reçu pour le moment.</p>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 @endsection
