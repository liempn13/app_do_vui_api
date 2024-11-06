<?php

namespace App\Http\Controllers;

use App\Models\RoomDetails;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoomDetailsController extends Controller
{
    public function index()
    {
        $roomDetail = RoomDetails::all();

        return response()->json($roomDetail);
    }

    public function show(RoomDetails $roomDetails)
    {
        return RoomDetails::findOrFail($roomDetails->room_id);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "room_id" => "required|string",
            "opponent_id" => "required|string"
        ]);

        $newFriend = RoomDetails::create([
            "room_id" => $fields['room_id'],
            "opponent_id" => $fields['opponent_id'],
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $roomDetail = RoomDetails::find($request->room_id);

        $input = $request->validate([
            "id" => "required|string",
            "room_id" => "required|string",
            "opponent_id" => "required|string"
        ]);

        $roomDetail->id = $input['id'];
        $roomDetail->room_id = $input['room_id'];
        $roomDetail->opponent_id = $input['opponent_id'];

        $roomDetail->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $roomDetail = RoomDetails::find($request->room_id);

        $roomDetail->delete();

        return response()->json([], 200);
    }
}
