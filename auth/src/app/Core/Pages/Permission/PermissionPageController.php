<?php

namespace App\Core\Pages\Permission;

use App\Core\Controllers\ApiController;
use App\Core\Models\Permission;
use App\Core\Pages\Permission\Views\PermissionEditView;
use BenBodan\BetUi\Components\{Column, Page, Row, Card};
use App\Core\Pages\Permission\Views\PermissionIndexView;
use App\Core\Resources\Permission as PermissionResource;

class PermissionPageController extends ApiController
{

    public function __construct(
        public PermissionIndexView $permissions,
        public PermissionEditView $edit
    )
    {
    }

    public function page()
    {
        $page = $this->permissions->get();
        return $page;
    }

    public function edit(Permission $permission){
        $permission = (new PermissionResource($permission))->resolve();
        return $this->edit->get($permission);
    }

    public function new(){
        return $this->edit->get();
    }
}
