<x-layouts.app title="Permohonan Data">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap');

    :root {
        --lznk-green: #1a5c2a;
        --lznk-green-mid: #2d7a40;
        --lznk-green-light: #e8f4ec;
        --lznk-green-border: #b8ddc4;
        --lznk-gold: #c9a84c;
        --lznk-gold-light: #f7f0e0;
        --lznk-surface: #f5f6f4;
        --lznk-white: #ffffff;
        --lznk-text: #1a1f1b;
        --lznk-text-muted: #5a6860;
        --lznk-border: #d4d9d5;
        --lznk-input-focus: #1a5c2a;
        --lznk-danger: #c0392b;
    }

    .lznk-page {
        font-family: 'DM Sans', sans-serif;
        background: #eef0ec;
        min-height: 100vh;
        padding: 2.5rem 1rem 4rem;
    }

    /* Page title strip */
    .page-header-strip {
        max-width: 1100px;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .page-header-strip .breadcrumb-line {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: var(--lznk-text-muted);
    }
    .page-header-strip .breadcrumb-line span.sep { color: #aab5ac; }
    .page-header-strip .breadcrumb-line span.current { color: var(--lznk-green); font-weight: 500; }

    /* Main card wrapper */
    .form-shell {
        max-width: 1300px;
        margin: 0 auto;
        background: var(--lznk-white);
        border: 1px solid var(--lznk-border);
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(26,92,42,0.08);
    }

    /* Form header */
    .form-head {
        background: var(--lznk-green);
        padding: 2rem 3rem;
        position: relative;
        overflow: hidden;
    }
    .form-head::after {
        content: '';
        position: absolute;
        right: -30px;
        top: -30px;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        border: 40px solid rgba(255,255,255,0.05);
    }
    .form-head::before {
        content: '';
        position: absolute;
        right: 80px;
        bottom: -40px;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 30px solid rgba(255,255,255,0.04);
    }
    .form-head-title {
        font-family: 'DM Serif Display', serif;
        font-size: 1.65rem;
        color: #ffffff;
        letter-spacing: -0.01em;
        margin: 0 0 6px;
    }
    .form-head-sub {
        font-size: 13.5px;
        color: rgba(255,255,255,0.7);
        margin: 0;
        font-weight: 400;
    }
    .form-head-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.13);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 2px;
        padding: 4px 12px;
        font-size: 11.5px;
        color: rgba(255,255,255,0.85);
        margin-bottom: 14px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        font-weight: 500;
    }
    .form-head-badge::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #6fcf8f;
    }

    /* Section dividers */
    .form-section {
        padding: 2rem 3rem;
        border-bottom: 1px solid var(--lznk-border);
    }
    .form-section:last-of-type { border-bottom: none; }

    .section-label {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1.35rem;
    }
    .section-label-num {
        width: 26px;
        height: 26px;
        background: var(--lznk-green);
        color: #fff;
        border-radius: 2px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        flex-shrink: 0;
    }
    .section-label-text {
        font-size: 14px;
        font-weight: 600;
        color: var(--lznk-text);
        letter-spacing: 0.01em;
    }
    .section-label-text span {
        display: block;
        font-size: 12px;
        font-weight: 400;
        color: var(--lznk-text-muted);
        letter-spacing: 0;
        margin-top: 1px;
    }

    /* Grid */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem 1.rem;
    }
    .col-full { grid-column: 1 / -1; }

    /* Fields */
    .field-wrap label {
        display: block;
        font-size: 12.5px;
        font-weight: 500;
        color: var(--lznk-text-muted);
        margin-bottom: 6px;
        letter-spacing: 0.01em;
        text-transform: uppercase;
    }
    .field-wrap label .req {
        color: var(--lznk-danger);
        margin-left: 2px;
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
        color: var(--lznk-text);
        background: #f9faf9;
        border: 1.5px solid var(--lznk-border);
        border-radius: 3px;
        outline: none;
        transition: border-color 0.15s, background 0.15s;
        box-sizing: border-box;
    }
    .field-wrap input:focus,
    .field-wrap textarea:focus,
    .field-wrap select:focus {
        border-color: var(--lznk-input-focus);
        background: var(--lznk-white);
        box-shadow: 0 0 0 3px rgba(26,92,42,0.08);
    }
    .field-wrap textarea { resize: vertical; }
    .field-wrap select { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%235a6860' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 13px center; padding-right: 36px; }

    /* Upload section */
    .upload-section {
        background: var(--lznk-surface);
        padding: 1.75rem 2.25rem;
        border-top: 1px solid var(--lznk-border);
        border-bottom: 1px solid var(--lznk-border);
    }
    .upload-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 1.25rem;
    }
    .upload-card {
        background: var(--lznk-white);
        border: 1.5px solid var(--lznk-border);
        border-radius: 3px;
        padding: 1rem 1.15rem;
        transition: border-color 0.15s;
    }
    .upload-card:hover { border-color: var(--lznk-green-mid); }
    .upload-card label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: var(--lznk-text-muted);
        letter-spacing: 0.03em;
        text-transform: uppercase;
        margin-bottom: 10px;
    }
    .upload-card label .req { color: var(--lznk-danger); }
    .upload-card input[type="file"] {
        display: block;
        width: 100%;
        font-size: 13px;
        color: var(--lznk-text);
        font-family: 'DM Sans', sans-serif;
    }
    .upload-card input[type="file"]::file-selector-button {
        font-family: 'DM Sans', sans-serif;
        font-size: 12.5px;
        font-weight: 500;
        padding: 6px 14px;
        background: var(--lznk-green);
        color: #fff;
        border: none;
        border-radius: 2px;
        cursor: pointer;
        margin-right: 10px;
        transition: background 0.15s;
    }
    .upload-card input[type="file"]::file-selector-button:hover {
        background: var(--lznk-green-mid);
    }
    .upload-note {
        font-size: 11.5px;
        color: var(--lznk-text-muted);
        margin-top: 7px;
    }

    /* Inline dynamic field */
    .dynamic-field-box {
        background: var(--lznk-green-light);
        border: 1.5px solid var(--lznk-green-border);
        border-radius: 3px;
        padding: 1rem 1.15rem;
        margin-top: 1rem;
        display: none;
    }
    .dynamic-field-box .field-wrap label {
        color: var(--lznk-green);
    }

    /* Footer action bar */
    .form-footer {
        padding: 1.25rem 2rem;
        background: var(--lznk-white);
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        border-top: 1px solid var(--lznk-border);
    }
    .btn-preview {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--lznk-green);
        color: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        font-weight: 500;
        padding: 10px 24px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        letter-spacing: 0.01em;
        transition: background 0.15s;
    }
    .btn-preview:hover { background: var(--lznk-green-mid); }
    .btn-preview svg { width: 16px; height: 16px; }

    /* Mandatory note */
    .mandatory-note {
        font-size: 12px;
        color: var(--lznk-text-muted);
    }
    .mandatory-note span { color: var(--lznk-danger); }

    /* ---- REVIEW SECTION ---- */
    #reviewSection {
        max-width: 1100px;
        margin: 0 auto;
        background: var(--lznk-white);
        border: 1px solid var(--lznk-border);
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(26,92,42,0.08);
    }
    .review-head {
        background: var(--lznk-green-light);
        border-bottom: 1px solid var(--lznk-green-border);
        padding: 1.25rem 2.25rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .review-head-icon {
        width: 34px; height: 34px;
        background: var(--lznk-green);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        font-size: 16px;
        flex-shrink: 0;
    }
    .review-head h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.25rem;
        color: var(--lznk-green);
        margin: 0 0 2px;
    }
    .review-head p { font-size: 13px; color: var(--lznk-text-muted); margin: 0; }

    #reviewContent .review-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 12px 0;
        border-bottom: 1px solid #f0f2f0;
        gap: 1rem;
    }
    #reviewContent .review-row:last-child { border-bottom: none; }
    #reviewContent .review-key {
        font-size: 12.5px;
        font-weight: 500;
        color: var(--lznk-text-muted);
        text-transform: uppercase;
        letter-spacing: 0.02em;
        min-width: 180px;
    }
    #reviewContent .review-val {
        font-size: 14px;
        color: var(--lznk-text);
        text-align: right;
        flex: 1;
    }

    .review-body { padding: 1.5rem 2.25rem; }
    .review-footer {
        padding: 1.25rem 2.25rem;
        border-top: 1px solid var(--lznk-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: var(--lznk-surface);
    }
    .btn-back {
        display: inline-flex; align-items: center; gap: 7px;
        background: transparent;
        color: var(--lznk-text-muted);
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        font-weight: 500;
        padding: 9px 18px;
        border: 1.5px solid var(--lznk-border);
        border-radius: 3px;
        cursor: pointer;
        transition: border-color 0.15s, color 0.15s;
    }
    .btn-back:hover { border-color: #999; color: var(--lznk-text); }
    .btn-submit {
        display: inline-flex; align-items: center; gap: 8px;
        background: var(--lznk-green);
        color: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        font-weight: 500;
        padding: 10px 28px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: background 0.15s;
    }
    .btn-submit:hover { background: var(--lznk-green-mid); }

    @media (max-width: 640px) {
        .form-grid, .upload-grid { grid-template-columns: 1fr; }
        .col-full { grid-column: 1; }
        .form-section, .upload-section, .form-footer, .review-body, .review-footer { padding-left: 1.25rem; padding-right: 1.25rem; }
        .form-head { padding: 1.35rem 1.25rem; }
    }
</style>

<div class="lznk-page">

    <!-- Breadcrumb -->
    <div class="page-header-strip">
        <div class="breadcrumb-line">
            <span>Dashboard</span>
            <span class="sep">›</span>
            <span>Permohonan</span>
            <span class="sep">›</span>
            <span class="current">Borang Permohonan Data</span>
        </div>
    </div>

    <!-- ======== FORM CONTAINER ======== -->
    <div id="formContainer" class="form-shell">

        <!-- Header -->
        <div class="form-head">
            <div class="form-head-badge">Permohonan Rasmi</div>
            <h1 class="form-head-title">Borang Permohonan Data</h1>
            <p class="form-head-sub">Sila lengkapkan semua maklumat yang diperlukan. Permohonan yang tidak lengkap tidak akan diproses.</p>
        </div>

        <form id="permohonanForm" action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Section 1: Maklumat Pemohon -->
            <div class="form-section">
                <div class="section-label">
                    <div class="section-label-num">1</div>
                    <div class="section-label-text">
                        Maklumat Pemohon
                        <span>Butiran peribadi atau organisasi pemohon</span>
                    </div>
                </div>

                <div class="form-grid">

                    <div class="field-wrap">
                        <label>Nama Penuh Pemohon <span class="req">*</span></label>
                        <input type="text" name="nama" required placeholder="Nama penuh seperti dalam MyKad">&nbsp;
                    </div>

                    <div class="field-wrap">
                        <label>No. Telefon <span class="req">*</span></label>
                        <input type="text" name="telefon" required placeholder="cth: 01X-XXXXXXX">
                    </div>

                    <div class="field-wrap">
                        <label>Alamat E-mel Rasmi <span class="req">*</span></label>
                        <input type="email" name="email" required placeholder="nama@domain.com">
                    </div>

                    <div class="field-wrap">
                        <label>Alamat Surat Menyurat <span class="req">*</span></label>
                        <textarea name="alamat" required rows="3" placeholder="No. rumah, jalan, taman..."></textarea>
                    </div>

                    <div class="field-wrap">
                        <label>Poskod <span class="req">*</span></label>
                        <input type="text" name="poskod" required placeholder="cth: 05000">
                    </div>

                    <div class="field-wrap">
                        <label>Negeri <span class="req">*</span></label>
                        <select name="negeri" required>
                            <option value="">-- Sila Pilih Negeri --</option>
                            <option>Kedah</option>
                            <option>Perlis</option>
                            <option>Pulau Pinang</option>
                            <option>Perak</option>
                            <option>Selangor</option>
                            <option>Wilayah Persekutuan</option>
                            <option>Melaka</option>
                            <option>Johor</option>
                            <option>Kelantan</option>
                            <option>Terengganu</option>
                            <option>Pahang</option>
                            <option>Sabah</option>
                            <option>Sarawak</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Section 2: Kategori & Tujuan -->
            <div class="form-section">
                <div class="section-label">
                    <div class="section-label-num">2</div>
                    <div class="section-label-text">
                        Kategori & Tujuan Permohonan
                        <span>Pilih kategori yang bersesuaian dan nyatakan tujuan dengan jelas</span>
                    </div>
                </div>

                <div class="form-grid">

                    <div class="field-wrap">
                        <label>Kategori Permohonan <span class="req">*</span></label>
                        <select name="jenis" id="jenis" required>
                            <option value="">-- Sila Pilih Kategori --</option>
                            <option value="Individu">Individu</option>
                            <option value="Syarikat">Syarikat</option>
                            <option value="Pertubuhan">Pertubuhan</option>
                            <option value="Agensi">Agensi</option>
                        </select>
                    </div>

                    <div class="field-wrap col-full">
                        <label>Tujuan Permohonan <span class="req">*</span></label>
                        <textarea name="tujuan" required rows="3" placeholder="Nyatakan dengan jelas tujuan data ini diperlukan..."></textarea>
                    </div>

                </div>

                <!-- Dynamic: Individu -->
                <div id="extraFieldContainer" style="display:none; margin-top: 1rem;">

                    <div id="individuField" class="dynamic-field-box" style="display:none;">
                        <div class="field-wrap">
                            <label>No. Kad Pengenalan <span class="req">*</span></label>
                            <input type="text" name="no_ic" id="no_ic" placeholder="XXXXXX-XX-XXXX">
                        </div>
                    </div>

                    <div id="orgField" class="dynamic-field-box" style="display:none;">
                        <div class="form-grid">
                            <div class="field-wrap">
                                <label>Nama <span id="labelNama"></span> <span class="req">*</span></label>
                                <input type="text" name="nama_organisasi" id="nama_organisasi" placeholder="Nama rasmi">
                            </div>
                            <div class="field-wrap">
                                <label>No. Pendaftaran <span id="labelNo"></span> <span class="req">*</span></label>
                                <input type="text" name="no_pendaftaran" id="no_pendaftaran" placeholder="No. pendaftaran rasmi">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Section 3: Dokumen -->
            <div class="upload-section">
                <div class="section-label">
                    <div class="section-label-num">3</div>
                    <div class="section-label-text">
                        Muat Naik Dokumen
                        <span>Salinan dokumen mesti disahkan dan jelas. Format: PDF, JPG, PNG (maks. 5MB)</span>
                    </div>
                </div>

                <div class="upload-grid">

                    <div class="upload-card">
                        <label>Surat Permohonan Rasmi <span class="req">*</span></label>
                        <input type="file" name="surat" required accept=".pdf,.jpg,.png">
                        <p class="upload-note">Surat hendaklah berkop rasmi &amp; bertandatangan</p>
                    </div>

                    <div id="ssmField" class="upload-card" style="display:none;">
                        <label>Salinan Sijil SSM <span class="req">*</span></label>
                        <input type="file" name="ssm" id="ssmInput" accept=".pdf,.jpg,.png">
                        <p class="upload-note">Sijil Suruhanjaya Syarikat Malaysia</p>
                    </div>

                    <div id="icField" class="upload-card" style="display:none;">
                        <label>Salinan Kad Pengenalan <span class="req">*</span></label>
                        <input type="file" name="ic" id="icInput" accept=".pdf,.jpg,.png">
                        <p class="upload-note">Salinan depan &amp; belakang MyKad</p>
                    </div>

                    <div id="rosField" class="upload-card" style="display:none;">
                        <label>Salinan Sijil ROS <span class="req">*</span></label>
                        <input type="file" name="ros" id="rosInput" accept=".pdf,.jpg,.png">
                        <p class="upload-note">Sijil Pendaftaran Pertubuhan (ROS)</p>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <div class="form-footer">
                <span class="mandatory-note"><span>*</span> Medan bertanda wajib diisi</span>
                <button type="button" onclick="previewData()" class="btn-preview">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    Semak Permohonan
                </button>
            </div>

        </form>
    </div>

    <!-- ======== REVIEW SECTION ======== -->
    <div id="reviewSection" style="display:none;">

        <div class="review-head">
            <div class="review-head-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
            </div>
            <div>
                <h2>Semakan Permohonan</h2>
                <p>Sila semak semua maklumat sebelum menghantar permohonan.</p>
            </div>
        </div>

        <div class="review-body">
            <div id="reviewContent"></div>
        </div>

        <div class="review-footer">
            <button onclick="backToForm()" class="btn-back">
                ← Kembali &amp; Pinda
            </button>
            <button onclick="submitPermohonan()" class="btn-submit">
                ✔ Hantar Permohonan
            </button>
        </div>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const jenis = document.getElementById('jenis');
    const ssmField = document.getElementById('ssmField');
    const icField = document.getElementById('icField');
    const rosField = document.getElementById('rosField');
    const ssmInput = document.getElementById('ssmInput');
    const icInput = document.getElementById('icInput');
    const rosInput = document.getElementById('rosInput');

    function setVisibility(container, input, isVisible) {
        container.style.display = isVisible ? 'block' : 'none';
        if (isVisible) {
            input.setAttribute('required', 'required');
        } else {
            input.removeAttribute('required');
            input.value = '';
        }
    }

    function toggleFields() {
        const val = jenis.value;
        const extraContainer = document.getElementById('extraFieldContainer');
        const individuField = document.getElementById('individuField');
        const orgField = document.getElementById('orgField');
        const noIC = document.getElementById('no_ic');
        const namaOrg = document.getElementById('nama_organisasi');
        const noDaftar = document.getElementById('no_pendaftaran');
        const labelNama = document.getElementById('labelNama');
        const labelNo = document.getElementById('labelNo');

        setVisibility(ssmField, ssmInput, false);
        setVisibility(icField, icInput, false);
        setVisibility(rosField, rosInput, false);

        if (val === 'Syarikat') setVisibility(ssmField, ssmInput, true);
        else if (val === 'Individu') setVisibility(icField, icInput, true);
        else if (val === 'Pertubuhan') setVisibility(rosField, rosInput, true);

        extraContainer.style.display = 'none';
        individuField.style.display = 'none';
        orgField.style.display = 'none';

        noIC?.removeAttribute('required');
        namaOrg?.removeAttribute('required');
        noDaftar?.removeAttribute('required');

        if (val === 'Individu') {
            extraContainer.style.display = 'block';
            individuField.style.display = 'block';
            noIC.setAttribute('required', 'required');
        } else if (val === 'Syarikat' || val === 'Pertubuhan' || val === 'Agensi') {
            extraContainer.style.display = 'block';
            orgField.style.display = 'block';
            namaOrg.setAttribute('required', 'required');
            noDaftar.setAttribute('required', 'required');
            labelNama.innerText = val;
            labelNo.innerText = val;
        }
    }

    jenis.addEventListener('change', toggleFields);
    toggleFields();

    // IC format
    const icInputEl = document.getElementById('no_ic');
    icInputEl?.addEventListener('input', function () {
        let value = this.value.replace(/\D/g, '');
        if (value.length > 6 && value.length <= 8) {
            value = value.replace(/(\d{6})(\d+)/, '$1-$2');
        } else if (value.length > 8) {
            value = value.replace(/(\d{6})(\d{2})(\d+)/, '$1-$2-$3');
        }
        this.value = value;
    });

    // Org name uppercase
    const namaOrgInput = document.getElementById('nama_organisasi');
    namaOrgInput?.addEventListener('input', function () {
        this.value = this.value.toUpperCase();
    });
});

function previewData() {
    const form = document.getElementById('permohonanForm');
    const reviewSection = document.getElementById('reviewSection');
    const reviewContent = document.getElementById('reviewContent');
    const formContainer = document.getElementById('formContainer');
    const formData = new FormData(form);
    const jenis = formData.get('jenis');

    const labels = {
        nama: "Nama Pemohon",
        telefon: "No. Telefon",
        email: "E-mel Rasmi",
        alamat: "Alamat",
        poskod: "Poskod",
        negeri: "Negeri",
        jenis: "Kategori",
        tujuan: "Tujuan Permohonan",
        surat: "Surat Permohonan",
        ssm: "Sijil SSM",
        ic: "Kad Pengenalan",
        ros: "Sijil ROS",
        no_ic: "No. Kad Pengenalan",
        nama_organisasi: "Nama",
        no_pendaftaran: "No. Pendaftaran"
    };

    reviewContent.innerHTML = '';

    for (let [key, value] of formData.entries()) {
        if (key === '_token') continue;
        if (jenis === 'Individu' && (key === 'nama_organisasi' || key === 'no_pendaftaran')) continue;
        if ((jenis === 'Syarikat' || jenis === 'Pertubuhan' || jenis === 'Agensi') && key === 'no_ic') continue;

        let label = labels[key] || key;
        if (key === 'nama_organisasi') label = "Nama " + jenis;
        if (key === 'no_pendaftaran') label = "No. Pendaftaran " + jenis;

        if (value instanceof File) {
            if (!value.name) continue;
            reviewContent.innerHTML += `<div class="review-row"><span class="review-key">${label}</span><span class="review-val">${value.name}</span></div>`;
        } else {
            if (!value) continue;
            reviewContent.innerHTML += `<div class="review-row"><span class="review-key">${label}</span><span class="review-val">${value}</span></div>`;
        }
    }

    formContainer.style.display = 'none';
    reviewSection.style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function backToForm() {
    document.getElementById('formContainer').style.display = 'block';
    document.getElementById('reviewSection').style.display = 'none';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function submitPermohonan() {
    Swal.fire({
        title: 'Hantar Permohonan?',
        text: "Pastikan semua maklumat telah lengkap dan tepat.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#1a5c2a',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hantar',
        cancelButtonText: 'Semak Semula'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Berjaya!',
                text: 'Permohonan berjaya dihantar.',
                icon: 'success',
                timer: 1800,
                showConfirmButton: false
            });
            setTimeout(() => {
                document.getElementById('permohonanForm').submit();
            }, 1800);
        }
    });
}
</script>

</x-layouts.app>