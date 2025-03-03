<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Lisää tämä rivi!

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
