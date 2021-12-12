<?php

namespace App\Core\Filters;

class UserFilters extends QueryFilters
{
    public function keyword($value = "")
    {
        return $this->builder
            ->where('users.email', 'like', '%' . $value . '%');
    }

    public function email($value = "")
    {
        return $this->builder
            ->where('users.email', 'like', '%' . $value . '%');
    }

    public function name($value = "")
    {
        return $this->builder
            ->where('users.name', 'like', '%' . $value . '%');
    }

    public function active($value) {
        return $this->builder
            ->where('users.active', true);
    }

    public function organisation_id($id) {
        return $this->builder
            ->whereHas('organisations', function ($q) use ($id) {
                $q->where('id', $id);
            });
    }
}
