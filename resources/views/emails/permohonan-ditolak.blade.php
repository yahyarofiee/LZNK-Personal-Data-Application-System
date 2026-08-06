<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Permohonan Dikembalikan</title>
</head>
<body style="font-family: Arial; background:#f5f5f5; padding:30px;">

<div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:10px;">

    <h2 style="color:#dc2626;">
        Permohonan Anda Dikembalikan
    </h2>

    <p>
        Salam sejahtera {{ $data->nama }},
    </p>

    <div style="background:#dc2626;
                color:white;
                padding:15px;
                border-radius:8px;
                margin-bottom:20px;
                font-weight:bold;
                text-align:center;">
        ⚠️ TINDAKAN DIPERLUKAN:
        Permohonan anda perlu dikemaskini semula.
    </div>

    <h4>Sebab Penolakan:</h4>

    <div style="background:#fef2f2; padding:15px; border-radius:8px;">
        {{ $data->catatan }}
    </div>

    <br>

    <h4>Dokumen perlu dikemaskini:</h4>

    @php
        $dokumen = json_decode($data->catatan_dokumen, true);
    @endphp

    <ul>
        @if($dokumen['surat'])
            <li>Surat Permohonan</li>
        @endif

        @if($dokumen['ic'])
            <li>Salinan IC</li>
        @endif

        @if($dokumen['ssm'])
            <li>Dokumen SSM</li>
        @endif

        @if($dokumen['ros'])
            <li>Dokumen ROS</li>
        @endif
    </ul>

    <br><br>

    <a href="{{ url('/login') }}"
       style="background:#16a34a;
              color:white;
              padding:12px 20px;
              text-decoration:none;
              border-radius:8px;">
        Kemaskini Permohonan
    </a>

    <p style="margin-top:30px;">
        Terima kasih,<br>
        Sistem Mohon Data LZNK
    </p>

</div>

</body>
</html>