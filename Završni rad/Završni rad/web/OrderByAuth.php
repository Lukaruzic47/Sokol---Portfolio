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
$upitAuth = "SELECT authority_id, authority_name, authority_effect, authority_desc, authority_election, authority_icon from authority ORDER BY $order $updown";

/* slanje upita bazi pomoću metode objekta $baza */
$rezultat = $baza->dohvatiDB($upitAuth);

/* ugradnja dohvaćenih podataka u željenom XML format */
/* kreiramo XML datoteku -> DOMDocument predstavlja root XML stabla */
$xml = new DOMDocument("1.0", 'UTF-8');

/* postavljamo format XML stabla -> inače sve u jednom redu */
$xml->formatOutput=true; 

/* kreiramo XML elemente i postavljamo ih unutar zadanog roditelja */ 
$filmovi=$xml->createElement("AuthList"); 
$xml->appendChild($filmovi); 

while($red = $rezultat->fetch_array()){
	$Auth=$xml->createElement("Authority"); 
    $filmovi->appendChild($Auth); 
	
	$AuthIcon=$xml->createElement("ikonaAuth", "assets/images/Stellaris_slike/Authority/" . $red['authority_icon']); 
    $Auth->appendChild($AuthIcon); 

    $AuthName=$xml->createElement("nazivAuth", $red['authority_name']); 
    $Auth->appendChild($AuthName); 
	
	$AuthEffect=$xml->createElement("effectAuth", $red['authority_effect']); 
    $Auth->appendChild($AuthEffect);
	
	$AuthDesc=$xml->createElement("descAuth", $red['authority_desc']);
    $Auth->appendChild($AuthDesc);

	$AuthElection=$xml->createElement("electionAuth", $red['authority_election']); 
    $Auth->appendChild($AuthElection);

	$AuthId=$xml->createElement("IDAuth", $red['authority_id']); 
    $Auth->appendChild($AuthId);
}

echo $xml->saveXML();

// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderbyauth.php?orderby=authority_name&updown=desc
// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderby.php?orderby=DLC_release_date&updown=desc