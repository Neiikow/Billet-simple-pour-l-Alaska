<div class='col pt-3'>
    <?php
    if (isset($posts)) {
        foreach ($posts as $post) {
            $postId = htmlspecialchars($post->id());
            require('view/front/articles/article.php');
        }
    }
    elseif (isset($post)) {
        $postId = htmlspecialchars($post->id());
        require('view/front/articles/article.php');
    }
    elseif (isset($comments)) {
    ?>
        <div class='comments container table-responsive'>
            <?php
            require('view/front/comments/comment.php');
            ?>
        </div>
    <?php
    }
    ?>
</div>