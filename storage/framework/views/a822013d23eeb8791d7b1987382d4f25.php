<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Kemaskini Permohonan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Kemaskini Permohonan']); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap');

    .kemaskini-wrap {
        font-family: 'DM Sans', sans-serif;
        background: #eef0ec;
        min-height: 100vh;
        padding: 2.25rem 2rem 4rem;
    }

    /* ── Page header ── */
    .kemaskini-page-header {
        margin-bottom: 1.75rem;
        border-bottom: 1px solid #d4d9d5;
        padding-bottom: 1.25rem;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .kemaskini-page-header h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.75rem;
        color: #1a1f1b;
        margin: 0 0 4px;
        letter-spacing: -0.01em;
    }
    .kemaskini-page-header p {
        font-size: 13px;
        color: #5a6860;
        margin: 0;
    }
    .breadcrumb-line {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #5a6860;
        margin-bottom: 6px;
    }
    .breadcrumb-line .sep { color: #aab5ac; }
    .breadcrumb-line .current { color: #1a5c2a; font-weight: 500; }

    /* ── Alert penolakan ── */
    .alert-tolak {
        background: #fff5f5;
        border: 1.5px solid #fecaca;
        border-left: 4px solid #dc2626;
        border-radius: 3px;
        padding: 1rem 1.35rem;
        margin-bottom: 1.5rem;
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }
    .alert-tolak-icon {
        width: 32px; height: 32px;
        background: #fee2e2;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #dc2626;
        flex-shrink: 0;
        margin-top: 1px;
    }
    .alert-tolak-icon svg { width: 16px; height: 16px; }
    .alert-tolak-title {
        font-size: 13px;
        font-weight: 600;
        color: #7f1d1d;
        margin-bottom: 3px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }
    .alert-tolak-msg {
        font-size: 13.5px;
        color: #991b1b;
        line-height: 1.55;
    }

    /* ── Shell / card ── */
    .form-shell {
        background: #fff;
        border: 1px solid #d4d9d5;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(26,92,42,0.07);
    }

    /* ── Form head ── */
    .form-head {
        background: #1a5c2a;
        padding: 1.5rem 2rem;
        position: relative;
        overflow: hidden;
    }
    .form-head::after {
        content: '';
        position: absolute;
        right: -30px; top: -30px;
        width: 160px; height: 160px;
        border-radius: 50%;
        border: 36px solid rgba(255,255,255,0.05);
    }
    .form-head::before {
        content: '';
        position: absolute;
        right: 80px; bottom: -35px;
        width: 100px; height: 100px;
        border-radius: 50%;
        border: 26px solid rgba(255,255,255,0.04);
    }
    .form-head-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.13);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 2px;
        padding: 3px 11px;
        font-size: 11px;
        color: rgba(255,255,255,0.85);
        margin-bottom: 10px;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        font-weight: 500;
    }
    .form-head-badge::before {
        content: '';
        width: 5px; height: 5px;
        border-radius: 50%;
        background: #f59e0b;
    }
    .form-head h1 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.45rem;
        color: #fff;
        margin: 0 0 5px;
        letter-spacing: -0.01em;
    }
    .form-head p {
        font-size: 13px;
        color: rgba(255,255,255,0.7);
        margin: 0;
    }

    /* ── Section ── */
    .form-section {
        padding: 1.75rem 2rem;
        border-bottom: 1px solid #eef0ec;
    }
    .form-section:last-of-type { border-bottom: none; }

    .section-label {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1.25rem;
    }
    .section-label-num {
        width: 24px; height: 24px;
        background: #1a5c2a;
        color: #fff;
        border-radius: 2px;
        display: flex; align-items: center; justify-content: center;
        font-size: 11.5px;
        font-weight: 600;
        flex-shrink: 0;
    }
    .section-label-text {
        font-size: 13.5px;
        font-weight: 600;
        color: #1a1f1b;
    }
    .section-label-text span {
        display: block;
        font-size: 12px;
        font-weight: 400;
        color: #5a6860;
        margin-top: 1px;
    }

    /* ── Grid ── */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.15rem 1.5rem;
    }
    .col-full { grid-column: 1 / -1; }

    /* ── Fields ── */
    .field-wrap label {
        display: block;
        font-size: 12px;
        font-weight: 500;
        color: #5a6860;
        margin-bottom: 6px;
        letter-spacing: 0.02em;
        text-transform: uppercase;
    }
    .field-wrap input[type="text"],
    .field-wrap input[type="email"],
    .field-wrap textarea,
    .field-wrap select {
        display: block;
        width: 100%;
        padding: 10px 13px;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        color: #1a1f1b;
        background: #f9faf9;
        border: 1.5px solid #d4d9d5;
        border-radius: 3px;
        outline: none;
        transition: border-color 0.15s, background 0.15s;
        box-sizing: border-box;
    }
    .field-wrap input:focus,
    .field-wrap textarea:focus,
    .field-wrap select:focus {
        border-color: #1a5c2a;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(26,92,42,0.08);
    }
    .field-wrap textarea { resize: vertical; }

    /* ── Upload section bg ── */
    .upload-section {
        background: #f5f6f4;
        padding: 1.75rem 2rem;
        border-top: 1px solid #d4d9d5;
        border-bottom: 1px solid #d4d9d5;
    }
    .upload-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 1.15rem;
    }

    /* ── Upload card ── */
    .upload-card {
        background: #fff;
        border: 1.5px solid #d4d9d5;
        border-radius: 3px;
        padding: 1.1rem 1.25rem;
        transition: border-color 0.15s;
    }
    .upload-card:hover { border-color: #2d7a40; }

    .upload-card-label {
        font-size: 11.5px;
        font-weight: 600;
        color: #5a6860;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 7px;
    }
    .upload-card-label svg { width: 14px; height: 14px; color: #1a5c2a; flex-shrink: 0; }

    /* Existing file preview row */
    .file-preview-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f0f2f0;
        border: 1px solid #d4d9d5;
        border-radius: 2px;
        padding: 8px 11px;
        margin-bottom: 8px;
        gap: 8px;
    }
    .file-preview-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12.5px;
        font-weight: 500;
        color: #1a5c2a;
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
        text-decoration: underline;
        text-underline-offset: 2px;
        transition: opacity 0.15s;
    }
    .file-preview-btn:hover { opacity: 0.65; }
    .file-preview-btn svg { width: 13px; height: 13px; }

    .file-replace-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 24px; height: 24px;
        background: #fee2e2;
        border: 1px solid #fecaca;
        border-radius: 2px;
        color: #dc2626;
        cursor: pointer;
        font-size: 13px;
        font-weight: 700;
        transition: background 0.15s;
        flex-shrink: 0;
    }
    .file-replace-btn:hover { background: #fecaca; }

    /* File input styled */
    .styled-file-input {
        display: block;
        width: 100%;
        font-size: 13px;
        color: #1a1f1b;
        font-family: 'DM Sans', sans-serif;
    }
    .styled-file-input::file-selector-button {
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 500;
        padding: 6px 14px;
        background: #1a5c2a;
        color: #fff;
        border: none;
        border-radius: 2px;
        cursor: pointer;
        margin-right: 10px;
        transition: background 0.15s;
    }
    .styled-file-input::file-selector-button:hover {
        background: #2d7a40;
    }

    /* ── Footer ── */
    .form-footer {
        padding: 1.25rem 2rem;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        border-top: 1px solid #d4d9d5;
    }
    .btn-batal {
        display: inline-flex; align-items: center; gap: 6px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13.5px;
        font-weight: 500;
        padding: 9px 20px;
        border-radius: 3px;
        border: 1.5px solid #d4d9d5;
        background: transparent;
        color: #5a6860;
        text-decoration: none;
        transition: border-color 0.15s, color 0.15s;
        cursor: pointer;
    }
    .btn-batal:hover { border-color: #999; color: #1a1f1b; }
    .btn-submit {
        display: inline-flex; align-items: center; gap: 7px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13.5px;
        font-weight: 500;
        padding: 10px 26px;
        border-radius: 3px;
        border: none;
        background: #1a5c2a;
        color: #fff;
        cursor: pointer;
        transition: background 0.15s;
    }
    .btn-submit:hover { background: #2d7a40; }
    .btn-submit svg { width: 15px; height: 15px; }

    /* ── PDF Modal ── */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        z-index: 50;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
    .modal-overlay.active { display: flex; }

    .pdf-modal-box {
        background: #fff;
        border-radius: 4px;
        width: 92%;
        height: 90vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #d4d9d5;
        box-shadow: 0 8px 40px rgba(0,0,0,0.22);
        animation: modalIn 0.18s ease;
    }
    @keyframes modalIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .pdf-modal-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.9rem 1.5rem;
        border-bottom: 1px solid #d4d9d5;
        background: #f5f6f4;
        flex-shrink: 0;
    }
    .pdf-modal-head span {
        font-size: 13.5px;
        font-weight: 600;
        color: #1a1f1b;
    }
    .pdf-modal-close {
        display: inline-flex; align-items: center; gap: 6px;
        font-family: 'DM Sans', sans-serif;
        font-size: 12.5px;
        font-weight: 500;
        padding: 6px 16px;
        border-radius: 2px;
        border: 1.5px solid #d4d9d5;
        background: #fff;
        color: #5a6860;
        cursor: pointer;
        transition: border-color 0.15s;
    }
    .pdf-modal-close:hover { border-color: #999; color: #1a1f1b; }

    @media (max-width: 640px) {
        .form-grid, .upload-grid { grid-template-columns: 1fr; }
        .col-full { grid-column: 1; }
        .form-section, .upload-section, .form-footer { padding-left: 1.25rem; padding-right: 1.25rem; }
        .form-head { padding: 1.25rem 1.25rem; }
    }
</style>

<div class="kemaskini-wrap">

    <!-- Breadcrumb + Header -->
    <div class="kemaskini-page-header">
        <div>
            <div class="breadcrumb-line">
                <span>Dashboard</span>
                <span class="sep">›</span>
                <span>Rekod Permohonan</span>
                <span class="sep">›</span>
                <span class="current">Kemaskini</span>
            </div>
            <h2>Kemaskini Permohonan</h2>
            <p>Semak dan pinda maklumat permohonan anda</p>
        </div>
    </div>

    
    <?php if($data->status == 'Ditolak'): ?>
    <div class="alert-tolak">
        <div class="alert-tolak-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div>
            <div class="alert-tolak-title">Permohonan Ditolak — Tindakan Diperlukan</div>
            <div class="alert-tolak-msg"><?php echo e($data->catatan ?? 'Tiada sebab diberikan'); ?></div>
        </div>
    </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('permohonan.update', $data->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <?php
            $dokumen = json_decode($data->catatan_dokumen ?? '{}', true);
            $isIndividu = strtolower($data->jenis) === 'individu';
        ?>

        <div class="form-shell">

            <!-- Form Head -->
            <div class="form-head">
                <div class="form-head-badge">Kemaskini Rekod</div>
                <h1>Maklumat Permohonan</h1>
                <p>Pinda maklumat yang perlu dikemaskini dan muat naik semula dokumen jika diperlukan.</p>
            </div>

            <!-- Section 1: Maklumat Peribadi -->
            <div class="form-section">
                <div class="section-label">
                    <div class="section-label-num">1</div>
                    <div class="section-label-text">
                        Maklumat Pemohon
                        <span>Butiran peribadi pemohon</span>
                    </div>
                </div>

                <div class="form-grid">

                    <div class="field-wrap">
                        <label>Nama Penuh</label>
                        <input type="text" name="nama" value="<?php echo e($data->nama); ?>">
                    </div>

                    <div class="field-wrap">
                        <label>E-mel Rasmi</label>
                        <input type="email" name="email" value="<?php echo e($data->email); ?>">
                    </div>

                    <div class="field-wrap">
                        <label>No. Telefon</label>
                        <input type="text" name="telefon" value="<?php echo e($data->telefon); ?>">
                    </div>

                    <div class="field-wrap">
                        <label>Negeri</label>
                        <input type="text" name="negeri" value="<?php echo e($data->negeri); ?>">
                    </div>

                    <div class="field-wrap col-full">
                        <label>Alamat Surat Menyurat</label>
                        <textarea name="alamat" rows="3"><?php echo e($data->alamat); ?></textarea>
                    </div>

                    <div class="field-wrap">
                        <label>Poskod</label>
                        <input type="text" name="poskod" value="<?php echo e($data->poskod); ?>">
                    </div>

                </div>
            </div>

            <!-- Section 2: Tujuan -->
            <div class="form-section">
                <div class="section-label">
                    <div class="section-label-num">2</div>
                    <div class="section-label-text">
                        Tujuan Permohonan
                        <span>Nyatakan tujuan data diperlukan</span>
                    </div>
                </div>

                <div class="field-wrap">
                    <label>Tujuan</label>
                    <textarea name="tujuan" rows="4"><?php echo e($data->tujuan); ?></textarea>
                </div>
            </div>

            <!-- Section 3: Lampiran -->
            <div class="upload-section">
                <div class="section-label">
                    <div class="section-label-num">3</div>
                    <div class="section-label-text">
                        Kemaskini Lampiran
                        <span>Klik ✕ pada fail sedia ada untuk gantikan dengan fail baharu</span>
                    </div>
                </div>

                <div class="upload-grid">

                    
                    <div class="upload-card">
                        <div class="upload-card-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            Surat Permohonan Rasmi
                        </div>

                        <?php if($data->surat): ?>
                        <div id="preview_surat" class="file-preview-row">
                            <button type="button" onclick="openPdfModal('<?php echo e($data->surat); ?>')" class="file-preview-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                Lihat Surat Pemohonan Rasmi
                            </button>
                            <button type="button" onclick="replaceFile('surat')" class="file-replace-btn" title="Ganti fail">✕</button>
                        </div>
                        <?php endif; ?>

                        <div id="upload_surat" class="<?php echo e($data->surat ? 'hidden' : ''); ?>">
                            <input type="file" name="surat" class="styled-file-input" accept=".pdf,.jpg,.png">
                        </div>
                    </div>

                    
                    <div class="upload-card">
                        <div class="upload-card-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                            Salinan Kad Pengenalan
                        </div>

                        <?php if($data->ic): ?>
                        <div id="preview_ic" class="file-preview-row">
                            <button type="button" onclick="openPdfModal('<?php echo e($data->ic); ?>')" class="file-preview-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                Lihat Kad Pengenalan
                            </button>
                            <button type="button" onclick="replaceFile('ic')" class="file-replace-btn" title="Ganti fail">✕</button>
                        </div>
                        <?php endif; ?>

                        <div id="upload_ic" class="<?php echo e($data->ic ? 'hidden' : ''); ?>">
                            <input type="file" name="ic" class="styled-file-input" accept=".pdf,.jpg,.png">
                        </div>
                    </div>

                    
                    <div class="upload-card">
                        <div class="upload-card-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                            Sijil SSM
                        </div>

                        <?php if($data->ssm): ?>
                        <div id="preview_ssm" class="file-preview-row">
                            <button type="button" onclick="openPdfModal('<?php echo e($data->ssm); ?>')" class="file-preview-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                Lihat Sijil SSM
                            </button>
                            <button type="button" onclick="replaceFile('ssm')" class="file-replace-btn" title="Ganti fail">✕</button>
                        </div>
                        <?php endif; ?>

                        <div id="upload_ssm" class="<?php echo e($data->ssm ? 'hidden' : ''); ?>">
                            <input type="file" name="ssm" class="styled-file-input" accept=".pdf,.jpg,.png">
                        </div>
                    </div>

                    
                    <div class="upload-card">
                        <div class="upload-card-label">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                            Sijil ROS
                        </div>

                        <?php if($data->ros): ?>
                        <div id="preview_ros" class="file-preview-row">
                            <button type="button" onclick="openPdfModal('<?php echo e($data->ros); ?>')" class="file-preview-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                Lihat Sijil ROS
                            </button>
                            <button type="button" onclick="replaceFile('ros')" class="file-replace-btn" title="Ganti fail">✕</button>
                        </div>
                        <?php endif; ?>

                        <div id="upload_ros" class="<?php echo e($data->ros ? 'hidden' : ''); ?>">
                            <input type="file" name="ros" class="styled-file-input" accept=".pdf,.jpg,.png">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="form-footer">
                <a href="<?php echo e(route('permohonan.index')); ?>" class="btn-batal">
                    ← Batal
                </a>
                <button type="submit" class="btn-submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v14a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                    Simpan Kemaskini
                </button>
            </div>

        </div>
    </form>

</div>

<!-- PDF Preview Modal -->
<div id="pdfModal" class="modal-overlay">
    <div class="pdf-modal-box">
        <div class="pdf-modal-head">
            <span>Pratonton Lampiran</span>
            <button onclick="closePdfModal()" class="pdf-modal-close">Tutup</button>
        </div>
        <iframe id="pdfFrame" style="width:100%; flex:1; border:none;"></iframe>
    </div>
</div>

<script>
function openPdfModal(path) {
    if (!path) { alert("Fail tidak dijumpai"); return; }
    document.getElementById('pdfFrame').src = "/preview/" + path;
    document.getElementById('pdfModal').classList.add('active');
}

function closePdfModal() {
    document.getElementById('pdfModal').classList.remove('active');
    document.getElementById('pdfFrame').src = "";
}

function replaceFile(type) {
    document.getElementById('preview_' + type).classList.add('hidden');
    document.getElementById('upload_' + type).classList.remove('hidden');
}

document.getElementById('pdfModal').addEventListener('click', function(e) {
    if (e.target === this) closePdfModal();
});
</script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\MohonData-LZNK\resources\views/permohonan/edit.blade.php ENDPATH**/ ?>