<?php

namespace App\Core\Models;

use App\Core\Models\RoleTranslation;
use Illuminate\Database\Eloquent\Model;
use App\Core\Filters\Filterable;
use App\Core\Models\Role;

class Permission extends Model
{
    use Filterable;

    public $lang_id;

    protected $fillable = [
        'title',
        'name',
        'active',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
