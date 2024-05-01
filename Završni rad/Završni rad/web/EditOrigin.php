<?php
require "includes/session/provjera-prijava.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        $description = "Web aplikacija za besplatno dijeljenje fotografija. Uredite vlastitu fotografiju";
        $keywords = "Uređivanje fotografija, tematske kategorije, dijeljenje fotografija";
        $title = "Edit DLC";
        include "includes/head.php";
    ?>
</head>
<body>
    <header>
        <?php include "includes/zaglavlje.php"; ?>
    </header>
    <header id="head" class="secondary"></header>
    <main>
            <?php
                require_once "includes/baza.php";
                $baza = new Baza();
                $Origin_id = $_GET["id"];
  
				/*  funkcija debug_to_console ispisuje vrijednost ID-a u konzolu
				function debug_to_console($data) {
					$output = $data;
					if (is_array($output))
						$output = implode(',', $output);
				
					echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
				}
				debug_to_console($dlc_id);
				*/

                $upit = "select origin_icon, origin_name, origin_effect, origin_requirements, dlc_id from origins where origin_id = $Origin_id";
                $rezultat = $baza->dohvatiDB($upit);
                while($red = $rezultat->fetch_array()){
                    $OriginIcon = $red["origin_icon"];
                    $OriginName = $red["origin_name"];
                    $OriginEffect = $red["origin_effect"];
                    $OriginRequ = $red["origin_requirements"];
                    $OriginDLC = $red["dlc_id"];
					$lokacija = "assets/images/Stellaris_slike/Origins/";
					$lokacija = $lokacija . basename($OriginIcon);
                }
            ?>

	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="expansions.php">Origins</a></li>
			<li class="active">Edit Origin</li>
		</ol>
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Edit Origin</h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Edit an existing DLC</h3>

							<form method="post" action="EditExpansionsSave.php" enctype="multipart/form-data">
								<input type="hidden" name="origin_id" value="<?php echo $Origin_id;?>" />
								<div class="top-margin">
									<label for="origin_name">Origin name</label>
									<input type="text" name="origin_name" id="origin_name" class="form-control" required autofocus value="<?php echo $OriginName;?>">
								</div>
                                <div class="top-margin">
									<label>Origin icon</label>
									<input type="file" name="origin_icon" id="origin_icon" class="form-control" ><img src="<?php echo $lokacija ?>" alt=" <?php echo $dlcIkona ?>" />
								</div>
								<div class="top-margin">
									<label>Origin effect</label>
									<textarea rows="6" type="text" name="origin_effect" id="origin_effect" class="form-control" required><?php echo $OriginEffect;?></textarea>
								</div>
								<div class="top-margin">
									<label>Origin requirements</label>
									<textarea rows="6" type="text" name="origin_requirements" id="origin_requirements" class="form-control" required><?php echo $OriginRequ;?></textarea>
								</div>
								<div class="top-margin">
									<label>DLC type</label>
									<select name="dlc_id" id="dlc_id" class="form-control">
                                    <?php
                                            require_once "includes/baza.php";
                                            $baza = new Baza();
                                            $upit = "select dlc_id, dlc_name from dlc order by dlc_id = $OriginDLC desc";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                echo "<option value='{$red["dlc_id"]}'>{$red["dlc_name"]}</option>";
                                            }
                                        ?>
                                    </select>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-12 text-right">
										<button class="btn btn-action" name="submit" type="submit">Save Changes</button>
									</div>
								</div>
							</form>
						</div>
					</div><br><br>
				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	
    </main>
    <footer>
        <?php include "includes/footer.php"; ?>
    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>