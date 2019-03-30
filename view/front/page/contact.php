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
            <?php
            if (isset($data['admin'])) {
                require('view/front/contact/info.php');
            } else {
                echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
            }
            ?>
        </div>
    </section>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer class='bg-dark text-white fixed-bottom'></footer>"; ?>

<?php require('view/template.php'); ?>