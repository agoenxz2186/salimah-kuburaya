<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Khomarul Arifin',
                'email' => 'adminpusat@gmail.com',
                'nohp' => '0882019472530',
                'password' => bcrypt('admin'),
                'role'  => 'admin_Pusat',
                'cabang_id' => null,
            ],

        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
