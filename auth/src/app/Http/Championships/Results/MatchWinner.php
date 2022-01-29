<?php

namespace App\Http\Championships\Results;

use App\Http\Championships\Models\FixtureStatus;
use App\Http\Championships\Models\Fixture;

trait MatchWinner {
    public function isHomeWin($fixture){
        return $fixture['home_winner'] == true;
    }

    public function isAwayWin($fixture){
        return $fixture['away_winner'] == true;
    }
}
