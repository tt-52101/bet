<?php

namespace App\Core\Policies;

use App\Core\Auth\Models\User;
use App\Core\Models\Policy;

use Illuminate\Auth\Access\HandlesAuthorization;

class PolicyPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('policy');
    }

    public function view(User $user, Policy $policy){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Policy $policy){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Policy $policy){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Policy $policy){
        return $this->defaultPolicy->canUser('delete');
    }
}
