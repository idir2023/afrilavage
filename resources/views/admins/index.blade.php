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
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        {{-- Services --}}
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('admin/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                        alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Services <i class="mdi mdi-briefcase-check mdi-24px float-end"></i>
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
                    <h4 class="font-weight-normal mb-3">Contacts <i class="mdi mdi-email-outline mdi-24px float-end"></i>
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
                    <h4 class="font-weight-normal mb-3">Commandes <i class="mdi mdi-cart-outline mdi-24px float-end"></i>
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
                    <h4 class="font-weight-normal mb-3">Notifications <i class="mdi mdi-bell-ring mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{ $totalNotifications }}</h2>
                    <h6 class="card-text">Notifications actives</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
