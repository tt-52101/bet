<?php

namespace App\Core\Filters;

class TableFilters extends QueryFilters
{

    public function keyword($value = "")
    {
        return $this->builder
            ->where('tables.title', 'like', '%' . $value . '%');
    }

    public function title($value = "")
    {
        return $this->builder
            ->where('tables.title', 'like', '%' . $value . '%');
    }

    public function policy_id($id) {
        return $this->builder
            ->where('tables.policy_id', $id);
    }

    public function name($value = "")
    {
        return $this->builder
            ->where('tables.name', 'like', '%' . $value . '%');
    }

}
