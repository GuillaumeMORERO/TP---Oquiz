<?php 
// On crée une variable $pageTitle qui définit le titre de la page
$pageTitle = $quiz->title;
include(__DIR__.'/layout/header.php');
?>
 <div>
    <h2> <?= $quiz->title ?> 
        <span><?= $quiz->questions->count() ?> questions</span>
    </h2>
</div>

<div>
    <h4> 
        <?= $quiz->description ?>
    </h4>
</div>

<div>
    <p><?= $quiz->author->firstname." ".$quiz->author->lastname ?></p>
</div>

<h2><?= isset($score) ? 'Score : '.$score : ''?></h2>

<div>
    Thème : 
    <ul>
    <?php foreach($quiz->tags as $tag) {  ?> 
        <li><?= $tag->name ?></li>
    <?php } ?>
    </ul>
</div>


<div class="row">
<form action="<?= route('quizPost', ['id' => $quiz->id]) ?>" method="post">
    <?php foreach($quiz->questions as $question): ?>  

        <div class="col question">
            
            <span class="level level--"> <?= $question->level->name ?> </span>

            <div class="question__question">
                <?= $question->question ?> 
            </div>
            <div>
                <p><?= $question->anecdote ?></p> 
            </div>

            <div class="question__choices">
                <!-- récupérer les answers pour la question voulu et itérer-->


                <?php foreach ($question->answers as $answer) : ?>
                    <div>
                        <input type="radio" name="<?= $question->id ?>" id="<?= 'reponse'. $answer->id ?>" value="<?= $answer->id ?>">
                        <label for="<?= 'reponse'. $answer->id ?>">
                            <?= $answer->description ?> 
                        </label> 
                    </div>
                <?php endforeach ?>
                
            </div>
        </div> 
        <?php endforeach; ?> 
        
    <div>
        <input class="btn" type="submit" value="OK"/>
    </div>
</form>
</div>
    

<?php include(__DIR__.'/layout/footer.php'); ?>