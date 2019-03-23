<section class='jumbotron border border-dark'>
    <div class='row text-center'>
        <div class='col'>
            <h5>Fonctions terminées :</h5>
            <p class="text-success">
                <strong>
                    Lire<br>
                    Poster<br>
                    Supprimer<br>
                    Signaler
                </strong>
            </p>
        </div>
        <div class='col'>
            <h5>Fonctions à faire :</h5>
            <p class="text-danger">
                <strong>
                    Editer<br>
                    Envoyer un mail<br>
                    Se connecter
                </strong>
            </p>
        </div>
    </div>
    <?php
        if ($_SESSION['role'] === 'admin') {
            echo
            '<div class="text-center">
                <a href="index.php?page='. $_GET['page'] .'&action=edit&content=intro">
                    <button type="button" name="edit-intro" class="btn btn-link text-info btn-sm">
                        Editer
                    </button>
                </a>
            </div>';
        }
    ?>
</section>


        
        
        

        
       
        

        