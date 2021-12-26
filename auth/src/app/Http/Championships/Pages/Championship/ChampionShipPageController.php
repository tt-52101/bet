<?php

namespace App\Http\Championships\Pages\Championship;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Championship;
use App\Http\Championships\Models\League;
use App\Http\Championships\Pages\Championship\Views\ChampionshipEditView;
use App\Http\Championships\Pages\League\LeagueSelectWizard;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Championship\Views\ChampionshipIndexView;
use App\Http\Championships\Resources\Championship as ChampionshipResource;

class ChampionShipPageController extends ApiController
{

    public function __construct(
        public ChampionshipIndexView $championships,
        public ChampionshipEditView  $edit
    )
    {
    }

    public function page()
    {
        $page = $this->championships->get();
        return $page;
    }

    public function edit(Championship $championship)
    {
        $championship = (new ChampionshipResource($championship))->resolve();
        return $this->edit->get($championship);
    }

    public function new()
    {
        return $this->edit->get();
    }

    public function leagueSelect($championship)
    {
        $url = env('APP_URL') . "/auth/api/championship/$championship/league";
        $wizard = new LeagueSelectWizard($url);
        return $wizard->wizard();
    }
}
