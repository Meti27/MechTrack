@extends('layouts.public-demo', ['title' => 'MechTrack Auto Service'])

@section('content')

    <section class="hero">
        <div class="hero-bg"></div>

        <div class="container hero-grid">
            <div class="hero-content">
                <p class="eyebrow">Auto Repair Website + Tracking System</p>

                <h1>
                    Let customers check repair status without calling your shop.
                </h1>

                <p class="hero-text">
                    MechTrack gives local mechanic shops a professional website, customer repair tracking,
                    and an admin dashboard for managing clients, vehicles, and repair statuses.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('track.form') }}" class="primary-btn">
                        Try Repair Tracking
                    </a>

                    <a href="{{ route('login') }}" class="secondary-btn">
                        Mechanic Login
                    </a>
                </div>

                <div class="stats">
                    <div>
                        <strong>24/7</strong>
                        <span>Status checking</span>
                    </div>

                    <div>
                        <strong>Less</strong>
                        <span>Phone calls</span>
                    </div>

                    <div>
                        <strong>Easy</strong>
                        <span>Dashboard</span>
                    </div>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div>
                        <span>Admin Dashboard</span>
                        <h3>Today’s Repairs</h3>
                    </div>

                    <p>Live Demo</p>
                </div>

                <div class="dashboard-stats">
                    <div>
                        <span>In Progress</span>
                        <strong>08</strong>
                    </div>

                    <div>
                        <span>Ready Pickup</span>
                        <strong class="orange">04</strong>
                    </div>

                    <div>
                        <span>Waiting Parts</span>
                        <strong>03</strong>
                    </div>

                    <div>
                        <span>Completed</span>
                        <strong>16</strong>
                    </div>
                </div>

                <div class="repair-preview">
                    <div class="repair-top">
                        <strong>BMW 320d</strong>
                        <span>In Progress</span>
                    </div>

                    <div class="progress">
                        <div></div>
                    </div>

                    <p>
                        Brake service and diagnostics currently being handled.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="demo-section">
        <div class="container">
            <div class="demo-card">
                <div>
                    <p class="eyebrow">Try the demo</p>

                    <h2>
                        Test the customer repair tracking feature.
                    </h2>

                    <p class="demo-text">
                        This demo lets customers check their vehicle repair status online using a license plate.
                        Try one of the sample plates below to see how the system works.
                    </p>
                </div>

                <div class="plate-grid">
                    <a href="{{ route('track.form') }}" class="plate-card">
                        <span>In Progress</span>
                        <strong>SK-1234-AB</strong>
                        <p>BMW 320d — Brake Service + Diagnostics</p>
                    </a>

                    <a href="{{ route('track.form') }}" class="plate-card">
                        <span>Completed</span>
                        <strong>GO-5678-CD</strong>
                        <p>Audi A4 — Oil Change + General Inspection</p>
                    </a>

                    <a href="{{ route('track.form') }}" class="plate-card">
                        <span>Pending</span>
                        <strong>TE-9999-AA</strong>
                        <p>Mercedes C220 — Battery Replacement</p>
                    </a>
                </div>

                <div class="demo-note">
                    <strong>Note:</strong>
                    The admin dashboard is private. Public visitors can only test the customer tracking page.
                </div>
            </div>
        </div>
    </section>

    <section class="problem-section">
        <div class="container split">
            <div>
                <p class="eyebrow">The Problem</p>

                <h2>
                    Mechanics lose time answering the same question.
                </h2>
            </div>

            <div class="problem-cards">
                <div>
                    <h3>“Is it ready?”</h3>
                    <p>Customers call because they have no simple way to check progress.</p>
                </div>

                <div>
                    <h3>“What stage?”</h3>
                    <p>Repair updates are usually handled manually over phone calls.</p>
                </div>

                <div>
                    <h3>“When pickup?”</h3>
                    <p>A status page gives customers answers before they call.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="container">
            <p class="eyebrow">Auto Services</p>

            <h2>
                A clean website for the services people search every day.
            </h2>

            <div class="services-grid">
                <div class="service-card">
                    <span>01</span>
                    <h3>Engine Diagnostics</h3>
                    <p>Find faults faster with professional diagnostic checks.</p>
                </div>

                <div class="service-card">
                    <span>02</span>
                    <h3>Brake Repair</h3>
                    <p>Pads, discs, fluid checks, and safe braking performance.</p>
                </div>

                <div class="service-card">
                    <span>03</span>
                    <h3>Oil Change</h3>
                    <p>Regular maintenance to keep vehicles running smoothly.</p>
                </div>

                <div class="service-card">
                    <span>04</span>
                    <h3>Tire Service</h3>
                    <p>Seasonal tire changes, balancing, and pressure checks.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="system" class="system-section">
        <div class="container system-single">
            <div class="system-content">
                <p class="eyebrow">The System</p>

                <h2>
                    From phone calls to online repair updates.
                </h2>

                <p class="section-text">
                    Customers no longer need to call just to ask if their car is ready.
                    They enter their license plate, check the latest status, and know what stage the repair is in.
                </p>

                <div class="status-flow">
                    <div>
                        <span>01</span>
                        <strong>Vehicle received</strong>
                    </div>

                    <div>
                        <span>02</span>
                        <strong>Repair in progress</strong>
                    </div>

                    <div>
                        <span>03</span>
                        <strong>Ready for pickup</strong>
                    </div>
                </div>

                <p class="system-note">
                    Visitors can test the feature using the demo license plates shown above.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('track.form') }}" class="primary-btn">
                        Open Tracking Page
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="final-section">
        <div class="container">
            <div class="owner-section">
                <div class="owner-header">
                    <p class="eyebrow">For mechanic shop owners</p>

                    <h2>
                        More than a website — a small system that makes the shop look organized.
                    </h2>

                    <p>
                        This demo shows how a mechanic shop can have a professional online presence and a private workflow
                        for managing customers, vehicles, and repair updates.
                    </p>
                </div>

                <div class="owner-grid">
                    <div class="owner-card">
                        <span>01</span>
                        <h3>Professional public website</h3>
                        <p>
                            Services, trust signals, clear buttons, and a modern design that helps the shop look serious online.
                        </p>
                    </div>

                    <div class="owner-card">
                        <span>02</span>
                        <h3>Customer repair tracking</h3>
                        <p>
                            Customers can check repair progress using their license plate instead of calling the shop repeatedly.
                        </p>
                    </div>

                    <div class="owner-card">
                        <span>03</span>
                        <h3>Private shop dashboard</h3>
                        <p>
                            The mechanic can manage customers, vehicles, repair orders, and statuses from a private admin area.
                        </p>
                    </div>
                </div>

                <div class="owner-note">
                    <strong>Demo note:</strong>
                    The public demo only shows the customer tracking side. The dashboard stays private unless a real shop wants to see it.
                </div>
            </div>
        </div>
    </section>

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 24px;
            padding-right: 24px;
        }

        .hero {
            position: relative;
            min-height: 100vh;
            padding-top: 130px;
            padding-bottom: 90px;
            overflow: hidden;
        }
        .status-flow {
            margin-top: 34px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            max-width: 850px;
        }

        .status-flow div {
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            border-radius: 20px;
            padding: 22px;
        }

        .status-flow span {
            display: inline-block;
            margin-bottom: 18px;
            color: #fdba74;
            font-size: 13px;
            font-weight: 900;
        }

        .status-flow strong {
            display: block;
            color: white;
            font-size: 18px;
            line-height: 1.4;
        }

        .owner-section {
            border: 1px solid rgba(249,115,22,0.22);
            background:
                radial-gradient(circle at top left, rgba(249,115,22,0.13), transparent 35%),
                linear-gradient(135deg, #151C2A, #0A0F18);
            border-radius: 32px;
            padding: 48px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.32);
        }

        .owner-header {
            max-width: 850px;
        }

        .owner-header p:not(.eyebrow) {
            margin-top: 22px;
            max-width: 760px;
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.8;
        }

        .owner-grid {
            margin-top: 38px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .owner-card {
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            border-radius: 22px;
            padding: 26px;
        }

        .owner-card span {
            color: #fdba74;
            font-size: 13px;
            font-weight: 900;
        }

        .owner-card h3 {
            margin: 28px 0 0;
            color: white;
            font-size: 22px;
        }

        .owner-card p {
            margin: 14px 0 0;
            color: #94a3b8;
            line-height: 1.7;
        }

        .owner-note {
            margin-top: 24px;
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(0,0,0,0.22);
            padding: 18px;
            color: #cbd5e1;
            line-height: 1.7;
        }

        .owner-note strong {
            color: #fdba74;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top right, rgba(249, 115, 22, 0.2), transparent 35%),
                linear-gradient(to bottom, #070A0F, #0B111D);
        }

        .hero-grid {
            position: relative;
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

        h1 {
            margin: 0;
            max-width: 900px;
            color: white;
            font-size: clamp(48px, 7vw, 88px);
            line-height: 0.95;
            letter-spacing: -5px;
            font-weight: 900;
        }

        h2 {
            margin: 0;
            max-width: 800px;
            color: white;
            font-size: clamp(36px, 5vw, 60px);
            line-height: 1;
            letter-spacing: -3px;
            font-weight: 900;
        }

        .hero-text,
        .section-text {
            margin-top: 26px;
            max-width: 680px;
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.8;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 34px;
        }

        .primary-btn,
        .secondary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 15px 26px;
            font-size: 14px;
            font-weight: 900;
            transition: 0.2s ease;
        }

        .primary-btn {
            background: #f97316;
            color: black;
        }

        .secondary-btn {
            border: 1px solid rgba(255,255,255,0.18);
            color: white;
            background: rgba(255,255,255,0.05);
        }

        .primary-btn:hover {
            background: #fb923c;
            transform: translateY(-2px);
        }

        .secondary-btn:hover {
            border-color: rgba(249,115,22,0.6);
            transform: translateY(-2px);
        }

        .stats {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            max-width: 600px;
        }

        .stats div,
        .service-card,
        .problem-cards div,
        .dashboard-card,
        .tracking-card,
        .final-card {
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.035);
            border-radius: 24px;
        }

        .stats div {
            padding: 18px;
        }

        .stats strong {
            display: block;
            font-size: 28px;
            color: white;
        }

        .stats span {
            display: block;
            margin-top: 6px;
            color: #94a3b8;
            font-size: 13px;
        }

        .dashboard-card {
            background: rgba(14, 22, 36, 0.92);
            padding: 24px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.4);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .card-header span {
            color: #94a3b8;
            font-size: 14px;
        }

        .card-header h3 {
            margin: 6px 0 0;
            color: white;
            font-size: 24px;
        }

        .card-header p {
            height: fit-content;
            margin: 0;
            border-radius: 999px;
            background: rgba(34,197,94,0.1);
            color: #86efac;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 900;
        }

        .dashboard-stats {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .dashboard-stats div {
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            border-radius: 18px;
            padding: 20px;
        }

        .dashboard-stats span {
            color: #94a3b8;
            font-size: 14px;
        }

        .dashboard-stats strong {
            display: block;
            margin-top: 12px;
            color: white;
            font-size: 42px;
        }

        .dashboard-stats .orange {
            color: #fdba74;
        }

        .repair-preview {
            margin-top: 20px;
            border-radius: 18px;
            background: rgba(0,0,0,0.25);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 18px;
        }

        .repair-top {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .repair-top span {
            border-radius: 999px;
            background: rgba(249,115,22,0.15);
            color: #fdba74;
            padding: 6px 10px;
            font-size: 12px;
            font-weight: 900;
        }

        .progress {
            margin-top: 16px;
            height: 9px;
            overflow: hidden;
            border-radius: 999px;
            background: rgba(255,255,255,0.1);
        }

        .progress div {
            width: 65%;
            height: 100%;
            background: #f97316;
        }

        .repair-preview p {
            color: #94a3b8;
            line-height: 1.6;
        }

        .problem-section,
        .system-section,
        .final-section {
            background: #0B111D;
            padding: 95px 0;
        }

        .services-section {
            background: #070A0F;
            padding: 95px 0;
        }

        .split {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 50px;
            align-items: center;
        }

        .problem-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .problem-cards div {
            padding: 24px;
        }

        .problem-cards h3 {
            margin: 0;
            color: #fdba74;
            font-size: 28px;
        }

        .problem-cards p {
            color: #94a3b8;
            line-height: 1.6;
        }

        .services-grid {
            margin-top: 50px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .service-card {
            min-height: 210px;
            padding: 24px;
            background: #0E1624;
        }

        .service-card span {
            color: #fdba74;
            font-weight: 900;
        }

        .service-card h3 {
            margin-top: 40px;
            color: white;
            font-size: 22px;
        }

        .service-card p {
            color: #94a3b8;
            line-height: 1.6;
        }

        .tracking-card {
            padding: 28px;
            background: #0E1624;
        }

        .tracking-card span {
            color: #94a3b8;
        }

        .tracking-card h3 {
            margin: 10px 0 24px;
            font-size: 30px;
        }

        .fake-input,
        .fake-button,
        .status-box {
            border-radius: 18px;
            padding: 18px;
        }

        .fake-input {
            color: #94a3b8;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .fake-button {
            margin-top: 14px;
            background: #f97316;
            color: black;
            text-align: center;
            font-weight: 900;
        }

        .status-box {
            margin-top: 20px;
            background: rgba(34,197,94,0.1);
            border: 1px solid rgba(34,197,94,0.25);
        }

        .status-box strong {
            color: #86efac;
        }

        .status-box p {
            color: #cbd5e1;
            line-height: 1.6;
        }

        .final-card {
            padding: 60px;
            background: linear-gradient(135deg, #151C2A, #0A0F18);
        }

        .final-card p:not(.eyebrow) {
            max-width: 720px;
            color: #cbd5e1;
            line-height: 1.8;
            font-size: 18px;
        }

        @media (max-width: 900px) {
            .hero-grid,
            .split {
                grid-template-columns: 1fr;
            }

            .dashboard-card {
                margin-top: 20px;
            }

            .problem-cards,
            .services-grid {
                grid-template-columns: 1fr 1fr;
            }

            h1 {
                letter-spacing: -3px;
            }
        }
        .demo-section {
            background: #070A0F;
            padding: 80px 0;
        }

        .demo-card {
            border: 1px solid rgba(249,115,22,0.22);
            background:
                radial-gradient(circle at top right, rgba(249,115,22,0.13), transparent 35%),
                #0E1624;
            border-radius: 32px;
            padding: 42px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.32);
        }

        .demo-text {
            margin-top: 22px;
            max-width: 760px;
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.8;
        }

        .plate-grid {
            margin-top: 34px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .plate-card {
            display: block;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            border-radius: 22px;
            padding: 24px;
            transition: 0.2s ease;
        }

        .plate-card:hover {
            transform: translateY(-4px);
            border-color: rgba(249,115,22,0.55);
            background: rgba(255,255,255,0.06);
        }

        .plate-card span {
            display: inline-block;
            margin-bottom: 14px;
            border-radius: 999px;
            background: rgba(249,115,22,0.14);
            color: #fdba74;
            padding: 7px 11px;
            font-size: 12px;
            font-weight: 900;
        }

        .plate-card strong {
            display: block;
            color: white;
            font-size: 28px;
            letter-spacing: -1px;
        }

        .plate-card p {
            margin: 12px 0 0;
            color: #94a3b8;
            line-height: 1.6;
        }

        .demo-note {
            margin-top: 24px;
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(0,0,0,0.2);
            padding: 18px;
            color: #cbd5e1;
            line-height: 1.7;
        }

        .demo-note strong {
            color: #fdba74;
        }
        .system-single {
            max-width: 900px;
            margin: 0 auto;
        }

        .system-content {
            max-width: 820px;
        }

        .system-note {
            margin-top: 18px;
            color: #94a3b8;
            font-size: 16px;
            line-height: 1.7;
        }

        @media (max-width: 600px) {
            .hero {
                padding-top: 110px;
            }

            .stats,
            .dashboard-stats,
            .problem-cards,
            .services-grid {
                grid-template-columns: 1fr;
            }

            .final-card {
                padding: 32px;
            }
            .status-flow,
            .owner-grid {
                grid-template-columns: 1fr;
            }

            .owner-section {
                padding: 28px;
            }

            h1,
            h2 {
                letter-spacing: -2px;
            }
            .plate-grid {
                grid-template-columns: 1fr;
            }

            .demo-card {
                padding: 28px;
            }
        }
    </style>

@endsection
