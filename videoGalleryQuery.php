<?php

header('Content-Type: text/xml');

$table = $_POST['source'];
$order = $_POST['orderBy'];

//http://tinjosipsokol.local/videoGalleryQuerry.php?souce=musicspots&orderBy=Spot_ID

include "includes/bazafolio.php";
$baza = new Baza();
$upit = "SELECT * FROM $table ORDER BY $order";

$rezultat = $baza->dohvatiDB($upit);
$xml = new DOMDocument("1.0", 'UTF-8');
$xml->formatOutput = true;
$videoData = $xml->createElement("All_videos");
$xml->appendChild($videoData);

while ($red = $rezultat->fetch_array()) {
    $video = $xml->createElement("Video");
    $videoData->appendChild($video);
    
    $VideoID = $xml->createElement("ID", $red['Spot_ID']);
    $video->appendChild($VideoID);
    
    $videoNaziv = $xml->createElement("Name", $red['Spot_name']);
    $video->appendChild($videoNaziv);
    
    $videoDatum = $xml->createElement("Link", $red['Spot_link']);
    $video->appendChild($videoDatum);
    
    $videoPutanja = $xml->createElement("Desc", $red['Spot_desc']);
    $video->appendChild($videoPutanja);
}

echo $xml->saveXML();
?>