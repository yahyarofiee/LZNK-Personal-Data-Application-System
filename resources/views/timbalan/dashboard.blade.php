<x-layouts.app-timbalan title="Dashboard Timbalan">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap');

    .dash-wrap {
        font-family: 'DM Sans', sans-serif;
        background: #eef0ec;
        min-height: 100vh;
        padding: 2.25rem 2rem 4rem;
    }

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
    .dash-page-header p { font-size: 13px; color: #5a6860; margin: 0; }
    .dash-date-badge {
        font-size: 12px; color: #5a6860;
        background: #fff; border: 1px solid #d4d9d5;
        border-radius: 3px; padding: 5px 12px;
    }

    .stat-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
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
    .stat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; }
    .stat-card.menunggu::before { background: #b45309; }
    .stat-card.lulus::before   { background: #166534; }
    .stat-card.tolak::before   { background: #991b1b; }

    .stat-icon { width: 36px; height: 36px; border-radius: 3px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; }
    .stat-icon svg { width: 18px; height: 18px; }
    .stat-icon.menunggu { background: #fef3c7; color: #b45309; }
    .stat-icon.lulus    { background: #dcfce7; color: #166534; }
    .stat-icon.tolak    { background: #fee2e2; color: #991b1b; }

    .stat-label { font-size: 11.5px; font-weight: 500; color: #5a6860; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 6px; }
    .stat-value { font-size: 2rem; font-weight: 600; color: #1a1f1b; line-height: 1; margin-bottom: 6px; }
    .stat-sub   { font-size: 11.5px; color: #8a9490; }

    .panel { background: #fff; border: 1px solid #d4d9d5; border-radius: 4px; overflow: hidden; box-shadow: 0 2px 16px rgba(26,92,42,0.07); }
    .panel-head { padding: 1.1rem 1.5rem; border-bottom: 1px solid #eef0ec; display: flex; align-items: center; justify-content: space-between; }
    .panel-head-title { font-size: 13.5px; font-weight: 600; color: #1a1f1b; display: flex; align-items: center; gap: 8px; }
    .panel-head-title::before { content: ''; width: 3px; height: 14px; background: #b45309; border-radius: 2px; display: block; }
    .panel-count { font-size: 12px; color: #92400e; background: #fef3c7; border: 1px solid #fde68a; border-radius: 2px; padding: 3px 10px; display: flex; align-items: center; gap: 5px; }
    .panel-count::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: #d97706; }

    .dpo-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
    .dpo-table thead tr { background: #f5f6f4; border-bottom: 1.5px solid #d4d9d5; }
    .dpo-table thead th { padding: 11px 1.25rem; text-align: left; font-size: 11px; font-weight: 600; color: #8a9490; text-transform: uppercase; letter-spacing: 0.06em; white-space: nowrap; }
    .dpo-table thead th.center { text-align: center; }
    .dpo-table tbody tr { border-bottom: 1px solid #f0f2f0; transition: background 0.1s; }
    .dpo-table tbody tr:last-child { border-bottom: none; }
    .dpo-table tbody tr:hover { background: #fffdf5; }
    .dpo-table tbody td { padding: 14px 1.25rem; vertical-align: middle; color: #1a1f1b; }
    .dpo-table tbody td.center { text-align: center; }

    .td-nama { font-size: 13.5px; font-weight: 500; color: #1a1f1b; }
    .td-nama-sub { font-size: 11.5px; color: #8a9490; margin-top: 2px; }

    .badge-menunggu { display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; border-radius: 2px; font-size: 11.5px; font-weight: 600; background: #fef3c7; color: #92400e; }
    .badge-menunggu::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: #d97706; }

    .act-btn { display: inline-flex; align-items: center; gap: 5px; font-family: 'DM Sans', sans-serif; font-size: 12px; font-weight: 500; padding: 6px 13px; border-radius: 2px; border: 1.5px solid transparent; cursor: pointer; text-decoration: none; transition: background 0.15s, border-color 0.15s, color 0.15s; white-space: nowrap; background: none; }
    .act-btn svg { width: 13px; height: 13px; flex-shrink: 0; }
    .act-detail { background: #e8f4ec; color: #1a5c2a; border-color: #b8ddc4; }
    .act-detail:hover { background: #1a5c2a; color: #fff; border-color: #1a5c2a; }
    .act-lulus  { background: #dcfce7; color: #14532d; border-color: #bbf7d0; }
    .act-lulus:hover  { background: #16a34a; color: #fff; border-color: #16a34a; }
    .act-tolak  { background: #fee2e2; color: #7f1d1d; border-color: #fecaca; }
    .act-tolak:hover  { background: #dc2626; color: #fff; border-color: #dc2626; }

    .empty-state { padding: 4rem 2rem; text-align: center; }
    .empty-icon { width: 52px; height: 52px; background: #fef3c7; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: #d97706; }
    .empty-icon svg { width: 22px; height: 22px; }
    .empty-state p { font-size: 14px; color: #5a6860; font-weight: 500; margin: 0 0 4px; }
    .empty-state span { font-size: 12.5px; color: #8a9490; }

    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 50; align-items: center; justify-content: center; padding: 1rem; }
    .modal-overlay.active { display: flex; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .modal-box { background: #fff; border-radius: 4px; width: 100%; max-width: 860px; border: 1px solid #d4d9d5; overflow: hidden; box-shadow: 0 8px 40px rgba(0,0,0,0.18); animation: modalIn 0.18s ease; max-height: 90vh; display: flex; flex-direction: column; }
    .modal-head { padding: 1.1rem 1.75rem; border-bottom: 1px solid #d4d9d5; background: #f5f6f4; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; }
    .modal-head-left { display: flex; align-items: center; gap: 12px; }
    .modal-head-icon { width: 34px; height: 34px; background: #1a5c2a; border-radius: 3px; display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0; }
    .modal-head-icon svg { width: 16px; height: 16px; }
    .modal-head-title { font-family: 'DM Serif Display', serif; font-size: 1.1rem; color: #1a1f1b; margin: 0 0 2px; }
    .modal-head-sub   { font-size: 12px; color: #8a9490; margin: 0; }
    .modal-body { padding: 1.5rem 1.75rem; overflow-y: auto; flex: 1; }
    .modal-section-label { font-size: 11px; font-weight: 600; color: #8a9490; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 10px; display: flex; align-items: center; gap: 8px; }
    .modal-section-label::after { content: ''; flex: 1; height: 1px; background: #eef0ec; }
    .modal-info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem 2rem; margin-bottom: 1.5rem; }
    .modal-info-item label { display: block; font-size: 11px; font-weight: 500; color: #8a9490; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 4px; }
    .modal-info-item p { font-size: 13.5px; color: #1a1f1b; font-weight: 400; line-height: 1.5; }
    .modal-info-item.full { grid-column: 1 / -1; }
    .lampiran-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }
    .lampiran-card { display: flex; align-items: center; gap: 12px; padding: 12px 14px; background: #f9faf9; border: 1.5px solid #d4d9d5; border-radius: 3px; cursor: pointer; transition: border-color 0.15s, background 0.15s; text-align: left; width: 100%; font-family: 'DM Sans', sans-serif; text-decoration: none; color: inherit; }
    .lampiran-card:hover { border-color: #1a5c2a; background: #f0f7f2; }
    .lampiran-icon { width: 34px; height: 34px; border-radius: 3px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .lampiran-icon svg { width: 16px; height: 16px; }
    .lampiran-icon.surat { background: #e8f4ec; color: #1a5c2a; }
    .lampiran-icon.ic    { background: #eff6ff; color: #1d4ed8; }
    .lampiran-icon.ssm   { background: #f5f3ff; color: #7c3aed; }
    .lampiran-icon.ros   { background: #fff7ed; color: #c2410c; }
    .lampiran-name { font-size: 13px; font-weight: 500; color: #1a1f1b; }
    .lampiran-sub  { font-size: 11.5px; color: #8a9490; margin-top: 1px; }
    .modal-foot { padding: 1rem 1.75rem; border-top: 1px solid #d4d9d5; background: #f5f6f4; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-shrink: 0; }
    .modal-foot-date { font-size: 12px; color: #8a9490; }
    .modal-foot-actions { display: flex; align-items: center; gap: 8px; }
    .btn-close-modal { display: inline-flex; align-items: center; gap: 6px; font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500; padding: 8px 18px; border-radius: 3px; border: 1.5px solid #d4d9d5; background: #fff; color: #5a6860; cursor: pointer; transition: border-color 0.15s; }
    .btn-close-modal:hover { border-color: #999; color: #1a1f1b; }
</style>

<div class="dash-wrap">

    <div class="dash-page-header">
        <div>
            <h2>Dashboard Timbalan</h2>
            <p>Kelulusan akhir permohonan data pemohon</p>
        </div>
        <div class="dash-date-badge">{{ now()->format('d/m/Y') }}</div>
    </div>

    <div class="stat-grid">

        <a href="{{ route('timbalan.menunggu.kelulusan.timbalan') }}" class="stat-card menunggu">
            <div class="stat-icon menunggu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div class="stat-label">Menunggu Kelulusan</div>
            <div class="stat-value">{{ \App\Models\Permohonan::where('status','Menunggu Kelulusan Timbalan')->count() }}</div>
            <div class="stat-sub">Memerlukan tindakan</div>
        </a>

        <a href="{{ route('timbalan.diluluskan') }}" class="stat-card lulus">
            <div class="stat-icon lulus">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <div class="stat-label">Diluluskan</div>
            <div class="stat-value">{{ \App\Models\Permohonan::where('status','Diluluskan')->count() }}</div>
            <div class="stat-sub">Berjaya diluluskan</div>
        </a>

        <a href="{{ route('timbalan.ditolak') }}" class="stat-card tolak">
            <div class="stat-icon tolak">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
            </div>
            <div class="stat-label">Ditolak</div>
            <div class="stat-value">{{ \App\Models\Permohonan::where('status','Ditolak')->count() }}</div>
            <div class="stat-sub">Tidak diluluskan</div>
        </a>

    </div>

    @php $menungguCount = \App\Models\Permohonan::where('status','Menunggu Kelulusan Timbalan')->count(); @endphp
    <div class="panel">
        <div class="panel-head">
            <span class="panel-head-title">Permohonan Menunggu Kelulusan Timbalan</span>
            <span class="panel-count">{{ $menungguCount }} menunggu</span>
        </div>

        <table class="dpo-table">
            <thead>
                <tr>
                    <th>Pemohon</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th class="center">Detail</th>
                    <th class="center">Tindakan</th>
                </tr>
            </thead>
            <tbody>

            @php $senarai = \App\Models\Permohonan::where('status','Menunggu Kelulusan Timbalan')->latest()->get(); @endphp

            @forelse($senarai as $permohonan)
            <tr>
                <td>
                    <div class="td-nama">{{ $permohonan->nama }}</div>
                    <div class="td-nama-sub">{{ $permohonan->created_at->format('d/m/Y') }} · {{ $permohonan->created_at->diffForHumans() }}</div>
                </td>
                <td>{{ $permohonan->jenis }}</td>
                <td><span class="badge-menunggu">Menunggu Kelulusan</span></td>
                <td class="center">
                    <button onclick="openModal({{ $permohonan->id }})" class="act-btn act-detail">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        Detail
                    </button>
                </td>
                <td class="center">
                    <div style="display:flex; justify-content:center; gap:6px;">
                        <form action="{{ route('permohonan.lulus.timbalan', $permohonan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="act-btn act-lulus">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                Lulus
                            </button>
                        </form>
                        <form action="{{ route('permohonan.tolak.timbalan', $permohonan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="act-btn act-tolak">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                Tolak
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <p>Tiada permohonan menunggu kelulusan</p>
                        <span>Semua permohonan telah diproses.</span>
                    </div>
                </td>
            </tr>
            @endforelse

            </tbody>
        </table>
    </div>

</div>

<!-- MODAL DETAIL -->
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
                <button onclick="closeModal()" class="btn-close-modal">Tutup</button>
            </div>
        </div>

    </div>
</div>

<script>
function openModal(id) {
    fetch('/api/permohonan/' + id)
    .then(res => res.json())
    .then(data => {

        const statusEl = document.getElementById('modalStatus');
        statusEl.className = 'badge-menunggu';
        statusEl.innerText = data.status;

        const lampiranItems = [
            { key: 'surat', label: 'Surat Permohonan', sub: 'Dokumen rasmi', cls: 'surat',
              icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>` },
            { key: 'ic',    label: 'Salinan IC',       sub: 'Kad pengenalan', cls: 'ic',
              icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>` },
            { key: 'ssm',   label: 'Sijil SSM',        sub: 'Syarikat',       cls: 'ssm',
              icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>` },
            { key: 'ros',   label: 'Sijil ROS',        sub: 'Pertubuhan',     cls: 'ros',
              icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>` },
        ];

        const available = lampiranItems.filter(l => data[l.key]);
        const lampiranHTML = available.length > 0
            ? `<div class="lampiran-grid">${available.map(l => `
                <a class="lampiran-card" href="/preview/${data[l.key]}" target="_blank">
                    <div class="lampiran-icon ${l.cls}">${l.icon}</div>
                    <div><div class="lampiran-name">${l.label}</div><div class="lampiran-sub">${l.sub}</div></div>
                </a>`).join('')}</div>`
            : '<span style="font-size:13px;color:#8a9490;">Tiada lampiran</span>';

        const isOrg = ['Syarikat','Pertubuhan','Agensi'].includes(data.jenis);
        const namaOrg = data.nama_syarikat || data.syarikat || data.nama_organisasi || '-';

        document.getElementById('modalContent').innerHTML = `
            <div class="modal-section-label">Maklumat Pemohon</div>
            <div class="modal-info-grid">
                <div class="modal-info-item"><label>Nama Pemohon</label><p>${data.nama ?? '-'}</p></div>
                <div class="modal-info-item"><label>Kategori</label><p>${data.jenis ?? '-'}</p></div>
                ${isOrg ? `
                <div class="modal-info-item"><label>Nama ${data.jenis}</label><p>${namaOrg}</p></div>
                <div class="modal-info-item"><label>No. Pendaftaran</label><p>${data.no_pendaftaran ?? '-'}</p></div>` : ''}
                <div class="modal-info-item"><label>No. Telefon</label><p>${data.telefon ?? '-'}</p></div>
                <div class="modal-info-item"><label>E-mel</label><p>${data.email ?? '-'}</p></div>
                <div class="modal-info-item full">
                <label>Alamat</label>
                <p>
                    ${data.alamat ?? '-'}<br>
                    ${data.poskod ?? ''}
                    ${data.negeri ?? ''}<br>
                    Malaysia
                </p>
            </div>
            <div class="modal-info-item full"><label>Tujuan Permohonan</label><p>${data.tujuan ?? '-'}</p></div></div>
            <div class="modal-section-label">Lampiran Dokumen</div>
            ${lampiranHTML}
        `;

        const tarikh = data.created_at ? new Date(data.created_at).toLocaleString('ms-MY') : '-';
        document.getElementById('modalDate').innerHTML = `Tarikh Permohonan: ${tarikh}`;
        document.getElementById('modalDetail').classList.add('active');
    });
}

function closeModal() {
    document.getElementById('modalDetail').classList.remove('active');
}

document.getElementById('modalDetail').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>

</x-layouts.app-timbalan>