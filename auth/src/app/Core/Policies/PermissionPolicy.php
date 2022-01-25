<?php

namespace App\Core\Policies;

use App\Core\Auth\Models\User;
use App\Core\Models\Permission;

use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
            $this->defaultPolicy = new DefaultPolicy('permission');
    }

    public function view(User $user, Permission $policy){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Permission $permission){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Permission $permission){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Permission $permission){
        return $this->defaultPolicy->canUser('delete');
    }
}
