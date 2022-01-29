<?php

namespace App\Http\Championships\Results;

use App\Http\Championships\Models\FixtureStatus;
use App\Http\Championships\Models\Fixture;

trait ExactScore {
    public function isExactScore($fixture, $value){
        $goals = explode(':', $value);
        $home = (int) $goals[0];
        $away = (int) $goals[1];

        if($fixture['home_goals'] == $home && $fixture['away_goals'] == $away) {
            return true;
        }
        return false;
    }
}
