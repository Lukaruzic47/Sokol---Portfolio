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
                <li class="active">Origins</li>
                <li class="active">Edit Origin</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Edit Origin</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Edit an existing Origin</h3>
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
                                        if(empty(trim($_POST["origin_name"]))){
                                            $poruka .= "Name field is required.<br/>";
                                        }
                                        else{
                                            $OriginName = strip_tags($_POST["origin_name"]);
                                        }

                                        if(empty(trim($_FILES["origin_icon"]["name"]))){
                                            $poruka = "";
                                        }
                                        else{
                                            $OriginIcon = strip_tags($_FILES["origin_icon"]["name"]);
                                        }

                                        if(empty(trim($_POST["origin_effect"]))){
                                            $poruka .= "Effect field is required.<br/>";
                                        }
                                        else{
                                            $OriginEffect = strip_tags($_POST["origin_effect"]);
                                        }

                                        if(empty(trim($_POST["origin_requirements"]))){
                                            $poruka .= "Origin requirement is required.<br/>";
                                        }
                                        else{
                                            $OriginRequ = strip_tags($_POST["origin_requirements"]);
                                        }

                                        if(empty(trim($_POST["origin_id"]))){
                                            $poruka .= "Missing Origin id.<br/>";
                                        }
                                        else{
                                            $OriginID = strip_tags($_POST["origin_id"]);
                                        }

                                        if(empty(trim($_POST["dlc_id"]))){
                                            $poruka .= "Missing Origin id.<br/>";
                                        }
                                        else{
                                            $OriginDLC = strip_tags($_POST["dlc_id"]);
                                        }

                                        // U slučaju promjene fotografije izvršava se ovaj dio skripte

                                        
                                        if(!empty($ikona_dlca)){
                                            $upit = "SELECT origin_icon from origins where origin_id = $OriginID";
                                            $putanja = "assets/images/Stellaris_slike/DLC/";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                $url_dokumenta = $putanja . $red['origin_icon'];
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
                                            $lokacija_datoteke = "assets/images/Stellaris_slike/Origins/"; 
                                            $lokacija_datoteke = $lokacija_datoteke . basename($_FILES['origin_icon']['name']); 
                                        
                                            $dozvoljeni_format = array("gif", "jpeg", "jpg", "png");
                                            $temp = explode(".", $_FILES["origin_icon"]["name"]);
                                            $ekstenzija = end($temp);
                                        
                                            if ($_FILES["origin_icon"]["size"] < 2097152 && in_array($ekstenzija, $dozvoljeni_format)){
                                                if ($_FILES["origin_icon"]["error"] > 0){
                                                    $poruka .= "Greška: " . $_FILES["origin_icon"]["error"] . "<br />" ;
                                                }
                                                else{
                                                    if (file_exists($lokacija_datoteke)){
                                                        $poruka .= "An image with the same name already exists, please rename your image!<br />";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["origin_icon"]["tmp_name"], $lokacija_datoteke);
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
                                                $upit = "update origins set origin_name = '$OriginName', origin_icon = '" . basename($_FILES['origin_icon']['name']) . "', origin_effect = '$OriginEffect', origin_requirements = '$OriginRequ', DLC_id = $OriginDLC where origin_id = $OriginID";
                                            }
                                            else{
                                                $upit = "update origins set origin_name = '$OriginName', origin_effect = '$OriginEffect', origin_requirements = '$OriginRequ', DLC_id = $OriginDLC where origin_id = $OriginID";
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
                                        <a class="btn btn-action btn-lg" href="origin.php" role="button">Return</a></p>
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