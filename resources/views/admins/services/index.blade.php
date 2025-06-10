 @extends('admins.layouts.master')

 @section('title', 'Services')

 @section('content')
     <div class="page-header">
         <h3 class="page-title">
             <span class="page-title-icon bg-gradient-primary text-white me-2">
                 <i class="mdi mdi-cart-outline"></i>
             </span>
             Services
         </h3>
         <nav aria-label="breadcrumb">
             <ul class="breadcrumb">
                 <li class="breadcrumb-item active" aria-current="page">
                     Aperçu
                     <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                 </li>
             </ul>
         </nav>
     </div>

     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">Liste des services</h4>
                 </div>
                 <div class="card-body">
                     @if ($services->count() > 0)
                         <div class="table-responsive">
                             <table class="table table-striped table-hover">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Catégorie</th>
                                         <th>Titre</th>

                                         <th>Prix</th>
                                         <th>Unité</th>
                                         <th>Badge</th>
                                         <th>Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($services as $index => $service)
                                         <tr>
                                             <td>{{ $index + 1 }}</td>
                                             <td>{{ $service->category->name }}</td>
                                             <td>{{ $service['title'] }}</td>

                                             <td>{{ $service['price'] }} DH</td>
                                             <td>{{ $service['unit'] }}</td>
                                             <td>
                                                 @if (!empty($service['badge']))
                                                     <span class="badge bg-success">{{ $service['badge'] }}</span>
                                                 @else
                                                     -
                                                 @endif
                                             </td>

                                             <td>
                                                 <a href="#" class="btn btn-sm btn-warning"><i
                                                         class="mdi mdi-pencil"></i></a>
                                                 <a href="#" class="btn btn-sm btn-danger"><i
                                                         class="mdi mdi-delete"></i></a>
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>

                             {{-- Pagination si disponible --}}
                             @if (method_exists($services, 'links'))
                                 {{ $services->links('pagination::simple-bootstrap-5') }}
                             @endif
                         </div>
                     @else
                         <p class="text-center">Aucun service trouvé.</p>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 @endsection
