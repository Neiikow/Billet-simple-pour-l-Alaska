<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Tous les articles</h2>
    <?php
    if (isset($posts)) {
        foreach ($posts as $post)
        {
            require('view/front/post.php');
        }
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>