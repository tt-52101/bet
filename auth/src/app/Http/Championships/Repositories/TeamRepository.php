<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\TeamFilters;
use App\Http\Championships\Models\Team;
use App\Core\Services\LocalService;

class TeamRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'teams';
    protected string $model = Team::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new TeamFilters($this->request);
        return Team::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Team::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Team::create($data);
        return $this->entry;
    }
}
