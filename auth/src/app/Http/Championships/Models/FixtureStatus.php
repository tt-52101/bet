<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class FixtureStatus extends Model
{
    use Filterable;

    protected $fillable = [
        'title',
        'name',
    ];
}
