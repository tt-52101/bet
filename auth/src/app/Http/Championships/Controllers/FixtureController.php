<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\FixtureRepository;
use App\Http\Championships\Resources\Fixture as FixtureResource;
use App\Http\Championships\Resources\FixtureCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Fixture;

class FixtureController extends ApiController
{

    public function index(FixtureRepository $countries)
    {
        $countries = $countries->paginate(10);
        return new FixtureCollection($countries);
    }

    public function show(FixtureRepository $fixture)
    {
        return new FixtureResource($fixture);
    }

    public function update(FixtureRepository $fixture)
    {

        $fixture->update(request()->all());

        return [
            'message' => 'Fixture Updated Successfully',
            'entry' => $fixture
        ];
    }

    public function store(FixtureRepository $fixture)
    {

        $fixture = $fixture->create(request()->all());

        return [
            'message' => 'Fixture Created Successfully',
            'entry' => $fixture
        ];
    }
}
