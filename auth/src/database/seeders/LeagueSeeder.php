<?php

namespace Database\Seeders;

use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Season;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\League as LeagueApi;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        League::truncate();
        Schema::enableForeignKeyConstraints();

        $leagues = LeagueApi::all();


        foreach ($leagues as $league) {
            $country_name = $league->country['name'];
            $country_id = Country::where('countries.name', $country_name)->first()->id;
            $db_league = League::create([
                'name' => $league->league['name'],
                'type' => $league->league['type'],
                'logo' => $league->league['logo'],
                'api_id' => $league->league['id'],
                'country_id' => $country_id
            ]);

            $this->createSeasons($db_league, $league->seasons);

        }
    }

    public function createSeasons(League $league, array $seasons){
        foreach ($seasons as $season){
            Season::create([
                'year' => $season['year'],
                'league_id' => $league->id,
                'start' => $season['start'],
                'end' => $season['end'],
                'current' => $season['current'],
                'standings' => $season['coverage']['standings'],
                'players' => $season['coverage']['players'],
                'events' => $season['coverage']['fixtures']['events'],
                'predictions' => $season['coverage']['predictions'],
                'odds' => $season['coverage']['odds'],
            ]);
        }
    }
}
