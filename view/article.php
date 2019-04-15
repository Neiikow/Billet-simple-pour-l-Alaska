<section id='article-<?= $article->id() ?>' class='post jumbotron border border-dark'>
    <h3><?= $article->title() ?></h3>
    <?= $article->text() ?>
    <hr>
    <div class='post-option d-flex justify-content-between align-items-center flex-wrap'>
        <div class='d-flex flex-nowrap'>
            <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&action=comments&id=<?= $article->id() ?>'+'&scroll='+document.documentElement.scrollTop" class='comment-btn btn btn-link text-info btn-sm'>
                Commentaire(s)
            </a>
            <?php
                if ($_SESSION['role'] === 'admin') {
                    echo
                    '<a href="index.php?section=admin&page=edit&id='. $article->id() .'" class="btn btn-link text-info btn-sm">
                        Editer
                    </a>';
                }
            ?>
        </div>
        <p class='btn-sm date font-italic'><strong><?= $article->author() ?></strong> <?= $article->datePost() ?></p>
    </div>
    <?php
    if (isset($comments)) {
        require('view/formComment.php');
    }
    ?>
</section>