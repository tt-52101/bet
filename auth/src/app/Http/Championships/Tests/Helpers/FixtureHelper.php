<?php

namespace App\Http\Championships\Tests\Helpers;
use App\Http\Championships\Models\Country;
use App\Http\Championships\Models\League;
use App\Http\Championships\Models\Team;
use App\Http\Championships\Models\Fixture;

class FixtureHelper {
    public static function init(){
        self::createCountries();
        self::createLeagues('Greece');
        self::createLeagues('Italy');
        self::createTeams(1);

    }

    public static function createCountries(){
        Country::create([
            'name' => 'Greece',
            'flag' => 'flag',
            'code' => 'gr',
        ]);

        Country::create([
            'name' => 'Italy',
            'flag' => 'flag',
            'code' => 'it',
        ]);
    }

    public static function createLeagues($country_name){
        $country = Country::where('name', $country_name)->first();
        League::create([
            'name' => 'League',
            'type' => 'League',
            'api_id' => 197,
            'country_id' => $country->id,
            'logo' => 'test'
        ]);

        League::create([
            'name' => 'League 2',
            'type' => 'League',
            'api_id' => 198,
            'country_id' => $country->id,
            'logo' => 'test'
        ]);
    }

    public static function createTeams($league_id) {
        $league = League::find($league_id)->first();

        for ($i = 0; $i < 4; $i++) {
            Team::create([
                "name" => 'Team 1',
                "logo" => 'logo',
                "league_id" => $league_id,
                "country_id" => $league->country_id,
                "national" => false,
                "api_id" => $i
            ]);
        }
    }
}
