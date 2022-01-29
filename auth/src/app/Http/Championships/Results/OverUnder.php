<?php

namespace App\Http\Championships\Results;

use App\Http\Championships\Models\FixtureStatus;
use App\Http\Championships\Models\Fixture;

trait OverUnder {
    public function isOverUnder($fixture, $value){
        $bet = explode(' ', $value);

        $value = $bet[0];
        $bet_goals = (float) $bet[1];
        $match_goals = $fixture['home_goals'] + $fixture['away_goals'];
        if($value == 'Over') {
            return $match_goals > $bet_goals;
        }

        return  $match_goals < $bet_goals;
    }

}
