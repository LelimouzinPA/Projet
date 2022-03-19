<?php
include 'controllers/eraseCtrl.php';
include 'parts/header.php'         ;
?>
<div>Confirmation de la suppression de votre compte:
    <form action="" method="POST" name="eraseConfirmation">
        <div>
            <input type="radio" id="eraseConfirmationYes" name="eraseConfirmation" value="eraseConfirmationYes">
            <label for="eraseConfirmationYes">Oui</label>
            <input type="radio" id="eraseConfirmationNo" name="eraseConfirmation" value="eraseConfirmationNo" checked>
            <label for="eraseConfirmationNo">Non</label>
        </div>
        <div><button id="eraseConfirmation" type="submit">Validez</button></div>
    </form>
</div>
<?php
include 'parts/footer.php';