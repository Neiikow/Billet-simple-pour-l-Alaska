<div class="table-responsive">
    <button type='button' name='see-comments' class='btn btn-outline-dark mb-2'>
        Tous les commentaires
    </button>
    <button type='button' name='see-reports' class='btn btn-outline-dark mb-2'>
        Commentaires signalés
    </button>
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
            ?>
            <tr id='comment<?= $commentId ?>'>
                <td class="text-nowrap text-center">
                    <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&section=<?= $_GET['section']; ?>&action=deleteComment&idCom=<?= $commentId ?>'+'&scroll='+document.documentElement.scrollTop">
                        <button type="button" name="delete" class="btn btn-link text-info btn-sm">
                            Supprimer
                        </button>
                    </a>
                </td>
                <td class="text-nowrap text-center"><?= $commentAuthor ?></td>
                <td class="col"><?= $commentText ?></td>
                <td class="text-nowrap text-center"><?= $commentDate ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>