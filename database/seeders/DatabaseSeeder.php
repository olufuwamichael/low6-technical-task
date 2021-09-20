<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Race;
use App\Models\Jockey;
use App\Models\Horse;
use App\Models\Meeting;
use App\Models\Trainer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Jockey::factory(20)->create();
        Trainer::factory(20)->create();
        Horse::factory(100)->create();

        Race::factory(2)->create();
    }
}
