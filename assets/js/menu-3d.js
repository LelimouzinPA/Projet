
let userCreation = document.querySelector(".userCreation");
let radioGroup = document.querySelector(".radioSelect");
let currentClass = "";
let containerLineError = document.getElementById('containerLineError')
let error = document.getElementById('error')

if (error){
containerLineError.addEventListener("click", function () {
    error.style.display = "none"
})}
function changeSide() {
    //recherche la class ou checked est present
    let checkedRadio = radioGroup.querySelector(":checked");
    //et en prendre la valeur
    let showClass = "show-" + checkedRadio.value;
    if (currentClass) {
        userCreation.classList.remove(currentClass);
    }
    userCreation.classList.add(showClass);
    currentClass = showClass;
}
// initialisation de la position du formulaire
changeSide();
// permet de lancer la function au changement du bouton radio
radioGroup.addEventListener("change", changeSide);


//Variable pour le bouton radio de la creation de l"user ou de l"association
let userCreationContainer = document.querySelector("#userCreationContainer");
let selectParticular = document.getElementById("selectParticular")
let selectProfessional = document.getElementById("selectProfessional")

selectParticular.addEventListener("click", () => {

    if (window.matchMedia("(max-width: 900px)").matches) {
        userCreationContainer.style.height = "325px"
        userCreationContainer.style.transition = "height 2s ease-in-out 0s"
    }
    if (window.matchMedia("(min-width: 900px)").matches) {
        userCreationContainer.style.height = "325px"
        userCreationContainer.style.transition = "height 2s ease-in-out 0s"
    }

})
selectProfessional.addEventListener("click", () => {

    if (window.matchMedia("(max-width: 900px)").matches) {
        userCreationContainer.style.height = "600px"
        userCreationContainer.style.transition = "height 0.3s ease-in-out 0s"
    }
    if (window.matchMedia("(min-width: 900px)").matches) {
        userCreationContainer.style.height = "600px"
        userCreationContainer.style.transition = "height 0.3s ease-in-out 0s"
    }
})