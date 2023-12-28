<?php 
/* definicija funkcije autentifikacija() */
function autentifikacija($korisnickoIme, $lozinka){
	/* uključimo PHP datoteku s definicijom klase za pristup bazi podataka */
	/* radimo provjeru zbog toga jer ćemo ovu skriptu pozivati s dvije različite lokacije */
	if(is_file("../baza.php")){
		require "../baza.php";
	}
	else{
		require "includes/baza.php";
	}
	/* kreiramo novi objekt za pristup bazi podataka */
	$baza = new Baza();
	/* definiramo SQL upit s kojim ćemo dohvatiti podatke o korisniku koji se pokušava prijaviti => korisnika tražimo na temelju podataka koje je upisao u formu za prijavu */
	$upit = "select korisnik_id, korisnicko_ime, lozinka, tip_id from korisnik where korisnicko_ime = '$korisnickoIme' and lozinka = '$lozinka'";
	/* šaljemo SQL upit bazi i dohvaćamo vraćene podatke */
	$rezultat = $baza->dohvatiDB($upit);
	/* dohvaćamo broj redova koje je vratio upit => svaki red predstavlja jednog korisnika */
	$broj = $rezultat->num_rows;
	/* ako je korisnik pronađen (upit nije vratio 0 redova), vraćene podatke iz baze spremamo u niz i vraćamo skripti koja je funkciju pozvala => otvori-sesiju.php  */
	if($broj != 0){
		while($red = $rezultat->fetch_array()){
			$niz = array($red['korisnik_id'], $red['korisnicko_ime'], $red['lozinka'], $red['tip_id']);
			return $niz;
		}
	}
}
?>
