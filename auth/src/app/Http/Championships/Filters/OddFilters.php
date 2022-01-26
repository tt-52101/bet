<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class OddFilters extends QueryFilters
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
                    ->orWhereHas('bookmaker', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('fixture.league', function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    });
            });
    }

    public function fixture_id($id){
        return $this->builder->where('odds.fixture_id', $id);
    }

    public function bookmaker_id($id){
        return $this->builder->where('odds.bookmaker_id', $id);
    }

    public function league_id($id){
        return $this->builder->whereHas('fixture.league', function($q) use($id){
            $q->where('leagues.id', $id);
        });
    }

    public function value($value){
        return $this->builder->where('odds.value', $value);
    }

    public function bet_category_id($id){
        return $this->builder->where('odds.bet_category_id', $id);
    }

    public function odd_ids($ids = []){
        if($ids){
            $ids = explode(',', $ids);
        }
        return $this->builder->whereIn('odds.id', $ids);
    }
}
