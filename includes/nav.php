<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet" />
<script src="https://kit.fontawesome.com/f31be06999.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/nav.css" />
<div class="nav-placeholder"></div>
<div class="nav-top" id="nav-top">
	<section class="navigation-include">
		<nav>
			<ul class="logo">
				<a href="index.php">TIN JOSIP SOKOL</a>
			</ul>
		</nav>
		<nav class="kmetovi">
			<ul class="kmet">
				<a href="index.php">WELCOME</a>
			</ul>
			<div class="dropdown">
				<ul class="kmet">
					<a id="portfolio">PORTFOLIO
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
			<?php
			// provjerava je li korisnicko ime postavljeno i ako nije postavlja ga na null
			if (!isset($_SESSION["status"]) || !isset($_SESSION["korisnicko_ime"])) {
				$_SESSION["status"] = 0;
				$_SESSION["korisnicko_ime"] = null;
			}

			// ako je korisnik prijavljen prikazi logout i ostale opcije
			if (isset($_SESSION['status'])) {
				if ($_SESSION['status'] == 1) {
					echo "<ul class='kmet'><a href='addImage.php'>ADD NEW</a></ul>";
					echo "<ul class='kmet'><a href='includes/logout.php'>LOGOUT</a></ul>";
				}
			}
			?>
			<div class="hamburger-wrapper">
				<div class="hamburger-menu"></div>
				<div id="bitchborgar" class="clickable-area"></div>
			</div>
		</nav><br>
	</section>
	<nav class="nav3">
		<?php
		if (isset($_SESSION['status'])) {
			if ($_SESSION['status'] == 1) {
				echo "<p>Dobrodošli " . $_SESSION['korisnicko_ime'] . "</p>";
			}
		}
		?>

	</nav>
	<hr class="fullWidth" />
</div>


<div class="mobile-navigation">
	<div class="logoikona">
		<ul>
			<a href="index.php">TIN JOSIP SOKOL</a>
		</ul>
		<ul>
			<span id="x" class="x"></span>
		</ul>
	</div>
	<div class="elementiNavigacije">
		<ul>
			<a href="index.php">WELCOME</a>
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
		<ul>
			<a href="#">ABOUT ME</a>
		</ul>
		<?php
		if (isset($_SESSION['status'])) {
			if ($_SESSION['status'] == 1) {
				echo "<ul><a href='addImage.php'>ADD NEW</a></ul>";
				echo "<ul><a href='includes/logout.php'>LOGOUT</a></ul>";
				echo "<ul><p class='welcome'>Dobrodošli " . $_SESSION['korisnicko_ime'] . "</p></ul>";
			}
		}
		?>

	</div>
</div>

<script src="../js/Navigation.js"></script>