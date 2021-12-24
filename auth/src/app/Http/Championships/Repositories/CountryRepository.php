<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\CountryFilters;
use App\Http\Championships\Models\Country;
use App\Core\Services\LocalService;

class CountryRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'countries';
    protected string $model = Country::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new CountryFilters($this->request);
        return Country::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Country::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Country::create($data);
        return $this->entry;
    }
}
