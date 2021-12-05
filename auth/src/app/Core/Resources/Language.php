<?php

namespace App\Core\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Language extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'title' => $this->title,
            'code' => $this->code,
            'active' =>  (bool) $this->active,
        ];
    }
}
