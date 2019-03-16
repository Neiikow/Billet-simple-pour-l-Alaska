<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Bienvenue sur mon blog</h2>
    <?php require('view/front/intro.php'); ?>
    <?php
    if (isset($post))
    {
    ?>
    <h2 class='text-uppercase'>Dernier article</h2>
    <?php
        require('view/front/posts/post.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/front/template.php'); ?>