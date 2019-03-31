<?php
$articleId = htmlspecialchars($data['chapter']->id());
$articleTitle = htmlspecialchars($data['chapter']->title());
$articleText = $data['chapter']->text();
$articleAuthor = htmlspecialchars($data['chapter']->author());
$articleDate = preg_replace("#([0-9]{4})-([0-9]{2})-([0-9]{2})\s([0-9]{2}):([0-9]{2}):([0-9]{2})#", 'le $3/$2/$1 à $4h$5', $data['chapter']->datePost());
?>
<section id='article-<?= $articleId ?>' class='post jumbotron border border-dark'>
    <h3><?= $articleTitle ?></h3>
    <?= $articleText ?>
    <hr>
    <div class='post-option d-flex justify-content-between align-items-center flex-wrap'>
        <div class='d-flex flex-nowrap'>
            <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&action=seeComments&id=<?= $articleId ?>'+'&scroll='+document.documentElement.scrollTop">
                <button type='button' name='report' class='comment-btn btn btn-link text-info btn-sm'>
                    Commentaire(s)
                </button>
            </a>
            <?php
                if ($_SESSION['role'] === 'admin') {
                    echo
                    '<a href="index.php?section=admin&page=edit&action=edit&id='. $articleId .'">
                        <button type="button" name="edit" class="btn btn-link text-info btn-sm">
                            Editer
                        </button>
                    </a>';
                }
            ?>
        </div>
        <p class='btn-sm date font-italic'><strong><?= $articleAuthor ?></strong> <?= $articleDate ?></p>
    </div>
    <?php
    if (isset($data['comments'])) {
        require('view/front/comments/form.php');
    }
    ?>
</section>