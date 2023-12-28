<!DOCTYPE html>
<html lang="en">
<head>
<?php
		$description = "Wiki website for Sci-fi games";
		$keywords = "Stellaris, wiki, wikipedia, comment, Sci-Fi, games";
		$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
		include "includes/head.php";
	?>
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
                <li class="active">Expansions</li>
                <li class="active">Edit DLC</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">DLC</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Edit DLC</h3>
                                    <?php
                                        // Ispis greške i prekid rada skripte ako se datoteci pokuša pristupiti izravno
                                        if(!isset($_POST["submit"])){
                                            echo "<p>Error, you left something empty</p>.";
                                            exit;
                                        }

                                        require_once "includes/baza.php";
                                        $baza = new Baza();
                                        $poruka = "";

                                        // Validacija podataka na strani poslužitelja
                                        if(empty(trim($_POST["dlc_name"]))){
                                            $poruka .= "Name field is required.<br/>";
                                        }
                                        else{
                                            $naslov_dlca = strip_tags($_POST["dlc_name"]);
                                        }

                                        if(empty(trim($_FILES["dlc_icon"]["name"]))){
                                            $poruka = "";
                                        }
                                        else{
                                            $ikona_dlca = strip_tags($_FILES["dlc_icon"]["name"]);
                                        }

                                        if(empty(trim($_POST["dlc_release_date"]))){
                                            $poruka .= "Date field is required.<br/>";
                                        }   
                                        else{
                                            $datum_dlca = strip_tags($_POST["dlc_release_date"]);
                                        }

                                        if(empty(trim($_POST["dlc_type_id"]))){
                                            $poruka .= "Select DLC category.<br/>";
                                        }
                                        else{
                                            $kategorija_id = strip_tags($_POST["dlc_type_id"]);
                                        }
                                        if(empty(trim($_POST["dlc_id"]))){
                                            $poruka .= "Missing DLC id.<br/>";
                                        }
                                        else{
                                            $dlc_id = strip_tags($_POST["dlc_id"]);
                                        }

                                        // U slučaju promjene fotografije izvršava se ovaj dio skripte

                                        
                                        if(!empty($ikona_dlca)){
                                            $upit = "SELECT dlc_icon from dlc where dlc_id = $dlc_id";
                                            $putanja = "assets/images/Stellaris_slike/DLC/";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                $url_dokumenta = $putanja . $red['dlc_icon'];
                                            }
                                            if (is_file($url_dokumenta)){
                                                unlink($url_dokumenta);
                                            }
                                        }
                                        else{
                                            
                                        }
                                        
                                        /*  funkcija debug_to_console ispisuje vrijednost ID-a u konzolu
                                        function debug_to_console($data) {
                                            $output = $data;
                                            if (is_array($output))
                                                $output = implode(',', $output);
                                        
                                            echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
                                        }
                                        debug_to_console($url_dokumenta);
                                        */

                                        // u slučaju uspješne validacije i ako je korisnik odabrao novu fotgrafiju radimo upload slike na server

                                        if(empty($poruka) && !empty($ikona_dlca)){
                                            $lokacija_datoteke = "assets/images/Stellaris_slike/DLC/"; 
                                            $lokacija_datoteke = $lokacija_datoteke . basename($_FILES['dlc_icon']['name']); 
                                        
                                            $dozvoljeni_format = array("gif", "jpeg", "jpg", "png");
                                            $temp = explode(".", $_FILES["dlc_icon"]["name"]);
                                            $ekstenzija = end($temp);
                                        
                                            if ($_FILES["dlc_icon"]["size"] < 2097152 && in_array($ekstenzija, $dozvoljeni_format)){
                                                if ($_FILES["dlc_icon"]["error"] > 0){
                                                    $poruka .= "Greška: " . $_FILES["dlc_icon"]["error"] . "<br />" ;
                                                }
                                                else{
                                                    if (file_exists($lokacija_datoteke)){
                                                        $poruka .= "An image with the same name already exists, please rename your image!<br />";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["dlc_icon"]["tmp_name"], $lokacija_datoteke);
                                                    }
                                                }
                                            }
                                            else{
                                                $poruka .= "Icon you are trying to upload is larger than 2MB or has a wrong data format<br />";
                                            }
                                        }

                                        // U slučaju uspješne validacije (i prijenosa fotografije na server) radimo azuriranje podataka u bazi
                                        if(empty($poruka)){
                                            if(!empty($ikona_dlca)){
                                                $upit = "update dlc set dlc_name = '$naslov_dlca', dlc_icon = '" . basename($_FILES['dlc_icon']['name']) . "', dlc_release_date = '$datum_dlca', dlc_type_id = $kategorija_id where dlc_id = $dlc_id";
                                            }
                                            else{
                                                $upit = "update dlc set dlc_name = '$naslov_dlca', dlc_release_date = '$datum_dlca', dlc_type_id = '$kategorija_id' where dlc_id = $dlc_id";
                                            }
                                            $status = $baza->promijeniDB($upit);
                                    
                                            if($status){
                                                $poruka .= "Update Successful.";
                                            }
                                            else{
                                                $poruka .= "Update Error";
                                            }
                                        }
                                    ?>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <p><?php echo $poruka; ?></p>
                                        <a class="btn btn-action btn-lg" href="expansions.php" role="button">Return</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
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