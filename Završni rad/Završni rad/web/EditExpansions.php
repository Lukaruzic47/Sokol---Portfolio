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
                $dlc_id = $_GET["id"];
  
				/*  funkcija debug_to_console ispisuje vrijednost ID-a u konzolu
				function debug_to_console($data) {
					$output = $data;
					if (is_array($output))
						$output = implode(',', $output);
				
					echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
				}
				debug_to_console($dlc_id);
				*/

                $upit = "select dlc_name, dlc_icon, dlc_release_date, dlc_type_name, dlc.dlc_type_id from dlc INNER JOIN dlc_type on dlc.dlc_type_id = dlc_type.dlc_type_id where dlc_id = $dlc_id";
                $rezultat = $baza->dohvatiDB($upit);
                while($red = $rezultat->fetch_array()){
                    $dlcIme = $red["dlc_name"];
                    $dlcIkona = $red["dlc_icon"];
                    $dlcDatum = $red["dlc_release_date"];
                    $dlcTip = $red["dlc_type"];
                    $dlcTipId = $red["dlc_type_id"];
					$lokacija = "assets/images/Stellaris_slike/DLC/";
					$lokacija = $lokacija . basename($dlcIkona);
                }
            ?>

	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="expansions.php">Expansions</a></li>
			<li class="active">Edit DLC</li>
		</ol>
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Edit DLC</h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Edit an existing DLC</h3>

							<form method="post" action="EditExpansionsSave.php" enctype="multipart/form-data">
								<input type="hidden" name="dlc_id" value="<?php echo $dlc_id;?>" />
								<div class="top-margin">
									<label for="dlc_name">DLC name</label>
									<input type="text" name="dlc_name" id="dlc_name" class="form-control" required autofocus value="<?php echo $dlcIme;?>">
								</div>
                                <div class="top-margin">
									<label>DLC icon</label>
									<input type="file" name="dlc_icon" id="dlc_icon" class="form-control" ><img src="<?php echo $lokacija ?>" alt=" <?php echo $dlcIkona ?>" />
								</div>
								<div class="top-margin">
									<label>DLC release date</label>
									<input type="date" name="dlc_release_date" id="dlc_release_date" class="form-control" required value="<?php echo $dlcDatum;?>">
								</div>
								<div class="top-margin">
									<label>DLC type</label>
									<select name="dlc_type_id" id="dlc_type_id" class="form-control">
                                        <?php
                                            require_once "includes/baza.php";
                                            $baza = new Baza();
                                            $upit = "select dlc_type_name, dlc_type_id from dlc_type order by dlc_type_id = $dlcTipId desc";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                echo "<option value='{$red["dlc_type_id"]}'>{$red["dlc_type_name"]}</option>";
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
							</form><br><br>
						</div>
					</div><br><br>
				</div>			
			</article>
			<!-- /Article -->
		</div>
	</div>	
    </main>
    <footer >
        <?php include "includes/footer.php"; ?>
    </footer>
	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>