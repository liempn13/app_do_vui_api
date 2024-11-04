<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FriendsController extends Controller
{
    public function index()
    {
        $friends = Friends::all();
        return response()->json($friends);
    }

    public function show(Friends $friends)
    {
        // What is param ? and method used to ? 
        return Friends::findOrFail($friends['user_id']);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "user_id" => "required|integer",
            "friends_id" => "required|integer"
        ]);

        $newFriend = Friends::create([
            'user_id' => ($fields['user_id']),    
            'friends_id' => ($fields['friends_id']),    
        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $friends = Friends::find($request->friends_id);
        $input = $request->validate([
           'user_id' => 'required|integer', 
           'friends_id' => 'required|integer' 
        ]);
        $friends->user_id = $input['user_id'];
        $friends->friends_id = $input['friends_id'];
        
        $friends->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $friends = Friends::find($request->friends_id);
        
        $friends->delete();

        return response()->json([], 200);
    }
}
