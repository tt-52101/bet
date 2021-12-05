<?php

namespace App\Core\Policies;

use App\Core\Auth\Models\User;
use App\Core\Models\Language;

use Illuminate\Auth\Access\HandlesAuthorization;

class LanguagePolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('language');
    }

    public function view(User $user, Language $language){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Language $language){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Language $language){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Language $language){
        return $this->defaultPolicy->canUser('delete');
    }
}
