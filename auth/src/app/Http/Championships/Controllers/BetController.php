<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\BetRepository;
use App\Http\Championships\Resources\Bet as BetResource;
use App\Http\Championships\Resources\BetCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Bet;
use Illuminate\Support\Facades\Gate;

class BetController extends ApiController
{
    public $per_page = 10;

    public function index(BetRepository $countries)
    {
        if (Gate::denies('view', new Bet())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        if (request()->has('per_page') && request()->per_page < 20) {
            $this->per_page = request()->per_page;
        }
        $countries = $countries->paginate($this->per_page);
        return new BetCollection($countries);
    }

    public function show(BetRepository $bet)
    {
        if (Gate::denies('view', new Bet())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        return new BetResource($bet);
    }

    public function update(BetRepository $bet)
    {
        if (Gate::denies('update', new Bet())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $bet->update(request()->all());

        return [
            'message' => 'Bet Updated Successfully',
            'entry' => $bet
        ];
    }

    public function store(BetRepository $bet)
    {
        if (Gate::denies('create', new Bet())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        $bet = $bet->create(request()->all());

        return [
            'message' => 'Bet Created Successfully',
            'entry' => $bet
        ];
    }
}
