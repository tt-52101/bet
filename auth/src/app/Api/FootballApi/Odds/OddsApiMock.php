<?php

namespace App\Api\FootballApi\Odds;

use App\Api\FootballApi\Odds\OddsApiInterface;

class  OddsApiMock implements OddsApiInterface
{
    public static $response = [];

    public static function get(int $league, int $season,): array
    {
        if (count(self::$response) == 0) {
            self::setDefaultResponse();
        }

        return [
            "errors" => [],
            "results" => 1,
            "paging" => [
                'current' => 1,
                'total' => 3
            ],
            "response" => self::$response
        ];
    }

    private static function setDefaultResponse()
    {
        self::$response = [
            self::league(1, 2),
            self::league(1, 1)
        ];
    }

    public static function league($league_id = 1, $fixture_id = 1)
    {
        return [
            'league' => [
                'id' => $league_id,
            ],
            'fixture' => [
                'id' => $fixture_id
            ],
            'bookmakers' => self::bookmakers()
        ];
    }

    private static function bookmakers()
    {
        return [
            [
                'id' => 1,
                'name' => 'Bookmaker',
                'bets' => [
                    self::matchWinner(),
                ]
            ],
            [
                'id' => 2,
                'name' => 'Bookmaker 2',
                'bets' => [
                    self::matchWinner(),
                ]
            ]
        ];
    }

    private static function matchWinner()
    {
        return [
            'id' => 1,
            'name' => 'Match Winner',
            'values' => [
                [
                    'value' => 'Home',
                    'odd' => '1.65'
                ],
                [
                    'value' => 'Draw',
                    'odd' => '3.70'
                ],
                [
                    'value' => 'Away',
                    'odd' => '5'
                ],
            ]
        ];
    }
}
