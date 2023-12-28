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
                <li class="active">Register</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Registration</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Register a new account</h3>
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
                                        if(empty(trim($_POST["name"]))){
                                            $poruka .= "Name field is required.<br/>";
                                        }
                                        else{
                                            $FirstName = strip_tags($_POST["name"]);
                                        }

                                        if(empty(trim($_POST["last"]))){
                                            $poruka .= "Last name field is required.<br/>";
                                        }
                                        else{
                                            $LastName = strip_tags($_POST["last"]);
                                        }

                                        if(empty(trim($_POST["email"]))){
                                            $poruka .= "Email is required.<br/>";
                                        }
                                        else{
                                            $Email = strip_tags($_POST["email"]);
                                        }

                                        if(empty(trim($_POST["lozinka1"]))){
                                            $poruka .= "Missing password.<br/>";
                                        }
                                        else{
                                            $Password1 = strip_tags($_POST["lozinka1"]);
                                        }

                                        if(empty(trim($_POST["lozinka2"]))){
                                            $poruka .= "Missing password check.<br/>";
                                        }
                                        else{
                                            $Password2 = strip_tags($_POST["lozinka2"]);
                                        }

                                        $UserName = $FirstName . " " . $LastName;
                                        $Tip = 2;

                                        if($Password1 == $Password2 && empty($poruka)){
                                            $upit = "INSERT INTO korisnik (korisnicko_ime, lozinka, email, tip_id) values ('$UserName', '$Password1', '$Email', $Tip)"; 
                                            $status = $baza->promijeniDB($upit);
                                        }
                                        if($Password1 <> $Password2){
                                            $poruka .= "Passwords do not match<br>";
                                        }
                                        if($status){
                                            $poruka .= "Account created.";
                                        }
                                        else{
                                            $poruka .= "Update error";
                                        }
                                        
                                    ?>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <p><?php echo $poruka; ?></p>
                                        <a class="btn btn-action btn-lg" href="login.php" role="button">Return</a></p>
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