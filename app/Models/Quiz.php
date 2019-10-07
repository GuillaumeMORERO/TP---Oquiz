<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Quiz extends Model
{
    // On doit précsier le nom de la table de notre modèle
    // sinon, eloquent ira chercher une table qui s'appelle «quizs»
    protected $table = 'quizzes';

        /* notre Quiz peut avoir plusieurs questions */
    //la fonction nous crée une propriété nommée ->questions sur nos Quiz
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'quizzes_id');
    }

    //la fonction porte le nom de la propriété qu'on souhaite créer
    public function author()
    {
        //je spécifie quelle colonne contient la clé étrangère, 
        //afin qu'eloquent soit capable de faire la jointure
        //on doit faire ça parce que notre bdd ne suit pas les conventions !!
        return $this->belongsTo("App\Models\User", "app_users_id");
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function tags()
    {
        // Pour une relation ManyToMany
        // belongsToMany('Namespace du Model en relation', 'nom de la table intermédiaire', 'nom de la colonne dans la table intermédiaire faisant référence à l'id du Model ici', 'nom de la colonne dans la table intermédiaire faisant référence à l'id du Model en relation')
        return $this->belongsToMany('App\Models\Tag', 'quizzes_has_tags', 'quizzes_id', 'tags_id');
    }
}