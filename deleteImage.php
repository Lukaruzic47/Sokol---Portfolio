<?php
include "includes/bazafolio.php";
$baza = new Baza();

// Get the image ID from the request
$imageId = $_GET['ID'];
$prefix = $_GET['prefix'];

//$imageId = 1;
//$table = 'CI';

if($prefix == 'BW'){
    $imgPrefix = 'BWimages_id';
    $table = 'BWimages';
    $imgId = 'BWImages_ID';
    $path = "images/BlackWhite/";
} 
if($prefix == 'CI') {
    $imgPrefix = 'Cimages_id';
    $table = 'Cimages';
    $imgId = 'CImages_ID';
    $path = 'images/Color/';
}

// Upit traži sve slike u istom stupcu za svaku veličinu čiji je redni broj veći od rednog broja slike koja se briše

$query = [
    "UPDATE $table SET $prefix" . "_TV_no = $prefix" . "_TV_no - 1 WHERE $prefix" . "_TV_Column = (SELECT $prefix" . "_TV_Column FROM (SELECT * FROM $table) AS b WHERE $imgId = $imageId) AND $prefix" . "_TV_no > (SELECT tmp.$prefix" . "_TV_no FROM (SELECT $prefix" . "_TV_no FROM $table WHERE $imgId = $imageId) AS tmp)",
    
    "UPDATE $table SET $prefix" . "_Desktop_no = $prefix" . "_Desktop_no - 1 WHERE $prefix" . "_Desktop_Column = (SELECT $prefix" . "_Desktop_Column FROM (SELECT * FROM $table) AS b WHERE $imgId = $imageId) AND $prefix" . "_Desktop_no > (SELECT tmp.$prefix" . "_Desktop_no FROM (SELECT $prefix" . "_Desktop_no FROM $table WHERE $imgId = $imageId) AS tmp)",

    "UPDATE $table SET $prefix" . "_Tablet_no = $prefix" . "_Tablet_no - 1 WHERE $prefix" . "_Tablet_Column = (SELECT $prefix" . "_Tablet_Column FROM (SELECT * FROM $table) AS b WHERE $imgId = $imageId) AND $prefix" . "_Tablet_no > (SELECT tmp.$prefix" . "_Tablet_no FROM (SELECT $prefix" . "_Tablet_no FROM $table WHERE $imgId = $imageId) AS tmp)",

    "UPDATE $table SET $prefix" . "_Mobile_no = $prefix" . "_Mobile_no - 1 WHERE $prefix" . "_Mobile_no > (SELECT tmp.$prefix" . "_Mobile_no FROM (SELECT $prefix" . "_Mobile_no FROM $table WHERE $imgId = $imageId) AS tmp)",
    
    "SELECT $prefix" . "_image FROM $table WHERE $prefix" . "Images_ID = $imageId",

    "DELETE FROM $table WHERE $imgPrefix = $imageId"
];

// Izvršavamo upite u petlji

$imgPath = "";

foreach($query as $k => $v) {
    if($k == 4) {
        $result = $baza->dohvatiDB($query[$k]);
        if($result) {
            $row = $result->fetch_array();
            $imgPath = $row[$prefix . '_image'];
        }
    } 
    else {
        $result = $baza->promijeniDB($query[$k]);
    }
}

if(!$result) {
    echo 'Success';
} else {
    echo 'Error';
}

?>