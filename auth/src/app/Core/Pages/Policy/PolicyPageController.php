<?php

namespace App\Core\Pages\Policy;

use App\Core\Controllers\ApiController;
use App\Core\Models\Policy;
use App\Core\Pages\Policy\Views\PolicyEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Core\Pages\Policy\Views\PolicyIndexView;
use App\Core\Resources\Policy as PolicyResource;

class PolicyPageController extends ApiController
{

    public function __construct(
        public PolicyIndexView $policys,
        public PolicyEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->policys->get();
        return $page;
    }

    public function edit(Policy $policy){
        $policy = (new PolicyResource($policy))->resolve();
        return $this->edit->get($policy);
    }

    public function new(){
        return $this->edit->get();
    }
}
