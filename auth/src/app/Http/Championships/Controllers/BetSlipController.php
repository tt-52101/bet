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

        $bet  = $championship->points();


        if($championship->betSlipItems()->count() == 0) {
            return $this->respondForbidden('Το Δελτίο στοιχήματος είναι κενό');
        }

        if($bet['points'] < 0) {
            return $this->respondForbidden('Οι πόντοι σας δεν επαρκούν για αυτό το στοίχημα');
        }

        if($bet['missing']) {
            return $this->respondForbidden('Θα πρέπει να συμπληρώσεται όλα τα πονταρίσματα');
        }

        if($bet['small_bet']) {
            return $this->respondForbidden('Το ποντάρισμα σας θα πρέπει να είναι τουλάχιστον 1 point');
        }

        $user_id = Auth::user()->id;
        $championship->finalizeBet($user_id);

        return [
            'message' => 'Bet Finalized'
        ];
    }
}
