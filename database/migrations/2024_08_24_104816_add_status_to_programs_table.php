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
        Schema::table('programs', function (Blueprint $table) {
            // Menambahkan kolom status dengan pilihan "unggulan" dan "dijalankan"
            $table->enum('status', ['unggulan', 'dijalankan'])->default('dijalankan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            // Menghapus kolom status
            $table->dropColumn('status');
        });
    }
};
