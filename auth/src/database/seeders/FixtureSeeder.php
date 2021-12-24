<?php

namespace Database\Seeders;

use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Team;
use App\Models\Fixture as FixtureApi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FixtureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Fixture::truncate();
        Schema::enableForeignKeyConstraints();

        $fixtures = FixtureAPi::all();

        foreach ($fixtures as $fixture) {
            $league = $fixture->league['id'];
            $league_id = League::where('api_id', $league)->first()->id;

            $country_name = $fixture->league['country'];
            $country_id = Country::where('countries.name', $country_name)->first()->id;

            $home_id = Team::where('api_id', $fixture->teams['home']['id'])->first()->id;
            $away_id = Team::where('api_id', $fixture->teams['away']['id'])->first()->id;

            Fixture::create([
                'api_id' => $fixture->fixture['id'],

                'date' => $fixture->fixture['timestamp'],
                'status' => $fixture->fixture['status']['long'],

                'country_id' => $country_id,
                'league_id' => $league_id,

                'home_id' => $home_id,
                'away_id' => $away_id,

                'home_winner' => $fixture->teams['home']['winner'],
                'away_winner' => $fixture->teams['away']['winner'],

                'home_goals' => $fixture->goals['home'],
                'away_goals' => $fixture->goals['away'],

            ]);
        }
    }
}
