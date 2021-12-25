<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'type',
        'logo',
        'active'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function fixtures(){
        return $this->hasMany(Fixture::class, 'league_id');
    }
}
