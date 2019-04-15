<?php $title = "Erreur"; ?>

<?php ob_start(); ?>
    <?php require('view/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h3><?= $error ?></h3>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer class='bg-dark text-white fixed-bottom'></footer>"; ?>

<?php require('view/template.php'); ?>