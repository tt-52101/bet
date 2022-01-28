<?php

namespace App\Api\Models;

class Team
{
    public function __construct(
        public int    $id,
        public string $team,
    )
    {

    }
}
