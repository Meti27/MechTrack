@extends('layouts.public-demo', ['title' => 'Mechanic Login'])

@section('content')

    <section class="login-page">
        <div class="login-bg"></div>

        <div class="login-container">
            <div class="login-left">
                <p class="eyebrow">Mechanic Dashboard</p>

                <h1>Manage repairs, vehicles, and customer updates.</h1>

                <p>
                    Login to the shop dashboard to add customers, create repair orders,
                    update repair statuses, and let customers track progress online.
                </p>

                <div class="feature-list">
                    <div>
                        <strong>01</strong>
                        <span>Add customers and vehicles</span>
                    </div>

                    <div>
                        <strong>02</strong>
                        <span>Create and update repair orders</span>
                    </div>

                    <div>
                        <strong>03</strong>
                        <span>Let clients check repair status online</span>
                    </div>
                </div>
            </div>

            <div class="login-card">
                <div class="card-top">
                    <span>Secure Access</span>
                    <h2>Login to dashboard</h2>
                </div>

                @if (session('status'))
                    <div class="status-box">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error-box">
                        Please check your email and password, then try again.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email address</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="admin@example.com"
                        >

                        @error('email')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter password"
                        >

                        @error('password')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-row">
                        <label class="remember">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <button type="submit">
                        Login
                    </button>
                </form>

                <p class="login-note">
                    Registration is disabled for this demo. Only approved shop accounts can access the dashboard.
                </p>

                <a href="{{ route('home') }}" class="back-link">
                    ← Back to demo homepage
                </a>
            </div>
        </div>
    </section>

    <style>
        .login-page {
            position: relative;
            min-height: 100vh;
            padding-top: 135px;
            padding-bottom: 100px;
            overflow: hidden;
            background: #070A0F;
        }

        .login-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(249, 115, 22, 0.18), transparent 35%),
                radial-gradient(circle at bottom left, rgba(59, 130, 246, 0.08), transparent 38%),
                linear-gradient(to bottom, #070A0F, #0B111D);
        }

        .login-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 60px;
            align-items: center;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 18px;
            color: #fdba74;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .login-left h1 {
            margin: 0;
            color: white;
            font-size: clamp(44px, 6vw, 76px);
            line-height: 0.95;
            letter-spacing: -4px;
            font-weight: 900;
        }

        .login-left p {
            margin-top: 26px;
            max-width: 680px;
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.8;
        }

        .feature-list {
            margin-top: 36px;
            display: grid;
            gap: 14px;
            max-width: 620px;
        }

        .feature-list div {
            display: flex;
            align-items: center;
            gap: 16px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.035);
            border-radius: 18px;
            padding: 18px;
        }

        .feature-list strong {
            display: flex;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            border-radius: 50%;
            background: #f97316;
            color: black;
            font-size: 13px;
            font-weight: 900;
        }

        .feature-list span {
            color: #e2e8f0;
            font-weight: 700;
        }

        .login-card {
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(14, 22, 36, 0.94);
            border-radius: 30px;
            padding: 36px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.38);
        }

        .card-top {
            margin-bottom: 28px;
        }

        .card-top span {
            display: block;
            margin-bottom: 12px;
            color: #94a3b8;
            font-size: 14px;
            font-weight: 700;
        }

        .card-top h2 {
            margin: 0;
            color: white;
            font-size: 34px;
            letter-spacing: -1px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #e2e8f0;
            font-size: 14px;
            font-weight: 800;
        }

        .form-group input {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid rgba(255,255,255,0.12);
            outline: none;
            border-radius: 18px;
            padding: 17px 18px;
            background: rgba(255,255,255,0.04);
            color: white;
            font-size: 16px;
        }

        .form-group input:focus {
            border-color: rgba(249,115,22,0.75);
            box-shadow: 0 0 0 4px rgba(249,115,22,0.12);
        }

        .form-group small {
            display: block;
            margin-top: 8px;
            color: #fecaca;
            font-size: 13px;
        }

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin: 8px 0 20px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #cbd5e1;
            font-size: 14px;
            cursor: pointer;
        }

        .remember input {
            accent-color: #f97316;
        }

        .form-row a {
            color: #fdba74;
            font-size: 14px;
            font-weight: 800;
        }

        form button {
            width: 100%;
            border: 0;
            border-radius: 999px;
            padding: 17px 24px;
            background: #f97316;
            color: black;
            font-size: 14px;
            font-weight: 900;
            cursor: pointer;
            transition: 0.2s ease;
        }

        form button:hover {
            background: #fb923c;
            transform: translateY(-2px);
        }

        .status-box,
        .error-box {
            margin-bottom: 18px;
            border-radius: 16px;
            padding: 14px 16px;
            font-size: 14px;
            line-height: 1.6;
        }

        .status-box {
            border: 1px solid rgba(34,197,94,0.25);
            background: rgba(34,197,94,0.1);
            color: #86efac;
        }

        .error-box {
            border: 1px solid rgba(248,113,113,0.25);
            background: rgba(248,113,113,0.1);
            color: #fecaca;
        }

        .login-note {
            margin: 18px 0 0;
            color: #94a3b8;
            font-size: 14px;
            line-height: 1.7;
            text-align: center;
        }

        .back-link {
            display: block;
            margin-top: 22px;
            color: #fdba74;
            font-size: 14px;
            font-weight: 900;
            text-align: center;
        }

        @media (max-width: 900px) {
            .login-container {
                grid-template-columns: 1fr;
            }

            .login-left h1 {
                letter-spacing: -2px;
            }
        }

        @media (max-width: 600px) {
            .login-page {
                padding-top: 120px;
            }

            .login-card {
                padding: 24px;
                border-radius: 24px;
            }

            .form-row {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>

@endsection
