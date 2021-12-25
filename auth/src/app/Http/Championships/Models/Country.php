<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'code',
        'flag',
        'active'
    ];

    public function leagues()
    {
        return $this->hasMany(League::class, 'country_id');
    }
}
