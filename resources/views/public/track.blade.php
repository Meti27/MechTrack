@extends('layouts.public-demo', ['title' => 'Track Your Repair'])

@section('content')

    <section class="track-page">
        <div class="track-bg"></div>

        <div class="track-container">
            <div class="track-header">
                <p class="eyebrow">Customer Repair Tracking</p>

                <h1>Check your vehicle repair status.</h1>

                <p>
                    Enter your license plate below to see the latest repair update from the workshop.
                </p>
            </div>

            <div class="track-grid">
                <div class="track-form-card">
                    <div class="card-label">Repair Lookup</div>

                    <h2>Enter license plate</h2>

                    @if(session('status'))
                        <div class="alert-box">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="error-box">
                            Please check the license plate and try again.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('track.submit') }}">
                        @csrf

                        <label for="license_plate">License Plate</label>

                        <input
                            id="license_plate"
                            type="text"
                            name="license_plate"
                            value="{{ old('license_plate', isset($vehicle) ? $vehicle->license_plate : '') }}"
                            placeholder="Example: SK-1234-AB"
                            required
                            autocomplete="off"
                        >

                        @error('license_plate')
                        <small class="input-error">{{ $message }}</small>
                        @enderror

                        <button type="submit">
                            Check Repair Status
                        </button>
                    </form>

                    <p class="help-text">
                        This demo uses license plate lookup. For real shops, this can be changed to phone number,
                        repair code, or both.
                    </p>
                </div>

                <div class="info-card">
                    <span>How it works</span>

                    <div class="info-step">
                        <strong>1</strong>
                        <p>Mechanic adds the customer and vehicle.</p>
                    </div>

                    <div class="info-step">
                        <strong>2</strong>
                        <p>Repair order is created in the admin dashboard.</p>
                    </div>

                    <div class="info-step">
                        <strong>3</strong>
                        <p>Customer checks the repair status online anytime.</p>
                    </div>
                </div>
            </div>

            @isset($repairs)
                @if($repairs->isNotEmpty())
                    <div class="result-section">
                        <div class="result-header">
                            <div>
                                <p class="eyebrow">Repair Status</p>

                                <h2>
                                    Latest updates for
                                    {{ $vehicle->make ?? 'Vehicle' }}
                                    {{ $vehicle->model ?? '' }}
                                </h2>

                                <p>
                                    License plate:
                                    <strong>{{ $vehicle->license_plate }}</strong>
                                </p>
                            </div>

                            <a href="{{ route('track.form') }}" class="new-search-btn">
                                New Search
                            </a>
                        </div>

                        <div class="repair-list">
                            @foreach($repairs as $repair)
                                @php
                                    $statusConfig = [
                                        'pending' => [
                                            'label' => 'Pending',
                                            'class' => 'status-pending',
                                            'progress' => '20%',
                                            'message' => 'Your repair request has been received.'
                                        ],
                                        'in_progress' => [
                                            'label' => 'In Progress',
                                            'class' => 'status-progress',
                                            'progress' => '60%',
                                            'message' => 'The workshop is currently working on your vehicle.'
                                        ],
                                        'completed' => [
                                            'label' => 'Completed',
                                            'class' => 'status-completed',
                                            'progress' => '90%',
                                            'message' => 'The repair has been completed. Please contact the shop before pickup.'
                                        ],
                                        'delivered' => [
                                            'label' => 'Delivered',
                                            'class' => 'status-delivered',
                                            'progress' => '100%',
                                            'message' => 'The vehicle has been delivered.'
                                        ],
                                    ];

                                    $status = $statusConfig[$repair->status] ?? [
                                        'label' => ucfirst(str_replace('_', ' ', $repair->status)),
                                        'class' => 'status-default',
                                        'progress' => '40%',
                                        'message' => 'The repair status has been updated by the workshop.'
                                    ];
                                @endphp

                                <article class="repair-card">
                                    <div class="repair-card-top">
                                        <div>
                                        <span class="repair-number">
                                            Repair #{{ $loop->iteration }}
                                        </span>

                                            <h3>{{ $repair->title }}</h3>
                                        </div>

                                        <span class="status-pill {{ $status['class'] }}">
                                        {{ $status['label'] }}
                                    </span>
                                    </div>

                                    <div class="progress-bar">
                                        <div style="width: {{ $status['progress'] }}"></div>
                                    </div>

                                    <p class="status-message">
                                        {{ $status['message'] }}
                                    </p>

                                    @if($repair->description)
                                        <div class="detail-box">
                                            <span>Description</span>
                                            <p>{{ $repair->description }}</p>
                                        </div>
                                    @endif

                                    <div class="repair-meta">
                                        <div>
                                            <span>Vehicle</span>
                                            <strong>
                                                {{ $vehicle->make ?? '' }}
                                                {{ $vehicle->model ?? '' }}
                                                {{ $vehicle->license_plate ? '(' . $vehicle->license_plate . ')' : '' }}
                                            </strong>
                                        </div>

                                        <div>
                                            <span>Submitted</span>
                                            <strong>{{ $repair->created_at->format('M d, Y h:i A') }}</strong>
                                        </div>

                                        @if($repair->updated_at && $repair->updated_at != $repair->created_at)
                                            <div>
                                                <span>Last Updated</span>
                                                <strong>{{ $repair->updated_at->format('M d, Y h:i A') }}</strong>
                                            </div>
                                        @endif

                                        @if($repair->total_cost && $repair->total_cost > 0)
                                            <div>
                                                <span>Total Cost</span>
                                                <strong>${{ number_format($repair->total_cost, 2) }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endisset
        </div>
    </section>

    <style>
        .track-page {
            position: relative;
            min-height: 100vh;
            padding-top: 135px;
            padding-bottom: 100px;
            overflow: hidden;
            background: #070A0F;
        }

        .track-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(249, 115, 22, 0.18), transparent 32%),
                radial-gradient(circle at bottom right, rgba(59, 130, 246, 0.09), transparent 35%),
                linear-gradient(to bottom, #070A0F, #0B111D);
        }

        .track-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .track-header {
            max-width: 820px;
            margin-bottom: 48px;
        }

        .eyebrow {
            display: inline-block;
            margin-bottom: 16px;
            color: #fdba74;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .track-header h1 {
            margin: 0;
            color: white;
            font-size: clamp(44px, 7vw, 76px);
            line-height: 0.95;
            letter-spacing: -4px;
            font-weight: 900;
        }

        .track-header p {
            margin-top: 22px;
            max-width: 650px;
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.8;
        }

        .track-grid {
            display: grid;
            grid-template-columns: 1fr 0.8fr;
            gap: 24px;
            align-items: stretch;
        }

        .track-form-card,
        .info-card,
        .repair-card {
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(14, 22, 36, 0.92);
            border-radius: 28px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.32);
        }

        .track-form-card {
            padding: 34px;
        }

        .card-label,
        .info-card > span {
            display: inline-block;
            margin-bottom: 14px;
            color: #94a3b8;
            font-size: 14px;
            font-weight: 700;
        }

        .track-form-card h2 {
            margin: 0 0 28px;
            color: white;
            font-size: 34px;
            letter-spacing: -1px;
        }

        .track-form-card label {
            display: block;
            margin-bottom: 10px;
            color: #e2e8f0;
            font-size: 14px;
            font-weight: 800;
        }

        .track-form-card input {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid rgba(255,255,255,0.12);
            outline: none;
            border-radius: 18px;
            padding: 18px 20px;
            background: rgba(255,255,255,0.04);
            color: white;
            font-size: 18px;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .track-form-card input:focus {
            border-color: rgba(249,115,22,0.75);
            box-shadow: 0 0 0 4px rgba(249,115,22,0.12);
        }

        .track-form-card button {
            width: 100%;
            margin-top: 18px;
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

        .track-form-card button:hover {
            background: #fb923c;
            transform: translateY(-2px);
        }

        .help-text {
            margin: 18px 0 0;
            color: #94a3b8;
            font-size: 14px;
            line-height: 1.7;
        }

        .alert-box,
        .error-box {
            margin-bottom: 18px;
            border-radius: 16px;
            padding: 14px 16px;
            font-size: 14px;
            line-height: 1.6;
        }

        .alert-box {
            border: 1px solid rgba(251,191,36,0.25);
            background: rgba(251,191,36,0.1);
            color: #fde68a;
        }

        .error-box,
        .input-error {
            color: #fecaca;
        }

        .error-box {
            border: 1px solid rgba(248,113,113,0.25);
            background: rgba(248,113,113,0.1);
        }

        .input-error {
            display: block;
            margin-top: 8px;
            font-size: 13px;
        }

        .info-card {
            padding: 34px;
            background:
                radial-gradient(circle at top right, rgba(249,115,22,0.12), transparent 35%),
                rgba(14, 22, 36, 0.92);
        }

        .info-step {
            display: flex;
            gap: 16px;
            padding: 18px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .info-step:last-child {
            border-bottom: 0;
        }

        .info-step strong {
            flex: 0 0 auto;
            display: flex;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f97316;
            color: black;
            font-size: 14px;
            font-weight: 900;
        }

        .info-step p {
            margin: 7px 0 0;
            color: #cbd5e1;
            line-height: 1.6;
        }

        .result-section {
            margin-top: 80px;
        }

        .result-header {
            display: flex;
            justify-content: space-between;
            gap: 24px;
            align-items: end;
            margin-bottom: 28px;
        }

        .result-header h2 {
            margin: 0;
            max-width: 780px;
            color: white;
            font-size: clamp(32px, 5vw, 52px);
            line-height: 1;
            letter-spacing: -2px;
        }

        .result-header p:not(.eyebrow) {
            margin-top: 14px;
            color: #94a3b8;
        }

        .result-header strong {
            color: white;
        }

        .new-search-btn {
            flex: 0 0 auto;
            display: inline-flex;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.15);
            padding: 13px 22px;
            color: white;
            font-size: 14px;
            font-weight: 900;
            transition: 0.2s ease;
        }

        .new-search-btn:hover {
            border-color: rgba(249,115,22,0.65);
            transform: translateY(-2px);
        }

        .repair-list {
            display: grid;
            gap: 18px;
        }

        .repair-card {
            padding: 28px;
        }

        .repair-card-top {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: start;
        }

        .repair-number {
            display: inline-block;
            margin-bottom: 10px;
            color: #94a3b8;
            font-size: 13px;
            font-weight: 800;
        }

        .repair-card h3 {
            margin: 0;
            color: white;
            font-size: 28px;
            letter-spacing: -1px;
        }

        .status-pill {
            flex: 0 0 auto;
            border-radius: 999px;
            padding: 9px 14px;
            font-size: 13px;
            font-weight: 900;
        }

        .status-pending {
            background: rgba(251,191,36,0.12);
            color: #fde68a;
            border: 1px solid rgba(251,191,36,0.25);
        }

        .status-progress {
            background: rgba(59,130,246,0.12);
            color: #bfdbfe;
            border: 1px solid rgba(59,130,246,0.25);
        }

        .status-completed,
        .status-delivered {
            background: rgba(34,197,94,0.12);
            color: #86efac;
            border: 1px solid rgba(34,197,94,0.25);
        }

        .status-default {
            background: rgba(148,163,184,0.12);
            color: #cbd5e1;
            border: 1px solid rgba(148,163,184,0.25);
        }

        .progress-bar {
            margin-top: 24px;
            height: 10px;
            border-radius: 999px;
            overflow: hidden;
            background: rgba(255,255,255,0.1);
        }

        .progress-bar div {
            height: 100%;
            border-radius: inherit;
            background: #f97316;
        }

        .status-message {
            margin: 18px 0 0;
            color: #cbd5e1;
            line-height: 1.7;
        }

        .detail-box {
            margin-top: 22px;
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            padding: 18px;
        }

        .detail-box span,
        .repair-meta span {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            font-weight: 800;
        }

        .detail-box p {
            margin: 8px 0 0;
            color: white;
            line-height: 1.7;
        }

        .repair-meta {
            margin-top: 22px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .repair-meta div {
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.03);
            padding: 15px;
        }

        .repair-meta strong {
            display: block;
            margin-top: 8px;
            color: white;
            font-size: 14px;
            line-height: 1.5;
        }

        @media (max-width: 900px) {
            .track-grid,
            .repair-meta {
                grid-template-columns: 1fr;
            }

            .result-header {
                align-items: start;
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .track-page {
                padding-top: 120px;
            }

            .track-header h1 {
                letter-spacing: -2px;
            }

            .track-form-card,
            .info-card,
            .repair-card {
                padding: 24px;
                border-radius: 22px;
            }

            .repair-card-top {
                flex-direction: column;
            }

            .status-pill {
                width: fit-content;
            }
        }
    </style>

@endsection
