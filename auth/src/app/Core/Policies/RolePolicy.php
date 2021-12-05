<?php

namespace App\Core\Policies;

use App\Core\Auth\Models\User;
use App\Core\Models\Role;

use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
            $this->defaultPolicy = new DefaultPolicy('role');
    }

    public function view(User $user, Role $policy){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Role $role){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Role $role){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Role $role){
        return $this->defaultPolicy->canUser('delete');
    }
}
