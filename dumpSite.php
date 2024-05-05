<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        // $username = $_POST['korisnicko_ime'];
        // $lozinka = $_POST['lozinka'];

        // echo "$username <br> $lozinka <br>";

        echo "Raw dodavanje korisnika preko funkcije<br>";
        require "includes/KlasaAuth.php";
        require "includes/bazafolio.php";

        $Auth = new Authentification();
        $baza = new Baza();

        $username = "Lukaruzic47";
        $lozinka = "Dokkenagain3!";

        // $baza->pripremiUpit("INSERT", $username, $lozinka, 1);
        // $korisnickiPodaci = $Auth->provjeriLozinku($lozinka, $username);

        $korisnickiPodaci = $Auth->provjeriPodatkePrijeUnosa($username, $lozinka);
        var_dump($korisnickiPodaci);
    ?>

</body>
</html>