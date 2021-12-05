<?php

namespace App\Core\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Role extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'name' => $this->name,
            'public' => (bool) $this->public,
            'active' => (bool) $this->active,
        ];
    }
}
