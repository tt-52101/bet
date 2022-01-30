<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class BetFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder
            ->where(function ($q) use ($keyword) {
                $q->whereHas('fixture.home', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })
                    ->orWhereHas('fixture.away', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('fixture.country', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('fixture.league', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    });
            });
    }

    public function user_id($id) {
        return $this->builder->where('championship_bets.user_id', $id);
    }

    public function fixture_id($id) {
        return $this->builder->where('championship_bets.fixture_id', $id);
    }
}
