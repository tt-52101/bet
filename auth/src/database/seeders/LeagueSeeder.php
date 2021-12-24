<?php

namespace Database\Seeders;

use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\League;
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
            League::create([
                'name' => $league->league['name'],
                'type' => $league->league['type'],
                'logo' => $league->league['logo'],
                'country_id' => $country_id
            ]);
        }
    }
}
