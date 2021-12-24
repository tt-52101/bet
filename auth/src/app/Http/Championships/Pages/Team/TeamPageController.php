<?php

namespace App\Http\Championships\Pages\Team;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Team;
use App\Http\Championships\Pages\Team\Views\TeamEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Team\Views\TeamIndexView;
use App\Http\Championships\Resources\Team as TeamResource;

class TeamPageController extends ApiController
{

    public function __construct(
        public TeamIndexView $teams,
        public TeamEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->teams->get();
        return $page;
    }

    public function edit(Team $team){
        $team = (new TeamResource($team))->resolve();
        return $this->edit->get($team);
    }

    public function new(){
        return $this->edit->get();
    }
}
