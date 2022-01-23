<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class ChampionshipMember extends Model
{
    use Filterable;
    protected $table = 'championship_user';

    protected $fillable = [
        'user_id',
        'championship_id',
        'points',
    ];

    public function championship(){
        return $this->hasOne(Championship::class);
    }
}
