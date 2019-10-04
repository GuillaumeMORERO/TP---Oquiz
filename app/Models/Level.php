<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Level extends Model
{
    // On n'est dans l'obligation de de spécifier la relation inverse mais on le fait quand même ici
    // C'est plus propre, le jour où on a besoin d'afficher une Question à partir du Level, on sera bien content d'avoir déja codé la relation
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'levels_id');
    }
    // On crée une méthode qui permet d'obtenir le CSS selon le level
    public function getCssName()
    {
        switch($this->id) {
            case 1:
                return 'beginner';
            case 2:
                return 'medium';
            case 3:
                return 'expert';    
        }
    }
}