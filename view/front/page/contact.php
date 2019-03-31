<?php $title = "Contact"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php 
    if (isset($data['error'])) {
        echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
    }
    if (isset($data['admin'])) {
    ?>
    <h1 class='text-uppercase'>Me contacter</h1>
    <section class='jumbotron row pl-0 pr-0 border border-dark'>
        <div class='col-md-8 border-right border-secondary'>
            <?php require('view/front/contact/form.php'); ?>
        </div>
        <div class='col-md-4'>
            <?php require('view/front/contact/info.php'); ?>
        </div>
    </section>
    <?php
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer class='bg-dark text-white fixed-bottom'></footer>"; ?>

<?php require('view/template.php'); ?>