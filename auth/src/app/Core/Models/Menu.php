<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;
use App\Core\Filters\Filterable;
use App\Core\Scopes\MenuRoleScope;
use App\Core\Traits\Translatable;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use Filterable, NodeTrait, Translatable;

    public $lang_id;
    public static $translated_columns = [
        'title',
        'menu_id',
        'lang_id'
    ];

    protected $fillable = [
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

    public function translatedColumns(){
        return $this->translated_columns;
    }

    public function scopeLang($q, $lang = 'GR') {
        $this->lang_id = $this->getLanguage($lang);

        $q->addSelect(['menus.*','menus_tr.lang_id', 'menus_tr.title']) ;

        $q->leftJoin('menus_tr', function($join) {
            $join->on('menus_tr.menu_id','=', 'menus.id');
        });

        $q->WhereRaw("
            case when exists(
               select trans.id from menus_tr as trans
               where trans.menu_id = menus.id and trans.lang_id = $this->lang_id)
               then
                    menus_tr.lang_id = $this->lang_id
               else
                    menus_tr.lang_id = 1
               end
        ");

        return $q;
    }
}
