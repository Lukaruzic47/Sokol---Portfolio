<?php
require "includes/session/provjera-prijava.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
		$description = "Wiki website for Sci-fi games";
		$keywords = "Stellaris, wiki, wikipedia, comment, Sci-Fi, games";
		$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
		include "includes/head.php";
	?>
    <script>
        function natrag(){
            location.href = "origin.php";
        }
    </script>
</head>
<body>
    <div id="page-container">
        <div id="content-wrap">

        <?php include "includes/zaglavlje.php"; ?>
        <header id="head" class="secondary"></header>

        <!-- container -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Origin</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Delete Origin</h1>
                    </header>
                    
                    <section>
                <?php
                    /* deklaracije varijable $poruka s kojom ćemo ispisati poruku korisniku, uključivanje datoteke s definicijom klase Baza te kreiranje objekta iz navedene klase => pomoću njegovih metoda šaljemo upite bazi podataka */
                    $poruka = "";
                    require_once "includes/baza.php";
                    $baza = new Baza();

                    /* dohvaćanje poslanog ID-a fotografije koja se briše */
                    $Origin_id = $_GET["id"];
                    /* dohvaćanje potrebnih podataka iz baze => lokacija na serveru gdje se nalazi fotografija koja će se brisati te ID kategorije u kojoj se fotografija nalazi */
                    $upitPodaci = "select origin_icon from origins where origin_id = $Origin_id";
                    $rezultat = $baza->dohvatiDB($upitPodaci);
                    while($red = $rezultat->fetch_array()){
                        $ikona = "assets/images/Stellaris_slike/Authority/" . $red['origin_icon'];
                    }
                    

                    /* definicija SQL upita za brisanje retka iz tablice u bazi koji sadrži podatke odabrane fotografije */
                    $upitBrisi = "delete from origins where origin_id = $Origin_id";
                    
                    /* slanje upita za brisanje bazi podataka */
                    $status = $baza->promijeniDB($upitBrisi);
                    if($status){
                        /* ako brisanje podataka iz baze uspije priprema poruke za ispis te uklanjanje same fotografije iz mape na serveru: PHP funkcija unlink() => prije samog uklanjanja provjera da li se na zadanoj lokaciji nalazi datoteka: PHP funkcija is_file() */
                        $poruka = "Uspješno brisanje Origin-a";	
                        if (is_file($ikona)){
                                unlink($ikona);
                        }
                    }
                    else{
                        /* ako brisanje podataka iz baze NE uspije priprema poruke za ispis */
                        $poruka = "Greška kod brisanja Origin-a";		
                    }
                ?>
                <p><?php echo $poruka; ?></p>
                <!-- 5. korak -->
                <!-- ispis poruke korisniku te prikaz gumbića za poziv JavaScript funkcije kojoj se šalje ID kategorije u kojoj se nalazila brisana fotografija -->
                <!-- funkcija je definirana u zaglavlju datoteke -->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a class="btn btn-action btn-lg" href="origin.php"role="button">Return</a></p>
                    </div>
                </div>
			</section>
                    
                </article>
                <!-- /Article -->

                </div>
            </div>	<!-- /container -->
        </div>
        <footer id="footer1">
        <?php include "includes/footer.php"; ?>	
    </footer>
        </div>
	

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>