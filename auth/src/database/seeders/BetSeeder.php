<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bet;
use App\Models\Bookmakers;
use App\Models\OddMapping;
use App\Models\League;
use App\Models\Fixture;
use App\Models\Odd;
use App\Models\Country;
use App\Models\Team;

use App\Api\Odds\BetsApi;
use App\Api\Odds\BookmakersApi;
use App\Api\Odds\CountriesApi;
use App\Api\Odds\FixturesApi;
use App\Api\Odds\OddsMappingApi;
use App\Api\Odds\LeaguesApi;
use App\Api\Odds\OddsApi;
use App\Api\Odds\TeamsApi;

class BetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->countries();
        $this->bets();
        $this->bookmakers();
        $this->leagues();
    }

    public function teams(){
        //Team::truncate();
        $league = 135;
        $result = (new TeamsApi())->get(country:'Italy', league: $league, season: '2021');

        foreach($result['response'] as $entry) {
            $entry['league_id'] = $league;
            Team::create($entry);
        }
    }

    public function countries(){
        Country::truncate();
        $result = (new CountriesApi())->get();

        foreach($result['response'] as $entry) {
            Country::create($entry);
        }
    }

    public function odds()
    {
        //Odd::truncate();
        $result = (new OddsApi())->get(league: 197, season:2021,page:2);

        foreach ($result['response'] as $entry) {
            Odd::create($entry);
        }
    }

    public function fixtures()
    {
        Fixture::truncate();
        $result = (new FixturesApi())->get(league: 197, season:2021);

        foreach ($result['response'] as $entry) {
            Fixture::create($entry);
        }
    }

    public function leagues()
    {
        League::truncate();
        $result = (new LeaguesApi())->get();

        foreach ($result['response'] as $entry) {
            League::create($entry);
        }
    }

    public function oddsMapping()
    {
        OddMapping::truncate();
        $result = (new OddsMappingApi())->get();

        foreach ($result['response'] as $entry) {
            OddMapping::create($entry);
        }
    }

    public function bookmakers()
    {
        Bookmakers::truncate();
        $result = (new BookmakersApi())->get();

        foreach ($result['response'] as $entry) {
            Bookmakers::create($entry);
        }
    }

    public function bets()
    {
        Bet::truncate();
        $bets = (new BetsApi())->get();

        foreach ($bets['response'] as $bet) {
            Bet::create($bet);
        }
    }
}
