<?php $title = "Administration"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <div class='row dash'>
        <?php require('view/back/nav.php'); ?>
        <?php require('view/back/content.php'); ?>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('view/front/template.php'); ?>