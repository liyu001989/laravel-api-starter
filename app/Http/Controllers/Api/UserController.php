<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function userShow()
    {
        return new UserResource($this->user());
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')
            ->paginate();

        return UserResource::collection($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }
}
