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
        $question_set = DB::table('question_set_details')

            ->join('question_sets', 'question_set_details.question_set_id', '=', 'question_set_details.question_set_id')

            ->join('questions', 'question_set_details.question_id', '=', 'questions.question_id')

            ->join('topics', 'question_sets.topic_id', '=', 'topics.topic_id')

            ->join('options', 'options.question_id', '=', 'questions.question_id')
            ->select(
                'topics.topic_name',
                'question_sets.question_set_name',
                'question_sets.question_quantity',
                'questions.question_content',
                'options.option_content',
                'options.option_value',
            )->where([
                'question_set_details.question_set_id' => $id_questionSet
            ])
            ->get();
        return response()->json($question_set, 200);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "topic_id" => "required|integer",
            "question_set_name" => "required|string",
            "question_quantity" => "required|integer"
        ]);

        $newQuestionSet = QuestionSets::create([
            "topic_id" => $fields['topic_id'],
            "question_set_name" => $fields['question_set_name'],
            "question_quantity" => $fields['question_quantity']
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $question_set = QuestionSets::find($request->question_set_id);

        $input = $request->validate([
            "question_set_id" => "required|string",
            "question_set_name" => "required|string",
            "topic_id" => "required|string",
            "question_quantity" => "required|integer"
        ]);

        $question_set->question_set_id = $input['question_set_id'];
        $question_set->question_set_name = $input['question_set_name'];
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
