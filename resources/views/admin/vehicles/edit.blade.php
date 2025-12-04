@extends('layouts.mechtrack')

@section('title', 'Edit Vehicle')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-mechtrack">
                <div class="card-body">
        <h2 class="mb-3">Edit Vehicle</h2>

        <form method="POST" action="{{ route('admin.vehicles.update', $vehicle) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Owner (Customer)</label>
                <select name="customer_id" class="form-select" required>
                    <option value="">-- Select owner --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ old('customer_id', $vehicle->customer_id) == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }} ({{ $customer->phone }})
                        </option>
                    @endforeach
                </select>
                @error('customer_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">License Plate</label>
                <input type="text" name="license_plate" class="form-control"
                       value="{{ old('license_plate', $vehicle->license_plate) }}" required>
                @error('license_plate') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Make (Brand)</label>
                <input type="text" name="make" class="form-control"
                       value="{{ old('make', $vehicle->make) }}">
                @error('make') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Model</label>
                <input type="text" name="model" class="form-control"
                       value="{{ old('model', $vehicle->model) }}">
                @error('model') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="number" name="year" class="form-control"
                       value="{{ old('year', $vehicle->year) }}">
                @error('year') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">VIN (optional)</label>
                <input type="text" name="vin" class="form-control"
                       value="{{ old('vin', $vehicle->vin) }}">
                @error('vin') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Vehicle</button>
            <a href="{{ route('admin.vehicles.index') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>
    </div>
    </div>
    </div>
@endsection
