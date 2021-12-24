<?php

namespace App\Http\Championships\Policies;

use App\Http\Teams\Models\Team;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('team');
    }

    public function view(User $user, Team $team){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Team $team){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Team $team){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Team $team){
        return $this->defaultPolicy->canUser('delete');
    }
}
