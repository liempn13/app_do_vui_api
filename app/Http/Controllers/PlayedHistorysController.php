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
        return PlayedHistorys::findOrFail($playedHistorys['ID']);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "room_id" => "requied|string",
            "user_id" => "requied|string",
            "topic_id" => "requied|string",
            "question_id" => "requied|string",
            "score" => "requied|integer",
            "player_quantity" => "requied|integer",
        ]);

        $newPlayedHistory = PlayedHistorys::create([
            "room_id" => $fields['room_id'],
            "user_id" => $fields['user_id'],
            "topic_id" => $fields['topic_id'],
            "question_id" => $fields['question_id'],
            "score" => $fields['score'],
            "player_quantity" => $fields['player_quantity'],
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $playedHistorys = PlayedHistorys::find($request->ID);

        $input = $request->validate([
            "room_id" => "requied|string",
            "user_id" => "requied|string",
            "topic_id" => "requied|string",
            "question_id" => "requied|string",
            "score" => "requied|integer",
            "player_quantity" => "requied|integer"
        ]);

        $playedHistorys->ID = $input['ID'];
        $playedHistorys->room_id = $input['room_id'];
        $playedHistorys->user_id = $input['user_id'];
        $playedHistorys->topic_id = $input['topic_id'];
        $playedHistorys->question_id = $input['question_id'];
        $playedHistorys->score = $input['score'];
        $playedHistorys->player_quantity = $input['player_quantity'];

        $playedHistorys->update();
        
        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $playedHistorys = PlayedHistorys::find($request->ID);
        
        $playedHistorys->delete();

        return response()->json([], 200);
    }
}
