<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class BetSlipItem extends Model
{
    use Filterable;
    protected $table = 'championship_bet_slips';

    protected $fillable = [
        'user_id',
        'championship_id',
        'odd_id',
        'points',
    ];

    public function odd() {
        return $this->belongsTo(Odd::class);
    }
}
