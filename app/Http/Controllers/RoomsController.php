<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\Topics;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoomsController extends Controller
{
    public function index()
    {
        $topics = Rooms::all();
        return response()->json($topics);
    }

    public function show(Rooms $rooms)
    {
        return Rooms::findOrFail($rooms['room_id']); 
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "topic_id" => "required|integer",
            "creator_id" => "required|integer",
            "password" => "required|string",
            "room_status" => "required|integer"
        ]);

        $newFriend = Rooms::create([
            'topic_id' => ($fields['topic_id']),    
            'creator_id' => ($fields['creator_id']),    
            'password' => ($fields['password']),    
            'room_status' => ($fields['room_status'])
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $room = Rooms::find($request->room_id);

        $input = $request->validate([
            "room_id" => "required|integer",
            "topic_id" => "required|integer",
            "creator_id" => "required|integer",
            "password" => "required|string",
            "room_status" => "required|integer"
        ]);

        $room->room_id = $input['room_id'];
        $room->topic_id = $input['topic_id'];
        $room->creator_id = $input['creator_id'];
        $room->password = $input['password'];
        $room->room_status = $input['room_status'];

        $room->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $room = Rooms::find($request->room_id);
        
        $room->delete();

        return response()->json([], 200);
    }
}
