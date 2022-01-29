<?php

namespace App\Http\Championships\Pages\Season;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Season;
use App\Http\Championships\Pages\Season\Views\SeasonEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Season\Views\SeasonIndexView;
use App\Http\Championships\Resources\Season as SeasonResource;

class SeasonPageController extends ApiController
{

    public function __construct(
        public SeasonIndexView $seasons,
        public SeasonEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->seasons->get();
        return $page;
    }

    public function edit(Season $season){
        $season = (new SeasonResource($season))->resolve();
        return $this->edit->get($season);
    }

    public function new(){
        return $this->edit->get();
    }
}
