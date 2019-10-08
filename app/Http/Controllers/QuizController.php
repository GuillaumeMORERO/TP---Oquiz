<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Answer;
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
        // dump($quiz);exit;
        
        // $questions = Question::where('quizzes_id', $id)->get();
        // $tags = Tag::where('quizzes_id', $id)->get();
        // dump($quiz->tags);
        return view('quiz', [
            'quiz' => $quiz
        ]);
    }

    public function quizPost ($id, Request $request)
    {
        // Récupérer le quizz concerné 
        $quiz = Quiz::find($id);
        // dump($quiz);exit;

        // Récupérer les values/réponses sélectionné 
        $input = $request->all();

        //initialise le score à 0
        $score = 0;
        
        foreach($input as $question_id => $user_answer_id) {
            //recup les questions
            $question = Question::find($question_id);
            //recup les bonnes reponses
            $rightAnswer = $question->answers_id; 
            
            $user_answer_id = (int) $user_answer_id;            
            //et on compare les reponses user avec les bonne réponse
            if($user_answer_id == $rightAnswer) {
                $score++; 
            } 
            
        }
        return view('quiz', 
            [
                'quiz' => $quiz,
                'score' => $score
            ]
        );   

    }
}