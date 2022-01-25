<?php

namespace App\Core\Filters;

class PermissionFilters extends QueryFilters
{
    public function keyword($value = "")
    {
        return $this->builder
            ->where('permissions.title', 'like', '%' . $value . '%');
    }
}
