<?php

namespace App\Core\Services;

use App\Core\Models\Menu;
use App\Core\Models\MenuTranslation;
use App\Core\Filters\MenuFilters;

class MenuService extends LocalService
{
    protected string $table = 'menus';
    protected string $model = Menu::class;
    protected string $translated = MenuTranslation::class;

    public function paginate($per_page)
    {
        $this->filters = new MenuFilters($this->request);
        return Menu::lang($this->lang_id)->filter($this->filters)->paginate($per_page);
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
