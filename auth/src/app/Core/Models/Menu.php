<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\Filters\Filterable;
use App\Core\Scopes\MenuRoleScope;
use App\Core\Traits\Translatable;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use Filterable, NodeTrait;

    public $lang_id;

    protected $fillable = [
        'title',
        'name',
        'url',
        'icon',
        'order'
    ];

    protected $table = 'menus';

    protected static function booted(){
        static::addGlobalScope(new MenuRoleScope);
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function translations() {
        return $this->hasMany(MenuTranslation::class);
    }
}
