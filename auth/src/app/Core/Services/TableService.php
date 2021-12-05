<?php

namespace App\Core\Services;

use App\Core\Models\Table;
use App\Core\Models\TableTranslation;
use App\Core\Filters\TableFilters;

class TableService extends LocalService
{
    protected string $table = 'tables';
    protected string $model = Table::class;
    protected string $translated = TableTranslation::class;

    public function paginate($per_page)
    {
        $this->filters = new TableFilters($this->request);
        return Table::lang($this->lang_id)->filter($this->filters)->paginate($per_page);
    }

    public function create(array $data)
    {
        $data = collect($data);
        return $this->createWithTranslated($data);
    }

    public function update(array $data)
    {
        $data = collect($data);
        return $this->updateWithTranslated($data);
    }

    public function delete() {
        $this->entry->delete();
    }
}
