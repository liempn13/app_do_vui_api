<?php

namespace App\Http\Controllers;

use App\Models\Options;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OptionsController extends Controller
{

    public function index()
    {
        $options = Options::all();
        return response()->json($options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fields = $request->validate([
            "option_content" => "requied|string",
            "option_value" => "requied|boolean",
            "question_id" => "requied|string"
        ]);

        $newOption = Options::create([
            'option_content' => ($fields['option_content']),
            'option_value' => ($fields['option_value']),
            'question_id' => ($fields['question_id']),
        ]);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $option = Options::find($request->options_id);

        $input = $request->validate([
            "option_id" => "required|integer",
            "option_content" => "required|string",
            "option_value" => "required|string",
            "question_id" => "required|string",
        ]);

        $option->option_id = $input['option_id'];
        $option->option_content = $input['option_content'];
        $option->option_value = $input['option_value'];
        $option->question_id = $input['question_id'];
        $option->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $option = Options::find($request->options_id);

        $option->delete();

        return response()->json([], 200);
    }
}