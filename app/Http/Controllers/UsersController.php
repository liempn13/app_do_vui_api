<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::all();

        return response()->json($users);
    }

    public function show(Users $users)
    {
        return Users::findOrFail($users['user_id']); 
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "user_game_name" => "required|string|unique:users,phone",
            "email" => "required|string|unique:users,email",
            "phone" => "required|string|unique:users,phone",
            "password" => "required|string",
            "level" => "integer",
            "exp" => "integer",
            "status" => "required|boolean"
        ]);

        $newUser = Users::create([
            "user_game_name" => $fields['user_game_name'],
            "email" => $fields['email'],
            "phone" => $fields['phone'],
            "password" => $fields['password'],
            "level" => $fields['level'],
            "exp" => $fields['exp'],
            "status" => $fields['status'],
        ]);

        return response()->json([], 201);
    }
    public function update(Request $request)
    {
        $user = Users::find($request->user_id);

        $input = $request->validate([
            "user_id" => "required|string",
            "user_game_name" => "required|string|unique:users,phone",
            "email" => "required|string|unique:users,email",
            "phone" => "required|string|unique:users,phone",
            "password" => "required|string",
            "level" => "integer",
            "exp" => "integer",
            "status" => "required|boolean"
        ]);

        $user->user_id = $input['user_id'];
        $user->user_game_name = $input['user_game_name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->password = $input['password'];
        $user->level = $input['level'];
        $user->exp = $input['exp'];
        $user->status = $input['status'];

        $user->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $user = Users::find($request->user_id);
        
        $user->delete();

        return response()->json([], 200);
    }
}
