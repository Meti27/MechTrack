<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MechTrack Auto Service' }}</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #070A0F;
            color: white;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: rgba(7, 10, 15, 0.9);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(16px);
        }

        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            gap: 24px;
            align-items: center;
        }

        .nav-links a {
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-login {
            background: #f97316;
            color: black !important;
            padding: 11px 20px;
            border-radius: 999px;
            font-weight: 900 !important;
        }

        .btn-track {
            border: 1px solid rgba(255,255,255,0.18);
            padding: 11px 20px;
            border-radius: 999px;
            color: white !important;
        }

        main {
            min-height: 100vh;
        }

        .footer {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 30px 24px;
            color: #94a3b8;
            text-align: center;
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 10px;
            }

            .nav-links .hide-mobile {
                display: none;
            }

            .logo {
                font-size: 14px;
            }

            .btn-track,
            .btn-login {
                padding: 9px 13px;
                font-size: 13px !important;
            }
        }
    </style>
</head>

<body>
<header class="navbar">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="logo">
            MechTrack
        </a>

        <nav class="nav-links">
            <a href="#services" class="hide-mobile">Services</a>
            <a href="#system" class="hide-mobile">System</a>
            <a href="{{ route('track.form') }}" class="btn-track">Track Repair</a>
            <a href="{{ route('login') }}" class="btn-login">Login</a>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="footer">
    MechTrack Auto Service — Demo website + repair tracking system.
</footer>
</body>
</html>
