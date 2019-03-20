<table class='table table-striped table-bordered'>
    <tbody>
        <?php
        foreach ($comments as $comment)
        {
            $commentId = htmlspecialchars($comment->id());
            $commentText = htmlspecialchars($comment->text());
            $commentAuthor = htmlspecialchars($comment->author());
            $commentDate = htmlspecialchars($comment->datePost());
            $reported = $comment->reported();
        ?>
            <tr id='comment<?= $commentId ?>' class='row'>
                <td class='col-md-2 text-center pl-1 pr-1'>
                    <p><strong><?= $commentAuthor ?></strong></p>
                    <p class='date'> le <?= $commentDate ?></p>
                </td>
                <td class='col <?php if ($reported) { echo 'reported'; }; ?>'>
                    <p>
                    <?= $commentText ?>
                    </p>
                    <hr>
                    <a href="index.php?page=<?= $_GET['page']; ?>&action=report&id=<?= $commentId ?>">
                        <button type='button' name='report' class='btn btn-link text-info btn-sm <?php if ($reported) { echo 'invisible'; }; ?>'>
                            Signaler
                        </button>
                    </a>
                    <a href="index.php?page=<?= $_GET['page']; ?>&action=delete&id=<?= $commentId ?>">
                        <button type='button' name='delete' class='btn btn-link text-info btn-sm'>
                            Supprimer
                        </button>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>