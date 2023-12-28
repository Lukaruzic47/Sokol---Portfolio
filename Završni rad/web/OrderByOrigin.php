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
$upitOrigin = "SELECT origin_icon, origin_name, origin_effect, dlc_name, dlc_icon, origin_requirements, origins.DLC_id, origin_id from origins INNER JOIN dlc on origins.DLC_id = dlc.DLC_id ORDER BY $order $updown";

/* slanje upita bazi pomoću metode objekta $baza */
$rezultat = $baza->dohvatiDB($upitOrigin);

/* ugradnja dohvaćenih podataka u željenom XML format */
/* kreiramo XML datoteku -> DOMDocument predstavlja root XML stabla */
$xml = new DOMDocument("1.0", 'UTF-8');

/* postavljamo format XML stabla -> inače sve u jednom redu */
$xml->formatOutput=true; 

/* kreiramo XML elemente i postavljamo ih unutar zadanog roditelja */ 
$filmovi=$xml->createElement("OriginList"); 
$xml->appendChild($filmovi); 

while($red = $rezultat->fetch_array()){
	$Origin=$xml->createElement("Origin"); 
    $filmovi->appendChild($Origin); 
	
	$OriginIcon=$xml->createElement("ikonaOrigin", "assets/images/Stellaris_slike/Origins/" . $red['origin_icon']); 
    $Origin->appendChild($OriginIcon); 

    $OriginName=$xml->createElement("nazivOrigin", $red['origin_name']); 
    $Origin->appendChild($OriginName); 
	
	$OriginEffect=$xml->createElement("effectOrigin", $red['origin_effect']); 
    $Origin->appendChild($OriginEffect);
	
	$OriginRequ=$xml->createElement("requOrigin", $red['origin_requirements']);
    $Origin->appendChild($OriginRequ);

	$OriginDlc=$xml->createElement("dlcOrigin", $red['dlc_name']); 
    $Origin->appendChild($OriginDlc);

	$OriginId=$xml->createElement("IDOrigin", $red['origin_id']); 
    $Origin->appendChild($OriginId);

	$OriginDlcImg=$xml->createElement("DlcImg", "assets/images/Stellaris_slike/DLC/" . $red['dlc_icon']); 
    $Origin->appendChild($OriginDlcImg);
}

echo $xml->saveXML();

// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderbyorigin.php?orderby=origin_name&updown=desc
// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderby.php?orderby=DLC_release_date&updown=desc