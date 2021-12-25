<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmaker extends Model
{
    use Filterable;

    protected $fillable = [
        'name',
        'api_id'
    ];
}
