<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Datacenter;
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

        Datacenter::factory()->count(10)->create();
        Datacenter::all()->each(function ($datacenter) {
            \App\Models\Node::factory()->count(5)->create([
                'datacenter_id' => $datacenter->id,
            ]);
        });

        Client::factory()->count(50)->create();

        $nodes = \App\Models\Node::all()->pluck('id', 'datacenter_id')->toArray();
        Client::all()->each(function ($client) use ($nodes) {
            $node = array_rand($nodes);
            \App\Models\VirtualMachine::factory()->count(5)->create([
            'client_id' => $client->id,
            'node_id' => $node,
            'datacenter_id' => $nodes[$node],
            ]);
        });
    }
}
