<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\OddFilters;
use App\Http\Championships\Models\Odd;
use App\Core\Services\LocalService;

class OddRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'odds';
    protected string $model = Odd::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new OddFilters($this->request);
        return Odd::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Odd::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Odd::create($data);
        return $this->entry;
    }
}
