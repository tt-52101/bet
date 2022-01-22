<?php

namespace App\Http\Championships\Models;

use App\Core\Auth\Models\User;
use App\Core\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

    public function betSlips(){
        return $this->belongsToMany(Odd::class,'championship_bet_slips');
    }

    public function betSlipItems(){
        return $this->hasMany(BetSlipItem::class,'championship_id');
    }

    public function points($user_id) {

    }

    public function attachUniqueOdds($ids)
    {
        $ids = collect($ids);
        $existing_ids = $this->betSlips()->whereIn('championship_bet_slips.odd_id', $ids)->pluck('odd_id');
        $this->betSlips()->attach($ids->diff($existing_ids),[
            'user_id' => Auth::user()->id
        ]);

        $this->betSlips()->sync($ids);
    }
}
