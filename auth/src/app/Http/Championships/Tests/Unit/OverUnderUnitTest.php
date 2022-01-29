<?php

namespace App\Http\Championships\Tests\Unit;

use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Results\Result;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OverUnderUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_over_1_5()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 1,
        ];

        $bet = $result->isOverUnder($fixture, "Over 1.5");

        $this->assertTrue($bet == true);
    }

    public function test_under_1_5()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 0,
        ];

        $bet = $result->isOverUnder($fixture, "Under 1.5");

        $this->assertTrue($bet == true);
    }

    public function test_under_2_5()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 1,
        ];

        $bet = $result->isOverUnder($fixture, "Under 2.5");

        $this->assertTrue($bet == true);
    }

    public function test_over_2_5()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 2,
            'away_goals' => 1,
        ];

        $bet = $result->isOverUnder($fixture, "Over 2.5");

        $this->assertTrue($bet == true);
    }

    public function test_over_2_5_should_fail()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 1,
        ];

        $bet = $result->isOverUnder($fixture, "Over 2.5");

        $this->assertTrue($bet == false);
    }



    public function test_under_1_5_should_fail()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 1,
        ];

        $bet = $result->isOverUnder($fixture, "Under 1.5");

        $this->assertTrue($bet == false);
    }
}
