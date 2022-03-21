<?php
session_start();
require '../models/Database.php';
require '../models/Association.php';
require '../models/User.php';
require '../models/Contents.php';

//Me permet de recupérer la clef du tableau  pour effectuer une selection pour la partie ajax reçoit ex userPseudo > toto
foreach ($_POST as $clef => $valeur) {
}
//Permets la sélection des différentes demandes d'Ajax 
switch ($clef) {
//Vérification de la présence du même pseudo pour les particuliers
  case 'userPseudo':
    $user = new User();
    $user->setPseudo(htmlspecialchars($_POST['userPseudo']));
    $user->ajaxPseudoIfExist();
    echo $user->ajaxPseudoIfExist();
    break;
//Vérification de la présence du même email pour les particuliers
  case 'userEmail':
    $user = new User();
    $user->setEmail(htmlspecialchars($_POST['userEmail']));
    $user->ajaxEmailIfExist();
    echo $user->ajaxEmailIfExist();
    break;
//Vérification de la présence du même nom association
  case 'associationName':
    $association = new Association();
    $association->setName(htmlspecialchars($_POST['associationName']));
    $association->ajaxNameIfExist();
    echo $association->ajaxNameIfExist();
    break;
//Vérification de la présence du même numéro RNA pour les association
  case 'associationRna':
    $association = new Association();
    $association->setRna(htmlspecialchars($_POST['associationRna']));
    $association->ajaxRnaIfExist();
    echo $association->ajaxRnaIfExist();
    break;
//Vérification de la présence du même numéro Siren pour les association
  case 'associationSiren':
    $association = new Association();
    $association->setSiren(htmlspecialchars($_POST['associationSiren']));
    $association->ajaxSirenIfExist();
    echo $association->ajaxSirenIfExist();
    break;
//Vérification de la présence du même pseudo pour les associations
  case 'associationPseudo':
    $association = new Association();
    $association->setPseudo(htmlspecialchars($_POST['associationPseudo']));
    $association->ajaxPseudoIfExist();
    echo $association->ajaxPseudoIfExist();
    break;
//Vérification de la présence du même email pour les particuliers
  case 'associationEmail':
    $association = new Association();
    $association->setEmail(htmlspecialchars($_POST['associationEmail']));
    $association->ajaxEmailIfExist();
    echo $association->ajaxEmailIfExist();
    break;
//Vérification de la présence d'une session
    case 'session':
if (isset($_SESSION['user'])) {
    echo 'sessionStartUser';
} elseif (isset($_SESSION['association'])) {
    echo 'sessionStartAssociation';
} else {
    echo 'sessionNotStart';
}
      break;
//Renvoie toutes les coordonnées et les noms des associations pour les afficher sur la carte de l'index
    case 'mapAll':
    $contents = new Contents();
    echo json_encode($contents->mapAll());
    break;
//Renvoie les coordonnées d'une associations pour les afficher sur la carte de l'info de l'association
    case 'map':
    $contents = new Contents();
    echo json_encode($contents->mapInfo(htmlspecialchars($_POST['map'])));
    break;
//Renvoie les catégories d'une association
    case 'categoryAlone':
    $contents = new Contents();
    $contents->setHeading(htmlspecialchars($_POST['categoryAlone']));
    echo  json_encode($contents->ajaxHeading());
   break;
//Renvoie les sous catégories d'une association
   case 'subCategory':
    $contents = new Contents();
    $contents->setHeading(htmlspecialchars($_POST['categoryAll']));
    $contents->setSubHeading(htmlspecialchars($_POST['subCategory']));
    echo  json_encode($contents->ajaxHeadingAndSubHeading());
   break;
   //Renvoie les id du marqueur sélectionner sur la map de l'index
   case 'mapAssociation':
    $association = new Association();
    $association->setName(htmlspecialchars($_POST['mapAssociation']));
    echo  json_encode($association->ajaxMapIdByName());
    break;
   break;
  default:
    break;
}
