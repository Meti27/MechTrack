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
        @if($repairs->isEmpty())
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="alert alert-info">
                        No repair records found for this license plate and phone number.
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card card-mechtrack-soft">
                        <div class="card-body">
                            <h3 class="mb-4">Repair Status</h3>

                            @foreach($repairs as $repair)
                                <div class="repair-item mb-4 pb-4 {{ !$loop->last ? 'border-bottom' : '' }}">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5>{{ $repair->title }}</h5>
                                            <p class=" mb-2">
                                                <strong>Vehicle:</strong>
                                                {{ $repair->vehicle->make ?? '' }}
                                                {{ $repair->vehicle->model ?? '' }}
                                                ({{ $repair->vehicle->license_plate }})
                                            </p>
                                            @if($repair->description)
                                                <p class="mb-2">
                                                    <strong>Description:</strong> {{ $repair->description }}
                                                </p>
                                            @endif
                                            <p class="mb-2">
                                                <strong>Submitted:</strong> {{ $repair->created_at->format('M d, Y h:i A') }}
                                            </p>
                                            @if($repair->updated_at && $repair->updated_at != $repair->created_at)
                                                <p class="mb-2">
                                                    <strong>Last Updated:</strong> {{ $repair->updated_at->format('M d, Y h:i A') }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                            @php
                                                $statusConfig = [
                                                    'pending' => ['badge' => 'warning', 'text' => 'Pending'],
                                                    'in_progress' => ['badge' => 'info', 'text' => 'In Progress'],
                                                    'completed' => ['badge' => 'success', 'text' => 'Completed'],
                                                    'delivered' => ['badge' => 'success', 'text' => 'Delivered'],
                                                ];
                                                $status = $statusConfig[$repair->status] ?? ['badge' => 'secondary', 'text' => ucfirst(str_replace('_', ' ', $repair->status))];
                                            @endphp
                                            <span class="badge bg-{{ $status['badge'] }} fs-6 px-3 py-2">
                                                {{ $status['text'] }}
                                            </span>

                                            @if($repair->total_cost && $repair->total_cost > 0)
                                                <div class="mt-3">
                                                    <strong>Total Cost:</strong><br>
                                                    ${{ number_format($repair->total_cost, 2) }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endisset
@endsection
