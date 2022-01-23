<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class ChampionshipBet extends Model
{
    use Filterable;
    protected $table = 'championship_bets';

    protected $fillable = [
        'user_id',
        'championship_id',
        'odd_id',
        'points',
        'odds'
    ];

    public function odd() {
        return $this->belongsTo(Odd::class);
    }
}
