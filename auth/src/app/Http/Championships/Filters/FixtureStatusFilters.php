<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class FixtureStatusFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder->where(function($q) use($keyword){
            $q->where('fixture_statuses.name', 'LIKE', "%" . $keyword . "%")
                ->orWhere('fixture_statuses.title', 'LIKE', "%" . $keyword . "%");
        });
    }
}
