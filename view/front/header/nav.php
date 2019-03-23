<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="?">Billet simple pour l'Alaska</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php
                    if ($_SESSION['role'] === 'admin') {
                        echo '<a class="nav-item nav-link" href="index.php?page=admin">Administration</a>';
                    }
                ?>
                <a class="nav-item nav-link active" href="index.php?page=home&action=last">Accueil <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="index.php?page=posts&action=first">Articles</a>
                <a class="nav-item nav-link" href="index.php?page=contact">Contact</a>
            </div>
            <?php require('view/front/header/btnLog.php'); ?>
        </div>
    </div>
</nav>
<?php require('view/front/header/modalLogin.php'); ?>