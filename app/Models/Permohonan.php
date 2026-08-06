<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'telefon',
        'email',
        'alamat',
        'poskod',
        'negeri',
        'jenis',
        'tujuan',
        'surat',
        'ssm',
        'ic',
        'ros',

        'agreement_file',
        'agreement_pdf',
        'agreement_signed',
        'stamp_duty_file',
        'data_file',
        'nama_wakil',
        'ic_wakil',
        'jawatan_wakil',
        
        // 🔥 NEW
        'no_ic',
        'nama_organisasi',
        'no_pendaftaran',
    ];
}