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
            'name' => 'Abdurrahman Al Hanif',
            'email' => 'abdurrahman.alhanif@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        User::factory(10)->create();

        Alat::create([
            'nama' => 'Proton Magnetometer',
            'slug' => 'proton-magnetometer',
            'harga' => 400000,
            'deskripsi' => 'Per Unit / Per Hari',
            'unit' => 5,
        ]);

        Alat::create([
            'nama' => 'Portable Digital Short Period Seismograph',
            'slug' => 'portable-digital-short-period-seismograph',
            'harga' => 640000,
            'deskripsi' => 'Per Unit / Per Hari',
            'unit' => 5,
        ]);

        Alat::create([
            'nama' => 'GPS Geodesi',
            'slug' => 'gps-geodesi',
            'harga' => 270000,
            'deskripsi' => 'Per Unit / Per Hari',
            'unit' => 5,
        ]);
    }
}
