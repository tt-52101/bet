<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Models\BetSlipItem;
use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Models\League;
use App\Http\Championships\Repositories\ChampionshipRepository;
use App\Http\Championships\Resources\Championship as ChampionshipResource;
use App\Http\Championships\Resources\ChampionshipCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Championship;
use App\Http\Championships\Resources\FixtureCollection;
use Illuminate\Support\Facades\Auth;
use App\Http\Championships\Filters\FixtureFilters;
use App\Http\Championships\Models\Odd;

class ChampionshipController extends ApiController
{

    public function index(ChampionshipRepository $championships)
    {
        $championships = $championships->paginate(10);
        return new ChampionshipCollection($championships);
    }

    public function show(ChampionshipRepository $championship)
    {
        return new ChampionshipResource($championship);
    }

    public function update(ChampionshipRepository $championship)
    {

        $championship->update(request()->all());

        return [
            'message' => 'Championship Updated Successfully',
            'entry' => $championship
        ];
    }

    public function store(ChampionshipRepository $championship)
    {

        $championship = $championship->create(request()->all());

        return [
            'message' => 'Championship Created Successfully',
            'entry' => $championship
        ];
    }

    public function join(ChampionshipRepository $championship)
    {

        $championship = $championship->get();
        $user = Auth::user()->id;

        // Check if already joined
        if ($championship->hasJoined($user)){
            return $this->respondForbidden('You have already joined the Championship');
        }

        // Join Championship
        $championship->joinUser($user);

        return [
            'message' => 'You joined successfully',
            'entry' => $championship
        ];
    }


    public function addLeague(Championship $championship) {
        $league = League::find(request()->league_id);
        $championship->leagues()->attach($league);

        return [
            'message' => 'League Selected Successfully'
        ];
    }

    public function removeLeague(Championship $championship, League $league) {
        $championship->leagues()->detach($league);

        return [
            'message' => 'League Removed Successfully'
        ];
    }

    public function fixtures(Championship $championship){
        $filters = new FixtureFilters(request());
        $fixtures = Fixture::filter($filters)->paginate(10);

        return new FixtureCollection($fixtures);
    }

    public function syncBetSlip(Championship $championship){

        $user = Auth::user()->id;
        $selected_odds = request()->odd_ids;

        $championship->attachUniqueOdds($selected_odds);

        return [
            'message' => 'Updated Successfully',
        ];
    }

    public function betSlips(Championship $championship){

        return [
            'message' => 'Updated Successfully',
            'data' => $championship->betSlipItems
        ];
    }

    public function updateBetSlip(Championship $championship, BetSlipItem $betSlipItem){

        $betSlipItem->update([
            'points' => request()->points
        ]);


        return [
            'message' => "Updated Successfully ".request()->points,
        ];
    }
}
