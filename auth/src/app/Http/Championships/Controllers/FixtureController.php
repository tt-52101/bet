<?php

namespace App\Http\Championships\Controllers;

use App\Core\Auth\Models\User;
use App\Http\Championships\Repositories\FixtureRepository;
use App\Http\Championships\Resources\Fixture as FixtureResource;
use App\Http\Championships\Resources\FixtureCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Fixture;
use Illuminate\Support\Facades\Gate;

class FixtureController extends ApiController
{
    public $per_page = 10;

    public function index(FixtureRepository $fixtures)
    {
        if (Gate::denies('view', new Fixture())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        if (request()->has('per_page') && request()->per_page < 20) {
            $this->per_page = request()->per_page;
        }
        $fixtures = $fixtures->paginate($this->per_page);
        return new FixtureCollection($fixtures);
    }

    public function show(FixtureRepository $fixture)
    {
        if (Gate::denies('view', new Fixture())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        return new FixtureResource($fixture);
    }

    public function update(FixtureRepository $fixture)
    {
        if (Gate::denies('update', new Fixture())) {
            return $this->respondForbidden("You don't have permission to update");
        }
        $fixture = $fixture->update(request()->all());

        return [
            'message' => 'Fixture Updated Successfully',
            'body' => $fixture
        ];
    }

    public function store(FixtureRepository $fixture)
    {
        if (Gate::denies('create', new Fixture())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $fixture = $fixture->create(request()->all());

        return [
            'message' => 'Fixture Created Successfully',
            'entry' => $fixture
        ];
    }
}
