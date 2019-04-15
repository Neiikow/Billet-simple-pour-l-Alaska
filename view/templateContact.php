<?php $title = "Contact"; ?>

<?php ob_start(); ?>
    <?php require('view/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php
    if (isset($errorMsg)) {
        require_once('view/error/entityNotFound.php');
    }
    if (isset($admin)) {
    ?>
        <h1 class='text-uppercase'>Me contacter</h1>
        <section class='jumbotron row pl-0 pr-0 border border-dark'>
            <div class='col-md-8 border-right border-secondary'>
                <?php require('view/formContact.php'); ?>
            </div>
            <div class='col-md-4'>
                <?php require('view/contact.php'); ?>
            </div>
        </section>
    <?php
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer class='bg-dark text-white fixed-bottom'></footer>"; ?>

<?php require('view/template.php'); ?>