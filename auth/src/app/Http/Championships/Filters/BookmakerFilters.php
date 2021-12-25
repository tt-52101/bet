<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class BookmakerFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder->where('bookmakers.name', 'LIKE', "%" . $keyword . "%");
    }
}
