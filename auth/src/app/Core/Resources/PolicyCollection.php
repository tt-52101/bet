<?php

namespace App\Core\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PolicyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
