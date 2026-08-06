<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akaun</title>

    <link rel="icon" type="image/png" href="{{ asset('images/lznk.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/lznk-logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --green-deep:   #0A4A28;
            --green-mid:    #0F6A3A;
            --green-light:  #1A8A4E;
            --green-glow:   #2dbe6c;
            --gold:         #C9A84C;
            --gold-light:   #E8C97A;
            --cream:        #F8F5EE;
            --white:        #FFFFFF;
            --text-dark:    #1A2B1F;
            --text-muted:   #6B7C71;
            --border:       #DDE8E1;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            min-height: 100vh;
            color: var(--text-dark);
        }

        /* ── TOPBAR ── */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--green-deep);
            border-bottom: 1px solid rgba(201,168,76,.25);
            backdrop-filter: blur(10px);
        }

        .topbar-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .topbar-brand img {
            height: 38px;
            width: auto;
            filter: drop-shadow(0 0 8px rgba(201,168,76,.4));
        }

        .topbar-brand-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            font-weight: 600;
            color: var(--white);
            line-height: 1.2;
            letter-spacing: .01em;
        }

        .topbar-brand-text p {
            font-size: .7rem;
            color: var(--gold-light);
            letter-spacing: .08em;
            text-transform: uppercase;
            opacity: .85;
        }

        .topbar-divider {
            width: 1px;
            height: 28px;
            background: rgba(201,168,76,.3);
            margin: 0 14px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-user-info { text-align: right; }

        .topbar-user-info .name {
            font-size: .85rem;
            font-weight: 600;
            color: var(--white);
        }

        .topbar-user-info .role {
            font-size: .68rem;
            color: var(--gold-light);
            letter-spacing: .06em;
            text-transform: uppercase;
            opacity: .8;
        }

        .topbar-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--green-deep);
            font-weight: 700;
            font-size: .95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(201,168,76,.5);
            box-shadow: 0 0 16px rgba(201,168,76,.3);
        }

        /* ── PAGE WRAPPER ── */
        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2.5rem 2rem 4rem;
        }

        /* ── HERO CARD ── */
        .hero-card {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(10,74,40,.18), 0 4px 16px rgba(10,74,40,.1);
            margin-bottom: 2rem;
            animation: fadeUp .6s ease both;
        }

        .hero-bg {
            background: linear-gradient(135deg, var(--green-deep) 0%, var(--green-mid) 55%, var(--green-light) 100%);
            padding: 0;
            height: 220px;
            position: relative;
            overflow: hidden;
        }

        /* decorative geometric pattern */
        .hero-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(60deg, transparent, transparent 40px, rgba(255,255,255,.025) 40px, rgba(255,255,255,.025) 41px),
                repeating-linear-gradient(-60deg, transparent, transparent 40px, rgba(255,255,255,.025) 40px, rgba(255,255,255,.025) 41px);
        }

        .hero-bg::after {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201,168,76,.18) 0%, transparent 70%);
        }

        .gold-bar {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--gold), var(--gold-light), var(--gold), transparent);
        }

        .hero-content {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 0 2.5rem 2rem;
            display: flex;
            align-items: flex-end;
            gap: 1.5rem;
        }

        .profile-avatar-wrap {
            position: relative;
            flex-shrink: 0;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            border: 3px solid rgba(255,255,255,.25);
            box-shadow: 0 8px 32px rgba(0,0,0,.25), 0 0 0 1px rgba(201,168,76,.4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--green-deep);
            letter-spacing: -.02em;
            transform: translateY(28px);
            position: relative;
            z-index: 2;
        }

        .avatar-badge {
            position: absolute;
            bottom: -4px; right: -4px;
            transform: translateY(28px);
            width: 22px; height: 22px;
            background: var(--green-glow);
            border: 2px solid var(--cream);
            border-radius: 50%;
            z-index: 3;
            display: flex; align-items: center; justify-content: center;
        }

        .avatar-badge::after {
            content: '';
            width: 8px; height: 8px;
            background: white;
            border-radius: 50%;
        }

        .hero-meta {
            padding-bottom: .4rem;
            z-index: 2;
        }

        .hero-meta .label {
            font-size: .68rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--gold-light);
            opacity: .9;
            margin-bottom: .25rem;
        }

        .hero-meta .user-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white);
            line-height: 1.1;
            text-shadow: 0 2px 12px rgba(0,0,0,.2);
        }

        .hero-meta .user-sub {
            font-size: .8rem;
            color: rgba(255,255,255,.65);
            margin-top: .35rem;
            letter-spacing: .04em;
        }

        /* ── BODY CARD ── */
        .body-card {
            background: var(--white);
            border-radius: 0 0 24px 24px;
            padding: 3.5rem 2.5rem 2.5rem;
            margin-top: -1px;
            border: 1px solid var(--border);
            border-top: none;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--green-deep);
            margin-bottom: .35rem;
        }

        .section-sub {
            font-size: .82rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, var(--gold), transparent);
            margin-bottom: 2rem;
            opacity: .4;
        }

        /* ── INFO GRID ── */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
            margin-bottom: 2.5rem;
        }

        @media (max-width: 640px) { .info-grid { grid-template-columns: 1fr; } }

        .info-field label {
            display: block;
            font-size: .72rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: .5rem;
        }

        .info-value {
            background: var(--cream);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: .85rem 1.1rem;
            color: var(--text-dark);
            font-size: .93rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: .65rem;
            transition: border-color .2s;
        }

        .info-value:hover { border-color: var(--gold); }

        .info-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--green-mid), var(--green-light));
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .info-icon svg { width: 15px; height: 15px; stroke: white; fill: none; }

        /* ── STATS ROW ── */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        @media (max-width: 640px) { .stats-row { grid-template-columns: 1fr; } }

        .stat-card {
            background: var(--cream);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.1rem 1.2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(10,74,40,.1);
        }

        .stat-icon {
            width: 42px; height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--green-mid), var(--green-light));
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .stat-icon svg { width: 18px; height: 18px; stroke: white; fill: none; }

        .stat-info .val {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--green-deep);
            line-height: 1;
        }

        .stat-info .lbl {
            font-size: .72rem;
            color: var(--text-muted);
            margin-top: .2rem;
            letter-spacing: .04em;
        }

        /* ── BUTTONS ── */
        .btn-row {
            display: flex;
            flex-wrap: wrap;
            gap: .85rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            padding: .75rem 1.5rem;
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: .88rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            text-decoration: none;
            transition: all .22s ease;
            letter-spacing: .02em;
        }

        .btn svg { width: 16px; height: 16px; stroke: currentColor; fill: none; flex-shrink: 0; }

        .btn-primary {
            background: linear-gradient(135deg, var(--green-mid), var(--green-light));
            color: white;
            box-shadow: 0 4px 16px rgba(15,106,58,.35);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(15,106,58,.45);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--green-deep);
            box-shadow: 0 4px 16px rgba(201,168,76,.3);
        }

        .btn-gold:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(201,168,76,.4);
        }

        .btn-outline {
            background: transparent;
            color: var(--text-dark);
            border: 1.5px solid var(--border);
        }

        .btn-outline:hover {
            background: var(--cream);
            border-color: var(--green-mid);
            color: var(--green-mid);
        }

        /* ── ANIMATION ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .info-grid   { animation: fadeUp .55s .1s ease both; }
        .stats-row   { animation: fadeUp .55s .2s ease both; }
        .btn-row     { animation: fadeUp .55s .3s ease both; }
    </style>
</head>

<body>

    <!-- ── TOPBAR ── -->
    <nav class="topbar">
        <div class="topbar-inner">

            <div class="topbar-brand">
                <img src="{{ asset('images/lznk-logo.png') }}" alt="LZNK Logo">
                <div class="topbar-brand-text">
                    <h1>Permohonan Data LZNK</h1>
                    <p>Sistem Permohonan Data</p>
                </div>
            </div>

            <div class="topbar-user">
                <div class="topbar-user-info">
                    <div class="name">{{ $user->name }}</div>
                    <div class="role">Akaun Pemohon</div>
                </div>
                <div class="topbar-avatar">
                    {{ strtoupper(substr($user->name,0,1)) }}
                </div>
            </div>

        </div>
    </nav>

    <!-- ── PAGE ── -->
    <main class="page">

        <!-- HERO CARD -->
        <div class="hero-card">

            <!-- BANNER -->
            <div class="hero-bg">
                <div class="gold-bar"></div>
                <div class="hero-content">

                    <div class="profile-avatar-wrap">
                        <div class="profile-avatar">
                            {{ strtoupper(substr($user->name,0,2)) }}
                        </div>
                        <div class="avatar-badge"></div>
                    </div>

                    <div class="hero-meta">
                        <div class="label">Pemohon Sistem</div>
                        <div class="user-name">{{ $user->name }}</div>
                        <div class="user-sub">Lembaga Zakat Negeri Kedah · Akaun Aktif</div>
                    </div>

                </div>
            </div>

            <!-- BODY -->
            <div class="body-card">

                <div class="section-title">Maklumat Akaun</div>
                <p class="section-sub">Maklumat pengguna yang berdaftar dalam sistem LZNK.</p>
                <div class="divider"></div>

                <!-- INFO FIELDS -->
                <div class="info-grid">

                    <div class="info-field">
                        <label>Nama Penuh</label>
                        <div class="info-value">
                            <div class="info-icon">
                                <svg viewBox="0 0 24 24" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            </div>
                            {{ $user->name }}
                        </div>
                    </div>

                    <div class="info-field">
                        <label>Alamat Email</label>
                        <div class="info-value">
                            <div class="info-icon">
                                <svg viewBox="0 0 24 24" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 7L2 7"/></svg>
                            </div>
                            {{ $user->email }}
                        </div>
                    </div>

                    <div class="info-field">
                        <label>Status Akaun</label>
                        <div class="info-value">
                            <div class="info-icon">
                                <svg viewBox="0 0 24 24" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            </div>
                            <span style="color:#1A8A4E; font-weight:600;">● Aktif</span>
                        </div>
                    </div>

                    <div class="info-field">
                        <label>Jenis Akaun</label>
                        <div class="info-value">
                            <div class="info-icon">
                                <svg viewBox="0 0 24 24" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            Akaun Pemohon
                        </div>
                    </div>

                </div>

                <!-- STATS -->
                <div class="stats-row">

                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        </div>
                        <div class="stat-info">
                            <div class="val">0</div>
                            <div class="lbl">Permohonan Aktif</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                        </div>
                        <div class="stat-info">
                            <div class="val">0</div>
                            <div class="lbl">Permohonan Selesai</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div class="stat-info">
                            <div class="val">—</div>
                            <div class="lbl">Tarikh Daftar</div>
                        </div>
                    </div>

                </div>

                <!-- BUTTONS -->
                <div class="btn-row">

                    <button class="btn btn-primary">
                        <svg viewBox="0 0 24 24" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Kemaskini Profil
                    </button>

                    <button class="btn btn-gold">
                        <svg viewBox="0 0 24 24" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Tukar Kata Laluan
                    </button>

                    <a href="{{ route('dashboard') }}" class="btn btn-outline">
                        <svg viewBox="0 0 24 24" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                        Kembali Dashboard
                    </a>

                </div>

            </div>
        </div>

    </main>

</body>
</html>