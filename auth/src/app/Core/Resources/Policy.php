<?php

namespace App\Core\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Policy extends JsonResource
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
            'table_title' => $this->table_title,
            'table_id' => $this->table_id,
            'role_title' => $this->role_title,
            'role_id' => $this->role_id,
            'read' =>(bool) $this->read,
            'create' =>(bool) $this->create,
            'update' =>(bool) $this->update,
            'delete' => (bool) $this->delete,
            'own' =>  $this->own,
            'comments' => $this->comments
        ];
    }
}
