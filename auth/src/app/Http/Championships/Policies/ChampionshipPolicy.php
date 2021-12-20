<?php

namespace App\Http\Championships\Policies;

use App\Http\Championships\Models\Championship;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChampionshipPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('championship');
    }

    public function view(User $user, Championship $championship){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Championship $championship){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Championship $championship){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Championship $championship){
        return $this->defaultPolicy->canUser('delete');
    }
}
