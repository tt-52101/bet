<?php

namespace App\Http\Championships\Controllers;

use App\Core\Auth\Models\User;
use App\Http\Championships\Repositories\TeamRepository;
use App\Http\Championships\Resources\Team as TeamResource;
use App\Http\Championships\Resources\TeamCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Team;
use Illuminate\Support\Facades\Gate;

class TeamController extends ApiController
{

    public function index(TeamRepository $countries)
    {
        if (Gate::denies('view', new Team())) {
            return $this->respondForbidden("You don't have permission");
        }
        $countries = $countries->paginate(10);
        return new TeamCollection($countries);
    }

    public function show(TeamRepository $team)
    {
        if (Gate::denies('view', new Team())) {
            return $this->respondForbidden("You don't have permission");
        }
        return new TeamResource($team);
    }

    public function update(TeamRepository $team)
    {
        if (Gate::denies('update', new Team())) {
            return $this->respondForbidden("You don't have permission");
        }
        $team->update(request()->all());

        return [
            'message' => 'Team Updated Successfully',
            'entry' => $team
        ];
    }

    public function store(TeamRepository $team)
    {
        if (Gate::denies('create', new Team())) {
            return $this->respondForbidden("You don't have permission");
        }
        $team = $team->create(request()->all());

        return [
            'message' => 'Team Created Successfully',
            'entry' => $team
        ];
    }
}
