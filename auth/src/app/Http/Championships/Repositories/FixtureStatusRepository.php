<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\FixtureStatusFilters;
use App\Http\Championships\Models\FixtureStatus;
use App\Core\Services\LocalService;

class FixtureStatusRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'fixture_statuses';
    protected string $model = FixtureStatus::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new FixtureStatusFilters($this->request);
        return FixtureStatus::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = FixtureStatus::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = FixtureStatus::create($data);
        return $this->entry;
    }
}
