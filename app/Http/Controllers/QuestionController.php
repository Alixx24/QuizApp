<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show()
    {
        $questions = Question::with('options')->get();
        return view('quiz.show', compact('questions'));
    }
    public function store(Request $request)
    {
        $answers = $request->input('answers');
        $correctCount = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $questionId => $optionId) {
            $answer = Option::find($optionId);
            if ($answer && $answer->is_correct) {
                $correctCount++;
            }
        }

        return view('quiz.results', compact('correctCount', 'totalQuestions'));
    }
}
