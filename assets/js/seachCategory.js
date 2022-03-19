

function searchSubZone() {
    listeSubCategory = document.getElementById("subHeading");
    texteSubCategory = listeSubCategory.options[listeSubCategory.selectedIndex].text;
    listeCategory = document.getElementById("heading");
    texteCategory = listeCategory.options[listeCategory.selectedIndex].text;
    searchSubCategoryAjax(texteCategory, texteSubCategory)
}

function searchZone(form) {
    Choix(form)
    listeCategory = document.getElementById("heading");
    texteCategory = listeCategory.options[listeCategory.selectedIndex].text;
    searchCategoryAjax(texteCategory)
}

function searchCategoryAjax(texteCategory) {
        let formData = new FormData()
    formData.append('categoryAlone', texteCategory)
        let xhttp = new XMLHttpRequest()
        // Set POST method and ajax file path
        xhttp.open("POST", "controllers/ajaxCtrl.php", true)
        // call on request changes state
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText
                tbody.innerHTML = "";
                if (response.length != 0) {
                    result = JSON.parse(response);
                    contructTab = result.map(list => {
                        let row_2 = document.createElement('tr');
                        let row_2_data_1 = document.createElement('td');
                        row_2_data_1.innerHTML = list.name;
                        let row_2_data_2 = document.createElement('td');
                        row_2_data_2.innerHTML = list.heading;
                        let row_2_data_3 = document.createElement('td');
                        row_2_data_3.innerHTML = list.subHeading;
                        let row_2_data_4 = document.createElement('td');
                        let aRow_2_data_4 = document.createElement('a');
                        aRow_2_data_4.href = "info.php?name=" + list.name
                        aRow_2_data_4.title = "Information"
                        aRow_2_data_4.innerText = "Information"
                        row_2.append(row_2_data_1);
                        row_2.append(row_2_data_2);
                        row_2.append(row_2_data_3);
                        row_2.append(row_2_data_4);
                        row_2_data_4.append(aRow_2_data_4)
                        tbody.append(row_2);
                    })
                }
            }
        }
        // Send request with data
        xhttp.send(formData)

}
function searchSubCategoryAjax(texteCategory, texteSubCategory) {
    let formData = new FormData()
    formData.append('categoryAll', texteCategory)
    formData.append('subCategory', texteSubCategory)
    let xhttp = new XMLHttpRequest()
    // Set POST method and ajax file path
    xhttp.open("POST", "controllers/ajaxCtrl.php", true)
    // call on request changes state
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let responseAll = this.responseText

            tbody.innerHTML = "";
            if (responseAll.length != 0) {
                resultAll = JSON.parse(responseAll);
                contructTab = resultAll.map(listAll => {
                    let row_2 = document.createElement('tr');
                    let row_2_data_1 = document.createElement('td');
                    row_2_data_1.innerHTML = listAll.name;
                    let row_2_data_2 = document.createElement('td');
                    row_2_data_2.innerHTML = listAll.heading;
                    let row_2_data_3 = document.createElement('td');
                    row_2_data_3.innerHTML = listAll.subHeading;
                    let row_2_data_4 = document.createElement('td');
                    let aRow_2_data_4 = document.createElement('a');
                    aRow_2_data_4.href = "info.php?name=" + listAll.name
                    aRow_2_data_4.title = "Information"
                    aRow_2_data_4.innerText = "Information"
                    row_2.append(row_2_data_1);
                    row_2.append(row_2_data_2);
                    row_2.append(row_2_data_3);
                    row_2.append(row_2_data_4);
                    row_2_data_4.append(aRow_2_data_4)
                    tbody.append(row_2);
                })
            }
        }
    }
    // Send request with data
    xhttp.send(formData)
}

let thead = document.getElementById("thead")
const tbody = document.getElementById("tbody")

let row_1 = document.createElement('tr');
let heading_1 = document.createElement('th');
heading_1.innerHTML = "Nom de l'association";
let heading_2 = document.createElement('th');
heading_2.innerHTML = "Catégorie";
let heading_3 = document.createElement('th');
heading_3.innerHTML = "Sous Catégorie";
let heading_4 = document.createElement('th');
heading_4.innerHTML = "";

row_1.append(heading_1, heading_2 ,heading_3, heading_4);
thead.append(row_1);
