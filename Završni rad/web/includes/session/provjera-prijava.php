<?php
session_start(); 
/* ako korisnik nije prijavljen (nisu postavljene sesijske varijable $_SESSION['korisnicko_ime'] i $_SESSION['lozinka']) vrati ga na početnu stranicu */
if((!isset($_SESSION['korisnicko_ime'])) || (!isset($_SESSION['lozinka']))){
	echo "<script>location.href = 'index.php';</script>";
	exit;
}

/* ako su sesijski podaci postavljeni, provjeri da li u bazi postoji korisnik s istim podacima => ako ne, vrati korisnika na početnu stranicu */
require_once "includes/session/autentifikacija.php";
$korisnickiPodaci = autentifikacija($_SESSION['korisnicko_ime'], $_SESSION['lozinka']);
if(($_SESSION['korisnicko_ime'] != $korisnickiPodaci[1]) || ($_SESSION['lozinka'] != $korisnickiPodaci[2])){
	echo "<script>location.href = 'index.php';</script>";
	exit;
}
?>