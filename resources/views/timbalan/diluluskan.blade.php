<x-layouts.app-timbalan title="Diluluskan">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap');

    .page-wrap {
        font-family: 'DM Sans', sans-serif;
        background: #eef0ec;
        min-height: 100vh;
        padding: 2.25rem 2rem 4rem;
    }

    /* ── Page header ── */
    .page-header {
        margin-bottom: 1.75rem;
        border-bottom: 1px solid #d4d9d5;
        padding-bottom: 1.25rem;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .page-header h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.75rem;
        color: #1a1f1b;
        margin: 0 0 4px;
        letter-spacing: -0.01em;
    }
    .page-header p { font-size: 13px; color: #5a6860; margin: 0; }

    /* Alert strip */
    .alert-success {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-left: 4px solid #16a34a;
        border-radius: 3px;
        padding: 10px 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #14532d;
    }
    .alert-success svg { width: 15px; height: 15px; flex-shrink: 0; color: #16a34a; }

    /* ── Panel ── */
    .panel {
        background: #fff;
        border: 1px solid #d4d9d5;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(26,92,42,0.07);
    }
    .panel-head {
        padding: 1.1rem 1.5rem;
        border-bottom: 1px solid #eef0ec;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .panel-head-title {
        font-size: 13.5px; font-weight: 600; color: #1a1f1b;
        display: flex; align-items: center; gap: 8px;
    }
    .panel-head-title::before {
        content: ''; width: 3px; height: 14px;
        background: #16a34a; border-radius: 2px; display: block;
    }
    .panel-count {
        font-size: 12px; color: #14532d;
        background: #dcfce7; border: 1px solid #bbf7d0;
        border-radius: 2px; padding: 3px 10px;
        display: flex; align-items: center; gap: 5px;
    }
    .panel-count::before {
        content: ''; width: 5px; height: 5px;
        border-radius: 50%; background: #16a34a;
    }

    /* ── Table ── */
    .tbl { width: 100%; border-collapse: collapse; font-size: 13.5px; }
    .tbl thead tr { background: #f5f6f4; border-bottom: 1.5px solid #d4d9d5; }
    .tbl thead th {
        padding: 11px 1.25rem;
        text-align: left;
        font-size: 11px; font-weight: 600; color: #8a9490;
        text-transform: uppercase; letter-spacing: 0.06em; white-space: nowrap;
    }
    .tbl tbody tr { border-bottom: 1px solid #f0f2f0; transition: background 0.1s; }
    .tbl tbody tr:last-child { border-bottom: none; }
    .tbl tbody tr:hover { background: #f9faf9; }
    .tbl tbody td { padding: 14px 1.25rem; vertical-align: middle; color: #1a1f1b; }

    .td-nama { font-size: 13.5px; font-weight: 500; color: #1a1f1b; }
    .td-nama-sub { font-size: 11.5px; color: #8a9490; margin-top: 2px; }

    /* Status badge */
    .badge-lulus {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 4px 10px; border-radius: 2px;
        font-size: 11.5px; font-weight: 600;
        background: #dcfce7; color: #14532d;
    }
    .badge-lulus::before {
        content: ''; width: 5px; height: 5px;
        border-radius: 50%; background: #16a34a;
    }

    /* Empty state */
    .empty-state { padding: 4rem 2rem; text-align: center; }
    .empty-icon {
        width: 52px; height: 52px; background: #dcfce7;
        border-radius: 50%; display: flex; align-items: center;
        justify-content: center; margin: 0 auto 1rem; color: #16a34a;
    }
    .empty-icon svg { width: 22px; height: 22px; }
    .empty-state p { font-size: 14px; color: #5a6860; font-weight: 500; margin: 0 0 4px; }
    .empty-state span { font-size: 12.5px; color: #8a9490; }
</style>

<div class="page-wrap">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2>Permohonan Diluluskan</h2>
            <p>Senarai permohonan yang telah diluluskan</p>
        </div>
    </div>

    @php $count = \App\Models\Permohonan::where('status','Diluluskan')->count(); @endphp

    @if($count > 0)
    <div class="alert-success">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        Sebanyak <strong>&nbsp;{{ $count }} permohonan&nbsp;</strong> telah berjaya diluluskan.
    </div>
    @endif

    <!-- Table Panel -->
    <div class="panel">
        <div class="panel-head">
            <span class="panel-head-title">Permohonan Diluluskan</span>
            <span class="panel-count">{{ $count }} diluluskan</span>
        </div>

        <table class="tbl">
            <thead>
                <tr>
                    <th>Pemohon</th>
                    <th>Kategori</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

            @forelse(\App\Models\Permohonan::where('status','Diluluskan')->latest()->get() as $permohonan)
            <tr>
                <td>
                    <div class="td-nama">{{ $permohonan->nama }}</div>
                    <div class="td-nama-sub">{{ $permohonan->created_at->format('d/m/Y') }} · {{ $permohonan->created_at->diffForHumans() }}</div>
                </td>
                <td>{{ $permohonan->jenis }}</td>
                <td><span class="badge-lulus">Diluluskan</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="3">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        </div>
                        <p>Tiada permohonan diluluskan</p>
                        <span>Belum ada permohonan yang diluluskan setakat ini.</span>
                    </div>
                </td>
            </tr>
            @endforelse

            </tbody>
        </table>
    </div>

</div>

</x-layouts.app-timbalan>