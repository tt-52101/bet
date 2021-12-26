<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Models\League;
use App\Http\Championships\Repositories\ChampionshipRepository;
use App\Http\Championships\Resources\Championship as ChampionshipResource;
use App\Http\Championships\Resources\ChampionshipCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Championship;

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
}
