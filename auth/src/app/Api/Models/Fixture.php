<?php

namespace App\Api\Models;

use Illuminate\Support\Str;

class Fixture
{
    public int $id;
    public string $timestamp;
    public int $home_team;
    public int $away_team;

    public int $home_goals;
    public int $away_goals;

    public bool|null $home_winner = null;
    public bool|null $away_winner = null;

    public string $status;

    public array $bets = [];

    public array $stats = [];

    public function __construct(
        public array $bookmakers = [],
    )
    {
    }

    public function fromJson($json)
    {
        $this->id = $json['fixture']['id'];
        $this->timestamp = $json['fixture']['timestamp'];
        foreach ($json['bookmakers'] as $bookmaker) {
            $this->bookmakers[] = (new Bookmaker())->fromJson($bookmaker);
        }

        return $this;
    }

    public function bets()
    {
        $bets = [];
        foreach ($this->bookmakers as $bookmaker) {
            foreach ($bookmaker->bets as $bet) {
                $name = Str::slug($bet->name, '_');
                $bets[$name][] = $bet;
            }
        }

        return $bets;
    }

    public function odds()
    {
        $odds = [];
        foreach ($this->bets() as $bets) {
            foreach ($bets as $bet) {
                $name = Str::slug($bet->name, '_');
                foreach ($bet->odds as $odd) {
                    $value = Str::slug($odd->value, '_');
                    $odds[$name][$value][] =[
                        'odd' =>  $odd->odd,
                        'value' => $odd->value,
                        'category_name' => $bet->name
                    ];
                }
            }
        }


        return $odds;
    }

    public function calcStats($samples = 1)
    {
        $this->stats = [];
        foreach ($this->odds() as $cat => $odds) {
            foreach ($odds as $k => $odd) {
                if (count($odd) >= $samples) {
                    $this->stats[$cat][$k]['avg'] =  $this->avg($odd);
                    $this->stats[$cat][$k]['min'] = $this->min($odd);
                    $this->stats[$cat][$k]['max'] = $this->max($odd);
                    $this->stats[$cat][$k]['value'] = $odd[0]['value'];
                    $this->stats[$cat][$k]['category_name'] = $odd[0]['category_name'];
                    $this->stats[$cat][$k]['n'] = count($odd);
                }
            }
        }

        return $this;
    }

    public function avg($odds){
        $sum = 0;
        foreach ($odds as $odd){
            $sum += $odd['odd'];
        }
        return round($sum / count($odds), 2);
    }

    public function min($odds){
        $min = 10000000;
        foreach ($odds as $odd){
            if($odd['odd'] <= $min) {
                $min = $odd['odd'];
            }
        }
        return $min;
    }

    public function max($odds){
        $max = 0;
        foreach ($odds as $odd){
            if($odd['odd'] >= $max) {
                $max = $odd['odd'];
            }
        }
        return $max;
    }

    public function get(string $bet_name)
    {
        $name = Str::slug($bet_name, '_');
        return $this->stats[$name];
    }
}
