<?php

namespace App\Http\Championships\Policies;

use App\Http\Bookmakers\Models\Bookmaker;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookmakerPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('bookmaker');
    }

    public function view(User $user, Bookmaker $bookmaker){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Bookmaker $bookmaker){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Bookmaker $bookmaker){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Bookmaker $bookmaker){
        return $this->defaultPolicy->canUser('delete');
    }
}
