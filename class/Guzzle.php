<?php
require '../vendor/autoload.php';
//Création d'un objet pour consommer l'api du gouvernement sur le recensement des associations par numéro RNA.     
$client = new GuzzleHttp\Client();
//Recupére les informations sur la page concernée.
$res = $client->request('GET', 'https://entreprise.data.gouv.fr/api/rna/v1/id/'.$_POST['numberRna'] , [
]);
//Vérifie que la réponse est bien passé et transmet les données.
if ($res->getStatusCode()==200){
echo $res->getBody();}
