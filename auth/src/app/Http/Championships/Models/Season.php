<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Season extends Model
{
    use Filterable;

    protected $fillable = [
        'league_id',
        'year',
        'start',
        'end',
        'current',
        'standings',
        'players',
        'events',
        'odds',
        'predictions',
    ];

    public function league(){
        return $this->belongsTo(League::class);
    }
}
