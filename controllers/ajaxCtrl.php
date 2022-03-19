<?php
session_start();
require '../models/Database.php';
require '../models/Association.php';
require '../models/User.php';
require '../models/Contents.php';
/*
Me permet de recupérer la clef du tableau  pour effectuer une selection pour la partie ajax
reçoit ex userPseudo > toto
*/
foreach ($_POST as $clef => $valeur) {
}
switch ($clef) {
  case 'userPseudo':
    $user = new User();
    $user->setPseudo(htmlspecialchars($_POST['userPseudo']));
    $user->ajaxPseudoIfExist();
    echo $user->ajaxPseudoIfExist();
    break;
  case 'userEmail':
    $user = new User();
    $user->setEmail(htmlspecialchars($_POST['userEmail']));
    $user->ajaxEmailIfExist();
    echo $user->ajaxEmailIfExist();
    break;
  case 'associationName':
    $association = new Association();
    $association->setName(htmlspecialchars($_POST['associationName']));
    $association->ajaxNameIfExist();
    echo $association->ajaxNameIfExist();
    break;
  case 'associationRna':
    $association = new Association();
    $association->setRna(htmlspecialchars($_POST['associationRna']));
    $association->ajaxRnaIfExist();
    echo $association->ajaxRnaIfExist();
    break;
  case 'associationSiren':
    $association = new Association();
    $association->setSiren(htmlspecialchars($_POST['associationSiren']));
    $association->ajaxSirenIfExist();
    echo $association->ajaxSirenIfExist();
    break;
  case 'associationPseudo':
    $association = new Association();
    $association->setPseudo(htmlspecialchars($_POST['associationPseudo']));
    $association->ajaxPseudoIfExist();
    echo $association->ajaxPseudoIfExist();
    break;
  case 'associationEmail':
    $association = new Association();
    $association->setEmail(htmlspecialchars($_POST['associationEmail']));
    $association->ajaxEmailIfExist();
    echo $association->ajaxEmailIfExist();
    break;
    case 'session':
if (isset($_SESSION['user'])) {
    echo 'sessionStartUser';
} elseif (isset($_SESSION['association'])) {
    echo 'sessionStartAssociation';
} else {
    echo 'sessionNotStart';
}
      break;
    case 'mapAll':
    $contents = new Contents();
    echo json_encode($contents->mapAll());
    break;
    case 'map':
    $contents = new Contents();
    echo json_encode($contents->mapInfo(htmlspecialchars($_POST['map'])));
    break;
    case 'categoryAlone':
    $contents = new Contents();
    $contents->setHeading(htmlspecialchars($_POST['categoryAlone']));
    echo  json_encode($contents->ajaxHeading());
   break;
   case 'subCategory':
    $contents = new Contents();
    $contents->setHeading(htmlspecialchars($_POST['categoryAll']));
    $contents->setSubHeading(htmlspecialchars($_POST['subCategory']));
    echo  json_encode($contents->ajaxHeadingAndSubHeading());
   break;
  default:
    break;
}
