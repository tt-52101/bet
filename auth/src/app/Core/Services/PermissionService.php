<?php

namespace App\Core\Services;

use App\Core\Models\Permission;
use App\Core\Models\PermissionTranslation;
use App\Core\Filters\PermissionFilters;
use App\Core\Models\Role;

class PermissionService extends LocalService
{
    protected string $table = 'permissions';
    protected string $model = Permission::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new PermissionFilters($this->request);
        return Permission::filter($this->filters)->paginate($per_page);
    }

    public function get(): array
    {
        return Permission::lang($this->lang_id)->get()->toArray();
    }

    public function create(array $data)
    {
        return $this->entry->create($data);
    }

    public function update(array $data)
    {
        $this->entry->update($data);
        $this->syncRoles($data);
        return $this->entry;
    }

    public function delete()
    {
        $this->entry->delete();
    }

    public function syncRoles($data)
    {
        $roles = Role::whereIn('id', $data['role_ids'])->get();
        $this->entry->roles()->sync($roles);
    }
}
