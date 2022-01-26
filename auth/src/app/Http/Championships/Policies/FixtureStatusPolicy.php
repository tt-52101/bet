<?php

namespace App\Http\Championships\Policies;

use App\Http\Championships\Models\FixtureStatus;
use App\Core\Auth\Models\User;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class FixtureStatusPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('fixture_status');
    }

    public function view(User $user, FixtureStatus $fixtureStatus){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, FixtureStatus $fixtureStatus){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, FixtureStatus $fixtureStatus){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, FixtureStatus $fixtureStatus){
        return $this->defaultPolicy->canUser('delete');
    }
}
