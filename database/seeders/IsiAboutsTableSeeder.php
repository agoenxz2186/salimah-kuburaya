<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IsiAboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tampilabouts')->insert([
            [
                'img' => null, // Nilai null untuk kolom img
                'judul' => 'Contoh Judul',
                'deskripsi' => 'Deskripsi contoh untuk isi about',
                'visi' => 'Visi contoh untuk isi about',
                'misi' => 'Misi contoh untuk isi about',
                'judulmap' => 'cobadulu',
                'map' => 'coba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak entri jika diperlukan
        ]);
    }
}
