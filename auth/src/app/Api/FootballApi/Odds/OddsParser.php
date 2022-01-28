<?php

namespace App\Api\FootballApi\Odds;

use App\Api\Models\Fixture;
use function MongoDB\BSON\fromJSON;

class OddsParser {
    public function __construct(
        public array $data = []
    ){
    }

    public  function fixtures(){
        $fixtures = [];
        foreach ($this->data as $fixture){
            $fixtures[] =(new Fixture())->fromJSON($fixture);
        }

        return $fixtures;
    }
}
