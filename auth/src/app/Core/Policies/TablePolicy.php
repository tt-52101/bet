<?php

namespace App\Core\Policies;

use App\Core\Auth\Models\User;
use App\Core\Models\Table;

use Illuminate\Auth\Access\HandlesAuthorization;

class TablePolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('table');
    }

    public function view(User $user, Table $table){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Table $table){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Table $table){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Table $table){
        return $this->defaultPolicy->canUser('delete');
    }
}
