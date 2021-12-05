<?php

namespace App\Core\Services;

use App\Core\Models\Policy;
use App\Core\Models\PolicyTranslation;
use App\Core\Filters\PolicyFilters;

class PolicyService extends LocalService
{
    protected string $table = 'policies';
    protected string $model = Policy::class;
    protected string $translated = PolicyTranslation::class;

    public function paginate($per_page)
    {
        $this->filters = new PolicyFilters($this->request);
        return Policy::lang($this->lang_id)->filter($this->filters)->paginate($per_page);
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
