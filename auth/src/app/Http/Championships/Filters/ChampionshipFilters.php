<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class ChampionshipFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder->where('championships.title', 'LIKE', "%" . $keyword . "%");
    }

    public function user_id($id)
    {
        return $this->builder
            ->whereHas('users', function ($q) use ($id) {
                $q->where('users.id', $id);
            });
    }

    public function not_user_id($id)
    {
        return $this->builder
            ->whereDoesntHave('users', function ($q) use ($id) {
                $q->where('users.id', $id);
            });
    }
}
