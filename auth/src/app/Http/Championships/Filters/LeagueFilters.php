<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class LeagueFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder
            ->where(function ($q) use ($keyword) {
                $q->where('leagues.name', 'LIKE', "%" . $keyword . "%")
                    ->orWhereHas('country', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    });
            });
    }
}
