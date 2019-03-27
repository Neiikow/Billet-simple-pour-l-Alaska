<div class="table-responsive">
    <a href="index.php?section=<?= $_GET['section']; ?>&page=new&action=new-article">
        <button type='button' class='btn btn-outline-dark mb-2'>
            Nouveau
        </button>
    </a>
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
            foreach ($data['articles'] as $data['article'])
            {
                $articleId = htmlspecialchars($data['article']->id());
                $articleTitle = htmlspecialchars($data['article']->title());
                $articleAuthor = htmlspecialchars($data['article']->author());
                $articleDate = htmlspecialchars($data['article']->datePost());
            ?>
            <tr id='article<?= $articleId ?>'>
                <td class="text-nowrap text-center">
                    <button type="button" name="edit" class="btn btn-link text-info btn-sm">
                        Editer
                    </button>
                    <a href="javascript:window.location.href='index.php?page=<?= $_GET['page']; ?>&section=<?= $_GET['section']; ?>&action=deleteArticle&id=<?= $articleId ?>'+'&scroll='+document.documentElement.scrollTop">
                        <button type="button" name="delete" class="btn btn-link text-info btn-sm">
                            Supprimer
                        </button>
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
</div>