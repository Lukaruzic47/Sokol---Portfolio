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
                <li><a href="technology.php">Government & Ethics</a></li>
			<li class="active">Edit Ethis</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Ethics</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Edit Ethic</h3>
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
                                        if(empty(trim($_POST["ethic_name"]))){
                                            $poruka .= "Name field is required.<br/>";
                                        }
                                        else{
                                            $EthicName = strip_tags($_POST["ethic_name"]);
                                        }

                                        if(empty(trim($_FILES["ethic_icon"]["name"]))){
                                            $poruka = "";
                                        }
                                        else{
                                            $EthicIcon = strip_tags($_FILES["ethic_icon"]["name"]);
                                        }

                                        if(empty(trim($_POST["ethic_effect"]))){
                                            $poruka .= "Rarity field is required.<br/>";
                                        }
                                        else{
                                            $EthicEffect = strip_tags($_POST["ethic_effect"]);
                                        }

                                        if(empty(trim($_POST["ethic_desc"]))){
                                            $poruka .= "Cost field is required.<br/>";
                                        }
                                        else{
                                            $EthicDesc = strip_tags($_POST["ethic_desc"]);
                                        }

                                        if(empty(trim($_POST["ethic_opposite"]))){
                                            $poruka .= "Description is required.<br/>";
                                        }
                                        else{
                                            $EthicOpposite = strip_tags($_POST["ethic_opposite"]);
                                        }

                                        if(empty(trim($_POST["ethic_id"]))){
                                            $poruka .= "Select category.<br/>";
                                        }
                                        else{
                                            $EthicID = strip_tags($_POST["ethic_id"]);
                                        }

                                        // U slučaju promjene fotografije izvršava se ovaj dio skripte
                                        
                                        if(!empty($EthicIcon)){
                                            $upit = "SELECT ethic_icon from ethics where ethic_id = $EthicID";
                                            $putanja = "assets/images/Stellaris_slike/Ethics/";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                $url_dokumenta = $putanja . $red['ethic_icon'];
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

                                        if(empty($poruka) && !empty($EthicIcon)){
                                            $lokacija_datoteke = "assets/images/Stellaris_slike/Ethics/"; 
                                            $lokacija_datoteke = $lokacija_datoteke . basename($_FILES['ethic_icon']['name']); 
                                        
                                            $dozvoljeni_format = array("gif", "jpeg", "jpg", "png");
                                            $temp = explode(".", $_FILES["ethic_icon"]["name"]);
                                            $ekstenzija = end($temp);
                                        
                                            if ($_FILES["ethic_icon"]["size"] < 2097152 && in_array($ekstenzija, $dozvoljeni_format)){
                                                if ($_FILES["ethic_icon"]["error"] > 0){
                                                    $poruka .= "Greška: " . $_FILES["ethic_icon"]["error"] . "<br />" ;
                                                }
                                                else{
                                                    if (file_exists($lokacija_datoteke)){
                                                        $poruka .= "An image with the same name already exists, please rename your image!<br />";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["ethic_icon"]["tmp_name"], $lokacija_datoteke);
                                                    }
                                                }
                                            }
                                            else{
                                                $poruka .= "Icon you are trying to upload is larger than 2MB or has a wrong data format<br />";
                                            }
                                        }

                                        // U slučaju uspješne validacije (i prijenosa fotografije na server) radimo azuriranje podataka u bazi
                                        if(empty($poruka)){
                                            if(!empty($EthicIcon)){
                                                $upit = "update ethics set ethic_name = '$EthicName', ethic_desc = '$EthicDesc', ethic_icon = '" . basename($_FILES['ethic_icon']['name']) . "', ethic_opposite = '$EthicOpposite', ethic_effect = '$EthicEffect' where ethic_id = $EthicID";
                                            }
                                            else{
                                                $upit = "update ethics set ethic_name = '$EthicName', ethic_desc = '$EthicDesc', ethic_opposite = '$EthicOpposite', ethic_effect = '$EthicEffect' where ethic_id = $EthicID";
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
                                        <a class="btn btn-action btn-lg" href="authority.php" role="button">Return</a></p>
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