@extends('layouts.mechtrack')

@section('title', 'Edit Repair Order')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-mechtrack">
                <div class="card-body">
        <h2 class="mb-3">Edit Repair Order</h2>

        <form method="POST" action="{{ route('admin.repairs.update', $repair) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Vehicle</label>
                <select name="vehicle_id" class="form-select" required>
                    <option value="">-- Select vehicle --</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}"
                            {{ old('vehicle_id', $repair->vehicle_id) == $vehicle->id ? 'selected' : '' }}>
                            {{ $vehicle->license_plate }} -
                            {{ $vehicle->customer->name ?? 'No owner' }}
                        </option>
                    @endforeach
                </select>
                @error('vehicle_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control"
                       value="{{ old('title', $repair->title) }}" required>
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $repair->description) }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                @php
                    $statuses = ['pending', 'in_progress', 'completed', 'delivered'];
                @endphp
                <select name="status" class="form-select" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status }}"
                            {{ old('status', $repair->status) == $status ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </option>
                    @endforeach
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Total Cost (€)</label>
                <input type="number" step="0.01" min="0"
                       name="total_cost" class="form-control"
                       value="{{ old('total_cost', $repair->total_cost) }}">
                @error('total_cost') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Repair Order</button>
            <a href="{{ route('admin.repairs.index') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>
    </div>
    </div>
    </div>
@endsection
