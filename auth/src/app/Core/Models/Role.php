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
    use Filterable, Translatable;

    public $lang_id;

    public static $translation_key = 'role_id';

    protected $fillable = [
        'name',
        'public',
        'active',
    ];

    public static $translated_columns = [
        'title',
        'role_id',
        'lang_id',
    ];

    protected $joins = [
        'roles' => [
            'select' => [
                'roles_tr.title as title',
                'roles_tr.lang_id as lng_id',
            ],
            'join' => 'roles_tr',
            'id' => 'role_id',
            'on' => 'roles',
            'on_id' => 'id',
            'translatable' => true,
        ]
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    public function translations()
    {
        return $this->hasMany(RoleTranslation::class);
    }

    public function translatedColumns()
    {
        return $this->translated_columns;
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function scopeLang($q, $lang = 'gr')
    {
        $this->lang_id = $this->getLanguage($lang);

        $q->select(['roles.*']);

        $q->withTranslated();

        return $q;
    }

}
