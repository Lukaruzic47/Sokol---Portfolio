<?php
include "includes/bazafolio.php";
$baza = new Baza();

// Get the image ID from the request
$imageId = $_POST['ID'];
$prefix = $_POST['prefix'];

//$imageId = 1;
//$table = 'CI';

if($prefix == 'BW'){
    $imgPrefix = 'BWimages_id';
    $table = 'BWimages';
    $imgId = 'BWImages_ID';
} if($prefix == 'CI') {
    $imgPrefix = 'Cimages_id';
    $table = 'Cimages';
    $imgId = 'CImages_ID';
}

// Upit traži sve slike u istom stupcu za svaku veličinu čiji je redni broj veći od rednog broja slike koja se briše

$query = [
    "UPDATE $table SET $prefix" . "_TV_no = $prefix" . "_TV_no - 1 WHERE $prefix" . "_TV_Column = (SELECT $prefix" . "_TV_Column FROM (SELECT * FROM $table) AS b WHERE $imgId = $imageId) AND $prefix" . "_TV_no > (SELECT tmp.$prefix" . "_TV_no FROM (SELECT $prefix" . "_TV_no FROM $table WHERE $imgId = $imageId) AS tmp)",
    
    "UPDATE $table SET $prefix" . "_Desktop_no = $prefix" . "_Desktop_no - 1 WHERE $prefix" . "_Desktop_Column = (SELECT $prefix" . "_Desktop_Column FROM (SELECT * FROM $table) AS b WHERE $imgId = $imageId) AND $prefix" . "_Desktop_no > (SELECT tmp.$prefix" . "_Desktop_no FROM (SELECT $prefix" . "_Desktop_no FROM $table WHERE $imgId = $imageId) AS tmp)",

    "UPDATE $table SET $prefix" . "_Tablet_no = $prefix" . "_Tablet_no - 1 WHERE $prefix" . "_Tablet_Column = (SELECT $prefix" . "_Tablet_Column FROM (SELECT * FROM $table) AS b WHERE $imgId = $imageId) AND $prefix" . "_Tablet_no > (SELECT tmp.$prefix" . "_Tablet_no FROM (SELECT $prefix" . "_Tablet_no FROM $table WHERE $imgId = $imageId) AS tmp)",

    "UPDATE $table SET $prefix" . "_Mobile_no = $prefix" . "_Mobile_no - 1 WHERE $prefix" . "_Mobile_no > (SELECT tmp.$prefix" . "_Mobile_no FROM (SELECT $prefix" . "_Mobile_no FROM $table WHERE $imgId = $imageId) AS tmp)",
    
    "DELETE FROM $table WHERE $imgPrefix = $imageId"
];

echo $query[0]; 

// Izvršavamo upite u petlji

foreach($query as $k => $v) {
    $result[$k] = $baza->promijeniDB($query[$k]);
}

?>