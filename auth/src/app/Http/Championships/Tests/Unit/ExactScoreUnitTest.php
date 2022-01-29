<?php

namespace App\Http\Championships\Tests\Unit;

use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Results\Result;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExactScoreUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_exact_score_draw()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 1,
        ];

        $bet = $result->isExactScore($fixture, "1:1");

        $this->assertTrue($bet === true);
    }

    public function test_exact_score_home_win()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => true,
            'away_winner' => null,
            'home_goals' => 2,
            'away_goals' => 1,
        ];

        $bet = $result->isExactScore($fixture, "2:1");

        $this->assertTrue($bet === true);
    }

    public function test_exact_score_away_win()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => false,
            'away_winner' => true,
            'home_goals' => 2,
            'away_goals' => 4,
        ];

        $bet = $result->isExactScore($fixture, "2:4");

        $this->assertTrue($bet === true);
    }

    public function test_exact_score_home_differs()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => false,
            'away_winner' => true,
            'home_goals' => 2,
            'away_goals' => 4,
        ];

        $bet = $result->isExactScore($fixture, "1:4");

        $this->assertTrue($bet === false);
    }

    public function test_exact_score_away_differs()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => false,
            'away_winner' => true,
            'home_goals' => 2,
            'away_goals' => 4,
        ];

        $bet = $result->isExactScore($fixture, "1:3");

        $this->assertTrue($bet === false);
    }

    public function test_exact_score_away_is_null()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => false,
            'away_winner' => true,
            'home_goals' => 2,
            'away_goals' => null,
        ];

        $bet = $result->isExactScore($fixture, "2:3");

        $this->assertTrue($bet === false);
    }

    public function test_exact_score_home_is_null()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => false,
            'away_winner' => true,
            'home_goals' => null,
            'away_goals' => 3,
        ];

        $bet = $result->isExactScore($fixture, "1:3");

        $this->assertTrue($bet === false);
    }
}
