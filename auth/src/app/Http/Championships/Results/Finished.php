<?php

namespace App\Http\Championships\Results;

use App\Http\Championships\Models\FixtureStatus;
use App\Http\Championships\Models\Fixture;

trait Finished {
    public function finished(Fixture $fixture){
        $finished_status = FixtureStatus::whereIn('name', [
            'FT',
            'AET',
            'PEN',
        ])->get()->pluck('name')->toArray();

        return in_array($fixture->status->name, $finished_status);
    }
}
