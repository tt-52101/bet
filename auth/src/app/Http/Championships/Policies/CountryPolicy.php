<?php

namespace App\Http\Championships\Policies;

use App\Http\Championships\Models\Country;
use App\Core\Auth\Models\User;
use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('country');
    }

    public function view(User $user, Country $country){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Country $country){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Country $country){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Country $country){
        return $this->defaultPolicy->canUser('delete');
    }
}
