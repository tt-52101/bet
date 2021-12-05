<?php

namespace App\Core\Policies;

use App\Core\Auth\Models\User;
use App\Core\Models\Menu;

use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('menu');
    }

    public function view(User $user, Menu $menu){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Menu $menu){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Menu $menu){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Menu $menu){
        return $this->defaultPolicy->canUser('delete');
    }
}
