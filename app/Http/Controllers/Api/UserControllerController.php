<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Support\RequestInput;
use App\Http\Requests\CreateUserRequest;

class UserControllerController
{
    public function index($response, User $user)
    {
        $response->getBody()->write(json_encode($user::get(), JSON_PRETTY_PRINT));

        return $response;
    }

    public function show($response, $id)
    {
        $user = User::findOrFail($id);
        $response->getBody()->write(json_encode($user, JSON_PRETTY_PRINT));
        return $response;
    }

    public function create( CreateUserRequest $request)
    {
        if ($request->failed()) return $response->getBody()->write(json_encode($request->errors(), JSON_PRETTY_PRINT));
        $user = User::forceCreate($request->all());
        $response->getBody()->write(json_encode($user, JSON_PRETTY_PRINT));
        return $response;
    }

    public function update()
    {
        // $model = Model::find($input->id);
        // $model->update($input->all();
        // return redirect('/index');
    }

    public function destroy($id)
    {
        // $model = Model::find($id);
        //
        // $model->delete();
    }
}
