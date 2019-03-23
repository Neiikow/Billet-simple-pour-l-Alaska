<?php $title = "Administration"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <div class='row dash'>
        <?php require('view/back/nav.php'); ?>
        <?php require('view/back/content.php'); ?>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('view/front/template.php'); ?>