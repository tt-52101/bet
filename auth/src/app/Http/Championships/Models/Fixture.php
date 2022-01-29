<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Results\Draw;
use App\Http\Championships\Results\Result;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Fixture extends Model
{
    use Filterable;

    protected $fillable = [
        'api_id',
        'status_id',

        'country_id',
        'league_id',

        'home_id',
        'away_id',

        'home_winner',
        'away_winner',

        'home_goals',
        'away_goals',

        'date',
    ];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] =  Carbon::parse($value);
    }

    public function finished(){
        $result = new Result();
        return $result->finished($this);
    }

    public function isExactScore($score){
        $result = new Result();
        return $result->isExactScore($this, $score);
    }

    public function bothTeamsScored($value){
        $result = new Result();
        return $result->bothTeamsScore($this, $value);
    }


    public function isOverUnder($value){
        $result = new Result();
        return $result->isOverUnder($this, $value);
    }

    public function isDraw(){
        $draw = new Draw();
        return $draw->isDraw($this);
    }

    public function isHomeWin(){
        $result = new Result();
        return $result->isHomeWin($this);
    }

    public function isAwayWin(){
        $result = new Result();
        return $result->isAwayWin($this);
    }

    public function bets(){
        return $this->hasMany(Bet::class);
    }

    public function categoryBets($category){
       $bets = Bet::withoutGlobalScopes()->whereHas('playedOdd.category', function ($q) use ($category){
           $q->where('name', $category);
       });

       return $bets;
    }

    public function status(){
        return $this->belongsTo(FixtureStatus::class);
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

    public function championships(){
        return $this->belongsToMany(Championship::class);
    }

    public function sync(array $json){

        $date = $json['fixture']['timestamp'];

        $status = $json['fixture']['status']['short'];
        $status_id = FixtureStatus::where('name', $status)->first()->id;

        $home_winner = $json['teams']['home']['winner'];
        $away_winner = $json['teams']['away']['winner'];

        $home_goals = $json['goals']['home'];
        $away_goals = $json['goals']['away'];

        $this->update([
            'date' => $date,
            'status_id' => $status_id,
            'home_winner' => $home_winner,
            'away_winner' => $away_winner,
            'home_goals' => $home_goals,
            'away_goals' => $away_goals
        ]);
    }

    public static function createFromJson(array $json) {

        $league = $json['league']['id'];
        $league_id = League::where('api_id', $league)->first()->id;

        $status = $json['fixture']['status']['short'];
        $status_id = FixtureStatus::where('name', $status)->first()->id;

        $country_name = $json['league']['country'];
        $country_id = Country::where('countries.name', $country_name)->first()->id;

        $home_id = Team::where('api_id', $json['teams']['home']['id'])->first()->id;
        $away_id = Team::where('api_id', $json['teams']['away']['id'])->first()->id;

        return Fixture::create([
            'api_id' => $json['fixture']['id'],

            'date' => $json['fixture']['timestamp'],
            'status_id' => $status_id,

            'country_id' => $country_id,
            'league_id' => $league_id,

            'home_id' => $home_id,
            'away_id' => $away_id,

            'home_winner' => $json['teams']['home']['winner'],
            'away_winner' => $json['teams']['away']['winner'],

            'home_goals' => $json['goals']['home'],
            'away_goals' => $json['goals']['away'],
        ]);
    }
}
