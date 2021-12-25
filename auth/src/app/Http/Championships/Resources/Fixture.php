<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Fixture extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'api_id' => $this->api_id,

            'date' => $this->date,
            'status' => $this->status,

            'country' => $this->country?->name,
            'country_id' => $this->country_id,

            'league' => $this->league?->name,
            'league_id' => $this->league_id,


            'home_name' => $this->home?->name,
            'away_name' => $this->away?->name,

            'home_id' => $this->home_id,
            'away_id' => $this->away_id,

            'home_logo' => $this->home?->logo,
            'away_logo' => $this->away?->logo,

            'home_winner' => $this->home_winner,
            'away_winner' => $this->away_winner,

            'home_goals' => $this->home_goals,
            'away_goals' => $this->away_goals,
        ];
    }
}
