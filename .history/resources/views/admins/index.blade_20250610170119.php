@extends('admins.layouts.master')

@section('title', 'Tableau de bord')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
                <i class="mdi mdi-water-wave"></i>
            </span>
            Tableau de bord Afrilavage
        </h3>
    </div>

    <div class="row">
        {{-- Total commandes --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">
                        Commandes totales
                        <i class="mdi mdi-cart-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-4">{{ $totalOrders }}</h2>
                    <p class="card-text">Depuis la création</p>
                </div>
            </div>
        </div>

        {{-- Commandes en cours --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">
                        Commandes en cours
                        <i class="mdi mdi-timer-sand mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-4">{{ $pendingOrders }}</h2>
                    <p class="card-text">Prêtes sous 24h</p>
                </div>
            </div>
        </div>

        {{-- Revenus du mois --}}
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">
                        Revenus du mois
                        <i class="mdi mdi-cash-multiple mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-4">{{ number_format($revenueThisMonth, 2, ',', ' ') }} DH</h2>
                    <p class="card-text">Comparé au mois dernier</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Clients inscrits --}}
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info text-white">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">
                        Clients inscrits
                        <i class="mdi mdi-account-multiple mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-4">{{ $totalClients }}</h2>
                </div>
            </div>
        </div>

        {{-- Abonnements actifs --}}
        <div cl
