<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Bienvenue sur mon blog</h2>
    <section class="jumbotron">
        <p>Message de présentation du site</p>
    </section>
    <?php
    if (isset($post)) {

    ?>
    <h2 class='text-uppercase'>Dernier article</h2>
    <section class="jumbotron post">
        <h3><?= htmlspecialchars($post->title()) ?></h3>
        <p><?= nl2br(htmlspecialchars($post->text())) ?></p>
        <nav class="navbar navbar-expand-lg navbar-light" role="navigation">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href=""><strong>Commentaire(s)</strong></a>
                            <a class="nav-item nav-link" href=""><strong>Editer</strong></a>
                            <a class="nav-item nav-link" href=""><strong>Supprimer</strong></a>
                        </div>
                    </div>
                    <p class="date justify-content-end font-italic"><strong><?= htmlspecialchars($post->author()) ?></strong> le <?= $post->datePost() ?></p>
                </div>
            </nav>
        <?php
        if (isset($comments)) {
            foreach ($comments as $comment)
            { 
        ?>
        <section class="jumbotron comment">
            <p><strong><?= htmlspecialchars($comment->author()) ?></strong> le <?= $comment->datePost() ?></p>
            <p><?= nl2br(htmlspecialchars($comment->text())) ?></p>
        </section>
        <?php
            }
        }
        ?>
    </section>
    <?php
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>