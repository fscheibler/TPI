<?php

namespace Database\Seeders;

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
            'name' => 'Florent',
            'email' => 'fscheibler@firstpoint.ch',
            'password' => '$2y$12$IjjXFP.9DZzcVuGrqC0pW.0TuK5v4rrY0q6G50VzcseR9G5OlilSW',
        ]);

    //    $this->call([
    //        ResultSeeder::class,
    //    ]);
    }
}

