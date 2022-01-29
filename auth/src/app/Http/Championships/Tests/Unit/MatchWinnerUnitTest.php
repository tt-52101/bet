<?php

namespace App\Http\Championships\Tests\Unit;

use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Results\Result;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MatchWinnerUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_match_is_draw()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 1,
        ];

        $draw = $result->isDraw($fixture);

        $this->assertTrue($draw);
    }

    public function test_match_is_not_draw()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => true,
            'away_winner' => null,
            'home_goals' => 2,
            'away_goals' => 1,
        ];

        $match = $result->isDraw($fixture);

        $this->assertTrue($match == false);
    }

    public function test_home_team_wins()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => true,
            'away_winner' => null,
            'home_goals' => 2,
            'away_goals' => 1,
        ];

        $match = $result->isHomeWin($fixture);

        $this->assertTrue($match == true);
    }

    public function test_away_team_wins()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => true,
            'home_goals' => 2,
            'away_goals' => 4,
        ];

        $match = $result->isAwayWin($fixture);

        $this->assertTrue($match == true);
    }
}
