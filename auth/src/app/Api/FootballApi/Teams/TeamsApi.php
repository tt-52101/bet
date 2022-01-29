<?php

namespace App\Api\FootballApi\Teams;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class  TeamsApi implements TeamsApiInterface
{
    public static function get(string $country, int $league , int $season): array
    {
        $client = new Client();

        $query = [
            'country' => $country,
            'league' => $league,
            'season' => $season
        ];

        try {
            $response = $client->request('get', 'https://v3.football.api-sports.io/teams', [
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
