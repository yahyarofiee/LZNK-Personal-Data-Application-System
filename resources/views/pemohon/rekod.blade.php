<x-layouts.app title="Rekod Permohonan">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap');

    .rekod-wrap {
        font-family: 'DM Sans', sans-serif;
        background: #eef0ec;
        min-height: 100vh;
        padding: 2.25rem 2rem 4rem;
    }

    /* ── Page header ── */
    .rekod-page-header {
        margin-bottom: 1.75rem;
        border-bottom: 1px solid #d4d9d5;
        padding-bottom: 1.25rem;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .rekod-page-header h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.75rem;
        color: #1a1f1b;
        margin: 0 0 4px;
        letter-spacing: -0.01em;
    }
    .rekod-page-header p {
        font-size: 13px;
        color: #5a6860;
        margin: 0;
    }
    .btn-new {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #1a5c2a;
        color: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: 13.5px;
        font-weight: 500;
        padding: 9px 20px;
        border-radius: 3px;
        text-decoration: none;
        transition: background 0.15s;
        white-space: nowrap;
    }
    .btn-new:hover { background: #2d7a40; }
    .btn-new svg { width: 14px; height: 14px; }

    /* ── Panel ── */
    .rekod-panel {
        background: #fff;
        border: 1px solid #d4d9d5;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(26,92,42,0.07);
    }

    /* ── Table ── */
    .rekod-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13.5px;
    }
    .rekod-table thead tr {
        background: #f5f6f4;
        border-bottom: 1.5px solid #d4d9d5;
    }
    .rekod-table thead th {
        padding: 11px 1.25rem;
        text-align: left;
        font-size: 11px;
        font-weight: 600;
        color: #8a9490;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        white-space: nowrap;
    }
    .rekod-table tbody tr {
        border-bottom: 1px solid #f0f2f0;
        transition: background 0.1s;
    }
    .rekod-table tbody tr:last-child { border-bottom: none; }
    .rekod-table tbody tr:hover { background: #f9faf9; }
    .rekod-table tbody td {
        padding: 14px 1.25rem;
        vertical-align: middle;
        color: #1a1f1b;
    }

    /* Date cell */
    .td-date-main { font-size: 13.5px; font-weight: 500; color: #1a1f1b; }
    .td-date-rel  { font-size: 11.5px; color: #8a9490; margin-top: 2px; }

    /* Jenis cell */
    .td-jenis {
        font-size: 13.5px;
        color: #1a1f1b;
    }
    .td-jenis-chip {
        display: inline-block;
        background: #f0f2f0;
        color: #3d4a40;
        font-size: 11.5px;
        font-weight: 500;
        padding: 3px 9px;
        border-radius: 2px;
        margin-top: 3px;
        letter-spacing: 0.02em;
    }

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
        white-space: nowrap;
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

    /* Lihat Sebab link */
    .lihat-sebab-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 6px;
        font-size: 11.5px;
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
    .lihat-sebab-btn:hover { opacity: 0.65; }
    .lihat-sebab-btn svg { width: 12px; height: 12px; }

    /* Action buttons */
    .action-group {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }
    .act-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 500;
        padding: 6px 13px;
        border-radius: 2px;
        border: 1.5px solid transparent;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.15s, border-color 0.15s, color 0.15s;
        white-space: nowrap;
    }
    .act-btn svg { width: 13px; height: 13px; flex-shrink: 0; }

    .act-update {
        background: #e8f4ec;
        color: #1a5c2a;
        border-color: #b8ddc4;
    }
    .act-update:hover {
        background: #1a5c2a;
        color: #fff;
        border-color: #1a5c2a;
    }
    .act-cetak {
        background: #f5f6f4;
        color: #3d4a40;
        border-color: #d4d9d5;
    }
    .act-cetak:hover {
        background: #1a1f1b;
        color: #fff;
        border-color: #1a1f1b;
    }
    .act-padam {
        background: #fff5f5;
        color: #991b1b;
        border-color: #fecaca;
    }
    .act-padam:hover {
        background: #dc2626;
        color: #fff;
        border-color: #dc2626;
    }

    /* Empty state */
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
    }
    .empty-icon {
        width: 56px; height: 56px;
        background: #e8f4ec;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem;
        color: #1a5c2a;
    }
    .empty-icon svg { width: 24px; height: 24px; }
    .empty-state p { font-size: 14.5px; font-weight: 500; color: #3d4a40; margin: 0 0 4px; }
    .empty-state span { font-size: 13px; color: #8a9490; }

    /* ── MODAL ── */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 50;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
    .modal-overlay.active { display: flex; }

    .modal-box {
        background:#fff;
        border-radius:4px;
        width:100%;
        max-width:480px;
        max-height:90vh;
        border:1px solid #d4d9d5;
        overflow:hidden;
        display:flex;
        flex-direction:column;
        box-shadow:0 8px 40px rgba(0,0,0,.18);
        animation:modalIn .18s ease;
    }
    @keyframes modalIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .modal-head {
        background: #fee2e2;
        border-bottom: 1px solid #fecaca;
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .modal-head-icon {
        width: 32px; height: 32px;
        background: #dc2626;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        flex-shrink: 0;
    }
    .modal-head-icon svg { width: 16px; height: 16px; }
    .modal-head h3 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.1rem;
        color: #7f1d1d;
        margin: 0;
    }
    .modal-body{
        padding:1.35rem 1.5rem;
        overflow-y:auto;
        flex:1;
    }
    .modal-section-label {
        font-size: 11px;
        font-weight: 600;
        color: #8a9490;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 6px;
    }
    .modal-sebab-box {
        background: #fff5f5;
        border: 1px solid #fecaca;
        border-radius: 3px;
        padding: 10px 13px;
        font-size: 13.5px;
        color: #1a1f1b;
        line-height: 1.6;
        margin-bottom: 1.1rem;
    }
    .modal-dokumen-list {
        list-style: none;
        padding: 0; margin: 0;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    .modal-dokumen-list li {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #3d4a40;
        background: #f5f6f4;
        border: 1px solid #e4e7e4;
        border-radius: 2px;
        padding: 7px 11px;
    }
    .modal-dokumen-list li::before {
        content: '';
        width: 5px; height: 5px;
        border-radius: 50%;
        background: #dc2626;
        flex-shrink: 0;
    }

    .modal-foot {
        padding: 1rem 1.5rem;
        border-top: 1px solid #f0f2f0;
        display: flex;
        justify-content: flex-end;
    }
    .modal-close-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13.5px;
        font-weight: 500;
        padding: 8px 20px;
        border-radius: 3px;
        border: 1.5px solid #d4d9d5;
        background: transparent;
        color: #5a6860;
        cursor: pointer;
        transition: border-color 0.15s, color 0.15s;
    }
    .modal-close-btn:hover { border-color: #999; color: #1a1f1b; }

        /* ===============================
    DOKUMEN & DATA CARD
    =================================*/

    .document-card{
        border:1px solid #e5e7eb;
        border-radius:8px;
        padding:20px;
        margin-bottom:18px;
        background:#fff;
    }

    .document-card:last-child{
        margin-bottom:0;
    }

    .document-card h4{
        margin:0 0 18px;
        font-size:17px;
        font-weight:600;
        color:#111827;
    }

    .document-row{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:12px;
    }

    .document-label{
        font-weight:600;
        color:#374151;
    }

    .document-value{
        color:#111827;
    }

    .status-success{
        color:#16a34a;
        font-weight:600;
    }

    .status-warning{
        color:#d97706;
        font-weight:600;
    }

    .status-danger{
        color:#dc2626;
        font-weight:600;
    }

    .btn-view{
        display:inline-block;
        padding:8px 16px;
        background:#16a34a;
        color:#fff;
        text-decoration:none;
        border-radius:6px;
        margin-top:10px;
    }

    .btn-upload{
        display:inline-block;
        padding:8px 16px;
        background:#2563eb;
        color:white;
        border:none;
        border-radius:6px;
        cursor:pointer;
    }

    .file-name{
        margin-top:8px;
        color:#374151;
    }

    .pdf-modal-box{
    width:98vw;
    height:98vh;
    max-width:none;
    max-height:none;
    display:flex;
    flex-direction:column;
    background:#fff;
    }

    .pdf-modal-head{
        display:flex;
        justify-content:space-between;
        align-items:center;
        height:64px;
        padding:0 24px;
        border-bottom:1px solid #e5e7eb;
    }

    #agreementContent{
        flex:1;
    }
</style>

<div class="rekod-wrap">

    <!-- Page Header -->
    <div class="rekod-page-header">
        <div>
            <h2>Rekod Permohonan</h2>
            <p>Senarai semua permohonan data yang telah dikemukakan</p>
        </div>
        <a href="{{ route('permohonan') }}" class="btn-new">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Mohon Data Baru
        </a>
    </div>

    <!-- Table Panel -->
    <div class="rekod-panel">

        @if($permohonan->count() > 0)

        <table class="rekod-table">
            <thead>
                <tr>
                    <th>Tarikh & Masa</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Detail</th>
                    <th>Dokumen</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permohonan as $p)
                <tr>

                    <!-- TARIKH -->
                    <td>
                        <div class="td-date-main">{{ $p->created_at->format('d/m/Y') }} &nbsp; {{ $p->created_at->format('h:i A') }}</div>
                        <div class="td-date-rel">{{ $p->created_at->diffForHumans() }}</div>
                    </td>

                    <!-- JENIS -->
                    <td class="td-jenis">{{ $p->jenis }}</td>

                    <!-- STATUS -->
                    <td>
                        @if($p->status == 'Dalam Proses')
                            <span class="badge badge-proses">Dalam Proses</span>
                        @elseif($p->status == 'Diluluskan')
                            <span class="badge badge-lulus">Diluluskan</span>
                        @elseif($p->status == 'Ditolak')
                            <span class="badge badge-tolak">Ditolak</span>
                        @else
                            <span class="badge badge-proses">{{ $p->status ?? 'Dalam Proses' }}</span>
                        @endif

                        @if($p->status == 'Ditolak')
                        <div>
                            <button
                                type="button"
                                onclick='openSebabModal(@json($p->catatan), @json($p->catatan_dokumen))'
                                class="lihat-sebab-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                Lihat Sebab Penolakan
                            </button>
                        </div>
                        @endif
                    </td>

                    <!-- DETAIL -->
                    <td>

                    <button
                        onclick="openPemohonModal({{ $p->id }})"
                        class="btn btn-sm"
                        style="
                            background:#ecfdf5;
                            color:#166534;
                            border:1px solid #bbf7d0;
                            padding:6px 12px;
                            border-radius:6px;
                            cursor:pointer;
                        ">
                        👁 Detail
                    </button>
                    </td>
                    
                    <td>

                    @if($p->status == 'Diluluskan')

                        <button
                            type="button"
                            onclick="openDokumenModal({{ $p->id }})"
                            class="btn btn-sm"
                            style="
                                background:#eff6ff;
                                color:#1d4ed8;
                                border:1px solid #bfdbfe;
                                padding:6px 12px;
                                border-radius:6px;
                                cursor:pointer;
                            ">

                            📁 Dokumen & Data

                        </button>

                    @else

                        <button
                            type="button"
                            disabled
                            class="btn btn-sm"
                            style="
                                background:#f3f4f6;
                                color:#9ca3af;
                                border:1px solid #e5e7eb;
                                padding:6px 12px;
                                border-radius:6px;
                                cursor:not-allowed;
                            ">

                            📁 Dokumen & Data

                        </button>

                    @endif

                    </td>

                    <!-- TINDAKAN -->
                    <td>
                        <div class="action-group">

                            {{-- UPDATE --}}
                            @if($p->status !== 'Diluluskan')
                            <a href="{{ route('permohonan.edit', $p->id) }}" class="act-btn act-update">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Kemaskini
                            </a>
                            @endif

                            {{-- PADAM --}}
                            <form action="{{ route('permohonan.delete', $p->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete(this)" class="act-btn act-padam">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/></svg>
                                    Padam
                                </button>
                            </form>

                        </div>
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
            <p>Tiada rekod permohonan</p>
            <span>Anda belum membuat sebarang permohonan data.</span>
        </div>

        @endif

    </div>
</div>

<!-- ── MODAL SEBAB PENOLAKAN ── -->
<div id="sebabModal" class="modal-overlay">
    <div class="modal-box">

        <div class="modal-head">
            <div class="modal-head-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <h3>Sebab Penolakan</h3>
        </div>

        <div class="modal-body">

            <div class="modal-section-label">Makluman daripada pegawai</div>
            <div id="modalSebab" class="modal-sebab-box"></div>

            <div class="modal-section-label">Dokumen perlu dikemaskini</div>
            <ul id="modalDokumen" class="modal-dokumen-list"></ul>

        </div>

        <div class="modal-foot">
            <button onclick="closeSebabModal()" class="modal-close-btn">
                Tutup
            </button>
        </div>

    </div>
</div>

<!-- MODAL DETAIL PERMOHONAN -->

<div id="pemohonModal" class="modal-overlay">
    <div class="modal-box"
         style="
            width:92%;
            max-width:820px;
            border-radius:12px;
            overflow:hidden;
         ">

        <div class="modal-head"
             style="
                background:#14532d;
                padding:22px 28px;
                border-bottom:none;
                display:block;
                text-align:center;
             ">

            <h3 style="
                color:#fff;
                margin:0;
                font-size:28px;
                font-weight:700;
            ">
                📋 Detail Permohonan
            </h3>

            <div style="
                color:#d1fae5;
                margin-top:6px;
                font-size:15px;
            ">
                Maklumat lengkap permohonan data LZNK
            </div>
        </div>

        <div class="modal-body">
            <div id="pemohonContent"></div>
        </div>

        <div class="modal-foot">
            <button
                onclick="closePemohonModal()"
                class="modal-close-btn">

                Tutup

            </button>
        </div>
    </div>
</div>

<!-- MODAL DOKUMEN & DATA -->

<div id="dokumenModal"
     class="modal-overlay">

    <div class="modal-box"
         style="max-width:850px;">

        <div class="modal-head"
             style="
                background:#f8fafc;
                border-bottom:1px solid #e5e7eb;
             ">

            <div>

                <h3 style="margin:0;color:#111827;">
                    Dokumen & Data
                </h3>

                <small style="color:#6b7280;">
                    Agreement, Pengesahan Bayaran Duti Hasil dan Fail Data
                </small>

            </div>

        </div>

        <div class="modal-body">

            <div id="dokumenContent">

                Loading...

            </div>

        </div>

        <div class="modal-foot">

            <button
                onclick="closeDokumenModal()"
                class="modal-close-btn">

                Tutup

            </button>
        </div>
    </div>
</div>

<script>
function confirmDelete(button) {
    Swal.fire({
        title: 'Padam Rekod?',
        text: "Rekod permohonan ini akan dipadam secara kekal.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Padam',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Berjaya!',
                text: 'Rekod berjaya dipadam.',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout(() => {
                button.closest('form').submit();
            }, 1500);
        }
    });
}

function openSebabModal(sebab, dokumenJson) {
    document.getElementById('modalSebab').innerText = sebab;

    let dokumen = JSON.parse(dokumenJson);
    let html = '';

    if (dokumen.surat) html += '<li>Surat Permohonan Rasmi</li>';
    if (dokumen.ic)    html += '<li>Salinan Kad Pengenalan (IC)</li>';
    if (dokumen.ssm)   html += '<li>Sijil SSM</li>';
    if (dokumen.ros)   html += '<li>Sijil ROS</li>';

    document.getElementById('modalDokumen').innerHTML = html || '<li>Tiada dokumen khusus dinyatakan</li>';
    document.getElementById('sebabModal').classList.add('active');
}

function closeSebabModal() {
    document.getElementById('sebabModal').classList.remove('active');
}

// Close modal on overlay click
document.getElementById('sebabModal').addEventListener('click', function(e) {
    if (e.target === this) closeSebabModal();
});

function openPemohonModal(id)
{
    fetch('/api/permohonan/' + id)

    .then(response => response.json())

    .then(data => {

    let statusColor = `
    background:#E5E7EB;
    color:#374151;
    `;

    if (data.status === 'Diluluskan') {

        statusColor = `
            background:#DCFCE7;
            color:#166534;
        `;

    } else if (data.status === 'Ditolak') {

        statusColor = `
            background:#FEE2E2;
            color:#991B1B;
        `;

    } else if (data.status === 'Menunggu Kelulusan Timbalan') {

        statusColor = `
            background:#FEF3C7;
            color:#92400E;
        `;

    } else if (data.status === 'Menunggu Semakan') {

        statusColor = `
            background:#DBEAFE;
            color:#1D4ED8;
        `;
    }

    document.getElementById('pemohonContent').innerHTML = `

        <div style="
        background:#f9fafb;
        border:1px solid #e5e7eb;
        border-radius:10px;
        padding:25px;
        ">

        <h3 style="
        text-align:center;
        margin:0 0 25px;
        color:#14532d;
        font-size:22px;
        font-weight:700;
        ">
        Maklumat Pemohon
        </h3>

        <table style="
        width:100%;
        border-collapse:collapse;
        font-size:15px;
        ">

            <tr>
                <td style="width:220px;padding:10px 0;font-weight:600;">
                    Nama Pemohon
                </td>

                <td>
                    ${data.nama ?? '-'}
                </td>
            </tr>

            <tr>
                <td style="padding:10px 0;font-weight:600;">
                    Kategori
                </td>

                <td>
                    ${data.jenis ?? '-'}
                </td>
            </tr>

            <tr>
                <td style="padding:10px 0;font-weight:600;">
                    No Telefon
                </td>

                <td>
                    ${data.telefon ?? '-'}
                </td>
            </tr>

            <tr>
                <td style="padding:10px 0;font-weight:600;">
                    E-mel
                </td>
                <td>
                    ${data.email ?? '-'}
                </td>
            </tr>

            <tr style="vertical-align:top;">

                <td style="
                padding:10px 0;
                font-weight:600;
                ">
                    Alamat
                </td>

                <td style="line-height:1.8;">

                    ${data.alamat ?? '-'}<br>
                    ${data.poskod ?? ''}
                    ${data.negeri ?? ''}

                    Malaysia

                </td>
            </tr>
            <tr>
                <td style="padding:10px 0;font-weight:600;">
                    Tujuan Permohonan
                </td>
                <td>
                    ${data.tujuan ?? '-'}
                </td>
            </tr>
            <tr>
                <td style="padding:10px 0;font-weight:600;">
                    Status
                </td>
                <td>
                    <span style="
                    ${statusColor}
                    padding:6px 12px;
                    border-radius:20px;
                    font-size:13px;
                    font-weight:600;
                    display:inline-block;
                    ">

                        ${data.status}

                    </span>
                </td>
            </tr>
        </table>

 ${(() => {

    let dokumen = '';

    // INDIVIDU
    if (data.jenis === 'Individu') {

        dokumen = `
        <tr>
            <td style="padding:8px 0;font-weight:600;">📄 Surat Permohonan</td>
            <td>${data.surat
                ? '<span style="color:#16a34a;">✔ Dimuat Naik</span>'
                : '<span style="color:#dc2626;">✘ Tiada</span>'}</td>
        </tr>

        <tr>
            <td style="padding:8px 0;font-weight:600;">🪪 Kad Pengenalan</td>
            <td>${data.ic
                ? '<span style="color:#16a34a;">✔ Dimuat Naik</span>'
                : '<span style="color:#dc2626;">✘ Tiada</span>'}</td>
        </tr>
        `;
    }

    // SYARIKAT
    else if (data.jenis === 'Syarikat') {

        dokumen = `
        <tr>
            <td style="padding:8px 0;font-weight:600;">📄 Surat Permohonan</td>
            <td>${data.surat
                ? '<span style="color:#16a34a;">✔ Dimuat Naik</span>'
                : '<span style="color:#dc2626;">✘ Tiada</span>'}</td>
        </tr>

        <tr>
            <td style="padding:8px 0;font-weight:600;">🏢 Sijil SSM</td>
            <td>${data.ssm
                ? '<span style="color:#16a34a;">✔ Dimuat Naik</span>'
                : '<span style="color:#dc2626;">✘ Tiada</span>'}</td>
        </tr>
        `;
    }

    // PERTUBUHAN
    else if (data.jenis === 'Pertubuhan') {

        dokumen = `
        <tr>
            <td style="padding:8px 0;font-weight:600;">📄 Surat Permohonan</td>
            <td>${data.surat
                ? '<span style="color:#16a34a;">✔ Dimuat Naik</span>'
                : '<span style="color:#dc2626;">✘ Tiada</span>'}</td>
        </tr>

        <tr>
            <td style="padding:8px 0;font-weight:600;">🏛️ Sijil ROS</td>
            <td>${data.ros
                ? '<span style="color:#16a34a;">✔ Dimuat Naik</span>'
                : '<span style="color:#dc2626;">✘ Tiada</span>'}</td>
        </tr>
        `;
    }

    // AGENSI
    else if (data.jenis === 'Agensi') {

        dokumen = `
        <tr>
            <td style="padding:8px 0;font-weight:600;">📄 Surat Permohonan</td>
            <td>${data.surat
                ? '<span style="color:#16a34a;">✔ Dimuat Naik</span>'
                : '<span style="color:#dc2626;">✘ Tiada</span>'}</td>
        </tr>
        `;
    }

    return `
        <hr style="margin:25px 0;">

        <h4 style="
            margin-bottom:15px;
            color:#14532d;
            font-size:18px;
        ">
            📂 Dokumen Dimuat Naik
        </h4>

        <table style="width:100%;border-collapse:collapse;">
            ${dokumen}
        </table>
    `;

})()}

        </div>

        ${data.status === 'Diluluskan' ? `
        <div style="
            margin-top:18px;
            background:#eff6ff;
            border:1px solid #bfdbfe;
            padding:14px 18px;
            border-radius:8px;
            color:#1e3a8a;
        ">
            ℹ️ Dokumen Agreement, Pengesahan Bayaran Duti Hasil dan Fail Data boleh dilihat melalui menu
            <b>Dokumen & Data</b>.
        </div>
        ` : ''}
    `;

    document.getElementById('pemohonModal').classList.add('active');

        });
    }

function closePemohonModal()
{
    document.getElementById('pemohonModal')
        .classList.remove('active');
}

document.getElementById('pemohonModal')
?.addEventListener('click', function(e){

    if(e.target === this)
    {
        closePemohonModal();
    }

});

function openDokumenModal(id)
{
    document.getElementById('dokumenModal')
        .classList.add('active');

    const content = document.getElementById('dokumenContent');

    content.innerHTML = `
        <div style="text-align:center;padding:30px;">
            Loading...
        </div>
    `;

    fetch(`/api/dokumen/${id}`)

    .then(response => response.json())

    .then(data => {


        let agreement = '';

        if(data.agreement.status)
        {
        agreement = `

        <div class="document-row">

            <div class="document-label">
                Status
            </div>

            <div class="status-success">
                ✔ Agreement tersedia
            </div>

        </div>

        <div class="document-row">

            <div class="document-label">
                Dokumen
            </div>

            <div class="document-value">
                Agreement PDF
            </div>

        </div>

        <button
        onclick="openAgreement('${data.agreement.url}')"
        class="btn-view">

            Lihat Agreement

        </button>

        `;
        }
        else
        {
            agreement = `
            <div class="status-danger">
                🔴 Agreement belum tersedia
            </div>
            `;
        }

        let stampDuty = '';

        if(data.stamp_duty.status)
        {
            stampDuty = `

            <div class="status-success">
                🟢 Pengesahan bayaran tersedia
            </div>

            <p>
                ${data.stamp_duty.name}
            </p>
            
            <button
                onclick="deleteStampDuty(${id})"
                class="btn-upload"
                style="background:#dc2626;margin-top:10px;">
                🗑 Padam
            </button>

            `;
        }
        else
        {
            stampDuty = `

            <div class="document-row">

                <div class="document-label">
                    Status
                </div>

                <div class="status-warning">
                    🟡 Belum dimuat naik
                </div>

            </div>

            <div style="margin-top:15px;">

                <input
                    type="file"
                    id="stampDutyFile"
                    accept=".pdf,.jpg,.jpeg,.png">

            </div>

            <div style="margin-top:15px;">

                <button
                    class="btn-upload"
                    onclick="uploadStampDuty(${id})">

                    📤 Upload Pengesahan

                </button>

            </div>

            <small
                style="
                    display:block;
                    margin-top:10px;
                    color:#6b7280;
                ">

                Format dibenarkan: PDF, JPG, JPEG, PNG

            </small>

            `;
        }

        let dataFile = '';

        if(data.data.status)
        {

            dataFile = `

            <div class="status-success">
                🟢 Fail data tersedia
            </div>

            `;

            data.data.files.forEach(file=>{

                dataFile += `

                <p>
                📁 ${file.name}
                <br>
                📊 ${file.rows.toLocaleString()} rekod
                </p>

                `;
            });
        }
        else
        {
            dataFile = `

            <div class="status-danger">
                🔴 Fail data belum tersedia
            </div>

            `;
        }

        content.innerHTML = `

        <div class="document-card">
            <h4>
            📄 Agreement
            </h4>

            ${agreement}

        </div>

        <div class="document-card">
            <h4>
            🧾 Pengesahan Bayaran Duti Hasil
            </h4>

            ${stampDuty}

        </div>

        <div class="document-card">

            <h4>
            💾 Fail Data
            </h4>

            ${dataFile}

        </div>

        `;
    })

    .catch(error=>{

        content.innerHTML = `
        <p style="color:red">
        Gagal mendapatkan data dokumen.
        </p>
        `;

    });
}

function closeDokumenModal()
{
    document.getElementById('dokumenModal')
        .classList.remove('active');
}

function uploadStampDuty(id)
{
    const fileInput = document.getElementById('stampDutyFile');

    if (!fileInput.files.length) {

        Swal.fire({
            icon: 'warning',
            title: 'Tiada fail dipilih',
            text: 'Sila pilih fail Pengesahan Bayaran Duti Hasil dahulu.'
        });

        return;
    }

    Swal.fire({
        title: 'Muat Naik Pengesahan?',
        text: 'Adakah anda pasti ingin memuat naik fail Pengesahan Bayaran Duti Hasil ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Muat Naik',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#16a34a',
        cancelButtonColor: '#6b7280'
    }).then((result) => {

        if (!result.isConfirmed) {
            return;
        }

        const formData = new FormData();

        formData.append(
            'stamp_duty_file',
            fileInput.files[0]
        );

        fetch(`/stamp-duty/upload/${id}`, {

            method: 'POST',

            headers: {
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]')
                    .content
            },

            body: formData

        })

        .then(response => {

            if (!response.ok) {
                throw new Error();
            }

            return response.text();

        })

        .then(() => {

            Swal.fire({
                icon:'success',
                title:'Berjaya',
                text:'Pengesahan Bayaran Duti Hasil berjaya dimuat naik.',
                timer:1500,
                showConfirmButton:false
            });

            openDokumenModal(id);

        })

        .catch(() => {

            Swal.fire({
                icon:'error',
                title:'Ralat',
                text:'Gagal memuat naik fail.'
            });
        });
    });
}

function deleteStampDuty(id)
{
    Swal.fire({
        title: 'Padam Pengesahan?',
        text: 'Adakah anda pasti ingin memadam fail Pengesahan Bayaran Duti Hasil ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Padam',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280'
    })

    .then((result)=>{

        if(!result.isConfirmed){
            return;
        }

        fetch(`/stamp-duty/delete/${id}`,{

            method:'DELETE',

            headers:{
                'X-CSRF-TOKEN':document
                    .querySelector('meta[name="csrf-token"]')
                    .content
            }
        })

        .then(response=>response.json())
        .then(data=>{

            if(data.success){

                Swal.fire({
                    icon:'success',
                    title:'Berjaya',
                    text:'Pengesahan Bayaran Duti Hasil berjaya dipadam.',
                    timer:1500,
                    showConfirmButton:false
                });

                setTimeout(()=>{
                    openDokumenModal(id);
                },1500);

            }else{

                Swal.fire({
                    icon:'error',
                    title:'Ralat',
                    text:'Fail gagal dipadam.'
                });
            }
        })

        .catch(()=>{

            Swal.fire({
                icon:'error',
                title:'Ralat',
                text:'Fail gagal dipadam.'
            });
        });
    });
}

function openAgreement(url)
{
    const viewer =
        "/pdfjs/web/viewer.html?file=" +
        encodeURIComponent(url);

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

function closeAgreement()
{
    document
        .getElementById("agreementModal")
        .classList.remove("active");
}

function lihatData(id)
{
    fetch('/api/data-files/' + id)
    .then(res => res.json())
    .then(files => {

        let html = '';

        files.forEach((file, index) => {

            html += `
                <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    border:1px solid #ddd;
                    padding:10px;
                    margin-bottom:10px;
                    border-radius:6px;
                ">

                    <span>📄 ${file.name}</span>

                    <a href="/data/download/${id}/${index}"
                    class="act-btn act-update">

                        Lihat
                    </a>
                </div>
            `;
        });

        Swal.fire({
            title:'Senarai Fail Data',
            html:html,
            width:700,
            showCloseButton:true,
            showConfirmButton:false
        });

    });
}

</script>

<div id="agreementModal" class="modal-overlay">

    <div class="pdf-modal-box">

        <div class="pdf-modal-head">

            <span> 📄 Preview Agreement </span>

            <button
                onclick="closeAgreement()"
                class="btn-close-modal">

                Tutup

            </button>
        </div>

        <div
            id="agreementContent"
            style="
                flex:1;
                overflow:hidden;
                background:#d9d9d9;
            ">
        </div>
    </div>
</div>

</x-layouts.app>