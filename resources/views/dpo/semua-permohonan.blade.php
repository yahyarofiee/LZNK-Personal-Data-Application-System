<x-layouts.app-dpo title="Semua Permohonan">

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
        font-size: 12px; color: #8a9490;
        background: #f5f6f4; border: 1px solid #d4d9d5;
        border-radius: 2px; padding: 3px 10px;
    }

    /* ── Table ── */
    .dpo-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
    .dpo-table thead tr { background: #f5f6f4; border-bottom: 1.5px solid #d4d9d5; }
    .dpo-table thead th {
        padding: 11px 1.25rem;
        text-align: left;
        font-size: 11px; font-weight: 600; color: #8a9490;
        text-transform: uppercase; letter-spacing: 0.06em; white-space: nowrap;
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
    .act-detail { background: #e8f4ec; color: #1a5c2a; border-color: #b8ddc4; }
    .act-detail:hover { background: #1a5c2a; color: #fff; border-color: #1a5c2a; }
    .act-lulus  { background: #dcfce7; color: #14532d; border-color: #bbf7d0; }
    .act-lulus:hover  { background: #16a34a; color: #fff; border-color: #16a34a; }
    .act-tolak  { background: #fee2e2; color: #7f1d1d; border-color: #fecaca; }
    .act-tolak:hover  { background: #dc2626; color: #fff; border-color: #dc2626; }
    .selesai-label { font-size: 12px; color: #aab5ac; font-style: italic; }

    /* Empty state */
    .empty-state { padding: 4rem 2rem; text-align: center; }
    .empty-icon { width: 52px; height: 52px; background: #e8f4ec; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: #1a5c2a; }
    .empty-icon svg { width: 22px; height: 22px; }
    .empty-state p { font-size: 14px; color: #5a6860; font-weight: 500; }

    /* ══════════════ MODAL DETAIL ══════════════ */
    .modal-overlay {
        display: none; position: fixed; inset: 0;
        background: rgba(0,0,0,0.45); z-index: 50;
        align-items: center; justify-content: center; padding: 1rem;
    }
    .modal-overlay.active { display: flex; }

    .modal-box {
        background: #fff; border-radius: 4px;
        width: 100%; max-width: 860px;
        border: 1px solid #d4d9d5; overflow: hidden;
        box-shadow: 0 8px 40px rgba(0,0,0,0.18);
        animation: modalIn 0.18s ease;
        max-height: 90vh; display: flex; flex-direction: column;
    }
    @keyframes modalIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .modal-head {
        padding: 1.1rem 1.75rem; border-bottom: 1px solid #d4d9d5;
        background: #f5f6f4; display: flex; align-items: center;
        justify-content: space-between; flex-shrink: 0;
    }
    .modal-head-left { display: flex; align-items: center; gap: 12px; }
    .modal-head-icon {
        width: 34px; height: 34px; background: #1a5c2a; border-radius: 3px;
        display: flex; align-items: center; justify-content: center;
        color: #fff; flex-shrink: 0;
    }
    .modal-head-icon svg { width: 16px; height: 16px; }
    .modal-head-title { font-family: 'DM Serif Display', serif; font-size: 1.1rem; color: #1a1f1b; margin: 0 0 2px; }
    .modal-head-sub   { font-size: 12px; color: #8a9490; margin: 0; }

    .modal-body { padding: 1.5rem 1.75rem; overflow-y: auto; flex: 1; }

    .modal-section-label {
        font-size: 11px; font-weight: 600; color: #8a9490;
        text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 10px;
        display: flex; align-items: center; gap: 8px;
    }
    .modal-section-label::after { content: ''; flex: 1; height: 1px; background: #eef0ec; }

    .modal-info-grid {
        display: grid; grid-template-columns: 1fr 1fr;
        gap: 1rem 2rem; margin-bottom: 1.5rem;
    }
    .modal-info-item label {
        display: block; font-size: 11px; font-weight: 500; color: #8a9490;
        text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 4px;
    }
    .modal-info-item p { font-size: 13.5px; color: #1a1f1b; font-weight: 400; line-height: 1.5; }
    .modal-info-item.full { grid-column: 1 / -1; }

    .lampiran-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }
    .lampiran-card {
        display: flex; align-items: center; gap: 12px;
        padding: 12px 14px; background: #f9faf9;
        border: 1.5px solid #d4d9d5; border-radius: 3px;
        cursor: pointer; transition: border-color 0.15s, background 0.15s;
        text-align: left; width: 100%; font-family: 'DM Sans', sans-serif;
    }
    .lampiran-card:hover { border-color: #1a5c2a; background: #f0f7f2; }
    .lampiran-icon { width: 34px; height: 34px; border-radius: 3px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .lampiran-icon svg { width: 16px; height: 16px; }
    .lampiran-icon.surat { background: #e8f4ec; color: #1a5c2a; }
    .lampiran-icon.ic    { background: #eff6ff; color: #1d4ed8; }
    .lampiran-icon.ssm   { background: #f5f3ff; color: #7c3aed; }
    .lampiran-icon.ros   { background: #fff7ed; color: #c2410c; }
    .lampiran-name { font-size: 13px; font-weight: 500; color: #1a1f1b; }
    .lampiran-sub  { font-size: 11.5px; color: #8a9490; margin-top: 1px; }

    .modal-foot {
        padding: 1rem 1.75rem; border-top: 1px solid #d4d9d5;
        background: #f5f6f4; display: flex;
        align-items: center; justify-content: space-between;
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

    /* ══════════════ MODAL TOLAK ══════════════ */
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
    .tolak-modal-head h3 { font-family: 'DM Serif Display', serif; font-size: 1.05rem; color: #7f1d1d; margin: 0; }
    .tolak-modal-body { padding: 1.35rem 1.5rem; }
    .tolak-field-label {
        font-size: 11.5px; font-weight: 600; color: #5a6860;
        text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 6px; display: block;
    }
    .tolak-textarea {
        display: block; width: 100%;
        font-family: 'DM Sans', sans-serif; font-size: 13.5px; color: #1a1f1b;
        background: #f9faf9; border: 1.5px solid #d4d9d5; border-radius: 3px;
        padding: 10px 13px; outline: none; resize: vertical;
        box-sizing: border-box; margin-bottom: 1.1rem; transition: border-color 0.15s;
    }
    .tolak-textarea:focus { border-color: #dc2626; background: #fff; box-shadow: 0 0 0 3px rgba(220,38,38,0.08); }
    .checkbox-group { display: flex; flex-direction: column; gap: 7px; margin-bottom: 1.25rem; }
    .checkbox-item {
        display: flex; align-items: center; gap: 9px;
        font-size: 13px; color: #1a1f1b; cursor: pointer;
    }
    .checkbox-item input[type="checkbox"] { width: 15px; height: 15px; accent-color: #dc2626; cursor: pointer; }
    .tolak-modal-foot {
        padding: 1rem 1.5rem; border-top: 1px solid #f0f2f0;
        display: flex; justify-content: flex-end; gap: 8px; background: #fafafa;
    }
    .btn-tolak-submit {
        display: inline-flex; align-items: center; gap: 6px;
        font-family: 'DM Sans', sans-serif; font-size: 13.5px; font-weight: 500;
        padding: 9px 22px; border-radius: 3px; border: none;
        background: #dc2626; color: #fff; cursor: pointer; transition: background 0.15s;
    }
    .btn-tolak-submit:hover { background: #b91c1c; }

    /* PDF Modal */
    .pdf-modal-box{
        width:98vw;
        height:98vh;
        max-width:none;
        max-height:none;
        margin:auto;
        background:#fff;
        border-radius:16px;
        overflow:hidden;
        display:flex;
        flex-direction:column;
        box-shadow:0 25px 70px rgba(0,0,0,.35);
    }
    .pdf-modal-head{
        display:flex;
        justify-content:space-between;
        align-items:center;
        height:64px;
        padding:0 24px;
        background:#ffffff;
        border-bottom:1px solid #e5e7eb;
        flex-shrink:0;
    }
    .pdf-modal-head span { font-size: 13.5px; font-weight: 600; color: #1a1f1b; }

    #agreementContent{
        flex:1;
        overflow:hidden;
        background:#e9e9e9;
        padding:0;
    }

    .agreement-paper{
    font-family:Calibri;
    background:white;
    width:210mm;
    min-height:297mm;
    margin:auto;
    padding:40px;
    box-shadow:0 0 15px rgba(0,0,0,.15);
    }

    .dokumen-card{
    border:1px solid #d4d9d5;
    border-radius:6px;
    padding:18px;
    background:#fafafa;
    }

    .dokumen-card h4{
        margin:0;
        font-size:16px;
        color:#1a5c2a;
    }

    .dokumen-card hr{
        margin:12px 0;
        border:none;
        border-top:1px solid #e5e7eb;
    }
</style>

<div class="page-wrap">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2>Semua Permohonan</h2>
            <p>Senarai penuh permohonan oleh pemohon</p>
        </div>
    </div>

    <!-- Table Panel -->
    <div class="panel">
        <div class="panel-head">
            <span class="panel-head-title">Senarai Permohonan</span>
            <span class="panel-count">{{ \App\Models\Permohonan::count() }} rekod</span>
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

            @forelse(\App\Models\Permohonan::latest()->get() as $item)
            <tr>
                <td>
                    <div class="td-nama">{{ $item->nama }}</div>
                    <div class="td-nama-sub">{{ $item->created_at->format('d/m/Y') }} · {{ $item->created_at->diffForHumans() }}</div>
                </td>
                <td>{{ $item->jenis }}</td>
                <td class="center">
                    @if($item->status == 'Dalam Proses')
                        <span class="badge badge-proses">Dalam Proses</span>
                    @elseif($item->status == 'Menunggu Kelulusan Timbalan')
                        <span class="badge badge-proses">
                            Menunggu Kelulusan Timbalan
                        </span>    
                    @elseif($item->status == 'Diluluskan')
                        <span class="badge badge-lulus">Diluluskan</span>
                    @elseif($item->status == 'Ditolak')
                        <span class="badge badge-tolak">Ditolak</span>
                    @else
                        <span class="badge badge-proses">{{ $item->status }}</span>
                    @endif
                </td>
                <td class="center">
                    <button onclick="openModal({{ $item->id }})" class="act-btn act-detail">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        Detail
                    </button>
                </td>
                <td class="center">
                    <div style="display:flex; justify-content:center; gap:6px; flex-wrap:wrap;">

            @if($item->status === 'Dalam Proses')

            <form action="{{ route('permohonan.hantar.timbalan', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PUT')

                <button type="submit" class="act-btn act-lulus">
                    Hantar ke Timbalan
                </button>
            </form>

            <button
                type="button"
                onclick="openTolakModal({{ $item->id }})"
                class="act-btn act-tolak">
                Tolak
            </button>

            @elseif($item->status === 'Menunggu Kelulusan Timbalan')

            <span class="selesai-label">
                Menunggu Tindakan Timbalan
            </span>

            @elseif($item->status === 'Diluluskan')

            <button
                type="button"
                class="act-btn act-detail"
                onclick="openDokumenModal({{ $item->id }})">
                📂 Urus Dokumen
            </button>

            @elseif($item->status === 'Ditolak')

            <span class="selesai-label">
                Ditolak
            </span>

            @endif
                    </div>
                </td>
            </tr>
            @empty
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
            @endforelse

            </tbody>
        </table>
    </div>

</div>

<!-- ══════════ MODAL DETAIL ══════════ -->
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
            <div class="modal-foot-actions" id="actionButtons"></div>
        </div>

    </div>
</div>

<!-- ══════════ MODAL TOLAK ══════════ -->
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
                @csrf
                @method('PUT')

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

                <div class="tolak-modal-foot" style="padding:0; background:none; margin-top:0;">
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

<!-- ══════════ PDF MODAL ══════════ -->
<div id="pdfModal" class="modal-overlay">
    <div class="pdf-modal-box">
        <div class="pdf-modal-head">
            <span>Pratonton Lampiran</span>
            <button onclick="closePdfModal()" class="btn-close-modal">Tutup</button>
        </div>
        <iframe id="pdfViewer" style="width:100%; flex:1; border:none;"></iframe>
    </div>
</div>

<!-- Agreement Preview -->
<div id="agreementModal" class="modal-overlay">

    <div class="pdf-modal-box">

        <div class="pdf-modal-head">

            <span>
                📄 Preview Agreement
            </span>

            <div style="display:flex;gap:10px;">

                <button
                    onclick="closeAgreement()"
                    class="btn-close-modal">

                    Tutup

                </button>
            </div>
        </div>

        <div id="agreementContent"
            style="
                flex:1;
                overflow:hidden;
                background:#d9d9d9;
                padding:0;
            ">
        </div>
    </div>
</div>

<div id="uploadAgreementModal" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-head">
            <div>
                <h3>Muat Naik Agreement Lengkap</h3>
            </div>
        </div>
        <div class="modal-body">

            <form id="uploadAgreementForm"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <input
                    type="file"
                    name="agreement_signed"
                    accept=".pdf"
                    required>
            </form>
        </div>

        <div class="modal-foot">
            <button
                id="btnUploadAgreement"
                type="submit"
                form="uploadAgreementForm"
                class="act-btn act-lulus">

                📤 Upload Agreement

            </button>

            <button
                type="button"
                class="btn-close-modal"
                onclick="closeUploadAgreement()">

                Tutup

            </button>
        </div>
    </div>
</div>

<!-- ══════════ UPLOAD DATA MODAL ══════════ -->
<div id="uploadDataModal" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-head">
            <div>
                <h3>Upload Data Pemohon</h3>
                <small>
                    Muat naik satu atau lebih fail data.
                </small>
            </div>
        </div>

        <div class="modal-body">

            <form
                id="uploadDataForm"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <h4 style="margin-top:15px;">
                    Fail Sedia Ada
                </h4>

                <div
                    id="existingFiles"
                    style="margin-top:10px;">
                </div>

                <hr style="margin:25px 0;">

                <h4>
                    Tambah Fail Baru
                </h4>
                <br>
                <div
                    id="selectedCount"
                    style="margin-bottom:12px;color:#777;">

                    Tiada fail dipilih

                </div>

                <div id="selectedFiles"></div>

                <p style="margin-top:10px;font-size:13px;color:#777;">
                    Format dibenarkan :
                    CSV, XLSX, XLS dan ZIP
                </p>

                <hr style="margin:25px 0;">

                <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:15px;">

                    <div>

                        <label
                            for="dataFileInput"
                            class="act-btn act-detail"
                            style="cursor:pointer;">

                            📁 Choose Files

                        </label>

                        <input
                            type="file"
                            id="dataFileInput"
                            name="data_file[]"
                            multiple
                            accept=".csv,.xlsx,.xls,.zip"
                            style="display:none;">
                    </div>

                    <div style="display:flex;gap:10px;">

                        <button
                            type="button"
                            class="btn-close-modal"
                            onclick="closeUploadData()">

                            Tutup

                        </button>

                        <button
                            type="submit"
                            class="act-btn act-lulus">

                            📤 Upload Data

                        </button>
                    </div>
                </div>
            </form>
        </div>

{{-- OLD FOOTER 
        <div class="modal-footer">

            <input
                type="file"
                id="modalDataFiles"
                multiple
                style="display:none;">

            <div
                id="newSelectedFiles"
                style="margin-top:15px;">
            </div>

            <button
                type="button"
                class="act-btn act-update"
                onclick="document.getElementById('modalDataFiles').click();">

                📁 Choose Files

            </button>

            <button
                type="button"
                class="act-btn"
                onclick="closeDataModal()">

                Tutup

            </button>

            <button
                type="button"
                id="btnUploadModal"
                class="act-btn act-cetak">

                📤 Upload Data

            </button>

        </div>
        --}}

    </div>
</div>

<!-- ══════════ DATA FILES MODAL ══════════ -->
<div id="dataFilesModal" class="modal-overlay">
    <div class="modal-box">
        <div class="modal-head">
            <div>
                <h3>Senarai Fail Data</h3>

                <small>
                    Fail data yang telah dimuat naik.
                </small>
            </div>
        </div>

        <div
            class="modal-body"
            id="dataFilesBody">

            Loading...

        </div>

        <div class="modal-foot">

            <button
                type="button"
                class="btn-close-modal"
                onclick="closeDataFiles()">

                Tutup

            </button>
        </div>
    </div>
</div>

<!-- ══════════ MODAL URUS DOKUMEN ══════════ -->

<div id="dokumenModal" class="modal-overlay">

    <div class="modal-box">
        <div class="modal-head">
            <div>
                <h3>Urus Dokumen</h3>

                <small>
                    Agreement, Pengesahan Bayaran Duti Hasil dan Fail Data
                </small>
            </div>
        </div>

        <div
            class="modal-body"
            id="dokumenBody">

            Loading...

        </div>

        <div class="modal-foot">

            <button
                class="btn-close-modal"
                onclick="closeDokumenModal()">

                Tutup

            </button>
        </div>
    </div>
</div>

<script>

function openModal(id) {
    fetch(`/api/permohonan/${id}`)
    .then(res => res.json())
    .then(data => {

        // Status badge
        const statusEl = document.getElementById('modalStatus');
        statusEl.className = 'badge';

        if (data.status === 'Dalam Proses')
            statusEl.classList.add('badge-proses');

        else if (data.status === 'Menunggu Kelulusan Timbalan')
            statusEl.classList.add('badge-proses');

        else if (data.status === 'Diluluskan')
            statusEl.classList.add('badge-lulus');

        else if (data.status === 'Ditolak')
            statusEl.classList.add('badge-tolak');

        statusEl.innerText = data.status;

        // Lampiran
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

        const available = lampiranItems.filter(l => data[l.key]);
        const lampiranHTML = available.length > 0
            ? `<div class="lampiran-grid">${available.map(l => `
                <button class="lampiran-card" onclick="openPdfModal('${data[l.key]}')">
                    <div class="lampiran-icon ${l.cls}">${l.icon}</div>
                    <div><div class="lampiran-name">${l.label}</div><div class="lampiran-sub">${l.sub}</div></div>
                </button>`).join('')}</div>`
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

        const tarikh = new Date(data.created_at);

        document.getElementById('modalDate').innerHTML =
            `Tarikh Permohonan: ${tarikh.toLocaleDateString('ms-MY')} | ${tarikh.toLocaleTimeString('ms-MY', {
                hour: '2-digit',
                minute: '2-digit'
            })}`;

        const actionContainer = document.getElementById('actionButtons');
        if (data.status === 'Dalam Proses') {
            actionContainer.innerHTML = `
                <form action="/permohonan/${data.id}/hantar-timbalan" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="act-btn act-lulus" style="padding:8px 18px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:13px;height:13px;"><polyline points="20 6 9 17 4 12"/></svg>
                        Hantar ke Timbalan
                    </button>
                </form>
                <button type="button" onclick="openTolakModal(${data.id})" class="act-btn act-tolak" style="padding:8px 18px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="width:13px;height:13px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    Tolak
                </button>
                <button onclick="closeModal()" class="btn-close-modal">Tutup</button>
            `;
        } else {
            actionContainer.innerHTML = `<button onclick="closeModal()" class="btn-close-modal">Tutup</button>`;
        }

        document.getElementById('modalDetail').classList.add('active');
    });
}

function closeModal() {
    document.getElementById('modalDetail').classList.remove('active');
}

function openPdfModal(path) {
    document.getElementById('pdfViewer').src = '/preview/' + path;
    document.getElementById('pdfModal').classList.add('active');
}

function closePdfModal() {
    document.getElementById('pdfViewer').src = '';
    document.getElementById('pdfModal').classList.remove('active');
}

function openPreviewUrl(url)
{
    document.getElementById('pdfViewer').src = url;

    document.getElementById('pdfModal').classList.add('active');
}

function openTolakModal(id) {
    const form = document.getElementById('formTolakPopup');
    form.reset();
    form.action = `/permohonan/${id}/tolak`;
    document.getElementById('tolakModal').classList.add('active');
}

function closeTolakModal() {
    document.getElementById('tolakModal').classList.remove('active');
}

['modalDetail','tolakModal','pdfModal','agreementModal','dokumenModal'].forEach(id => {
    document.getElementById(id).addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.remove('active');
            if (id === 'pdfModal') document.getElementById('pdfViewer').src = '';
        }
    });
});

function openAgreement(url)
{
    const viewer = "/pdfjs/web/viewer.html?file=" + encodeURIComponent(url);

    document.getElementById("agreementContent").innerHTML = `
        <iframe
            src="${viewer}"
            style="width:100%;height:100%;border:0;display:block;">
        </iframe>
    `;

    document
        .getElementById("agreementModal")
        .classList.add("active");
}

function closeAgreement(){
    document
        .getElementById("agreementModal")
        .classList.remove("active");
}

let dataTransfer = new DataTransfer();

function openUploadAgreement(id)
{
    const modal = document.getElementById('uploadAgreementModal');

    modal.classList.add('active');
    document.getElementById('uploadAgreementForm').action =
        "/dpo/agreement/upload/" + id;
}

function closeUploadAgreement() {
    document.getElementById('uploadAgreementModal').classList.remove('active');
}

document.getElementById('uploadAgreementForm')
    .addEventListener('submit', function () {

        const btn = document.getElementById('btnUploadAgreement');

        btn.disabled = true;
        btn.innerHTML = '⏳ Uploading...';

    });

document
    .getElementById("uploadAgreementModal")
    .addEventListener("click", function(e){

        if(e.target === this){
            closeUploadAgreement();
        }
    });

function openUploadData(id)
{
    currentPermohonanId = id;

    loadExistingFiles(id);

    // Reset semua fail baru yang dipilih
    dataTransfer = new DataTransfer();

    const input = document.getElementById('dataFileInput');
    input.value = '';
    input.files = dataTransfer.files;

    renderSelectedFiles();

    document.getElementById('uploadDataForm').action =
        '/dpo/data/upload/' + id;

    document.getElementById('uploadDataModal')
        .classList.add('active');
}

function closeUploadData()
{
    document
        .getElementById('uploadDataModal')
        .classList.remove('active');
}

function loadExistingFiles(id)
{
    fetch('/api/data-files/' + id)
        .then(res => res.json())
        .then(files => {

            let html = '';

            if(files.length === 0)
            {
                html = `
                    <p style="color:#888;">
                        Tiada fail dimuat naik.
                    </p>
                `;
            }
            else
            {
                files.forEach((file, index) => {

                    html += `
                        <div style="
                            display:flex;
                            justify-content:space-between;
                            align-items:center;
                            border:1px solid #ddd;
                            border-radius:6px;
                            padding:10px;
                            margin-bottom:8px;
                        ">

                        <span>
                            <div style="font-weight:600;"> 📄 ${file.name} </div>
                            <div style="
                                font-size:12px;
                                color:#6b7280;
                                margin-top:4px;
                            ">
                                📊 ${Number(file.rows ?? 0).toLocaleString()} rekod
                            </div>

                            <div style="
                                font-size:12px;
                                color:#6b7280;
                                margin-top:2px;
                            ">
                                💾 ${formatFileSize(file.size ?? 0)}
                            </div>
                        </span>

                            <div>
                                <a href="${file.url}"
                                target="_blank"
                                class="act-btn act-cetak"
                                style="margin-right:8px;">

                                    Lihat

                                </a>

                                <button
                                    type="button"
                                    class="act-btn act-delete"
                                    onclick="deleteExistingFile(${id}, ${index})">

                                    Padam

                                </button>
                            </div>
                        </div>
                    `;
                });
            }

            document.getElementById('existingFiles').innerHTML = html;

        });
}

function deleteExistingFile(id, index)
{
    Swal.fire({
        title: 'Padam fail?',
        text: 'Fail ini akan dipadam secara kekal.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Padam',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc2626'
    }).then((result) => {

        if (!result.isConfirmed) return;

        fetch(`/dpo/data/${id}/${index}`, {

            method: 'DELETE',

            headers: {
                'X-CSRF-TOKEN':
                    document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }

        })

        .then(() => {

            Swal.fire({
                icon: 'success',
                title: 'Berjaya',
                text: 'Fail berjaya dipadam.',
                timer: 1200,
                showConfirmButton: false
            });

            loadExistingFiles(id);

        })
        .catch(() => {

            Swal.fire({
                icon: 'error',
                title: 'Ralat',
                text: 'Gagal memadam fail.'
            });
        });
    });
}

function openDataFiles(id)
{
    document
        .getElementById('dataFilesModal')
        .classList.add('active');

    document.getElementById('dataFilesBody').innerHTML =
        "Loading...";

    fetch("/api/data-files/" + id)
        .then(res => res.json())
        .then(files => {

            let html = "";

            if(files.length === 0)
            {
                html = `
                    <p>
                        Tiada fail data.
                    </p>
                `;
            }
            else
            {
                files.forEach((file, index) => {

                    html += `
                        <div style="
                            border:1px solid #ddd;
                            border-radius:8px;
                            padding:12px;
                            margin-bottom:12px;
                        ">

                            <div style="
                                display:flex;
                                justify-content:space-between;
                                align-items:center;
                            ">

                                <span>
                                    📄 ${file.name}
                                </span>

                                <span style="color:#16a34a;">
                                    ✓ Uploaded
                                </span>

                            </div>

                            <div style="
                                margin-top:12px;
                                display:flex;
                                gap:10px;
                            ">

                                <a
                                    href="/data/download/${id}/${index}"
                                    class="act-btn act-detail">

                                    👁 Lihat

                                </a>

                                <button
                                    type="button"
                                    class="act-btn act-tolak"
                                    onclick="confirmDeleteData(${id}, ${index}, '${file.name}')">

                                    🗑 Padam

                                </button>

                            </div>

                        </div>
                    `;
                });
            }

            document
                .getElementById('dataFilesBody')
                .innerHTML = html;
        });
}

function closeDataFiles()
{
    document
        .getElementById('dataFilesModal')
        .classList.remove('active');
}

function confirmDeleteAgreement(id)
{
    Swal.fire({

        title: 'Padam Agreement?',
        text: 'Agreement yang telah dimuat naik akan dipadam.',

        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: 'Ya, Padam',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc2626'

    }).then((result) => {

        if(result.isConfirmed)
        {
           const form = document.createElement('form');

            form.method = 'POST';
            form.action = '/dpo/agreement/' + id;
            form.innerHTML = `
                @csrf
                @method('DELETE')
            `;

            document.body.appendChild(form);

            form.submit();
        }

    });
}

function confirmDeleteData(id, index, fileName)
{
    Swal.fire({

        title: 'Padam Fail Data?',
        text: 'Fail "' + fileName + '" akan dipadam.',

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#dc2626',

        cancelButtonColor: '#6b7280',

        confirmButtonText: 'Ya, Padam',

        cancelButtonText: 'Batal'

    }).then((result) => {

        if(result.isConfirmed)
        {
            const form = document.createElement('form');

            form.method = 'POST';

            form.action = '/dpo/data/' + id + '/' + index;

            form.innerHTML = `
                @csrf
                @method('DELETE')
            `;

            document.body.appendChild(form);

            form.submit();
        }

    });
}

async function countCsvRows(file)
{
    return new Promise((resolve) => {

        // Kalau bukan CSV, tak perlu kira
        if (!file.name.toLowerCase().endsWith('.csv')) {
            resolve(null);
            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {

            const text = e.target.result;

            let rows = text.split(/\r?\n/);

            // buang baris kosong
            rows = rows.filter(row => row.trim() !== '');

            // tolak header
            const count = Math.max(rows.length - 1, 0);

            resolve(count);
        };

        reader.readAsText(file);
    });
}

function formatFileSize(bytes)
{
    if (bytes < 1024) {
        return bytes + ' B';
    }

    if (bytes < 1024 * 1024) {
        return (bytes / 1024).toFixed(2) + ' KB';
    }

    if (bytes < 1024 * 1024 * 1024) {
        return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }

    return (bytes / (1024 * 1024 * 1024)).toFixed(2) + ' GB';
}

async function renderSelectedFiles()
{
    let html = '';

    for (const [index, file] of Array.from(dataTransfer.files).entries()) {

        const rows = await countCsvRows(file);

        html += `
            <div style="
                display:flex;
                justify-content:space-between;
                align-items:flex-start;
                border:1px solid #e5e7eb;
                border-radius:6px;
                padding:10px 12px;
                margin-top:8px;
            ">

                <div>
                    <div>📄 <strong>${file.name}</strong></div>

                    ${
                        rows !== null
                        ? `
                            <div style="
                                margin-top:4px;
                                font-size:12px;
                                color:#6b7280;
                            ">
                                📊 ${rows.toLocaleString()} rekod
                            </div>

                            <div style="
                                margin-top:2px;
                                font-size:12px;
                                color:#6b7280;
                            ">
                                💾 ${formatFileSize(file.size)}
                            </div>
                        `
                        : `
                            <div style="
                                margin-top:4px;
                                font-size:12px;
                                color:#6b7280;
                            ">
                                💾 ${formatFileSize(file.size)}
                            </div>
                        `
                    }

                </div>

                <button
                    type="button"
                    class="btn btn-sm btn-danger"
                    onclick="removeSelectedFile(${index})">

                    Padam

                </button>
            </div>
        `;
    }

    document.getElementById('selectedFiles').innerHTML = html;

    const count = dataTransfer.files.length;

    document.getElementById('selectedCount').innerHTML =
        count === 0
            ? '<span style="color:#6b7280;">Tiada fail dipilih</span>'
            : `
                <span style="
                    display:inline-block;
                    background:#ecfdf5;
                    color:#166534;
                    border:1px solid #bbf7d0;
                    border-radius:999px;
                    padding:4px 12px;
                    font-size:13px;
                    font-weight:600;
                ">
                    📁 ${count} fail dipilih
                </span>
            `;
}

function removeSelectedFile(index)
{
    const newDataTransfer = new DataTransfer();

    Array.from(dataTransfer.files).forEach((file, i) => {

        if (i !== index) {
            newDataTransfer.items.add(file);
        }

    });

    dataTransfer = newDataTransfer;

    const input = document.getElementById('dataFileInput');

    input.files = dataTransfer.files;

    renderSelectedFiles();
}

document
    .getElementById('dataFileInput')
    .addEventListener('change', function () {

        Array.from(this.files).forEach(file => {

            // Elak fail yang sama dimasukkan dua kali
            let exists = false;

            Array.from(dataTransfer.files).forEach(existingFile => {

                if (
                    existingFile.name === file.name &&
                    existingFile.size === file.size
                ) {
                    exists = true;
                }

            });

            if (!exists) {
                dataTransfer.items.add(file);
            }

        });

        this.files = dataTransfer.files;

        renderSelectedFiles();

    });

    function openDokumenModal(id)
    {
        document
            .getElementById('dokumenModal')
            .classList.add('active');

        document.getElementById('dokumenBody').innerHTML =
            "Loading...";

        fetch('/api/dokumen/' + id)
            .then(res => res.json())
            .then(data => {

        let html = `

        <div class="dokumen-card">

            <h4>📄 Agreement</h4>

            <hr>

        ${
        data.agreement.status
        ?
        `

        <div style="color:#16a34a;font-weight:600;">
            ✔ Agreement tersedia
        </div>

        <br>

        <div style="display:flex;gap:10px;flex-wrap:wrap;">

            <button
                class="act-btn act-detail"
                onclick="openAgreement('${data.agreement.url}')">

                👁 Lihat Agreement

            </button>

            <button
                class="act-btn act-tolak"
                onclick="confirmDeleteAgreement(${id})">

                🗑 Padam Agreement

            </button>

        </div>

        `
        :
        `

        <div style="color:#dc2626;font-weight:600;">
            ✖ Agreement belum dijana
        </div>

        <br>

        <a
            href="/dpo/agreement/${id}"
            class="act-btn act-lulus">

            📄 Generate Agreement

        </a>

        `
        }

        </div>
        <br>

        <div class="dokumen-card">

            <h4>💰 Pengesahan Bayaran Duti Hasil</h4>

            <hr>

            ${
                data.stamp_duty.status
                ? `
                    <div style="color:#16a34a;font-weight:600;">
                        ✔ Pengesahan telah dimuat naik
                    </div>

                    <br>

                    <strong>Nama Fail</strong>

                    <br>

                    ${data.stamp_duty.name}

                    ${
                        data.stamp_duty.url
                        ? `
                            <br><br>

                            <button
                                class="act-btn act-detail"
                                onclick="openPreviewUrl('${data.stamp_duty.url}')">

                                👁 Lihat Pengesahan

                            </button>
                        `
                        : ''
                    }

                `
                : `
                    <div style="color:#dc2626;font-weight:600;">
                        ✖ Pengesahan belum dimuat naik
                    </div>
                `
            }

        </div>
        <br>
        <div class="dokumen-card">

            <h4>📁 Fail Data</h4>

            <hr>

            ${
            data.data.status
            ?
            `

            <div style="color:#16a34a;font-weight:600;">
                ✔ ${data.data.files.length} fail telah dimuat naik
            </div>

            <br>

            <button
                class="act-btn act-detail"
                onclick="closeDokumenModal();openUploadData(${id})">

                📂 Urus Fail Data

            </button>

            `
            :
            `

            <div style="color:#dc2626;font-weight:600;">
                ✖ Fail data belum dimuat naik
            </div>

            <br>

            <button
                class="act-btn act-lulus"
                onclick="closeDokumenModal();openUploadData(${id})">

                📤 Upload Fail Data

            </button>

            `
            }

        </div>

        `;

        document.getElementById('dokumenBody').innerHTML = html;

            });
    }

    function closeDokumenModal()
    {
        document
            .getElementById('dokumenModal')
            .classList.remove('active');
    }

</script>
<script src="https://unpkg.com/mammoth/mammoth.browser.min.js"></script>
</x-layouts.app-dpo>