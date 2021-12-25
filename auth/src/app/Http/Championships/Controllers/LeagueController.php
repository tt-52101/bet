<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\LeagueRepository;
use App\Http\Championships\Resources\League as LeagueResource;
use App\Http\Championships\Resources\LeagueCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\League;

class LeagueController extends ApiController
{

    public $per_page = 10;

    public function index(LeagueRepository $countries)
    {
        if (request()->has('per_page') && request()->per_page < 20) {
            $this->per_page = request()->per_page;
        }
        $countries = $countries->paginate($this->per_page);
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
