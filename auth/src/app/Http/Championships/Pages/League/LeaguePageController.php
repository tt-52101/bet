<?php

namespace App\Http\Championships\Pages\League;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\League;
use App\Http\Championships\Pages\League\Components\LeagueCard;
use App\Http\Championships\Pages\League\Views\LeagueEditView;
use App\Http\Championships\Pages\League\Views\LeagueIndexView;
use App\Http\Championships\Resources\League as LeagueResource;

class LeaguePageController extends ApiController
{

    public function __construct(
        public LeagueIndexView $leagues,
        public LeagueEditView  $edit,
    )
    {
    }

    public function page()
    {
        $card = new LeagueCard();
        $leagues = new LeagueIndexView($card);
        $page = $leagues->get();
        return $page;
    }

    public function edit(League $league)
    {
        $league = (new LeagueResource($league))->resolve();
        return $this->edit->get($league);
    }

    public function new()
    {
        return $this->edit->get();
    }
}
