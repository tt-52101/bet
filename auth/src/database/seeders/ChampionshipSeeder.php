<?php

namespace Database\Seeders;

use App\Http\Championships\Models\Championship;
use App\Http\Championships\Factories\ChampionshipFactory;

use Illuminate\Database\Seeder;

class ChampionshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChampionshipFactory::new()->create();
    }
}
