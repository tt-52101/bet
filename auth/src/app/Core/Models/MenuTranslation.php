<?php

namespace App\Core\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    use Filterable;

    protected $fillable = [
        'title',
        'menu_id',
        'lang_id',
    ];

    protected $table = 'menus_tr';
}
