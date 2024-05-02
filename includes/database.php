<?php
	class Database {
		/* deklaracija privatnih konstanti s podacima za prijavu na bazu - dostupne samo unutar klase */
		private const SERVER = "localhost";
		private const KORISNICKO_IME = "root";
		private const LOZINKA = "";
		private const BAZA_PODATAKA = "auth_db";
		
		/* deklaracija privatne metode za povezivanje na bazu - dostupna samo unutar klase */
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
	}
?>