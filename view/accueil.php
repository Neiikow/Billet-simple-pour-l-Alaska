<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <section class="jumbotron">
        <p>Message de présentation du site</p>
    </section>
    <h2>Dernier article</h2>
    <section class="jumbotron">
        <p><strong><?= htmlspecialchars($post->author()) ?></strong> le <?= $post->datePost() ?></p>
        <h2><?= htmlspecialchars($post->title()) ?></h2>
        <p><?= nl2br(htmlspecialchars($post->text())) ?></p>
        <?php
        foreach ($comments as $key => $comment)
        { 
        ?>
        <section class="jumbotron">
            <p><strong><?= htmlspecialchars($comment->author()) ?></strong> le <?= $comment->datePost() ?></p>
            <p><?= nl2br(htmlspecialchars($comment->text())) ?></p>
        </section>
        <?php
        }
        ?>
    </section>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>