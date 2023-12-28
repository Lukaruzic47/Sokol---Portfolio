<?php
session_start();
/* ako korisnik nije prijavljen (nisu postavljene sesijske varijable $_SESSION['korisnicko_ime'], $_SESSION['lozinka'] i $_SESSION['tip_id']) vrati ga na početnu stranicu */
if((!isset($_SESSION['korisnicko_ime'])) || (!isset($_SESSION['lozinka'])) || (!isset($_SESSION['tip_id']))){
	echo "<script>location.href = 'index.php';</script>";
	exit;
}

require "includes/session/autentifikacija.php";
$korisnickiPodaci = autentifikacija($_SESSION['korisnicko_ime'],$_SESSION['lozinka']);
$baza = new Baza();
$fotografija_id = $_GET["id"];

/* iz baze dohvati autora fotografije koja se uređuje */
$upitAutor = "select korisnik_id from fotografija where fotografija_id = $fotografija_id";
$rezultatAutor = $baza->dohvatiDB($upitAutor);
while($red = $rezultatAutor->fetch_array()){
	$autor = $red["korisnik_id"];
}

/* ako su sesijski podaci postavljeni, provjeri da li u bazi postoji korisnik s istim podacima => ako ne, vrati korisnika na početnu stranicu */
/* dodatno, provjeri da li je korisnik autor fotografije koja se uređuje ili da li je u grupi administrator  => ako ništa od toga nije, vrati ga na početnu stranicu */
if(($_SESSION['korisnicko_ime'] != $korisnickiPodaci[1]) || ($_SESSION['lozinka'] != $korisnickiPodaci[2]) || ($_SESSION['korisnik_id'] != $autor) && ($_SESSION["tip_id"] != 1)){
	echo "<script>location.href = 'index.php';</script>";
	exit;
}
?>