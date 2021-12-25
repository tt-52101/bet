<?php

namespace App\Http\Championships\Pages\Bookmaker;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\Bookmaker;
use App\Http\Championships\Pages\Bookmaker\Views\BookmakerEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\Bookmaker\Views\BookmakerIndexView;
use App\Http\Championships\Resources\Bookmaker as BookmakerResource;

class BookmakerPageController extends ApiController
{

    public function __construct(
        public BookmakerIndexView $bookmakers,
        public BookmakerEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->bookmakers->get();
        return $page;
    }

    public function edit(Bookmaker $bookmaker){
        $bookmaker = (new BookmakerResource($bookmaker))->resolve();
        return $this->edit->get($bookmaker);
    }

    public function new(){
        return $this->edit->get();
    }
}
