<?php
$articleId = htmlspecialchars($data['article']->id());
$articleTitle = htmlspecialchars($data['article']->title());
$articleText = htmlspecialchars($data['article']->text());
$articleAuthor = htmlspecialchars($data['article']->author());
$articleDate = htmlspecialchars($data['article']->datePost());
?>
<section id='article-<?= $articleId ?>' class='post jumbotron border border-dark'>
    <h3><?= $articleTitle ?></h3>
    <p><?= $articleText ?></p>
    <hr>
    <div class='post-option d-flex justify-content-between align-items-center flex-wrap'>
        <div class='d-flex flex-nowrap'>
            <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&action=show&id=<?= $articleId ?>'+'&scroll='+document.documentElement.scrollTop">
                <button type='button' name='report' class='comment-btn btn btn-link text-info btn-sm'>
                    Commentaire(s)
                </button>
            </a>
            <?php
                if ($_SESSION['role'] === 'admin') {
                    echo
                    '<a href="index.php?page='. $_GET['page'] .'&action=edit&id='. $articleId .'">
                        <button type="button" name="edit" class="btn btn-link text-info btn-sm">
                            Editer
                        </button>
                    </a>';
                }
            ?>
        </div>
        <p class='btn-sm date font-italic'><strong><?= $articleAuthor ?></strong> le <?= $articleDate ?></p>
    </div>
    <?php
    if (isset($data['comments'])) {
        require('view/front/comments/form.php');
    }
    ?>
</section>