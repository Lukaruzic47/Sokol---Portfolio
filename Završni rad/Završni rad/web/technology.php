<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
	<?php
		$description = "Stellaris technology details";
		$keywords = "Stellaris, wiki, wikipedia, info, tech, technology, physics, engineering, society, Sci-Fi, games";
		$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
		include "includes/head.php";

		if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
			echo "<script src='assets/js/technologyAdmin.js'></script>";
		}
		else{
			echo "<script src='assets/js/technology.js'></script>";
		}
				
	?>
</head>

<body class="home">
	<?php include "includes/zaglavlje.php"; ?>
	
	<header id="head" class="head-bg-tech">
		<div class="container">
			<div class="row">
				<h1 class="lead">TECHNOLOGY MECHANICS</h1>
			</div>
		</div>
	</header>

	<!-- Intro -->
	<main>
		<!-- container -->
		<div class="container">

			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Technology</li>
			</ol>

			<div >
				
				<!-- Article main content -->
				<article class="col-sm-12 maincontent">
					<header class="page-header">
						<h1 class="page-title">Technology</h1>
					</header>
					
					<p>
					Technology in Stellaris is divided into 3 research areas with each area corresponding with one of the research resources: Engineering research Engineering, Physics Research Physics and Society research Society. Additionally, each of the ~300 techs belongs to one of 12 subcategories divided between the areas (most appearing pre-dominantly in one area though not exclusively). <br><br> The user interaction aspect utilizes a card shuffle approach rather than a traditional tech tree presentation, thereby introducing an element of semi-randomness into the system 
					</p>
					<br>

					<table class="col-sm-12 table-responsive th-gumb" style="margin-bottom: 100px;">
					<thead>
							<tr>
								<th class="th-gumb">Icon</th>
								<th class="middle-button" onclick="changeClass(this)" id="0"><p style="user-select: none;">Technology  <i class="fa-solid fa-sort" id="sort0" data-sort="tech_name"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="1"><p style="user-select: none;">Cathegory  <i class="fa-solid fa-sort" id="sort1" data-sort="tech_category_name"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="2"><p style="user-select: none;">Description  <i class="fa-solid fa-sort" id="sort2" data-sort="tech_desc"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="3"><p style="user-select: none;">Effect  <i class="fa-solid fa-sort" id="sort3" data-sort="tech_effect"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="4"><p style="user-select: none;">Cost  <i class="fa-solid fa-sort" id="sort4" data-sort="tech_cost"></i></p></th>
								
								<th class="middle-button" onclick="changeClass(this)" id="5"><p style="user-select: none;">Rarity  <i class="fa-solid fa-sort" id="sort5" data-sort="tech_rarity"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="6"><p style="user-select: none;">DLC  <i class="fa-solid fa-sort" id="sort6" data-sort="dlc_type_name"></i></p></th>

								<?php
								
								if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
									echo "<th class='th-gumb'><p style='user-select: none;'>Admin tools</p></th>";
								}
								else{
									
								}

								?>
							</tr>
						</thead>
						<tbody class="table th-gumb" id="dataTech">
							
						</tbody>
						<tfoot>
						<?php		
						if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
						echo    "<td colspan='9'>
									<a class='btn btn-action btn-lg btn-block' href='addTech.php' role='button'>Add new</a>
							    </td>";
						}
						else{
										
						}
					?>
						</tfoot>
					</table>

				</article>
				<!-- /Article -->

			</div>
		</div>	<!-- /container -->
	</main>
	<!-- /Highlights -->

	<?php include "includes/footer.php"; ?>	
	
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	
</body>
</html>