@extends('layouts.mechtrack')

@section('title', 'Home')

@section('content')
    <div class="p-4 bg-gray-700 rounded shadow-sm text-white">
        <h1 class="mb-3">Welcome to MechTrack</h1>
        <p class=" text-white">
            A simple mechanic workshop management system built with Laravel & MySQL.
        </p>

        <a href="{{ route('track.form') }}" class="btn btn-primary">
            Check Repair Status
        </a>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary ms-2.5 my-2">
            Go to Admin Panel
        </a>
    </div>
@endsection
