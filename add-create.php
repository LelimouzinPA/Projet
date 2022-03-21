<?php
include 'controllers/add-createCtrl.php';
include 'parts/header.php'              ;
?>
<div id="radioSelectContainer">
    <div>
        <div id="circleRadioMenu">
            <div class="circleMenuRadio">
                <h2>Vous êtes un(e)</h2>
            </div>
        </div>
        <div class="radioSelect">
            <input id="radioSelect1" type="radio" name="rotate-cube-side" value="front" checked />
            <input id="radioSelect2" type="radio" name="rotate-cube-side" value="bottom" />
            <label id="selectParticular" for="radioSelect1" class="select select1">
                <div Class="radioSelectDot"></div>
                <p>Particulier</p>
            </label>
            <label id="selectProfessional" for="radioSelect2" class="select select2">
                <div id="select2" Class="radioSelectDot"></div>
                <p>Association</p>
            </label>
        </div>
    </div>
</div>
<div id="userCreationContainer">
    <div class="userCreation">
        <div id="particular" class="userCreationView userCreationParticular">
            <div>
                <h2>Créez votre compte utilisateur </h2>
            </div>
            <form action="" method="POST" name="fileinfoParticular" enctype="multipart/form-data">
                <div class="containerFormUserAdd">
                    <div id="containerFormUser">
                        <div class="divTextError">
                            <p id="userPseudoError" class="textError"></p>
                        </div>
                        <div class="subscribeLabel"> <label for="userPseudo">Pseudo:</label></div>
                        <div class="divInputForm"> <input id="userPseudo" class=" input subscribeInput" type="text"
                                name="userPseudo" placeholder="Entrez votre pseudo" /></div>
                        <div class="divTextError">
                            <p id="userEmailError" class="textError"></p>
                        </div>
                        <div class="subscribeLabel"> <label for="userEmail">Email:</label></div>
                        <div class="divInputForm"> <input id="userEmail" class="input subscribeInput" type="text"
                                name="userEmail" placeholder="Entrez votre Email" /> </div>
                        <div class="divTextError">
                            <p id="userPasswordError" class="textError"></p>
                        </div>
                        <div class="subscribeLabel"> <label for="userPassword">Mot de passe:</label></div>
                        <div class="divInputForm"> <input id="userPassword" class="input subscribeInput" type="password"
                                name="userPassword" placeholder="Entrez un mot de passe" /> </div>
                        <div class="divTextError">
                            <p id="userPasswordConfirmError" class="textError"></p>
                        </div>
                        <div class="subscribeLabel"> <label for="userPasswordConfirm">Confirmer Mot de passe:</label>
                        </div>
                        <div class="divInputForm"> <input id="userPasswordConfirm" class="input subscribeInput"
                                type="password" name="userPasswordConfirm" placeholder="Confirmez votre mot de passe" />
                        </div>
                    </div>
                </div>
                <button class="disabled" disabled="disabled" name="buttonParticular" id="buttonParticular" type="submit"
                    valeur="buttonParticular">Validez</button>
            </form>
        </div>
        <div id="professional" class="userCreationView userCreationProfessional">
            <div>
                <h2>Créez votre compte utilisateur </h2>
            </div>
            <form action="" method="POST" name="fileinfoProfessional" enctype="multipart/form-data">
                <div class="containerFormUserAdd">
                    <div id="containerFormAssociation">
                    <div class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationRnaError" class="textError textErrorAssociation"></p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationRna">N° RNA</label></div>
                            <div class="divInputForm"> <input id="associationRna" class="input subscribeInput"
                                    type="text" name="associationRna" placeholder="ex: W123456789" /></div>
                        </div>
                        
                         <div class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationObjetError" class="textError textErrorAssociation"></p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationObjet">Objet de l'association:</label>
                            </div>
                            <div class="divInputForm">
                                <textarea id="associationObjet" class="input subscribeInput" name="associationObjet"
                                    rows="5" cols="33" placeholder="ex: A pour but de donner de l'espoir"></textarea>
                            </div>
                        </div>
                        
                         
                        
                     <div id="containerAssociationSiren" class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationSirenError" class="textError textErrorAssociation"></p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationSiren">N° SIREN (facultatif)</label></div>
                            <div class="divInputForm"> <input id="associationSiren" class="input subscribeInput"
                                    type="text" name="associationSiren" placeholder="ex: 12345678912345" />
                            </div>
                        </div>
                    
                     <div id="containerAssociationAdresse" class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationAdresseError" class="textError textErrorAssociation">
                                </p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationAdresse">Addresse du siege
                                    :</label></div>
                            <div class="divInputForm"> <input id="associationAdresse" class="input subscribeInput"
                                    type="text" name="associationAdresse"
                                    placeholder="ex: 1 rue de l'espoir 80000 Amiens" /></div>
                        </div>
                    
                    
                    <div id="containerAssociationName" class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationNameError" class="textError textErrorAssociation"></p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationName">Noms de l'association:</label>
                            </div>
                            <div class="divInputForm"> <input id="associationName" class="input subscribeInput"
                                    type="text" name="associationName" placeholder="ex: Espoir " /></div>
                        </div>
                    
                     <div class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationEmailError" class="textError textErrorAssociation"></p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationEmail">Email:</label></div>
                            <div class="divInputForm"> <input id="associationEmail" class="input subscribeInput"
                                    type="email" name="associationEmail" placeholder="ex: toto@example.fr" /> </div>
                        </div>
                    
                          <div id="containerAssociationPseudo" class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationPseudoError" class="textError textErrorAssociation"></p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationPseudo">Pseudo:</label></div>
                            <div class="divInputForm"> <input id="associationPseudo" class="input subscribeInput"
                                    type="text" name="associationPseudo" placeholder="ex: Toto" /></div>
                        </div>
                        <div  class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationPasswordConfirmError" class="textError textErrorAssociation"></p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationPasswordConfirm">Confirmer mot de
                                    passe:</label></div>
                            <div class="divInputForm"> <input id="associationPasswordConfirm"
                                    class="input subscribeInput" type="password" name="associationPasswordConfirm"
                                    placeholder="Confirmez votre mot de passe" /> </div>
                        </div>
                        
                        <div id="containerAssociationPassword" class="containerAssociation">
                            <div class="divTextError">
                                <p id="associationPasswordError" class="textError textErrorAssociation"></p>
                            </div>
                            <div class="subscribeLabel"> <label for="associationPassword">Mot de passe:</label></div>
                            <div class="divInputForm"> <input id="associationPassword" class="input subscribeInput"
                                    type="password" name="associationPassword" placeholder="Entrez un mot de passe" />
                            </div>
                        </div>
                        
                        
                        
                    
                    
                    
                    
                    
                    
                    
                    </div>
                    
                    
                </div>
                <button class="disabled" disabled="disabled" type="submit" name='buttonProfessional'
                    id="buttonProfessional" valeur="professional">Validez</button>
            </form>
        </div>
    </div>
    </form>
</div>
<?php
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
}
?>
</div>
<?php
include 'parts/errorConnect.php';
include 'parts/footer.php'      ;