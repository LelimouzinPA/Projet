const selectNamePage = document.getElementById("subHeading")
ChoixCategory()
function ChoixCategory() {

    for (indice = 1; indice <= 3; indice++) {
        if (document.getElementById("contactChoice" + indice).checked) {
            choiceType = document.getElementById("contactChoice" + indice).value
        }
    }
    switch (choiceType) {
        case 'loisirs':
            var txt = new Array("-- Choisissez une rubrique --", "Sports collectifs", "Activités mécaniques", "Sports de raquette", "Sports de combat", "Sports de glisse", "Sports individuels", "Sports de nature", "Sports de précision", "Activités cyclistes", "Activités aériennes", "Sports aquatiques");
            break;
        case 'sport':
            var txt = new Array("-- Choisissez une rubrique --", "Sports collectifs", "Activités mécaniques", "Sports de raquette", "Sports de combat", "Sports de glisse", "Sports individuels", "Sports de nature", "Sports de précision", "Activités cyclistes", "Activités aériennes", "Sports aquatiques");
            break;
        case 'culture':
            var txt = new Array("-- Choisissez une rubrique --", "Architecture", "Musique et danse", "Peinture, sculpture, gravure");
            break;
        default:
            break;
    }
    let selectNameRubrique = document.getElementById("heading")
    selectNameRubrique.innerHTML = ""
    selectNamePage.innerHTML = ""

    for (i = 0; i < txt.length; i++) {
        let formCreate = document.createElement("option")
        formCreate.innerText = txt[i];
        formCreate.value = txt[i]
        selectNameRubrique.append(formCreate)
    }
}

function Choix(form) {
    selectNamePage.innerText = "";
    for (indice = 1; indice <= 3; indice++) {
        if (document.getElementById("contactChoice" + indice).checked) {
            choiceType = document.getElementById("contactChoice" + indice).value
        }
    }
    switch (choiceType) {
        case 'loisirs':
            ChoixLoisirs(form)
            break;
        case 'sport':
            ChoixSport(form)
            break;
        case 'culture':
            ChoixCulture(form)
            break;
        default:
            break;
    }
}
function ChoixLoisirs(form) {
    selectNamePage.innerText = "";
    indexForm = form.heading.selectedIndex;
    if (indexForm == 0) {
        return;
    }
    switch (indexForm) {
        case 1: var txt = new Array("--Choisissez une sous rubrique--", "Homeball", "Baskin", "Ufolep", "Football Américain", "Futsal", "Volley-ball", "Football", "Basket-ball", "Rugby", "Handball", "Hockey sur gazon", "Hockey sur glace", "Base-ball", "Intercrosse", "Kin ball", "Korfbal", "Floorball"); break;
        case 2: var txt = new Array("--Choisissez une sous rubrique--", "Sports mécaniques moto", "Sports mécaniques auto", "Karting piste - L’UFOLEP EN PISTE", "Transition écologique et sports mécaniques"); break;
        case 3: var txt = new Array("--Choisissez une sous rubrique--", "Badminton", "Tennis de table", "Tennis", "Squash"); break;
        case 4: var txt = new Array("--Choisissez une sous rubrique--", "Bâton Egyptien", "Canne de combat", "Arts martiaux", "Karaté", "Ju jitsu", "Viet vo dao", "Judo", "Escrime", "Boxe éducative et boxe française", "Bâton français", "Luttes traditionnelles - Kourach"); break;
        case 5: var txt = new Array("--Choisissez une sous rubrique--", "Trottinette", "Roller et glisse urbaine", "Caisse à savon", "Squash", "Ski nautique", "Surf"); break;
        case 6: var txt = new Array("--Choisissez une sous rubrique--", "Haltérophilie-Musculation-Force Athlétique", "Echasse urbaine", "Jogging", "Athlétisme", "Activités physiques d'entretien"); break;
        case 7: var txt = new Array("--Choisissez une sous rubrique--", "Randonnée pédestre", "Marche nordique", "Equitation", "Randonnée multiactivités", "Escalade", "Raid multisports et épreuves combinées", "Course d'orientation", "Duathlon - Triathlon", "Accrobranche"); break;
        case 8: var txt = new Array("--Choisissez une sous rubrique--", "Tir à l'arc", "Pétanque", "Bowling", "Sarbacane", "Croquet", "Billard", "Arbalète", "Boules lyonnaises"); break;
        case 9: var txt = new Array("--Choisissez une sous rubrique--", "Cyclotourisme", "Bike trial", "Vélo couché", "Cyclo sport", "Bicross", "Dirt"); break;
        case 10: var txt = new Array("--Choisissez une sous rubrique--", "Vol libre", "Cerf-volant", "ULM", "Parachutisme", "Modélisme"); break;
        case 11: var txt = new Array("--Choisissez une sous rubrique--", "Natation", "Voile et activités nautiques", "Canoë kayak", "Char à voile", "Aviron", "Véhicule Nautique à Moteur"); break;
    }
    for (i = 0; i < txt.length; i++) {
        let formNameCreate = document.createElement("option")
        formNameCreate.innerText = txt[i];
        formNameCreate.value = txt[i];

        selectNamePage.append(formNameCreate)
    }
}
function ChoixSport(form) {
    selectNamePage.innerText = "";

    indexForm = form.heading.selectedIndex;
    if (indexForm == 0) {
        return;
    }
    switch (indexForm) {
        case 1: var txt = new Array("--Choisissez une sous rubrique--", "Homeball", "Baskin", "Ufolep", "Football Américain", "Futsal", "Volley-ball", "Football", "Basket-ball", "Rugby", "Handball", "Hockey sur gazon", "Hockey sur glace", "Base-ball", "Intercrosse", "Kin ball", "Korfbal", "Floorball"); break;
        case 2: var txt = new Array("--Choisissez une sous rubrique--", "Sports mécaniques moto", "Sports mécaniques auto", "Karting piste - L’UFOLEP EN PISTE", "Transition écologique et sports mécaniques"); break;
        case 3: var txt = new Array("--Choisissez une sous rubrique--", "Badminton", "Tennis de table", "Tennis", "Squash"); break;
        case 4: var txt = new Array("--Choisissez une sous rubrique--", "Bâton Egyptien", "Canne de combat", "Arts martiaux", "Karaté", "Ju jitsu", "Viet vo dao", "Judo", "Escrime", "Boxe éducative et boxe française", "Bâton français", "Luttes traditionnelles - Kourach"); break;
        case 5: var txt = new Array("--Choisissez une sous rubrique--", "Trottinette", "Roller et glisse urbaine", "Caisse à savon", "Squash", "Ski nautique", "Surf"); break;
        case 6: var txt = new Array("--Choisissez une sous rubrique--", "Haltérophilie-Musculation-Force Athlétique", "Echasse urbaine", "Jogging", "Athlétisme", "Activités physiques d'entretien"); break;
        case 7: var txt = new Array("--Choisissez une sous rubrique--", "Randonnée pédestre", "Marche nordique", "Equitation", "Randonnée multiactivités", "Escalade", "Raid multisports et épreuves combinées", "Course d'orientation", "Duathlon - Triathlon", "Accrobranche"); break;
        case 8: var txt = new Array("--Choisissez une sous rubrique--", "Tir à l'arc", "Pétanque", "Bowling", "Sarbacane", "Croquet", "Billard", "Arbalète", "Boules lyonnaises"); break;
        case 9: var txt = new Array("--Choisissez une sous rubrique--", "Cyclotourisme", "Bike trial", "Vélo couché", "Cyclo sport", "Bicross", "Dirt"); break;
        case 10: var txt = new Array("--Choisissez une sous rubrique--", "Vol libre", "Cerf-volant", "ULM", "Parachutisme", "Modélisme"); break;
        case 11: var txt = new Array("--Choisissez une sous rubrique--", "Natation", "Voile et activités nautiques", "Canoë kayak", "Char à voile", "Aviron", "Véhicule Nautique à Moteur"); break;
    }
    /*   form.rubrique.selectedIndex = 0;*/
    for (i = 0; i < txt.length; i++) {
        let formNameCreate = document.createElement("option")
        formNameCreate.innerText = txt[i];
        formNameCreate.value = txt[i];

        selectNamePage.append(formNameCreate)
    }
}
function ChoixCulture(form) {
    selectNamePage.innerText = "";

    indexForm = form.heading.selectedIndex;
    if (indexForm == 0) {
        return;
    }
    switch (indexForm) {
        case 1: var txt = new Array("--Choisissez une sous rubrique--", "Architecture et patrimoine", "Chateau"); break;
        case 2: var txt = new Array("--Choisissez une sous rubrique--", "Sports mécaniques moto", "Sports mécaniques auto", "Karting piste - L’UFOLEP EN PISTE", "Transition écologique et sports mécaniques"); break;
        case 3: var txt = new Array("--Choisissez une sous rubrique--", "Badminton", "Tennis de table", "Tennis", "Squash"); break;
        case 4: var txt = new Array("--Choisissez une sous rubrique--", "Bâton Egyptien", "Canne de combat", "Arts martiaux", "Karaté", "Ju jitsu", "Viet vo dao", "Judo", "Escrime", "Boxe éducative et boxe française", "Bâton français", "Luttes traditionnelles - Kourach"); break;
        case 5: var txt = new Array("--Choisissez une sous rubrique--", "Trottinette", "Roller et glisse urbaine", "Caisse à savon", "Squash", "Ski nautique", "Surf"); break;
        case 6: var txt = new Array("--Choisissez une sous rubrique--", "Haltérophilie-Musculation-Force Athlétique", "Echasse urbaine", "Jogging", "Athlétisme", "Activités physiques d'entretien"); break;
        case 7: var txt = new Array("--Choisissez une sous rubrique--", "Randonnée pédestre", "Marche nordique", "Equitation", "Randonnée multiactivités", "Escalade", "Raid multisports et épreuves combinées", "Course d'orientation", "Duathlon - Triathlon", "Accrobranche"); break;
        case 8: var txt = new Array("--Choisissez une sous rubrique--", "Tir à l'arc", "Pétanque", "Bowling", "Sarbacane", "Croquet", "Billard", "Arbalète", "Boules lyonnaises"); break;
        case 9: var txt = new Array("--Choisissez une sous rubrique--", "Cyclotourisme", "Bike trial", "Vélo couché", "Cyclo sport", "Bicross", "Dirt"); break;
        case 10: var txt = new Array("--Choisissez une sous rubrique--", "Vol libre", "Cerf-volant", "ULM", "Parachutisme", "Modélisme"); break;
        case 11: var txt = new Array("--Choisissez une sous rubrique--", "Natation", "Voile et activités nautiques", "Canoë kayak", "Char à voile", "Aviron", "Véhicule Nautique à Moteur"); break;
    }
    /*   form.rubrique.selectedIndex = 0;*/
    for (i = 0; i < txt.length; i++) {
        let formNameCreate = document.createElement("option")
        formNameCreate.innerText = txt[i];
        formNameCreate.value = txt[i];

        selectNamePage.append(formNameCreate)
    }
}