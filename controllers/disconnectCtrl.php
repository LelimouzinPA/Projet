<?php

session_start();
session_unset();
session_destroy();

/* liste du css utile pour cette page appel fais dans le header*/
$cssList = ['../Projet/assets/css/profil-user.css'];
/* liste du script utile pour cette page appel fais dans le footer*/
$scriptList = ['../Projet/assets/js/form-analyse.js', '../Projet/assets/js/profil-user.js'];
