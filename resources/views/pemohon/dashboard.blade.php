<x-layouts.app title="Dashboard">

@php
    $userId = auth()->id();

    $total = \App\Models\Permohonan::where('user_id', $userId)->count();
    $proses = \App\Models\Permohonan::where('user_id', $userId)
                ->whereIn('status', ['Dalam Proses', 'Menunggu Kelulusan Penyelia','Menunggu Kelulusan Timbalan'])
                ->count();

    $lulus = \App\Models\Permohonan::where('user_id', $userId)
                ->where('status','Diluluskan')->count();

    $tolak = \App\Models\Permohonan::where('user_id', $userId)
                ->where('status','Ditolak')->count();

    $latest = \App\Models\Permohonan::where('user_id', $userId)
                ->latest()
                ->take(5)
                ->get();
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap');

    .dash-wrap {
        font-family: 'DM Sans', sans-serif;
        background: #eef0ec;
        min-height: 100vh;
        padding: 2.25rem 2rem 4rem;
    }

    /* ── Page header ── */
    .dash-page-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid #d4d9d5;
        padding-bottom: 1.25rem;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
    }
    .dash-page-header h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.75rem;
        color: #1a1f1b;
        margin: 0 0 4px;
        letter-spacing: -0.01em;
    }
    .dash-page-header p {
        font-size: 13px;
        color: #5a6860;
        margin: 0;
    }
    .dash-date-badge {
        font-size: 12px;
        color: #5a6860;
        background: #fff;
        border: 1px solid #d4d9d5;
        border-radius: 3px;
        padding: 5px 12px;
        letter-spacing: 0.02em;
    }

    /* ── Stat cards ── */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 1.75rem;
    }
    .stat-card {
        background: #fff;
        border: 1px solid #d4d9d5;
        border-radius: 4px;
        padding: 1.35rem 1.5rem;
        position: relative;
        overflow: hidden;
        transition: box-shadow 0.15s, transform 0.15s;
    }
    .stat-card:hover {
        box-shadow: 0 4px 16px rgba(26,92,42,0.1);
        transform: translateY(-2px);
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
    }
    .stat-card.total::before  { background: #1a5c2a; }
    .stat-card.proses::before { background: #b45309; }
    .stat-card.lulus::before  { background: #166534; }
    .stat-card.tolak::before  { background: #991b1b; }

    .stat-icon {
        width: 36px; height: 36px;
        border-radius: 3px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 1rem;
        flex-shrink: 0;
    }
    .stat-icon svg { width: 18px; height: 18px; }
    .stat-icon.total  { background: #e8f4ec; color: #1a5c2a; }
    .stat-icon.proses { background: #fef3c7; color: #b45309; }
    .stat-icon.lulus  { background: #dcfce7; color: #166534; }
    .stat-icon.tolak  { background: #fee2e2; color: #991b1b; }

    .stat-label {
        font-size: 11.5px;
        font-weight: 500;
        color: #5a6860;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 6px;
    }
    .stat-value {
        font-size: 2rem;
        font-weight: 600;
        color: #1a1f1b;
        line-height: 1;
        margin-bottom: 6px;
    }
    .stat-sub {
        font-size: 11.5px;
        color: #8a9490;
    }

    /* ── Content grid ── */
    .content-grid {
        display: grid;
        grid-template-columns: 1fr 280px;
        gap: 1.25rem;
        align-items: start;
    }

    /* ── Panel base ── */
    .panel {
        background: #fff;
        border: 1px solid #d4d9d5;
        border-radius: 4px;
        overflow: hidden;
    }
    .panel-head {
        padding: 1.1rem 1.5rem;
        border-bottom: 1px solid #eef0ec;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .panel-head-title {
        font-size: 13.5px;
        font-weight: 600;
        color: #1a1f1b;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .panel-head-title::before {
        content: '';
        width: 3px; height: 14px;
        background: #1a5c2a;
        border-radius: 2px;
        display: block;
    }
    .panel-head-link {
        font-size: 12.5px;
        color: #1a5c2a;
        text-decoration: none;
        font-weight: 500;
        display: flex; align-items: center; gap: 4px;
        transition: opacity 0.15s;
    }
    .panel-head-link:hover { opacity: 0.7; }

    /* ── Table ── */
    .dash-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13.5px;
    }
    .dash-table thead tr {
        border-bottom: 1px solid #eef0ec;
    }
    .dash-table thead th {
        padding: 10px 1.5rem;
        text-align: left;
        font-size: 11px;
        font-weight: 600;
        color: #8a9490;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .dash-table tbody tr {
        border-bottom: 1px solid #f5f6f4;
        transition: background 0.1s;
    }
    .dash-table tbody tr:last-child { border-bottom: none; }
    .dash-table tbody tr:hover { background: #f9faf9; }
    .dash-table tbody td {
        padding: 14px 1.5rem;
        vertical-align: middle;
    }

    .td-date-main { font-size: 13.5px; font-weight: 500; color: #1a1f1b; }
    .td-date-rel  { font-size: 11.5px; color: #8a9490; margin-top: 2px; }
    .td-jenis     { font-size: 13.5px; color: #1a1f1b; }

    /* Status badges */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 2px;
        font-size: 11.5px;
        font-weight: 600;
        letter-spacing: 0.02em;
    }
    .badge::before {
        content: '';
        width: 5px; height: 5px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    .badge-proses { background: #fef3c7; color: #92400e; }
    .badge-proses::before { background: #d97706; }
    .badge-lulus  { background: #dcfce7; color: #14532d; }
    .badge-lulus::before  { background: #16a34a; }
    .badge-tolak  { background: #fee2e2; color: #7f1d1d; }
    .badge-tolak::before  { background: #dc2626; }

    /* ── Empty state ── */
    .empty-state {
        padding: 3.5rem 1.5rem;
        text-align: center;
    }
    .empty-icon {
        width: 52px; height: 52px;
        background: #e8f4ec;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem;
        color: #1a5c2a;
    }
    .empty-icon svg { width: 22px; height: 22px; }
    .empty-state p { font-size: 14px; color: #5a6860; margin: 0 0 4px; font-weight: 500; }
    .empty-state span { font-size: 12.5px; color: #8a9490; }
    .empty-state a {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 1.25rem;
        background: #1a5c2a;
        color: #fff;
        font-size: 13px;
        font-weight: 500;
        padding: 8px 18px;
        border-radius: 3px;
        text-decoration: none;
        transition: background 0.15s;
    }
    .empty-state a:hover { background: #2d7a40; }

    /* ── Quick action panel ── */
    .qa-head {
        padding: 1.1rem 1.5rem;
        border-bottom: 1px solid #eef0ec;
        font-size: 13.5px;
        font-weight: 600;
        color: #1a1f1b;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .qa-head::before {
        content: '';
        width: 3px; height: 14px;
        background: #1a5c2a;
        border-radius: 2px;
        display: block;
    }
    .qa-body { padding: 1.25rem 1.5rem; }

    .qa-btn-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        background: #1a5c2a;
        color: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: 13.5px;
        font-weight: 500;
        padding: 11px 0;
        border-radius: 3px;
        text-decoration: none;
        transition: background 0.15s;
        margin-bottom: 10px;
    }
    .qa-btn-primary:hover { background: #2d7a40; }
    .qa-btn-primary svg { width: 15px; height: 15px; }

    .qa-btn-secondary {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        background: transparent;
        color: #1a1f1b;
        font-family: 'DM Sans', sans-serif;
        font-size: 13.5px;
        font-weight: 500;
        padding: 10px 0;
        border-radius: 3px;
        border: 1.5px solid #d4d9d5;
        text-decoration: none;
        transition: border-color 0.15s, background 0.15s;
    }
    .qa-btn-secondary:hover { border-color: #1a5c2a; background: #f5f6f4; }
    .qa-btn-secondary svg { width: 15px; height: 15px; color: #5a6860; }

    /* Divider in quick action */
    .qa-divider {
        border: none;
        border-top: 1px solid #eef0ec;
        margin: 1.25rem 0;
    }

    /* Info rows in quick action */
    .qa-info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 7px 0;
        font-size: 12.5px;
        border-bottom: 1px solid #f5f6f4;
    }
    .qa-info-row:last-child { border-bottom: none; }
    .qa-info-row .qa-info-label { color: #8a9490; }
    .qa-info-row .qa-info-val   { font-weight: 500; color: #1a1f1b; }
    .qa-info-section-title {
        font-size: 11px;
        font-weight: 600;
        color: #8a9490;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 8px;
    }
</style>

<div class="dash-wrap">

    <!-- Page Header -->
    <div class="dash-page-header">
        <div>
            <h2>Selamat Datang, {{ auth()->user()->name }}</h2>
            <p>Ringkasan status permohonan data anda</p>
        </div>
        <div class="dash-date-badge">
            {{ now()->locale('ms')->isoFormat('dddd, D MMMM YYYY') }}
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="stat-grid">

        <div class="stat-card total">
            <div class="stat-icon total">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
            </div>
            <div class="stat-label">Jumlah Permohonan</div>
            <div class="stat-value">{{ $total }}</div>
            <div class="stat-sub">Keseluruhan rekod</div>
        </div>

        <div class="stat-card proses">
            <div class="stat-icon proses">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div class="stat-label">Dalam Proses</div>
            <div class="stat-value">{{ $proses }}</div>
            <div class="stat-sub">Sedang disemak</div>
        </div>

        <div class="stat-card lulus">
            <div class="stat-icon lulus">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <div class="stat-label">Diluluskan</div>
            <div class="stat-value">{{ $lulus }}</div>
            <div class="stat-sub">Berjaya diluluskan</div>
        </div>

        <div class="stat-card tolak">
            <div class="stat-icon tolak">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
            </div>
            <div class="stat-label">Ditolak</div>
            <div class="stat-value">{{ $tolak }}</div>
            <div class="stat-sub">Tidak diluluskan</div>
        </div>

    </div>

    <!-- Content Grid -->
    <div class="content-grid">

        <!-- Recent Table -->
        <div class="panel">
            <div class="panel-head">
                <span class="panel-head-title">Permohonan Terkini</span>
                <a href="{{ route('permohonan.index') }}" class="panel-head-link">
                    Lihat Semua
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </a>
            </div>

            @if($latest->count() > 0)
            <table class="dash-table">
                <thead>
                    <tr>
                        <th>Tarikh & Masa</th>
                        <th>Kategori</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latest as $item)
                    <tr>
                        <td>
                            <div class="td-date-main">{{ $item->created_at->format('d/m/Y') }} &nbsp; {{ $item->created_at->format('h:i A') }}</div>
                            <div class="td-date-rel">{{ $item->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="td-jenis">{{ $item->jenis }}</td>
                        <td>
                            @if($item->status == 'Dalam Proses')
                                <span class="badge badge-proses">Dalam Proses</span>
                            @elseif($item->status == 'Diluluskan')
                                <span class="badge badge-lulus">Diluluskan</span>
                            @elseif($item->status == 'Ditolak')
                                <span class="badge badge-tolak">Ditolak</span>
                            @else
                                <span class="badge badge-proses">{{ $item->status }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @else
            <div class="empty-state">
                <div class="empty-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <p>Tiada permohonan lagi</p>
                <span>Sila buat permohonan pertama anda untuk memulakan.</span>
                <br>
                <a href="{{ route('permohonan') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:14px;height:14px;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Mohon Data Sekarang
                </a>
            </div>
            @endif
        </div>

        <!-- Quick Action -->
        <div class="panel">
            <div class="qa-head">Tindakan Pantas</div>
            <div class="qa-body">

                <a href="{{ route('permohonan') }}" class="qa-btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Mohon Data Baru
                </a>

                <a href="{{ route('permohonan.index') }}" class="qa-btn-secondary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    Rekod Permohonan
                </a>

                <hr class="qa-divider">

                <div class="qa-info-section-title">Ringkasan Status</div>

                <div class="qa-info-row">
                    <span class="qa-info-label">Jumlah</span>
                    <span class="qa-info-val">{{ $total }} permohonan</span>
                </div>
                <div class="qa-info-row">
                    <span class="qa-info-label">Dalam Proses</span>
                    <span class="qa-info-val" style="color:#b45309;">{{ $proses }}</span>
                </div>
                <div class="qa-info-row">
                    <span class="qa-info-label">Diluluskan</span>
                    <span class="qa-info-val" style="color:#166534;">{{ $lulus }}</span>
                </div>
                <div class="qa-info-row">
                    <span class="qa-info-label">Ditolak</span>
                    <span class="qa-info-val" style="color:#991b1b;">{{ $tolak }}</span>
                </div>

            </div>
        </div>

    </div>

</div>

</x-layouts.app>