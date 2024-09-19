<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\Tag;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
       dd($request->all());
    }
    public function create()
    {
        $tagSelect = Tag::all();
        return view('admin.create-question',compact('tagSelect'));
    }
    public function store(Request $request, Question $quiz, Tag $tag)
    {
      
     $question = $quiz->create(['question_text' => $request->text, 'tag_id' => $request->tagName]);

        // $tag->create([
        //     'name' => $request->tagName,
        //     'taggable_id' => $question->id,
        //     'taggable_type' => 'App\Models\Tag'
        // ]);

        foreach($request->input('options') as $option)
        {
            Option::create([
                'question_id' => $question->id,
                'option_text' =>$option['text'],
                'is_correct' => isset($option['is_correct']),
            ]);
           
        }
        return redirect()->route('panel.quiz.index');
    }
}
