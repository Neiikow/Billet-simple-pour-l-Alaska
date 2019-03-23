<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="modalTitle">Se connecter</h5>
            </div>
            <div class="modal-body row justify-content-md-center">
                <form class="col-sm-8" action="index.php" method="post">
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
                <button type="button" name="sign-in" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>