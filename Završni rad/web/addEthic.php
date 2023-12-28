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
			<li class="active">New Ethic</li>
		</ol>
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Add Ethic</h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Add a new Ethic</h3>

							<form method="post" action="addEthicSave.php" enctype="multipart/form-data">
								<div class="top-margin">
									<label>Ethic name</label>
									<input type="text" name="ethic_name" id="ethic_name" class="form-control" required>
								</div>
                                <div class="top-margin">
									<label>Ethic icon</label>
									<input type="file" name="ethic_icon" id="ethic_icon" class="form-control" required></input>
								</div>
								<div class="top-margin">
									<label>Ethic effect</label>
									<textarea type="text" rows="6" cols="26" name="ethic_effect" id="ethic_effect" class="form-control" required></textarea>
								</div>
								<div class="top-margin">
									<label>Ethic description</label>
									<textarea type="text" rows="6" cols="26" name="ethic_desc" id="ethic_desc" class="form-control" required></textarea>
								</div>
                                <div class="top-margin">
									<label>Ethic opposite</label>
									<input type="text" name="ethic_opposite" id="ethic_opposite" class="form-control" required>
								</div><hr>
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