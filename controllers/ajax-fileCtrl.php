<?php
session_start();
require '../Utils/Str.php';
//initialise le repertoire en fonction de l'email de l'association
if (isset($_SESSION['user']['email'])) {
    $caseName = $_SESSION['user']['email'];
}
if (isset($_SESSION['association']['email'])) {
    $caseName = $_SESSION['association']['email'];
}
//destination du fichier
foreach ($_FILES as $clef => $valeur) {}
if (isset($_FILES)) {
    switch ($clef) {
    case 'fileLogo':
        $nameFile = 'fileLogo';
        $fileName = $_FILES['fileLogo']['name'];
        $fileNameSave = 'logo';
        $repertoire = '../upload/'.$caseName.'/logo';
        Str::createCase($repertoire);
        Str::clearDir($repertoire);
        Str:: uploadFile($fileName, $fileNameSave, $repertoire, $nameFile);
    break;
    case 'fileMap':
        $nameFile = 'fileMap';
        $fileName = $_FILES['fileMap']['name'];
        $fileNameSave = 'association';
        $repertoire = '../upload/'.$caseName.'/association';
        Str::createCase($repertoire);
        Str::clearDir($repertoire);
        Str:: uploadFile($fileName, $fileNameSave, $repertoire, $nameFile);
    break;
    case 'fileActu':
        $nameFile = 'fileActu';
        $fileName = $_FILES['fileActu']['name'];
        $fileNameSave = 'actu';
        $repertoire = '../upload/'.$caseName.'/actu';
        Str::createCase($repertoire);
        Str::clearDir($repertoire);
        Str:: uploadFile($fileName, $fileNameSave, $repertoire, $nameFile);
    break;
    default:
    break;
   }
}