<?php

namespace App\Core\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;


class LanguageTranslation extends Model
{
    use Filterable;
    protected $table = 'languages_tr';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'language_id',
        'lang_id',
    ];
}
