<?php

namespace App\Http\Championships\Tests\Feature;

use App\Api\Models\Bet;
use App\Api\Models\Bookmaker;
use App\Api\Models\Odd;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Api\Models\Fixture;

class CalculateOddsFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_odds_stats()
    {
        $fixture = new Fixture(
            bookmakers: [
                new Bookmaker(
                    id: 1,
                    name: 'Bookmaker 1',
                    bets: [
                        new Bet(
                            id: 1,
                            name: 'Bet 1',
                            odds: [
                                new Odd(odd: 1, value: 'Home',category_id: 1),
                                new Odd(odd: 2, value: 'Draw',category_id: 1),
                                new Odd(odd: 3, value: 'Away',category_id: 1),
                            ]
                        ),
                        new Bet(
                            id: 2,
                            name: 'Bet 2',
                            odds: [
                                new Odd(odd: 1, value: 'Home',category_id: 2),
                                new Odd(odd: 2, value: 'Draw',category_id: 2),
                                new Odd(odd: 3, value: 'Away',category_id: 2),
                            ]
                        )
                    ]
                ),
                new Bookmaker(
                    id: 1,
                    name: 'Bookmaker 2',
                    bets: [
                        new Bet(
                            id: 1,
                            name: 'Bet 1',
                            odds: [
                                new Odd(odd: 2, value: 'Home',category_id: 1),
                                new Odd(odd: 3, value: 'Draw',category_id: 1),
                                new Odd(odd: 4, value: 'Away',category_id: 1),
                            ]
                        ),
                        new Bet(
                            id: 2,
                            name: 'Bet 2',
                            odds: [
                                new Odd(odd: 1, value: 'Home',category_id: 2),
                                new Odd(odd: 2, value: 'Draw',category_id: 2),
                                new Odd(odd: 3, value: 'Away',category_id: 2),
                            ]
                        ),
                        new Bet(
                            id: 3,
                            name: 'Bet 3',
                            odds: [
                                new Odd(odd: 1.21, value: 'Home',category_id: 3),
                                new Odd(odd: 2, value: 'Draw',category_id: 3),
                            ]
                        ),
                    ]
                )
            ]
        );

        $stats = $fixture->calcStats();

        $bet_1 = $stats->get('bet_1');
        $this->assertTrue($bet_1['home']['avg'] == 1.5);
        $this->assertTrue($bet_1['home']['min'] == 1);
        $this->assertTrue($bet_1['home']['max'] == 2);
        $this->assertTrue($bet_1['home']['n'] == 2);

        $bet = $stats->get('bet_2');
        $this->assertTrue($bet['home']['avg'] == 1);
        $this->assertTrue($bet['home']['min'] == 1);
        $this->assertTrue($bet['home']['max'] == 1);
        $this->assertTrue($bet['home']['n'] == 2);

        $bet = $stats->get('bet_3');
        $this->assertTrue($bet['home']['avg'] == 1.21);
        $this->assertTrue($bet['home']['min'] == 1.21);
        $this->assertTrue($bet['home']['max'] == 1.21);
        $this->assertTrue($bet['home']['n'] == 1);

    }
//
//    public function test_average_odds()
//    {
//        $json = file_get_contents(app_path('Api/FootballApi/Json/Odds.json'));
//        $json = json_decode($json, true);
//
//        $fixtures = (new OddsParser($json['response']))->fixtures();
//        $stats = $fixtures[0]->calcStats();
//        $this->assertTrue(true);
//    }
}
