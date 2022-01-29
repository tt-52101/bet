<?php

namespace App\Http\Championships\Results;

class Result
{
    use Finished,
        MatchWinner,
        ExactScore,
        OverUnder,
        BothTeamsScore;

    public function isDraw($fixture)
    {
        if ($fixture['home_goals'] === $fixture['away_goals']) {
            return true;
        }
    }
}
