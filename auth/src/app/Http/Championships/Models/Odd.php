<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Odd extends Model
{
    use Filterable;

    protected $fillable = [
        'value',
        'odd',
        'fixture_id',
        'bookmaker_id',
        'bet_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(BetCategory::class, 'bet_category_id');
    }

    public function fixture()
    {
        return $this->belongsTo(Fixture::class, 'fixture_id');
    }

    public function bookmaker()
    {
        return $this->belongsTo(Bookmaker::class, 'bookmaker_id');
    }
}
