<?php

namespace App\Http\Championships\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class PublishedChampionships implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        if($user->hasRole('admin')) {
            return $builder;
        }

        $builder->where('championships.published', true);
    }
}
