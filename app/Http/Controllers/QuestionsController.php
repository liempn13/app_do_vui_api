<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QuestionsController extends Controller
{
    public function index()
    {
        $question =  Questions::all();
        return response()->json($question);
    }

    public function show(Questions $questions)
    {
        return Questions::findOrFail($questions['question_id']);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "question_content" => "required|string",
            "topic_id" => "required|string"
        ]);

        $newQuestions = Questions::create([
            "question_content" => $fields['question_content'],
            "topic_id" => $fields['topic_id']
        ]);

        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $question = Questions::find($request->question_id);

        $input = $request->validate([
            "question_id" => "required|string",
            "question_content" => "required|string",
            "topic_id" => "required|string"
        ]);

        $question->question_id = $input['question_id'];
        $question->question_content = $input['question_content'];
        $question->topic_id = $input['topic_id'];

        return response()->json([], 200);

    }

    public function delete(Request $request)
    {
        $question = Questions::find($request->question_id);

        $question->delete();

        return response()->json([], 200);
    }
}
