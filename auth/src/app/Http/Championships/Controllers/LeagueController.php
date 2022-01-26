<?php

namespace App\Http\Championships\Controllers;

use App\Core\Auth\Models\User;
use App\Http\Championships\Jobs\SyncLeagueOdds;
use App\Http\Championships\Repositories\LeagueRepository;
use App\Http\Championships\Resources\League as LeagueResource;
use App\Http\Championships\Resources\LeagueCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\League;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Http\Championships\Jobs\SyncLeagueFixtures;

class LeagueController extends ApiController
{

    public $per_page = 10;

    public function index(LeagueRepository $countries)
    {
        if (Gate::denies('view', new League())) {
            return $this->respondForbidden("You don't have permission");
        }
        if (request()->has('per_page') && request()->per_page < 20) {
            $this->per_page = request()->per_page;
        }
        $countries = $countries->paginate($this->per_page);
        return new LeagueCollection($countries);
    }

    public function show(LeagueRepository $league)
    {
        if (Gate::denies('view', new League())) {
            return $this->respondForbidden("You don't have permission");
        }
        return new LeagueResource($league);
    }

    public function update(LeagueRepository $league)
    {
        if (Gate::denies('uodate', new League())) {
            return $this->respondForbidden("You don't have permission");
        }
        $league->update(request()->all());

        return [
            'message' => 'League Updated Successfully',
            'entry' => $league
        ];
    }

    public function store(LeagueRepository $league)
    {
        if (Gate::denies('create', new League())) {
            return $this->respondForbidden("You don't have permission");
        }
        $league = $league->create(request()->all());

        return [
            'message' => 'League Created Successfully',
            'entry' => $league
        ];
    }

    public function syncOdds(League $league) {

        $season = Carbon::parse(request()->from)->format('Y');
        $job = new SyncLeagueOdds($league, $season);
        $this->dispatch($job);

        return [
            'message' => 'League Sync Started',
        ];
    }

    public function syncFixtures(League $league) {
        $from = request()->get('from');
        $to = request()->get('to');

        $sync_job = new SyncLeagueFixtures($league, $from, $to);
        $this->dispatch($sync_job);

        return [
            'message' => 'League Sync Started',
        ];
    }
}
