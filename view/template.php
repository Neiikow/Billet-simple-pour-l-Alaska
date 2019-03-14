<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        
        <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title><?= $title ?> - Billet simple pour l'Alaska</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
                <div class="container">
                    <a class="navbar-brand" href="?">Billet simple pour l'Alaska</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href="index.php?action=accueil">Accueil <span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link" href="index.php?action=articles">Articles</a>
                            <a class="nav-item nav-link" href="index.php?action=contact">Contact</a>
                        </div>
                        <?= $nav ?>
                    </div>
                </div>
            </nav>
            <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mx-auto" id="modalTitle">Se connecter</h5>
                        </div>
                        <div class="modal-body row justify-content-md-center">
                            <form class="col-sm-8" action="index.php?action=login" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="login" placeholder="Identifiant" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Connexion</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="content" class="container">
            <?= $content ?>
        </div>
        <footer class="bg-dark text-white"></footer>
        <script src="public/js/Post.js"></script>
        <script src="public/js/Comment.js"></script>
        <script src="public/js/init.js"></script>
    </body>
</html>