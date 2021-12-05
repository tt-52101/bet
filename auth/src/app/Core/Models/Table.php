<?php

namespace App\Core\Models;

use App\Core\Filters\Filterable;
use App\Core\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use Filterable, Translatable;

    public $lang_id;
    protected $fillable = [
        'name',
        'user_entries'
    ];

    public static $translation_key = 'role_id';

    public static $translated_columns = [
        'title',
        'lang_id',
        'table_id',
    ];

    protected $joins = [
        'tables' => [
            'select' => [
                'tables_tr.title as title',
                'tables_tr.lang_id as lng_id',
            ],
            'join' => 'tables_tr',
            'id' => 'table_id',
            'on' => 'tables',
            'on_id' => 'id',
            'translatable' => true,
        ]
    ];


    public function scopeLang($q, $lang)
    {
        $this->lang_id = $this->getLanguage($lang);

        $q->select(['tables.*']);

        $q->withTranslated();

        return $q;
    }


    public function translations()
    {
        return $this->hasMany(TableTranslation::class);
    }

    public function translatedColumns()
    {
        return $this->translated_columns;
    }

    function userPolicies($user)
    {
        $role_ids = $user->roles()->pluck('id');
        return Policy::where('table_id', $this->id)->whereIn('policies.role_id', $role_ids)->get();
    }

}
