<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permohonans', function (Blueprint $table) {

            $table->id();

            // Relation dengan user
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Maklumat Pemohon
            $table->string('nama');
            $table->text('alamat');
            $table->enum('jenis', ['Individu', 'Syarikat', 'Pertubuhan', 'Agensi']);
            $table->string('telefon');
            $table->string('email');

            // Permohonan
            $table->text('tujuan');

            $table->string('poskod')->nullable();
            $table->string('negeri')->nullable();
            $table->string('no_ic')->nullable();
            $table->string('nama_organisasi')->nullable();
            $table->string('no_pendaftaran')->nullable();

            // Lampiran (file path)
            $table->string('surat')->nullable(); // wajib
            $table->string('ssm')->nullable();   // syarikat
            $table->string('ic')->nullable();    // individu
            $table->string('ros')->nullable();   // pertubuhan

            // Status workflow
            $table->enum('status', [
                'Dalam Proses',
                'Diluluskan',
                'Ditolak'
            ])->default('Dalam Proses');

            // Optional (future use)
            $table->timestamp('tarikh_lulus')->nullable();
            $table->timestamp('tarikh_tolak')->nullable();
            $table->text('catatan')->nullable(); // komen DPO

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};