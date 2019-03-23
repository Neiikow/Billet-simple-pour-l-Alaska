<div class='container table-responsive'>
    <form action="index.php" method="post" class='p-1'>
        <div class='row form-group'>
            <div class='col'>
                <input required type='text' name='name' placeholder='Identité' class='form-control'>
            </div>
            <div class='col'>
                <input required type='email' name='email' placeholder='Email' class='form-control'>
            </div>
        </div>
        <div class='row form-group'>
            <div class='col'>
                <input required type='text' name='title' placeholder='Objet' class='form-control'>
            </div>
        </div>
        <div class='row form-group'>
            <div class='col'>
                <textarea required name='text' placeholder='Votre message' class='form-control' rows="5"></textarea>
            </div>
        </div>
        <div class='row form-group'>
            <div class='col'>
                <button type='submit' name='new-email' class='btn btn-outline-dark'>Envoyer</button>
            </div>
        </div>
    </form>
</div>