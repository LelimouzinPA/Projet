<?php
session_start();
require 'models/Database.php';
require 'models/Association.php';
/* liste du css utile pour cette page appel fais dans le header*/
$cssList = ['../Projet/assets/css/info.css'];
/* liste du script utile pour cette page appel fais dans le footer*/
$scriptList = ['../Projet/assets/js/form-analyse.js', '../Projet/assets/js/map.js'];
if (!isset($_SESSION)) {
    $emailSession = $_SESSION['association']['email'];
    $pseudoSession = $_SESSION['association']['pseudo'];
}
$nameAssociation = htmlspecialchars($_GET['name']);
$information = new Association();
$information->setName(htmlspecialchars($nameAssociation));
$informationResult = $information->getInformation();
foreach ($informationResult as $informationSearch) {
}
$email = $informationSearch->email;
/*upload fichier*/
$logoSrc = 'upload/'.$email.'/logo';
$mapSrc = 'upload/'.$email.'/association';
$actuSrc = 'upload/'.$email.'/actu';
if (file_exists($logoSrc)) {
    $scandir = scandir($logoSrc);
    $imgLogoSrc = $logoSrc.'/'.$scandir[2];
} else {
    $imgLogoSrc = null;
}
if (file_exists($mapSrc)) {
    $scandir = scandir($mapSrc);
    $imgMapSrc = $mapSrc.'/'.$scandir[2];
} else {
    $imgMapSrc = null;
}
if (file_exists($actuSrc)) {
    $scandir = scandir($actuSrc);
    $imgActuSrc = $actuSrc.'/'.$scandir[2];
} else {
    $imgActuSrc = null;
}
