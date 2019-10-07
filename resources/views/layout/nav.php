  
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

        <li>
        <?php if ($isUserConnected) { ?>
                <a href="<?= route('profile') ?>">
                    <i></i>
                    Mon compte
                </a>

            <?php } ?>
        </li>

        <li>
            <a href="<?= route('signup') ?>">
                <i></i>
                Inscription
            </a>
        </li>
        

        <li>
            <?php if ($isUserConnected) { ?>
                <a href="<?= route('signout') ?>">
                    <i></i>
                    Déconnexion
                </a>

            <?php } else { ?>
                <a href="<?= route('signin') ?>">
                    <i></i>
                    Connexion
                </a>

            <?php } ?>
        </li>
    </ul>
</nav>


