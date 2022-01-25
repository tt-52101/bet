<?php

namespace App\Core\Controllers;

use App\Core\Models\Role;
use App\Core\Services\RoleService;
use App\Core\Resources\RoleCollection;
use App\Core\Resources\Role as RoleResource;

use Illuminate\Support\Facades\Gate;
use DB;

class RoleController extends ApiController
{
    public function index(RoleService $roles)
    {

        if (Gate::denies('view', new Role())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new RoleCollection($roles->paginate(8));
    }

    public function show(RoleService $role)
    {

        if (Gate::denies('view', new Role())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new RoleResource($role);
    }

    public function store(RoleService $role)
    {

        if (Gate::denies('create', new Role())) {
            return $this->respondForbidden("You don't have permission to create");
        }

        $this->validateRequest();

        $role->create(request()->all());

        return [
            'message' => 'Role Created Successfully',
            'entry' => new RoleResource($role)
        ];
    }

    public function update(RoleService $role)
    {

        if (Gate::denies('update', new Role())) {
            return $this->respondForbidden("You don't have permission to Update");
        }

        $this->validateRequest($role->id);

        $role->update(request()->all());

        return [
            'message' => 'Role Updated Successfully',
            'body' => new RoleResource($role)
        ];
    }

    public function destroy(RoleService $role)
    {

        if (Gate::denies('delete', new Role())) {
            return $this->respondForbidden("You don't have permission to delete ");
        }

        $role->delete();

        return [
            'message' => 'Role Deleted Successfully'
        ];
    }

    public function validateRequest($role_id = null)
    {
        request()->validate([
            'title' => 'required',
            'name' => 'required'
        ]);
    }
}
