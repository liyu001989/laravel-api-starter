<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Authorization;
use App\Http\Transformers\AuthorizationTransformer;
use App\Http\Requests\Api\Authorization\StoreRequest;

class AuthorizationController extends Controller
{
    public function store(StoreRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = Auth::attempt($credentials)) {
            abort(401, '用户名或密码错误');
        }

        $authorization = new Authorization($token);

        return $this->response->item($authorization, new AuthorizationTransformer())
             ->setStatusCode(201);
    }

    public function update()
    {
        $authorization = new Authorization(Auth::refresh());

        return $this->response->item($authorization, new AuthorizationTransformer());
    }

    public function destroy()
    {
        Auth::logout();

        return $this->response->noContent();
    }
}
