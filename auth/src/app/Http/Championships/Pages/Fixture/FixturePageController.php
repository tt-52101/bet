<?php

namespace App\Http\Championships\Pages\Fixture;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Fixture;
use App\Http\Championships\Pages\Fixture\Views\FixtureEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Fixture\Views\FixtureIndexView;
use App\Http\Championships\Resources\Fixture as FixtureResource;

class FixturePageController extends ApiController
{

    public function __construct(
        public FixtureIndexView $fixtures,
        public FixtureEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->fixtures->get();
        return $page;
    }

    public function edit(Fixture $fixture){
        $fixture = (new FixtureResource($fixture))->resolve();
        return $this->edit->get($fixture);
    }

    public function new(){
        return $this->edit->get();
    }
}
