<?php

namespace App\Core\Services;

use App\Core\Models\Policy;
use App\Core\Models\PolicyTranslation;
use App\Core\Filters\PolicyFilters;

class PolicyService extends LocalService
{
    protected string $table = 'policies';
    protected string $model = Policy::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new PolicyFilters($this->request);
        return Policy::filter($this->filters)->paginate($per_page);
    }

    public function create(array $data)
    {
        return $this->entry->create($data);
    }

    public function update(array $data)
    {
        return $this->entry->update($data);
    }

    public function delete() {
        $this->entry->delete();
    }
}
