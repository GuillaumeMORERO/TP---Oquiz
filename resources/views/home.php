<?php 
// On crée une variable $pageTitle qui définit le titre de la page
$pageTitle = 'Accueil';
include(__DIR__.'/layout/header.php');
?>
<div>
    <h2> Bienvenue sur O'Quiz </h2>
    <p>
    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
    </p>


</div>


<div class="row">
<?php
// On crée une variable initialisée à 1
// Elle sera incrémentée à chaque tour de boucle pour permettre de scinder les lignes de questions
$i = 1;
foreach ($quizzes as $quiz) { 

    foreach ($quiz->tags as $tag) {
    
    ?>
        <div class="col-3 card">
            <p><?= $tag->name ?></p>
            <h3>
                <a href="<?= route('quiz_show', ['id' => $quiz->id]) ?>">
                    <?= $quiz->title ?>
                </a>
            </h3>
            <h5><?= $quiz->description ?></h5>
            <p><?= $quiz->author->firstname ?> <?= $quiz->author->lastname ?></p>
        </div>
            <?php if ($i % 3 == 0) { ?>
                </div><div class="row">
            <?php
            }
            $i++;
    }
}
?>
</div>


<?php include(__DIR__.'/layout/footer.php'); ?>
