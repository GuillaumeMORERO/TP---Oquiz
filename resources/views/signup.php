<?php
$pageTitle = 'Inscription';
include(__DIR__.'/layout/header.php');
dump($errors)
?>
<div>
    <h2> Bienvenue sur O'Quiz </h2>
    <p>

    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
    
    </p>
</div>

<div class="row">
    <form method="post" action = "<?= route('signup_post')  ?>" >
        <label for="firstname">Prénom</label> :
        <input type="text" name="firstname">
        <label for="lastname">Nom</label> :
        <input type="text" name="lastname">
        <label for="email">Email</label> :
        <input type="email" name="email">
        <label for="password">Mot de passe</label> :
        <input type="password" name="password">
        <label for="password_verification">Confirmation</label> :
        <input type="password" name="password_verification">
        <button>S'inscrire</button>
    </form>
</div>














<?php include(__DIR__.'/layout/footer.php'); ?>