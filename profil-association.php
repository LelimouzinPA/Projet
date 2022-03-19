<?php
include 'controllers/profil-associationCtrl.php';
include 'parts/header.php';
?>
<section class="optionSection">
    <div id="containerOption">
        <div id="btnFavoris" class="button">
            <div class="optionText">
                <p>Favoris</p>
            </div>
            <div class="optionImg">
                <img id="btnFavorisImg" src=".//assets/img/Icon/icons8-étoile-96.png" alt="">
            </div>
        </div>
        <div id="btnParameter" class="button">
            <div class="optionText">
                <p>Paramètres</p>
            </div>
            <div class="optionImg">
                <img id="btnParameterImg" src=".//assets/img/Icon/icons8-paramètres-96.png" alt="">
            </div>
        </div>
        <div id="btndisconnect" class="button">
            <div class="optionText">
                <p>Déconnexion</p>
            </div>
            <div class="optionImg">
                <img id="btndisconnectImg" src=".//assets/img/Icon/icons8-connecté-96.png" alt="">
            </div>
        </div>
    </div>
    <div id=containerSetting>
        <div class="containerSetting">
            <div>
                <p>Modification de votre profil</p>
            </div>
            <form action="" method="POST" name="btnAssociationPseudo" enctype="multipart/form-data">
                <div class="divTextError">
                    <p id="associationPseudoError" class="textError"></p>
                </div>
                <div class="subscribeLabel"> <label for="btnAssociationPseudo">Pseudo:</label></div>
                <div class="divInputForm"> <input id="associationPseudo" class=" inputParameter subscribeInput"
                        type="text" name="associationPseudo" placeholder="Changer votre pseudo"
                        value="<?=$pseudo; ?>" />
                    <button id="btnAssociationPseudo" type="submit" name="btnAssociationPseudo"
                        valeur="btnAssociationPseudo">Modifier</button>
                </div>
            </form>
            <form action="" method="POST" name="associationPassword" enctype="multipart/form-data">
                <div class="divTextError">
                    <p id="associationPasswordError" class="textError"></p>
                </div>
                <div class="subscribeLabel"> <label for="associationPassword">Mot de passe:</label></div>
                <div class="divInputForm"> <input id="associationPassword" class="inputParameter subscribeInput"
                        type="password" name="associationPassword" placeholder="Changer votre mot de passe" />
                    <p id="associationPasswordConfirmError" class="textError"></p>
                </div>
                <div class="subscribeLabel  subscribeLabelPassWordConfirm "> <label
                        for="associationPasswordConfirm">Confirmer Mot de passe:</label>
                </div>
                <div class="divInputForm"> <input id="associationPasswordConfirm" class="inputParameter subscribeInput"
                        type="password" name="associationPasswordConfirm" placeholder="Confirmez votre mot de passe" />
                    <button disabled="disabled" id="btnAssociationPasswordConfirm" type="submit"
                        name="btnAssociationPasswordConfirm" valeur="btnAssociationPasswordConfirm">Modifier</button>
                </div>
            </form>
            <div>
                <p>Supprimer son compte:</p>
                <form action="" method="POST" name="associationErase">
                    <div>
                        <input type="radio" id="associationEraseYes" name="associationErase"
                            value="associationEraseYes">
                        <label for="aAssociationEraseYes">Oui</label>
                        <input type="radio" id="associationEraseNo" name="associationErase" value="associationEraseNo"
                            checked>
                        <label for="associationEraseNo">Non</label>
                    </div>
                    <div>
                        <button id="associationErase" type="submit">Validez</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="<?= $type = isset($value->type) ? 'type' : 'choice'; ?>">
        <div id="containerType">
            <p>Selectionner votre catégorie:</p>
            <form id="choiceType" method="POST">
                <div>
                    <input type="radio" id="contactChoice1" name="choiceType" onChange='ChoixCategory()' value="loisirs"
                        checked>
                    <label for="contactChoice1">Loisirs</label>
                    <input type="radio" id="contactChoice2" name="choiceType" onChange='ChoixCategory()' value="sport">
                    <label for="contactChoice2">Sport</label>
                    <input type="radio" id="contactChoice3" name="choiceType" onChange='ChoixCategory()'
                        value="culture">
                    <label for="contactChoice3">Culture</label>
                </div>
                <div>
                    <select id="heading" name="heading" onChange='Choix(this.form)'>
                    </select>
                    <select id="subHeading" name="subHeading">
                    </select>
                </div>
                <div>
                    <button name="btnChoiceType" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</section>
<div id="hide"></div>
<section id="viewPage">
    <div id="associationLogo" class="containerProfilAssociation">
        <div>
            <input type="file" name="fileLogo" id="fileLogo">
            <input type="button" id="btnUploadFileLogo" value="Charger l'image de votre logo."
                onclick="uploadFile('fileLogo');">
        </div>
        <div id="associationContainerLogo">
            <div id="containerAssociationLogo">
                <img src="<?=$imgLogoSrc; ?>" alt="" id="associationImageLogo">
                <div id="associationLogoContainerForm">
                    <div class="divTextError">
                        <p id="associationNameConstuctError" class="textError"></p>
                    </div>
                    <div class="subscribeLabel">
                    </div>
                    <div class="divInputForm"> <input id="associationNameConstuct"
                            class=" inputParameter subscribeInput" type="text" name="name"
                            placeholder="Inscrire le nom de votre association"
                            value="<?= $associationName = isset($informationSearch->name) ? $informationSearch->name : null; ?>">
                    </div>
                    <form action="" method="POST">
                        <div class="divTextError">
                            <p id="associationSloganConstuctError" class="textError"></p>
                        </div>
                        <div class="subscribeLabel">
                        </div>
                        <div class="divInputForm"> <input id="associationSloganConstuct"
                                class=" inputParameter subscribeInput" type="text" name="associationSlogan"
                                placeholder="Votre Slogan"
                                value="<?= $slogan = isset($value->slogan) ? $value->slogan : null; ?>">
                        </div>
                        <div>
                            <button id="btnAssociationLogo" name="btnAssociationLogo" type="submit">Mettre à
                                jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="associationDescription" class="containerProfilAssociation">
            <div id="associationContainerDescription">
                <div id="containerAssociationDescription">
                    <div id="associationDescriptionContainerForm">
                        <form action="" method="POST">
                            <textarea class="inputParameter" id="associationDescriptionText" name="description" rows="5"
                                cols="92"><?= $description = isset($value->description) ? $value->description : 'Racontez en plus sur votre association !!!'; ?></textarea>
                            <div>
                                <button id="btnAssociationDescription" type="submit"
                                    name="btnAssociationDescription">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="associationMap" class="containerProfilAssociation">
        <div>
            <input type="file" name="fileMap" id="fileMap">
            <input type="button" id="btn_uploadfile" value="Charger une image de votre association."
                onclick="uploadFile('fileMap');">
        </div>
        <div id="associationContainerMap">
            <div id="containerAssociationMap"><img src="<?=$imgMapSrc; ?>" alt="" class="associationImage"
                    id="associationImgMap">
                <div id="map"></div>
            </div>
        </div>
        <div id="associationMapContainerForm">
            <form action="" method="POST">
                <div class="divTextError">
                    <p id="associationLongitudeConstuctError" class="textError"></p>
                </div>
                <div class="subscribeLabel"> </div>
                <div class="divInputForm"> <input id="longitude" class=" inputParameter subscribeInput" type="text"
                        name="associationLongitude" placeholder="Longitude"
                        value="<?= $longitude = isset($value->longitude) ? $value->longitude : null; ?>">
                </div>
                <div class="divTextError">
                    <p id="associationLatitudeConstuctError" class="textError"></p>
                </div>
                <div class="subscribeLabel"> </div>
                <div class="divInputForm"> <input id="latitude" class=" inputParameter subscribeInput" type="text"
                        name="associationLatitude" placeholder="Latitude"
                        value="<?= $latitude = isset($value->latitude) ? $value->latitude : null; ?>">
                </div>
                <p class="mapText">Entrez les coordonnées géographiques de votre association</p>
        </div>
        <div>
            <button id="btnAssociationMap" name="btnAssociationMap" type="submit">Mettre à jour</button>
        </div>
        </form>
    </div>
    <div class="containerViewLarge">
        <div id="associationActu">
            <div>
                <input type="file" name="fileActu" id="fileActu">
                <input type="button" id="btn_uploadfile" value="Charger l'image de votre logo."
                    onclick="uploadFile('fileActu');">
            </div>
            <div id="associationContainerActu">
                <div id="containerAssociationActu">
                    <img src="<?=$imgActuSrc; ?>" alt="" class="associationImage" id="associationImageActu">
                </div>
                <div id="associationActuContainerForm">
                    <form action="" method="POST">
                        <div class="divTextError">
                            <p id="associationActuTitleConstuctError" class="textError"></p>
                        </div>
                        <div class="subscribeLabel"> </div>
                        <div class="divInputForm"> <input id="associationActuTitleConstuct"
                                class=" inputParameter subscribeInput" type="text" name="titleStory"
                                placeholder="Titre de votre actualité"
                                value="<?= $titleStory = isset($value->titleStory) ? $value->titleStory : ''; ?>">
                        </div>
                        <textarea class="inputParameter" id="associationStoryActu" name="story" rows="5"
                            cols="33"><?= $story = isset($value->story) ? $value->story : 'Racontez en plus sur votre actualité !!!'; ?></textarea>
                        <div>
                            <button id="btnAssociationActu" name="btnAssociationActu" type="submit">Mettre à
                                jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="associationCalendar" class="containerProfilAssociation">
        <div id="associationContainerCalendar">
            <p>Prochainement un calendrier vous permettra d'insérer vos évènements!!!!!</p>
            <img src="assets\img\calendrier-avril-2022.jpg" id="associationImgCalendar" alt="">
        </div>
    </div>
    <div id="associationSocial" class="containerProfilAssociation">
        <div id="associationContainerSocial">
            <div id="containerAssociationSocial">
                <img src="assets/img/iconSocial/icons8-f-de-facebook-96.png" alt="">
                <img src="assets/img/iconSocial/icons8-instagram-96.png" alt="">
                <img src="assets/img/iconSocial/icons8-twitter-entouré-96.png" alt="">
            </div>
            <div id="associationSocialContainerForm">
                <form action="" method="POST">
                    <div class="divTextError">
                        <p id="associationSocialFacebookConstructError" class="textError"></p>
                    </div>
                    <div class="subscribeLabel"> </div>
                    <div class="divInputFormSocial"> <input id="associationSocialFacebookConstruct"
                            class=" inputParameter subscribeInput" type="text" name="facebook"
                            placeholder="Entrer votre adresse Facebook si vous en possedez une."
                            value="<?= $associationUrlFacebook = isset($value->urlFacebook) ? $value->urlFacebook : null; ?>">
                    </div>
                    <div><button id="btnAssociationSocial" name="btnAssociationFacebook" type="submit">Mettre à
                            jour</button>
                    </div>
                </form>
                <form action="" method="POST">
                    <div class="divTextError">
                        <p id="associationSocialInstagramConstructError" class="textError"></p>
                    </div>
                    <div class="subscribeLabel"></div>
                    <div class=" divInputFormSocial"> <input id="associationSocialInstagramConstruct"
                            class=" inputParameter subscribeInput" type="text" name="instagram"
                            placeholder="Entrer votre adresse Instagram si vous en possedez une."
                            value="<?= $associationUrlInstagram = isset($value->urlInstagram) ? $value->urlInstagram : null; ?>">
                    </div>
                    <div><button id="btnAssociationSocial" name="btnAssociationInstagram" type="submit">Mettre à
                            jour</button>
                    </div>
                </form>
                <form action="" method="POST">
                    <div class="divTextError">
                        <p id="associationSocialTwitterConstructError" class="textError"></p>
                    </div>
                    <div class="subscribeLabel"></div>
                    <div class=" divInputFormSocial"> <input id="associationSocialTwitterConstruct"
                            class=" inputParameter subscribeInput" type="text" name="twitter"
                            placeholder="Entrer votre adresse Twitter si vous en possedez une."
                            value="<?= $associationUrlTwitter = isset($value->urlTwitter) ? $value->urlTwitter : null; ?>">
                    </div>
                    <div>
                        <button id="btnAssociationSocial" name="btnAssociationTwitter" type="submit">Mettre à
                            jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
if(isset($errorArray)){
if (count($errorArray) != 0) {
    ?><div id="error">
    <form name="form1">
        <input id="defText" type="text" name="deftext" size=70>
    </form>
    <div id="containerLineError">
        <div class="line line1"></div>
        <div class="line line2"></div>
    </div>
    <h3>Attention !!!</h3>
    <?php
    foreach ($errorArray as $clef => $input) {
        $clearClef = Str::cutlWord($clef); ?>
    <p>
        <?=$clearClef.': '.$input; ?>
    </p>
    <?php
    } ?>
</div> <?php
}}
?>
<?php
include 'parts/errorConnect.php';
include 'parts/footer.php';