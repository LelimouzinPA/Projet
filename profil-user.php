<?php
include 'controllers/profil-userCtrl.php';
include 'parts/header.php';
?>
<section class="optionSection">
    <div id="containerOption">
        <div id="btnFavoris" class="button">
            <div class="optionText">
                <p>Favoris</p>
            </div>
            <div class="optionImg"><img id="btnFavorisImg" src=".//assets/img/Icon/icons8-étoile-96.png" alt=""></div>
        </div>
        <div id="btnParameter" class="button">
            <div class="optionText">
                <p>Paramètre</p>
            </div>
            <div class="optionImg"><img id="btnParameterImg" src=".//assets/img/Icon/icons8-paramètres-96.png" alt="">
            </div>
        </div>
        <div id="btndisconnect" class="button">
            <div class="optionText">
                <p>Deconnection</p>
            </div>
            <div class="optionImg"><img id="btndisconnectImg" src=".//assets/img/Icon/icons8-connecté-96.png" alt="">
            </div>
        </div>
    </div>
    <div id=containerSetting>
        <div id="btnParameterEffet" class="effectClick">
        </div>
        <div class="containerSetting">
            <div>
                <p>Modification de votre profil</p>
            </div>
            <form action="" method="POST" name="btnUserPseudo" enctype="multipart/form-data">
                <div class="divTextError">
                    <p id="userPseudoError" class="textError"></p>
                </div>
                <div class="subscribeLabel"> <label for="btnUserPseudo">Pseudo:</label></div>
                <div class="divInputForm"> <input id="userPseudo" class=" inputParameter subscribeInput" type="text"
                        name="userPseudo" placeholder="Changer votre pseudo" value="<?=$pseudo; ?>" />
                    <button id="btnUserPseudo" type="submit" name="btnUserPseudo"
                        valeur="btnUserPseudo">Modifier</button>
                </div>
            </form>
            <form action="" method="POST" name="userPassword" enctype="multipart/form-data">
                <div class="divTextError">
                    <p id="userPasswordError" class="textError"></p>
                </div>
                <div class="subscribeLabel"> <label for="userPassword">Mot de passe:</label></div>
                <div class="divInputForm"> <input id="userPassword" class="inputParameter subscribeInput"
                        type="password" name="userPassword" placeholder="Changer votre mot de passe" />
                    <p id="userPasswordConfirmError" class="textError"></p>
                </div>
                <div class="subscribeLabel"> <label for="userPasswordConfirm">Confirmer Mot de passe:</label></div>
                <div class="divInputForm"> <input id="userPasswordConfirm" class="inputParameter subscribeInput"
                        type="password" name="userPasswordConfirm" placeholder="Confirmez votre mot de passe" />
                    <button disabled="disabled" id="btnUserPasswordConfirm" type="submit" name="btnUserPasswordConfirm"
                        valeur="btnUserPasswordConfirm">Modifier</button>
                </div>
            </form>
            <div><p>Supprimer son compte:</p>
                <form action="" method="POST" name="userErase">
                    <div>
                        <input type="radio" id="userEraseYes" name="userErase" value="userEraseYes">
                        <label for="userEraseYes">Oui</label>
                        <input type="radio" id="userEraseNo" name="userErase" value="userEraseNo" checked>
                        <label for="userEraseNo">Non</label>
                    </div>
                    <div><button id="userErase" type="submit">Validez</button></div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div>
        <p>
            <?=$pseudo; ?>
        </p>
    </div>
</section>
<?php
include 'parts/footer.php';
