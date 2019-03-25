<table class='table table-striped table-bordered'>
    <tbody>
        <?php
        foreach ($data['comments'] as $comment)
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
                <td class='col'>
                    <p>
                    <?= $commentText ?>
                    </p>
                    <hr>
                    <a href="index.php?page=<?= $_GET['page']; ?>&action=report&id=<?= $articleId ?>&idCom=<?= $commentId ?>">
                        <button type='button' name='report' class='btn btn-link text-info btn-sm'>
                            Signaler
                        </button>
                    </a>
                    <?php
                        if ($_SESSION['role'] === 'admin') {
                            echo
                            '<a href="index.php?page='. $_GET['page'] .'&action=edit&id='. $articleId .'&idCom='. $commentId .'">
                                <button type="button" name="edit" class="btn btn-link text-info btn-sm">
                                    Editer
                                </button>
                            </a>
                            <a href="index.php?page='. $_GET['page'] .'&action=delete&id='. $articleId .'&idCom='. $commentId .'">
                                <button type="button" name="delete" class="btn btn-link text-info btn-sm">
                                    Supprimer
                                </button>
                            </a>';
                        }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>