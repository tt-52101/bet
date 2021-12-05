<?php

namespace App\Core\Models;

use App\Core\Models\Language;
use App\Core\Models\PolicyTranslation;

use App\Core\Filters\Filterable;
use App\Core\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use Filterable, Translatable;

    public $lang_id;
    public static $translation_key = 'policy_id';

    protected $fillable = [
        'table_id',
        'role_id',
        'name',
        'create',
        'read',
        'update',
        'delete',
        'user_entries'
    ];

    public static $translated_columns = [
        'comments',
        'lang_id',
        'policy_id',
    ];

    protected $joins = [
        'policies' => [
            'select' => [
                'policies_tr.lang_id as lng_id',
                'policies_tr.comments as comments'
            ],
            'join' => 'policies_tr',
            'id' => 'policy_id',
            'on' => 'policies',
            'on_id' => 'id',
            'translatable' => true,
        ],
        'tables' => [
            'select' => [
                'tables_tr.title as table_title',
            ],
            'join' => 'tables_tr',
            'id' => 'table_id',
            'on' => 'policies',
            'on_id' => 'table_id',
            'translatable' => true,
        ],
        'roles' => [
            'select' => [
                'roles_tr.title as role_title',
            ],
            'join' => 'roles_tr',
            'id' => 'role_id',
            'on' => 'policies',
            'on_id' => 'role_id',
            'translatable' => true,
        ]
    ];


    public function scopeLang($q, $lang = 'gr')
    {
        $this->lang_id = $this->getLanguage($lang);

        $q->select(['policies.*']);

        $q->withTranslated();

        return $q;
    }


    public function translations()
    {
        return $this->hasMany(PolicyTranslation::class);
    }

    public function translatedColumns()
    {
        return $this->translated_columns;
    }
}
