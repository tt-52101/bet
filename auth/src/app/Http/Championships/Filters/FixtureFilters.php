<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class FixtureFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder
            ->where(function ($q) use ($keyword) {
                $q->whereHas('home', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })->orWhereHas('away', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })->orWhereHas('country', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })->orWhereHas('league', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                });
            });
    }
}
