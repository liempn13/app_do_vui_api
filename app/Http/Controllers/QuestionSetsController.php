<?php

namespace App\Http\Controllers;

use App\Models\QuestionSets;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class QuestionSetsController extends Controller
{
    public function index()
    {
        $questionSets = QuestionSets::all();
        return response()->json($questionSets);
    }

    public function show(QuestionSets $questionSets)
    {
        return QuestionSets::findOrFail($questionSets['question_set_id']);
    }

    public function getQuestionSet(string $id_questionSet)
    {
        //$question_set = DB::table('question_sets')
        //    ->join('')
        //    ->select(
        //
        //   )
        //    ->get();
        //return response()->json($question_set, 200);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "topic_id" => "required|string",
            "question_name" => "required|string",
            "question_quantity" => "required|integer"
        ]);

        $newQuestionSet = QuestionSets::create([
            "topic_id" => $fields['topic_id'],
            "question_name" => $fields['question_name'],
            "question_quantity" => $fields['question_quantity']
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $question_set = QuestionSets::find($request->question_set_id);

        $input = $request->validate([
            "question_set_id" => "required|string",
            "question_name" => "required|string",
            "topic_id" => "required|string",
            "question_quantity" => "required|integer"
        ]);
 
        $question_set->question_set_id = $input['question_set_id'];
        $question_set->question_name = $input['question_name'];
        $question_set->topic_id = $input['topic_id'];
        $question_set->question_quantity = $input['question_quantity'];

        $question_set->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $question_set = QuestionSets::find($request->question_set_id);
        
        $question_set->delete();

        return response()->json([], 200);
    }
}
