<?php

namespace App\Api\Odds;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class BookmakersApi
{
    public function get()
    {
        $client = new Client();

        try {
            $response = $client->request('get', 'https://v3.football.api-sports.io/odds/bookmakers', [
                'headers' => [
                    'x-rapidapi-key' => env('FOOTBALL_API_KEY'),
                    'x-rapidapi-host' => 'v3.football.api-sports.io'
                ],

            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $exception) {
            $response = json_decode(optional($exception->getResponse())->getBody(), true);
            return $response;
        }
    }
}
