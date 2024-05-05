<?php
	class Baza{
		/* deklaracija privatnih konstanti s podacima za prijavu na bazu - dostupne samo unutar klase */
		private const SERVER = "localhost";
		private const KORISNICKO_IME = "root";
		private const LOZINKA = "";
		private const BAZA_PODATAKA = "auth_db";
		
		private function poveziDB(){
			try{
				/* pokušaj otvaranja konekcije s MySQL sustavom */
				$mysqli = new mysqli(self::SERVER, self::KORISNICKO_IME, self::LOZINKA, self::BAZA_PODATAKA);
			}
			catch(Exception $e){
				/* upravljanje mogućom greškom */
				echo "<p><b>Neuspješno povezivanje na bazu: </b>" . $e->getMessage() . "</p>";
				exit;
			}
			
			/* postavljanje charset-a */
			$mysqli->set_charset("utf8");
			// $mysqli->query("set names 'utf8'");
			/* vraćanje objekta koji predstavlja konekciju */
			return $mysqli;
		}
		
		/* deklaracija javne metode za dohvaćanje podataka iz baze - dostupna iz bilo kojeg dijela programa */
		function dohvatiDB($upit){
			/* povezivanje na bazu pozivom privatne metode poveziDB() */
			$mysqli = $this->poveziDB();
			try{
				/* pokušaj slanja upita bazi i dohvaćanje njenog odgovora */
				$rezultat = $mysqli->query($upit);
			}
			catch(Exception $e){
				/* upravljanje mogućom greškom */
				echo "<p><b>Greška kod izvršavanja upita: </b>" . $e->getMessage() . "</p>";
				exit;
			}
			
			/* zatvaranje konekcije */
			$mysqli->close();
			/* vraćanje rezultata upita skripti */
			return $rezultat;
		}
		
		/* deklaracija javne metode za ažuriranje podataka baze - dostupna iz bilo kojeg dijela programa */
		function promijeniDB($upit){
			/* povezivanje na bazu pozivom privatne metode poveziDB() */
			$mysqli = $this->poveziDB();
			try{
				/* pokušaj slanja upita bazi i dohvaćanje njenog odgovora */
				$rezultat = $mysqli->query($upit);
			}
			catch(Exception $e){
				/* upravljanje mogućom greškom */
				echo "<p><b>Greška kod izvršavanja upita: </b>" . $e->getMessage() . "</p>";
				exit;
			}
			
			$resultNumber = $mysqli->errno;

			/* provjera da li je upit obuhvatio barem jedan red iz baze */
			if($rezultat && $mysqli->affected_rows > 0){
				/* zatvaranje konekcije */
				$mysqli->close();
				/* vrati istinu */
				return $resultNumber;
			}
			else{
				/* zatvaranje konekcije */
				$mysqli->close();
				/* vrati laž */
				return $resultNumber;
			}
		}

		function pripremiUpit($INSorSEL, $korisnickoIme, $lozinka = NULL, $razinaOvlasti = NULL){
			$mysqli = $this->poveziDB();

			if($INSorSEL == "INSERT" && $lozinka != NULL && $razinaOvlasti != NULL){
				if(strlen($korisnickoIme) < 10 || strlen($lozinka) < 10){
					echo "<p>Korisničko ime i lozinka moraju imati najmanje 10 znakova!</p>";
					return false;
				}
				$upit = "INSERT INTO korisnik (Korisnicko_ime, Lozinka, Ovlasti_korisnika) VALUES (?, ?, ?)";

				$lozinka = password_hash($lozinka, PASSWORD_BCRYPT, array('cost' => 15));

				$rezultat_upita = $mysqli->prepare($upit);
				$rezultat_upita->bind_param("ssi", $korisnickoIme, $lozinka, $razinaOvlasti);
				$rezultat_upita->execute();

				// affected rows provjerava je li upit promjenio nešto u bazi
				if($rezultat_upita->affected_rows > 0 && $rezultat_upita->errno == 0){
					// echo "<p>Registracija uspješna!</p>";
					return true;
				}
				elseif($rezultat_upita->errno == 1062){
					// echo "<p>Već postoji korisnik s tim korisničkim imenom!</p>";
					return false;
				}
				else{
					// echo "<p>Registracija neuspješna!</p>";
					return false;
				}
			}
			elseif($INSorSEL == "SELECT" && $korisnickoIme != NULL){
				$upit = "SELECT ID_Korisnika, Korisnicko_ime, Lozinka, Ovlasti_korisnika FROM korisnik WHERE Korisnicko_ime = ?";

				$stmt = $mysqli->prepare($upit);
				$stmt->bind_param("s", $korisnickoIme);
				$stmt->execute();
				$rezultat = $stmt->get_result();
				$red = $rezultat->fetch_array();

				if($red == NULL) return false;

				$niz = array($red['ID_Korisnika'], $red['Korisnicko_ime'], $red['Lozinka'], $red['Ovlasti_korisnika']);

				return $niz;
			}
			else{
				return false;
			}
		}
	}
?>