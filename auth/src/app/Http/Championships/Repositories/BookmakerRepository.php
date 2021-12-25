<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\BookmakerFilters;
use App\Http\Championships\Models\Bookmaker;
use App\Core\Services\LocalService;

class BookmakerRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'bookmakers';
    protected string $model = Bookmaker::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new BookmakerFilters($this->request);
        return Bookmaker::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = Bookmaker::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = Bookmaker::create($data);
        return $this->entry;
    }
}
