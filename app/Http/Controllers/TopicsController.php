<?php

namespace App\Http\Controllers;

use App\Models\Topics;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TopicsController extends Controller
{
    public function index()
    {
        $topics = Topics::all();
        return response()->json($topics);
    }

    public function show(Topics $topics)
    {
        return Topics::findOrFail($topics['topic_id']);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "topic_id" => "required|integer",
            "topic_name" => "required|string"
        ]);

        $newTopics = Topics::create([
            'topic_id' => ($fields['topic_id']),
            'topic_name' => ($fields['topic_name']),
        ]);

        return response()->json($newTopics, 201);
    }
    public function update(Request $request)
    {
        $topics = Topics::find($request->topic_id);
        $input = $request->validate([
           'topic_id' => 'required|integer',
           'topic_name' => 'required|string'
        ]);
        $topics->topic_id = $input['topic_id'];
        $topics->topic_name = $input['topic_name'];

        $topics->update();

        return response()->json([], 200);
    }

    public function delete(Request $request)
    {
        $topics = Topics::find($request->topic_id);
        $topics->delete();
        return response()->json([], status: 200);
    }

}