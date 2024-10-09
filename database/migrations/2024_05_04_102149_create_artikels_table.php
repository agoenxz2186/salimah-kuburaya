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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->index()->constrained();
            $table->string('judul');
            $table->string('slug');
            $table->longText('deskripsi');
            $table->string('img');
            $table->integer('view')->default(0);
            $table->string('status');
            $table->date('tanggal_publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
