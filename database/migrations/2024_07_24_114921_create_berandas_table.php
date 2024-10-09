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
        Schema::create('berandas', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->string('fotoketua')->nullable();
            $table->text('sambutan');
            $table->string('judul_program1');
            $table->text('deskripsi_program1');
            $table->string('judul_program2');
            $table->text('deskripsi_program2');
            $table->string('judul_program3');
            $table->text('deskripsi_program3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berandas');
    }
};
