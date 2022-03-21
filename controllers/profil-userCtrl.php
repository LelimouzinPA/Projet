<?php

session_start();
require 'models/Database.php';
require 'models/User.php';
require 'Utils/Str.php';
/* liste du css utile pour cette page appel fais dans le header*/
$cssList = ['../Projet/assets/css/profil-user.css'];
/* liste du script utile pour cette page appel fais dans le footer*/
$scriptList = ['../Projet/assets/js/form-analyse.js', '../Projet/assets/js/profil-user.js'];
$email = $_SESSION['user']['email'];
$pseudo = $_SESSION['user']['pseudo'];
/**creation d'un tableau regroupant le retour du post -> filterpost puis le type -> name que l'on retrouvera dans le form dans un switch et errorSend qui fera apparaitre un message d'erreur plus adapter */
if (!isset($_SESSION['user'])) {
    header('Location: /ProjetProv3/Projet/index.php');
    exit();
} else {
    $user = new User();
    $user->setEmail(htmlspecialchars($email));
    $user->setPseudo(htmlspecialchars($pseudo));
    $userProfil = $user->searchUser();
}
if (isset($_POST['btnUserPseudo'])) {
    $filterPost = 'name';
    $index = 'userPseudo';
    $type = 'pseudo';
    $pseudoPost = htmlspecialchars($_POST[$index]);
    Str:: checkUpdate($index, $email, $pseudoPost, $type, $pseudo, $filterPost);
}
if (isset($_POST['btnUserEmail'])) {
    $filterPost = 'email';
    $index = 'userEmail';
    $type = 'email';
    $emailPost = htmlspecialchars($_POST[$index]);
    Str:: checkUpdate($index, $email, $emailPost, $type, $pseudo, $filterPost);
}
if (isset($_POST['btnUserPasswordConfirm'])) {
    $filterPost = 'password';
    $index = 'userPasswordConfirm';
    $type = 'password';
    $emailPost = htmlspecialchars($_POST[$index]);
    Str:: checkUpdate($index, $email, $emailPost, $type, $pseudo, $filterPost);
}

if (isset($_POST['userErase'])) {
    if ($_POST['userErase'] == 'userEraseYes') {
        header('Location: /ProjetProv3/Projet/erase.php');
        exit();
    }
}
