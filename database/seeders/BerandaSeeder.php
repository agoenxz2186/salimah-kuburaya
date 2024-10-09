<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BerandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('berandas')->insert([
            [
                'backgroundIMG' => null, // Kosongkan atau sesuaikan jika perlu
                'deskripsi' => 'Deskripsi contoh',
                'fotoketua' => null, // Kosongkan atau sesuaikan jika perlu
                'sambutan' => 'Sambutan contoh',
                'judul_program1' => 'Judul Program 1',
                'deskripsi_program1' => 'Deskripsi Program 1',
                'judul_program2' => 'Judul Program 2',
                'deskripsi_program2' => 'Deskripsi Program 2',
                'judul_program3' => 'Judul Program 3',
                'deskripsi_program3' => 'Deskripsi Program 3',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
