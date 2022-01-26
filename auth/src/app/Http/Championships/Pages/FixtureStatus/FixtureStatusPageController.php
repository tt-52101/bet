<?php

namespace App\Http\Championships\Pages\FixtureStatus;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\FixtureStatus;
use App\Http\Championships\Pages\FixtureStatus\Views\FixtureStatusEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\FixtureStatus\Views\FixtureStatusIndexView;
use App\Http\Championships\Resources\FixtureStatus as FixtureStatusResource;

class FixtureStatusPageController extends ApiController
{

    public function __construct(
        public FixtureStatusIndexView $fixture_statuses,
        public FixtureStatusEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->fixture_statuses->get();
        return $page;
    }

    public function edit(FixtureStatus $fixtureStatus){
        $fixtureStatus = (new FixtureStatusResource($fixtureStatus))->resolve();
        return $this->edit->get($fixtureStatus);
    }

    public function new(){
        return $this->edit->get();
    }
}
