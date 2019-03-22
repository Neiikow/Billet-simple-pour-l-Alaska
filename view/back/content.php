<div class='col pt-3'>
    <?php
    if (isset($posts)) {
        foreach ($posts as $post) {
            $postId = htmlspecialchars($post->id());
            require('view/front/posts/post.php');
        }
    }
    if (isset($comments)) {
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