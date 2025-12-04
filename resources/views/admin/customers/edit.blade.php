@extends('layouts.mechtrack')

@section('title', 'Edit Customer')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-mechtrack">
                <div class="card-body">
        <h2 class="mb-3">Edit Customer</h2>

        <form method="POST" action="{{ route('admin.customers.update', $customer) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $customer->name) }}"
                    required
                >
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone', $customer->phone) }}"
                    required
                >
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email (optional)</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $customer->email) }}"
                >
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address (optional)</label>
                <input
                    type="text"
                    name="address"
                    class="form-control"
                    value="{{ old('address', $customer->address) }}"
                >
                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Customer</button>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
