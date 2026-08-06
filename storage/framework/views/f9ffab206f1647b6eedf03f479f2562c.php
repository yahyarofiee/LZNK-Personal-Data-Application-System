<?php if (isset($component)) { $__componentOriginal3591e56c97a711c7cc21fcbceea9a900 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3591e56c97a711c7cc21fcbceea9a900 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app-dpo','data' => ['title' => 'Dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app-dpo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard']); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap');

    .dpo-wrap {
        font-family: 'DM Sans', sans-serif;
        background: #eef0ec;
        min-height: 100vh;
        padding: 2.25rem 2rem 4rem;
    }

    /* ── Page header ── */
    .dpo-page-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid #d4d9d5;
        padding-bottom: 1.25rem;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
    }
    .dpo-page-header h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.75rem;
        color: #1a1f1b;
        margin: 0 0 4px;
        letter-spacing: -0.01em;
    }
    .dpo-page-header p { font-size: 13px; color: #5a6860; margin: 0; }
    .dpo-date-badge {
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
        text-decoration: none;
        display: block;
        transition: box-shadow 0.15s, transform 0.15s;
    }
    .stat-card:hover { box-shadow: 0 4px 16px rgba(26,92,42,0.1); transform: translateY(-2px); }
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
    }
    .stat-icon svg { width: 18px; height: 18px; }
    .stat-icon.total  { background: #e8f4ec; color: #1a5c2a; }
    .stat-icon.proses { background: #fef3c7; color: #b45309; }
    .stat-icon.lulus  { background: #dcfce7; color: #166534; }
    .stat-icon.tolak  { background: #fee2e2; color: #991b1b; }

    .stat-label { font-size: 11.5px; font-weight: 500; color: #5a6860; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 6px; }
    .stat-value { font-size: 2rem; font-weight: 600; color: #1a1f1b; line-height: 1; margin-bottom: 6px; }
    .stat-sub   { font-size: 11.5px; color: #8a9490; }

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

    /* ── Table ── */
    .dpo-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
    .dpo-table thead tr { background: #f5f6f4; border-bottom: 1.5px solid #d4d9d5; }
    .dpo-table thead th {
        padding: 11px 1.25rem;
        text-align: left;
        font-size: 11px;
        font-weight: 600;
        color: #8a9490;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        white-space: nowrap;
    }
    .dpo-table thead th.center { text-align: center; }
    .dpo-table tbody tr { border-bottom: 1px solid #f0f2f0; transition: background 0.1s; }
    .dpo-table tbody tr:last-child { border-bottom: none; }
    .dpo-table tbody tr:hover { background: #f9faf9; }
    .dpo-table tbody td { padding: 13px 1.25rem; vertical-align: middle; color: #1a1f1b; }
    .dpo-table tbody td.center { text-align: center; }

    .td-nama { font-size: 13.5px; font-weight: 500; color: #1a1f1b; }
    .td-nama-sub { font-size: 11.5px; color: #8a9490; margin-top: 2px; }

    /* Status badges */
    .badge {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 4px 10px; border-radius: 2px;
        font-size: 11.5px; font-weight: 600; letter-spacing: 0.02em; white-space: nowrap;
    }
    .badge::before { content: ''; width: 5px; height: 5px; border-radius: 50%; flex-shrink: 0; }
    .badge-proses { background: #fef3c7; color: #92400e; }
    .badge-proses::before { background: #d97706; }
    .badge-lulus  { background: #dcfce7; color: #14532d; }
    .badge-lulus::before  { background: #16a34a; }
    .badge-tolak  { background: #fee2e2; color: #7f1d1d; }
    .badge-tolak::before  { background: #dc2626; }

    /* Action buttons */
    .act-btn {
        display: inline-flex; align-items: center; gap: 5px;
        font-family: 'DM Sans', sans-serif;
        font-size: 12px; font-weight: 500;
        padding: 6px 13px; border-radius: 2px;
        border: 1.5px solid transparent;
        cursor: pointer; text-decoration: none;
        transition: background 0.15s, border-color 0.15s, color 0.15s;
        white-space: nowrap; background: none;
    }
    .act-btn svg { width: 13px; height: 13px; flex-shrink: 0; }
    .act-detail  { background: #e8f4ec; color: #1a5c2a; border-color: #b8ddc4; }
    .act-detail:hover  { background: #1a5c2a; color: #fff; border-color: #1a5c2a; }
    .act-lulus   { background: #dcfce7; color: #14532d; border-color: #bbf7d0; }
    .act-lulus:hover   { background: #16a34a; color: #fff; border-color: #16a34a; }
    .act-tolak   { background: #fee2e2; color: #7f1d1d; border-color: #fecaca; }
    .act-tolak:hover   { background: #dc2626; color: #fff; border-color: #dc2626; }

    .selesai-label { font-size: 12px; color: #aab5ac; font-style: italic; }

    /* Empty state */
    .empty-state { padding: 4rem 2rem; text-align: center; }
    .empty-icon { width: 52px; height: 52px; background: #e8f4ec; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: #1a5c2a; }
    .empty-icon svg { width: 22px; height: 22px; }
    .empty-state p { font-size: 14px; color: #5a6860; font-weight: 500; }

    /* ══════════════
       MODAL DETAIL
    ══════════════ */
    .modal-overlay {
        display: none;
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 50;
        align-items: center; justify-content: center;
        padding: 1rem;
    }
    .modal-overlay.active { display: flex; }

    .modal-box {
        background: #fff;
        border-radius: 4px;
        width: 100%; max-width: 860px;
        border: 1px solid #d4d9d5;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(0,0,0,0.18);
        animation: modalIn 0.18s ease;
        max-height: 90vh;
        display: flex; flex-direction: column;
    }
    @keyframes modalIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .modal-head {
        padding: 1.1rem 1.75rem;
        border-bottom: 1px solid #d4d9d5;
        background: #f5f6f4;
        display: flex; align-items: center; justify-content: space-between;
        flex-shrink: 0;
    }
    .modal-head-left { display: flex; align-items: center; gap: 12px; }
    .modal-head-icon {
        width: 34px; height: 34px;
        background: #1a5c2a; border-radius: 3px;
        display: flex; align-items: center; justify-content: center;
        color: #fff; flex-shrink: 0;
    }
    .modal-head-icon svg { width: 16px; height: 16px; }
    .modal-head-title {
        font-family: 'DM Serif Display', serif;
        font-size: 1.1rem; color: #1a1f1b; margin: 0 0 2px;
    }
    .modal-head-sub { font-size: 12px; color: #8a9490; margin: 0; }

    .modal-body {
        padding: 1.5rem 1.75rem;
        overflow-y: auto;
        flex: 1;
    }

    /* Info grid in modal */
    .modal-section-label {
        font-size: 11px; font-weight: 600; color: #8a9490;
        text-transform: uppercase; letter-spacing: 0.06em;
        margin-bottom: 10px;
        display: flex; align-items: center; gap: 8px;
    }
    .modal-section-label::after {
        content: ''; flex: 1; height: 1px; background: #eef0ec;
    }
    .modal-info-grid {
        display: grid; grid-template-columns: 1fr 1fr;
        gap: 1rem 2rem; margin-bottom: 1.5rem;
    }
    .modal-info-item label {
        display: block; font-size: 11px; font-weight: 500;
        color: #8a9490; text-transform: uppercase;
        letter-spacing: 0.04em; margin-bottom: 4px;
    }
    .modal-info-item p {
        font-size: 13.5px; color: #1a1f1b;
        font-weight: 400; line-height: 1.5;
    }
    .modal-info-item.full { grid-column: 1 / -1; }

    /* Lampiran cards */
    .lampiran-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }
    .lampiran-card {
        display: flex; align-items: center; gap: 12px;
        padding: 12px 14px;
        background: #f9faf9; border: 1.5px solid #d4d9d5;
        border-radius: 3px; cursor: pointer;
        transition: border-color 0.15s, background 0.15s;
        text-align: left; width: 100%;
        font-family: 'DM Sans', sans-serif;
        color: inherit; 
    }
    .lampiran-card:hover { border-color: #1a5c2a; background: #f0f7f2; }
    .lampiran-icon {
        width: 34px; height: 34px; border-radius: 3px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .lampiran-icon svg { width: 16px; height: 16px; }
    .lampiran-icon.surat  { background: #e8f4ec; color: #1a5c2a; }
    .lampiran-icon.ic     { background: #eff6ff; color: #1d4ed8; }
    .lampiran-icon.ssm    { background: #f5f3ff; color: #7c3aed; }
    .lampiran-icon.ros    { background: #fff7ed; color: #c2410c; }
    .lampiran-name  { font-size: 13px; font-weight: 500; color: #1a1f1b; }
    .lampiran-sub   { font-size: 11.5px; color: #8a9490; margin-top: 1px; }

    /* Modal footer */
    .modal-foot {
        padding: 1rem 1.75rem;
        border-top: 1px solid #d4d9d5;
        background: #f5f6f4;
        display: flex; align-items: center; justify-content: space-between;
        gap: 12px; flex-shrink: 0;
    }
    .modal-foot-date { font-size: 12px; color: #8a9490; }
    .modal-foot-actions { display: flex; align-items: center; gap: 8px; }
    .btn-close-modal {
        display: inline-flex; align-items: center; gap: 6px;
        font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500;
        padding: 8px 18px; border-radius: 3px;
        border: 1.5px solid #d4d9d5; background: #fff; color: #5a6860;
        cursor: pointer; transition: border-color 0.15s;
    }
    .btn-close-modal:hover { border-color: #999; color: #1a1f1b; }

    /* ══════════════
       MODAL TOLAK
    ══════════════ */
    .tolak-modal-box {
        background: #fff; border-radius: 4px;
        width: 100%; max-width: 460px;
        border: 1px solid #d4d9d5; overflow: hidden;
        box-shadow: 0 8px 40px rgba(0,0,0,0.18);
        animation: modalIn 0.18s ease;
    }
    .tolak-modal-head {
        background: #fee2e2; border-bottom: 1px solid #fecaca;
        padding: 1rem 1.5rem; display: flex; align-items: center; gap: 10px;
    }
    .tolak-modal-head-icon {
        width: 30px; height: 30px; background: #dc2626; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #fff; flex-shrink: 0;
    }
    .tolak-modal-head-icon svg { width: 14px; height: 14px; }
    .tolak-modal-head h3 {
        font-family: 'DM Serif Display', serif; font-size: 1.05rem;
        color: #7f1d1d; margin: 0;
    }
    .tolak-modal-body { padding: 1.35rem 1.5rem; }
    .tolak-field-label {
        font-size: 11.5px; font-weight: 600; color: #5a6860;
        text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 6px; display: block;
    }
    .tolak-textarea {
        display: block; width: 100%;
        font-family: 'DM Sans', sans-serif; font-size: 13.5px;
        color: #1a1f1b; background: #f9faf9;
        border: 1.5px solid #d4d9d5; border-radius: 3px;
        padding: 10px 13px; outline: none; resize: vertical;
        box-sizing: border-box; margin-bottom: 1.1rem;
        transition: border-color 0.15s;
    }
    .tolak-textarea:focus { border-color: #dc2626; background: #fff; box-shadow: 0 0 0 3px rgba(220,38,38,0.08); }
    .checkbox-group { display: flex; flex-direction: column; gap: 7px; margin-bottom: 1.25rem; }
    .checkbox-item {
        display: flex; align-items: center; gap: 9px;
        font-size: 13px; color: #1a1f1b; cursor: pointer;
    }
    .checkbox-item input[type="checkbox"] {
        width: 15px; height: 15px; accent-color: #dc2626; cursor: pointer;
    }
    .tolak-modal-foot {
        padding: 1rem 1.5rem; border-top: 1px solid #f0f2f0;
        display: flex; justify-content: flex-end; gap: 8px;
        background: #fafafa;
    }
    .btn-tolak-submit {
        display: inline-flex; align-items: center; gap: 6px;
        font-family: 'DM Sans', sans-serif; font-size: 13.5px; font-weight: 500;
        padding: 9px 22px; border-radius: 3px; border: none;
        background: #dc2626; color: #fff; cursor: pointer;
        transition: background 0.15s;
    }
    .btn-tolak-submit:hover { background: #b91c1c; }

    /* PDF Modal */
    .pdf-modal-box {
        background: #fff; border-radius: 4px;
        width: 92%; height: 90vh;
        display: flex; flex-direction: column; overflow: hidden;
        border: 1px solid #d4d9d5;
        box-shadow: 0 8px 40px rgba(0,0,0,0.22);
        animation: modalIn 0.18s ease;
    }
    .pdf-modal-head {
        display: flex; align-items: center; justify-content: space-between;
        padding: 0.9rem 1.5rem; border-bottom: 1px solid #d4d9d5;
        background: #f5f6f4; flex-shrink: 0;
    }
    .pdf-modal-head span { font-size: 13.5px; font-weight: 600; color: #1a1f1b; }
</style>

<div class="dpo-wrap">

    <div class="dpo-page-header">
        <div>
            <h2>Dashboard DPO</h2>
            <p>Pengurusan permohonan data pemohon</p>
        </div>
        <div class="dpo-date-badge">
            <?php echo e(now()->locale('ms')->isoFormat('dddd, D MMMM YYYY')); ?>

        </div>
    </div>

<?php
    $jumlahPermohonan = \App\Models\Permohonan::count();

    $jumlahDalamProses = \App\Models\Permohonan::whereIn('status', [
        'Dalam Proses',
        'Menunggu Kelulusan Timbalan'
    ])->count();

    $jumlahDiluluskan = \App\Models\Permohonan::where('status', 'Diluluskan')->count();

    $jumlahDitolak = \App\Models\Permohonan::where('status', 'Ditolak')->count();
?>

    <div class="stat-grid">

        <a href="<?php echo e(route('dpo.permohonan')); ?>" class="stat-card total">
            <div class="stat-icon total">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
            </div>
            <div class="stat-label">Jumlah Permohonan</div>
            <div class="stat-value"><?php echo e($jumlahPermohonan); ?></div>
            <div class="stat-sub">Keseluruhan rekod</div>
        </a>

        <a href="<?php echo e(route('dpo.dalam.proses')); ?>" class="stat-card proses">
            <div class="stat-icon proses">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div class="stat-label">Dalam Proses</div>
            <div class="stat-value"><?php echo e($jumlahDalamProses); ?></div>
            <div class="stat-sub">Menunggu tindakan</div>
        </a>

        <a href="<?php echo e(route('dpo.diluluskan')); ?>" class="stat-card lulus">
            <div class="stat-icon lulus">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <div class="stat-label">Diluluskan</div>
            <div class="stat-value"><?php echo e($jumlahDiluluskan); ?></div>
            <div class="stat-sub">Berjaya diluluskan</div>
        </a>

        <a href="<?php echo e(route('dpo.ditolak')); ?>" class="stat-card tolak">
            <div class="stat-icon tolak">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
            </div>
            <div class="stat-label">Ditolak</div>
            <div class="stat-value"><?php echo e($jumlahDitolak); ?></div>
            <div class="stat-sub">Tidak diluluskan</div>
        </a>

    </div>

    <div class="panel">
        <div class="panel-head">
            <span class="panel-head-title">Senarai Permohonan</span>
        </div>

        <table class="dpo-table">
            <thead>
                <tr>
                    <th>Pemohon</th>
                    <th>Kategori</th>
                    <th class="center">Status</th>
                    <th class="center">Detail</th>
                    <th class="center">Tindakan</th>
                </tr>
            </thead>
            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = \App\Models\Permohonan::latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td>
                    <div class="td-nama"><?php echo e($item->nama); ?></div>
                    <div class="td-nama-sub"><?php echo e($item->created_at->format('d/m/Y')); ?> · <?php echo e($item->created_at->diffForHumans()); ?></div>
                </td>
                <td><?php echo e($item->jenis); ?></td>
                <td class="center">
                    <?php if($item->status == 'Dalam Proses'): ?>
                        <span class="badge badge-proses">Dalam Proses</span>
                    <?php elseif($item->status == 'Diluluskan'): ?>
                        <span class="badge badge-lulus">Diluluskan</span>
                    <?php elseif($item->status == 'Menunggu Kelulusan Timbalan'): ?>
                        <span class="badge badge-proses">Menunggu Kelulusan Timbalan</span>
                    <?php elseif($item->status == 'Ditolak'): ?>
                        <span class="badge badge-tolak">Ditolak</span>
                    <?php else: ?>
                        <span class="badge badge-proses"><?php echo e($item->status); ?></span>
                    <?php endif; ?>
                </td>
                <td class="center">
                    <button onclick="openModal(<?php echo e($item->id); ?>)" class="act-btn act-detail">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        Detail
                    </button>
                </td>
                <td class="center">
                    <div style="display:flex; justify-content:center; gap:6px; flex-wrap:wrap;">
                    <?php if($item->status === 'Dalam Proses'): ?>
                        <form action="<?php echo e(route('permohonan.hantar.timbalan', $item->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="act-btn act-lulus">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                Hantar ke Timbalan
                            </button>
                        </form>
                        <button type="button" onclick="openTolakModal(<?php echo e($item->id); ?>)" class="act-btn act-tolak">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            Tolak
                        </button>
                    <?php else: ?>
                        <span class="selesai-label">Selesai</span>
                    <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        </div>
                        <p>Tiada permohonan ditemui</p>
                    </div>
                </td>
            </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

<div id="modalDetail" class="modal-overlay">
    <div class="modal-box">

        <div class="modal-head">
            <div class="modal-head-left">
                <div class="modal-head-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div>
                    <p class="modal-head-title">Detail Permohonan</p>
                    <p class="modal-head-sub">Sistem Pengurusan Permohonan Data LZNK</p>
                </div>
            </div>
            <span id="modalStatus"></span>
        </div>

        <div class="modal-body">
            <div id="modalContent"></div>
        </div>

        <div class="modal-foot">
            <div class="modal-foot-date" id="modalDate"></div>
            <div class="modal-foot-actions">
                <form id="formLulus" method="POST" style="display:none;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <button type="submit" class="act-btn act-lulus" style="padding:8px 18px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:13px;height:13px;"><polyline points="20 6 9 17 4 12"/></svg>
                        Lulus
                    </button>
                </form>
                <button type="button" id="btnTolakModal" onclick="openTolakModal(currentPermohonanId)" class="act-btn act-tolak" style="display:none; padding:8px 18px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:13px;height:13px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    Tolak
                </button>
                <button onclick="closeModal()" class="btn-close-modal">Tutup</button>
            </div>
        </div>

    </div>
</div>

<div id="tolakModal" class="modal-overlay">
    <div class="tolak-modal-box">

        <div class="tolak-modal-head">
            <div class="tolak-modal-head-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </div>
            <h3>Sebab Penolakan</h3>
        </div>

        <div class="tolak-modal-body">
            <form id="formTolakPopup" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <label class="tolak-field-label">Nyatakan sebab penolakan</label>
                <textarea name="sebab" required rows="4"
                    placeholder="Contoh: Dokumen tidak jelas / Lampiran tiada"
                    class="tolak-textarea"></textarea>

                <label class="tolak-field-label">Dokumen perlu dikemaskini</label>
                <div class="checkbox-group">
                    <label class="checkbox-item"><input type="checkbox" name="surat" value="1"> Surat Permohonan Rasmi</label>
                    <label class="checkbox-item"><input type="checkbox" name="ic" value="1"> Salinan Kad Pengenalan (IC)</label>
                    <label class="checkbox-item"><input type="checkbox" name="ssm" value="1"> Sijil SSM</label>
                    <label class="checkbox-item"><input type="checkbox" name="ros" value="1"> Sijil ROS</label>
                </div>

                <div class="tolak-modal-foot" style="padding:0; background:none; justify-content:flex-end; margin-top:0;">
                    <button type="button" onclick="closeTolakModal()" class="btn-close-modal">Batal</button>
                    <button type="submit" class="btn-tolak-submit">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:14px;height:14px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Hantar Penolakan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<div id="pdfModal" class="modal-overlay">
    <div class="pdf-modal-box">
        <div class="pdf-modal-head">
            <span>Pratonton Lampiran</span>
            <button onclick="closePdfModal()" class="btn-close-modal">Tutup</button>
        </div>
        <iframe id="pdfViewer" style="width:100%; flex:1; border:none;"></iframe>
    </div>
</div>

<script>
let currentPermohonanId = null;

function openModal(id) {
    currentPermohonanId = id;

    fetch(`/api/permohonan/${id}`)
        .then(res => res.json())
        .then(data => {

            // Status badge
            const statusEl = document.getElementById('modalStatus');
            statusEl.className = 'badge';
            if (data.status === 'Dalam Proses') statusEl.classList.add('badge-proses');
            else if (data.status === 'Diluluskan') statusEl.classList.add('badge-lulus');
            else if (data.status === 'Ditolak')   statusEl.classList.add('badge-tolak');
            statusEl.innerText = data.status;

            // Lampiran HTML
            const lampiranItems = [
                { key: 'surat', label: 'Surat Permohonan', sub: 'Dokumen rasmi', cls: 'surat',
                  icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>` },
                { key: 'ic',    label: 'Salinan IC',        sub: 'Kad pengenalan',  cls: 'ic',
                  icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>` },
                { key: 'ssm',   label: 'Sijil SSM',         sub: 'Syarikat',        cls: 'ssm',
                  icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>` },
                { key: 'ros',   label: 'Sijil ROS',         sub: 'Pertubuhan',      cls: 'ros',
                  icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>` },
            ];

            const availableLampiran = lampiranItems.filter(l => data[l.key]);
            const lampiranHTML = availableLampiran.length > 0
                ? `<div class="lampiran-grid">${availableLampiran.map(l => {

                    let cleanPath = data[l.key].replace(/^\/+/, '');

                    return `
                    <a
                        class="lampiran-card"
                        href="/preview/${cleanPath}"
                        target="_blank"
                        style="text-decoration:none;"
                    >
                        <div class="lampiran-icon ${l.cls}">
                            ${l.icon}
                        </div>

                        <div>
                            <div class="lampiran-name">${l.label}</div>
                            <div class="lampiran-sub">${l.sub}</div>
                        </div>
                    </a>`;
                }).join('')}</div>`
                : '<span style="font-size:13px;color:#8a9490;">Tiada lampiran</span>';

            const isOrg = ['Syarikat','Pertubuhan','Agensi'].includes(data.jenis);

            document.getElementById('modalContent').innerHTML = `
                <div class="modal-section-label">Maklumat Pemohon</div>
                <div class="modal-info-grid">
                    <div class="modal-info-item">
                        <label>Nama Pemohon</label>
                        <p>${data.nama ?? '-'}</p>
                    </div>
                    <div class="modal-info-item">
                        <label>Kategori</label>
                        <p>${data.jenis ?? '-'}</p>
                    </div>
                    ${isOrg && data.nama_organisasi ? `
                    <div class="modal-info-item">
                        <label>Nama ${data.jenis}</label>
                        <p>${data.nama_organisasi}</p>
                    </div>` : ''}
                    ${isOrg && data.no_pendaftaran ? `
                    <div class="modal-info-item">
                        <label>No. Pendaftaran</label>
                        <p>${data.no_pendaftaran}</p>
                    </div>` : ''}
                    <div class="modal-info-item">
                        <label>No. Telefon</label>
                        <p>${data.telefon ?? '-'}</p>
                    </div>
                    <div class="modal-info-item">
                        <label>E-mel</label>
                        <p>${data.email ?? '-'}</p>
                    </div>
                    <div class="modal-info-item full">
                        <label>Alamat</label>
                        <p>
                            ${data.alamat ?? '-'}<br>
                            ${data.poskod ?? ''} ${data.negeri ?? ''}<br>
                            Malaysia
                        </p>
                    </div>
                    <div class="modal-info-item full">
                        <label>Tujuan Permohonan</label>
                        <p>${data.tujuan ?? '-'}</p>
                    </div>
                </div>
                <div class="modal-section-label">Lampiran Dokumen</div>
                ${lampiranHTML}
            `;

            document.getElementById('modalDate').innerHTML = `Tarikh Permohonan: ${new Date(data.created_at).toLocaleString('ms-MY')}`;
            document.getElementById('formLulus').action = `/permohonan/${id}/hantar-timbalan`;

            const showActions = data.status === 'Dalam Proses';
            document.getElementById('formLulus').style.display    = showActions ? 'block' : 'none';
            document.getElementById('btnTolakModal').style.display = showActions ? 'block' : 'none';

            document.getElementById('modalDetail').classList.add('active');
        });
}

function closeModal() {
    document.getElementById('modalDetail').classList.remove('active');
}

function openTolakModal(id) {
    document.getElementById('formTolakPopup').action = `/permohonan/${id}/tolak`;
    document.getElementById('tolakModal').classList.add('active');
}

function closeTolakModal() {
    document.getElementById('tolakModal').classList.remove('active');
}

function openPdfModal(filePath) {

    if (!filePath) {
        alert('Fail tidak dijumpai');
        return;
    }

    let cleanPath = filePath.replace(/^\/+/, '');

    const previewUrl =
        "<?php echo e(url('/preview')); ?>/" +
        cleanPath;

    window.open(previewUrl, '_blank');
}

function closePdfModal() {
    document.getElementById('pdfModal').classList.remove('active');
    document.getElementById('pdfViewer').src = '';
}
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3591e56c97a711c7cc21fcbceea9a900)): ?>
<?php $attributes = $__attributesOriginal3591e56c97a711c7cc21fcbceea9a900; ?>
<?php unset($__attributesOriginal3591e56c97a711c7cc21fcbceea9a900); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3591e56c97a711c7cc21fcbceea9a900)): ?>
<?php $component = $__componentOriginal3591e56c97a711c7cc21fcbceea9a900; ?>
<?php unset($__componentOriginal3591e56c97a711c7cc21fcbceea9a900); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\MohonData-LZNK\resources\views/dpo/dashboard.blade.php ENDPATH**/ ?>