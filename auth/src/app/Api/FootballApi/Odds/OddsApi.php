<?php

namespace App\Api\FootballApi\Odds;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OddsApi implements OddsApiInterface
{
    public static function get(int $league, int $season): array
    {
        $client = new Client();

        try {
            $response = $client->request('get', 'https://v3.football.api-sports.io/odds', [
                'headers' => [
                    'x-rapidapi-key' => env('FOOTBALL_API_KEY'),
                    'x-rapidapi-host' => 'v3.football.api-sports.io'
                ],
                'query' => [
                    'league' => $league,
                    'season' => $season,
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $exception) {
            $response = json_decode(optional($exception->getResponse())->getBody(), true);
            return $response;
        }
    }
}
