<?php

namespace App\Core\Services;

use App\Core\Models\Permission;
use App\Core\Models\Role;
use App\Core\Models\RoleTranslation;
use App\Core\Filters\RoleFilters;

class RoleService extends LocalService
{
    protected string $table = 'roles';
    protected string $model = Role::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new RoleFilters($this->request);
        return Role::filter($this->filters)->paginate($per_page);
    }

    public function get(): array
    {
        return Role::lang($this->lang_id)->get()->toArray();
    }

    public function create(array $data)
    {
        $this->entry->create($data);
        $this->syncPermissions($data);
        return $this->entry;
    }

    public function update(array $data)
    {
        $this->entry->update($data);
        $this->syncPermissions($data);
        return $this->entry;
    }

    public function delete()
    {
        $this->entry->delete();
    }

    public function syncPermissions($data)
    {
        $roles = Permission::whereIn('id', $data['permission_ids'])->get();
        $this->entry->permissions()->sync($roles);
    }
}
