<?php

namespace App\Http\Championships\Models;

use App\Core\Filters\Filterable;
use App\Http\Championships\Scopes\MyBets;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use Filterable;

    protected $table = 'championship_bets';

    protected $fillable = [
        'user_id',
        'championship_id',
        'odd_id',
        'return',
        'fixture_id',
        'status',
        'points',
        'odds'
    ];

    protected static function booted(){
        static::addGlobalScope(new MyBets());
    }

    public function statusLabel(){
        if($this->status === 0) {
            return '-';
        }

        if($this->status === 1) {
            return 'Win';
        }

        return 'Lost';
    }

    public function win($win){
        $return = 0;
        $status = 2;

        if($win) {
            $status = 1;
            $return = round($this->points * $this->odd,2);

            // Add Winning Points
            if($this->status != 1){
                $this->championship->addMemberPoints($this->user_id, $return);
            }
        }

        $this->update([
            'status' => $status,
            'return' => $return
        ]);
    }

    public function playedOdd()
    {
        return $this->belongsTo(Odd::class, 'odd_id');
    }

    public function fixture()
    {
        return $this->belongsTo(Fixture::class);
    }

    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }
}
