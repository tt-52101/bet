<?php

namespace App\Core\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Menu extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon,
            'title' => $this->title,
            'url' => $this->url
        ];
    }
}
