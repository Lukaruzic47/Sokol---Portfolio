<?php 

class Authentification{

    private function kreirajObjekt(){

        if(is_file("includes/bazafolio.php")){
            require_once "includes/bazafolio.php";
        }
        else{
            require_once "bazafolio.php";
        }

        $ObjektBaza = new Baza();
        return $ObjektBaza;
    }

    function provjeriPodatkePrijeUnosa($korisnickoIme, $lozinka, $razinaOvlasti = NULL){
        // provjera korisničkog imena (minimalno 10 znakova, samo slova i brojevi, bez razmaka)
        if($korisnickoIme == "" || $lozinka == "" || strlen($korisnickoIme) < 10 || strlen($lozinka) < 10){
            // echo "<p>Morate unijeti korisničko ime i lozinku te moraju imati minimalno 10 znamenaka!</p>";
            return false;
        }
        else{
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#%=@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/u", $lozinka)) {
                // echo "<p>Lozinka mora sadržavati minimalno 10 znakova, jedno malo slovo, jedno veliko slovo, jedan broj i barem jedan posebni znak.</p>";
                return false;
            } 
            elseif(!preg_match("/^[A-Za-z\d]{10,}$/u", $korisnickoIme)){
                // echo "<p>Korisničko ime smije sadržavati samo slova i brojeve!</p>";
                return false;
            }
            else {
                // echo "<p>Korektnost podataka je ispravna!<br>";
                $rezultat_provjere = $this->provjeriLozinku($lozinka, $korisnickoIme);
                return $rezultat_provjere;
            }
        }
    }
    
    
    function provjeriLozinku($inputLozinka, $korisnickoIme){
        
        $ObjektBaza = $this->kreirajObjekt();

        $rezultat_upita = $ObjektBaza->pripremiUpit("SELECT", $korisnickoIme);

        if(!$rezultat_upita){
            // echo "<p>Ne postoji korisnik s tim korisničkim imenom!</p>";
            return false;
        }
        elseif(password_verify($inputLozinka, $rezultat_upita[2])){
            // echo "Lozinka je točna!";
            return $rezultat_upita;
        }
        else{
            // echo "Pogrešna lozinka!";
            return false;
        }    
    }
}

?>