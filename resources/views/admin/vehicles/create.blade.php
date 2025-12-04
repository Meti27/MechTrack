@extends('layouts.mechtrack')

@section('title', 'Add Vehicle')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-mechtrack">
                <div class="card-body">
        <h2 class="mb-3">Add New Vehicle</h2>

        <form method="POST" action="{{ route('admin.vehicles.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Owner (Customer)</label>
                <select name="customer_id" class="form-select" required>
                    <option value="">-- Select owner --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }} ({{ $customer->phone }})
                        </option>
                    @endforeach
                </select>
                @error('customer_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">License Plate</label>
                <input type="text" name="license_plate" class="form-control"
                       value="{{ old('license_plate') }}" required>
                @error('license_plate') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Make (Brand)</label>
                <input type="text" name="make" class="form-control"
                       value="{{ old('make') }}">
                @error('make') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Model</label>
                <input type="text" name="model" class="form-control"
                       value="{{ old('model') }}">
                @error('model') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="number" name="year" class="form-control"
                       value="{{ old('year') }}">
                @error('year') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">VIN (optional)</label>
                <input type="text" name="vin" class="form-control"
                       value="{{ old('vin') }}">
                @error('vin') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Save Vehicle</button>
            <a href="{{ route('admin.vehicles.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
