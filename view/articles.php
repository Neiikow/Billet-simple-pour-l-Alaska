<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php
    while ($post = $posts->fetch())
    {
    ?>
    <section class="jumbotron">
        <p><strong><?= htmlspecialchars($post['author']) ?></strong> le <?= $post['date_post'] ?></p>
        <h2><?= htmlspecialchars($post['title']) ?></h2>
        <p><?= nl2br(htmlspecialchars($post['text'])) ?></p>
    </section>
    <?php
    }
    $posts->closeCursor();
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>