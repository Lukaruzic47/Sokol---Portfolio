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
			<li class="active">New DLC</li>
		</ol>
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Add DLC</h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Add a new DLC</h3>

							<form method="post" action="DLC-save.php" enctype="multipart/form-data">
								<div class="top-margin">
									<label>DLC name</label>
									<input type="text" name="dlc_name" id="dlc_name" class="form-control" required>
								</div>
                                <div class="top-margin">
									<label>DLC icon</label>
									<input type="file" name="dlc_icon" id="dlc_icon" class="form-control" required></input>
								</div>
								<div class="top-margin">
									<label>DLC release date</label>
									<input type="date" name="dlc_release_date" id="dlc_release_date" class="form-control" required></input>
								</div>
								<div class="top-margin">
									<label>DLC type</label>
									<select name="dlc_type_id" id="dlc_type_id" class="form-control">
                                        <?php
                                            require_once "includes/baza.php";
                                            $baza = new Baza();
                                            $upit = "select dlc_type_name, dlc_type_id from dlc_type";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                echo "<option value='{$red["dlc_type_id"]}'>{$red["dlc_type_name"]}</option>";
                                            }
                                            
                                        ?>
                                    </select>
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
	<footer>
		<?php include "includes/footer.php"; ?>	
	</footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>