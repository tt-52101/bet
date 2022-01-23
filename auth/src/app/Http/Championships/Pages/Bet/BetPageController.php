<?php

namespace App\Http\Championships\Pages\Bet;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Bet;
use App\Http\Championships\Pages\Bet\Views\BetEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Bet\Views\BetIndexView;
use App\Http\Championships\Resources\Bet as BetResource;

class BetPageController extends ApiController
{

    public function __construct(
        public BetIndexView $bets,
        public BetEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->bets->get();
        return $page;
    }

    public function edit(Bet $bet){
        $bet = (new BetResource($bet))->resolve();
        return $this->edit->get($bet);
    }

    public function new(){
        return $this->edit->get();
    }
}
