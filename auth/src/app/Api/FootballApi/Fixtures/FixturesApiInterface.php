<?php

namespace App\Api\FootballApi\Fixtures;

interface FixturesApiInterface
{
    public static function get(int $league, int $season, $from = '', $to = ''): array;
}
