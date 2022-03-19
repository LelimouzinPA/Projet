<?php
session_start();
/*require 'models/Database.php'   ;

require 'models/Association.php';
*/
require 'models/Database.php'   ;
require 'class/Form.php'        ;
require 'models/User.php'       ;
require 'Utils/Str.php'         ;
// liste du css utile pour cette page appel fais dans le header
$cssList = ['../Projet/assets/css/add-create.css'];
// liste du script utile pour cette page appel fais dans le footer
$scriptList = ['../Projet/assets/js/form-analyse.js', '../Projet/assets/js/menu-3d.js'];
// creation d'un tableau d'erreur pour un retour utilisateur.
$errorList = [];
$errorArray = [];
//creation d'un tableau regroupant le retour du post -> filterpost puis le type -> name que l'on retrouvera dans le form dans un switch et errorSend qui fera apparaitre un message d'erreur plus adapter */
$inputArray = [
    ['filterPost' => 'pseudo'  , 'name' => 'userPseudo'         , 'errorSend' => 'un pseudo '       ],
    ['filterPost' => 'email'   , 'name' => 'userEmail'          , 'errorSend' => 'une adresse mail '],
    ['filterPost' => 'password', 'name' => 'userPassword'       , 'errorSend' => 'un mot de Pass '  ],
    ['filterPost' => 'password', 'name' => 'userPasswordConfirm', 'errorSend' => 'un mot de Pass '  ],
];
if (isset($_POST['buttonParticular'])) {
    $pseudo = htmlspecialchars($_POST['userPseudo']);
    $email = htmlspecialchars($_POST['userEmail']);
    $password = htmlspecialchars($_POST['userPassword']);
    $passwordConfirm = htmlspecialchars($_POST['userPasswordConfirm']);
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
        $user = new User();
        $user->setPseudo(htmlspecialchars($valueArray['userPseudo']));
        $user->setEmail(htmlspecialchars($valueArray['userEmail']));
        $user->setPassword(htmlspecialchars($valueArray['userPassword']));
        $user->verificationPasswordAdd((htmlspecialchars($valueArray['userPasswordConfirm'])));
        $user->setTokenregister(Str::getRandom());
        if (!$user->checkUserIfExists()) {
            if ($user->addUser()) {
                echo '<a href="http://localhost:8888/ProjetProv3/Projet/register.php/?type=association&token='.$user->getTokenregister().'">Merci de cliquer ici pour valider votre inscription</a>';
                $to = $user->getEmail();
                $subject = 'Association Amiens : Confirmation de l\'inscription';
                $message = '<html>
                <head><title>Association Amiens : Confirmation de l\'inscription</title></head>
                <body><h1>Bienvenue chez nous</h1>
                <p>Il ne reste plus qu\'une étape pour nous rejoindre et vivre de grandes aventures</p>
                <a href="http://localhost:8888/ProjetProv3/Projet/register.php/'.$user->getTokenregister().'">Clique ici</a></body>
                </html>';
                // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                $headers[] = 'From: Association Amiens <p.a.lelimouzin@gmail.com>';
                mail($to, $subject, $message, implode("\r\n", $headers));
            } else {
                echo 'je ne gère pas ce formulaire';
            }
            /*  header('location: index.php');
            exit;*/
        }
    }
}
/**
 * creation d'un tableau d'erreur pour un retour utilisateur.
 */
/**creation d'un tableau regroupant le retour du post -> filterpost puis le type -> name que l'on retrouvera dans le form dans un switch et errorSend qui fera apparaitre un message d'erreur plus adapter */
$inputArrayAssociation = [
    ['filterPost' => 'name'    , 'name' => 'associationName'           , 'errorSend' => 'un nom d\'association '  ],
    ['filterPost' => 'name'    , 'name' => 'associationObjet'          , 'errorSend' => 'un objet d\'association '],
    ['filterPost' => 'adresse' , 'name' => 'associationAdresse'        , 'errorSend' => 'une adresse '            ],
    ['filterPost' => 'rna'     , 'name' => 'associationRna'            , 'errorSend' => 'un numero RNA '          ],
    ['filterPost' => 'siren'   , 'name' => 'associationSiren'          , 'errorSend' => 'un numero de SIREN '     ],
    ['filterPost' => 'pseudo'  , 'name' => 'associationPseudo'         , 'errorSend' => 'un pseudo '              ],
    ['filterPost' => 'email'   , 'name' => 'associationEmail'          , 'errorSend' => 'une adresse de couriel ' ],
    ['filterPost' => 'password', 'name' => 'associationPassword'       , 'errorSend' => 'un mot de Passe '        ],
    ['filterPost' => 'password', 'name' => 'associationPasswordConfirm', 'errorSend' => 'un mot de Passe '        ],
];
if (isset($_POST['buttonProfessional'])) {
    $name = htmlspecialchars($_POST['associationName']);
    $objet = htmlspecialchars($_POST['associationObjet']);
    $adresse = htmlspecialchars($_POST['associationAdresse']);
    $rna = htmlspecialchars($_POST['associationRna']);
    $siren = htmlspecialchars($_POST['associationSiren']);
    $pseudo = htmlspecialchars($_POST['associationPseudo']);
    $email = htmlspecialchars($_POST['associationEmail']);
    $password = htmlspecialchars($_POST['associationPassword']);
    $passwordConfirm = htmlspecialchars($_POST['associationPasswordConfirm']);
    $formVerif = new Form();
    $valueArray = [];
    foreach ($inputArrayAssociation as $input) {
        if ($formVerif->checkPost($input)) {
            $valueArray[$input['name']] = $_POST[$input['name']]; /*si vrai recupere la valeur dans mon tableau valueArray*/
        } else {
            $errorList[$input['name']] = $formVerif->getErrorMessage();
        }
    }
    $errorArray = $errorList;
    if (count($errorList) == 0) {
        $association = new Association();
        $association->setName(htmlspecialchars($valueArray['associationName']));
        $association->setObjet(htmlspecialchars($valueArray['associationObjet']));
        $association->setAddressofheadquarters(htmlspecialchars($valueArray['associationAdresse']));
        $association->setRna((htmlspecialchars($valueArray['associationRna'])));
        $association->setSiren((htmlspecialchars($valueArray['associationSiren'])));
        $association->setPseudo(htmlspecialchars($valueArray['associationPseudo']));
        $association->setEmail(htmlspecialchars($valueArray['associationEmail']));
        $association->setPassword(htmlspecialchars($valueArray['associationPassword']));
        $association->verificationPasswordAdd((htmlspecialchars($valueArray['associationPasswordConfirm'])));
        $association->setTokenregister(Str::getRandom());
        if (!$association->checkAssociationIfExists()) {
                if ($association->addAssociation()) {
                    echo '<a href="http://localhost:8888/ProjetProv3/Projet/register.php/?type=association&token='.$association->getTokenregister().'">Merci de cliquer ici pour valider votre inscription</a>';
                    $to = $association->getEmail();
                    $subject = 'Association Amiens : Confirmation de l\'inscription';
                    $message = '<html>
                    <head><title>Association Amiens : Confirmation de l\'inscription</title></head>
                    <body><h1>Bienvenue chez nous</h1>
                    <p>Il ne reste plus qu\'une étape pour nous rejoindre et vivre de grandes aventures</p>
                    <a href="http://localhost:8888/ProjetProv3/Projet/register.php/?token='.$association->getTokenregister().'">Clique ici</a></body>
                    </html>';
                    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                    $headers[] = 'From: association Amiens>';
                    mail($to, $subject, $message, implode("\r\n", $headers));
                } else {
                    echo 'je ne gère pas ce formulaire';
                }
                /*  header('location: index.php');
                exit;*/
            }
        }
    }