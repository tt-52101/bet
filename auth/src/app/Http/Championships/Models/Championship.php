<?php

namespace App\Http\Championships\Models;

use App\Core\Auth\Models\User;
use App\Core\Filters\Filterable;
use App\Http\Championships\Scopes\PublishedChampionships;
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
        'football',
        'published'
    ];

    protected static function booted(){
        static::addGlobalScope(new PublishedChampionships());
    }

    public function ScopeIsPublished($q){
        return $q->where('championships.published', true);
    }

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

        $joins = Championship::where('id', $this->id)->whereHas('users', function ($q) use ($user_id) {
            $q->where('users.id', $user_id);
        })->get();

        return count($joins) > 0;
    }

    public function joinUser($user_id)
    {
        $this->users()->attach($user_id, [
            'points' => $this->points,
            'start_points' => $this->points,
            'position' => 0
        ]);
    }

    public function betSlips()
    {
        return $this->belongsToMany(Odd::class, 'championship_bet_slips');
    }

    public function betSlipIds($user_id)
    {
        $bet_slip = $this->betSlips()->where('user_id', $user_id)->pluck('odd_id')->toArray();
        return array_map('strval', $bet_slip);
    }

    public function betSlipItems()
    {
        return $this->hasMany(BetSlipItem::class, 'championship_id');
    }

    public function bets()
    {
        return $this->hasMany(Bet::class, 'championship_bets');
    }

    public function finalizeBet($user_id)
    {
        $bet_slip_items = $this->betSlipItems;
        $bets = [];

        foreach ($bet_slip_items as $bet) {
            $bets[] = [
                'odd_id' => $bet->odd_id,
                'fixture_id' => $bet->odd->fixture_id,
                'championship_id' => $this->id,
                'user_id' => $user_id,
                'points' => $bet->points,
                'odd' => $bet->odd->odd
            ];
        }

        // Remove Points
        $member = $this->members()->where('user_id', $user_id)->first();
        $member->update([
            'points' => $member->points - $this->betPoints()
        ]);

        $this->betSlipItems()->delete();

        Bet::insert($bets);
    }

    public function addMemberPoints($user_id, $points){
        $member = $this->members()->where('user_id', $user_id)->first();
        $member->update([
            'points' => $member->points + $points
        ]);
    }

    public function betPoints()
    {
        return $this->betSlipItems()->sum('points');
    }

    public function members()
    {
        return $this->hasMany(ChampionshipMember::class, 'championship_id');
    }

    public function points()
    {
        $user_id = Auth::user()->id;
        $member = $this->members()->where('championship_user.user_id', $user_id)->first();

        $odds = $this->betSlipItems()->where('user_id', $user_id)->get();
        $points = $member->points;
        $return = 0;
        $bet = 0;
        $missing_bet = false;
        $small_bet = false;

        foreach ($odds as $odd) {
            $points -= $odd->points;
            $bet += $odd->points;
            $return += round((float)$odd->odd->odd * $odd->points, 2);
            if ($odd->points == 0) {
                $missing_bet = true;
            }

            if ($odd->points < 1) {
                $small_bet = true;
            }
        }

        return [
            'bet' => round($bet, 2),
            'points' => round($points, 2),
            'return' => round($return, 2),
            'missing' => $missing_bet,
            'small_bet' => $small_bet
        ];
    }

    public function attachUniqueOdds($ids)
    {
        $user_id = Auth::user()->id;

        $this->attachBetSlipItems($user_id, $ids);
        $this->detachUnusedBetSlipItems($user_id, $ids);
    }

    private function attachBetSlipItems($user_id, $ids)
    {
        $ids = collect($ids);
        $existing_ids = $this->betSlips()
            ->where('user_id', $user_id)
            ->whereIn('championship_bet_slips.odd_id', $ids)->pluck('odd_id');

        $new_ids = $ids->diff($existing_ids);
        $bets = [];

        foreach ($new_ids as $id) {
            $bets[] = [
                'user_id' => $user_id,
                'championship_id' => $this->id,
                'points' => 0,
                'odd_id' => $id
            ];
        }

        BetSlipItem::insert($bets);
    }

    private function detachUnusedBetSlipItems($user_id, $ids): void
    {
        $this->betSlipItems()->where('user_id', $user_id)
            ->whereNotIn('championship_bet_slips.odd_id', $ids)->delete();
    }
}
