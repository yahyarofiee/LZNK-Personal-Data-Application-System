<?php

use Illuminate\Support\Facades\Route;
use App\Models\Permohonan;

Route::get('/permohonan/{id}', function ($id) {
    $p = Permohonan::findOrFail($id);

    return response()->json([
        'id' => $p->id,
        'nama' => $p->nama,
        'email' => $p->email,
        'telefon' => $p->telefon,
        'alamat' => $p->alamat,
        'jenis' => $p->jenis,
        'tujuan' => $p->tujuan,
        'status' => $p->status,
        'poskod' => $p->poskod,
        'negeri' => $p->negeri,

        'surat' => $p->surat,
        'ic' => $p->ic,
        'ssm' => $p->ssm,
        'ros' => $p->ros,

        'created_at' => $p->created_at,
     
    ]);
});