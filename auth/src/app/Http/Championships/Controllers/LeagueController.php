<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\LeagueRepository;
use App\Http\Championships\Resources\League as LeagueResource;
use App\Http\Championships\Resources\LeagueCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\League;

class LeagueController extends ApiController
{

    public function index(LeagueRepository $countries)
    {
        $countries = $countries->paginate(10);
        return new LeagueCollection($countries);
    }

    public function show(LeagueRepository $league)
    {
        return new LeagueResource($league);
    }

    public function update(LeagueRepository $league)
    {

        $league->update(request()->all());

        return [
            'message' => 'League Updated Successfully',
            'entry' => $league
        ];
    }

    public function store(LeagueRepository $league)
    {

        $league = $league->create(request()->all());

        return [
            'message' => 'League Created Successfully',
            'entry' => $league
        ];
    }
}
