<?php

namespace App\Api\FootballApi\Odds;

interface OddsApiInterface
{
    public static function get(int $league, int $season): array;
}
