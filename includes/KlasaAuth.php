<?php 

class Authentification{

    function dohvatiKorisnika($korisnickoIme){
        
        if(is_file("includes/bazafolio.php")){
            require_once "includes/bazafolio.php";
        }
        else{
            require_once "bazafolio.php";
        }

        $ObjektBaza = new Baza();

        $upit = "SELECT ID_Korisnika, Korisnicko_ime, Lozinka, Ovlasti_korisnika FROM korisnik WHERE Korisnicko_ime = '$korisnickoIme'";

        $rezultat_upita = $ObjektBaza->dohvatiDB($upit);
        
        if(!$rezultat_upita){
            return false;
        }
        else{
            $red = $rezultat_upita->fetch_array();
            $niz = array($red['ID_Korisnika'], $red['Korisnicko_ime'], $red['Lozinka'], $red['Ovlasti_korisnika']);
            return $niz;
        }
    }

    function dodajKorisnika($korisnickoIme, $inputLozinka, $razinaOvlasti){

        if(is_file("includes/database.php")){
            require_once "includes/database.php";
        }
        else{
            require_once "database.php";
        }

        $ObjektBaza2 = new Database();

        $password = password_hash($inputLozinka, PASSWORD_BCRYPT, array('cost' => 13));

        $upit = "INSERT INTO korisnik (Korisnicko_ime, Lozinka, Ovlasti_korisnika) VALUES ('$korisnickoIme','$password', '$razinaOvlasti')";

        $rezultat_upita = $ObjektBaza2->promijeniDB($upit);

        if(!$rezultat_upita){
            return "Korisnik registriran!";
        }
        elseif($rezultat_upita == 1062){
            return "Već postoji korisnik s tim korisničim imenom!";
        }
        else{
            echo $rezultat_upita;
            return "Registracije neuspješna!";
        }
    }
    
    function provjeriLozinku($inputLozinka, $korisnickoIme){
        
        $Auth = $this->dohvatiKorisnika($korisnickoIme);

        if($Auth == false){
            return "Ne postoji korisnik s tim nazivom!";
        }

        if(password_verify($inputLozinka, $Auth[2])){
            echo "lozinka iz baze: " . $Auth[2] . "<br>";
            return $Auth;
        }
        else{
            return "Pogrešna lozinka!";
        }    
    }
}

?>