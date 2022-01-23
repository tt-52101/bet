<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use Filterable;

    protected $table = 'championship_bets';

    protected $fillable = [
        'user_id',
        'championship_id',
        'odd_id',
        'return',
        'fixture_id',
        'status',
        'points',
        'odds'
    ];

    public function championshipOdd()
    {
        return $this->belongsTo(Odd::class, 'odd_id');
    }

    public function fixture()
    {
        return $this->belongsTo(Fixture::class);
    }

    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }
}
