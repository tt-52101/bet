<?php

namespace App\Http\Championships\Policies;

use App\Http\Championships\Models\Bet;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Core\Auth\Models\User;

class BetPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('bet');
    }

    public function view(User $user, Bet $bet){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Bet $bet){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Bet $bet){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Bet $bet){
        return $this->defaultPolicy->canUser('delete');
    }
}
