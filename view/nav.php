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
                        echo '<a class="nav-item nav-link" href="index.php?page=articlesManager">Administration</a>';
                    }
                ?>
                <a class="nav-item nav-link" href="index.php?page=home">Accueil <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="index.php?page=articles">Articles</a>
                <a class="nav-item nav-link" href="index.php?page=contact">Contact</a>
            </div>
            <?php
            if ($_SESSION['role'] === 'admin') {
            ?>
                <a href="index.php?page=home&action=logout" class="btn btn-outline-light">
                    Deconnexion
                </a>
            <?php
            }
            else {
            ?>
                <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
            <?php
            }
            ?>
        </div>
    </div>
</nav>
<?php require('view/modalLogin.php'); ?>