<?php

namespace App\Core\Pages\User;

use App\Core\Controllers\ApiController;
use App\Core\Auth\Models\User;
use App\Core\Pages\User\Views\UserIndexView;
use App\Core\Pages\User\Views\UserEditView;

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
        return $this->edit->get($user->toArray());
    }

    public function new(){
        return $this->edit->get();
    }
}
