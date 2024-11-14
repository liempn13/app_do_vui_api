<?php

namespace App\Http\Controllers;

use App\Models\HistoryDetails;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HistoryDetailsController extends Controller
{

    public function show(HistoryDetails $playedHistorys)
    {
        return HistoryDetails::findOrFail($playedHistorys['ID']);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "id_history" => "integer",
            "question_id" => "integer",
            "option_id" => "nullable|integer",
        ]);

        $newPlayedHistory = HistoryDetails::create([
            "id_history" => $fields['id_history'],
            "question_id" => $fields['question_id'],
            "option_id" => $fields['option_id'],
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $playedHistorys = HistoryDetails::find($request->ID);

        $input = $request->validate([
            "id_history" => "integer",
            "question_id" => "integer",
            "option_id" => "integer",
        ]);
        $playedHistorys->id_history = $input['id_history'];
        $playedHistorys->question_id = $input['question_id'];
        $playedHistorys->option_id = $input['option_id'];
        $playedHistorys->update();

        return response()->json([], 200);
    }
}
