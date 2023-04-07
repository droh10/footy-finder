<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PlayerType;
use App\Models\PlayType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PlayTypeSeeder::class,
            PlayerTypeSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Schedule::factory(30)->create();
    }
}
