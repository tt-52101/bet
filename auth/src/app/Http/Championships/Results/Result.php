<?php

namespace App\Http\Championships\Results;

use App\Http\Championships\Models\FixtureStatus;
use App\Http\Championships\Models\Fixture;

class Result {
    use Finished, MatchWinner;

    public function isDraw(Fixture $fixture){
      if($fixture->home_goals === $fixture->away_goals) {
          return true;
      }
    }
}
