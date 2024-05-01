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
$upitTech = "SELECT tech_id, tech_icon, tech_name, tech_desc, tech_effect, tech_cost, tech_rarity, technology.DLC_id, tech_category_name, tech_category_icon, dlc_name, dlc_icon FROM technology INNER JOIN techcategories on technology.tech_sub_category_id = techcategories.tech_sub_category_id INNER JOIN dlc ON technology.DLC_id = dlc.DLC_id ORDER BY $order $updown";

/* slanje upita bazi pomoću metode objekta $baza */
$rezultat = $baza->dohvatiDB($upitTech);

/* ugradnja dohvaćenih podataka u željenom XML format */
/* kreiramo XML datoteku -> DOMDocument predstavlja root XML stabla */
$xml = new DOMDocument("1.0", 'UTF-8');

/* postavljamo format XML stabla -> inače sve u jednom redu */
$xml->formatOutput=true; 

/* kreiramo XML elemente i postavljamo ih unutar zadanog roditelja */ 
$filmovi=$xml->createElement("TechList"); 
$xml->appendChild($filmovi); 

while($red = $rezultat->fetch_array()){
	$Tech=$xml->createElement("Technology"); 
    $filmovi->appendChild($Tech); 
	
	$TechIcon=$xml->createElement("ikonaTehnologije", "assets/images/Stellaris_slike/Technology/" . $red['tech_icon']);
    $Tech->appendChild($TechIcon);

    $TechName=$xml->createElement("nazivTehnologije", $red['tech_name']);
    $Tech->appendChild($TechName);

    $TechId=$xml->createElement("IdTehnologije", $red['tech_id']); 
    $Tech->appendChild($TechId);

    $TechDesc=$xml->createElement("opisTehnologije", $red['tech_desc']); 
    $Tech->appendChild($TechDesc);

    $TechEffect=$xml->createElement("efektTehnologije", $red['tech_effect']); 
    $Tech->appendChild($TechEffect);

    $TechCost=$xml->createElement("cijenaTehnologije", $red['tech_cost']); 
    $Tech->appendChild($TechCost);

    $TechRarity=$xml->createElement("rarity", $red['tech_rarity']); 
    $Tech->appendChild($TechRarity);

    $TechDlc=$xml->createElement("DlcTehnologije", $red['dlc_name']); 
    $Tech->appendChild($TechDlc);

    $categoryName=$xml->createElement("categoryName", $red['tech_category_name']); 
    $Tech->appendChild($categoryName);

    $CategoryIcon=$xml->createElement("ikonaKategorije", "assets/images/Stellaris_slike/Technology Category/" . $red['tech_category_icon']);
    $Tech->appendChild($CategoryIcon);

    $DLCicon=$xml->createElement("ikonaDLCa", "assets/images/Stellaris_slike/DLC/" . $red['dlc_icon']); 
    $Tech->appendChild($DLCicon); 
}

echo $xml->saveXML();

// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderbytech.php?orderby=tech_name&updown=asc
// http://frodo.ess.hr/zavrsni/2022/ruzic/stranica/orderby.php?orderby=DLC_release_date&updown=desc