<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\SeasonFilters;
use App\Http\Championships\Models\Season;
use App\Core\Services\LocalService;

class SeasonRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'championship_seasons';
    protected string $model = Season::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new SeasonFilters($this->request);
        return Season::filter($this->filters)->orderBy('year','desc')->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Season::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Season::create($data);
        return $this->entry;
    }
}
