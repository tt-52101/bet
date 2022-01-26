<?php

namespace App\Api\FootballApi\Fixtures;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class  FixturesApi implements FixturesApiInterface
{
    public static function get(int $league, int $season, $from = '', $to = ''): array
    {
        $client = new Client();

        $query = [
            'league' => $league,
            'season' => $season,
        ];

        if ($from || $to) {
            $query['from'] = $from;
            $query['to'] = $to;
        }

        try {
            $response = $client->request('get', 'https://v3.football.api-sports.io/fixtures', [
                'headers' => [
                    'x-rapidapi-key' => env('FOOTBALL_API_KEY'),
                    'x-rapidapi-host' => 'v3.football.api-sports.io'
                ],
                'query' => $query
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $exception) {
            $response = json_decode(optional($exception->getResponse())->getBody(), true);
            return $response;
        }
    }
}
