<section id='article-<?= $intro->id() ?>' class='jumbotron border border-dark'>
    <?= $intro->text() ?>
    <?php
    if ($_SESSION['role'] === 'admin') {
        echo
        '<div class="text-center">
            <a href="index.php?section=admin&page=edit&id='. $intro->id() .'" class="btn btn-link text-info btn-sm">
                Editer
            </a>
        </div>';
    }
    ?>
</section>