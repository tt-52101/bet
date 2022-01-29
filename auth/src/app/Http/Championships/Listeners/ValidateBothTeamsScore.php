<?php

namespace App\Http\Championships\Listeners;

use App\Http\Championships\Events\FixtureUpdated;
use App\Http\Championships\Models\Bet;
use App\Http\Championships\Models\Fixture;

class ValidateBothTeamsScore
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
        $bets = $fixture->categoryBets('Both Teams Score')->get();
        foreach ($bets as $bet) {
            $value = $bet->playedOdd->value;
            $result = $fixture->bothTeamsScored($value);
            $bet->win($result);
        }
    }
}
