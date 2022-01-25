<?php

namespace App\Core\Models;

use App\Core\Models\RoleTranslation;
use App\Core\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Core\Filters\Filterable;
use App\Core\Models\Policy;
use App\Core\Auth\Models\User;

class Role extends Model
{
    use Filterable;

    public $lang_id;

    protected $fillable = [
        'title',
        'name',
        'public',
        'active',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }
}
