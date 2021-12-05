<?php

namespace App\Core\Controllers;

use App\Auth\Models\RefreshToken;
use App\Core\Auth\Models\User;
use App\Core\Auth\Resources\User as UserResource;

use App\Http\Controllers\Controller;
use App\Core\Controllers\ApiController;

class AuthController extends ApiController
{

    public function show(User $user)
    {
        return (new UserResource($user));
    }

    public function users()
    {
        return User::all();
    }

    public function login()
    {
        $token = auth()->attempt(request()->only([
            'email',
            'password'
        ]));

        if($token == ""){
            return $this->respondForbidden('Wrong Credentials');
        }

        return $token;
    }

    public function logout(){
        // :Todo Logout Implementation
        return $this->respond([
            'message' => 'Logged Out Successfully'
        ]);
    }

    public function me()
    {
        return auth()->user();
    }


    public function refresh()
    {

        $token = auth()->refreshToken(request()->refresh_token);

        if (!isset($token['access_token'])) {
            return response([], 405);
        }

        return $token;
    }
}
