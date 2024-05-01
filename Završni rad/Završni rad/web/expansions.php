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
		echo "<script src='assets/js/expansionsAdmin.js'></script>";
	}
	else{
		echo "<script src='assets/js/expansions.js'></script>";
	}
			
?>
<!-- <script src="assets/js/expansions.js"></script> -->
</head>

<body>

<?php include "includes/zaglavlje.php"; ?>

	<header id="head" class="head-bg-dlc">
		<div class="container">
			<div class="row">
				<h1 class="lead">DOWNLOADABLE CONTENT (DLC)</h1>
			</div>
		</div>
	</header>
	<main>
		<!-- container -->
		<div class="container">

			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Expansions</li>
			</ol>

			<div style="background-color: #F7F5F4;">
				
				<!-- Article main content -->
				<article class="col-sm-12 maincontent">
					<header class="page-header">
						<h1 class="page-title">DLC</h1>
					</header>
					
					<p>
					Downloadable content (DLC) is content built by Paradox Development Studio as an extension or add-on to Stellaris. They are modular in nature, which means that a player can choose to play with or without a given DLC by checking them out at the launch menu. An expansion DLC is normally accompanied by a free patch that gives players most of the new content as not to hinder the playability of the game. As such, most DLCs are seen as optional content for players who wish to have a better gaming experience in exchange for some monetary support. </br></br>  Multiplayer games also benefit from this compatibility, that is to say if the host has a gameplay DLC (expansions and flavor packs) the player does not, the game acts as if the player has it. 
					</p>
					<br>

					<table class="col-sm-12 table th-gumb">
						<thead>	
							<tr>
								<th class="th-gumb"></div><p>Icon</p></th>
								<th class="middle-button" onclick="changeClass(this)" id="0"><p style="user-select: none;">Name  <i class="fa-solid fa-sort" id="sort0" data-sort="DLC_name"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="1"><p style="user-select: none;">Release date  <i class="fa-solid fa-sort" id="sort1" data-sort="DLC_release_date"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="2"><p style="user-select: none;">Type  <i class="fa-solid fa-sort" id="sort2" data-sort="DLC_type_name"></i></p></th>

								<?php
								
								if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
									echo "<th class='th-gumb'><p style='user-select: none;'>Admin tools</p></th>";
								}
								else{
									
								}

								?>
							</tr>
						<thead>	
						<tbody class="table th-gumb" id="data">
							<!-- kada server vrati podatke ovdje ih ugradi JavaScript --> 
						</tbody>
							
						<script>
							sort = "<?php echo $sort ?>";
						</script>
					<tfoot>

					<?php		
						if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
						echo    "<td colspan='5'>
									<a class='btn btn-action btn-lg btn-block' href='addDlc.php' role='button'>Add new</a>
							    </td>";
						}
						else{
										
						}
					?>
					</tfoot>
					</table>				
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