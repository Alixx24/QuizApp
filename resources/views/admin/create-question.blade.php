<form action="{{ route('panel.quiz.sote') }}" method="POST">
    @csrf
    <div>
        <label>Question Text</label>
        <input type="text" name="text" required>
    </div>
    <label for="cars">About?</label>

    <select name="tagName" id="tags">
        @foreach($tagSelect as $tag)
        <option value={{ $tag->id }}>{{ $tag->name }}</option>
        @endforeach
    </select>
    <div>
        <label>Options</label>
        <div>
            <input type="text" name="options[0][text]" placeholder="Option 1" required>
            <input type="checkbox" name="options[0][is_correct]"> Correct
        </div>
        <div>
            <input type="text" name="options[1][text]" placeholder="Option 2">
            <input type="checkbox" name="options[1][is_correct]"> Correct
        </div>
    </div>
    <button type="submit">Add Question</button>
</form>