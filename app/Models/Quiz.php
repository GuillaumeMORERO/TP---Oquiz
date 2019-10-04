<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Quiz extends Model
{
    // On doit précsier le nom de la table de notre modèle
    // sinon, eloquent ira chercher une table qui s'appelle «quizs»
    protected $table = 'quizzes';
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'quizzes_id');
    }
    public function tags()
    {
        // Pour une relation ManyToMany
        // belongsToMany('Namespace du Model en relation', 'nom de la table intermédiaire', 'nom de la colonne dans la table intermédiaire faisant référence à l'id du Model ici', 'nom de la colonne dans la table intermédiaire faisant référence à l'id du Model en relation')
        return $this->belongsToMany('App\Models\Tag', 'quizzes_has_tags', 'quizzes_id', 'tags_id');
    }
}