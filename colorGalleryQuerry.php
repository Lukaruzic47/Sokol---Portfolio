<?php

require "includes/autoriziran-pristup.php";

header('Content-Type: text/xml');

$order = $_POST['orderBy'];
$table = $_POST['source']; 

include "includes/bazafolio.php";
$baza = new Baza();
$upit = "SELECT * FROM $table /* WHERE CImages_ID <= 24*/ ORDER BY $order";

$rezultat = $baza->dohvatiDB($upit);

$xml = new DOMDocument("1.0", 'UTF-8');
$xml->formatOutput = true;

$slikeData = $xml->createElement("All_images");
$xml->appendChild($slikeData);

if($table == "cimages"){
    while ($red = $rezultat->fetch_array()) {
        $slika = $xml->createElement("Image");
        $slikeData->appendChild($slika);
    
        $SlikaID = $xml->createElement("ID", $red['CImages_ID']);
        $slika->appendChild($SlikaID);
    
        $SlikaNaziv = $xml->createElement("Name", $red['CI_name']);
        $slika->appendChild($SlikaNaziv);
    
        $SlikaDatum = $xml->createElement("Date", $red['CI_date']);
        $slika->appendChild($SlikaDatum);
    
        $SlikaPutanja = $xml->createElement("Image_Path", $red['CI_image']);
        $slika->appendChild($SlikaPutanja);
    
        $SlikaStupacTV = $xml->createElement("TV_Column", $red['CI_TV_Column']);
        $slika->appendChild($SlikaStupacTV);
    
        $SlikaRbTV = $xml->createElement("TV_Position", $red['CI_TV_no']);
        $slika->appendChild($SlikaRbTV);
    
        $SlikaStupacDesktop = $xml->createElement("Desktop_Column", $red['CI_Desktop_Column']);
        $slika->appendChild($SlikaStupacDesktop);
    
        $SlikaRbDesktop = $xml->createElement("Desktop_Position", $red['CI_Desktop_no']);
        $slika->appendChild($SlikaRbDesktop);
    
        $SlikaStupacTablet = $xml->createElement("Tablet_Column", $red['CI_Tablet_Column']);
        $slika->appendChild($SlikaStupacTablet);
    
        $SlikaRbTablet = $xml->createElement("Tablet_Position", $red['CI_Tablet_no']);
        $slika->appendChild($SlikaRbTablet);
    
        $SlikaRbMobitel = $xml->createElement("Mobile_Position", $red['CI_Mobile_no']);
        $slika->appendChild($SlikaRbMobitel);
    }
}

if($table == "bwimages"){
    while ($red = $rezultat->fetch_array()) {
        $slika = $xml->createElement("Image");
        $slikeData->appendChild($slika);
    
        $SlikaID = $xml->createElement("ID", $red['BWImages_ID']);
        $slika->appendChild($SlikaID);
    
        $SlikaNaziv = $xml->createElement("Name", $red['BW_name']);
        $slika->appendChild($SlikaNaziv);
    
        $SlikaDatum = $xml->createElement("Date", $red['BW_date']);
        $slika->appendChild($SlikaDatum);
    
        $SlikaPutanja = $xml->createElement("Image_Path", $red['BW_image']);
        $slika->appendChild($SlikaPutanja);
    
        $SlikaStupacTV = $xml->createElement("TV_Column", $red['BW_TV_Column']);
        $slika->appendChild($SlikaStupacTV);
    
        $SlikaRbTV = $xml->createElement("TV_Position", $red['BW_TV_no']);
        $slika->appendChild($SlikaRbTV);
    
        $SlikaStupacDesktop = $xml->createElement("Desktop_Column", $red['BW_Desktop_Column']);
        $slika->appendChild($SlikaStupacDesktop);
    
        $SlikaRbDesktop = $xml->createElement("Desktop_Position", $red['BW_Desktop_no']);
        $slika->appendChild($SlikaRbDesktop);
    
        $SlikaStupacTablet = $xml->createElement("Tablet_Column", $red['BW_Tablet_Column']);
        $slika->appendChild($SlikaStupacTablet);
    
        $SlikaRbTablet = $xml->createElement("Tablet_Position", $red['BW_Tablet_no']);
        $slika->appendChild($SlikaRbTablet);
    
        $SlikaRbMobitel = $xml->createElement("Mobile_Position", $red['BW_Mobile_no']);
        $slika->appendChild($SlikaRbMobitel);
    }
}

echo $xml->saveXML();
?>