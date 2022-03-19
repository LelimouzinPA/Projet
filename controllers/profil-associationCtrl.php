<?php
session_start();
require 'models/Database.php'   ;
require 'models/Association.php';
require 'class/Form.php'        ;
require 'Utils/Str.php'         ;
require 'models/Contents.php'   ;
/* liste du css utile pour cette page appel fais dans le header*/
$cssList = ['../Projet/assets/css/profil-association.css'];
/* liste du script utile pour cette page appel fais dans le footer*/
$scriptList = ['../Projet/assets/js/form-analyse.js', '../Projet/assets/js/profil-association.js', '../Projet/assets/js/category.js', '../Projet/assets/js/map.js'];
$email = $_SESSION['association']['email'];
$pseudo = $_SESSION['association']['pseudo'];
$information = new Association();
$information->setEmail(htmlspecialchars($email));
$informationResult = $information->searchInformation();
foreach ($informationResult as $informationSearch) {
}
$data = new Contents();
$data->setAssociationMail(htmlspecialchars($email));
$dataResult = $data->searchData();
foreach ($dataResult as $value) {
}
/**creation d'un tableau regroupant le retour du post -> filterpost puis le type -> name que l'on retrouvera dans le form dans un switch et errorSend qui fera apparaitre un message d'erreur plus adapter */
if (!isset($_SESSION['association'])) {
    header('Location: /ProjetProv3/Projet/index.php');
    exit();
} else {
    $association = new Association();
    $association->setEmail(htmlspecialchars($email));
    $association->setPseudo(htmlspecialchars($pseudo));
    $associationProfil = $association->searchAssociation();
}
$caseName = $_SESSION['association']['email'];
if (isset($_POST['btnAssociationPseudo'])) {
    $filterPost = 'name';
    $index = 'associationPseudo';
    $type = 'pseudo';
    $pseudoPost = htmlspecialchars($_POST[$index]);
    Str:: checkUpdate($index, $email, $pseudoPost, $type, $pseudo, $filterPost);
}
if (isset($_POST['btnAssociationEmail'])) {
    $filterPost = 'email';
    $index = 'associationEmail';
    $type = 'email';
    $emailPost = htmlspecialchars($_POST[$index]);
    Str:: checkUpdate($index, $email, $emailPost, $type, $pseudo, $filterPost);
}
if (isset($_POST['btnAssociationPasswordConfirm'])) {
    $filterPost = 'password';
    $index = 'associationPasswordConfirm';
    $type = 'password';
    $emailPost = htmlspecialchars($_POST[$index]);
    Str:: checkUpdate($index, $email, $emailPost, $type, $pseudo, $filterPost);
}
if (isset($_POST['associationErase'])) {
    if ($_POST['associationErase'] == 'associationEraseYes') {
        header('Location: /ProjetProv3/Projet/erase.php');
        exit();
    }
}
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
if (isset($_POST['btnChoiceType'])) {
    if ($_POST['choiceType'] == 'loisirs' | $_POST['choiceType'] == 'sport' | $_POST['choiceType'] == 'culture') {
        if (isset($_POST['heading']) && isset($_POST['subHeading'])) {
            if ($_POST['heading'] != '-- Choisissez une rubrique --' && $_POST['subHeading'] != '--Choisissez une sous rubrique--') {
                $contents = new Contents();
                $contents->setType(htmlspecialchars($_POST['choiceType']));
                $contents->setHeading(htmlspecialchars($_POST['heading']));
                $contents->setSubHeading(htmlspecialchars($_POST['subHeading']));
                $contents->setAssociationMail(htmlspecialchars($email));
                if (!$contents->checkContentsBaseIfExists()) {
                    $contents->editContentsBase();
                    header('Location: /ProjetProv3/Projet/profil-association.php');
                    exit();
                }
            }
        }
    }
}
if (isset($_POST['btnAssociationLogo'])) {
    $errorList = [];
    $inputArray = [
    ['filterPost' => 'name', 'name' => 'associationSlogan', 'errorSend' => 'un mot de Pass '],
];
    $slogan = htmlspecialchars($_POST['associationSlogan']);
    $formVerif = new Form();
    $valueArray = [];
    foreach ($inputArray as $input) {
        if ($formVerif->checkPost($input)) {
            $valueArray[$input['name']] = $_POST[$input['name']]; /*si vrai recupere la valeur dans mon tableau valueArray*/
        } else {
            $errorList[$input['name']] = $formVerif->getErrorMessage();
        }
    }
    $errorArray = $errorList;
    if (count($errorList) == 0) {
        $contents = new Contents();
        $contents->setSlogan($slogan);
        $contents->setAssociationMail($email);
        $contents->checkSloganIfExists();
        header('Location: /ProjetProv3/Projet/profil-association.php');
        exit();
    }
}
if (isset($_POST['btnAssociationFacebook'])) {
    $errorList = [];
    $inputArray = [
    ['filterPost' => 'url', 'name' => 'facebook', 'errorSend' => 'un mot de Pass '],
];
    $urlFacebook = htmlspecialchars($_POST['facebook']);
    $formVerif = new Form();
    $valueArray = [];
    foreach ($inputArray as $input) {
        if ($formVerif->checkPost($input)) {
            $valueArray[$input['name']] = $_POST[$input['name']]; /*si vrai recupere la valeur dans mon tableau valueArray*/
        } else {
            $errorList[$input['name']] = $formVerif->getErrorMessage();
        }
    }
    $errorArray = $errorList;
    if (count($errorList) == 0) {
        $contents = new Contents();
        $contents->setUrlFacebook($urlFacebook);
        $contents->setAssociationMail($email);
        $contents->checkFacebookIfExists();
        header('Location: /ProjetProv3/Projet/profil-association.php');
        exit();
    }
}
if (isset($_POST['btnAssociationMap'])) {
    $errorList = [];
    $inputArray = [
    ['filterPost' => 'gps', 'name' => 'associationLatitude', 'errorSend' => 'valide  '],
    ['filterPost' => 'gps', 'name' => 'associationLongitude', 'errorSend' => 'valide '],
];
    $latitude = htmlspecialchars($_POST['associationLatitude']);
    $longitude = htmlspecialchars($_POST['associationLongitude']);
    $formVerif = new Form();
    $valueArray = [];
    foreach ($inputArray as $input) {
        if ($formVerif->checkPost($input)) {
            $valueArray[$input['name']] = $_POST[$input['name']]; /*si vrai recupere la valeur dans mon tableau valueArray*/
        } else {
            $errorList[$input['name']] = $formVerif->getErrorMessage();
        }
    }
$errorArray = $errorList;
    if (count($errorList) == 0) {
        $contents = new Contents();
        $contents->setLatitude($latitude);
        $contents->setLongitude($longitude);
        $contents->setAssociationMail($email);
        $contents->checkMapIfExists();
        header('Location: /ProjetProv3/Projet/profil-association.php');
        exit();
    }
}
if (isset($_POST['btnAssociationDescription'])) {
    $contents = new Contents();
    $contents->setDescription(htmlspecialchars($_POST['description']));
    $contents->setAssociationMail($email);
    $contents->checkDescriptionIfExists();
    header('Location: /ProjetProv3/Projet/profil-association.php');
    exit();
}
if (isset($_POST['btnAssociationActu'])) {
    $contents = new Contents();
    $contents->setTitleStory(htmlspecialchars($_POST['titleStory']));
    $contents->setStory(htmlspecialchars($_POST['story']));
    $contents->setAssociationMail($email);
    $contents->checkActuIfExists();
    header('Location: /ProjetProv3/Projet/profil-association.php');
    exit();
}