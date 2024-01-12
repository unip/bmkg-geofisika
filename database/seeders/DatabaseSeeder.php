<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        User::factory(5)->create();

        Alat::create([
            'nama' => 'Proton Magnetometer',
            'slug' => 'proton-magnetometer',
            'harga' => 400000,
            'deskripsi' => 'Per Unit / Per Hari',
        ]);

        Alat::create([
            'nama' => 'Portable Digital Short Period Seismograph',
            'slug' => 'portable-digital-short-period-seismograph',
            'harga' => 640000,
            'deskripsi' => 'Per Unit / Per Hari',
        ]);

        Alat::create([
            'nama' => 'GPS Geodesi',
            'slug' => 'gps-geodesi',
            'harga' => 270000,
            'deskripsi' => 'Per Unit / Per Hari',
        ]);
    }
}
