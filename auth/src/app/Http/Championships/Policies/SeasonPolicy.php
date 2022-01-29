<?php

namespace App\Http\Championships\Policies;

use App\Http\Championships\Models\Season;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Core\Auth\Models\User;

class SeasonPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('season');
    }

    public function view(User $user, Season $season){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Season $season){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Season $season){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Season $season){
        return $this->defaultPolicy->canUser('delete');
    }
}
