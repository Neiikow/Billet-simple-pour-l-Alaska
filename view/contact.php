<?php $title = "Contact - Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <section class="jumbotron">
    <?= $msg . ', sur la page contact' ?>
    </section>
    <section class="jumbotron">
    </section>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>