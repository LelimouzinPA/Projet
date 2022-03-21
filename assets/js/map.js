//API de la cartographie
var map = L.map('map').setView([49.89404, 2.295671], 13);
var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);
//condition si l'association à rentrer des coordonnées et mettra un pointeur en place sur la carte
if (document.getElementById('longitude') && document.getElementById('latitude')) {
    let longitudeData = document.getElementById('longitude').value
    let latitudeData = document.getElementById('latitude').value
    if (longitudeData === "" && latitudeData === "") {} else {
        var marker = L.marker([longitudeData, latitudeData]).addTo(map)
    }
}

function listMap(rna) {
    let formData = new FormData()
    formData.append('map', rna)
    let xhttp = new XMLHttpRequest()
        // Set POST method and ajax file path
    xhttp.open("POST", "controllers/ajaxCtrl.php", true)
        // call on request changes state
    xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText
                let mapList = JSON.parse(response)
                mapList.map((mapInfo, index) => {
                    if (mapInfo.longitude != null || mapInfo.latitude != null) {
                        mapRef = marker + mapInfo.name
                        var mapRef = L.marker([mapInfo.longitude, mapInfo.latitude]).addTo(map)
                        mapRef.bindTooltip(mapInfo.name).openTooltip();;
                    }
                })
            }
        }
        // Send request with data
    xhttp.send(formData)
}

function listMapAll() {
    $choise = "mapAll"
    let formData = new FormData()
    formData.append("mapAll", 'mapAll')
    let xhttp = new XMLHttpRequest()
        // Set POST method and ajax file path
    xhttp.open("POST", "controllers/ajaxCtrl.php", true)
        // call on request changes state
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = this.responseText
            let mapListAll = JSON.parse(response)
            mapListAll.map((mapInfoAll, index) => {
                if (mapInfoAll.longitude != null || mapInfoAll.latitude != null) {
                    /* mapRef = marker + mapInfoAll.name*/
                    var mapRef = L.marker([mapInfoAll.longitude, mapInfoAll.latitude]).on('click', onMarkerClick).addTo(map)
                    mapRef.bindTooltip(mapInfoAll.name).openTooltip();
                }
            })
        }
    }
    xhttp.send(formData)
}

function onMarkerClick(e) {
    let formData = new FormData()
    formData.append("mapAssociation", this._tooltip._content)
    let xhttp = new XMLHttpRequest()
    xhttp.open("POST", "controllers/ajaxCtrl.php", true)
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = this.responseText
            console.log(response)
            let result = JSON.parse(response)
            console.log(result.id)
            window.location.href = "http://localhost:8888/ProjetProv3/Projet/info.php?id=" + result.id
        }
    }
    xhttp.send(formData)
}
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Vous avez cliqué sur " + e.latlng.toString())
        .openOn(map);
}
map.on('click', onMapClick);