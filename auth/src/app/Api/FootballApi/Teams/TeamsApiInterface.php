<?php

namespace App\Api\FootballApi\Teams;

interface TeamsApiInterface
{
    public static function get(String $country, int $league, int $season): array;
}
