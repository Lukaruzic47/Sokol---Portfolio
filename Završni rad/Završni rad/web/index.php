<?php
    session_start();
?>   
<!DOCTYPE html>
<html lang="hr">
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
	<script>
        function porukaPrijava(){
            alert("You have to sign in to add comments.");
        }
    </script>
</head>

<body class="home">
	<?php include "includes/zaglavlje.php"; ?>
	<header id="head" class="head-bg-index">
		<div class="container">
			<div class="row">
				<h1 class="lead">STELLARIS ONLINE WIKIPEDIA</h1>
				<p><a class="btn btn-default btn-lg" role="button" href="https://stellaris.paradoxwikis.com/Stellaris_Wiki">FIND OUT MORE</a> <a class="btn btn-action btn-lg" href="https://store.steampowered.com/app/281990/Stellaris/" role="button">DOWNLOAD STELLARIS NOW</a></p>
			</div>
		</div>
	</header>

	<div class="container text-center">
		<br> <br>
		<h2 class="thin" >Find everything you want to know in one place</h2>
		<p class="text-muted" style="margin-bottom: 56px;">
			Detailed Stellaris database with every detail and game mechanic explained right here
		</p>
	</div>
	
	<div class="jumbotron top-space">
		<div class="container">
			
			<h3 class="text-center thin">Stellaris Main Cathegories</h3>
			<div class="row">
				<a href="technology.php">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa fa-flask"></i>Technology</h4></div>
						<div class="h-body text-center technology">
							<p>Technology in Stellaris is divided into 3 research areas with each area corresponding with one of the research resources: Engineering research, Physics Research and Society research. Each of the ~300 techs belongs to one of 12 subcategories divided between the areas</p>
						</div>
					</div>
				</a>
				<a href="traditions.php">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa fa-gavel"></i>Traditions</h4></div>
						<div class="h-body text-center technology">
							<p>Traditions represent the socio-cultural evolution of an empire as it expands and develops and represent abilities or bonuses unlocked with the unity resource. Traditions help define an empire by allowing the adoption of traditions trees that suit its particular play-style</p>
						</div>
					</div>
				</a>
				<a href="expansions.php">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa fa-puzzle-piece"></i>Expansions</h4></div>
						<div class="h-body text-center technology">
							<p>Downloadable content (DLC) is content built by Paradox Development Studio as an extension or add-on to Stellaris. An expansion DLC is normally accompanied by a free patch that gives players most of the new content as not to hinder the playability of the game </p>
						</div>
					</div>
				</a>
				<!--
				<a href="portraits.php">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa fa-address-book"></i>Species Portraits</h4></div>
						<div class="h-body text-center technology">
							<p>Habitable planets have the potential of developing any kind of intelligent life that could develop technologically. Sometimes, such beings reach a crucial point in their development that allows them access to FTL technology and, with that, the ability to become an interstellar empire </p>
						</div>
					</div>
				</a>
				-->
				<a href="origin.php">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa-solid fa-bacteria"></i>Origins</h4></div>
						<div class="h-body text-center technology">
							<p>The Origin represents the background of a species before it unified itself into an empire. There are more than one way to start a civilization, some expected, some less. Origins could be affected by other civilizations or forgotten history of their own people.</p>
						</div>
					</div>
				</a>
				<!--
					<a href="origin.php">
						<div class="col-md-3 col-sm-6 highlight">
							<div class="h-caption"><h4><i class="fa-solid fa-book"></i>Civics</h4></div>
							<div class="h-body text-center technology">
								<p>Civics represent the principles of life within an empire and are primarily limited by the authority and ethics an empire possesses. Civisc are heavily influenced by the empire ethics and authority type.</p>
							</div>
						</div>
					</a>
				-->
				<a href="authority.php">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa-solid fa-crown"></i>Government & Ethics</h4></div>
						<div class="h-body text-center technology">
							<p>An empire's authority determines how power is transferred in the government. For almost all authority types, policies such as voting rights and leadership affect who can get elected.</p>
						</div>
					</div>
				</a>
				<a href="https://store.steampowered.com/app/281990/Stellaris/">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption"><h4><i class="fa fa-download "></i></i>Download</h4></div>
						<div class="h-body text-center technology">
							<p>This link will redirect you to Steam webstore where you first have to purchase the game to be able to download it and than finally play it. Good luck in the playing field!</p>
						</div>
					</div>
				</a>
			</div>
		
		</div>
	</div>

	
	<div class="comment-container">
		<h2 class="text-center top-space">Site Comments</h2>
		<br><br>
			<div class="comment-border">
					<?php
						require_once "includes/baza.php";

						$baza = new Baza();

						$upit = "SELECT komentar.komentar_id, datum_unosa_komentara, tekst_komentar, korisnik.korisnik_id, header, korisnicko_ime from komentar INNER JOIN korisnik on komentar.korisnik_id = korisnik.korisnik_id order by datum_unosa_komentara DESC";

						$upitRezultat = $baza->dohvatiDB($upit);

						while($rez = $upitRezultat->fetch_array()){
							echo "<div class='comment'>";
							echo "<h3>{$rez['header']}</h3>";
							echo "<p>{$rez['tekst_komentar']}</p><br/>";
							echo "<p class='text-muted'>{$rez['korisnicko_ime']}, {$rez['datum_unosa_komentara']}</p>";
							echo "</div>";
						}
					?>	
			</div>  
		<div class="middle-button">
			
			<?php
			if($_SESSION["status"] == 1){
				echo "<a class='btn btn-action btn-lg comment-btn' href='addComment.php' role='button'>Comment</a>";
			}
			else{
				echo "<a class='btn btn-action btn-lg comment-btn' onclick='porukaPrijava(); return false' href='#' role='button'>Comment</a>";
			}
			?>
		</div>
	</div>
</div>
	
	
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
	
			</div>
		</div>
	</section>

	<?php include "includes/footer.php"; ?>	
	
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	
</body>
</html>