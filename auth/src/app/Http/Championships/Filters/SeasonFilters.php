<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class SeasonFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder
            ->where(function ($q) use ($keyword) {
                $q->where('year', $keyword)
                ->orWhereHas('league', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })->orWhereHas('league.country', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                });
            });
    }
}
