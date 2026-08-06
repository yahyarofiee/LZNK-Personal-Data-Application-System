<x-layouts.app-dpo title="Dalam Proses">

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

    /* Alert info strip */
    .alert-info {
        background: #fef3c7;
        border: 1px solid #fde68a;
        border-left: 4px solid #d97706;
        border-radius: 3px;
        padding: 10px 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #92400e;
    }
    .alert-info svg { width: 15px; height: 15px; flex-shrink: 0; color: #d97706; }

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
        background: #d97706; border-radius: 2px; display: block;
    }
    .panel-count {
        font-size: 12px; color: #92400e;
        background: #fef3c7; border: 1px solid #fde68a;
        border-radius: 2px; padding: 3px 10px;
        display: flex; align-items: center; gap: 5px;
    }
    .panel-count::before {
        content: ''; width: 5px; height: 5px;
        border-radius: 50%; background: #d97706;
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
    .dpo-table tbody tr:hover { background: #fffdf5; }
    .dpo-table tbody td { padding: 14px 1.25rem; vertical-align: middle; }
    .dpo-table tbody td.center { text-align: center; }

    .td-nama { font-size: 13.5px; font-weight: 500; color: #1a1f1b; }
    .td-nama-sub { font-size: 11.5px; color: #8a9490; margin-top: 2px; }

    /* Status badge */
    .badge-proses {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 4px 10px; border-radius: 2px;
        font-size: 11.5px; font-weight: 600;
        background: #fef3c7; color: #92400e;
    }
    .badge-proses::before {
        content: ''; width: 5px; height: 5px;
        border-radius: 50%; background: #d97706;
    }

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

    /* Empty state */
    .empty-state { padding: 4rem 2rem; text-align: center; }
    .empty-icon {
        width: 52px; height: 52px; background: #fef3c7;
        border-radius: 50%; display: flex; align-items: center;
        justify-content: center; margin: 0 auto 1rem; color: #d97706;
    }
    .empty-icon svg { width: 22px; height: 22px; }
    .empty-state p { font-size: 14px; color: #5a6860; font-weight: 500; margin: 0 0 4px; }
    .empty-state span { font-size: 12.5px; color: #8a9490; }

    /* ══════════════ MODAL TOLAK ══════════════ */
    .modal-overlay {
        display: none; position: fixed; inset: 0;
        background: rgba(0,0,0,0.45); z-index: 50;
        align-items: center; justify-content: center; padding: 1rem;
    }
    .modal-overlay.active { display: flex; }
    @keyframes modalIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
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
        text-transform: uppercase; letter-spacing: 0.04em;
        margin-bottom: 6px; display: block;
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
    .checkbox-item { display: flex; align-items: center; gap: 9px; font-size: 13px; color: #1a1f1b; cursor: pointer; }
    .checkbox-item input[type="checkbox"] { width: 15px; height: 15px; accent-color: #dc2626; cursor: pointer; }
    .tolak-modal-foot {
        padding: 1rem 1.5rem; border-top: 1px solid #f0f2f0;
        display: flex; justify-content: flex-end; gap: 8px; background: #fafafa;
    }
    .btn-close-modal {
        display: inline-flex; align-items: center; gap: 6px;
        font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500;
        padding: 8px 18px; border-radius: 3px;
        border: 1.5px solid #d4d9d5; background: #fff; color: #5a6860;
        cursor: pointer; transition: border-color 0.15s;
    }
    .btn-close-modal:hover { border-color: #999; color: #1a1f1b; }
    .btn-tolak-submit {
        display: inline-flex; align-items: center; gap: 6px;
        font-family: 'DM Sans', sans-serif; font-size: 13.5px; font-weight: 500;
        padding: 9px 22px; border-radius: 3px; border: none;
        background: #dc2626; color: #fff; cursor: pointer; transition: background 0.15s;
    }
    .btn-tolak-submit:hover { background: #b91c1c; }
</style>

<div class="page-wrap">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2>Dalam Proses</h2>
            <p>Senarai permohonan yang sedang menunggu tindakan</p>
        </div>
    </div>

    @php
    $count = \App\Models\Permohonan::whereIn('status', [
        'Dalam Proses',
        'Menunggu Kelulusan Timbalan'
    ])->count();
    @endphp

    @if($count > 0)
    <div class="alert-info">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        Terdapat <strong>&nbsp;{{ $count }} permohonan&nbsp;</strong> yang memerlukan tindakan segera.
    </div>
    @endif

    <!-- Table Panel -->
    <div class="panel">
        <div class="panel-head">
            <span class="panel-head-title">Permohonan Dalam Proses</span>
            <span class="panel-count">{{ $count }} menunggu tindakan</span>
        </div>

        <table class="dpo-table">
            <thead>
                <tr>
                    <th>Pemohon</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th class="center">Tindakan</th>
                </tr>
            </thead>
            <tbody>

            @forelse(\App\Models\Permohonan::whereIn('status', [
                'Dalam Proses',
                'Menunggu Kelulusan Timbalan'
            ])->latest()->get() as $item)

            <tr>
                <td>
                    <div class="td-nama">{{ $item->nama }}</div>
                    <div class="td-nama-sub">{{ $item->created_at->format('d/m/Y') }} · {{ $item->created_at->diffForHumans() }}</div>
                </td>
                <td style="color:#1a1f1b;">{{ $item->jenis }}</td>
                <td>
                <span class="badge-proses">
                    {{ $item->status }}
                </span>
                </td>

            <td class="center">

        @if($item->status == 'Dalam Proses')

            <div style="display:flex; justify-content:center; gap:6px;">

                <form action="{{ route('permohonan.lulus', $item->id) }}"
                    method="POST"
                    style="display:inline;">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="act-btn act-lulus">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                        Lulus
                    </button>
                </form>

                <button type="button"
                        onclick="openTolakModal({{ $item->id }})"
                        class="act-btn act-tolak">
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor"
                        stroke-width="2.5"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                    Tolak
                </button>

            </div>

            @elseif($item->status == 'Menunggu Kelulusan Timbalan')

                <span style="
                    color:#9ca3af;
                    font-size:12px;
                    font-style:italic;
                ">
                    Menunggu Tindakan Timbalan
                </span>

            @endif

            </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <p>Tiada permohonan dalam proses</p>
                        <span>Semua permohonan telah selesai diproses.</span>
                    </div>
                </td>
            </tr>
            @endforelse

            </tbody>
        </table>
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

<script>
function openTolakModal(id) {
    const form = document.getElementById('formTolakPopup');
    form.reset();
    form.action = `/permohonan/${id}/tolak`;
    document.getElementById('tolakModal').classList.add('active');
}

function closeTolakModal() {
    document.getElementById('tolakModal').classList.remove('active');
}

document.getElementById('tolakModal').addEventListener('click', function(e) {
    if (e.target === this) closeTolakModal();
});
</script>

</x-layouts.app-dpo>