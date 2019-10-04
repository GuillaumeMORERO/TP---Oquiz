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
    <p>by author name</p>
</div>

<div>
    Liste des Thèmes : 
    <ul>
    <?php foreach($quiz->tags as $tag) {  ?> 
        <li><?= $tag->name ?></li>
    <?php } ?>
    </ul>
</div>

<div class="row">
<?php
$i = 1;
foreach($quiz->questions as $question) {
    ?>
        <div class="col question">
            <span class="level level--<?= $question->level->getCssName() ?>">
                <?= $question->level->name ?></span>

            <div class="question__question">
                <?= $question->question ?>
            </div>
            <div>
                <ol class="answers-list">
                    <?php
                    foreach ($question->answers as $answer) {
                        echo '<li>'.$answer->description.'</li>';
                    }
                    ?>
                </ol> 
            </div>
        </div>
    <?php
    if ($i % 3 == 0) {
        ?></div><div class="row"><?php
    }
    $i++;
}
?>
    
</div>
<?php include(__DIR__.'/layout/footer.php'); ?>