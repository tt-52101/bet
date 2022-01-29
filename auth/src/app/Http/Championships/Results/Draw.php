<?php

namespace App\Http\Championships\Results;

use App\Http\Championships\Models\Fixture;

class Draw {
    use Finished;

    public function isDraw(Fixture $fixture){
      if($fixture->home_goals == $fixture->away_goals) {
          return true;
      }

      return false;
    }
}
