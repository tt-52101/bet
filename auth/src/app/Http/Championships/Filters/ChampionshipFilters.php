<?php

namespace App\Http\Championships\Filters;
use App\Core\Filters\QueryFilters;

class ChampionshipFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder->where('championships.title', 'LIKE', "%" . $keyword . "%");
    }
}
