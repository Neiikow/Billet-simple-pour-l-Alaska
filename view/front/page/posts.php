<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Tous les articles</h2>
    <?php
    if (isset($post)) {
        require('view/front/posts/post.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/front/template.php'); ?>