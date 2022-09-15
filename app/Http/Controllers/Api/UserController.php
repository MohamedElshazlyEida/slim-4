<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Support\RequestInput;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController
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

    public function create($response ,CreateUserRequest $request)
    {
        if ($request->failed()) return $response->getBody()->write(json_encode($request->errors(), JSON_PRETTY_PRINT));
        $user = User::forceCreate($request->all());
        $response->getBody()->write(json_encode($user, JSON_PRETTY_PRINT));
        return $response;
    }

    public function update($response ,UpdateUserRequest $input)
    {
        $response = User::find($input->id);
        $response->update($input->all());
        $response->getBody()->write(json_encode($user, JSON_PRETTY_PRINT));
        return $response;
    }

    public function destroy($response, $id)
    {
        // $model = Model::find($id);
        //
        // $model->delete();
        $user = User::findOrFail($id);
        $user->delete();
        $response->getBody()->write(json_encode('user deleted', JSON_PRETTY_PRINT));
        return $response;
    }
}
