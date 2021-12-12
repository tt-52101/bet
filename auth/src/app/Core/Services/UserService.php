<?php

namespace App\Core\Services;

use App\Core\Filters\UserFilters;
use App\Core\Auth\Models\User;

class UserService extends LocalService
{
    protected string $key = 'id';
    protected string $table = 'users';
    protected string $model = User::class;
    protected bool $translatable = false;

    public function paginate($per_page)
    {
        $this->filters = new UserFilters($this->request);
        return User::filter($this->filters)->paginate($per_page);
    }

    public function find($id)
    {
        $this->entry = User::find($id);
        return $this;
    }

    public function update($data)
    {
        $this->entry->update($data);
        $this->syncRoles($data);
        return $this->entry;
    }

    public function create(array $data)
    {
        $this->entry = User::create($data);
        $this->syncRoles($data);
        return $this->entry;
    }

    public function syncRoles($data) {
        $this->entry->roles()->sync($data['role_ids']);
    }
}
