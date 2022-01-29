<?php

namespace App\Http\Championships\Tests\Unit;

use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Results\Result;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BothTeamsScoreUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_team_scores_no()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 0,
        ];

        $bet = $result->bothTeamsSCore($fixture, 'No');

        $this->assertTrue($bet == true);
    }

    public function test_away_team_scores_no()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 0,
            'away_goals' => 1,
        ];

        $draw = $result->bothTeamsSCore($fixture, 'No');

        $this->assertTrue($draw == true);
    }

    public function test_both_team_scores_no()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 1,
        ];

        $draw = $result->bothTeamsSCore($fixture, 'No');

        $this->assertTrue($draw == false);
    }

    public function test_home_team_scores_yes()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 0,
        ];

        $draw = $result->bothTeamsSCore($fixture, 'Yes');

        $this->assertTrue($draw == false);
    }

    public function test_away_team_scores_yes()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 0,
            'away_goals' => 1,
        ];

        $draw = $result->bothTeamsSCore($fixture, 'Yes');

        $this->assertTrue($draw == false);
    }

    public function test_no_team_scores_yes()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 0,
            'away_goals' => 0,
        ];

        $draw = $result->bothTeamsSCore($fixture, 'Yes');

        $this->assertTrue($draw == false);
    }

    public function test_both_team_scores_yes()
    {
        $result = new Result();
        $fixture = [
            'home_winner' => null,
            'away_winner' => null,
            'home_goals' => 1,
            'away_goals' => 2,
        ];

        $draw = $result->bothTeamsSCore($fixture, 'Yes');

        $this->assertTrue($draw == true);
    }

}
