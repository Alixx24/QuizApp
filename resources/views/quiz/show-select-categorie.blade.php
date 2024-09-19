<form action="{{ route('quiz.store') }}" method="POST">
    @csrf
    <p>تعداد سوال ها: {{ $fetchNumberQuestion }}</p>
    @foreach($fetchQuestion as $question)
        <div>
            <p>دسته بندی: {{ $question->category->name }}</p>

            <p>{{ $question->question_text }}</p>
            <p>تگ: {{ $question->tagName->name }}</p>
            @foreach($question->options as $option)
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                    {{ $option->option_text	 }}
                </label><br>
            @endforeach
        </div>
    @endforeach
    <button type="submit">Submit</button>
</form>
