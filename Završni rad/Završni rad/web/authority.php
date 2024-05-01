<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
	$description = "Web stranica na kojoj možete pronaći sve podatke vezane uz Sci-Fi igre";
	$keywords = "Stellaris, wiki, wikipedia, info, Sci-Fi, DLC, Expansions, games";
	$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
	include "includes/head.php";

if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
		echo "<script src='assets/js/authorityAdmin.js'></script>";
	}
else{
		echo "<script src='assets/js/authority.js'></script>";
	}

if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
		echo "<script src='assets/js/ethicsAdmin.js'></script>";
	}
else{
		echo "<script src='assets/js/ethics.js'></script>";
	}
?>
</head>

<body>

<?php include "includes/zaglavlje.php"; ?>

	<header id="head" class="head-bg-auth">
		<div class="container">
			<div class="row">
				<h1 class="lead">GOVERNMENT AND ETHICS</h1>
			</div>
		</div>
	</header>
	<main>
		<!-- container -->
		<div class="container">

			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Government</li>
			</ol>

			<div style="background-color: #F7F5F4;">
				
				<!-- Article main content -->
				<article class="col-sm-12 maincontent">
					<header class="page-header">
						<h1 class="page-title">Authority</h1>
					</header>
					
					<p>
					Every empire has a government that provides different benefits. The name of a government is automatically determined according to its Ethics, Authority, and Civics. 
					</p>
					<br>

					<!-- Authority table -->

					<table id="DLCTable" class="col-sm-12 table-responsive th-gumb">
						<thead>	
							<tr>
								<th class="th-gumb"></div><p>Icon</p></th>
								<th class="middle-button" onclick="changeClass(this)" id="0"><p style="user-select: none;">Name  <i class="fa-solid fa-sort" id="sort0" data-sort="authority_name"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="1"><p style="user-select: none;">Effect  <i class="fa-solid fa-sort" id="sort1" data-sort="authority_effect"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="2"><p style="user-select: none;">Description  <i class="fa-solid fa-sort" id="sort2" data-sort="authority_desc"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="3"><p style="user-select: none;">Election  <i class="fa-solid fa-sort" id="sort3" data-sort="authority_election"></i></p></th>

								<?php
								
								if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
									echo "<th class='th-gumb'><p style='user-select: none;'>Admin tools</p></th>";
								}
								else{
									
								}

								?>
							</tr>
						<thead>	
						<tbody class="table th-gumb" id="dataAuth">
							<!-- kada server vrati podatke ovdje ih ugradi JavaScript --> 
						</tbody>
							
						<script>
							sort = "<?php echo $sort ?>";
						</script>
					<tfoot>
					<?php		
						if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
						echo    "<td colspan='6'>
									<a class='btn btn-action btn-lg btn-block' href='addAuthority.php' role='button'>Add new</a>
							    </td>";
						}
						else{
										
						}
					?>
					</tfoot>
					</table></br></br>
					
					<!-- Edicts table -->
					
					<header class="page-header">
						<h1 class="page-title">Ethics</h1>
					</header>
					<p>
					Ethics are the guiding principles of an empire and its people and determine an empire or pop's favored courses of action and responses to situations. Empires and individual populations don't always align ethically which can cause internal strife in large nations. AI species follow the same ethics rules and their behavior is heavily dependent on the ethics they follow. Naturally, a Militarist Xenophobe alien empire will react very differently to the player than a Pacifist Xenophile. AI empires will, however, compromise on their ethics if circumstances are dire enough, for instance, if threatened with imminent conquest.<br><br>

					Every empire except Fallen Empires can have either three moderate ethics or one fanatic and one moderate ethic. Fallen Empires have only one fanatic ethic. Pops have only one moderate ethic each. 
					</p>
					<table id="DLCTable" class="col-sm-12 table th-gumb">
						<thead>	
							<tr>
								<th class="th-gumb"></div><p>Icon</p></th>
								<th class="middle-button" onclick="changeEthicClass(this)" id="4"><p style="user-select: none;">Name  <i class="fa-solid fa-sort" id="sort4" data-sort="ethic_name"></i></p></th>

								<th class="middle-button" onclick="changeEthicClass(this)" id="5"><p style="user-select: none;">Effect  <i class="fa-solid fa-sort" id="sort5" data-sort="ethic_effect"></i></p></th>

								<th class="middle-button" onclick="changeEthicClass(this)" id="6"><p style="user-select: none;">Description  <i class="fa-solid fa-sort" id="sort6" data-sort="ethic_desc"></i></p></th>

								<th class="middle-button" onclick="changeEthicClass(this)" id="7"><p style="user-select: none;">Opposite  <i class="fa-solid fa-sort" id="sort7" data-sort="ethic_opposite"></i></p></th>

								<?php
								
								if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
									echo "<th class='th-gumb'><p style='user-select: none;'>Admin tools</p></th>";
								}
								else{
									
								}

								?>
							</tr>
						<thead>	
						<tbody class="table th-gumb" id="dataEthic">
							<!-- kada server vrati podatke ovdje ih ugradi JavaScript --> 
						</tbody>
						<script>
							sort = "<?php echo $sort ?>";
						</script>
						<tfoot>
						<?php		
							if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
							echo    "<td colspan='6'>
										<a class='btn btn-action btn-lg btn-block' href='addEthic.php' role='button'>Add new</a>
									</td>";
							}
							else{
											
							}
						?>
						</tfoot>
					</table><br><br>
				</article>
			</div>
		</div>	
	</main>

	<?php include "includes/footer.php"; ?>	

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>