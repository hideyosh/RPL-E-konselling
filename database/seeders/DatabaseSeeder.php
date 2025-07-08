<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     // 'name' => 'Test User',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => 'admin'
        // ]);
        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);
        User::create([
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'siswa'
        ]);
        User::create([
            'email' => 'depia@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'guru'
        ]);
        User::create([
            'email' => 'nakia@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'siswa'
        ]);
    }
}
