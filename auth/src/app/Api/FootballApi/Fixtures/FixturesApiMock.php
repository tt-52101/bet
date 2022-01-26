<?php

namespace App\Api\FootballApi\Fixtures;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class  FixturesApiMock implements FixturesApiInterface
{
    public static $response = [];

    public static function get(int $league, int $season, $from = '', $to = ''): array
    {
        if (count(self::$response) == 0) {
            self::setDefaultResponse();
        }

        return [
            "errors" => [],
            "results" => 1,
            "paging" => [
                'current' => 1,
                'total' => 1
            ],
            "response" => self::$response
        ];
    }

    private static function setDefaultResponse()
    {
        self::$response = [
            self::fixture(1, 'Greece', 1, 'Home Team', 2, 'Away Team', true),
            self::fixture(2, 'Greece', 1, 'Home Team', 2, 'Away Team', true),
        ];
    }

    private static function addResponse($fixture){
        self::$response[] = $fixture;
    }

    public static function fixture($fixture_id, $country, $home_id, $home_team, $away_id, $away_team, $home_win = true)
    {
        return [
            "fixture" => [
                "id" => $fixture_id,
                "referee" => "Tamas Bognar, Hungary",
                "timezone" => "UTC",
                "date" => "2021-12-05T17=>30=>00+00=>00",
                "timestamp" => 1638725400,
                "periods" => [
                    "first" => 1638725400,
                    "second" => 1638729000
                ],
                "status" => [
                    "long" => 'Match Finished',
                    "short" => "FT",
                    "elapsed" => 90
                ],
            ],
            "league" => [
                "id" => 197,
                "country" => $country
            ],
            "teams" => [
                "home" => self::team($home_id, $home_team, $home_win == true),
                "away" => self::team($away_id, $away_id, $home_win == false)
            ],
            "goals" => [
                "home" => 1,
                "away" => 0
            ]
        ];
    }

    private
    static function team($id, $name, $winner = false)
    {
        return [
            "id" => $id,
            "name" => $name,
            "logo" => "logo",
            "winner" => $winner
        ];
    }
}
