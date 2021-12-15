<?php

namespace App\Core\Pages\User;

use App\Core\Controllers\ApiController;
use App\Core\Pages\User\Views\IndexView;
use App\Core\Pages\User\Views\UserEditView;
use App\Core\Auth\Models\User;

class UserPageController extends ApiController
{
    public function __construct(
        public IndexView $index,
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
}
