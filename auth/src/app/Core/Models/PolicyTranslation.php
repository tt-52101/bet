<?php

namespace App\Core\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;


class PolicyTranslation extends Model
{
    use Filterable;
    protected $table = 'policies_tr';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comments',
        'lang_id',
        'policy_id',
    ];
}
