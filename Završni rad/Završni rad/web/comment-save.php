<?php
    session_start();
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
                <li class="active">Comment</li>
            </ol>
            <div class="row">
                <!-- Article main content -->
                <article class="col-xs-12 maincontent">
                    <header class="page-header">
                        <h1 class="page-title">Comment</h1>
                    </header>
                    
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3 class="thin text-center">Add new site comment</h3>
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
                                        if(empty(trim($_POST["comment"]))){
                                            $poruka .= "You have to write a comment to publish it.<br/>";
                                        }
                                        else{
                                            $comment = strip_tags($_POST["comment"]);
                                        }

                                        if(empty(trim($_POST["header"]))){
                                            $poruka .="Your comment needs to have a header.<br/>";
                                        }
                                        else{
                                            $header = strip_tags($_POST["header"]);
                                        }       
                                        
                                        if(!isset($_SESSION["korisnik_id"])){
                                            $_SESSION["koirsnik_id"] = "undefined";
                                        }
                                        $korisnik_id = $_SESSION["korisnik_id"];

                                        // do postavljanja korisničke sesije autor svake fotografije biti će korisnik s ID-om 1

                                        // U slučaju uspješne validacije radimo unos podataka u bazu
                                        if(empty($poruka)){
                                            $upit = "insert into komentar (datum_unosa_komentara, tekst_komentar, header, korisnik_id) values
                                            (now(), '$comment', '$header', $korisnik_id)";
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
                                            <a class="btn btn-action" href="index.php" role="button">Return</a></p>
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