<?php

namespace App\Core\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Table extends JsonResource
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
            'id' => (int) $this->id,
            'title' => $this->title,
            'name' => $this->name,
            'user_entries' =>  (bool) $this->user_entries,
        ];
    }
}
