@extends('layouts.mechtrack')

@section('title', 'Track Repair')

@section('content')
    <div class="row justify-content-center mb-4">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card card-mechtrack">
                <div class="card-body">
        <h2 class="mb-3">Track Your Repair</h2>

        <form method="POST" action="{{ route('track.submit') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">License Plate</label>
                <input type="text" name="license_plate" class="form-control"
                       value="{{ old('license_plate') }}" required>
                @error('license_plate') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control"
                       value="{{ old('phone') }}" required>
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Check Status</button>
        </form>
                </div>
            </div>
        </div>
    </div>

    @isset($repairs)
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="card card-mechtrack-soft">
                    <div class="card-body">
                        {{-- render results in a mobile-friendly way --}}
                    </div>
                </div>
            </div>
        </div>
    @endisset
@endsection
