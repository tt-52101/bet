<?php

namespace App\Core\Filters;

class FixtureFilters extends QueryFilters
{
    public function keyword($keyword) {
        return $this->builder
            ->where('teams.home.name','like',"%$keyword%")
            ->orWhere('teams.away.name','like',"%$keyword%");
    }
}
