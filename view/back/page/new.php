<?php $title = "Nouveau"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class='row'>
    <div id='dashboard' class='bg-dark'>
        <?php require('view/back/dashboard/nav.php'); ?>
    </div>
    <div class='col'>
        <div class="container">
            <?php require('view/back/articles/form.php'); ?>
        </div>
    </div>
</div>
    
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer></footer>"; ?>

<?php require('view/template.php'); ?>