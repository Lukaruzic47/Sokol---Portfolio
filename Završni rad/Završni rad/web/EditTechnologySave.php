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
                <li><a href="technology.php">Technology</a></li>
			<li class="active">Edit Technology</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Technology</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Edit Technology</h3>
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
                                        if(empty(trim($_POST["tech_name"]))){
                                            $poruka .= "Name field is required.<br/>";
                                        }
                                        else{
                                            $TechName = strip_tags($_POST["tech_name"]);
                                        }

                                        if(empty(trim($_FILES["tech_icon"]["name"]))){
                                            $poruka = "";
                                        }
                                        else{
                                            $TechIcon = strip_tags($_FILES["tech_icon"]["name"]);
                                        }

                                        if(empty(trim($_POST["tech_rarity"]))){
                                            $poruka .= "Rarity field is required.<br/>";
                                        }
                                        else{
                                            $TechRarity = strip_tags($_POST["tech_rarity"]);
                                        }

                                        if(empty(trim($_POST["tech_cost"]))){
                                            $poruka .= "Cost field is required.<br/>";
                                        }
                                        else{
                                            $TechCost = strip_tags($_POST["tech_cost"]);
                                        }

                                        if(empty(trim($_POST["tech_desc"]))){
                                            $poruka .= "Description is required.<br/>";
                                        }
                                        else{
                                            $TechDesc = strip_tags($_POST["tech_desc"]);
                                        }

                                        if(empty(trim($_POST["tech_sub_category_id"]))){
                                            $poruka .= "Select category.<br/>";
                                        }
                                        else{
                                            $TechCategory = strip_tags($_POST["tech_sub_category_id"]);
                                        }

                                        if(empty(trim($_POST["dlc_id"]))){
                                            $poruka .= "Select DLC.<br/>";
                                        }
                                        else{
                                            $TechDLC = strip_tags($_POST["dlc_id"]);
                                        }

                                        if(empty(trim($_POST["tech_effect"]))){
                                            $poruka .= "Effect field is required.<br/>";
                                        }
                                        else{
                                            $TechEffect = strip_tags($_POST["tech_effect"]);
                                        }

                                        if(empty(trim($_POST["tech_id"]))){
                                            $poruka .= "Missing Tech id.<br/>";
                                        }
                                        else{
                                            $TechID = strip_tags($_POST["tech_id"]);
                                        }

                                        // U slučaju promjene fotografije izvršava se ovaj dio skripte
                                        
                                        if(!empty($TechIcon)){
                                            $upit = "SELECT tech_icon from technology where tech_id = $TechID";
                                            $putanja = "assets/images/Stellaris_slike/Technology/";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                $url_dokumenta = $putanja . $red['tech_icon'];
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

                                        if(empty($poruka) && !empty($TechIcon)){
                                            $lokacija_datoteke = "assets/images/Stellaris_slike/Technology/"; 
                                            $lokacija_datoteke = $lokacija_datoteke . basename($_FILES['tech_icon']['name']); 
                                        
                                            $dozvoljeni_format = array("gif", "jpeg", "jpg", "png");
                                            $temp = explode(".", $_FILES["tech_icon"]["name"]);
                                            $ekstenzija = end($temp);
                                        
                                            if ($_FILES["tech_icon"]["size"] < 10405760 && in_array($ekstenzija, $dozvoljeni_format)){
                                                if ($_FILES["tech_icon"]["error"] > 0){
                                                    $poruka .= "Greška: " . $_FILES["tech_icon"]["error"] . "<br />" ;
                                                }
                                                else{
                                                    if (file_exists($lokacija_datoteke)){
                                                        $poruka .= "An image with the same name already exists, please rename your image!<br />";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["tech_icon"]["tmp_name"], $lokacija_datoteke);
                                                    }
                                                }
                                            }
                                            else{
                                                $poruka .= "Icon you are trying to upload is larger than 10MB or has a wrong data format<br />";
                                            }
                                        }

                                        // U slučaju uspješne validacije (i prijenosa fotografije na server) radimo azuriranje podataka u bazi
                                        if(empty($poruka)){
                                            if(!empty($TechIcon)){
                                                $upit = "update technology set tech_sub_category_id = '$TechCategory', tech_name = '$TechName', tech_icon = '" . basename($_FILES['tech_icon']['name']) . "', tech_desc = '$TechDesc', tech_effect = '$TechEffect', tech_cost = '$TechCost', tech_rarity = '$TechRarity', DLC_id = $TechDLC where tech_id = $TechID";
                                            }
                                            else{
                                                $upit = "update technology set tech_sub_category_id = '$TechCategory', tech_name = '$TechName', tech_desc = '$TechDesc', tech_effect = '$TechEffect', tech_cost = '$TechCost', tech_rarity = '$TechRarity', DLC_id = $TechDLC where tech_id = $TechID";
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
                                        <a class="btn btn-action btn-lg" href="technology.php" role="button">Return</a></p>
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