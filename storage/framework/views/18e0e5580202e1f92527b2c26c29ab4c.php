<?php if (isset($component)) { $__componentOriginal7537f82bed4f81317e2c186800029da5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7537f82bed4f81317e2c186800029da5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app-timbalan','data' => ['title' => 'Semua Permohonan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app-timbalan'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Semua Permohonan']); ?>

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
        background: #1a5c2a; border-radius: 2px; display: block;
    }
    .panel-count {
        font-size: 12px; color: #3d4a40;
        background: #f5f6f4; border: 1px solid #d4d9d5;
        border-radius: 2px; padding: 3px 10px;
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
    .tbl thead th.center { text-align: center; }
    .tbl tbody tr { border-bottom: 1px solid #f0f2f0; transition: background 0.1s; }
    .tbl tbody tr:last-child { border-bottom: none; }
    .tbl tbody tr:hover { background: #f9faf9; }
    .tbl tbody td { padding: 14px 1.25rem; vertical-align: middle; color: #1a1f1b; }
    .tbl tbody td.center { text-align: center; }

    .td-nama { font-size: 13.5px; font-weight: 500; color: #1a1f1b; }
    .td-nama-sub { font-size: 11.5px; color: #8a9490; margin-top: 2px; }

    /* Status badges */
    .badge {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 4px 10px; border-radius: 2px;
        font-size: 11.5px; font-weight: 600; white-space: nowrap;
    }
    .badge::before { content: ''; width: 5px; height: 5px; border-radius: 50%; flex-shrink: 0; }
    .badge-menunggu { background: #fef3c7; color: #92400e; }
    .badge-menunggu::before { background: #d97706; }
    .badge-lulus    { background: #dcfce7; color: #14532d; }
    .badge-lulus::before    { background: #16a34a; }
    .badge-tolak    { background: #fee2e2; color: #7f1d1d; }
    .badge-tolak::before    { background: #dc2626; }

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
    .act-lulus { background: #dcfce7; color: #14532d; border-color: #bbf7d0; }
    .act-lulus:hover { background: #16a34a; color: #fff; border-color: #16a34a; }
    .act-tolak { background: #fee2e2; color: #7f1d1d; border-color: #fecaca; }
    .act-tolak:hover { background: #dc2626; color: #fff; border-color: #dc2626; }

    .selesai-wrap {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 12px; color: #8a9490;
    }
    .selesai-wrap svg { width: 13px; height: 13px; }
    .selesai-lulus svg  { color: #16a34a; }
    .selesai-tolak svg  { color: #dc2626; }

    /* Empty state */
    .empty-state { padding: 4rem 2rem; text-align: center; }
    .empty-icon { width: 52px; height: 52px; background: #e8f4ec; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: #1a5c2a; }
    .empty-icon svg { width: 22px; height: 22px; }
    .empty-state p { font-size: 14px; color: #5a6860; font-weight: 500; margin: 0 0 4px; }
    .empty-state span { font-size: 12.5px; color: #8a9490; }
</style>

<div class="page-wrap">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2>Semua Permohonan</h2>
            <p>Senarai semua permohonan untuk semakan Timbalan</p>
        </div>
    </div>

    <?php
        $senarai = \App\Models\Permohonan::whereIn('status',[
            'Menunggu Kelulusan Timbalan',
            'Diluluskan',
            'Ditolak'
        ])->latest()->get();
    ?>

    <!-- Table Panel -->
    <div class="panel">
        <div class="panel-head">
            <span class="panel-head-title">Senarai Permohonan</span>
            <span class="panel-count"><?php echo e($senarai->count()); ?> rekod</span>
        </div>

        <table class="tbl">
            <thead>
                <tr>
                    <th>Pemohon</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th class="center">Tindakan</th>
                </tr>
            </thead>
            <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $senarai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permohonan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td>
                    <div class="td-nama"><?php echo e($permohonan->nama); ?></div>
                    <div class="td-nama-sub"><?php echo e($permohonan->created_at->format('d/m/Y')); ?> · <?php echo e($permohonan->created_at->diffForHumans()); ?></div>
                </td>
                <td><?php echo e($permohonan->jenis); ?></td>
                <td>
                    <?php if($permohonan->status == 'Menunggu Kelulusan Timbalan'): ?>
                        <span class="badge badge-menunggu">Menunggu Kelulusan</span>
                    <?php elseif($permohonan->status == 'Diluluskan'): ?>
                        <span class="badge badge-lulus">Diluluskan</span>
                    <?php else: ?>
                        <span class="badge badge-tolak">Ditolak</span>
                    <?php endif; ?>
                </td>
                <td class="center">

                    <?php if($permohonan->status == 'Menunggu Kelulusan Timbalan'): ?>
                    <div style="display:flex; justify-content:center; gap:6px;">
                        <form action="<?php echo e(route('permohonan.lulus.timbalan', $permohonan->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="act-btn act-lulus">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                Lulus
                            </button>
                        </form>
                        <form action="<?php echo e(route('permohonan.tolak.timbalan', $permohonan->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="act-btn act-tolak">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                Tolak
                            </button>
                        </form>
                    </div>

                    <?php elseif($permohonan->status == 'Diluluskan'): ?>
                    <div class="selesai-wrap selesai-lulus">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Selesai
                    </div>

                    <?php else: ?>
                    <div class="selesai-wrap selesai-tolak">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Selesai
                    </div>
                    <?php endif; ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        </div>
                        <p>Tiada permohonan ditemui</p>
                        <span>Belum ada permohonan yang perlu disemak.</span>
                    </div>
                </td>
            </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7537f82bed4f81317e2c186800029da5)): ?>
<?php $attributes = $__attributesOriginal7537f82bed4f81317e2c186800029da5; ?>
<?php unset($__attributesOriginal7537f82bed4f81317e2c186800029da5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7537f82bed4f81317e2c186800029da5)): ?>
<?php $component = $__componentOriginal7537f82bed4f81317e2c186800029da5; ?>
<?php unset($__componentOriginal7537f82bed4f81317e2c186800029da5); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\MohonData-LZNK\resources\views/timbalan/semua-permohonan.blade.php ENDPATH**/ ?>