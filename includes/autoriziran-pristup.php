<?php
// session_start(); 
// postrebno je postaviti session_start() na početak svake skripte koja koristi sesijske varijable zbog toga što se u suprotnom neće moći koristiti sesijske varijable

/* ako korisnik nije prijavljen (nisu postavljene sesijske varijable $_SESSION['korisnicko_ime'] i $_SESSION['lozinka']) vrati ga na početnu stranicu */
if((!isset($_SESSION['korisnicko_ime'])) || (!isset($_SESSION['lozinka']))){
	echo "<script>location.href = 'index.php';</script>";
	echo "<noscript>location.href = 'index.php';</noscript>";
	exit;
}

/* ako su sesijski podaci postavljeni, provjeri da li u bazi postoji korisnik s istim podacima => ako ne, vrati korisnika na početnu stranicu */
require_once "KlasaAuth.php";

$Auth = new Authentification();

$korisnickiPodaci = $Auth->provjeriLozinku($_SESSION['korisnicko_ime'], $_SESSION['lozinka']);

if ($korisnickiPodaci !== false) {
	if(($_SESSION['korisnicko_ime'] != $korisnickiPodaci[1]) || ($_SESSION['lozinka'] != $korisnickiPodaci[2])){
		echo "alert(" . $_SESSION['korisnicko_ime'] . ")";
		echo "<script>location.href = 'index.php';</script>";
		echo "<noscript>location.href = 'index.php';</noscript>";
		exit;
	}
}
// bitno je provjeravati je li $korisnickiPodaci različit od false jer može imati vrijednosti false ili može biti array sa podacima korisnika
?>