<?php
require "KlasaAuth.php";

$Auth = new Authentification();

if (!isset($_POST['korisnicko_ime'])) {
	$_POST['korisnicko_ime'] = "undefined"; 
}
if (!isset($_POST['lozinka'])) {
	$_POST['lozinka'] = "undefined"; 
}

$korisnickoIme = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];


$korisnickiPodaci = $Auth->provjeriPodatkePrijeUnosa($korisnickoIme, $lozinka);


if($korisnickiPodaci == false){
	echo "<meta charset='utf-8' />";
	echo "<script>alert('Pogrešna prijava!');</script>";
	echo "<script>location.href = '../../onlyFansLogin.php';</script>";
	exit;
}
else{
	session_start();
	$_SESSION['korisnik_id'] = $korisnickiPodaci[0];
	$_SESSION['korisnicko_ime'] = $korisnickiPodaci[1];
	$_SESSION['lozinka'] = $korisnickiPodaci[2];
	$_SESSION['ovlasti_id'] = $korisnickiPodaci[3];
	$_SESSION['status'] = 1;
	echo "<script>location.href = '../../index.php';</script>";
	exit;
}
?>