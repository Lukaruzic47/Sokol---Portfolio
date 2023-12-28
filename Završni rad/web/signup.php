<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$description = "Wiki website for Sci-fi games";
		$keywords = "Stellaris, wiki, wikipedia, info, Sci-Fi, games";
		$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
		$bootstrap = "assets/css/bootstrap.min.css";
		$bootstrap2 = "assets/css/bootstrap-theme.css";
		$css = "assets/css/style.css";
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
			<li class="active">Registration</li>
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
							<p class="text-center text-muted">Already have an account? Log in <a href="login.php">Here</a></p>
							<hr>

							<form action="signupSave.php" method="POST" enctype="multipart/form-data">
								<div class="top-margin">
									<label>First Name <span class="text-danger">*</label>
									<input type="text" class="form-control" name="name" id="name" required>
								</div>
								<div class="top-margin">
									<label>Last Name <span class="text-danger">*</label>
									<input type="text" class="form-control" name="last" id="last" required>
								</div>
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email" id="email" required>
								</div>
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="lozinka1" id="lozinka1" required>
									</div>
									<div class="col-sm-6">
										<label>Confirm Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="lozinka2" id="lozinka2" required>
									</div>
								</div>

								<hr>

								<div class="row">
									
									<div class="col-lg-8">
										<!--<label class="checkbox">
											<input type="checkbox"> 
											I've read the <a href="page_terms.html">Terms and Conditions</a>
										</label>-->                     
									</div>
									
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" name="submit" type="submit">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div><br>
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