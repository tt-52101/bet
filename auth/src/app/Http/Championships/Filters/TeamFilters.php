<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class TeamFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder
            ->where(function ($q) use ($keyword) {
                $q->where('teams.name', 'LIKE', "%" . $keyword . "%")
                    ->orWhereHas('country', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('league', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    });
            });
    }

    public function has_odds($value)
    {
        if ($value) {
            return $this->builder
                ->where(function ($q) {
                    $q->whereHas('homeFixtures.odds')
                        ->orWhereHas('awayFixtures.odds');

                });
        }
    }

}
