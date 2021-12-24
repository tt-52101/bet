<?php

namespace App\Http\Championships\Pages\Country;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Country;
use App\Http\Championships\Pages\Country\Views\CountryEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Country\Views\CountryIndexView;
use App\Http\Championships\Resources\Country as CountryResource;

class CountryPageController extends ApiController
{

    public function __construct(
        public CountryIndexView $countrys,
        public CountryEditView  $edit
    )
    {
    }

    public function page()
    {
        $page = $this->countrys->get();
        return $page;
    }

    public function edit(Country $country){
        $country = (new CountryResource($country))->resolve();
        return $this->edit->get($country);
    }

    public function new(){
        return $this->edit->get();
    }
}
