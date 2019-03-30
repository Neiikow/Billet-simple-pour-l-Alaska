<?php
$introId = htmlspecialchars($data['intros'][0]->id());
$introText = $data['intros'][0]->text();
?>
<section id='article-<?= $introId ?>' class='jumbotron border border-dark'>
    <p><?= $introText ?></p>
    <?php
    if ($_SESSION['role'] === 'admin') {
        echo
        '<div class="text-center">
            <a href="index.php?section=admin&page=edit&action=edit&id='. $introId .'">
                <button type="button" name="edit" class="btn btn-link text-info btn-sm">
                    Editer
                </button>
            </a>
        </div>';
    }
    ?>
</section>


        
        
        

        
       
        

        