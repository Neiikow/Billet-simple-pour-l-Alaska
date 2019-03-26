<?php $title = "Contact"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Me contacter</h2>
    <section class='jumbotron row pl-0 pr-0 border border-dark'>
        <div class='col-md-8 border-right border-secondary'>
            <?php require('view/front/contact/form.php'); ?>
        </div>
        <div class='col-md-4'>
            <?php require('view/front/contact/info.php'); ?>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>