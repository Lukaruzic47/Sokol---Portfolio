<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
	<?php
		$description = "Stellaris origins explained";
		$keywords = "Stellaris, wiki, wikipedia, info, Sci-Fi, games";
		$title = "Crystal Data - Free Sci-Fi Game Wikipedia";
		include "includes/head.php";


	if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
		echo "<script src='assets/js/originAdmin.js'></script>";
	}
	else{
		echo "<script src='assets/js/origin.js'></script>";
	}
				
	?>
</head>

<body class="home">
	<?php include "includes/zaglavlje.php"; ?>

	<!-- Header -->
	<header id="head" class="head-bg-origins">
		<div class="container">
			<div class="row">
				<h1 class="lead">ORIGIN MECHANICS</h1>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<div class="container">

			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Origins</li>
			</ol>

			<div style="background-color: #F7F5F4;">
				
				<!-- Article main content -->
				<article class="col-sm-12 maincontent">
					<header class="page-header">
						<h1 class="page-title">Origins</h1>
					</header>
					
					<p>
					The Origin represents the background of a species before it unified itself into an empire. In games with randomly generated AI empire most Origins are unique, meaning only one empire with that origin can be generated. 
					</p>
					<br>

					<table class="col-sm-12 table-responsive th-gumb">
						<thead>	
							<tr>
								<th class="th-gumb"></div><p>Icon</p></th>
								<th class="middle-button" onclick="changeClass(this)" id="0"><p style="user-select: none;">Name  <i class="fa-solid fa-sort" id="sort0" data-sort="origin_name"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="1"><p style="user-select: none;">Effect  <i class="fa-solid fa-sort" id="sort1" data-sort="origin_effect"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="2"><p style="user-select: none;">Requirements  <i class="fa-solid fa-sort" id="sort2" data-sort="origin_requirements"></i></p></th>

								<th class="middle-button" onclick="changeClass(this)" id="3"><p style="user-select: none;">Required DLC  <i class="fa-solid fa-sort" id="sort3" data-sort="DLC_id"></i></p></th>
								<?php
								
								if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
									echo "<th class='th-gumb'><p style='user-select: none;'>Admin tools</p></th>";
								}
								else{
									
								}

								?>
							</tr>
						<thead>	
						<tbody class="table th-gumb" id="dataOrigin">
							<!-- kada server vrati podatke ovdje ih ugradi JavaScript --> 
						</tbody>
							
						<script>
							sort = "<?php echo $sort ?>";
						</script>
					<tfoot>
					<?php		
						if($_SESSION["status"] == 1 && $_SESSION["tip_id"] == 1){
						echo    "<td colspan='6'>
									<a class='btn btn-action btn-lg btn-block' href='addOrigin.php' role='button'>Add new</a>
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
</div>

	<?php include "includes/footer.php"; ?>	
	
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	
</body>
</html>