<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\FixtureFilters;
use App\Http\Championships\Models\Fixture;
use App\Core\Services\LocalService;

class FixtureRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'fixtures';
    protected string $model = Fixture::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new FixtureFilters($this->request);
        return Fixture::filter($this->filters)->orderBy('date', 'desc')->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Fixture::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Fixture::create($data);
        return $this->entry;
    }
}
