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
			<li class="active">Edit Authority</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Authority</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Edit Authority</h3>
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
                                        if(empty(trim($_POST["auth_name"]))){
                                            $poruka .= "Name field is required.<br/>";
                                        }
                                        else{
                                            $AuthName = strip_tags($_POST["auth_name"]);
                                        }

                                        if(empty(trim($_FILES["authority_icon"]["name"]))){
                                            $poruka = "";
                                        }
                                        else{
                                            $AuthIcon = strip_tags($_FILES["authority_icon"]["name"]);
                                        }

                                        if(empty(trim($_POST["auth_effect"]))){
                                            $poruka .= "Rarity field is required.<br/>";
                                        }
                                        else{
                                            $AuthEffect = strip_tags($_POST["auth_effect"]);
                                        }

                                        if(empty(trim($_POST["auth_desc"]))){
                                            $poruka .= "Cost field is required.<br/>";
                                        }
                                        else{
                                            $AuthDesc = strip_tags($_POST["auth_desc"]);
                                        }

                                        if(empty(trim($_POST["auth_election"]))){
                                            $poruka .= "Description is required.<br/>";
                                        }
                                        else{
                                            $AuthElection = strip_tags($_POST["auth_election"]);
                                        }

                                        if(empty(trim($_POST["auth_id"]))){
                                            $poruka .= "Select category.<br/>";
                                        }
                                        else{
                                            $AuthID = strip_tags($_POST["auth_id"]);
                                        }

                                        // U slučaju promjene fotografije izvršava se ovaj dio skripte
                                        
                                        if(!empty($AuthIcon)){
                                            $upit = "SELECT authority_icon from authority where authority_id = $AuthID";
                                            $putanja = "assets/images/Stellaris_slike/Authority/";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                $url_dokumenta = $putanja . $red['authority_icon'];
                                            }
                                            if (is_file($url_dokumenta)){
                                                unlink($url_dokumenta);
                                            }
                                        }
                                        else{
                                            
                                        }
                                        
                                        //  funkcija debug_to_console ispisuje vrijednost ID-a u konzolu
                                        function debug_to_console($data) {
                                            $output = $data;
                                            if (is_array($output))
                                                $output = implode(',', $output);
                                        
                                            echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
                                        }
                                        debug_to_console($url_dokumenta);
                                        

                                        // u slučaju uspješne validacije i ako je korisnik odabrao novu fotgrafiju radimo upload slike na server

                                        if(empty($poruka) && !empty($AuthIcon)){
                                            $lokacija_datoteke = "assets/images/Stellaris_slike/Authority/"; 
                                            $lokacija_datoteke = $lokacija_datoteke . basename($_FILES['authority_icon']['name']); 
                                        
                                            $dozvoljeni_format = array("gif", "jpeg", "jpg", "png");
                                            $temp = explode(".", $_FILES["authority_icon"]["name"]);
                                            $ekstenzija = end($temp);
                                        
                                            if ($_FILES["authority_icon"]["size"] < 2097152 && in_array($ekstenzija, $dozvoljeni_format)){
                                                if ($_FILES["authority_icon"]["error"] > 0){
                                                    $poruka .= "Greška: " . $_FILES["authority_icon"]["error"] . "<br />" ;
                                                }
                                                else{
                                                    if (file_exists($lokacija_datoteke)){
                                                        $poruka .= "An image with the same name already exists, please rename your image!<br />";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["authority_icon"]["tmp_name"], $lokacija_datoteke);
                                                    }
                                                }
                                            }
                                            else{
                                                $poruka .= "Icon you are trying to upload is larger than 2MB or has a wrong data format<br />";
                                            }
                                        }

                                        // U slučaju uspješne validacije (i prijenosa fotografije na server) radimo azuriranje podataka u bazi
                                        if(empty($poruka)){
                                            if(!empty($AuthIcon)){
                                                $upit = "update authority set authority_name = '$AuthName', authority_desc = '$AuthDesc', authority_icon = '" . basename($_FILES['authority_icon']['name']) . "', authority_effect = '$AuthEffect', authority_election = '$AuthElection' where authority_id = $AuthID";
                                            }
                                            else{
                                                $upit = "update authority set authority_name = '$AuthName', authority_desc = '$AuthDesc', authority_effect = '$AuthEffect', authority_election = '$AuthElection' where authority_id = $AuthID";
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