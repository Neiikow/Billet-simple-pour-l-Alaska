<?php $title = "Contact"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Me contacter</h2>
    <section class='jumbotron row pl-0 pr-0'>
        <div class='col-md-8 border-right border-secondary'>
            <?php require('view/front/formContact.php'); ?>
        </div>
        <div class='col-md-4'>
            <?php require('view/front/infoContact.php'); ?>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>