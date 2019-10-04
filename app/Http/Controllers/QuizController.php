<?php
namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Tag;
class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function quiz($id)
    {
        // On récupère l'id depuis la route grâce au paramètre $id
        // On s'en sert pour récupérer le Quiz qui a cet id
        $quiz = Quiz::find($id);
        
        // $questions = Question::where('quizzes_id', $id)->get();
        // $tags = Tag::where('quizzes_id', $id)->get();
        // dump($quiz->tags);
        return view('quiz', [
            'quiz' => $quiz
        ]);
    }
}