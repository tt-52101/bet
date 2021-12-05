<?php

namespace App\Core\Controllers;

use App\Core\Auth\Models\User;
use App\Core\Auth\Resources\UserCollection;
use App\Core\Auth\Resources\User as UserResource;

use App\Core\Services\UserService;
use Illuminate\Support\Facades\Gate;

class UserController extends ApiController
{

    public function index(UserService $users)
    {
        if (Gate::denies('view', new User())) {
            return $this->respondForbidden("You don't have permission to view");
        }

        $users = $users->paginate(6);
        return new UserCollection($users);
    }

    public function show(UserService $user)
    {
        if (Gate::denies('view', new User())) {
            return $this->respondForbidden("You don't have permission to view");
        }
        return new UserResource($user);
    }

    public function update(UserService $user)
    {
        if (Gate::denies('update', new User())) {
            return $this->respondForbidden("You don't have permission to update");
        }

        $this->validateRequest(request()->id);

        $data = $this->fromRequest();
        $user->update($data);

        return [
            'message' => 'User Updated Successfully',
            'entry' => $user
        ];
    }

    public function store(UserService $user)
    {
        if (Gate::denies('create', new User())) {
            return $this->respondForbidden("You don't have permission to create");
        }

        $this->validateRequest();

        $data = $this->fromRequest();
        $user = $user->create($data);

        return [
            'message' => 'User Created Successfully',
            'user' => $user
        ];
    }

    public function fromRequest(){
        $data = [];

        if(request()->password){
            $this->validatePassword();
            $data['password'] = bcrypt(request()->password);
        }

        $data['email'] = request()->get('email');
        $data['password'] = request()->get('password');
        $data['name'] = request()->get('name');
        $data['active'] = request()->get('active');
        $data['role_ids'] = request()->get('role_ids');
        $data['organisation_ids'] = request()->get('organisation_ids');
        return $data;
    }

    public function validatePassword(){
        request()->validate([
            'password' => 'confirmed|min:6',
        ]);
    }

    public function validateRequest($id = null)
    {
        request()->validate([
            'email' => "required|string|email|max:255|unique:users,email,$id",
            'name' => "required",
        ]);
    }
}
