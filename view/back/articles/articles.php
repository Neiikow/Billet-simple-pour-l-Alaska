<div class="table-responsive">
    <a href="index.php?page=new" class='btn btn-outline-dark mb-2'>
        Nouveau
    </a>
    <?php
    if (isset($data['chapters']))
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
            foreach ($data['chapters'] as $data['chapter'])
            {
                $articleId = htmlspecialchars($data['chapter']->id());
                $articleTitle = htmlspecialchars($data['chapter']->title());
                $articleAuthor = htmlspecialchars($data['chapter']->author());
                $articleDate = preg_replace("#([0-9]{4})-([0-9]{2})-([0-9]{2})\s([0-9]{2}):([0-9]{2}):([0-9]{2})#", 'le $3/$2/$1 à $4h$5', $data['chapter']->datePost());
            ?>
            <tr id='article<?= $articleId ?>'>
                <td class="text-nowrap text-center">
                    <a href="index.php?page=edit&action=edit&id=<?= $articleId ?>" class="btn btn-link text-info btn-sm">
                        Editer
                    </a>
                    <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&action=deleteArticle&id=<?= $articleId ?>'+'&scroll='+document.documentElement.scrollTop" class="btn btn-link text-info btn-sm">
                        Supprimer
                    </a>
                </td>
                <td class="text-nowrap col"><?= $articleTitle ?></td>
                <td class="text-nowrap text-center"><?= $articleAuthor ?></td>
                <td class="text-nowrap text-center"><?= $articleDate ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    } else {
        echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
    }
    ?>
</div>