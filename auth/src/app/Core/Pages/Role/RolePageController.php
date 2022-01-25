<?php

namespace App\Core\Pages\Role;

use App\Core\Controllers\ApiController;
use App\Core\Models\Role;
use App\Core\Pages\Role\Views\RoleEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Core\Pages\Role\Views\RoleIndexView;
use App\Core\Resources\Role as RoleResource;

class RolePageController extends ApiController
{

    public function __construct(
        public RoleIndexView $roles,
        public RoleEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->roles->get();
        return $page;
    }

    public function edit(Role $role){
        $role = (new RoleResource($role))->resolve();
        return $this->edit->get($role);
    }

    public function new(){
        return $this->edit->get();
    }
}
