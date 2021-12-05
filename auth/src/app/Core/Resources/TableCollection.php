<?php

namespace App\Core\Resources;

use App\Core\Models\Language;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TableCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
