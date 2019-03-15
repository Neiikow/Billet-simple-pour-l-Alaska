<?php $title = "Contact"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Me contacter</h2>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>