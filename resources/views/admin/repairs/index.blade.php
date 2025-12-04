@extends('layouts.mechtrack')

@section('title', 'Repair Orders')

@section('content')
    <div class="mb-3">
        <h1 class="h3">Repair Orders</h1>
        <p class="">Track all repairs, statuses, and costs.</p>
    </div>

    <div class="mb-3">
        <a href="{{ route('admin.repairs.create') }}" class="btn btn-amber">
            + Add New Repair Order
        </a>
    </div>

    {{-- Desktop / tablet view: table --}}
    <div class="d-none d-md-block">
        <div class="card card-mechtrack">
            <div class="card-body">
                <table class="table table-dark table-striped align-middle mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Vehicle</th>
                        <th>Owner</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Total Cost</th>
                        <th style="width: 190px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($repairs as $repair)
                        <tr>
                            <td>{{ $repair->id }}</td>
                            <td>{{ $repair->vehicle->license_plate ?? 'N/A' }}</td>
                            <td>{{ $repair->vehicle->customer->name ?? 'N/A' }}</td>
                            <td>{{ $repair->title }}</td>
                            <td>
                                <span class="badge bg-secondary text-uppercase badge-status">
                                    {{ str_replace('_', ' ', $repair->status) }}
                                </span>
                            </td>
                            <td>{{ number_format($repair->total_cost, 2) }} €</td>
                            <td>
                                <a href="{{ route('admin.repairs.edit', $repair) }}"
                                   class="btn btn-sm btn-outline-light">
                                    Edit
                                </a>

                                <form action="{{ route('admin.repairs.destroy', $repair) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this repair order?');">
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
                            <td colspan="7" class=" text-center">
                                No repair orders yet.
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
        @forelse($repairs as $repair)
            <div class="card card-mechtrack mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-1">
                        {{ $repair->title }}
                    </h5>
                    <p class="mb-1">
                        <small class="">
                            ID: {{ $repair->id }}
                        </small>
                    </p>

                    <p class="mb-1">
                        <strong>Vehicle:</strong>
                        {{ $repair->vehicle->license_plate ?? 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <strong>Owner:</strong>
                        {{ $repair->vehicle->customer->name ?? 'N/A' }}
                    </p>

                    <p class="mb-1">
                        <strong>Status:</strong>
                        <span class="badge bg-secondary text-uppercase badge-status">
                            {{ str_replace('_', ' ', $repair->status) }}
                        </span>
                    </p>

                    <p class="mb-3">
                        <strong>Total Cost:</strong>
                        {{ number_format($repair->total_cost, 2) }} €
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.repairs.edit', $repair) }}"
                           class="btn btn-sm btn-outline-light flex-grow-1">
                            Edit
                        </a>

                        <form action="{{ route('admin.repairs.destroy', $repair) }}"
                              method="POST"
                              class="flex-grow-1"
                              onsubmit="return confirm('Are you sure you want to delete this repair order?');">
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
                    No repair orders yet.
                </div>
            </div>
        @endforelse
    </div>
@endsection
