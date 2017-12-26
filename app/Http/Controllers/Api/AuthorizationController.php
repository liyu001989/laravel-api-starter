<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Authorization;
use App\Http\Resources\AuthorizationResource;
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

        // 对于继承了eloquent的model，如果是新创建的资源, wasRecentlyCreated 为true
        // 直接放回resource 状态码就是201
        // 但是比如这个情况，我想让所有资源的结构统一，比如有没有wrap，不想自己使用json结构返回
        // 要返回201 就需要向下面这样
        $response = new AuthorizationResource($authorization);

        return $response->response()->setStatusCode(201);
    }

    public function update()
    {
        $authorization = new Authorization(Auth::refresh());

        return new AuthorizationResource($authorization);
    }

    public function destroy()
    {
        Auth::logout();

        return $this->response->noContent();
    }
}
