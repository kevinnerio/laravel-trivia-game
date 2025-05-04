<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Services\TriviaApiService;
use Illuminate\Support\Facades\Session;

class GamePlayController extends Controller
{
    protected $triviaApi;

    public function __construct(TriviaApiService $triviaApi)
    {
        $this->triviaApi = $triviaApi;
    }

    public function start()
    {
        // Fetch trivia questions from the API
        $questions = $this->triviaApi->fetchQuestions();

        // Store questions in session or temp storage (you can also save them to the database if needed)
        Session::put('questions', $questions['results']);
        
        // Create a new game entry
        $game = new Game();
        $game->session_id = Session::getId();
        $game->current_question_index = 0;
        $game->score = 0;
        $game->save();

        return redirect()->route('game.question', $game->id);
    }

    public function showQuestion(Game $game)
    {
        $questions = Session::get('questions');
        $question = $questions[$game->current_question_index];

        return view('game.question', compact('game', 'question'));
    }

    public function submitAnswer(Request $request, Game $game)
    {
        $questions = Session::get('questions');
        $currentQuestion = $questions[$game->current_question_index];

        $isCorrect = $request->input('answer') === $currentQuestion['correct_answer'];
        if ($isCorrect) {
            $game->score += 1;
        }

        $game->current_question_index += 1;
        $game->save();

        if ($game->current_question_index >= count($questions)) {
            return redirect()->route('game.result', $game->id);
        }

        return redirect()->route('game.question', $game->id);
    }

    public function result(Game $game)
    {
        $questions = Session::get('questions');
    
        return view('game.result', [
            'score' => $game->score,
            'totalQuestions' => count($questions),
            'game' => $game
        ]);
    }
}
