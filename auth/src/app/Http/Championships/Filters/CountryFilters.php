<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class CountryFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder->where('countries.name', 'LIKE', "%" . $keyword . "%");
    }

    public function has_teams($value = false) {
        if($value) {
            return $this->builder
                ->whereHas('leagues.teams');
        }
    }
}
