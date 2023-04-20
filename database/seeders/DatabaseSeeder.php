<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
         ]);

        Genre::factory(5)->create();

        Movie::factory(50)->create();
    }
}
