<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Permohonan;
use App\Mail\PermohonanLulusMail;
use App\Mail\PermohonanDitolakMail;
use PhpOffice\PhpWord\TemplateProcessor;
use SplFileObject;

class PermohonanController extends Controller
{
    public function create()
    {
        return view('pemohon.permohonan');
    }

        public function store(Request $request)
        {
            $request->validate([
                'nama' => 'required',
                'telefon' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'poskod' => 'required',
                'negeri' => 'required',
                'jenis' => 'required',
                'surat' => 'required|file',

                'no_ic' => 'nullable|required_if:jenis,Individu|regex:/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/',
                'nama_organisasi' => 'nullable|required_if:jenis,Syarikat,Pertubuhan,Agensi',
                'no_pendaftaran' => 'nullable|required_if:jenis,Syarikat,Pertubuhan,Agensi',
            ]);

            $data = $request->only([
                'nama', 'telefon', 'email', 'alamat', 'poskod', 'negeri',
                'jenis', 'tujuan', 'no_ic', 'nama_organisasi', 'no_pendaftaran'
            ]);

            $data['user_id'] = auth()->id();
            $data['status'] = 'Dalam Proses';

            // 📎 UPLOAD FILES (UPGRADE)
            if ($request->hasFile('surat')) {
                $data['surat'] = $request->file('surat')->store('permohonan', 'public');
            }

            if ($request->hasFile('ssm')) {
                $data['ssm'] = $request->file('ssm')->store('permohonan', 'public');
            }

            if ($request->hasFile('ic')) {
                $data['ic'] = $request->file('ic')->store('permohonan', 'public');
            }

            if ($request->hasFile('ros')) {
                $data['ros'] = $request->file('ros')->store('permohonan', 'public');
            }

            Permohonan::create($data);

            return redirect()->route('dashboard')->with('success', 'Permohonan berjaya dihantar');
        }

        public function edit($id)
        {
            $data = Permohonan::findOrFail($id);
            return view('permohonan.edit', compact('data'));
        }

        public function update(Request $request, $id)
        {
            $data = Permohonan::findOrFail($id);

            $request->validate([
                'nama' => 'required',
                'telefon' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'poskod' => 'required',
                'negeri' => 'required',
            ]);

            // UPDATE DATA
            $data->nama = $request->nama;
            $data->telefon = $request->telefon;
            $data->email = $request->email;
            $data->alamat = $request->alamat;
            $data->poskod = $request->poskod;
            $data->negeri = $request->negeri;
            $data->tujuan = $request->tujuan;

            // 🔥 REPLACE FILE (PROPER)
            if ($request->hasFile('surat')) {
                if ($data->surat) {
                    Storage::disk('public')->delete($data->surat);
                }
                $data->surat = $request->file('surat')->store('permohonan', 'public');
            }

            if ($request->hasFile('ic')) {
                if ($data->ic) {
                    Storage::disk('public')->delete($data->ic);
                }
                $data->ic = $request->file('ic')->store('permohonan', 'public');
            }

            if ($request->hasFile('ssm')) {
                if ($data->ssm) {
                    Storage::disk('public')->delete($data->ssm);
                }
                $data->ssm = $request->file('ssm')->store('permohonan', 'public');
            }

            if ($request->hasFile('ros')) {
                if ($data->ros) {
                    Storage::disk('public')->delete($data->ros);
                }
                $data->ros = $request->file('ros')->store('permohonan', 'public');
            }

            // OPTIONAL: reset status bila update
            $data->status = 'Dalam Proses';

            $data->save();

            return redirect()->route('permohonan.index')->with('success', 'Permohonan berjaya dikemaskini');
        }

        public function hantarTimbalan($id)
        {
        $data = Permohonan::findOrFail($id);

        $data->status = 'Menunggu Kelulusan Timbalan';

        $data->save();

        return back()->with('success', 'Permohonan dihantar kepada Timbalan');

        }

        public function lulusTimbalan($id)
        {
        $data = Permohonan::findOrFail($id);

        $data->status = 'Diluluskan';
        $data->tarikh_lulus = now();

        $data->save();

        Mail::to($data->email)
            ->send(new PermohonanLulusMail($data));

        return back()->with('success', 'Permohonan berjaya diluluskan');

        }

        public function tolakTimbalan(Request $request, $id)
        {
        $data = Permohonan::findOrFail($id);

        $data->status = 'Ditolak';
        $data->catatan = $request->sebab;

        $data->save();

        Mail::to($data->email)
            ->send(new PermohonanDitolakMail($data));

        return back()->with('success', 'Permohonan berjaya ditolak');

        }


        public function print($id)
        {
        $permohonan = Permohonan::findOrFail($id);

        return view('pemohon.print', compact('permohonan'));
        }

        public function generateAgreement($id)
        {
            $permohonan = Permohonan::findOrFail($id);

            $template = public_path('templates/agreement-template.docx');

            $processor = new TemplateProcessor($template);

            if ($permohonan->jenis == 'Individu') {

                $pihakKeduaPenuh = strtoupper($permohonan->nama)
                    . ' (Nombor IC: '
                    . $permohonan->no_ic
                    . ')';

            } else {

                $pihakKeduaPenuh = strtoupper($permohonan->nama_organisasi)
                    . ' (Nombor Pendaftaran: '
                    . $permohonan->no_pendaftaran
                    . ')';
            }

            $alamat = strtoupper(
                $permohonan->alamat . ', ' .
                $permohonan->poskod . ', ' .
                $permohonan->negeri
            );

            $processor->setValue('PIHAK_KEDUA_PENUH', $pihakKeduaPenuh);
            $processor->setValue('ALAMAT', $alamat);

            if (!file_exists(storage_path('app/public/agreements'))) {
                mkdir(storage_path('app/public/agreements'), 0777, true);
            }

            $filename = 'agreement_' . $permohonan->id . '.docx';
            $savePath = storage_path('app/public/agreements/' . $filename);

            // buang fail lama jika ada
            if (file_exists($savePath)) {
                @unlink($savePath);
            }

            $processor->saveAs($savePath);

            $pdfFilename = 'agreement_' . $permohonan->id . '.pdf';
            $pdfPath = storage_path('app/public/agreements/' . $pdfFilename);

            if (file_exists($pdfPath)) {
                @unlink($pdfPath);
            }

            try {

                $word = new \COM("Word.Application");

                $word->Visible = false;
                $word->DisplayAlerts = 0;

                $word->Documents->Open(realpath($savePath));

                $word->ActiveDocument->ExportAsFixedFormat(
                    $pdfPath,
                    17
                );

                } catch (\Throwable $e) {

                    return back ()->with('error', $e->getMessage());            
                
                }

            $permohonan->agreement_file = 'agreements/' . $filename;
            $permohonan->agreement_pdf = 'agreements/' . $pdfFilename;

            if (!$permohonan->save()) {
                return back()->with('error', 'Gagal simpan ke database.');
            }

            return back()->with('success', 'Agreement berjaya dijana.');
        }

        public function previewAgreementPdf($id)
        {
            $permohonan = Permohonan::findOrFail($id);

            if (!$permohonan->agreement_pdf) {
                abort(404, 'PDF belum dijana.');
            }

            $path = storage_path('app/public/' . $permohonan->agreement_pdf);

            if (!file_exists($path)) {
                abort(404, 'Fail PDF tidak dijumpai.');
            }

            return response()->file($path, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="Agreement.pdf"',
                'X-Content-Type-Options' => 'nosniff',
            ]);
        }

        public function uploadAgreementSigned(Request $request, $id)
        {
            $request->validate([
            'agreement_signed' => 'required|mimes:pdf|max:10240',
            ]);

            $permohonan = Permohonan::findOrFail($id);

            $path = $request->file('agreement_signed')
                            ->store('agreements/signed', 'public');

            $permohonan->agreement_signed = $path;
            $permohonan->save();

            return back()->with('success', 'Agreement berjaya dimuat naik.');
        }
        
        public function deleteAgreement($id)
        {
            $permohonan = Permohonan::findOrFail($id);

            // Padam fail signed agreement jika wujud
            if ($permohonan->agreement_signed) {

                Storage::disk('public')->delete($permohonan->agreement_signed);

            }

            // Kosongkan rekod database
            $permohonan->agreement_signed = null;
            $permohonan->save();

            return back()->with('success', 'Agreement berjaya dipadam.');
        }

        public function uploadStampDuty(Request $request, $id)
        {
            $request->validate([
                'stamp_duty_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            ]);

            $permohonan = Permohonan::findOrFail($id);

            // Padam fail lama jika ada
            if (!empty($permohonan->stamp_duty_file)) {

                $oldFile = json_decode($permohonan->stamp_duty_file, true);

                if (!empty($oldFile['path'])) {
                    Storage::disk('public')->delete($oldFile['path']);
                }
            }

            $file = $request->file('stamp_duty_file');
            $path = $file->store('stamp-duty', 'public');
            $permohonan->stamp_duty_file = json_encode([
                'path' => $path,
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize()
            ]);

            $permohonan->save();

            return back()->with('success', 'Pengesahan Bayaran Duti Hasil berjaya dimuat naik.');
        }

        public function tolak(Request $request, $id)
        {
        $data = Permohonan::findOrFail($id);

        // 🔥 UPDATE STATUS
        $data->status = 'Ditolak';

        // 🔥 SEBAB PENOLAKAN
        $data->catatan = $request->sebab;

        // 🔥 SIMPAN DOKUMEN YANG PERLU UPDATE
        $dokumen = [
            'surat' => $request->surat ? true : false,
            'ic' => $request->ic ? true : false,
            'ssm' => $request->ssm ? true : false,
            'ros' => $request->ros ? true : false,
        ];

        $data->catatan_dokumen = json_encode($dokumen);

        $data->save();

        // 🔥 HANTAR EMAIL
        Mail::to($data->email)
            ->send(new PermohonanDitolakMail($data));

        return back()->with('success', 'Permohonan ditolak & email dihantar');
        }

        public function uploadData(Request $request, $id)
        {
            $request->validate([
                'data_file' => 'required|array',
                'data_file.*' => 'required|file|mimes:csv,xlsx,xls,zip'
            ]);

            $permohonan = Permohonan::findOrFail($id);

            /*
            |--------------------------------------------------------------------------
            | Ambil fail lama
            |--------------------------------------------------------------------------
            */

            $files = [];

            if (!empty($permohonan->data_file)) {
                $files = json_decode($permohonan->data_file, true);
                if (!is_array($files)) {
                    $files = [];
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Tambah fail baru
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('data_file')) {

                foreach ($request->file('data_file') as $file) {

                    $rowCount = null;

                    // Kira bilangan rekod untuk CSV sahaja
                    if (strtolower($file->getClientOriginalExtension()) === 'csv') {

                        $csv = new SplFileObject($file->getRealPath());

                        $csv->setFlags(
                            SplFileObject::READ_CSV |
                            SplFileObject::SKIP_EMPTY
                        );

                        $rowCount = 0;

                        foreach ($csv as $index => $row) {

                            // Skip header (baris pertama)
                            if ($index == 0) {
                                continue;
                            }

                            // Skip baris kosong
                            if ($row == [null]) {
                                continue;
                            }

                            $rowCount++;
                        }
                    }

                    $files[] = [
                        'path'  => $file->store('data-file', 'public'),
                        'name'  => $file->getClientOriginalName(),
                        'rows'  => $rowCount,
                        'size'  => $file->getSize()
                    ];
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Simpan semula
            |--------------------------------------------------------------------------
            */

            $permohonan->data_file = json_encode($files);
            $permohonan->save();

            return back()->with('success', 'Fail data berjaya dimuat naik.');
        }

        public function downloadDataFile($id, $index)
        {
            $permohonan = Permohonan::findOrFail($id);

            $files = json_decode($permohonan->data_file, true);

            if (!isset($files[$index])) {
                abort(404);
            }

            $file = $files[$index];

            // Support format lama (string)
            if (is_string($file)) {
                return Storage::disk('public')->download(
                    $file,
                    basename($file)
                );
            }

            // Format baru (path + name)
            return Storage::disk('public')->download(
                $file['path'],
                $file['name']
            );
        }

        public function deleteDataFile($id, $index)
        {
            $permohonan = Permohonan::findOrFail($id);

            $files = $permohonan->data_file
                ? json_decode($permohonan->data_file, true)
                : [];

            // Pastikan index wujud
            if (!isset($files[$index])) {
                return back()->with('error', 'Fail tidak dijumpai.');
            }

            // Support format lama (string) dan format baru (path + name)
            if (is_string($files[$index])) {

                Storage::disk('public')->delete($files[$index]);

            } else {

                Storage::disk('public')->delete($files[$index]['path']);

            }

            // Buang rekod daripada array
            unset($files[$index]);

            // Susun semula index array
            $files = array_values($files);

            // Simpan semula ke database
            $permohonan->data_file = count($files)
                ? json_encode($files)
                : null;

            $permohonan->save();

            return response()->json([
                'success' => true,
                'message' => 'Fail data berjaya dipadam.'
            ]);
        }
}