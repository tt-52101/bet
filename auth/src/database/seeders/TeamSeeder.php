<?php

namespace Database\Seeders;

use App\Http\Championships\Filters\LeagueFilters;
use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Team;
use App\Models\Team as TeamApi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Team::truncate();
        Schema::enableForeignKeyConstraints();

        $teams = TeamApi::all();

        foreach ($teams as $team) {
            $league = $team->league_id;
            $league_id = League::where('api_id', $league)->first()->id;

            $country_name = $team->team['country'];
            $country_id = Country::where('countries.name', $country_name)->first()->id;

            Team::create([
                'name' => $team->team['name'],
                'national' => $team->team['national'],
                'founded' => $team->team['founded'],
                'logo' => $team->team['logo'],
                'api_id' => $team->team['id'],
                'country_id' => $country_id,
                'league_id' => $league_id,
            ]);
        }
    }
}
