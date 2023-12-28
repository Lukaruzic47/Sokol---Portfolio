<?php
/* zaglavlje koje šaljemo klijentu -> format koji šaljemo klijentu */
header('Content-Type: text/xml');
/* dohvaćanje poslanog parametra za pretragu filmova */
$order = $_GET['orderby']; 
$updown = $_GET['updown']; 
/* uključivanje datoteke s definicijom klase za rad s bazom */
include "includes/baza.php";
/* kreiranje objekta iz klase */
$baza = new Baza();
/* definicija upita */
$upitEthic = "SELECT ethic_id, ethic_name, ethic_effect, ethic_desc, ethic_opposite, ethic_icon from ethics ORDER BY $order $updown";

/* slanje upita bazi pomoću metode objekta $baza */
$rezultat = $baza->dohvatiDB($upitEthic);

/* ugradnja dohvaćenih podataka u željenom XML format */
/* kreiramo XML datoteku -> DOMDocument predstavlja root XML stabla */
$xml = new DOMDocument("1.0", 'UTF-8');

/* postavljamo format XML stabla -> inače sve u jednom redu */
$xml->formatOutput=true; 

/* kreiramo XML elemente i postavljamo ih unutar zadanog roditelja */ 
$filmovi=$xml->createElement("EthicList"); 
$xml->appendChild($filmovi); 

while($red = $rezultat->fetch_array()){
	$Ethic=$xml->createElement("Ethic"); 
    $filmovi->appendChild($Ethic); 
	
	$EthicIcon=$xml->createElement("ikonaEthic", "assets/images/Stellaris_slike/Ethics/" . $red['ethic_icon']); 
    $Ethic->appendChild($EthicIcon); 

    $EthicName=$xml->createElement("nazivEthic", $red['ethic_name']); 
    $Ethic->appendChild($EthicName); 
	
	$EthicEffect=$xml->createElement("effectEthic", $red['ethic_effect']); 
    $Ethic->appendChild($EthicEffect);
	
	$EthicDesc=$xml->createElement("descEthic", $red['ethic_desc']);
    $Ethic->appendChild($EthicDesc);

	$EthichOpposite=$xml->createElement("ethicOpposite", $red['ethic_opposite']); 
    $Ethic->appendChild($EthichOpposite);

	$EthicId=$xml->createElement("IDEthic", $red['ethic_id']); 
    $Ethic->appendChild($EthicId);
}

echo $xml->saveXML();

// https://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderbyethic.php?orderby=ethic_name&updown=desc
// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderby.php?orderby=DLC_release_date&updown=desc