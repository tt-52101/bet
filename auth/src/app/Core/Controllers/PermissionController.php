<?php

namespace App\Core\Controllers;

use App\Core\Models\Permission;
use App\Core\Services\PermissionService;
use App\Core\Resources\PermissionCollection;
use App\Core\Resources\Permission as PermissionResource;

use Illuminate\Support\Facades\Gate;
use DB;

class PermissionController extends ApiController
{
    public function index(PermissionService $permissions)
    {

        if (Gate::denies('view', new Permission())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new PermissionCollection($permissions->paginate(8));
    }

    public function show(PermissionService $permission)
    {

        if (Gate::denies('view', new Permission())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new PermissionResource($permission);
    }

    public function store(PermissionService $permission)
    {

        if (Gate::denies('create', new Permission())) {
            return $this->respondForbidden("You don't have permission to create");
        }

        $this->validateRequest();

        $permission->create(request()->all());

        return [
            'message' => 'Permission Created Successfully',
            'entry' => new PermissionResource($permission)
        ];
    }

    public function update(PermissionService $permission)
    {

        if (Gate::denies('update', new Permission())) {
            return $this->respondForbidden("You don't have permission to Update");
        }

        $this->validateRequest($permission->id);

        $permission->update(request()->all());

        return [
            'message' => 'Permission Updated Successfully',
            'body' => new PermissionResource($permission)
        ];
    }

    public function destroy(PermissionService $permission)
    {

        if (Gate::denies('delete', new Permission())) {
            return $this->respondForbidden("You don't have permission to delete ");
        }

        $permission->delete();

        return [
            'message' => 'Permission Deleted Successfully'
        ];
    }

    public function validateRequest($permission_id = null)
    {
        request()->validate([
            'title' => 'required',
            'name' => 'required'
        ]);
    }
}
