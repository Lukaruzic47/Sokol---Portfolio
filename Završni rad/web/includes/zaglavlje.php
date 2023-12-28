<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="logo" href="index.php"><img class="logo-img" src="assets/images/CrystalData-logo.png" alt="Logo stranice"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li class="dropdown">
						<a href="index.php" class="dropdown-toggle" data-toggle="dropdown">Cathegories <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="technology.php">Technology</a></li>
							<li><a href="traditions.php">Traditions</a></li>
							<!-- <li><a href="portraits.php">Species Portraits</a></li> za kasnije ostavi -->
							<li><a href="expansions.php">Expansions</a></li>
							<li><a href="origin.php">Origins</a></li>
							<!-- <li><a href="civic.php">Civics</a></li> -->
							<li><a href="Authority.php">Government & Ethics</a></li>
						</ul>
					</li>
					<li><a href="expansions.php" >Expansions</a></li>
					<!-- <li><a class="btn" href="login.php">SIGN UP / LOG IN</a></li> -->
					<?php
						if(!isset($_SESSION["status"])){
							$_SESSION["status"] = "undefined";
						}
						if(!isset($_SESSION["korisnicko_ime"])){
							$_SESSION["korisnicko_ime"] = "undefined";
						}
						if($_SESSION["status"] == 1){
							echo "<li><a>Welcome " . $_SESSION["korisnicko_ime"] . " " . "</a></li>";
							echo "<li><a class='btn' href='includes/session/zatvori-sesiju.php'>SIGN OUT</a></li>"; 
							echo "</div>";
						}
						else{
							echo "<li><a class='btn' href='login.php'>SIGN UP / LOG IN</a></li>";
						}
           			?>		
				</ul>
			</div>
		</div>
	</div>