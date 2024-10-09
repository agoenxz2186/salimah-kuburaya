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
        Schema::create('laporan_keuangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laporan_id');
            $table->enum('jenis', ['masuk', 'keluar']); // untuk pilihan uang masuk/keluar
            $table->decimal('nominal', 15, 2); // Nominal uang
            $table->text('keterangan'); // Keterangan
            $table->string('img')->nullable();;
            $table->timestamps();

            $table->foreign('laporan_id')->references('id')->on('laporans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangans');
    }
};
