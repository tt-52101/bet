<?php

namespace App\Core\Services;

use App\Core\Models\Table;
use App\Core\Models\TableTranslation;
use App\Core\Filters\TableFilters;

class TableService extends LocalService
{
    protected string $table = 'tables';
    protected string $model = Table::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new TableFilters($this->request);
        return Table::filter($this->filters)->paginate($per_page);
    }

    public function create(array $data)
    {
        $this->entry = Table::create($data);
        return $this->entry;
    }

    public function update(array $data)
    {
        return $this->entry->update($data);
    }

    public function delete() {
        $this->entry->delete();
    }
}
