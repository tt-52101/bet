<?php

namespace App\Models;

use App\Core\Filters\Filterable;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Odd;

class Fixture extends Model
{
    use Filterable;

    protected $connection = 'mongodb';
    protected $collection = 'fixtures';

    public function ScopeHasOdds($q)
    {
        return $q->whereHas('odds');
    }

    public function matchWinner($odds)
    {
        $home = 0;
        $draw = 0;
        $away = 0;
        $n = 0;

        foreach ($odds->bookmakers as $bookmaker) {
            foreach ($bookmaker['bets'] as $bet) {
                if ($bet['name'] === 'Match Winner') {
                    $home += $bet['values'][0]['odd'];
                    $draw += $bet['values'][1]['odd'];
                    $away += $bet['values'][2]['odd'];
                    $n++;
                    break;
                }
            }
        }

        return [
            'home' => round($home / $n,2),
            'away' => round($away / $n),
            'draw' => round($draw / $n),
            'n' => $n,
        ];
    }

    public function odds()
    {
        return $this->belongsTo(Odd::class, 'fixture.id', 'fixture.id');
    }
}
