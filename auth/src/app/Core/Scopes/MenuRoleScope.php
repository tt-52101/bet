<?php

namespace App\Core\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class MenuRoleScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        if(!$user) {
            return $builder;
        }

        if($user->hasRole('admin')) {
            return $builder;
        }

        $builder->whereHas('roles', function($q) use ($user) {
            $q->whereIn('id', $user->roles()->pluck('id'));
        });
    }
}
