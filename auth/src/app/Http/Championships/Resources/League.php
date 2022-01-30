<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class League extends JsonResource
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
            'type' => $this->type,
            'logo' => $this->logo,
            'api_id' => $this->api_id,
            'country_flag' => $this->country?->flag,
            'country' => $this->country?->name,
            'country_id' => $this->country_id,
            'fixtures_sync' => $this->fixtures_sync,
            'odds_sync' => $this->odds_sync,
            'active' => (bool)$this->active,
        ];
    }
}
