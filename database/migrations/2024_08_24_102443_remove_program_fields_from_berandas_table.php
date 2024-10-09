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
        Schema::table('berandas', function (Blueprint $table) {
            // Menghapus kolom-kolom yang tidak diperlukan
            $table->dropColumn(['judul_program1', 'deskripsi_program1', 'judul_program2', 'deskripsi_program2', 'judul_program3', 'deskripsi_program3']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berandas', function (Blueprint $table) {
            // Menambahkan kembali kolom-kolom yang dihapus
            $table->string('judul_program1');
            $table->text('deskripsi_program1');
            $table->string('judul_program2');
            $table->text('deskripsi_program2');
            $table->string('judul_program3');
            $table->text('deskripsi_program3');
        });
    }
};
