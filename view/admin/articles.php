<div class="table-responsive">
    <a href="index.php?page=new" class='btn btn-outline-dark mb-2'>
        Nouveau
    </a>
    <?php
    if (isset($articles))
    {
    ?>
    <table class="table table-striped table-bordered">
        <thead class='text-center'>
            <tr>
                <th>Action</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($articles as $article)
            {
            ?>
            <tr id='article<?= $article->id() ?>'>
                <td class="text-nowrap text-center">
                    <a href="index.php?page=edit&id=<?= $article->id() ?>" class="btn btn-link text-info btn-sm">
                        Editer
                    </a>
                    <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&action=delete&id=<?= $article->id() ?>'+'&scroll='+document.documentElement.scrollTop" class="btn btn-link text-info btn-sm">
                        Supprimer
                    </a>
                </td>
                <td class="text-nowrap col"><?= $article->title() ?></td>
                <td class="text-nowrap text-center"><?= $article->author() ?></td>
                <td class="text-nowrap text-center"><?= $article->datePost() ?></td>
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