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
                <li class="active" href="authority.php">Government & Ethics</li>
                <li class="active">New Authority</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Add Authority</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Add a new Authority</h3>
                                    <?php
                                        // Ispis greške i prekid rada skripte ako se datoteci pokuša pristupiti izravno
                                        if(!isset($_POST["submit"])){
                                            echo "<p>Error, you left something empty</p>";
                                            exit;
                                        }

                                        require_once "includes/baza.php";
                                        $baza = new Baza();
                                        $poruka = "";
                                        $dlc_id = 1;

                                        // Validacija podataka na strani poslužitelja
                                        if(empty(trim($_POST["auth_name"]))){
                                            $poruka .= "Name field is required.<br/>";
                                        }
                                        else{
                                            $AuthName = strip_tags($_POST["auth_name"]);
                                        }

                                        if(empty(trim($_FILES["auth_icon"]["name"]))){
                                            $poruka .= "You have to select an icon. <br/>";
                                        }
                                        else{
                                            $AuthIcon = strip_tags($_FILES["auth_icon"]["name"]);
                                        }

                                        if(empty(trim($_POST["auth_effect"]))){
                                            $poruka .="Effect field is required.<br/>";
                                        }
                                        else{
                                            $AuthEffect = strip_tags($_POST["auth_effect"]);
                                        }                   

                                        if(empty(trim($_POST["auth_desc"]))){
                                            $poruka .="Description field is required.<br/>";
                                        }
                                        else{
                                            $AuthDesc = strip_tags($_POST["auth_desc"]);
                                        }                   

                                        if(empty(trim($_POST["auth_election"]))){
                                            $poruka .= "Election is required.<br/>";
                                        }
                                        else{
                                            $AuthElection = strip_tags($_POST["auth_election"]);
                                        }

                                        if(empty($poruka)){
                                            $lokacija_datoteke = "assets/images/Stellaris_slike/Authority/"; 
                                            $lokacija_datoteke = $lokacija_datoteke . basename($_FILES['auth_icon']['name']); 
                                        
                                            $dozvoljeni_format = array("gif", "jpeg", "jpg", "png");
                                            $temp = explode(".", $_FILES["auth_icon"]["name"]);
                                            $ekstenzija = end($temp);
                                        
                                            if ($_FILES["auth_icon"]["size"] < 2097152 && in_array($ekstenzija, $dozvoljeni_format)){
                                                if ($_FILES["auth_icon"]["error"] > 0){
                                                    $poruka .= "Error: " . $_FILES["auth_icon"]["error"] . "<br />" ;
                                                }
                                                else{
                                                    if (file_exists($lokacija_datoteke)){
                                                        $poruka .= "A file under that name already exists, try to rename file you are uploading.<br />";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["auth_icon"]["tmp_name"], $lokacija_datoteke);
                                                    }
                                                }
                                            }
                                            else{
                                                $poruka .= "File you are trying to upload is larger than 2MB<br />";
                                            }
                                        }

                                        // U slučaju uspješne validacije radimo unos podataka u bazu
                                        if(empty($poruka)){
                                            $upit = "insert into authority (authority_name, authority_icon, authority_effect, authority_desc, authority_election, DLC_id) values
                                            ('$AuthName', '$AuthIcon', '$AuthEffect', '$AuthDesc', '$AuthElection', $dlc_id)";
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