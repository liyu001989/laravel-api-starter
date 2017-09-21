<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    public function userShow()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')
            ->paginate();

        return $this->response->paginator($users, new UserTransformer());
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return $this->response->item($user, new UserTransformer());
    }
}
