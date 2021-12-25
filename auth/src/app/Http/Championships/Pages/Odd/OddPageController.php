<?php

namespace App\Http\Championships\Pages\Odd;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Odd;
use App\Http\Championships\Pages\Odd\Views\OddEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Odd\Views\OddIndexView;
use App\Http\Championships\Resources\Odd as OddResource;

class OddPageController extends ApiController
{

    public function __construct(
        public OddIndexView $odds,
        public OddEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->odds->get();
        return $page;
    }

    public function edit(Odd $odd){
        $odd = (new OddResource($odd))->resolve();
        return $this->edit->get($odd);
    }

    public function new(){
        return $this->edit->get();
    }
}
