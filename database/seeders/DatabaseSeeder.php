<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
        ]);

        \App\Models\BeritaAcara::create([
            'jadwal_id'=>1,
            'ruang_id'=>1,
            'pengawas1_id'=>5,
            'pengawas2_id'=>6,
            'catatan'=>'Tertib dan aman'
        ]);

        \App\Models\PesertaHadir::factory(10)->create();
        \App\Models\PesertaAbsen::factory(8)->create();
    }
}
