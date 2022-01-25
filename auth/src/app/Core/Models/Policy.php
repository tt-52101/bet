<?php

namespace App\Core\Models;

use App\Core\Models\Language;
use App\Core\Models\PolicyTranslation;

use App\Core\Filters\Filterable;
use App\Core\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use Filterable;


    protected $fillable = [
        'table_id',
        'role_id',
        'create',
        'read',
        'update',
        'delete',
        'user_entries'
    ];

    public function table(){
        return $this->belongsTo(Table::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
