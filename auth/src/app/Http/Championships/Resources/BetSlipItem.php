<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BetSlipItem extends JsonResource
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
            'category' => $this->odd?->category?->title,
            'odd' => $this->odd?->odd,
            'value' => $this->odd?->value,

            'home_name' => $this->odd?->fixture->home->name,
            'away_name' => $this->odd?->fixture->away->name,

            'home_logo' => $this->odd?->fixture->home->logo,
            'away_logo' => $this->odd->fixture->away->logo,

            'points' => $this->points,
            'odd_id' => $this->odd_id,
            'win' => round($this->odd?->odd * $this->points,2),
            'championship_id' => $this->championhip_id
        ];
    }
}
