<?php

namespace App\Http\Championships\Filters;

use App\Core\Filters\QueryFilters;

class MemberFilters extends QueryFilters
{
    public function keyword($keyword)
    {
        return $this->builder->whereHas('user', function($q) use ($keyword) {
            $q->where('email','LIKE', "%" . $keyword . "%");
        });
    }

    public function user_id($id){
        return $this->builder->where('user_id', $id);
    }
}
