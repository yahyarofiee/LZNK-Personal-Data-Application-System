<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (
            Schema::hasTable('permohonans') &&
            !Schema::hasColumn('permohonans', 'catatan')
        ) {

            Schema::table('permohonans', function (Blueprint $table) {
                $table->text('catatan')->nullable();
            });

        }
    }

    public function down(): void
    {
        if (
            Schema::hasTable('permohonans') &&
            Schema::hasColumn('permohonans', 'catatan')
        ) {

            Schema::table('permohonans', function (Blueprint $table) {
                $table->dropColumn('catatan');
            });

        }
    }
};