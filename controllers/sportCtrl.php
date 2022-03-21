<?php
session_start();
require 'models/Database.php';
require 'models/Contents.php';
require 'class/Form.php'     ;

//Liste du css utile pour cette page appel fais dans le header
$cssList = ['../Projet/assets/css/loisirs-sport-culture.css'];
//Liste du script utile pour cette page appel fais dans le footer
$scriptList = ['../Projet/assets/js/form-analyse.js', '../Projet/assets/js/category.js', '../Projet/assets/js/seachCategory.js'];
//Création d'un objet pour récupérer les informations.
$contents = new Contents();
//Recherche des informations nécessaires
$contentsList = $contents->getSportList();
