<?php

namespace App\Http\Controllers;

use App\Models\Admin\QuizCategory;
use App\Models\Option;
use App\Models\Question;
use App\Models\Tag;
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
        $res = array_keys($request->input('answers'));


        // $finally = array_values($res);

        // echo implode(" - ", $finally);

        $answers = $request->input('answers');
        $correctCount = 0;
        $wrongCount = 0;
        $tags = [];
        $totalQuestions = count($answers);

        foreach ($answers as $questionId => $optionId) {
            $answer = Option::find($optionId);
            if ($answer && $answer->is_correct) {
                $correctCount++;
            } elseif ($answer && !$answer->is_correct) {
                $showDetailWrong = Question::find($answer)[0];
                $wrong = $showDetailWrong->tagName->name;
                $wrongCount++;
            }
        }
        // dd($wrongCount, $correctCount, $wrong);

        $percentageCorrect = ($totalQuestions > 0) ? ($correctCount / $totalQuestions) * 100 : 0;
        return view('quiz.results', compact('correctCount', 'totalQuestions', 'percentageCorrect', 'wrong'));
    }

    public function category()
    {
        $fetchCategorie = QuizCategory::select('name', 'id')->get();
        return view('quiz.selectCategorie', compact('fetchCategorie'));
    }

    public function showSelectedOfCategory($id)
    {
        $fetchQuestion = Question::where('cat_id', $id)->get();
        // dd($fetchQuestion);
        $fetchNumberQuestion = count($fetchQuestion);

        return view('quiz.show-select-categorie', compact('fetchQuestion', 'fetchNumberQuestion'));
    }
}
