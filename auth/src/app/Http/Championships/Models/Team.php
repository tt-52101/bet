<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'league_id',
        'country_id',
        'team_id',
        'national',
        'logo',
        'founded',
        'api_id'
    ];


    public function league()
    {
        return $this->belongsTo(League::class, 'league_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function homeFixtures(){
        return $this->hasMany(Fixture::class, 'home_id');
    }

    public function awayFixtures(){
        return $this->hasMany(Fixture::class, 'home_id');
    }
}
