<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Fixture extends Model
{
    use Filterable;

    protected $fillable = [
        'api_id',

        'country_id',
        'league_id',

        'home_id',
        'away_id',

        'home_winner',
        'away_winner',

        'home_goals',
        'away_goals',

        'date',
        'status',
    ];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] =  Carbon::parse($value);
    }

    public function home()
    {
        return $this->belongsTo(Team::class, 'home_id');
    }

    public function away()
    {
        return $this->belongsTo(Team::class, 'away_id');
    }

    public function league()
    {
        return $this->belongsTo(League::class, 'league_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function odds(){
        return $this->hasMany(Odd::class, 'fixture_id');
    }
}
