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
    if (longitudeData === "" && latitudeData === "") {
    } else {
        var marker = L.marker([longitudeData, latitudeData]).addTo(map)
    }
}
function listMap(rna) {
        let formData = new FormData()
    formData.append('map',rna )
        let xhttp = new XMLHttpRequest()
        // Set POST method and ajax file path
        xhttp.open("POST", "controllers/ajaxCtrl.php", true)
        // call on request changes state
        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = this.responseText
            let mapList = JSON.parse(response)
            mapList.map((mapInfo, index) => {
                if (mapInfo.longitude!=null || mapInfo.latitude!=null){
                mapRef = marker + mapInfo.name
                var mapRef = L.marker([mapInfo.longitude, mapInfo.latitude]).addTo(map)
                mapRef.bindTooltip(mapInfo.name).openTooltip();;}
            })
        }
    }
    // Send request with data
    xhttp.send(formData)
}
function onMapClick(e) {
    alert("Vous avez cliqué sur la carte à " + e.latlng);
}
map.on('click', onMapClick);
function listMapAll() {
$choise = "mapAll"
            let formData = new FormData()
    formData.append("mapAll", 'mapAll')
            let xhttp = new XMLHttpRequest()
            // Set POST method and ajax file path
            xhttp.open("POST", "controllers/ajaxCtrl.php", true)
            // call on request changes state
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let response = this.responseText
                    let mapListAll = JSON.parse(response)
                    mapListAll.map ((mapInfoAll,index) => {
                          if (mapInfoAll.longitude!=null || mapInfoAll.latitude!=null){
                        mapRef = marker + mapInfoAll.name
                        var  mapRef  = L.marker([mapInfoAll.longitude, mapInfoAll.latitude]).addTo(map)
                        mapRef.bindTooltip(mapInfoAll.name).openTooltip();;}
                            })
                }
            }
            // Send request with data
            xhttp.send(formData)
    }





