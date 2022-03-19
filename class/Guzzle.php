<?php
require '../vendor/autoload.php';

$client = new GuzzleHttp\Client();
$res = $client->request('GET', 'https://entreprise.data.gouv.fr/api/rna/v1/id/'.$_POST['numberRna'] , [
]);
if ($res->getStatusCode()==200){
echo $res->getBody();}
/*$données  = $res->getBody();*/
// {"type":"User"...'//
/*var_dump(json_decode($données));*/
/*echo $infoRna =json_decode($données);*/