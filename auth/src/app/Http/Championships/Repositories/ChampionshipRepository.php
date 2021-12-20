<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\ChampionshipFilters;
use App\Http\Championships\Models\Championship;
use App\Core\Services\LocalService;

class ChampionshipRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'championships';
    protected string $model = Championship::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new ChampionshipFilters($this->request);
        return Championship::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Championship::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Championship::create($data);
        return $this->entry;
    }
}
