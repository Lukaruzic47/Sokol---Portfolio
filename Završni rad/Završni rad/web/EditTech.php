<?php
require "includes/session/provjera-prijava.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        $description = "Web aplikacija za besplatno dijeljenje fotografija. Uredite vlastitu fotografiju";
        $keywords = "Uređivanje fotografija, tematske kategorije, dijeljenje fotografija";
        $title = "Edit Technology";
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
                $Tech_id = $_GET["id"];
  
				/*  funkcija debug_to_console ispisuje vrijednost ID-a u konzolu
				function debug_to_console($data) {
					$output = $data;
					if (is_array($output))
						$output = implode(',', $output);
				
					echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
				}
				debug_to_console($dlc_id);
				*/

                $upit = "select tech_name, tech_icon, tech_sub_category_id, dlc_id, tech_cost, tech_rarity, tech_effect, tech_desc from technology where tech_id = $Tech_id";
                $rezultat = $baza->dohvatiDB($upit);
                while($red = $rezultat->fetch_array()){
                    $TechName = $red["tech_name"];
                    $TechIcon = $red["tech_icon"];
                    $TechCategory = $red["tech_sub_category_id"];
                    $Dlc = $red["dlc_id"];
                    $TechCost = $red["tech_cost"];
                    $TechRarity = $red["tech_rarity"];
                    $TechEffect = $red["tech_effect"];
                    $TechDesc = $red["tech_desc"];
					$lokacija = "assets/images/Stellaris_slike/Technology/";
					$lokacija = $lokacija . basename($TechIcon);
                }
            ?>

	<div class="container">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="technology.php">Technology</a></li>
			<li class="active">Edit Technology</li>
		</ol>
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Edit Technology</h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Edit an existing technology</h3>

							<form method="post" action="EditTechnologySave.php" enctype="multipart/form-data">
                                <input type="hidden" name="tech_id" value="<?php echo $Tech_id;?>" />
								<div class="top-margin">
									<label>Technology Name</label>
									<input type="text" name="tech_name" id="tech_name" class="form-control" required value="<?php echo $TechName;?>">
								</div>
                                <div class="top-margin">
									<label>Technology Icon</label>
									<input type="file" name="tech_icon" id="tech_icon" class="form-control" ></input>
                                    <img src="<?php echo $lokacija ?>" alt=" <?php echo $TechIcon ?>" />
								</div>
								<div class="top-margin">
									<label>Technology Effect</label>
                                    <textarea type="text" rows="6" cols="24" name="tech_effect" id="tech_effect" class="form-control" required"><?php echo $TechEffect;?></textarea>
								</div>
                                <div class="top-margin">
									<label>Tech Rarity</label>
									<input type="text" name="tech_rarity" id="tech_rarity" class="form-control" required value="<?php echo $TechRarity;?>"></input>
								</div>
                                <div class="top-margin">
									<label>Tech Cost</label>
									<input type="number" name="tech_cost" id="tech_cost" class="form-control" required value="<?php echo $TechCost;?>"></input>
								</div>
                                <div class="top-margin">
									<label>Technology Desc</label>
									<textarea type="text" rows="6" cols="24" name="tech_desc" id="tech_desc" class="form-control" required><?php echo $TechDesc;?></textarea>
								</div>
                                <div class="top-margin">
									<label>Category</label>
									<select name="tech_sub_category_id" id="tech_category" class="form-control">
                                        <?php
                                            require_once "includes/baza.php";
                                            $baza = new Baza();
                                            $upit = "SELECT tech_sub_category_id, tech_category_name FROM techcategories WHERE tech_sub_category_id <> 1 AND tech_sub_category_id <> 2 AND  tech_sub_category_id <> 3 order by tech_sub_category_id = $TechCategory desc";
                                            $rezultat = $baza->dohvatiDB($upit);
                                            while($red = $rezultat->fetch_array()){
                                                echo "<option value='{$red["tech_sub_category_id"]}'>{$red["tech_category_name"]}</option>";
                                            }   
                                        ?>
                                    </select>
								</div>
								<div class="top-margin">
									<label>DLC</label>
									<select name="dlc_id" id="dlc_id" class="form-control">
                                        <?php
                                            require_once "includes/baza.php";
                                            $baza = new Baza();
                                            $upit = "select dlc_id, dlc_name from dlc order by dlc_id = $Dlc desc";
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