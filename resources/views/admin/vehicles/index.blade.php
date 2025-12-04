@extends('layouts.mechtrack')

@section('title', 'Vehicles')

@section('content')
    <div class="mb-3">
        <h1 class="h3">Vehicles</h1>
        <p class="">Manage all vehicles registered in the workshop.</p>
    </div>

    <div class="mb-3">
        <a href="{{ route('admin.vehicles.create') }}" class="btn btn-amber">
            + Add New Vehicle
        </a>
    </div>

    <div class="d-none d-md-block">
        <div class="card card-mechtrack">
            <div class="card-body">
                <table class="table table-dark table-striped align-middle mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>License Plate</th>
                        <th>Owner</th>
                        <th>Make / Model</th>
                        <th>Year</th>
                        <th style="width: 180px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->license_plate }}</td>
                            <td>{{ $vehicle->customer?->name ?? 'No customer' }}</td>
                            <td>{{ $vehicle->make }} {{ $vehicle->model }}</td>
                            <td>{{ $vehicle->year }}</td>
                            <td>
                                <a href="{{ route('admin.vehicles.edit', $vehicle) }}"
                                   class="btn btn-sm btn-outline-light">
                                    Edit
                                </a>

                                <form action="{{ route('admin.vehicles.destroy', $vehicle) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this vehicle?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class=" text-center">
                                No vehicles yet.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Mobile view: cards --}}
    <div class="d-block d-md-none">
        @forelse($vehicles as $vehicle)
            <div class="card card-mechtrack mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-1">
                        {{ $vehicle->license_plate }}
                    </h5>
                    <p class="mb-1">
                        <small class="">
                            ID: {{ $vehicle->id }}
                        </small>
                    </p>

                    <p class="mb-1">
                        <strong>Owner:</strong>
                        {{ $vehicle->customer?->name ?? 'No customer' }}
                    </p>

                    <p class="mb-1">
                        <strong>Make / Model:</strong>
                        {{ $vehicle->make }} {{ $vehicle->model }}
                    </p>

                    <p class="mb-3">
                        <strong>Year:</strong>
                        {{ $vehicle->year ?? '—' }}
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.vehicles.edit', $vehicle) }}"
                           class="btn btn-sm btn-outline-light flex-grow-1">
                            Edit
                        </a>

                        <form action="{{ route('admin.vehicles.destroy', $vehicle) }}"
                              method="POST"
                              class="flex-grow-1"
                              onsubmit="return confirm('Are you sure you want to delete this vehicle?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="card card-mechtrack">
                <div class="card-body text-center">
                    No vehicles yet.
                </div>
            </div>
        @endforelse
    </div>
@endsection
