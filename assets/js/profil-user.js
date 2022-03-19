let btnParameter      = document.getElementById('btnParameter'     )
let btnParameterEffet = document.getElementById('btnParameterEffet')
let containerSetting  = document.getElementById('containerSetting' )
let btndisconnect     = document.getElementById('btndisconnect'    )
let btnFavorisImg     = document.getElementById('btnFavorisImg'    )
let btnParameterImg   = document.getElementById('btnParameterImg'  )
let btndisconnectImg  = document.getElementById('btndisconnectImg' )
let btnFavoris        = document.getElementById('btnFavoris'       )
btnFavoris.addEventListener("mouseover", function () {
    this.style.background = "rgb(45, 110, 45)"
    btnFavorisImg.src = ".//assets/img/Icon/icons8-étoile-96copie.png"
})
btnFavoris.addEventListener("mouseout", function () {
    this.style.background = "rgb(0, 128, 0)"
    btnFavorisImg.src = ".//assets/img/Icon/icons8-étoile-96.png"
})
btndisconnect.addEventListener("mouseover", function () {
    this.style.background = "rgb(45, 110, 45)"
    btndisconnectImg.src = ".//assets/img/Icon/icons8-déconnecté-96.png"
})
btndisconnect.addEventListener("click", function () {
    window.location.href = 'http://localhost:8888/ProjetProv3/Projet/disconnect.php';
})
btndisconnect.addEventListener("mouseout", function () {
    this.style.background = "rgb(0, 128, 0)"
    btndisconnectImg.src = ".//assets/img/Icon/icons8-connecté-96.png"
})

btnParameter.addEventListener("mouseover", function () {
    this.style.background = "rgb(45, 110, 45)"
    btnParameterEffet.style.background = "rgb(45, 110, 45)"
    containerSetting.style.border = "4mm ridge rgb(0, 31, 0)"
    btnParameterImg.src = ".//assets/img/Icon/icons8-paramètres-96copie.png"
})
btnParameter.addEventListener("mouseout", function () {
    this.style.background = "rgb(0, 128, 0)"
    btnParameterEffet.style.background = "rgb(0, 128, 0)"
    containerSetting.style.border = "4mm ridge rgb(0, 42, 0)"
    btnParameterImg.src = ".//assets/img/Icon/icons8-paramètres-96.png"
})
let add = 1
btnParameter.addEventListener("click", function () {
    if (add == 0) {

        containerSetting.style.width = "50px";
        containerSetting.style.height = "150px";
        containerSetting.style.display = "none"
        add = 1
    } else {
        containerSetting.style.width = "50%";
        containerSetting.style.height = "418px";
        containerSetting.style.display = "inline-block"
        add = 0
    }
})

let passwordEmpty = document.getElementById('userPassword')
let passwordConfirmEmpty = document.getElementById('userPasswordConfirm')
let passwordButton = document.getElementById('btnUserPasswordConfirm')
var valeur = document.forms['userPassword'].elements['userPassword'].value;

passwordEmpty.addEventListener("change", function () {
    if (passwordEmpty.value.length == 0) {
        btnUserPasswordConfirm.disabled = true
        btnUserPasswordConfirm.classList.toggle('disabled')
    }
})
passwordConfirmEmpty.addEventListener("change", function () {
    if (passwordConfirmEmpty.value.length == 0) {
        btnUserPasswordConfirm.disabled = true
        btnUserPasswordConfirm.classList.toggle('disabled')
    }
})