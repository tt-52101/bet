<?php

namespace App\Core\Controllers;


use App\Core\Filters\FixtureFilters;
use App\Models\Fixture;
use App\Core\Resources\FixtureCollection;

class FixtureController extends ApiController
{

    public function index(FixtureFilters $filters)
    {
        $fixture = Fixture::filter($filters)->hasOdds()->orderBy('fixture.date', 'desc')->paginate(10);

        return new FixtureCollection($fixture);
    }

}
