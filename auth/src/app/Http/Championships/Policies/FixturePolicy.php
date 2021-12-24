<?php

namespace App\Http\Championships\Policies;

use App\Http\Fixtures\Models\Fixture;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class FixturePolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('fixture');
    }

    public function view(User $user, Fixture $fixture){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Fixture $fixture){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Fixture $fixture){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Fixture $fixture){
        return $this->defaultPolicy->canUser('delete');
    }
}
