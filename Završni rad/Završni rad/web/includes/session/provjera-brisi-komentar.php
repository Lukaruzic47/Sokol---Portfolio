<?php
session_start(); 
/* ako korisnik nije prijavljen (nisu postavljene sesijske varijable $_SESSION['korisnicko_ime'], $_SESSION['lozinka'] i $_SESSION['tip_id']) vrati ga na početnu stranicu */
if((!isset($_SESSION['korisnicko_ime'])) || (!isset($_SESSION['lozinka'])) || (!isset($_SESSION['tip_id']))){
	echo "<script>location.href = 'index.php';</script>";
	exit;
}

/* ako su sesijski podaci postavljeni, provjeri da li u bazi postoji korisnik s istim podacima => ako ne, vrati korisnika na početnu stranicu */
/* dodatno, provjeri da li je korisnik u grupi administrator => ako nije, vrati ga na početnu stranicu */
require "includes/session/autentifikacija.php";
$korisnickiPodaci = autentifikacija($_SESSION['korisnicko_ime'],$_SESSION['lozinka']);
if(($_SESSION['korisnicko_ime'] != $korisnickiPodaci[1]) || ($_SESSION['lozinka'] != $korisnickiPodaci[2]) || ($_SESSION["tip_id"] != 1)){
	echo "<script>location.href = 'index.php';</script>";
	exit;
}
?>