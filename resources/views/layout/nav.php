  
<nav>
    <ul>
        <li>
            <a href="<?= route('home') ?>">
            <h1>O'Quiz</h1>
            </a>
        </li>
    </ul>

    <ul>
        <li>
            <a href="<?= route('home') ?>">
                <i></i>
                Accueil
            </a>
        </li>

        <?php if ($isUserConnected) { ?>
        <li>

            <a href="<?= route('profile') ?>">
                <i></i>
                Mon compte
            </a>
        </li>
        <li>
            <a href="<?= route('signout') ?>">
                <i></i>
                Déconnexion
            </a>
        </li>
            <?php } else { ?>

        <li>
            <a href="<?= route('signin') ?>">
            <i></i>
            Connexion
            </a>
        </li>

        <li>
            <a href="<?= route('signup') ?>">
            <i></i>
            Inscription
            </a>
        </li>

        <?php } ?>

    </ul>
</nav>


