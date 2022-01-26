<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Repositories\FixtureStatusRepository;
use App\Http\Championships\Resources\FixtureStatus as FixtureStatusResource;
use App\Http\Championships\Resources\FixtureStatusCollection;

use App\Core\Controllers\ApiController;
use Illuminate\Support\Facades\Gate;
use App\Http\Championships\Models\FixtureStatus;

class FixtureStatusController extends ApiController
{

    public function index(FixtureStatusRepository $countries)
    {
        if (Gate::denies('view', new FixtureStatus())) {
            return $this->respondForbidden("You don't have permission");
        }
        $countries = $countries->paginate(12);
        return new FixtureStatusCollection($countries);
    }

    public function show(FixtureStatusRepository $fixtureStatus)
    {
        if (Gate::denies('view', new FixtureStatus())) {
            return $this->respondForbidden("You don't have permission");
        }
        return new FixtureStatusResource($fixtureStatus);
    }

    public function update(FixtureStatusRepository $fixtureStatus)
    {
        if (Gate::denies('update', new FixtureStatus())) {
            return $this->respondForbidden("You don't have permission");
        }
        $fixtureStatus = $fixtureStatus->update(request()->all());

        return [
            'message' => 'FixtureStatus Updated Successfully',
            'body' => $fixtureStatus
        ];
    }

    public function store(FixtureStatusRepository $fixtureStatus)
    {
        if (Gate::denies('create', new FixtureStatus())) {
            return $this->respondForbidden("You don't have permission");
        }
        $fixtureStatus = $fixtureStatus->create(request()->all());

        return [
            'message' => 'FixtureStatus Created Successfully',
            'entry' => $fixtureStatus
        ];
    }
}
