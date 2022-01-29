<?php

namespace App\Http\Championships\Policies;

use App\Http\Championships\Models\Member;
use App\Core\Auth\Models\User;

use App\Core\Policies\DefaultPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy extends DefaultPolicy
{
    use HandlesAuthorization;
    protected $defaultPolicy;
    protected $table_name;

    function __construct(){
        $this->defaultPolicy = new DefaultPolicy('member');
    }

    public function view(User $user, Member $member){
        return $this->defaultPolicy->canUser('read');
    }

    public function create(User $user, Member $member){
        return $this->defaultPolicy->canUser('create');
    }

    public function update(User $user, Member $member){
        return $this->defaultPolicy->canUser('update');
    }

    public function delete(User $user, Member $member){
        return $this->defaultPolicy->canUser('delete');
    }
}
