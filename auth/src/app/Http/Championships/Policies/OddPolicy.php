<?php

namespace App\Http\Championships\Policies;

use App\Http\Odds\Models\Odd;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class OddPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('odd');
    }

    public function view(User $user, Odd $odd){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Odd $odd){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Odd $odd){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Odd $odd){
        return $this->defaultPolicy->canUser('delete');
    }
}
