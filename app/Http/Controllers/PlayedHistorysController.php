<?php

namespace App\Http\Controllers;

use App\Models\PlayedHistorys;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PlayedHistorysController extends Controller
{
    public function index()
    {
        $playedHistorys = PlayedHistorys::all();
        return response()->json($playedHistorys);
    }

    public function show(PlayedHistorys $playedHistorys)
    {
        return PlayedHistorys::findOrFail($playedHistorys->ID);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "room_id" => "nullable|integer",
            "user_id" => "required|integer",
            "topic_id" => "required|integer",
            "score" => "required|integer",
            "player_quantity" => "integer",
            "time" => "required|time",
        ]);

        $newPlayedHistory = PlayedHistorys::create([
            "room_id" => $fields['room_id'],
            "user_id" => $fields['user_id'],
            "topic_id" => $fields['topic_id'],
            "score" => $fields['score'],
            "player_quantity" => $fields['player_quantity'],
            "time" => $fields['time'],
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $playedHistorys = PlayedHistorys::find($request->ID);

        $input = $request->validate([
            "score" => "required|integer",
            "time" => "required|time",
        ]);
        $playedHistorys->score = $input['score'];
        $playedHistorys->time = $input['time'];
        $playedHistorys->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $history = PlayedHistorys::find($request->ID);

        $history->delete();

        return response()->json([], 200);
    }
}
