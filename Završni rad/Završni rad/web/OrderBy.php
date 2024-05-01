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
$upit = "SELECT DLC_id, DLC_icon, DLC_name, DLC_release_date, DLC_type_name from DLC INNER JOIN DLC_type where dlc.dlc_type_id = dlc_type.dlc_type_id  ORDER BY $order $updown";
/* slanje upita bazi pomoću metode objekta $baza */
$rezultat = $baza->dohvatiDB($upit);

/* ugradnja dohvaćenih podataka u željenom XML format */
/* kreiramo XML datoteku -> DOMDocument predstavlja root XML stabla */
$xml = new DOMDocument("1.0", 'UTF-8');

/* postavljamo format XML stabla -> inače sve u jednom redu */
$xml->formatOutput=true; 

/* kreiramo XML elemente i postavljamo ih unutar zadanog roditelja */ 
$filmovi=$xml->createElement("DLClist"); 
$xml->appendChild($filmovi); 

while($red = $rezultat->fetch_array()){
	$DLC=$xml->createElement("DLC"); 
    $filmovi->appendChild($DLC); 
	
	$DLCIkona=$xml->createElement("ikonaDLCa", "assets/images/Stellaris_slike/DLC/" . $red['DLC_icon']); 
    $DLC->appendChild($DLCIkona); 

    $DLCNaziv=$xml->createElement("nazivDLCa", $red['DLC_name']); 
    $DLC->appendChild($DLCNaziv); 
	
	$godinaIzlaska=$xml->createElement("GodinaDLCa", $red['DLC_release_date']); 
    $DLC->appendChild($godinaIzlaska);
	
	$DLCtip=$xml->createElement("TipDLCa", $red['DLC_type_name']);
    $DLC->appendChild($DLCtip);

	$DLCid=$xml->createElement("DLCID", $red['DLC_id']); 
    $DLC->appendChild($DLCid);
}

echo $xml->saveXML();

// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderby.php?orderby=DLC_name&updown=desc
// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderby.php?orderby=DLC_release_date&updown=desc
?>