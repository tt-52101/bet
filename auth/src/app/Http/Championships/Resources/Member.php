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
        $win_percentage = 0;
        $wins = $this->wins()->count();
        if ($wins > 0) {
            $win_percentage = ($wins / $this->bets()->count()) * 100;
        }
        return [
            'id' => $this->id,
            'user_email' => $this->user->email,
            'user_id' => $this->user_id,
            'championship_title' => $this->championship->title,
            'championship_id' => $this->championship_id,
            'start_points' => $this->start_points,
            'win_percentage' => round($win_percentage,2),
            'bets_count' => $this->bets()->count(),
            'points' => $this->points
        ];
    }
}
