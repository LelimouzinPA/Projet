<?php
// vérification de la présence de valeur dans le tableau d'erreurs créer dans les controlers qui l'appelleront si nécessaire.

if (count($errorConnect) != 0) {
//mise en page des erreurs.   
   ?>
<div id="errorConnect">
    <div id="containerLineErrorConnect">
        <div class="line line1"></div>
        <div class="line line2"></div>
    </div>
    <form name="form1">
        <input id="defText" type="text" name="deftext" size=70>
    </form>
    <h3>Une erreur c'est produite !!!!</h3>
    <?php
    //boucle pour créer une liste des erreurs éventuelles.
    foreach ($errorConnect as $clef => $input) {
        ?>
    <p>
        <?=$clef.': '.$input; ?>
    </p>
    <?php
    } ?>
</div> <?php
}