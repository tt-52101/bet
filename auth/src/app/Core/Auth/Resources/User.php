<?php

namespace App\Core\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'email' => $this->email,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'role_ids' => $this->roles->pluck('id'),
            'active' => (bool) $this->active
        ];
    }
}
