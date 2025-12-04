@extends('layouts.mechtrack')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-4">
        <h1 class="h3 mb-1">Admin Dashboard</h1>
        <p class="text-white mb-0">Overview of your mechanic workshop.</p>
    </div>

    <div class="row g-3 mb-4 text-white">
        <div class="col-6 col-md-3">
            <div class="card card-mechtrack h-100">
                <div class="card-body">
                    <h6 class=" text-uppercase mb-1">Customers</h6>
                    <h2 class="mb-0">{{ $totalCustomers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card card-mechtrack h-100">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">Vehicles</h6>
                    <h2 class="mb-0">{{ $totalVehicles }}</h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card card-mechtrack h-100">
                <div class="card-body">
                    <h6 class=" text-uppercase mb-1">Repair Orders</h6>
                    <h2 class="mb-0">{{ $totalRepairs }}</h2>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card card-mechtrack h-100">
                <div class="card-body">
                    <h6 class="text-uppercase mb-1">Total Revenue</h6>
                    <h2 class="mb-0">{{ number_format($totalRevenue, 2) }} €</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12 col-md-4">
            <a href="{{ route('admin.customers.index') }}">
                <div class="card card-mechtrack-soft h-100">
                    <div class="card-body">
                        <h5 class="card-title">Customers</h5>
                        <p class=" mb-2">View and manage customers.</p>
                        <span class="btn btn-sm btn-outline-light">Go to customers</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-4">
            <a href="{{ route('admin.vehicles.index') }}">
                <div class="card card-mechtrack-soft h-100">
                    <div class="card-body">
                        <h5 class="card-title">Vehicles</h5>
                        <p class=" mb-2">View and manage vehicles.</p>
                        <span class="btn btn-sm btn-outline-light">Go to vehicles</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-4">
            <a href="{{ route('admin.repairs.index') }}">
                <div class="card card-mechtrack-soft h-100">
                    <div class="card-body">
                        <h5 class="card-title">Repair Orders</h5>
                        <p class=" mb-2">Track repair jobs & costs.</p>
                        <span class="btn btn-sm btn-outline-light">Go to repairs</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
