<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class BetCategoryFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder->where('bet_categories.name', 'LIKE', "%" . $keyword . "%");
    }
}
