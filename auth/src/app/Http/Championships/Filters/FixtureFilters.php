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

    public function championship_id($id){
        return $this->builder->whereHas('league.championships', function ($q) use($id){
           $q->where('championships.id', $id);
        });
    }

    public function has_odds($value)
    {
        if ($value) {
            return $this->builder->whereHas('odds');
        }
    }

    public function league_id($id)
    {
        return $this->builder->where('fixtures.league_id', $id);
    }

    public function team_id($id)
    {
        return $this->builder
            ->where(function ($q) use ($id) {
                $q->where('home_id', $id)
                    ->orWhere('away_id', $id);
            });
    }
}
