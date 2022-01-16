<?php

namespace App\Http\Championships\Repositories;

use App\Http\Championships\Filters\BetCategoryFilters;
use App\Http\Championships\Models\BetCategory;
use App\Core\Services\LocalService;

class BetCategoryRepository extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'bet_categories';
    protected string $model = BetCategory::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new BetCategoryFilters($this->request);
        return BetCategory::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = BetCategory::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = BetCategory::create($data);
        return $this->entry;
    }
}
