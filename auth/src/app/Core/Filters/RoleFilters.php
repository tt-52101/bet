<?php

namespace App\Core\Filters;

class RoleFilters extends QueryFilters
{
    public function keyword($value = "")
    {
        return $this->builder
            ->where('roles.title', 'like', '%' . $value . '%');
    }

    public function user_id($id) {
        return $this->builder
            ->whereHas('users', function ($q) use($id){
                $q->where('id', $id);
            });
    }
}
