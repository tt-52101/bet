<?php

namespace App\Http\Championships\Listeners;

use App\Http\Championships\Events\FixtureUpdated;
use App\Http\Championships\Models\Bet;
use App\Http\Championships\Models\Fixture;

class ValidateMatchWinners
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

        // Match Winner Bets
        $bets = $fixture->categoryBets('Match Winner')->get();
        foreach ($bets as $bet) {
            $result = $this->validate($fixture, $bet);
            $bet->win($result);
        }
    }

    public function validate(Fixture $fixture, Bet $bet) {
        $played = $bet->playedOdd->value;
        if($played == 'Draw'){
           return $fixture->isDraw();
        }

        if($played == 'Home'){
            return $fixture->isHomeWin();
        }

        if($played == 'Away'){
            return $fixture->isAwayWin();
        }
    }
}
