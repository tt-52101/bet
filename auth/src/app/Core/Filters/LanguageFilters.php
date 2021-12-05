<?php

namespace App\Core\Filters;

use \App\Core\Filters\QueryFilters;

class LanguageFilters extends QueryFilters
{
    public function title($value = "")
    {
        return $this->builder
            ->where('languages_tr.title', 'like', '%' . $value . '%');
    }

    public function code($value = "")
    {
        return $this->builder
            ->where('languages.code', 'like', '%' . $value . '%');
    }

    public function active($value) {
        return $this->builder
            ->where('languages.active',(int) $value);
    }
}
