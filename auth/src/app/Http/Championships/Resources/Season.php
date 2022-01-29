<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Season extends JsonResource
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
            'league_name' => $this->league->name,
            'league_logo' => $this->league->logo,
            'year' => $this->year,
            'start' => $this->start,
            'end' => $this->end,
            'current' => $this->current,
            'standings' => $this->standings,
            'players' => $this->players,
            'events' => $this->events,
            'odds' => $this->odds,
            'predictions' => $this->predictions,
        ];
    }
}
