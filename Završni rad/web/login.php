<!DOCTYPE html>
<html lang="en">
<head>
		<?php
			$description = "Wiki website for Sci-fi games";
			$keywords = "Stellaris, wiki, wikipedia, info, Sci-Fi, games";
			$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
			include "includes/head.php";
		?>
	</head>

<body>

	<?php include "includes/zaglavlje.php"; ?>

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">User access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Log in</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Log in to your account</h3>
							<p class="text-center text-muted">Dont have an account? Create one <a href="signup.php">Here</a></p>
							<hr>
							
							<form method="post" action="includes/session/otvori-sesiju.php" method="POST">
								<div class="top-margin">
									<label for="korisnicko_ime">Username</label>
									<input type="text" name="korisnicko_ime" id="korisnicko_ime" class="form-control" required autofocus>First name & last name</input>
								</div>
                                <div class="top-margin">
									<label>Password</label>
									<input type="password" name="lozinka" id="lozinka" class="form-control" required>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-12 text-right">
										<button class="btn btn-action" name="submit" type="submit">Log in</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	<footer style="margin-top:140px;">
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