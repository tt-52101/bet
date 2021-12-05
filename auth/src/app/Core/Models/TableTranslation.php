<?php

namespace App\Core\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class TableTranslation extends Model
{
    use Filterable;
    protected $table = 'tables_tr';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'lang_id',
        'table_id',
    ];
}
