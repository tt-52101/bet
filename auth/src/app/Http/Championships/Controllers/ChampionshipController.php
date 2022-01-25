<?php

namespace App\Http\Championships\Controllers;

use App\Core\Auth\Models\User;
use App\Http\Championships\Models\BetSlipItem;
use App\Http\Championships\Resources\BetSlipItem as BetSlipItemResource;
use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Models\League;
use App\Http\Championships\Repositories\ChampionshipRepository;
use App\Http\Championships\Resources\BetSlipItemCollection;
use App\Http\Championships\Resources\Championship as ChampionshipResource;
use App\Http\Championships\Resources\ChampionshipCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Championship;
use App\Http\Championships\Resources\FixtureCollection;
use Illuminate\Support\Facades\Auth;
use App\Http\Championships\Filters\FixtureFilters;
use Illuminate\Support\Facades\Gate;

class ChampionshipController extends ApiController
{

    public function index(ChampionshipRepository $championships)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $championships = $championships->paginate(10);
        return new ChampionshipCollection($championships);
    }

    public function show(ChampionshipRepository $championship)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        return new ChampionshipResource($championship);
    }

    public function update(ChampionshipRepository $championship)
    {
        if (Gate::denies('update', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $championship->update(request()->all());

        return [
            'message' => 'Championship Updated Successfully',
            'entry' => $championship
        ];
    }

    public function store(ChampionshipRepository $championship)
    {
        if (Gate::denies('create', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $championship = $championship->create(request()->all());

        return [
            'message' => 'Championship Created Successfully',
            'entry' => $championship
        ];
    }

    public function join(ChampionshipRepository $championship)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $championship = $championship->get();
        $user = Auth::user()->id;

        // Check if already joined
        if ($championship->hasJoined($user)) {
            return $this->respondForbidden('You have already joined the Championship');
        }

        // Join Championship
        $championship->joinUser($user);

        return [
            'message' => 'You joined successfully',
            'entry' => $championship
        ];
    }


    public function addLeague(Championship $championship)
    {
        if (Gate::denies('create', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $league = League::find(request()->league_id);
        $championship->leagues()->attach($league);

        return [
            'message' => 'League Selected Successfully'
        ];
    }

    public function removeLeague(Championship $championship, League $league)
    {
        if (Gate::denies('create', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $championship->leagues()->detach($league);

        return [
            'message' => 'League Removed Successfully'
        ];
    }

    public function fixtures(Championship $championship)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $filters = new FixtureFilters(request());
        $fixtures = Fixture::filter($filters)->paginate(10);

        return new FixtureCollection($fixtures);
    }

    public function syncBetSlip(Championship $championship)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $user = Auth::user()->id;
        $selected_odds = request()->odd_ids;

        $championship->attachUniqueOdds($selected_odds);

        return [
            'message' => 'Updated Successfully',
        ];
    }

    public function betSlips(Championship $championship)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }

        // BetSlip User Items
        $user_id = Auth::user()->id;
        $bets = $championship->betSlipItems()->where('user_id', $user_id)->get();

        return new BetSlipItemCollection($bets);
    }

    public function betSlipIds(Championship $championship)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }
        $user_id = Auth::user()->id;

        return [
            'win' => 10,
            'odd_ids' => $championship->betSlipIds($user_id),
        ];
    }

    public function updateBetSlip(Championship $championship, BetSlipItem $betSlipItem)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }

        $betSlipItem->update([
            'points' => request()->points
        ]);


        return [
            'message' => "Updated Successfully " . request()->points,
            'body' => new BetSlipItemResource($betSlipItem)
        ];
    }

    public function deleteBetSlip(Championship $championship, BetSlipItem $betSlipItem)
    {
        if (Gate::denies('view', new Championship())) {
            return $this->respondForbidden("You don't have permission");
        }

        $betSlipItem->delete();


        return [
            'message' => "Deleted Successfully ",
        ];
    }
}
