<form action="{{ route('quiz.store') }}" method="POST">
    @csrf
    @foreach($questions as $question)
        <div>
            <p>{{ $question->question_text }}</p>
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
