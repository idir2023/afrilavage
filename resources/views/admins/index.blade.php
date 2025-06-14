@extends('admins.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>

    <div class="row">
        @if (auth()->user()->role == 'admin')
            {{-- Services --}}
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('admin/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">
                            Services
                            <i class="mdi mdi-briefcase-check mdi-24px float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $totalServices }}</h2>
                        <h6 class="card-text">Total Services disponibles</h6>
                    </div>
                </div>
            </div>

            {{-- Contacts --}}
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('admin/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">
                            Contacts
                            <i class="mdi mdi-email-outline mdi-24px float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $totalContacts }}</h2>
                        <h6 class="card-text">Messages reçus</h6>
                    </div>
                </div>
            </div>

            {{-- Orders --}}
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('admin/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">
                            Commandes
                            <i class="mdi mdi-cart-outline mdi-24px float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $totalOrders }}</h2>
                        <h6 class="card-text">Commandes enregistrées</h6>
                    </div>
                </div>
            </div>

            {{-- Notifications --}}
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-warning card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('admin/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">
                            Notifications
                            <i class="mdi mdi-bell-ring mdi-24px float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $totalNotifications }}</h2>
                        <h6 class="card-text">Notifications actives</h6>
                    </div>
                </div>
            </div>
        @elseif(auth()->user()->role == 'customer')
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">📦 Mes Commandes</h5>
                        <span class="badge bg-light text-dark">{{ $myOrders->count() }} commandes</span>
                    </div>
                    <div class="card-body p-0">
                        @if ($myOrders->isEmpty())
                            <div class="p-4 text-center">
                                <p class="mb-0 text-muted">Aucune commande trouvée.</p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>ID de Commande</th>
                                            <th>Date de Commande</th>
                                            <th>Statut</th>
                                            <th>Montant Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myOrders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                                <td>{{ $order->created_at->format('d/m/Y à H:i') }}</td>
                                                <td>
                                                    @php
                                                        $colors = [
                                                            'pending' => 'warning',
                                                            'confirmed' => 'info',
                                                            'collected' => 'primary',
                                                            'in_progress' => 'secondary',
                                                            'ready' => 'dark',
                                                            'delivered' => 'success',
                                                            'completed' => 'success',
                                                            'cancelled' => 'danger',
                                                        ];
                                                    @endphp
                                                    <span class="badge bg-{{ $colors[$order->status] ?? 'secondary' }}">
                                                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                                    </span>
                                                </td>
                                                <td>{{ number_format($order->total_price, 2) }} MAD</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
