<?php
require "includes/session/provjera-prijava.php";
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
    <?php include "includes/zaglavlje.php"; ?>
	<header id="head" class="secondary"></header>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li ><a href="authority.php">Government & Ethics</a></li>
			<li class="active">Edit Authority</li>
		</ol>
		<div class="row">
			
            <?php
                require_once "includes/baza.php";
                $baza = new Baza();
                $Auth_id = $_GET["id"];
  
                $upit = "select authority_name, authority_icon, authority_desc, authority_election, authority_effect from authority where authority_id = $Auth_id";
                $rezultat = $baza->dohvatiDB($upit);
                while($red = $rezultat->fetch_array()){
                    $AuthName = $red["authority_name"];
                    $AuthIcon = $red["authority_icon"];
                    $AuthDesc = $red["authority_desc"];
                    $AuthElection = $red["authority_election"];
                    $AuthEffect = $red["authority_effect"];
					$lokacija = "assets/images/Stellaris_slike/Authority/";
					$lokacija = $lokacija . basename($AuthIcon);
                }
            ?>

			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Edit Authority</h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Edit an existing Authority</h3>

							<form method="post" action="EditAuthoritySave.php" enctype="multipart/form-data">
                                <input type="hidden" name="auth_id" value="<?php echo $Auth_id;?>" />
								<div class="top-margin">
									<label>Authority name</label>
									<input type="text" name="auth_name" id="auth_name" class="form-control" value="<?php echo $AuthName;?>">
								</div>
                                <div class="top-margin">
									<label>Authority icon</label>
									<input type="file" name="authority_icon" id="authority_icon" class="form-control">
                                    <img src="<?php echo $lokacija ?>" alt=" <?php echo $AuthIcon ?>" />
								</div>
								<div class="top-margin">
									<label>Authority effect</label>
									<textarea type="text" rows="6" name="auth_effect" id="auth_effect" class="form-control" required><?php echo $AuthEffect;?></textarea>
								</div>
								<div class="top-margin">
									<label>Authority desc</label>
									<textarea type="text" rows="6" name="auth_desc" id="auth_desc" class="form-control" required><?php echo $AuthDesc;?></textarea>
								</div>
                                <div class="top-margin">
									<label>Election</label>
									<input type="text" name="auth_election" id="auth_election" class="form-control" required value="<?php echo $AuthElection;?>"></input>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-12 text-right">
										<button class="btn btn-action" name="submit" type="submit">Save Changes</button>
									</div>
								</div>
							</form>
						</div>
					</div><br><br>
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	
	<?php include "includes/footer.php"; ?>	

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>