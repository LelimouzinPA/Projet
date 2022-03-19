<?php
session_start();
require 'models/Database.php';
require 'models/User.php';
require 'models/association.php';
require 'models/contents.php';
require 'Utils/Str.php';
//Permet de recuperer dans session le nom du tableau
foreach ($_SESSION as $clef => $valeur) {
}
//si il y a appuie sur le bouton de confirmation de la suppression du compte
if (isset($_POST['eraseConfirmation'])) {
    // On lit la clef du tableau qui permet de faire une selection entre "user" et "association"
    switch ($clef) {
    case 'user':
    //on recupére le mail contenu dans la super global session
 $email = $_SESSION['user']['email'];
 // si le choix confirme la suppression du compte
    if ($_POST['eraseConfirmation'] == 'eraseConfirmationYes') {
        // on crée un objet user
        $user = new User();
        //on instancie par le mail
        $user->setEmail(htmlspecialchars($email));
        //on lance la fonction d'effacement sur la base de donnée
        $user->delete();
        //On détruit toutes les variables d'une session
        session_unset();
        //On détruit une session
        session_destroy();
        //puis on charge la page d'accueil
        header('Location: /ProjetProv3/Projet/index.php');
        exit();
    } else {
        //sinon on revient a la page concerner
        header('Location: /ProjetProv3/Projet/profil-user.php');
        exit();
    }
    break;
    case 'association':
        //on recupére le mail contenu dans la super global session
    $email = $_SESSION['association']['email'];
    // si le choix confirme la suppression du compte
    if ($_POST['eraseConfirmation'] == 'eraseConfirmationYes') {
        // on crée un objet association
        $association = new Association();
        //on instancie par le mail
        $association->setEmail(htmlspecialchars($email));
        //on lance la fonction d'effacement sur la base de donnée
        $association->delete();
        // on crée un objet contents
        $contents = new Contents();
        //on instancie par le mail
        $contents->setAssociationMail(htmlspecialchars($email));
        $contents->delete();
        //on lance la fonction d'effacement sur la base de donnée
        $repertoire = './upload/'.$email;
        //on efface les données de l'association (image)
        Str::deleteTree($repertoire);
        //On détruit toutes les variables d'une session
        session_unset();
        //On détruit une session
        session_destroy();
        //puis on charge la page d'accueil
        header('Location: /ProjetProv3/Projet/index.php');
        exit();
    } else {
        //sinon on revient a la page concerner
        header('Location: /ProjetProv3/Projet/profil-association.php');
        exit();
    }
    break;
    default:
    break;
}
}