<?php

namespace App\Http\Championships\Controllers;

use App\Http\Championships\Repositories\BetRepository;
use App\Http\Championships\Resources\Bet as BetResource;
use App\Http\Championships\Resources\BetCollection;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Bet;

class BetController extends ApiController
{
    public $per_page = 10;

    public function index(BetRepository $countries)
    {
        if (request()->has('per_page') && request()->per_page < 20) {
            $this->per_page = request()->per_page;
        }
        $countries = $countries->paginate($this->per_page);
        return new BetCollection($countries);
    }

    public function show(BetRepository $bet)
    {
        return new BetResource($bet);
    }

    public function update(BetRepository $bet)
    {

        $bet->update(request()->all());

        return [
            'message' => 'Bet Updated Successfully',
            'entry' => $bet
        ];
    }

    public function store(BetRepository $bet)
    {

        $bet = $bet->create(request()->all());

        return [
            'message' => 'Bet Created Successfully',
            'entry' => $bet
        ];
    }
}
