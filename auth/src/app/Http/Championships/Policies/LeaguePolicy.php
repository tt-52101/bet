<?php

namespace App\Http\Championships\Policies;

use App\Http\Leagues\Models\League;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaguePolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('league');
    }

    public function view(User $user, League $league){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, League $league){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, League $league){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, League $league){
        return $this->defaultPolicy->canUser('delete');
    }
}
