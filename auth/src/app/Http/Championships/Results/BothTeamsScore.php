<?php

namespace App\Http\Championships\Results;

use App\Http\Championships\Models\FixtureStatus;
use App\Http\Championships\Models\Fixture;

trait BothTeamsScore {
    public function bothTeamsScore($fixture, $value){
        $home_scored = $fixture['home_goals'] > 0;
        $away_scored = $fixture['away_goals'] > 0;

        if($value == 'Yes'){
            return $home_scored && $away_scored;
        }

        return $home_scored == false | $away_scored == false;
    }

}
