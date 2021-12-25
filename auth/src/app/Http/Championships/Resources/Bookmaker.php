<?php

namespace App\Http\Championships\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Bookmaker extends JsonResource
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
            'api_id' => $this->api_id,
        ];
    }
}
