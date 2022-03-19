<?php
require 'controllers/connect-Ctrl.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projet</title>
    <link rel="stylesheet" href="http://localhost:8888/ProjetProv3/Projet/assets/css/style.css">
        <link rel="stylesheet" href="http://localhost:8888/ProjetProv3/Projet/assets/css/font.css">

    <?php
$server = $_SERVER['REQUEST_URI'];
        $serverSplits = explode('?', $server);
if ($serverSplits[0] == '/ProjetProv3/Projet/profil-association.php' || $serverSplits[0] == '/ProjetProv3/Projet/index.php' || $serverSplits[0] == '/ProjetProv3/Projet/info.php') {?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <?php
            if ($_SERVER['REQUEST_URI'] == '/ProjetProv3/Projet/index.php') {?>
            <link rel="stylesheet" href="http://localhost:8888/ProjetProv3/Projet/assets/css/accueil.css"><?php
}}
$cssList = isset($cssList) ? $cssList : [];
foreach ($cssList as $css) { ?>
    <link rel="stylesheet" href="<?= $css; ?>">
    <?php } ?>
</head>
<body>
    <header>
        <div id="headerZone">
            <div id="headerImg">
                <img src="http://localhost:8888/ProjetProv3/Projet/assets/img/logo3.png" alt="icone" class="imgHeader">
            </div>
            <div id="headerBtnZone">
                <div id="navbar" class="menuBurger">
                    <div id="btnMenu1" class="btnMenu btnMenuColor1">
                        <div class="navbarImg">
                            <img src="http://localhost:8888/ProjetProv3/Projet/assets/img/Icon/icons8-accueil-96.png" alt="icone" class="iconNavbar">
                        </div>
                        <div class="navbarText">
                            <p class="textMenu">Home</p>
                        </div>
                    </div>
                    <div id="btnMenu2" class="btnMenu btnMenuColor2">
                        <div class="navbarImg">
                            <img src="http://localhost:8888/ProjetProv3/Projet/assets/img/Icon/icons8-banc-de-parc-96.png" alt="icone"
                                class="iconNavbar">
                        </div>
                        <div class="navbarText">
                            <p class="textMenu">Loisirs</p>
                        </div>
                    </div>
                    <div id="btnMenu3" class="btnMenu btnMenuColor3">
                        <div class="navbarImg">
                            <img src="http://localhost:8888/ProjetProv3/Projet/assets/img/Icon/icons8-exercice-96.png" alt="icone" class="iconNavbar">
                        </div>
                        <div class="navbarText">
                            <p class="textMenu">Sport</p>
                        </div>
                    </div>
                    <div id="btnMenu4" class="btnMenu btnMenuColor4">
                        <div class="navbarImg">
                            <img src="http://localhost:8888/ProjetProv3/Projet/assets/img/Icon/icons8-art-moderne-96.png" alt="icone"
                                class="iconNavbar">
                        </div>
                        <div class="navbarText">
                            <p class="textMenu">Culture</p>
                        </div>
                    </div>
                    <div id="btnMenu5" class="btnMenu btnMenuColor5">
                        <div class="navbarImg">
                            <img src="http://localhost:8888/ProjetProv3/Projet/assets/img/Icon/icons8-homme-d'affaire-96.png" alt="icone"
                                class="iconNavbar">
                        </div>
                        <div class="navbarText">
                            <p class="textMenu">Espace Personnel</p>
                        </div>
                    </div>
                    <div id="btnMenuBurger" class="btnMenuSpecial">
                        <div id="menuBurgerLineZone">
                            <div id="menuBurgerLine1" class="menuBurgerLine menuBurgerLine1"></div>
                            <div id="menuBurgerLine2" class="menuBurgerLine menuBurgerLine2"></div>
                            <div id="menuBurgerLine3" class="menuBurgerLine menuBurgerLine3"></div>
                        </div>
                    </div>
                </div>
                <div id="btnMenu5View"> </div>
            </div>
            <div id="headerSubBtnZone">
            </div>
        </div>
    </header>