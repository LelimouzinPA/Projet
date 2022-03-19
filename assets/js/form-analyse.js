//construction d"un tableau de regex pour pouvoir inserer dans la fonction regextest
regex = [];
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationNameConstuct"] = /^[0-9]*[a-zÀ-ÖØ-öø-ÿ\ \']*[0-9]*([\-a-zÀ-ÖØ-öø-ÿ]*)?$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationSloganConstuct"] = /^[0-9]*[a-zÀ-ÖØ-öø-ÿ\ \']*[0-9]*([\-a-zÀ-ÖØ-öø-ÿ]*)?$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationLongitudeConstuct"] = /^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationLatitudeConstuct"] = /^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationActuTitleConstuct"] = /^[0-9]*[a-zÀ-ÖØ-öø-ÿ\ \']*[0-9]*([\-a-zÀ-ÖØ-öø-ÿ]*)?$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationSocialFacebookConstruct"] = /^https:\/\/www.facebook.com\/[a-z0-9\.]+\/?$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationSocialInstagramConstruct"] = /^https:\/\/www.instagram.com\/[a-z0-9\.]+\/?$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationSocialTwitterConstruct"] = /^https:\/\/www.twitter.com\/[a-z0-9\.]+\/?$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["userPseudo"] = /^[0-9a-zÀ-ÖØ-öø-ÿ][0-9\-_a-zÀ-ÖØ-öø-ÿ]{4,}$/i;
//Regex acceptant un idSelect mail
regex["userEmail"] =
    /^[a-z0-9]([a-z0-9\-\_\.]*)[@]([a-z0-9\.]+)[\.]([a-z]){2,5}/i;
//Regex qui accepte et doit comporter au moins 8 caracatere dont lettres minuscule/majuscule + chiffre  + caractere special
regex["userPassword"] =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z0-9@$!%*?&]{8,}$/;
//Regex qui accepte et doit comporter au moins 8 caracatere dont lettres minuscule/majuscule + chiffre  + caractere special
regex["userPasswordConfirm"] =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z0-9@$!%*?&]{8,}$/;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationName"] =
    /^[0-9]*[a-zÀ-ÖØ-öø-ÿ\ \']*[0-9]*([\-a-zÀ-ÖØ-öø-ÿ]*)?$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationObjet"] =
    /^[0-9]*[a-zÀ-ÖØ-öø-ÿ\ \']*[0-9]*([\-a-zÀ-ÖØ-öø-ÿ]*)?$/i;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationAdresse"] =
    /^[0-9]+[a-zÀ-ÖØ-öø-ÿ\ \-']+[0-9]{5}\ [a-zÀ-ÖØ-öø-ÿ]+[a-zÀ-ÖØ-öø-ÿ\ \-']+$/i;
//Regex qui accepte W et 9 chiffres aprés
regex["associationRna"] = /^W[0-9]{9}$/;
//Regex qui accepte 14 chiffres
regex["associationSiren"] = /^[0-9]{14}$/;
//Regex qui accepte lettres minuscule/majuscule + accents + tirets et chiffre
regex["associationPseudo"] =
    /^[0-9a-zÀ-ÖØ-öø-ÿ][0-9\-_a-zÀ-ÖØ-öø-ÿ]{4,}$/i;
//Regex acceptant un idSelect mail
regex["associationEmail"] =
    /^[a-z0-9]([a-z0-9\-\_\.]*)[@]([a-z0-9\.]+)[\.]([a-z]){2,5}/i;
//Regex qui accepte et doit comporter au moins 8 caracatere dont lettres minuscule/majuscule + chiffre  + caractere special
regex["associationPassword"] =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z0-9@$!%*?&]{8,}$/;
//Regex qui accepte et doit comporter au moins 8 caracatere dont lettres minuscule/majuscule + chiffre  + caractere special
regex["associationPasswordConfirm"] =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z0-9@$!%*?&]{8,}$/;
errorMessage = [];
// creation des message d"erreur pour chaque champs
errorMessage["associationNameConstuct"] = "Merci d'entrer uniquement des lettres des chiffres des espaces et des tirets.";
errorMessage["associationSloganConstuct"] = "Merci d'entrer uniquement des lettres des chiffres des espaces et des tirets.";
errorMessage["associationLongitudeConstuct"] = "Merci d'entrer une longitude correct.";
errorMessage["associationLatitudeConstuct"] = "Merci d'entrer une latitude correct.";
errorMessage["associationActuTitleConstuct"] = "Merci d'entrer uniquement des lettres des chiffres des espaces et des tirets.";
errorMessage["associationSocialFacebookConstruct"] = "Merci d'entrer un adresse Facebook correct.";
errorMessage["associationSocialInstagramConstruct"] = "Merci d'entrer un adresse Instagram correct.";
errorMessage["associationSocialTwitterConstruct"] = "Merci d'entrer un adresse Twitter correct.";



errorMessage["userPseudo"] = "Merci d'entrer un Pseudo ayant minimum cinq caractéres constituez de lettres et chiffre, il est possible d'utiliser les tirets.";
errorMessage["userEmail"] = "Merci d'entrer une adresse mail valide.";
errorMessage["userPassword"] = "Merci d'entrer un mot de passe Minimum huit caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
errorMessage["userPasswordConfirm"] = "Merci d'entrer un mot de passe Minimum huit caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
errorMessage["associationName"] = "Merci d'entrer uniquement des lettres des chiffres des espaces et des tirets.";
errorMessage["associationObjet"] = "Merci d'entrer uniquement des lettres des chiffres des espaces et des tirets.";
errorMessage["associationAdresse"] = "Merci d'entrer une adresse valide.";
errorMessage["associationRna"] = "Merci d'entrer un numéro rna commençant par un W en majuscule suivis de vos 9 chiffres.";
errorMessage["associationSiren"] = "Merci d'entrer un mot numéro SIREN composer de 9 chiffres du numéro SIREN + les 5 chiffres du NIC (numéro interne de classement propre à chaque établissement)";
errorMessage["associationPseudo"] = "Merci d'entrer un Pseudo ayant minimum cinq caractéres constituez de lettres et chiffre, il est possible d'utiliser les tirets.";
errorMessage["associationEmail"] = "Merci d'entrer une adresse courriel valide.";
// creation des messages d"erreur pour chaque champs
errorMessagePassword = [];
errorMessagePassword["userPassword"] =
    "Attention mot de passe different de la confirmation";
errorMessagePassword["userPasswordConfirm"] =
    "Attention la confirmation est different du mot de passe";
errorMessagePassword["associationPassword"] =
    "Merci d'entrer un mot de pass avec au moins une Majuscule et un caractére spécial";
errorMessagePassword["associationPasswordConfirm"] =
    "Merci d'entrer un mot de pass avec au moins une Majuscule et un caractére spécial";
/**
 * constante des champs des formulaires
 */
const subscribeInput = document.querySelectorAll(".subscribeInput");
//Je selectionne tout les éléments HTML ayant pour class subscribeInput. Cela devient une liste d"élément itérable
const subscribeInputArray = Array.from(subscribeInput);
//Je converti cette liste en tableau
subscribeInputArray.map((elmt) => {
    // on ecoute l"element sectionnner parmis les inputs ..subscribeInput pour en sortir id et sa valeur
    elmt.addEventListener("change", () => {
        // on recupere l"id qui va permettre de fire la relation entre le tableau des regex et celui des message d"erreur
        idSelect = elmt.getAttribute("id");
        //on appel la fonction pour effectuer la verification des regex
        regexTest(elmt, regex[idSelect], errorMessage[idSelect], idSelect);
    });
});
/**
 * function qui verifie la regex et remplie la balise p correspondante en cas d"erreur
 * @param {*} inputFull
 * @param {*} regex
 * @param {*} errorMessage
 */
function regexTest(inputFull, regex, errorMessage, idSelect) {
    // avec idSelect qui correspond à l"id du champ modifier de l"input  on determine l"id du p correspondant(idSelect+Error ex : pseudoError)
    idPText = idSelect + "Error";
    //on selectionne les elements qui vont etre modifier
    let input = document.getElementById(idSelect);
    let pError = document.getElementById(idPText);
    if (idSelect.includes("user")) {
        type = "userValid";
    } else {
        type = "associationValid";
    }
    //Création de la condition du test Regex avec la valeur de l"input modifier
    if (inputFull.value == "") {
        pError.innerText = "";
        //Texte du paragraphe de validation.
        input.style.border = "none";
        input.classList.remove(type);
        //Changement de couleur.
       /* input.border = "3px outset green";*/
    } else if (regex.test(inputFull.value)) {
        pError.innerText = "";
        //Texte du paragraphe de validation.
        input.style.border = "3px solid green";
        checkSpecial(idSelect);
        //Changement de couleur.
    } else if (!regex.test(inputFull.value)) {
        //Texte si refus de la validation de la regex.
        pError.innerText = errorMessage;
        //Changement de couleur.
        input.style.border = "3px outset red";
        input.classList.remove(type);
    }
}

function checkSpecial(idSelect) {
    // Vérifie si la sous-chaîne existe dans la chaîne de caractères
    if (idSelect.includes("Password")) {
        passwordParameter(idSelect);
    } else {
        check(idSelect);
    }
}
function passwordParameter(idSelect) {
    if (idSelect.includes("user")) {
        let inputPassword = document.getElementById("userPassword");
        let inputPasswordConfirm = document.getElementById("userPasswordConfirm");
        let pPasswordConfirmationError = document.getElementById(
            "userPasswordConfirmError"
        );
        let pPasswordError = document.getElementById("userPasswordError");
        let select = "user";
        passwordVerif(
            inputPassword,
            inputPasswordConfirm,
            pPasswordConfirmationError,
            pPasswordError,
            select
        );
    } else {
        let inputPassword = document.getElementById("associationPassword");
        let inputPasswordConfirm = document.getElementById(
            "associationPasswordConfirm"
        );
        let pPasswordConfirmationError = document.getElementById(
            "associationPasswordConfirmError"
        );
        let pPasswordError = document.getElementById("associationPasswordError");
        let select = "association";
        passwordVerif(
            inputPassword,
            inputPasswordConfirm,
            pPasswordConfirmationError,
            pPasswordError,
            select
        );
    }
}
function passwordVerif(
    inputPassword,
    inputPasswordConfirm,
    pPasswordConfirmationError,
    pPasswordError,
    select
) {
    if (
        regex[select + "Password"].test(inputPassword.value) &
        regex[select + "PasswordConfirm"].test(inputPasswordConfirm.value)
    ) {
        if (
            ((inputPassword.value != "") & (inputPasswordConfirm.value == "")) |
            ((inputPassword.value == "") & (inputPasswordConfirm.value == ""))
        ) {
            inputPasswordConfirm.style.border = "none";
            inputPassword.classList.remove(select + "Valid");
            inputPasswordConfirm.classList.remove(select + "Valid");
        } else if (
            (inputPassword.value != "") &
            (inputPassword.value != inputPasswordConfirm.value)
        ) {
            inputPasswordConfirm.style.border = "3px outset red";
            pPasswordError.innerText = errorMessagePassword[select + "Password"];
            pPasswordConfirmationError.innerText =
                errorMessagePassword[select + "PasswordConfirm"];
            inputPassword.classList.remove(select + "Valid");
            inputPasswordConfirm.classList.remove(select + "Valid");
        } else if (inputPassword.value == inputPasswordConfirm.value) {
            inputPassword.style.border = "3px solid green";
            inputPasswordConfirm.style.border = "3px solid green";
            pPasswordError.innerText = "";
            pPasswordConfirmationError.innerText = "";
            inputPassword.classList.add(select + "Valid");
            inputPasswordConfirm.classList.add(select + "Valid");
            select == "user" ? userButtonShow() : associationButtonShow();
        }
    }
}

function check(idSelect) {
    let input = document.getElementById(idSelect);
    // je crée un formulaire virtuel sans html
    const formData = new FormData();
    // je prépare les élèments qui vont etre modifier
    let p = document.getElementById(idSelect + "Error");
    // je prépare les élèments qui vont etre modifie
    formData.append(idSelect, input.value);
    // je vais chercher des conditions dans le fichier ajax-EmailCtrl.php par le moyen d'un Post mit dans l'objet formData
    fetch("controllers/ajaxCtrl.php", {
            method: "POST",
            body: formData,
        })
        //Et j'attend la reponse du fichier ajax-EmailCtrl.php en mode texte
        .then((response) => response.text()) // si je veux recevoire du json je met .json() à la place
        /*je donne les conditions en fonction du resultat venant ici  de ajax-User qui va chercher une
            methode dans le models User pour compter le nombre de fois qu'apparais un pseudo en prenant en compte la valeur entrer
            dans le champs utilisateur
            */
        .then((response) => {
            if (idSelect.includes("user")) {
                type = "userValid";
            } else {
                type = "associationValid";
            }
            if (response == 1) {
                p.innerText = "Existe déjà mince ";
                input.style.border = "3px outset red";
                input.classList.remove(type);
            } else if (response != 1) {
                input.classList.add(type);
            }
        });
}
function userButtonShow() {
    let essai = document.querySelectorAll(".userValid");
    var s = 0;
    for (i = 0; i < essai.length; i++) {
        var s = Number(s) + Number(1);
    }
    let buttonUserForm = document.getElementById("buttonParticular");
    if (s == 4 && buttonUserForm != null) {
        buttonUserForm.disabled = false;
        buttonUserForm.classList.toggle("disabled");
    }
    let btnUserPasswordConfirm = document.getElementById(
        "btnUserPasswordConfirm"
    );
    if (s == 2 && btnUserPasswordConfirm != null) {
        btnUserPasswordConfirm.disabled = false;
        btnUserPasswordConfirm.classList.toggle("disabled");
    }
}
function associationButtonShow() {
    let essai = document.querySelectorAll(".associationValid");
    var s = 0;
    for (i = 0; i < essai.length; i++) {
        var s = Number(s) + Number(1);
    }
    alert(s);
    if (s <= 8) {
        let buttonUserForm = document.getElementById("buttonProfessional");
        buttonUserForm.disabled = false;
        buttonUserForm.classList.remove("disabled");
    }
}
function userChangePasswordButtonShow() {
    let essai = document.querySelectorAll(".userValid");
    var s = 0;
    for (i = 0; i < essai.length; i++) {
        var s = Number(s) + Number(1);
    }
    if (s == 2) {
        let btnUserPasswordConfirm = document.getElementById(
            "btnUserPasswordConfirm"
        );
        btnUserPasswordConfirm.disabled = false;
        buttonUserForm.classList.remove("disabled");
    } else {
        buttonUserForm = "disabled";
        buttonUserForm.classList.add("disabled");
    }
}
let associationRna = document.getElementById("associationRna")
if (associationRna) {
    associationRna.addEventListener("change", function () {
        numberRna = associationRna.value
        let formData = new FormData()
        formData.append('numberRna', numberRna)
        let xhttp = new XMLHttpRequest()
        xhttp.open("POST", "class/Guzzle.php", true)
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText
                result = JSON.parse(response);
                associationName.value = result.association.titre
                idSelectByRna = associationName.id
                regexTest(associationName, regex[idSelectByRna], errorMessage[idSelectByRna], idSelectByRna);
                associationAdresse.value = result.association.adresse_numero_voie + " " + result.association.adresse_type_voie + " " + result.association.adresse_libelle_voie + " " + result.association.adresse_gestion_code_postal + " " + result.association.adresse_libelle_commune
                idSelectByRna = associationAdresse.id
                regexTest(associationAdresse, regex[idSelectByRna], errorMessage[idSelectByRna], idSelectByRna);
                associationObjet.value = result.association.objet
                idSelectByRna = associationObjet.id
                regexTest(associationObjet, regex[idSelectByRna], errorMessage[idSelectByRna], idSelectByRna);
            }
        }
        xhttp.send(formData)
    })
}
