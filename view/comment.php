<table class='table table-striped table-bordered'>
    <tbody>
        <?php
        foreach ($comments as $comment)
        {
        ?>
            <tr id='comment<?= $comment->id() ?>' class='row'>
                <td class='col-md-2 text-center pl-1 pr-1'>
                    <p><strong><?= $comment->author() ?></strong></p>
                    <p class='date'> <?= $comment->datePost() ?></p>
                </td>
                <td class='col <?php if ($comment->reported()) { echo 'reported'; } ?>'>
                    <p>
                    <?= $comment->text() ?>
                    </p>
                    <hr>
                    <?php
                    if ($_SESSION['role'] != 'admin') {
                        echo
                        '<a href="javascript:window.location.href=\'index.php?page='. $_GET['page'] .'&action=report&id='. $article->id() .'&idCom='. $comment->id() .'\'+\'&scroll=\'+document.documentElement.scrollTop" class="btn btn-link text-info btn-sm">
                            Signaler
                        </a>';
                    }
                    else {
                        echo
                        '<a href="index.php?page='. $_GET['page'] .'&action=delete&id='. $article->id() .'&idCom='. $comment->id() .'" class="btn btn-link text-info btn-sm">
                            Supprimer
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