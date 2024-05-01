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
                <li class="active">Add Origin</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Origin</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Add Origin</h3>
                                    <?php
                                        // Ispis greške i prekid rada skripte ako se datoteci pokuša pristupiti izravno
                                        if(!isset($_POST["submit"])){
                                            echo "<p>Error, you left something empty</p>";
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
                                            $Originname = strip_tags($_POST["origin_name"]);
                                        }

                                        if(empty(trim($_FILES["origin_icon"]["name"]))){
                                            $poruka .= "You have to select an icon. <br/>";
                                        }
                                        else{
                                            $Originicon = strip_tags($_FILES["origin_icon"]["name"]);
                                        }

                                        if(empty(trim($_POST["origin_effect"]))){
                                            $poruka .="Origin effect is required.<br/>";
                                        }
                                        else{
                                            $OriginEffect = strip_tags($_POST["origin_effect"]);
                                        }                   

                                        if(empty(trim($_POST["origin_requirements"]))){
                                            $poruka .= "Requirement field is required.<br/>";
                                        }
                                        else{
                                            $OriginRequirements = strip_tags($_POST["origin_requirements"]);
                                        }

                                        if(empty(trim($_POST["dlc_id"]))){
                                            $poruka .= "Select origin DLC.<br/>";
                                        }
                                        else{
                                            $DLCID = strip_tags($_POST["dlc_id"]);
                                        }

                                        if(empty($poruka)){
                                            $lokacija_datoteke = "assets/images/Stellaris_slike/Origins/"; 
                                            $lokacija_datoteke = $lokacija_datoteke . basename($_FILES['origin_icon']['name']); 
                                        
                                            $dozvoljeni_format = array("gif", "jpeg", "jpg", "png");
                                            $temp = explode(".", $_FILES["origin_icon"]["name"]);
                                            $ekstenzija = end($temp);
                                        
                                            if ($_FILES["origin_icon"]["size"] < 122097152 && in_array($ekstenzija, $dozvoljeni_format)){
                                                if ($_FILES["origin_icon"]["error"] > 0){
                                                    $poruka .= "Error: " . $_FILES["origin_icon"]["error"] . "<br />" ;
                                                }
                                                else{
                                                    if (file_exists($lokacija_datoteke)){
                                                        $poruka .= "A file under that name already exists, try to rename file you are uploading.<br />";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["origin_icon"]["tmp_name"], $lokacija_datoteke);
                                                    }
                                                }
                                            }
                                            else{
                                                $poruka .= "File you are trying to upload is larger than 2MB<br />";
                                            }
                                        }

                                        // U slučaju uspješne validacije radimo unos podataka u bazu
                                        if(empty($poruka)){
                                            $upit = "insert into origins (origin_icon, origin_name, origin_effect, origin_requirements, DLC_id) values
                                            ('$Originicon', '$Originname', '$OriginEffect', '$OriginRequirements', $DLCID )";
                                            $status = $baza->promijeniDB($upit);
                                        }
                                        if($status){
                                            $poruka .= "Succesful update.";
                                        }
                                        else{
                                            $poruka .= "Update error";
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