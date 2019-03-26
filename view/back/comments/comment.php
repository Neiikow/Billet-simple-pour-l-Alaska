<div class="table-responsive">
    <a href="index.php?page=<?= $_GET['page']; ?>&section=comments">
        <button type='button' name='see-comments' class='btn btn-outline-dark mb-2'>
            Tous les commentaires
        </button>
    </a>
    <a href="index.php?page=<?= $_GET['page']; ?>&section=reported">
        <button type='button' name='see-reports' class='btn btn-outline-dark mb-2'>
            Commentaires signalés
        </button>
    </a>
    <table class="table table-striped table-bordered">
        <thead class='text-center'>
            <tr>
                <th>Action</th>
                <th>Auteur</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['comments'] as $data['comment'])
            {
                $commentId = htmlspecialchars($data['comment']->id());
                $commentText = htmlspecialchars($data['comment']->text());
                $commentAuthor = htmlspecialchars($data['comment']->author());
                $commentDate = htmlspecialchars($data['comment']->datePost());
                $reported = htmlspecialchars($data['comment']->reported());
            ?>
            <tr id='comment<?= $commentId ?>'>
                <td class="text-nowrap text-center">
                    <?php
                    if ($reported) {
                        ob_start();?>
                            <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&section=<?= $_GET['section']; ?>&action=valide&idCom=<?= $commentId ?>'+'&scroll='+document.documentElement.scrollTop">
                                <button type="button" name="valide" class="btn btn-link text-info btn-sm">
                                    Valider
                                </button>
                            </a>
                        <?php echo ob_get_clean();
                    }
                    ?>
                    <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&section=<?= $_GET['section']; ?>&action=deleteComment&idCom=<?= $commentId ?>'+'&scroll='+document.documentElement.scrollTop">
                        <button type="button" name="delete" class="btn btn-link text-info btn-sm">
                            Supprimer
                        </button>
                    </a>
                </td>
                <td class="text-nowrap text-center"><?= $commentAuthor ?></td>
                <td class="col <?php if ($reported) { echo 'reported'; } ?>"><?= $commentText ?></td>
                <td class="text-nowrap text-center"><?= $commentDate ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>