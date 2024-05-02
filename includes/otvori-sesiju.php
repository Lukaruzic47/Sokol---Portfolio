<?php
/* uključujemo PHP datoteku s definicijom funkcije autentifikacija() */
require "KlasaAuth.php";
/* dohvaćamo podatke poslane iz forme za prijavu */
if (!isset($_POST['korisnicko_ime'])) {
	$_POST['korisnicko_ime'] = "undefined"; 
}
if (!isset($_POST['lozinka'])) {
	$_POST['lozinka'] = "undefined"; 
}

$autentifikacija = new Authentification;

/* NAPOMENA: u slučaju da lozinka u bazi podataka nije kriptirana ne koristi se funkcija md5() */
$korisnickoIme = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];

/* dohvaćene podatke iz forme za prijavu šaljemo kao parametre funkciji autentifikacija() => funkcija traži korisnika u bazi na temelju podataka upisanih kod prijave => ako ga pronađe, vraća niz s podacima o njemu */
/* definiciju funkcije autentifikacija() pogledajte u datoteci autentifikacija.php */
$korisnickiPodaci = $autentifikacija->provjeriLozinku($korisnickoIme, $lozinka);
/* ako se vraćeni podaci o korisniku podudaraju s podacima upisanim kod prijave:
	1. otvaramo korisničku sesiju
	2. vraćene podatke iz baze spremamo u sesiju (globalni niz podataka $_SESSION[]) => biti će nam dostupni u svim datotekama za vrijeme trajanja korisničke sesije 
	Uz podatke iz baze koji će nam trebati u daljnjem radu, deklariramo i jednu dodatnu sesijsku varijablu $_SESSION['status'] => s njome ćemo provjeravati da li je korisnik prijavljen (ako je jedanka 1 znači da je prijavljen)
	3. korisnika vraćamo na početnu stranicu 
*/
if(($korisnickoIme == $korisnickiPodaci[1]) && ($lozinka == $korisnickiPodaci[2]) && (!empty($korisnickiPodaci[1])) && (!empty($korisnickiPodaci[2]))){
	session_start();
	$_SESSION['korisnik_id'] = $korisnickiPodaci[0];
	$_SESSION['korisnicko_ime'] = $korisnickiPodaci[1];
	$_SESSION['lozinka'] = $korisnickiPodaci[2];
	$_SESSION['tip_id'] = $korisnickiPodaci[3];
	$_SESSION['status'] = 1;
	echo "<script>location.href = '../../index.php';</script>";
}
else{
	/* ako prijava nije uspjela, radimo sljedeće:
		1. bacamo poruku greške
		2. vraćamo korisnika na početnu stranicu bez otvaranja korisničke sesije
	*/
	echo "<meta charset='utf-8' />";
	echo "<script>alert('Pogrešna prijava!');</script>";
	echo "<script>location.href = '../../onlyFansLogin.php';</script>";
	exit;
}
?>