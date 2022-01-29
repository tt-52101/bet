<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Member extends JsonResource
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
        $win_percentage = ($this->wins()->count() / $this->bets()->count()) * 100;
        return [
            'id' => $this->id,
            'user_email' => $this->user->email,
            'championship_title' => $this->championship->title,
            'championship_id' => $this->championship_id,
            'start_points' => $this->start_points,
            'win_percentage' => $win_percentage,
            'bets_count' => $this->bets()->count(),
            'points' => $this->points
        ];
    }
}
