<?php

namespace App\Http\Championships\Policies;

use App\Http\Championships\Models\BetCategory;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Core\Auth\Models\User;

class BetCategoryPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('bet_category');
    }

    public function view(User $user, BetCategory $bet_category){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, BetCategory $bet_category){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, BetCategory $bet_category){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, BetCategory $bet_category){
        return $this->defaultPolicy->canUser('delete');
    }
}
