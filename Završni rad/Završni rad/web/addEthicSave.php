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
                <li class="active">Government & Ethics</li>
                <li class="active">Add Ethic</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent" style="margin-bottom: 250px;">
                    <header class="page-header">
                        <h1 class="page-title">Ethic</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Add Ethic</h3>
                                    <?php
                                        // Ispis greške i prekid rada skripte ako se datoteci pokuša pristupiti izravno
                                        if(!isset($_POST["submit"])){
                                            echo "<p>Error, you left something empty</p>";
                                            exit;
                                        }

                                        require_once "includes/baza.php";
                                        $baza = new Baza();
                                        $poruka = "";
                                        $ethic_id = 1;

                                        // Validacija podataka na strani poslužitelja
                                        if(empty(trim($_POST["ethic_name"]))){
                                            $poruka .= "Name field is required.<br/>";
                                        }
                                        else{
                                            $EthicName = strip_tags($_POST["ethic_name"]);
                                        }

                                        if(empty(trim($_FILES["ethic_icon"]["name"]))){
                                            $poruka .= "You have to select an icon. <br/>";
                                        }
                                        else{
                                            $EthicIcon = strip_tags($_FILES["ethic_icon"]["name"]);
                                        }

                                        if(empty(trim($_POST["ethic_effect"]))){
                                            $poruka .="Effect field is required.<br/>";
                                        }
                                        else{
                                            $EthicEffect = strip_tags($_POST["ethic_effect"]);
                                        }                   

                                        if(empty(trim($_POST["ethic_desc"]))){
                                            $poruka .= "Description field is required.<br/>";
                                        }
                                        else{
                                            $EthicDesc = strip_tags($_POST["ethic_desc"]);
                                        }

                                        if(empty(trim($_POST["ethic_opposite"]))){
                                            $poruka .= "Opposite is required.<br/>";
                                        }
                                        else{
                                            $EthicOpposite = strip_tags($_POST["ethic_opposite"]);
                                        }

                                        if(empty($poruka)){
                                            $lokacija_datoteke = "assets/images/Stellaris_slike/Ethics/"; 
                                            $lokacija_datoteke = $lokacija_datoteke . basename($_FILES['ethic_icon']['name']); 
                                        
                                            $dozvoljeni_format = array("gif", "jpeg", "jpg", "png");
                                            $temp = explode(".", $_FILES["ethic_icon"]["name"]);
                                            $ekstenzija = end($temp);
                                        
                                            if ($_FILES["ethic_icon"]["size"] < 2097152 && in_array($ekstenzija, $dozvoljeni_format)){
                                                if ($_FILES["ethic_icon"]["error"] > 0){
                                                    $poruka .= "Error: " . $_FILES["ethic_icon"]["error"] . "<br />" ;
                                                }
                                                else{
                                                    if (file_exists($lokacija_datoteke)){
                                                        $poruka .= "A file under that name already exists, try to rename file you are uploading.<br />";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["ethic_icon"]["tmp_name"], $lokacija_datoteke);
                                                    }
                                                }
                                            }
                                            else{
                                                $poruka .= "File you are trying to upload is larger than 2MB<br />";
                                            }
                                        }

                                        // U slučaju uspješne validacije radimo unos podataka u bazu
                                        if(empty($poruka)){
                                            $upit = "insert into ethics (ethic_name, ethic_icon, ethic_effect, ethic_desc, ethic_opposite, ethic_cost, DLC_id) values
                                            ('$EthicName', '$EthicIcon', '$EthicEffect', '$EthicDesc', '$EthicOpposite', $ethic_id, $ethic_id)";
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