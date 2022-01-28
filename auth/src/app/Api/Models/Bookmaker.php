<?php

namespace App\Api\Models;

class Bookmaker
{

    public function __construct(
        public int    $id = 0,
        public string $name = '',
        public array  $bets = [],
    )
    {
    }

    public function fromJson($json)
    {
        $this->id = $json['id'];
        $this->name = $json['name'];

        foreach ($json['bets'] as $bet) {
            $this->bets[] = (new Bet())->fromJson($bet);
        }
        return $this;
    }
}
