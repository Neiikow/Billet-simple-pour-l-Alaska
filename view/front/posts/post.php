<?php
$postId = htmlspecialchars($post->id());
$postTitle = htmlspecialchars($post->title());
$postText = htmlspecialchars($post->text());
$postAuthor = htmlspecialchars($post->author());
$postDate = htmlspecialchars($post->datePost());
?>
<section id='post<?= $postId ?>' class='post jumbotron'>
    <h3><?= $postTitle ?></h3>
    <p><?= $postText ?></p>
    <hr>
    <div class='post-option d-flex justify-content-between align-items-center flex-wrap'>
        <div class='d-flex flex-nowrap'>
            <a href="index.php?page=<?php echo $_GET['page']; ?>&action=showComments&id=<?= $postId ?>">
                <button type='button' name='report' class='comment-btn btn btn-link btn-sm'>
                    Commentaire(s)
                </button>
            </a>
        </div>
        <p class='btn-sm date font-italic'><strong><?= $postAuthor ?></strong> le <?= $postDate ?></p>
    </div>
    <?php
    if (isset($comments) && $post->id() === $id) {
        require('view/front/comments/form.php');
    }
    ?>
</section>