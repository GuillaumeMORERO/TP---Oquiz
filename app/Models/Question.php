<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
    // On n'est dans l'obligation de de spécifier la relation inverse mais on le fait quand même ici
    // C'est plus propre, le jour où on a besoin d'afficher un Quiz à partir de la Question, on sera bien content d'avoir déja codé la relation
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz', 'quizzes_id');
    }
    // Cependant, pour obtenir le niveau d'une question, on besoin de cette relation
    public function level()
    {
        return $this->belongsTo('App\Models\Level', 'levels_id');
    }
    // On a besoin de relier les Answer de deux façon
    // D'abord il nous toutes les Answer possible
    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'questions_id');
    }
    // Ensuite, il nous faut la bonne réponse !
}