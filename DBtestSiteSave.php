<?php
header('Content-Type: text/xml');

$col = $_GET['col']; 
$size = $_GET['size'];
include "includes/bazafolio.php";
$baza = new Baza();
$upit = "SELECT COUNT(*) FROM cimages WHERE $col = $size";

$rezultat = $baza->dohvatiDB($upit);

$xml = new DOMDocument("1.0", 'UTF-8');
$xml->formatOutput=true; 

$count=$xml->createElement("count"); 

$xml->appendChild($count); 

$red = $rezultat->fetch_array();


$countResult = $xml->createElement("broj", $red['COUNT(*)']);
$count->appendChild($countResult);

echo $xml->saveXML();

// http://tinjosipsokol.local/DBtestSiteSave.php?col=CI_TV_Column&size=2

// http://tinjosipsokol.local/DBtestSiteSave.php?col=CI_Desktop_Column&size=2
?>