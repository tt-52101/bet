<?php

namespace App\Core\Pages\Table;

use App\Core\Controllers\ApiController;
use App\Core\Models\Table;
use App\Core\Resources\Table as TableResource;

use App\Core\Pages\Table\Components\TableCard;
use App\Core\Pages\Table\Views\TableIndexView;
use App\Core\Pages\Table\Views\TableEditView;
class TablePageController extends ApiController
{
    public function __construct(
        public TableIndexView $index,
        public TableEditView $edit,
    )
    {
    }

    public function page()
    {
        $card = new TableCard();
        $page = new TableIndexView($card);
        return $page->get();
    }

    public function edit(Table $table){
        $table = (new TableResource($table))->resolve();
        $page = new TableEditView();
        return $page->get($table);
    }

    public function new(){
        return $this->edit->get();
    }
}
