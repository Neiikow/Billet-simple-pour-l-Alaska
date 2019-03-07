<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php
    for ($i=0; $i < count($posts); $i++)
    { 
    ?>
    <section class="jumbotron">
        <p><strong><?= htmlspecialchars($posts[$i]->author()) ?></strong> le <?= $posts[$i]->datePost() ?></p>
        <h2><?= htmlspecialchars($posts[$i]->title()) ?></h2>
        <p><?= nl2br(htmlspecialchars($posts[$i]->text())) ?></p>
    </section>
    <?php
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>