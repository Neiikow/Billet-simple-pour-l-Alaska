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
        <hr>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-nowrap">
                <button type="button" class="btn btn-link btn-sm"><strong>Commentaire(s)</strong></button>
                <button type="button" class="btn btn-link btn-sm"><strong>Editer</strong></button>
                <button type="button" class="btn btn-link btn-sm"><strong>Supprimer</strong></button>
            </div>
            <p class="btn-sm date font-italic"><strong><?= htmlspecialchars($post->author()) ?></strong> le <?= $post->datePost() ?></p>
        </div>
        <section class="container comments table-responsive">
            <?php
            if (isset($comments)) {
            ?>
            <table class="table table-striped table-bordered">
                <tbody>
            <?php
                foreach ($comments as $comment)
                { 
            ?>
                    <tr class="row">
                        <td class="col-md-2 text-center pl-1 pr-1">
                            <p><strong><?= htmlspecialchars($comment->author()) ?></strong></p>
                            <p class="date"> le <?= $comment->datePost() ?></p>
                        </td>
                        <td class="col">
                            <p><?= nl2br(htmlspecialchars($comment->text())) ?></p>
                            <hr>
                            <button type="button" class="text-right btn btn-link btn-sm"><strong>Signaler</strong></button>
                        </td>
                    </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </section>
    </section>
    <?php
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>