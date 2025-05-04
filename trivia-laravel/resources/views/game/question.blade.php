<!DOCTYPE html>
<html>
<head>
    <title>Trivia Question</title>
</head>
<body>
    <h1>Question {{ $game->current_question_index + 1 }}</h1>
    <p>{!! $question['question'] !!}</p>

    <form method="POST" action="{{ route('game.submitAnswer', $game->id) }}">
        @csrf
        @foreach($question['incorrect_answers'] as $incorrect)
            <div>
                <input type="radio" name="answer" value="{{ $incorrect }}" required>
                <label>{{ $incorrect }}</label>
            </div>
        @endforeach
        <div>
            <input type="radio" name="answer" value="{{ $question['correct_answer'] }}" required>
            <label>{{ $question['correct_answer'] }}</label>
        </div>
        <button type="submit">Submit Answer</button>
    </form>
</body>
</html>
