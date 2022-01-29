<?php

namespace App\Http\Championships\Listeners;

use App\Http\Championships\Events\FixtureUpdated;
use App\Http\Championships\Models\Bet;
use App\Http\Championships\Models\Fixture;

class ValidateOverUnder
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
        $bets = $fixture->categoryBets('Goals Over/Under')->get();
        foreach ($bets as $bet) {
            $score = $bet->playedOdd->value;
            $result = $fixture->isOverUnder($score);
            $bet->win($result);
        }
    }
}
