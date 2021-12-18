<?php

namespace App\Core\Pages\User;

use App\Core\Controllers\ApiController;
use App\Core\Auth\Models\User;
use App\Core\Pages\User\Views\UserIndexView;
use App\Core\Pages\User\Views\UserEditView;
use App\Core\Auth\Resources\User as UserResource;
class UserPageController extends ApiController
{
    public function __construct(
        public UserIndexView $index,
        public UserEditView $edit,
    )
    {
    }

    public function page()
    {
        return $this->index->get();
    }

    public function edit(User $user){
        $user = (new UserResource($user))->resolve();
        return $this->edit->get($user);
    }

    public function new(){
        return $this->edit->get();
    }
}
