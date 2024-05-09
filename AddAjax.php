<?php

header('Content-Type: text/xml');

$col = $_GET['col']; 
$size = $_GET['size'];
$table = $_GET['table'];
include "includes/bazafolio.php";
$baza = new Baza();

/*if($size == 'CI_Mobile_no' || $size == 'BW_Mobile_no'){
    $upit = "SELECT COUNT($size) FROM $table";
}
else{
}
*/
$upit = "SELECT COUNT(*) FROM $table WHERE $col = $size";
$rezultat = $baza->dohvatiDB($upit);

$xml = new DOMDocument("1.0", 'UTF-8');
$xml->formatOutput=true; 

$count=$xml->createElement("count"); 

$xml->appendChild($count); 

$red = $rezultat->fetch_array();


$countResult = $xml->createElement("broj", $red['COUNT(*)']);
$count->appendChild($countResult);

echo $xml->saveXML();

// http://tinjosipsokol.local/AddAjax.php?col=CI_TV_Column&size=2&table=cimages

// http://tinjosipsokol.local/AddAjax.php?col=CI_Desktop_Column&size=2&table=cimages
?>