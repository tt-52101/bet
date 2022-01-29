<?php

namespace App\Http\Championships\Listeners;

use App\Http\Championships\Events\FixtureUpdated;
use App\Http\Championships\Models\Bet;
use App\Http\Championships\Models\Fixture;

class ValidateExactScore
{

    public function __construct()
    {

    }

    public function handle(FixtureUpdated $fixtureUpdated)
    {
        $fixture = $fixtureUpdated->fixture;

        // Match Not Finished
        if(!$fixture->finished()){
            return;
        }

        // Bets
        $bets = $fixture->categoryBets('Exact Score')->get();
        foreach ($bets as $bet) {
            $score = $bet->playedOdd->value;
            $result = $fixture->isExactScore($score);
            $bet->win($result);
        }
    }
}
