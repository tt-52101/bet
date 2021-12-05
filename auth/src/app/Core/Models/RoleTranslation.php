<?php

namespace App\Core\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;


class RoleTranslation extends Model
{
    use Filterable;
    protected $table = 'roles_tr';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'role_id',
        'lang_id',
    ];
}
