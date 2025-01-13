<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'name' => 'Alejandro Sanchez',
            'email' => 'alejandro.sanchez@tuaiti.com.ar',
            'password' => '$2y$10$kpD1iljunbPd8R1gZJYxcOxSWEwT0gNmPkgPiL9KQmkjNcUVxcXde',
        ]);
    }
}
