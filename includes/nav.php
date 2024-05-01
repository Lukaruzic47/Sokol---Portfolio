<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="../css/nav.css" />
		<script
			src="https://kit.fontawesome.com/f31be06999.js"
			crossorigin="anonymous"
		></script>

		<title>Just Navigation</title>
	</head>
	<body>
		<div class="nav-placeholder"></div>
		<div class="nav-top" id="nav-top">
			<section class="navigation-include">
				<nav>
					<ul class="logo">
						<a href="">TIN JOSIP SOKOL</a>
					</ul>
				</nav>
				<nav class="kmetovi">
					<ul class="kmet">
						<a href="">WELCOME</a>
					</ul>
					<div class="dropdown">
						<ul class="kmet">
							<a id="portfolio"
								>PORTFOLIO
								<i id="arrow" class="fas fa-caret-down"></i>
							</a>
	
							<div class="dropdown-content">
								<li><a href="../colorGallery.php">MAIN GALLERY</a></li>
								<li><a href="../blackWhiteGallery.php">BLACK & WHITE GALLERY</a></li>
								<li><a href="">COVER ARTS</a></li>
								<li><a href="">MUSIC SPOTS</a></li>
							</div>
						</ul>
					</div>
					<ul class="kmet">
						<a href="">ABOUT ME</a>
					</ul>
					<ul class="kmet">
						<a href="addImage.php">ADD NEW</a>
					</ul>	
					<div class="hamburger-wrapper">
						<div class="hamburger-menu"></div>
						<div id="bitchborgar" class="clickable-area"></div>
					</div>
				</nav>
			</section>
			<hr class="fullWidth" />
		</div>


		<main class="mobile-navigation">
			<div class="logoikona">
				<ul>
					<a href="">TIN JOSIP SOKOL</a>
				</ul>
				<ul>
					<span id="x" class="x"></span>
				</ul>
			</div>
			<div class="elementiNavigacije">
				<ul>
					<a href="#">WELCOME</a>
				</ul>
				<ul>
					<li id="portfolio-mobile">
						<a href="#">PORTFOLIO</a>
						<i id="arrow-dva" class="fas fa-caret-down"></i>
					</li>
					<div class="dropdown-mobile">
						<li><a href="../colorGallery.php">MAIN GALLERY</a></li>
						<li><a href="../blackWhiteGallery.php">BLACK & WHITE GALLERY</a></li>
						<li><a href="">COVER ARTS</a></li>
						<li><a href="">MUSIC SPOTS</a></li>
					</div>
				</ul>
				<ul class="kmet">
					<a href="addImage.php">ADD NEW</a>
				</ul>	
				<ul>
					<a href="#">ABOUT ME</a>
				</ul>
			</div>
		</main>

		<script src="../js/Navigation.js"></script>
	</body>
</html>
