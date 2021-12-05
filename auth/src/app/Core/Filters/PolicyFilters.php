<?php

namespace App\Core\Filters;

class PolicyFilters extends QueryFilters
{
    public function role_id($value) {
        return $this->builder
            ->whereHas('roles', function($q) use ($value)  {
            $q->where('roles.id', $value);
        });
    }

    public function table_id($id) {
        return $this->builder
            ->where('policies.table_id', $id);
    }

    public function permission_id($value) {
        return $this->builder
            ->whereHas('role', function($q) use ($value)  {
                $q->whereHas('permissions', function($q) use ($value){
                    $q->where('permissions.id', $value);
                });
            });
    }
}
