<?php
//Création d'un tableau d'erreurs pour les retours des utilisateurs.
$errorConnect = [];
//Création d'un tableau d'erreurs.
$errorList = [];
//Création d'un tableau regroupant le retour du post -> filterpost puis le type -> name que l'on retrouvera dans le form dans un switch et errorSend qui fera apparaitre un message d'erreur plus adapter */
$inputArray = [
    ['filterPost' => 'name'    , 'name' => 'pseudo'  , 'errorSend' => 'un pseudo '             ],
    ['filterPost' => 'email'   , 'name' => 'email'   , 'errorSend' => 'une adresse de couriel '],
    ['filterPost' => 'password', 'name' => 'password', 'errorSend' => 'un mot de Pass '        ],
];
//Condition de réception du formulaire de login.
if (isset($_POST['login'])) {
//initialisation des valeurs du POST qui servira après.    
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
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
$errorConnect = $errorList;
//Création d'un objet pour effectuer une vérification du type d'utilisateur (association ou particulier).
    $selectBd = new Database();
// recherche dans la bdd si l'email appartient à une association ou à un particulier    
    $type = $selectBd->typeBd($email);
//Si l'adresse mail appartient à un particulier    
    if ($type == 'u') {
//On compte dans le tableau errorlist le nombre de lignes présente pour y vérifier la présence d'erreurs.
    if (count($errorList) == 0) {
//Création d'un objet User car aucune erreur n'a été détecter.       
            $user = new User();
//initialisation des données récupérées par le POST pour l'envoi vers le modèle.
            $user->setPseudo(htmlspecialchars($valueArray['pseudo']));
            $user->setEmail(htmlspecialchars($valueArray['email']));
//Condition qui vérifie la présence du Pseudo et de l'email dans la bdd.
            if ($user->checkLogin()) {
//Recupé les informations de l'utilisateur.
                $loginInfo = $user->getLoginInfo();
//Condition qui vérifie la concordance du mot de passe.               
                if (password_verify($password, $loginInfo->password)) {
//Condition qui vérifie la valeur du token register  s'il est null l'utilisateur a validé son adresse mail.
                    if ($loginInfo->tokenregister == null) {
//On crée une session pour l'utilisateur.
                        session_start();
//Ici je suis connecté et j'entre des données de l'utilisateur dans la session.
                        $_SESSION['user']['email'] = $_POST['email'];
                        $_SESSION['user']['pseudo'] = $user->getPseudo();
//Je redirige vers la page principale.
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
//Si l'adresse mail appartient à une association    
    if ($type == 'a') {
//On compte dans le tableau errorlist le nombre de lignes présente pour y vérifier la présence d'erreurs.
        if (count($errorList) == 0) {
//Création d'un objet User car aucune erreur n'a été détecter.       
            $association = new Association();
//initialisation des données récupérées par le POST pour l'envoi vers le modèle.
            $association->setPseudo(htmlspecialchars($valueArray['pseudo']));
            $association->setEmail(htmlspecialchars($valueArray['email']));
//Condition qui vérifie la présence du Pseudo et de l'email dans la bdd.
            if ($association->checkLogin()) {
//Recupé les informations de l'utilisateur.
                $loginInfo = $association->getLoginInfo();
//Condition qui vérifie la concordance du mot de passe.               
                if (password_verify($password, $loginInfo->password)) {
//Condition qui vérifie la valeur du token register  s'il est null l'utilisateur a validé son adresse mail.
                    if ($loginInfo->tokenregister == null) {
//On crée une session pour l'utilisateur.
                        session_start();
//Ici je suis connecté et j'entre des données de l'utilisateur dans la session.
                        $_SESSION['association']['email'] = $_POST['email'];
                        $_SESSION['association']['pseudo'] = $user->getPseudo();
 //Je redirige vers la page principale.
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
