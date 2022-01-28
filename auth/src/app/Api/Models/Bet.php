<?php

namespace App\Api\Models;

class Bet
{
    public function __construct(
        public int|null   $id = null,
        public string|null $name = null,
        public array  $odds = [],
    )
    {
    }

    public function fromJson($json){
        $this->id = $json['id'];
        $this->name = $json['name'];

        foreach ($json['values'] as $odd){
            $this->odds[] = (new Odd(category_id: $this->id))->fromJson($odd);
        }
        return $this;
    }
}
