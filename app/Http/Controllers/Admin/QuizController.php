<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
       dd($request->all());
    }
    public function create()
    {
        return view('admin.create-question');
    }
    public function store(Request $request, Question $quiz)
    {
     $question = $quiz->create(['question_text' => $request->text]);

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
