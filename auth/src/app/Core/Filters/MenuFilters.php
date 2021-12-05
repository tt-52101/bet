<?php

namespace App\Core\Filters;

class MenuFilters extends QueryFilters
{
    public function name($value = "")
    {
        return $this->builder
            ->where('menus.name', 'like', '%' . $value . '%');
    }
}
