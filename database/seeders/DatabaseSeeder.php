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

        \App\Models\User::create([
            'nama_lengkap' => 'Adnan RK',
            'username' => 'adnan',
            'email' => 'atnandimas@gmail.com',
            'alamat' => 'pundongggggggggggggggg',
            'role' => 'administrator',
            'password' => 'test123'
        ]);
    }
}
