@extends('layouts.mechtrack')

@section('title', 'Customer History')

@section('content')
    <div class="mb-3">
        <h1 class="h3">Customer & Repair History</h1>
        <p class="">View all customers, their vehicles, and repair orders</p>
    </div>

    <!-- Search Bar -->
    <div class="mb-3">
        <form action="{{ route('admin.customers.history') }}" method="GET" class="row g-2">
            <div class="col">
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search by customer name, phone, email, car make, model, or license plate..."
                    class="form-control"
                >
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-amber">
                    Search
                </button>
            </div>
            @if($search)
                <div class="col-auto">
                    <a href="{{ route('admin.customers.history') }}" class="btn btn-outline-light">
                        Clear
                    </a>
                </div>
            @endif
        </form>
    </div>

    @if($search)
        <div class="mb-3 text-white">
            Showing results for: <strong>{{ $search }}</strong> ({{ $customers->total() }} customers found)
        </div>
    @endif

    <!-- Customer List -->
    @if($customers->count() > 0)
        @foreach($customers as $customer)
            <div class="card card-mechtrack mb-3">
                <!-- Customer Header -->
                <div class="card-header" style="background-color: #1a1d29; border-bottom: 2px solid #fbbf24;">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="mb-2 fw-bold text-white">{{ $customer->name }}</h5>
                            <div class="small text-white">
                                @if($customer->phone)
                                    <div>📞 {{ $customer->phone }}</div>
                                @endif
                                @if($customer->email)
                                    <div>✉️ {{ $customer->email }}</div>
                                @endif
                                @if($customer->address)
                                    <div>📍 {{ $customer->address }}</div>
                                @endif
                            </div>
                        </div>
                        <span class="badge bg-amber text-dark">
                            {{ $customer->vehicles->count() }} Vehicle(s)
                        </span>
                    </div>
                </div>

                <!-- Vehicles and Repair Orders -->
                <div class="card-body">
                    @if($customer->vehicles->count() > 0)
                        @foreach($customer->vehicles as $vehicle)
                            <div class="mb-4 pb-4 {{ !$loop->last ? 'border-bottom border-secondary' : '' }}">
                                <!-- Vehicle Info -->
                                <div class="card card-mechtrack mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="fw-bold mb-2 text-white">
                                                    🚗 {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                                </h6>
                                                <div class="small text-white">
                                                    <div><strong>License Plate:</strong> {{ $vehicle->license_plate }}</div>
                                                    @if($vehicle->vin)
                                                        <div><strong>VIN:</strong> {{ $vehicle->vin }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <span class="badge bg-amber text-dark">
                                                {{ $vehicle->repairOrders->count() }} Repair(s)
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Repair Orders -->
                                @if($vehicle->repairOrders->count() > 0)
                                    <div class="ms-3">
                                        <h6 class="small fw-bold text-uppercase mb-2 text-white">Repair History:</h6>
                                        @foreach($vehicle->repairOrders as $order)
                                            <div class="card card-mechtrack mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1 text-white">{{ $order->title }}</h6>
                                                            @if($order->description)
                                                                <p class="small mb-0 text-white">{{ $order->description }}</p>
                                                            @endif
                                                        </div>
                                                        <span class="badge ms-2
                                                            @if($order->status === 'completed') bg-success
                                                            @elseif($order->status === 'in_progress') bg-warning text-dark
                                                            @elseif($order->status === 'pending') bg-secondary
                                                            @else bg-danger
                                                            @endif">
                                                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                                        </span>
                                                    </div>

                                                    <div class="d-flex justify-content-between align-items-center mt-2 small text-white">
                                                        <div>
                                                            <span class="me-3">📅 Started: {{ $order->started_at ? \Carbon\Carbon::parse($order->started_at)->format('M d, Y') : 'N/A' }}</span>
                                                            @if($order->completed_at)
                                                                <span>✅ Completed: {{ \Carbon\Carbon::parse($order->completed_at)->format('M d, Y') }}</span>
                                                            @endif
                                                        </div>
                                                        @if($order->total_cost)
                                                            <span class="fw-bold text-white">€{{ number_format($order->total_cost, 2) }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="ms-3 small text-white fst-italic">No repair orders yet</p>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <p class="text-white fst-italic mb-0">No vehicles registered for this customer</p>
                    @endif
                </div>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-3">
            {{ $customers->links() }}
        </div>
    @else
        <div class="card card-mechtrack">
            <div class="card-body text-center py-5">
                @if($search)
                    <h5 class="mb-2 text-white">No results found</h5>
                    <p class="text-white mb-0">Try adjusting your search terms</p>
                @else
                    <h5 class="mb-2 text-white">No customers yet</h5>
                    <p class="text-white mb-0">Customer history will appear here once you add customers and vehicles</p>
                @endif
            </div>
        </div>
    @endif
@endsection
