<?php
include "includes/bazafolio.php";
$baza = new Baza();

// Get the image ID from the request
$imageId = $_POST['ID'];
$table = $_POST['prefix'];

if($table == 'BW'){
    $imgPrefix = 'BWimages_id';
    $table = 'BWimages';
} if($table == 'CI') {
    $imgPrefix = 'Cimages_id';
    $table = 'Cimages';
}

// Delete the image from the database
$query = "DELETE FROM $table WHERE $imgPrefix = $imageId";
var_dump($query);
$result = $baza->promijeniDB($query);

if ($result == 0) {
    return "Slika uspješno obrisana" . $result;
} else {
    return "error broj: " . $result;
}

?>