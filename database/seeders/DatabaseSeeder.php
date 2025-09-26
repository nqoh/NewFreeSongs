<?php

namespace Database\Seeders;

use App\Models\Music;
use App\Models\News;
use App\Models\Subscribe;
use App\Models\User;
use App\Models\Task;
use App\Models\Videos;
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
        Videos::factory(50)->create();
        News::factory(50)->create();
        Subscribe::factory(20)->create();
        
    }
}
