<?php

use App\Models\Permohonan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\DPOAuthController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');

});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    |*/

    Route::get('/dashboard', function () {

        $user = auth()->user();

        if ($user->role == 'pemohon') {
            return view('pemohon.dashboard');
        }

        if ($user->role == 'dpo') {

            $pending = Permohonan::where('status', 'Dalam Proses')->count();

            return view('dpo.dashboard', compact('pending'));
        }

        if ($user->role == 'timbalan') {
            return view('timbalan.dashboard');
        }

        abort(403);

    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PEMOHON
    |--------------------------------------------------------------------------
    */

    // Borang Permohonan
    Route::get('/permohonan', [PermohonanController::class, 'create'])
        ->name('permohonan');

    Route::post('/permohonan', [PermohonanController::class, 'store'])
        ->name('permohonan.store');

    // Rekod Permohonan
    Route::get('/rekod-permohonan', function () {

        $permohonan = Permohonan::where('user_id', auth()->id())
                        ->latest()
                        ->get();

        return view('pemohon.rekod', compact('permohonan'));

    })->name('permohonan.index');

    // Edit Permohonan (Ditambah saringan id angka sahaja)
    Route::get('/permohonan/{id}/edit', [PermohonanController::class, 'edit'])
        ->name('permohonan.edit')
        ->whereNumber('id');

    Route::put('/permohonan/{id}', [PermohonanController::class, 'update'])
        ->name('permohonan.update')
        ->whereNumber('id');

    // Delete Permohonan (Ditambah saringan id angka sahaja)
    Route::delete('/permohonan/{id}', function ($id) {

        $permohonan = Permohonan::where('user_id', auth()->id())
                        ->findOrFail($id);

        $permohonan->delete();

        return redirect()->back();

    })->name('permohonan.delete')->whereNumber('id');

    // Print Permohonan (Ditambah saringan id angka sahaja)
    Route::get('/permohonan/{id}/print', [PermohonanController::class, 'print'])
        ->name('permohonan.print')
        ->whereNumber('id');

    /*
    |--------------------------------------------------------------------------
    | DPO PAGES
    |--------------------------------------------------------------------------
    */

    Route::get('/dpo/permohonan', fn() => view('dpo.semua-permohonan'))
        ->name('dpo.permohonan');

    Route::get('/dpo/dalam-proses', fn() => view('dpo.dalam-proses'))
        ->name('dpo.dalam.proses');

    Route::get('/dpo/diluluskan', fn() => view('dpo.diluluskan'))
        ->name('dpo.diluluskan');

    Route::get('/dpo/ditolak', fn() => view('dpo.ditolak'))
        ->name('dpo.ditolak');

    Route::get('/dpo/agreement/{id}',[App\Http\Controllers\PermohonanController::class, 'generateAgreement']
        )->name('dpo.agreement.generate');

    Route::get('/dpo/agreement/pdf/{id}', [PermohonanController::class, 'previewAgreementPdf'])
        ->name('dpo.agreement.preview.pdf');

    Route::post('/dpo/agreement/upload/{id}', [PermohonanController::class, 'uploadAgreementSigned'])
        ->name('dpo.agreement.upload');

    Route::delete('/dpo/agreement/{id}', [PermohonanController::class, 'deleteAgreement'])
        ->name('dpo.agreement.delete');

    Route::post('/stamp-duty/upload/{id}', [PermohonanController::class, 'uploadStampDuty'])
    ->name('stamp-duty.upload');

    Route::delete('/stamp-duty/delete/{id}', function ($id) {

    $permohonan = \App\Models\Permohonan::findOrFail($id);

    if ($permohonan->stamp_duty_file) {

        if (\Storage::exists($permohonan->stamp_duty_file)) {
            \Storage::delete($permohonan->stamp_duty_file);
        }

        $permohonan->update([
            'stamp_duty_file' => null
        ]);
    }

    return response()->json([
        'success' => true
        ]);
    });

    Route::post('/dpo/data/upload/{id}', [PermohonanController::class, 'uploadData'])
        ->name('dpo.data.upload');

    Route::delete('/dpo/data/{id}/{index}', [PermohonanController::class, 'deleteDataFile'])
        ->name('dpo.data.delete');

    Route::get('/data/download/{id}/{index}', [PermohonanController::class, 'downloadDataFile'])
    ->name('data.download');

    /*
    |--------------------------------------------------------------------------
    | TIMBALAN PAGES
    |--------------------------------------------------------------------------
    */

    Route::get('/timbalan/permohonan', fn() => view('timbalan.semua-permohonan'))
        ->name('timbalan.permohonan');

    Route::get('/timbalan/menunggu-kelulusan', fn() => view('timbalan.menunggu-kelulusan'))
        ->name('timbalan.menunggu.kelulusan.timbalan');

    Route::get('/timbalan/diluluskan', fn() => view('timbalan.diluluskan'))
        ->name('timbalan.diluluskan');

    Route::get('/timbalan/ditolak', fn() => view('timbalan.ditolak'))
        ->name('timbalan.ditolak');

    /*
    |--------------------------------------------------------------------------
    | DPO ACTION
    |--------------------------------------------------------------------------
    */

    // Ditambah saringan id angka sahaja untuk mengelakkan pertembungan dengan URL nama fail

    Route::put('/permohonan/{id}/tolak', [PermohonanController::class, 'tolak'])
        ->name('permohonan.tolak')
        ->whereNumber('id');

    Route::put('/permohonan/{id}/hantar-timbalan', [PermohonanController::class, 'hantarTimbalan'])
        ->name('permohonan.hantar.timbalan')
        ->whereNumber('id');

    Route::put('/permohonan/{id}/lulus-timbalan', [PermohonanController::class, 'lulusTimbalan'])
        ->name('permohonan.lulus.timbalan')
        ->whereNumber('id');

    Route::put('/permohonan/{id}/tolak-timbalan', [PermohonanController::class, 'tolakTimbalan'])
        ->name('permohonan.tolak.timbalan')
        ->whereNumber('id');

    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    */

    Route::get('/api/permohonan/pending', function () {

        return response()->json([
            'total' => Permohonan::where('status', 'Dalam Proses')->count(),

            'data' => Permohonan::where('status', 'Dalam Proses')
                        ->latest()
                        ->take(5)
                        ->get(['id', 'nama', 'jenis'])
        ]);

    });

    Route::get('/api/permohonan/{id}', function ($id) {

        $p = \App\Models\Permohonan::findOrFail($id);

        return response()->json([

            'id' => $p->id,
            'nama' => $p->nama,
            'jenis' => $p->jenis,
            'telefon' => $p->telefon,
            'email' => $p->email,
            'alamat' => $p->alamat,
            'poskod' => $p->poskod,
            'negeri' => $p->negeri,
            'tujuan' => $p->tujuan,
            'status' => $p->status,

            'created_at' => $p->created_at,

            'surat' => $p->surat,
            'ic'     => $p->ic,
            'ssm'    => $p->ssm,
            'ros'    => $p->ros,

            'agreement_signed' => !empty($p->agreement_pdf),

            'agreement_url' => !empty($p->agreement_pdf)
                ? route('file.preview', [
                    'path' => $p->agreement_pdf
                ])
                : null,

            'data_file' => !empty($p->data_file)

        ]);
    });

    Route::get('/api/data-files/{id}', function ($id) {

    $permohonan = \App\Models\Permohonan::findOrFail($id);

    $files = [];

    if ($permohonan->data_file) {

    foreach (json_decode($permohonan->data_file, true) as $file) {

        $files[] = [
            'name' => $file['name'],
            'url' => asset('storage/'.$file['path']),
            'rows' => $file['rows'] ?? 0,
            'size' => $file['size'] ?? 0,
        ];
    }}

    return response()->json($files);
});

Route::get('/api/dokumen/{id}', function ($id) {

    $permohonan = \App\Models\Permohonan::findOrFail($id);

    /* Agreement*/
    $agreement = [
        'status' => false,
        'url' => null,
    ];

    if (!empty($permohonan->agreement_pdf)) {

        $agreement = [
            'status' => true,
            'url' => route('dpo.agreement.preview.pdf', [
                'id' => $permohonan->id
            ])
        ];
    }

    /* Stamp Duty */
    $stampDuty = [
        'status' => false,
        'name' => null,
        'size' => null
    ];


    if ($permohonan->stamp_duty_file) {

        $stamp = json_decode(
            $permohonan->stamp_duty_file,
            true
        );

        $stampDuty = [
            'status' => !empty($stamp['path']),
            'name'   => $stamp['name'] ?? null,
            'size'   => $stamp['size'] ?? null,
            'url'    => !empty($stamp['path'])
                ? route('file.preview', ['path' => $stamp['path']])
                : null,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Data File
    |--------------------------------------------------------------------------
    */

    $dataFiles = [];

    if ($permohonan->data_file) {

        foreach(
            json_decode($permohonan->data_file,true)
            as $file
        ){

            $dataFiles[] = [
                'name' => $file['name'] ?? '-',
                'rows' => $file['rows'] ?? 0,
                'size' => $file['size'] ?? 0
            ];
        }
    }

    return response()->json([

        'agreement' => $agreement,
        'stamp_duty' => $stampDuty,
        'data' => [

            'status' => count($dataFiles) > 0,
            'files' => $dataFiles

        ]
    ]);
});

    Route::get('/data/download/{id}/{index}', [PermohonanController::class, 'downloadDataFile'])
        ->name('data.download');

    /*
    |--------------------------------------------------------------------------
    | FILE PREVIEW
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | FILE PREVIEW
    |--------------------------------------------------------------------------
    */

    Route::get('/preview/{path}', function ($path) {

        $path = urldecode($path);

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'Fail tidak ditemui');
        }

        $fullPath = Storage::disk('public')->path($path);

        return response()->file($fullPath, [
            'Content-Disposition' => 'inline',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'public, max-age=300',
        ]);

    })->middleware('auth')->where('path', '.*')->name('file.preview');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');
});

/*
|--------------------------------------------------------------------------
| DPO LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/dpo/login', [DPOAuthController::class, 'showLogin'])
    ->name('dpo.login');

/*
|--------------------------------------------------------------------------
| ROUTE CARD
|--------------------------------------------------------------------------
*/

Route::get('/semua-permohonan', [PermohonanController::class, 'index'])
    ->name('permohonan.semua');

Route::get('/dalam-proses', [PermohonanController::class, 'dalamProses'])
    ->name('permohonan.proses');

Route::get('/diluluskan', [PermohonanController::class, 'diluluskan'])
    ->name('permohonan.lulus');

Route::get('/ditolak', [PermohonanController::class, 'ditolak'])
    ->name('permohonan.tolak');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';