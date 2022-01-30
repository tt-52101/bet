<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;
use Carbon\Carbon;

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

    public function has_bets($value)
    {
        if ($value) {
            return $this->builder->whereHas('bets');
        }
    }

    public function playable($playable = false){
        if($playable) {
            $date = Carbon::now();
            return $this->builder
                ->whereHas('status', function ($q) use($playable) {
                    $q->whereIn('name', ['NS']);
                })
                ->where('date', '>=',$date);
        }
    }

    public function date_gte($value){
        return $this->builder
            ->where('fixtures.date','>=', $value);
    }

    public function date_lte($value){

        return $this->builder
            ->where('fixtures.date','<=', $value);
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
