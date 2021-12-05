<?php

namespace App\Core\Models;

use App\Core\Auth\Models\Policy;
use App\Core\Auth\Models\Role;
use App\Core\Auth\Models\TableTranslation;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use App\Core\Models\Country;
use App\Core\Traits\Translatable;

class Language extends Model
{
    use Filterable, Translatable;

    public $lang_id;

    public static $translation_key = 'language_id';

    protected $fillable = [
        'active',
        'code'
    ];

    public static $translated_columns = [
        'title',
        'lang_id',
        'language_id',
    ];

    protected $joins = [
        'tables' => [
            'select' => [
                'languages_tr.title as title',
                'languages_tr.lang_id as lng_id',
            ],
            'join' => 'languages_tr',
            'id' => 'language_id',
            'on' => 'languages',
            'on_id' => 'id',
            'translatable' => true,
        ]
    ];


    public function translations()
    {
        return $this->hasMany(LanguageTranslation::class);
    }

    public function translatedColumns()
    {
        return $this->translated_columns;
    }

    public function scopeLang($q, $lang = 'gr')
    {
        $this->lang_id = $this->getLanguage($lang);

        $q->select(['languages.*']);

        $q->withTranslated();

        return $q;
    }


    public function ScopeIsActive($q)
    {
        return $q->where('active', true);
    }

    public static function preview()
    {
        $fields = [];

        $fields['title'] = [
            'label' => 'Title',
            'type' => 'displayValue',
            'key' => 'title'
        ];

        $fields['code'] = [
            'label' => 'Code',
            'type' => 'displayValue',
            'key' => 'code'
        ];

        $fields['active'] = [
            'label' => 'Active',
            'type' => 'displayTrueFalse',
            'key' => 'active',
            'language_only' => true,
        ];

        return [
            'fields' => $fields,
            'config' => [
                'icon' => 'person',
                'title' => 'Languages',
                'title_key' => 'title'
            ]
        ];
    }
}
