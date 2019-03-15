<?php
$commentsPost = [];
foreach ($comments as $comment)
{
    if ($comment->postId() === $post->id())
    {
        $commentsPost[] = $comment;
    }
}
if (count($commentsPost) > 0)
{
?>
<table class='table table-striped table-bordered'>
    <tbody>
        <?php
        foreach ($commentsPost as $commentPost)
        {
        ?>
            <tr id='comment<?= $commentPost->id() ?>' class='row'>
                <td class='col-md-2 text-center pl-1 pr-1'>
                    <p><strong><?= $commentPost->author() ?></strong></p>
                    <p class='date'> le <?= $commentPost->datePost() ?></p>
                </td>
                <td class='col'>
                    <p><?= $commentPost->text() ?></p>
                    <hr>
                    <button type='button' class='text-right btn btn-link btn-sm'><strong>Signaler</strong></button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
}
?>