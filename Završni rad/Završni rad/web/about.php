<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
	$description = "Web stranica na kojoj možete pronaći sve podatke vezane uz Sci-Fi igre";
	$keywords = "Stellaris, wiki, wikipedia, info, Sci-Fi, games";
	$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
	include "includes/head.php";
	// gotova stranica
?>
</head>

<body>
	<div id="page-container">
		<div id="content-wrap">
	<?php include "includes/zaglavlje.php"; ?>

	<header id="head" class="secondary"></header>

	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">About</li>
		</ol>

		<div class="row">
			
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">About Me</h1>
				</header>
				<h3>Who am I?</h3>
				<p>Hi, my name is Luka, I am 4th grade student in Elektrostrojarska škola Varaždin. I am studying Web development and this whole website is my work. I hope you have a pleasant experience and that you will like it.</p>
				<p>I am 18 years old, living near Varaždin. And one day i hope to be a great programmer.</p>
				<h3>What are my hobbies</h3>
				<p>I like to play guitar, football, drive a car, play videogames and code websites. This website is dedicated to one of the games i like to play and that is "Stellaris". Other than a great programmer I hope to be a great guitarist aswell.</p>
				<h3>What are my goals</h3>
				<p>My goal is to finish studying programming at college and find a well paid job that I will really like. I hope to learn programming in Java, C#, C++ and Python. Of course i would still like to be a full stack web developer aswell.</p>
				<h3>Feedback</h3>
				<p>If anything goes wrong on this website or doesn't work as intended, keep me updated on my mail or comments found on the main page. If everything works fine, you can compliment me about it if you want, it will help to cheer me up. </p><br><br>
				
			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">

				<div class="widget">
					<h4>My contact</h4>
					<ul class="list-unstyled list-spaces">
						<li>E-mail:</a><br><span class="small text-muted">l.ruzic47@gmail.com</span></li>
						<li>Phone number:</a><br><span class="small text-muted">095 849 2451</span></li>
						<li>Location:</a><br><span class="small text-muted">Elektrostrojarska škola Varaždin</span></li>
						<li>Post:</a><br><span class="small text-muted">42000 Varaždin</span></li>
						<li>Name:</a><br><span class="small text-muted">Luka Ružić</span></li>
					</ul>
				</div>
			</aside>
		</div>
	</div>	
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