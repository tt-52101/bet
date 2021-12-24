<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Team extends JsonResource
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
            'name' => $this->name,
            'national' => (bool) $this->national,
            'logo' => $this->logo,
            'api_id' => $this->api_id,
            'league_logo' => $this->league?->logo,
            'league' => $this->league?->name,
            'league_id' => $this->league_id,
            'country' => $this->country?->name,
            'country_id' => $this->country_id,
            'founded' => $this->founded,
        ];
    }
}
