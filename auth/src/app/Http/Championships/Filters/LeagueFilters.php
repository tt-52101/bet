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

    public function has_fixtures($value)
    {
        if ($value) {
            return $this->builder->whereHas('fixtures');
        }
    }

    public function country_id($id)
    {
        return $this->builder->where('leagues.country_id', $id);
    }

    public function championship_id($id)
    {
        return $this->builder
            ->whereHas('championships', function ($q) use ($id) {
                $q->where('championship_id', $id);
            });
    }
}
