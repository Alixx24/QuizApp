<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $question1 = Question::create(['question_text' => 'What is the capital of france?']);
        Option::create(['question_id' => $question1->id, 'option_text' => 'paris', 'is_correct' => true]);
        Option::create(['question_id' => $question1->id, 'option_text' => 'london', 'is_correct' => false]);
        Option::create(['question_id' => $question1->id, 'option_text' => 'rio', 'is_correct' => false]);
        Option::create(['question_id' => $question1->id, 'option_text' => 'tehran', 'is_correct' => false]);

    }
}
