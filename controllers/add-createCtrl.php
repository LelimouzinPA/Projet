<?php
session_start();
require 'models/Database.php'   ;
require 'class/Form.php'        ;
require 'models/User.php'       ;
require 'Utils/Str.php'         ;
//Liste de css utiles pour cette page appels effectués dans l'en-tête.
$cssList = ['../Projet/assets/css/add-create.css'];
//Liste du script utile pour cet appel de page fait dans le footer.
$scriptList = ['../Projet/assets/js/form-analyse.js', '../Projet/assets/js/menu-3d.js'];
//Création d'un tableau d'erreurs.
$errorList = [];
//Création d'un tableau d'erreurs pour les retours des utilisateurs.
$errorArray = [];
//Création d'un tableau regroupant le retour du post -> filterpost puis le type -> name que l'on retrouvera dans le form dans un switch et errorSend qui fera apparaitre un message d'erreur plus adapter */
$inputArray = [
    ['filterPost' => 'pseudo'  , 'name' => 'userPseudo'         , 'errorSend' => 'un pseudo '       ],
    ['filterPost' => 'email'   , 'name' => 'userEmail'          , 'errorSend' => 'une adresse mail '],
    ['filterPost' => 'password', 'name' => 'userPassword'       , 'errorSend' => 'un mot de Pass '  ],
    ['filterPost' => 'password', 'name' => 'userPasswordConfirm', 'errorSend' => 'un mot de Pass '  ],
];
//Condition de réception du formulaire d'enregistrement du profil particulier
if (isset($_POST['buttonParticular'])) {
//Création d'un objet pour effectuer une vérification Php des éléments recuts par le POST à travers la classe Form.
    $formVerif = new Form();
//Création d'un tableau de valeur.
    $valueArray = [];
//Création d'une boucle permettant la verification de toute les valeurs et leur classement dans le tableaux valueArray ou errorList
    foreach ($inputArray as $input) {
//Vérifie la concordance des données
        if ($formVerif->checkPost($input)) {
            $valueArray[$input['name']] = $_POST[$input['name']]; //si vrai récupère la valeur dans mon tableau valueArray
        } else {
            $errorList[$input['name']] = $formVerif->getErrorMessage();//si faux récupère la valeur dans mon tableau errorList
        }
    }
//Copie le tableau pour le dissocier. On vérifiera le  tableau dans certain contrôleurs contenant un formulaire s'il n'est pas vide il provoquera l'afficher d'une liste des erreurs en plus des indications Javascript déjà presenter pour l'utilisateur.
    $errorArray = $errorList;
//On compte dans le tableau errorlist le nombre de lignes présente pour y vérifier la présence d'erreurs.
    if (count($errorList) == 0) {
//Création d'un objet User car aucune erreur n'a été détecter.       
        $user = new User();
//initialisation des données récupérées par le POST pour l'envoi vers le modèle.
        $user->setPseudo(htmlspecialchars($valueArray['userPseudo']));
        $user->setEmail(htmlspecialchars($valueArray['userEmail']));
        $user->setPassword(htmlspecialchars($valueArray['userPassword']));
        $user->verificationPasswordAdd((htmlspecialchars($valueArray['userPasswordConfirm'])));
//Création d'un numéro de token aléatoire servira pour la validation de l'adresse mail donner par l'utilisateur.
            $user->setTokenregister(Str::getRandom());
//Condition permettant de vérifier si l'utilisateur n'a pas déjà de compte .           
        if (!$user->checkUserIfExists()) {
//Condition créant l'utilisateur et vérifie sa création
            if ($user->addUser()) {
//Création d'un mail de confirmation
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
//Condition de réception du formulaire d'enregistrement du profil professionnel
if (isset($_POST['buttonProfessional'])) {
//Création d'un objet pour effectuer une vérification Php des éléments recuts par le POST à travers la classe Form.
    $formVerif = new Form();
//Création d'un tableau de valeur.
    $valueArray = [];
//Création d'une boucle permettant la verification de toute les valeurs et leur classement dans le tableaux valueArray ou errorList
    foreach ($inputArrayAssociation as $input) {
//Vérifie la concordance des données
        if ($formVerif->checkPost($input)) {
            $valueArray[$input['name']] = $_POST[$input['name']];//si vrai récupère la valeur dans mon tableau valueArray
        } else {
            $errorList[$input['name']] = $formVerif->getErrorMessage();//si faux récupère la valeur dans mon tableau errorList
        }
    }
//Copie le tableau pour le dissocier. On vérifiera le  tableau dans certain contrôleurs contenant un formulaire s'il n'est pas vide il provoquera l'afficher d'une liste des erreurs en plus des indications Javascript déjà presenter pour l'utilisateur.
    $errorArray = $errorList;
//On compte dans le tableau errorlist le nombre de lignes présente pour y vérifier la présence d'erreurs.
    if (count($errorList) == 0) {
//Création d'un objet Association car aucune erreur n'a été détecter.       
        $association = new Association();
//initialisation des données récupérées par le POST pour l'envoi vers le modèle.
        $association->setName(htmlspecialchars($valueArray['associationName']));
        $association->setObjet(htmlspecialchars($valueArray['associationObjet']));
        $association->setAddressofheadquarters(htmlspecialchars($valueArray['associationAdresse']));
        $association->setRna((htmlspecialchars($valueArray['associationRna'])));
        $association->setSiren((htmlspecialchars($valueArray['associationSiren'])));
        $association->setPseudo(htmlspecialchars($valueArray['associationPseudo']));
        $association->setEmail(htmlspecialchars($valueArray['associationEmail']));
        $association->setPassword(htmlspecialchars($valueArray['associationPassword']));
        $association->verificationPasswordAdd((htmlspecialchars($valueArray['associationPasswordConfirm'])));
//Création d'un numéro de token aléatoire servira pour la validation de l'adresse mail donner par l'utilisateur.
        $association->setTokenregister(Str::getRandom());
//Condition permettant de vérifier si l'utilisateur n'a pas déjà de compte .           
        if (!$association->checkAssociationIfExists()) {
//Condition créant l'utilisateur et vérifie sa création
                if ($association->addAssociation()) {
//Création d'un mail de confirmation
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