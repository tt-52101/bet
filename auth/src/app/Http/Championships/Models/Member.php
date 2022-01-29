<?php

namespace App\Http\Championships\Models;

use App\Core\Auth\Models\User;
use App\Core\Filters\Filterable;
use App\Http\Championships\Factories\ChampionshipFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use Filterable;

    protected $table = 'championship_user';

    protected $fillable = [
        'points',
        'start_points'
    ];

    public function championship(){
        return $this->belongsTo(Championship::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bets(){
        return $this->hasMany(Bet::class, 'championship_id', 'championship_id');
    }

    public function wins(){
        return $this->bets()->where('status', 1);
    }
}
