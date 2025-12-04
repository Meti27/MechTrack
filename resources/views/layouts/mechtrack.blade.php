<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MechTrack - @yield('title', 'Mechanic Workshop')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #020617;
            color: #e5e7eb;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .app-main {
            flex: 1;
        }

        .navbar-mechtrack {
            background: linear-gradient(90deg, #030712, #111827);
            border-bottom: 1px solid #1f2937;
        }

        .brand-highlight {
            color: #158bfa;
        }

        .card-mechtrack {
            background: #020617;
            border: 1px solid #1f2937;
            color: #e5e7eb;
        }

        .card-mechtrack-soft {
            background: #020617;
            border: 1px solid #111827;
            color: #e5e7eb;
        }

        .footer-mechtrack {
            border-top: 1px solid #1f2937;
            background: #020617;
            color: #6b7280;
            font-size: 0.85rem;
        }

        .btn-amber {
            background: #1574fa;
            border-color: #1574fa;
            color: #111827;
        }
        .btn-amber:hover {
            background: #1574fa;
            border-color: #1574fa;
            color: #020617;
        }

        .nav-link.active {
            color: #ffffff !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-mechtrack mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="{{ route('home') }}">
            <span class="brand-highlight">Mech</span>Track
        </a>

        {{-- Desktop nav --}}
        <div class="d-none d-lg-flex ms-auto align-items-center gap-3">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
               href="{{ route('home') }}">
                Home
            </a>

            <a class="nav-link {{ request()->routeIs('track.*') ? 'active' : '' }}"
               href="{{ route('track.form') }}">
                Track Repair
            </a>

            @auth
                <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    Admin
                </a>

                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">
                        Logout
                    </button>
                </form>
            @else
                <a class="btn btn-sm btn-outline-light"
                   href="{{ route('login') }}">
                    Login
                </a>
            @endauth
        </div>

        {{-- Mobile toggler --}}
        <button class="navbar-toggler d-lg-none" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#mechtrackOffcanvas"
                aria-controls="mechtrackOffcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>


{{-- Offcanvas side menu for mobile --}}
<div class="offcanvas offcanvas-end text-bg-dark"
     tabindex="-1"
     id="mechtrackOffcanvas"
     aria-labelledby="mechtrackOffcanvasLabel">

    <div class="offcanvas-header border-bottom border-secondary">
        <h5 class="offcanvas-title" id="mechtrackOffcanvasLabel">
            <span class="brand-highlight">Mech</span>Track Menu
        </h5>
        <button type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column gap-3">

        {{-- Home --}}
        <a href="{{ route('home') }}"
           class="btn btn-outline-light w-100 text-start {{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>

        {{-- Track Repair --}}
        <a href="{{ route('track.form') }}"
           class="btn btn-outline-light w-100 text-start {{ request()->routeIs('track.*') ? 'active' : '' }}">
            Track Repair
        </a>

        @auth
            {{-- Admin Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-outline-light w-100 text-start {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                Admin Dashboard
            </a>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit"
                        class="btn btn-outline-danger w-100 text-start">
                    Logout
                </button>
            </form>
        @else
            {{-- Login --}}
            <a href="{{ route('login') }}"
               class="btn btn-amber w-100 text-start">
                Login
            </a>
        @endauth

    </div>
</div>


<div class="app-main">
    <div class="container mb-4">
        @if (session('status'))
            <div class="alert alert-info">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>

<footer class="footer-mechtrack py-3 mt-auto">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
        <span>© {{ date('Y') }} MechTrack. All rights reserved.</span>
        <span>Mechanic Workshop Management System</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
