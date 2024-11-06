<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FriendsController extends Controller
{
    public function friendsList(int $user)
    {
        return Friends::where('user_id', $user);
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

    public function delete(Request $request)
    {
        $friends = Friends::find($request->friends_id);

        $friends->delete();

        return response()->json([], 200);
    }
}
