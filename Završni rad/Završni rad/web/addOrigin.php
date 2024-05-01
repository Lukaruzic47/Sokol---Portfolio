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
			<li class="active">New Origin</li>
		</ol>
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Add Origin</h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Add a new Origin</h3>

							<form method="post" action="addOriginSave.php" enctype="multipart/form-data">
								<div class="top-margin">
									<label>Origin name</label>
									<input type="text" name="origin_name" id="origin_name" class="form-control" required>
								</div>
                                <div class="top-margin">
									<label>Origin icon</label>
									<input type="file" name="origin_icon" id="origin_icon" class="form-control" required></input>
								</div>
								<div class="top-margin">
									<label>Origin effect</label>
									<textarea type="text" cols="24" rows="6" name="origin_effect" id="origin_effect" class="form-control" required></textarea>
								</div>
                                <div class="top-margin">
									<label>Origin requirements</label>
									<textarea type="text" cols="24" rows="6" name="origin_requirements" id="origin_requirements" class="form-control" required></textarea>
								</div>
								<div class="top-margin">
									<label>DLC</label>
									<select name="dlc_id" id="dlc_id" class="form-control">
                                        <?php
                                            require_once "includes/baza.php";
                                            $baza = new Baza();
                                            $upit = "select dlc_id, dlc_name from dlc order by dlc_name desc";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                echo "<option value='{$red["dlc_id"]}'>{$red["dlc_name"]}</option>";
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
	
	<?php include "includes/footer.php"; ?>	

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>