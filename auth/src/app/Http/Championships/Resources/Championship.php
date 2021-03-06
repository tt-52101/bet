<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Championship extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'points' => $this->points,
            'progress' => (float) 21,
            'leagues_ids' => $this->leagues->pluck('id'),
            'football' => (bool) $this->football,
            'published' => (bool) $this->published,
            'win_percentage' => random_int(0,100),
        ];
    }
}
