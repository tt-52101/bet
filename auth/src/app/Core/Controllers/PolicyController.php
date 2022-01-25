<?php

namespace App\Core\Controllers;

use App\Core\Models\Policy;
use App\Core\Resources\PolicyCollection;
use App\Core\Resources\Policy as PolicyResource;
use App\Core\Services\PolicyService;

use Illuminate\Support\Facades\Gate;
use DB;

class PolicyController extends ApiController
{
    public function index(PolicyService $policies)
    {
        if (Gate::denies('view', new Policy())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new PolicyCollection($policies->paginate(8));
    }

    public function show(PolicyService $policy)
    {
        if (Gate::denies('view', new Policy())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        return new PolicyResource($policy);
    }

    public function store(PolicyService $policy)
    {
        if (Gate::denies('create', new Policy())) {
            return $this->respondForbidden("You don't have permission to create");
        }

        $this->validateRequest();

        $policy->create(request()->all());

        return [
            'message' => 'Policy Created Successfully',
            'entry' => new PolicyResource($policy)
        ];
    }

    public function update(PolicyService $policy)
    {
        if (Gate::denies('update', new Policy())) {
            return $this->respondForbidden("You don't have permission to create");
        }

        $this->validateRequest($policy->id);
        $policy->update(request()->all());

        return [
            'message' => 'Policy Updated Successfully',
            'body' => new PolicyResource($policy)
        ];
    }

    public function destroy(PolicyService $policy)
    {

        if (Gate::denies('delete', new Policy())) {
            return $this->respondForbidden("You don't have permission to delete ");
        }

        $policy->delete();

        return [
            'message' => 'Policy Deleted Successfully'
        ];
    }

    public function validateRequest($policy_id = null)
    {
        request()->validate([
            'table_id' => 'required',
            'role_id' => 'required'
        ]);
    }
}
