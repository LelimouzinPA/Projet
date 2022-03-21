<?php
session_start();
require 'models/Database.php';
require 'models/Association.php';
//liste du css utile pour cette page appel fais dans le header.
$cssList = ['../Projet/assets/css/info.css'];
//liste du script utile pour cette page appel fais dans le footer.
$scriptList = ['../Projet/assets/js/form-analyse.js', '../Projet/assets/js/map.js'];
//Vérifie la présence d'une session pour récupérer ses informations.
if (!isset($_SESSION)) {
    $emailSession = $_SESSION['association']['email'];
    $pseudoSession = $_SESSION['association']['pseudo'];
}
//Recupére les informations du GET.
$idAssociation = htmlspecialchars($_GET['id']);
//Création d'un objet pour récupérer les informations par son id.
$information = new Association();
//initialisation des données récupérées pour l'envoi vers le modèle.
$information->setid(htmlspecialchars($idAssociation));
//Recherche des informations nécessaires
$informationResult = $information->getInformation();
//Me permet de recupérer les valeurs sous forme de tableau.
foreach ($informationResult as $informationSearch) {
}
//initialise les valeurs pour l'affichage.
$email = $informationSearch->email;
//Récupére le chemin des fichiers dans le serveur.
$logoSrc = 'upload/'.$email.'/logo';
$mapSrc = 'upload/'.$email.'/association';
$actuSrc = 'upload/'.$email.'/actu';
//Détermine la présence des fichiers image.
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
