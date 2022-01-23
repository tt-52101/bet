<?php

namespace App\Core\Models;

use App\Core\Filters\Filterable;
use App\Core\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'title',
        'user_entries'
    ];

    function userPolicies($user)
    {
        $role_ids = $user->roles()->pluck('id');
        return Policy::where('table_id', $this->id)->whereIn('policies.role_id', $role_ids)->get();
    }

}
