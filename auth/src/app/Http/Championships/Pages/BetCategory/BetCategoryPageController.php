<?php

namespace App\Http\Championships\Pages\BetCategory;

use App\Core\Controllers\ApiController;
use App\Http\Championships\Models\BetCategory;
use App\Http\Championships\Pages\BetCategory\Views\BetCategoryEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Http\Championships\Pages\BetCategory\Views\BetCategoryIndexView;
use App\Http\Championships\Resources\BetCategory as BetCategoryResource;

class BetCategoryPageController extends ApiController
{

    public function __construct(
        public BetCategoryIndexView $bet_categorys,
        public BetCategoryEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->bet_categorys->get();
        return $page;
    }

    public function edit(BetCategory $bet_category){
        $bet_category = (new BetCategoryResource($bet_category))->resolve();
        return $this->edit->get($bet_category);
    }

    public function new(){
        return $this->edit->get();
    }
}
