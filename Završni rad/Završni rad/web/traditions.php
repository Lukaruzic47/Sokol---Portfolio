<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
	<?php
		$description = "Wiki website for Sci-fi games";
		$keywords = "Stellaris, Traditions, Tradition trees, wiki, wikipedia, info, Sci-Fi, games";
		$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
		include "includes/head.php";
	?>
</head>

<body class="home">
	<?php include "includes/zaglavlje.php"; ?>
	<!-- Header -->
	<header id="head" class="head-bg-traditions">
		<div class="container">
			<div class="row">
				<h1 class="lead">TRADITION MECHANICS</h1>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<main>
		<!-- container -->
		<div class="container">

			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Traditions</li>
			</ol>

			<div >
				
				<!-- Article main content -->
				<article class="col-sm-12 maincontent">
					<header class="page-header">
						<h1 class="page-title">Traditions</h1>
					</header>
					
					<p>
					Traditions represent the socio-cultural evolution of an empire as it expands and develops and represent abilities or bonuses unlocked with the Unity.png unity resource. Traditions help define an empire by allowing the adoption of traditions trees that suit its particular play-style. Completing a tree allows the empire to pick an Ap slot available.png ascension perk to further enhance themselves. <br> Traditions are grouped into tradition trees with 5 traditions each, as well as a bonus for adopting the tradition tree and one for finishing it. Each empire can select up to 7 tradition trees.
					</p>
					<br>

					<table id="DLCTable" class="col-sm-12 table-responsive th-gumb" style="margin-bottom: 100px;">
						<tr>
							<th class="th-gumb"><p style="padding:10px;font-size:16px;user-select:none;">Tree Name</p></th>
							<th class="th-gumb"><p style="padding:10px;font-size:16px;user-select:none;">Name</p></th>

							<th class="th-gumb"><p style="padding:10px;font-size:16px;user-select:none;">Tradition Effect</p></th>

							<th class="th-gumb"><p style="padding:10px;font-size:16px;user-select:none;">Starting Effect</p></th>

							<th class="th-gumb" ><p style="padding:10px;font-size:16px;user-select:none;">Completion Effect</p></th>

							<!-- Admin tools otkazan za buduću verziju aplikacije
							<th class="th-gumb"><p style="padding:10px;font-size:16px;user-select:none;">Admin tools</p></th>
							-->

						</tr>
						<script>
							sort = "<?php echo $sort ?>";
						</script>
					<?php
						require_once "includes/baza.php";
						$TraditionImg = "assets/images/Stellaris_slike/Traditions/";
						$TreeImg = "assets/images/Stellaris_slike/Tradition_Trees/";

						$baza = new Baza();
						$i = 0;

						$upitKategorije = "SELECT tradition_name, tradition_id, tradition_icon, tradition_effect, tradition_tree_name, tradition_tree_icon, tradition_tree_starting_effect, tradition_tree_completion_effect from traditions INNER JOIN traditiontrees on traditions.tradition_tree_id = traditiontrees.tradition_tree_id";

						echo $sort;

						$rezultatKategorije = $baza->dohvatiDB($upitKategorije);

						while($redKategorije = $rezultatKategorije->fetch_array()){
							if($i == 0){
								echo "<tr><td rowspan='5'><img src='{$TreeImg}{$redKategorije["tradition_tree_icon"]}'/><br/>{$redKategorije["tradition_tree_name"]}</td><td ><img src='{$TraditionImg}{$redKategorije["tradition_icon"]}'/><br/>{$redKategorije["tradition_name"]}</td><td>{$redKategorije["tradition_effect"]}</td><td rowspan='5'>{$redKategorije["tradition_tree_starting_effect"]}</td><td rowspan='5'>{$redKategorije["tradition_tree_completion_effect"]}</td>";
								
								/* Editiranje i brisanje otkazani za buduću verziju aplikacije
								"<td rowspan='5' class='th-gumb'><a class='btn ad-tool-btn btn-action' href='index.php' role='button'>Edit</a><a class='btn ad-tool-btn btn-action' href='index.php'  role='button'>Delete</a></td></tr>";
								*/
								
								$i++;
							}
							else if($i == 4){
								$i = 0;
								echo "<tr><td ><img src='{$TraditionImg}{$redKategorije["tradition_icon"]}'/><br/>{$redKategorije["tradition_name"]}</td><td>{$redKategorije["tradition_effect"]}</td></tr>";
							}
							else{
								echo "<tr><td ><img src='{$TraditionImg}{$redKategorije["tradition_icon"]}'/><br/>{$redKategorije["tradition_name"]}</td><td>{$redKategorije["tradition_effect"]}</td></tr>";
								$i++;
							}
						}
						
					?>
					<!--  Dodavanje tradicija otkazano za buduću verziju aplikacije

						<td colspan="6">
							<a class='btn btn-action btn-lg btn-block' href='addTradition.php' role='button'>Add new</a>
						</td>
					-->
					</table>

				</article>
				<!-- /Article -->
			</div>
		</div>	<!-- /container -->
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