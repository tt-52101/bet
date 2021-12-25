<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Odd extends JsonResource
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
            'category' => $this->category?->title,
            'bet_category_id' => $this->bet_category_id,
            'fixture_id' => $this->fixture_id,

            'bookmaker_name' => $this->bookmaker->name,


            'home_name' => $this->fixture->home->name,
            'away_name' => $this->fixture->away->name,

            'home_logo' => $this->fixture->home->logo,
            'away_logo' => $this->fixture->away->logo,

            'date' => $this->fixture->date,

            'value' => $this->value,
            'odd' => $this->odd,
        ];
    }
}
