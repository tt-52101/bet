<?php

namespace App\Api\Models;

class Odd
{
    public function __construct(
        public int $category_id,
        public float $odd = 0,
        public String $value = '',
    )
    {

    }

    public function fromJson($json)
    {
        $this->odd = $json['odd'];
        $this->value = $json['value'];

        return $this;
    }
}
