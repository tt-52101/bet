<?php

namespace App\Http\Championships\Models;

use App\Core\Auth\Models\User;
use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    use Filterable;

    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'points',
        'football'
    ];

    public function leagues()
    {
        return $this->belongsToMany(League::class, 'championship_leagues');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'championship_user')
            ->withPivot('points', 'start_points', 'position');
    }

    public function hasJoined($user_id)
    {

        $joins = Championship::where('id',$this->id)->whereHas('users', function ($q) use ($user_id) {
            $q->where('users.id', $user_id);
        })->get();

        return count($joins) > 0;
    }

    public function joinUser($user_id){
        $this->users()->attach($user_id,[
            'points' => $this->points,
            'start_points' => $this->points,
            'position' => 0
        ]);
    }
}
