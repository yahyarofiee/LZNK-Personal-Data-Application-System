<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Permohonan Diluluskan</title>
</head>

<body style="font-family: Arial; background:#f5f5f5; padding:30px;">

<div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:10px;">

    <div style="background:#16a34a;
                color:white;
                padding:15px;
                border-radius:8px;
                margin-bottom:20px;
                font-weight:bold;
                text-align:center;">
        ✅ PERMOHONAN DILULUSKAN
    </div>

    <h2 style="color:#16a34a;">
        Tahniah!
    </h2>

    <p>
        Salam sejahtera {{ $data->nama }},
    </p>

    <p>
        Permohonan data anda telah berjaya diluluskan oleh pihak DPO. Sila login sistem untuk 
        melihat maklumat lanjut dan memuat turun data dan dokumen yang diperlukan.
    </p>

    <br>

    <a href="{{ url('/login') }}"
       style="background:#16a34a;
              color:white;
              padding:12px 20px;
              text-decoration:none;
              border-radius:8px;">
        Login Sistem
    </a>

    <p style="margin-top:30px;">
        Terima kasih,<br>
        Sistem Mohon Data LZNK
    </p>

</div>

</body>
</html>