<?php
require 'models/Database.php'   ;
require 'models/User.php'       ;
require 'models/Association.php';
$cssList = ['http://localhost:8888/ProjetProv3/Projet/assets/css/profil-user.css'];
/* liste du script utile pour cette page appel fais dans le footer*/
$scriptList = ['http://localhost:8888/ProjetProv3/Projet/assets/js/form-analyse.js'];
if(isset($_GET['type'])=='association'){
    $association = new Association();    
    $association->setTokenregister($_GET['token']);
    $association->deleteToken();
}
if(isset($_GET['type'])=='user'){
    $user = new User();    
    $user->setTokenregister($_GET['token']);
    $user->deleteToken();
}