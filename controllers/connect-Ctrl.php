<?php
/*require 'models/Database.php';*/
/*require 'class/Form.php'        ;*/

$errorConnect = [];
$errorList = [];
/**creation d'un tableau regroupant le retour du post -> filterpost puis le type -> name que l'on retrouvera dans le form dans un switch et errorSend qui fera apparaitre un message d'erreur plus adapter */
$inputArray = [
    ['filterPost' => 'name'    , 'name' => 'pseudo'  , 'errorSend' => 'un pseudo '             ],
    ['filterPost' => 'email'   , 'name' => 'email'   , 'errorSend' => 'une adresse de couriel '],
    ['filterPost' => 'password', 'name' => 'password', 'errorSend' => 'un mot de Pass '        ],
];
if (isset($_POST['login'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $formVerif = new Form();
    $valueArray = [];
    foreach ($inputArray as $input) {
        if ($formVerif->checkPost($input)) {
            $valueArray[$input['name']] = $_POST[$input['name']]; /*si vrai recupere la valeur dans mon tableau valueArray*/
        } else {
            $errorList[$input['name']] = $formVerif->getErrorMessage();
        }
    }
    $errorConnect = $errorList;
    $selectBd = new Database();
    $type = $selectBd->typeBd($email);
    if ($type == 'u') {
        if (count($errorList) == 0) {
            $user = new User();
            $user->setPseudo(htmlspecialchars($valueArray['pseudo']));
            $user->setEmail(htmlspecialchars($valueArray['email']));
            if ($user->checkLogin()) {
                $loginInfo = $user->getLoginInfo();
                if (password_verify($password, $loginInfo->password)) {
                    if ($loginInfo->tokenregister == null) {
                        session_start();
                        //Ici je suis connecté
                        $_SESSION['user']['email'] = $_POST['email'];
                        $_SESSION['user']['pseudo'] = $user->getPseudo();
                        header('Location: profil-user.php');
                        exit;
                    } else {
                        echo 'Merci de valider votre mail';
                    }
                } else {
                    echo 'les identifiants ne sont pas bon';
                }
            } else {
                echo 'je ne gère pas ce formulaire';
            }
        } 
    }
    if ($type == 'a') {
        if (count($errorList) == 0) {
            $association = new Association();
            $association->setPseudo(htmlspecialchars($valueArray['pseudo']));
            $association->setEmail(htmlspecialchars($valueArray['email']));
            if ($association->checkLogin()) {
                $loginInfo = $association->getLoginInfo();
                if (password_verify($password, $loginInfo->password)) {
                    if ($loginInfo->tokenregister == null) {
                        session_start();
                        //Ici je suis connecté
                        $_SESSION['association']['email'] = $_POST['email'];
                        $_SESSION['association']['pseudo'] = $user->getPseudo();
                        header('Location: profil-association.php');
                        exit;
                    } else {
                        echo 'Merci de valider votre mail';
                    }
                } else {
                    echo 'les identifiants ne sont pas bon';
                }
            } else {
                echo 'je ne gère pas ce formulaire';
            }
        } 
    }
}
