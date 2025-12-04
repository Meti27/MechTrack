@extends('layouts.mechtrack')

@section('title', 'Add Customer')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-mechtrack">
                <div class="card-body">
        <h2 class="mb-3">Add New Customer</h2>

        <form method="POST" action="{{ route('admin.customers.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input type="text" name="name" class="form-control" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" required>
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email (optional)</label>
                <input type="email" name="email" class="form-control">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address (optional)</label>
                <input type="text" name="address" class="form-control">
                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Save Customer</button>
            <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
