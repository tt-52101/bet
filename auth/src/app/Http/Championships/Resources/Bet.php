<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bet extends JsonResource
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

            'category' => $this->playedOdd?->category?->title,

            'championship_id' => $this->championship_id,
            'championship_title' => $this->championship?->title,

            'odd_id' => $this->odd_id,
            'odd' => round($this->odd,2),
            'value' => $this->playedOdd?->value,
            'return' => $this->return,
            'points' => $this->points,
            'user_id' => $this->user_id,

            'home_name' => $this->fixture->home->name,
            'away_name' => $this->fixture->away->name,

            'home_logo' => $this->fixture->home->logo,
            'away_logo' => $this->fixture->away->logo,
        ];
    }
}
