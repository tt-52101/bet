<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\SeasonRepository;
use App\Http\Championships\Resources\Season as SeasonResource;
use App\Http\Championships\Resources\SeasonCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Season;
use Illuminate\Support\Facades\Gate;

class SeasonController extends ApiController
{

    public function index(SeasonRepository $countries)
    {
        if (Gate::denies('view', new Season())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $countries = $countries->paginate(12);
        return new SeasonCollection($countries);
    }

    public function show(SeasonRepository $season)
    {
        if (Gate::denies('view', new Season())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        return new SeasonResource($season);
    }

    public function update(SeasonRepository $season)
    {
        if (Gate::denies('update', new Season())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $season->update(request()->all());

        return [
            'message' => 'Season Updated Successfully',
            'entry' => $season
        ];
    }

    public function store(SeasonRepository $season)
    {
        if (Gate::denies('create', new Season())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $season = $season->create(request()->all());

        return [
            'message' => 'Season Created Successfully',
            'entry' => $season
        ];
    }
}
