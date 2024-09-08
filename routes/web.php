<?php

use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('quiz', [QuestionController::class, 'show'])->name('quiz.show');
Route::post('quiz', [QuestionController::class, 'store'])->name('quiz.store');
Route::get('panel/quiz/create', [QuizController::class, 'create'])->name('panel.quiz.create');
Route::post('panel/quiz/create', [QuizController::class, 'store'])->name('panel.quiz.sote');
Route::get('panel/quiz/show', [QuizController::class, 'index'])->name('panel.quiz.index');



