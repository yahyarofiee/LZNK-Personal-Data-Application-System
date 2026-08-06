<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Cetakan Permohonan — LZNK</title>
    <script>
        window.onload = function () {
            window.print();
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Serif+Display&display=swap');

        :root {
            --green:       #1a5c2a;
            --green-light: #e8f4ec;
            --green-rule:  #2d7a40;
            --gold:        #c9a84c;
            --text:        #1a1f1b;
            --muted:       #5a6860;
            --border:      #d4d9d5;
            --surface:     #f5f6f4;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', Arial, sans-serif;
            background: #e8ebe6;
            color: var(--text);
            padding: 30px 20px 50px;
        }

        /* ── Outer page shell ── */
        .page {
            max-width: 820px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid var(--border);
            box-shadow: 0 4px 24px rgba(0,0,0,0.12);
        }

        /* ── Green accent bar top ── */
        .page-accent-bar {
            height: 6px;
            background: linear-gradient(to right, var(--green), var(--green-rule));
        }

        /* ── Letterhead ── */
        .letterhead {
            padding: 28px 40px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1.5px solid var(--border);
            gap: 16px;
        }
        .letterhead-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .letterhead-logo {
            height: 56px;
            width: auto;
            object-fit: contain;
        }
        .letterhead-divider {
            width: 1px;
            height: 44px;
            background: var(--border);
        }
        .letterhead-org {
            line-height: 1.4;
        }
        .letterhead-org-name {
            font-family: 'DM Serif Display', serif;
            font-size: 15px;
            color: var(--green);
            letter-spacing: 0.01em;
        }
        .letterhead-org-sub {
            font-size: 11px;
            color: var(--muted);
            margin-top: 3px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .letterhead-right {
            text-align: right;
        }
        .letterhead-doc-label {
            font-size: 10.5px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 4px;
        }
        .letterhead-doc-title {
            font-family: 'DM Serif Display', serif;
            font-size: 17px;
            color: var(--text);
            letter-spacing: -0.01em;
        }

        /* ── Meta strip ── */
        .meta-strip {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 10px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .meta-label {
            font-size: 10.5px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .meta-value {
            font-size: 12.5px;
            font-weight: 500;
            color: var(--text);
        }
        .meta-divider {
            width: 1px;
            height: 18px;
            background: var(--border);
        }
        .meta-rujukan {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--green);
            color: #fff;
            font-size: 11.5px;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 2px;
            letter-spacing: 0.04em;
        }

        /* ── Body ── */
        .doc-body {
            padding: 28px 40px 36px;
        }

        /* ── Section header ── */
        .section-head {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }
        .section-head-bar {
            width: 3px;
            height: 18px;
            background: var(--green);
            border-radius: 2px;
            flex-shrink: 0;
        }
        .section-head-title {
            font-size: 11px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .section-head-rule {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* ── Data table ── */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
        }
        .data-table tr {
            border-bottom: 1px solid #eef0ec;
        }
        .data-table tr:last-child {
            border-bottom: none;
        }
        .data-table td {
            padding: 11px 14px;
            vertical-align: top;
        }
        .data-table td:first-child {
            width: 36%;
            font-size: 11px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            background: var(--surface);
            border-right: 1px solid var(--border);
            padding-top: 13px;
        }
        .data-table td:last-child {
            color: var(--text);
            font-size: 13.5px;
            font-weight: 400;
        }
        .data-table tr:first-child td:first-child { border-top-left-radius: 0; }

        /* Status inline badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 2px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-badge::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
        }
        .status-proses  { background: #fef3c7; color: #92400e; }
        .status-proses::before  { background: #d97706; }
        .status-lulus   { background: #dcfce7; color: #14532d; }
        .status-lulus::before   { background: #16a34a; }
        .status-tolak   { background: #fee2e2; color: #7f1d1d; }
        .status-tolak::before   { background: #dc2626; }

        /* ── Watermark band ── */
        .watermark-band {
            margin: 22px 0;
            border-top: 1px dashed var(--border);
            border-bottom: 1px dashed var(--border);
            padding: 8px 0;
            text-align: center;
            font-size: 10.5px;
            font-weight: 500;
            color: var(--muted);
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        /* ── Signature section ── */
        .sig-section {
            margin-top: 6px;
        }
        .sig-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 12px;
        }
        .sig-box {
            padding: 60px 0 0;
            border-top: 1.5px solid var(--text);
            text-align: center;
        }
        .sig-box-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .sig-box-sub {
            font-size: 11px;
            color: var(--muted);
            margin-top: 4px;
        }

        /* ── Footer ── */
        .doc-footer {
            padding: 14px 40px;
            border-top: 1px solid var(--border);
            background: var(--surface);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        .footer-lznk {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .footer-lznk-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--green);
        }
        .footer-lznk-text {
            font-size: 10.5px;
            color: var(--muted);
            letter-spacing: 0.03em;
        }
        .footer-note {
            font-size: 10.5px;
            color: #aab5ac;
            font-style: italic;
        }

        /* ── Print styles ── */
        @media print {
            body {
                background: #fff;
                padding: 0;
            }
            .page {
                border: none;
                box-shadow: none;
                max-width: 100%;
            }
            .page-accent-bar {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .data-table td:first-child,
            .meta-strip,
            .status-badge,
            .doc-footer {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- Top accent bar -->
    <div class="page-accent-bar"></div>

    <!-- Letterhead -->
    <div class="letterhead">
        <div class="letterhead-left">
            <img src="{{ asset('images/lznk-logo.png') }}" alt="LZNK" class="letterhead-logo">
            <div class="letterhead-divider"></div>
            <div class="letterhead-org">
                <div class="letterhead-org-name">Lembaga Zakat Negeri Kedah</div>
                <div class="letterhead-org-sub">Sistem Permohonan Data Rasmi</div>
            </div>
        </div>
        <div class="letterhead-right">
            <div class="letterhead-doc-label">Dokumen Rasmi</div>
            <div class="letterhead-doc-title">Borang Permohonan Data</div>
        </div>
    </div>

    <!-- Meta strip -->
    <div class="meta-strip">
        <div class="meta-item">
            <span class="meta-label">Tarikh Cetakan</span>
            <span class="meta-value">{{ now()->format('d/m/Y') }} &nbsp; {{ now()->format('h:i A') }}</span>
        </div>
        <div class="meta-divider"></div>
        <div class="meta-item">
            <span class="meta-label">Tarikh Permohonan</span>
            <span class="meta-value">{{ $permohonan->created_at->format('d/m/Y') }} &nbsp; {{ $permohonan->created_at->format('h:i A') }}</span>
        </div>
        <div class="meta-divider"></div>
        <div class="meta-item">
            <span class="meta-label">No. Rujukan</span>
            <span class="meta-rujukan">LZNK/{{ str_pad($permohonan->id, 5, '0', STR_PAD_LEFT) }}</span>
        </div>
    </div>

    <!-- Body -->
    <div class="doc-body">

        <!-- Section: Maklumat Pemohon -->
        <div class="section-head">
            <div class="section-head-bar"></div>
            <div class="section-head-title">Maklumat Pemohon</div>
            <div class="section-head-rule"></div>
        </div>

        @php
            $isOrg = in_array($permohonan->jenis, ['Syarikat', 'Pertubuhan', 'Agensi']);
        @endphp

        <table class="data-table" style="border: 1px solid var(--border); margin-bottom: 22px;">
            <tr>
                <td>Nama Pemohon</td>
                <td>{{ $permohonan->nama }}</td>
            </tr>
            @if($isOrg && $permohonan->nama_organisasi)
            <tr>
                <td>Nama {{ $permohonan->jenis }}</td>
                <td>{{ $permohonan->nama_organisasi }}</td>
            </tr>
            @endif
            @if($isOrg && $permohonan->no_pendaftaran)
            <tr>
                <td>No. Pendaftaran {{ $permohonan->jenis }}</td>
                <td>{{ $permohonan->no_pendaftaran }}</td>
            </tr>
            @endif
            @if($permohonan->alamat)
            <tr>
                <td>Alamat Surat Menyurat</td>
                <td>{{ $permohonan->alamat }},
                    @if($permohonan->poskod) {{ $permohonan->poskod }}@endif
                    @if($permohonan->negeri) {{ $permohonan->negeri }},@endif
                    Malaysia.</td>
            </tr>
            @endif
            <tr>
                <td>No. Telefon</td>
                <td>{{ $permohonan->telefon }}</td>
            </tr>
            <tr>
                <td>Alamat E-mel</td>
                <td>{{ $permohonan->email }}</td>
            </tr>
            <tr>
                <td>Tujuan Permohonan</td>
                <td>{{ $permohonan->tujuan }}</td>
            </tr>
        </table>

        <!-- Dashed watermark band -->
        <div class="watermark-band">— Ruangan Tandatangan Rasmi —</div>

        <!-- Signature section -->
        <div class="sig-section">
            <div class="sig-grid">
                <div class="sig-box"><br><br><br>
                    <div class="sig-box-label">Tandatangan Pemohon</div>
                    <div class="sig-box-sub">{{ $permohonan->nama }}</div><br>
                    <div class="sig-box-sub">Tarikh: ___________________</div>
                </div>
                <div class="sig-box"><br><br><br>
                    <div class="sig-box-label">Pengesahan LZNK</div>
                    <div class="sig-box-sub">Pegawai Bertanggungjawab</div><br>
                    <div class="sig-box-sub">Tarikh: ___________________</div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="doc-footer">
        <div class="footer-lznk">
            <div class="footer-lznk-dot"></div>
            <div class="footer-lznk-text">Lembaga Zakat Negeri Kedah (LZNK) &nbsp;·&nbsp; Sistem Permohonan Data Rasmi</div>
        </div>
        <div class="footer-note">Dokumen ini dijana secara automatik. Sah tanpa tandatangan jika diluluskan oleh sistem.</div>
    </div>

</div>

</body>
</html>