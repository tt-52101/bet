<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\LeagueFilters;
use App\Http\Championships\Models\League;
use App\Core\Services\LocalService;

class LeagueRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'leagues';
    protected string $model = League::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new LeagueFilters($this->request);
        return League::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = League::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = League::create($data);
        return $this->entry;
    }
}
