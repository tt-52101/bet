<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Models\BetSlipItem;
use App\Http\Championships\Resources\BetSlipItem as BetSlipItemResource;
use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Models\League;
use App\Http\Championships\Repositories\ChampionshipRepository;
use App\Http\Championships\Resources\BetSlipItemCollection;
use App\Http\Championships\Resources\Championship as ChampionshipResource;
use App\Http\Championships\Resources\ChampionshipCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Championship;
use App\Http\Championships\Resources\FixtureCollection;
use Illuminate\Support\Facades\Auth;
use App\Http\Championships\Filters\FixtureFilters;
use App\Http\Championships\Models\Odd;

class BetSlipController extends ApiController
{

    public function points(Championship $championship)
    {

        $user = Auth::user()->id;

        return $championship->points($user);
    }

    public function finalize(Championship $championship)
    {


        return [
            'message' => 'Bet Finalized'
        ];
    }
}
