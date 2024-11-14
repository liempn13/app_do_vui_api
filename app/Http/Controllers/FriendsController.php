<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class FriendsController extends Controller
{
    public function friendsList(int $user)
    {
        return DB::table('friends')
            // ->join('users', 'friends.friend_id', '=', 'users.user_id')
            ->join('users', 'users.user_id', '=', 'friends.user_id')
            ->select('users.*')
            ->where('users.user_id', $user)->get();
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "user_id" => "required|integer",
            "friends_id" => "required|integer",
            "status" => "required|integer"
        ]);

        $newFriend = Friends::create([
            'user_id' => ($fields['user_id']),
            'friends_id' => ($fields['friends_id']),
            'status' => ($fields['status']),
        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $topics = Friends::find($request->user_id);
        $input = $request->validate([
            'user_id' => 'required|integer',
            'friend_id' => 'required|integer',
            'status' => 'required|integer'
        ]);
        $topics->user_id = $input['user_id'];
        $topics->friend_id = $input['friend_id'];
        $topics->status = $input['status'];
        $topics->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $friends = Friends::find($request->friends_id);

        $friends->delete();

        return response()->json([], 200);
    }
}