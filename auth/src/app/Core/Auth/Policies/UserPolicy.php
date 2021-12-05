<?php

namespace App\Core\Auth\Policies;

use App\Core\Auth\Models\User;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('user');
    }

    public function view(User $authenticated, User $policy){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $authenticated, User $user){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $authenticated, User $user){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $authenticated, User $user){
        return $this->defaultPolicy->canUser('delete');
    }
}
