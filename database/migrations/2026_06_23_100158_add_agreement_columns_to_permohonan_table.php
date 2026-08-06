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
        Schema::table('permohonans', function (Blueprint $table) {

            // Agreement yang dijana DPO
            $table->string('agreement_file')->nullable();

            // Agreement yang telah ditandatangani
            $table->string('agreement_signed')->nullable();

            // Data yang dimohon oleh pemohon
            $table->string('data_file')->nullable();

            // Maklumat wakil organisasi
            $table->string('nama_wakil')->nullable();

            $table->string('ic_wakil')->nullable();

            $table->string('jawatan_wakil')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {

            $table->dropColumn([
                'agreement_file',
                'agreement_signed',
                'data_file',
                'nama_wakil',
                'ic_wakil',
                'jawatan_wakil'
            ]);

        });
    }
};