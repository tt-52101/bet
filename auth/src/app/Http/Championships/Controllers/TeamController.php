<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\TeamRepository;
use App\Http\Championships\Resources\Team as TeamResource;
use App\Http\Championships\Resources\TeamCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Team;

class TeamController extends ApiController
{

    public function index(TeamRepository $countries)
    {
        $countries = $countries->paginate(10);
        return new TeamCollection($countries);
    }

    public function show(TeamRepository $team)
    {
        return new TeamResource($team);
    }

    public function update(TeamRepository $team)
    {

        $team->update(request()->all());

        return [
            'message' => 'Team Updated Successfully',
            'entry' => $team
        ];
    }

    public function store(TeamRepository $team)
    {

        $team = $team->create(request()->all());

        return [
            'message' => 'Team Created Successfully',
            'entry' => $team
        ];
    }
}
