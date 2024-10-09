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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->date('tanggal_kegiatan');
            $table->text('deskripsi');
            $table->decimal('donasi', 15, 2);
            $table->string('img');
            $table->enum('status', ['menunggu', 'ditolak', 'menunggu_verifikasi', 'diproses', 'selesai'])->default('menunggu');
            $table->enum('visibility', ['publish', 'private']);
            $table->foreignId('cabang_id')->constrained('cabangs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
