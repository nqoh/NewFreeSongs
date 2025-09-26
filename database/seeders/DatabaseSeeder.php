<?php

namespace Database\Seeders;

use App\Models\Music;
use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'NewFreeSongs',
            'email' => 'info@newfreesongs.com',
        ]);

        Music::factory(50)->create();
    }
}
