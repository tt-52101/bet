<?php

namespace App\Core\Services;

use App\Core\Filters\LanguageFilters;
use App\Core\Models\Language;
use App\Core\Models\LanguageTranslation;

class LanguageService extends LocalService
{
    protected string $table = 'languages';
    protected string $model = Language::class;
    protected string $translated = LanguageTranslation::class;

    public function paginate($per_page)
    {
        $this->filters = new LanguageFilters($this->request);
        return Language::lang($this->lang_id)->filter($this->filters)->paginate($per_page);
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
