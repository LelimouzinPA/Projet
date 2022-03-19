window.onload = function () {
    let myArray = ["http://localhost:8888/ProjetProv3/Projet/assets/img/background/image1.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image2.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image3.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image4.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image5.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image6.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image7.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image8.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image9.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image10.jpg", "http://localhost:8888/ProjetProv3/Projet/assets/img/background/image11.jpg"]
    let rand = myArray[Math.floor(Math.random() * myArray.length)];

    document.getElementById("headerImg").style.backgroundImage = 'url('+rand+')';
}
const btnMenuBurger = document.getElementById("btnMenuBurger")
const btnMenuBurgerZone = document.getElementById("navbar")
const btnMenuBurgerLine1 = document.getElementById("menuBurgerLine1")
const btnMenuBurgerLine2 = document.getElementById("menuBurgerLine2")
const btnMenuBurgerSpecial = document.getElementById("btnMenuBurger")
const btnMenu1 = document.getElementById("btnMenu1")

const btnMenu2 = document.getElementById("btnMenu2")

const btnMenu3 = document.getElementById("btnMenu3")
const btnMenu4 = document.getElementById("btnMenu4")

const btnMenu5 = document.getElementById("btnMenu5")
const btnMenu5View = document.getElementById("btnMenu5View")
/**
bouton du menu burger avec class préparer en css qui permettra l'animation du logo en fléche et un slide de l'ensemble des catégories
*/
btnMenuBurger.addEventListener("click", () => {
    /*condition pour eviter d'avoir un menu ouvert lors de la premiere visite du site */
    if (btnMenuBurgerZone.classList.contains("menuBurger")) {
        btnMenuBurgerZone.classList.replace("menuBurger", "menuBurgerOpen")
        btnBurgerSpecialMenu()
    } else {
        /*permet d'avoir 2 état pour le menu burger ouvert ou fermer*/
        if (btnMenuBurgerZone.classList.contains("menuBurgerOpen")) {
            btnMenuBurgerZone.classList.replace("menuBurgerOpen", "menuBurgerClose")
            btnBurgerSpecialMenu()
        } else {
            btnMenuBurgerZone.classList.replace("menuBurgerClose", "menuBurgerOpen")
            btnBurgerSpecialMenu()
        }
    }
})

/**
fonction pour eviter la repetition dans le menu burger
*/
function btnBurgerSpecialMenu() {
    btnMenuBurgerSpecial.classList.toggle("btnMenuSpecial")
    btnMenuBurgerLine1.classList.toggle("menuBurgerLine1On")
    btnMenuBurgerLine2.classList.toggle("menuBurgerLine2On")
}
let btnMenu5Action = 0
btnMenu5.addEventListener("click", () => {
    session()
})
function session() {
    // je crée un formulaire virtuel sans html
    const formData = new FormData()
    // je prépare les élèments qui vont etre modifier
    // je prépare les élèments qui vont etre modifie
    formData.append('session', 'session')
    // je vais chercher des conditions dans le fichier ajax-EmailCtrl.php par le moyen d'un Post mit dans l'objet formData
    fetch("controllers/ajaxCtrl.php", {
            method: "POST",
            body: formData
        })
        //Et j'attend la reponse du fichier ajax-EmailCtrl.php en mode texte
        .then(response => response.text()) // si je veux recevoire du json je met .json() à la place
        /*je donne les conditions en fonction du resultat venant ici  de ajax-User qui va chercher une
        methode dans le models User pour compter le nombre de fois qu'apparais un pseudo en prenant en compte la valeur entrer
        dans le champs utilisateur
        */
        .then(response => {
            if (response == 'sessionNotStart') {
                if (btnMenu5Action == 0) {
                    btnMenu5Function()
                    btnMenu5Action++
                } else {
                    btnMenu5View.innerHTML = " "
                    btnMenu5Action = 0
                }
            } else if (response == 'sessionStartUser') {
                window.location.assign("/ProjetProv3/Projet/profil-user.php")
            } else if (response == 'sessionStartAssociation') {
                window.location.assign("/ProjetProv3/Projet/profil-association.php")
            }
        })
}
btnMenu1.addEventListener("click", () => {
    window.location.assign("/ProjetProv3/Projet/index.php")
})
btnMenu2.addEventListener("click", () => {
    window.location.assign("/ProjetProv3/Projet/loisirs.php")
})
btnMenu3.addEventListener("click", () => {
    window.location.assign("/ProjetProv3/Projet/sport.php")
})
btnMenu4.addEventListener("click", () => {
    window.location.assign("/ProjetProv3/Projet/culture.php")
})
/**fonction de construction de l'espace personnel avec creation au click du formulaire de saisie */
function btnMenu5Function() {
    let modalUser = document.createElement("div")
    modalUser.className = "form"
    let userForm = document.createElement("form")
    userForm.method = "POST"
    userForm.action = ""
    userForm.name = "login"
    let lineDiv = document.createElement("div")
    lineDiv.id = "containerLine"
    lineDiv.addEventListener("click", () => {
        btnMenu5View.innerHTML = " "
        btnMenu5Action = 0
    })
    for (let i = 1; i < 3; i++) {
        let crossDiv = document.createElement("div")
        crossDiv.className = "line line" + i
        lineDiv.append(crossDiv)
    }
    userForm.append(lineDiv)
    let titleDiv = document.createElement("div")
    titleDiv.className = "title"
    let titleP = document.createElement("p")
    titleP.innerText = "Bonjour"
    titleDiv.appendChild(titleP)
    userForm.append(titleDiv)
    let subTitleDiv = document.createElement("div")
    subTitleDiv.classList = "subTitle"
    let subTitleP = document.createElement("p")
    subTitleP.innerText = "Connectez-vous"
    subTitleDiv.appendChild(subTitleP)
    userForm.append(subTitleDiv)
   /**tableaux pour automatiser la fabrication du code html */
    let contructInput = ["Pseudo", "Email", "Password"]
    /** boucle pour créez les 3 champs du users avec le tableau constructInput */
    contructInput.map((element) => {
        let inputUserDiv = document.createElement("div")
        inputUserDiv.className = "inputContainer"
        let inputUserDivInput = document.createElement("input")
        inputUserDivInput.id = element.toLowerCase()
        inputUserDivInput.className = "input"
        inputUserDivInput.name = element.toLowerCase()
        inputUserDivInput.type = element.toLowerCase()
        inputUserDivInput.placeholder = " "
        let cutDivUserInput = document.createElement("div")
        cutDivUserInput.className = "cut"
        let placeholderUserDiv = document.createElement("label")
        placeholderUserDiv.className = "placeholder"
        placeholderUserDiv.setAttribute("for", element.toLowerCase())
        placeholderUserDiv.innerText = element.toLowerCase()
        inputUserDiv.append(inputUserDivInput, cutDivUserInput, placeholderUserDiv)
        userForm.append(inputUserDiv)
    })
    let buttonDiv = document.createElement("div")
    let submitButton = document.createElement("button")
    submitButton.type = "submit"
    submitButton.name = "login"
    submitButton.className = "submit"
    submitButton.innerText = "Entrer"
    buttonDiv.append(submitButton)
    let noUserDiv = document.createElement("div")
    let noUserP = document.createElement("p")
    noUserP.innerText = "Pas encore de compte cliquez "
    let noUserA = document.createElement("a")
    noUserA.href = "add-create.php"
    noUserA.innerText = "Ici"
    noUserP.appendChild(noUserA)
    noUserDiv.append(noUserP)
    userForm.append(buttonDiv, noUserDiv)
    modalUser.append(userForm)
    document.getElementById("btnMenu5View").append(modalUser)
}
let containerLineErrorConnect = document.getElementById('containerLineErrorConnect')
let errorConnect = document.getElementById('errorConnect')

if(errorConnect){
    containerLineErrorConnect.addEventListener("click", function () {
    errorConnect.style.display = "none"

})}

    let position = 0;
    let msg = "                       k                       s                       Z                       W                       J                       ";
    let longue = msg.length;
    let fois = (70 / msg.length) + 1;
    for (i = 0; i <= fois; i++) msg += msg;
    function textdefil() {
        document.form1.deftext.value = msg.substring(position, position + 70);
        position++;
        if (position == longue) position = 0;
        setTimeout("textdefil()", 220);
    }
let defText = document.getElementById("defText")
if (defText) {
    window.onload = textdefil;
}

