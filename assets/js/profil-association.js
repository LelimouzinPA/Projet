let btnParameter = document.getElementById("btnParameter")
let containerSetting = document.getElementById("containerSetting")
let btndisconnect = document.getElementById("btndisconnect")
let btnFavorisImg = document.getElementById("btnFavorisImg")
let btnParameterImg = document.getElementById("btnParameterImg")
let btndisconnectImg = document.getElementById("btndisconnectImg")
let btnFavoris = document.getElementById("btnFavoris")
let containerType = document.getElementById("containerType")
let hide = document.getElementById("hide")
let passwordEmpty = document.getElementById("associationPassword")
let passwordConfirmEmpty = document.getElementById("associationPasswordConfirm")
let passwordButton = document.getElementById("btnAssociationPasswordConfirm")
let valeur = document.forms["associationPassword"].elements["associationPassword"].value
if (document.getElementById("type")) {
    containerType.style.display = "none"
    hide.style.display = "none"
}
btnFavoris.addEventListener("mouseover", function () {
    this.style.background = "rgb(109, 44, 100)"
    btnFavorisImg.src = ".//assets/img/Icon/icons8-étoile-96copie.png"
})
btnFavoris.addEventListener("mouseout", function () {
    this.style.background = "rgb(115, 0, 128)"
    btnFavorisImg.src = ".//assets/img/Icon/icons8-étoile-96.png"
})
btndisconnect.addEventListener("mouseover", function () {
    this.style.background = "rgb(109, 44, 100)"
    btndisconnectImg.src = ".//assets/img/Icon/icons8-déconnecté-96.png"
})
btndisconnect.addEventListener("click", function () {
    window.location.href = "http://localhost:8888/ProjetProv3/Projet/disconnect.php"
})
btndisconnect.addEventListener("mouseout", function () {
    this.style.background = "rgb(115, 0, 128)"
    btndisconnectImg.src = ".//assets/img/Icon/icons8-connecté-96.png"
})
btnParameter.addEventListener("mouseover", function () {
    this.style.background = "rgb(109, 44, 100)"
    containerSetting.style.border = "4mm ridge rgb(0, 31, 0)"
    btnParameterImg.src = ".//assets/img/Icon/icons8-paramètres-96copie.png"
})
btnParameter.addEventListener("mouseout", function () {
    this.style.background = "rgb(115, 0, 128)"
    containerSetting.style.border = "4mm ridge rgb(0, 42, 0)"
    btnParameterImg.src = ".//assets/img/Icon/icons8-paramètres-96.png"
})
let add = 1
btnParameter.addEventListener("click", function () {
    if (add == 0) {
        containerSetting.style.width = "50px"
        containerSetting.style.height = "150px"
        containerSetting.style.display = "none"
        add = 1
    } else {
        containerSetting.style.width = "50%"
        containerSetting.style.height = "363px"
        containerSetting.style.display = "inline-block"
        containerSetting.style.position = "absolute"
        containerSetting.style.zIndex = "3002"
        add = 0
    }
})
passwordEmpty.addEventListener("change", function () {
    if (passwordEmpty.value.length == 0) {
        btnAssociationPasswordConfirm.disabled = true
        btnAssociationPasswordConfirm.classList.toggle("disabled")
    }
})
passwordConfirmEmpty.addEventListener("change", function () {
    if (passwordConfirmEmpty.value.length == 0) {
        btnAssociationPasswordConfirm.disabled = true
        btnAssociationPasswordConfirm.classList.toggle("disabled")
    }
})
// Upload file
function uploadFile($choise) {
    let files = document.getElementById($choise).files
    if (files.length > 0) {
        let formData = new FormData()
        formData.append($choise, files[0])
        let xhttp = new XMLHttpRequest()
        // Set POST method and ajax file path
        xhttp.open("POST", "controllers/ajax-fileCtrl.php", true)
        // call on request changes state
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText
                if (response == 1) {
                    alert("Upload successfully.")
                    location.reload()
                } else {
                    alert("File not uploaded.")
                }
            }
        }
        // Send request with data
        xhttp.send(formData)
    } else {
        alert("Vous n'avez pas sélectionnez de fichier")
    }
}

