<?php

namespace App\Api\Odds;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class   FixturesApi
{
    public function get(int $league, int $season)
    {
        $client = new Client();

        try {
            $response = $client->request('get', 'https://v3.football.api-sports.io/fixtures', [
                'headers' => [
                    'x-rapidapi-key' => env('FOOTBALL_API_KEY'),
                    'x-rapidapi-host' => 'v3.football.api-sports.io'
                ],
                'query' => [
                    'league' => $league,
                    'season' => $season
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $exception) {
            $response = json_decode(optional($exception->getResponse())->getBody(), true);
            return $response;
        }
    }
}
