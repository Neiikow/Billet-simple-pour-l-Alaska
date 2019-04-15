<div class="table-responsive">
    <a href="index.php?page=commentsManager" class='btn btn-outline-dark mb-2'>
        Tous les commentaires
    </a>
    <a href="index.php?page=reported" class='btn btn-outline-dark mb-2'>
        Commentaires signalés
    </a>
    <?php
    if (isset($comments))
    {
        
    ?>
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
            foreach ($comments as $comment)
            {
            ?>
            <tr id='comment<?= $comment->id() ?>'>
                <td class="text-nowrap text-center">
                    <?php
                    if ($comment->reported()) {
                        ob_start();?>
                            <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&action=valide&id=<?= $comment->id() ?>'+'&scroll='+document.documentElement.scrollTop" class="btn btn-link text-info btn-sm">
                                Valider
                            </a>
                        <?php echo ob_get_clean();
                    }
                    ?>
                    <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&action=delete&id=<?= $comment->id() ?>'+'&scroll='+document.documentElement.scrollTop" class="btn btn-link text-info btn-sm">
                        Supprimer
                    </a>
                </td>
                <td class="text-nowrap text-center"><?= $comment->author() ?></td>
                <td class="col <?php if ($comment->reported()) { echo 'reported'; } ?>"><?= $comment->text() ?></td>
                <td class="text-nowrap text-center"><?= $comment->datePost() ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    }
    ?>
</div>