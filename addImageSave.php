<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();

    $_SESSION['podatci'] = array('title' => 'ADD NEW', 'breadcrumbs' => 'Admin / Add New');
    ?>
    <link rel="stylesheet" href="css/addEditSave.css">
</head>
<body>
    <?php
        require "includes/autoriziran-pristup.php";
        include "includes/nav.php";
        include "includes/title.php";
    ?>
    <main class="AESave">
        <div class="AEScontainer">
            <h2>Add image</h2>
                <?php
                    if(!isset($_POST["submit"])){
                        echo "<p class='AESresult'>Error, you left something empty</p>";
                        echo "<div class='AESimage' id='klasa'><img src='' class='AESdisplay alt=''></div>";
                        echo "<a class='AESa' href='addImage.php'><button class='AESbutton'>RETURN</button></a>";
                        exit;
                    }
                    require_once "includes/bazafolio.php";
                    $baza = new Baza();
                    $poruka = "";
                    // Naziv slike
                    if(empty(trim($_POST["naziv"]))){
                        $poruka .= "Name field is required </br>";
                    }
                    else{
                        $naziv = strip_tags($_POST["naziv"]);
                    }

                    // Datum slike
                    if(empty(trim($_POST["date"]))){
                        $poruka .= "Date field is required </br>";
                    }
                    else{
                        $datum = strip_tags($_POST["date"]);
                    }

                    // Tip slike (boja/crno-bijelo)
                    if(empty(trim($_POST["type"]))){
                        $poruka .= "Image type field is required </br>";
                    }
                    else{
                        $type = strip_tags($_POST["type"]);
                    }
                    
                    // Stupac za TV
                    if(empty(trim($_POST["redTV"]))){
                        $poruka .= "TV column is required </br>";
                    }
                    else{
                        $TVColumn = strip_tags($_POST["redTV"]);
                    }

                    // Redni broj za TV
                    if(empty(trim($_POST["rbTV"]))){
                        $poruka .= "TV ordinal number is required </br>";
                    }
                    else{
                        $TVnumber = strip_tags($_POST["rbTV"]);
                    }

                    // Stupac za Desktop
                    if(empty(trim($_POST["redDesk"]))){
                        $poruka .= "Desktop column is required </br>";
                    }
                    else{
                        $DeskColumn = strip_tags($_POST["redDesk"]);
                    }

                    // Redni broj za Desktop
                    if(empty(trim($_POST["rbDesk"]))){
                        $poruka .= "Desktop ordinal number is required </br>";
                    }
                    else{
                        $Desknumber = strip_tags($_POST["rbDesk"]);
                    }

                    // Stupac za Tablet
                    if(empty(trim($_POST["redTablet"]))){
                        $poruka .= "Tablet column is required </br>";
                    }
                    else{
                        $TabColumn = strip_tags($_POST["redTablet"]);
                    }
                    
                    // Redni broj za Tablet
                    if(empty(trim($_POST["rbTab"]))){
                        $poruka .= "Tablet ordinal number is required </br>";
                    }
                    else{
                        $Tabnumber = strip_tags($_POST["rbTab"]);
                    }

                    // Redni broj za Mobitel
                    if(empty(trim($_POST["rbMob"]))){
                        $poruka .= "Mobile ordinal number is required </br>";
                    }
                    else{
                        $Mobnumber = strip_tags($_POST["rbMob"]);
                    }

                    // Slika
                    if(empty(trim($_FILES["slika"]["name"]))){
                        $poruka .= "Image was not uploaded </br>";
                    }
                    else{
                        $slika = strip_tags($_FILES["slika"]["name"]);
                    }

                    if(empty($poruka)){
                        if($type == "boja"){
                            $lokacija_datoteke = "images/Color/";
                        }
                        else{
                            $lokacija_datoteke = "images/BlackWhite/";
                        }
                        $lokacija_datoteke = $lokacija_datoteke . basename($_FILES["slika"]["name"]);
                                                
                        $allowedFormat = array("jpeg", "jpg", "png", "gif");
                        $temp = explode(".", $_FILES["slika"]["name"]);
                        $ekstenzija = end($temp);
                        
                        if($_FILES["slika"]["size"] < 8390108 && in_array($ekstenzija, $allowedFormat)){
                            if($_FILES["slika"]["error"] > 0){
                                $poruka .= "Error " . $_FILES["slika"]["error"] . ", ne odgovara format slike<br/>";
                            }
                            else{
                                if(file_exists($lokacija_datoteke)){
                                    // Ako slika već postoji onda se neće prebaciti
                                    $poruka .= "An image with that name already exists </br>";
                                }
                                else{
                                    move_uploaded_file($_FILES["slika"]["tmp_name"], $lokacija_datoteke);
                                }
                            }
                        }
                        else{
                            $poruka .= "Slika je veća od 8 MB <br/>";
                        }
                    }
                    
                    $status = NULL;

                    if(empty($poruka)){
                        if($type == "boja"){
                            $prefix = "CI";
                            $table = "cimages";
                        }
                        else{
                            $prefix = "BW";
                            $table = "bwimages";
                        }
                        
                        $query = [
                            "UPDATE $table SET " . $prefix . "_TV_no = " . $prefix . "_TV_no + 1 WHERE " . $prefix . "_TV_no >= " . $TVnumber . " AND " . $prefix . "_TV_Column = " . $TVColumn,
                                
                            "UPDATE $table SET " . $prefix . "_Desktop_no = " . $prefix . "_Desktop_no + 1 WHERE " . $prefix . "_Desktop_no >= " . $Desknumber . " AND " . $prefix . "_Desktop_Column = " . $DeskColumn,

                            "UPDATE $table SET " . $prefix . "_Tablet_no = " . $prefix . "_Tablet_no + 1 WHERE " . $prefix . "_Tablet_no >= " . $Tabnumber . " AND " . $prefix . "_Tablet_Column = " . $TabColumn,

                            "UPDATE $table SET " . $prefix . "_Mobile_no = " . $prefix . "_Mobile_no + 1 WHERE " . $prefix . "_Mobile_no >= " . $Mobnumber,

                            "INSERT INTO $table (" . $prefix . "_name, " . $prefix . "_date, " . $prefix . "_image, " . $prefix . "_TV_Column, " . $prefix . "_TV_no, " . $prefix . "_Desktop_Column, " . $prefix . "_Desktop_no, " . $prefix . "_Tablet_Column, " . $prefix . "_Tablet_no, " . $prefix . "_Mobile_no) values ('$naziv', '$datum', '$slika', '$TVColumn', '$TVnumber', '$DeskColumn', '$Desknumber', '$TabColumn', '$Tabnumber', '$Mobnumber')"
                            ];     

                            // INSERT INTO cimages (CI_name, CI_date, CI_image, CI_TV_Column, CI_TV_no, CI_Desktop_Column, CI_Desktop_no, CI_Tablet_Column, CI_Tablet_no, CI_Mobile_no) values ('TEST', '2020-12-12', 'slika.jpg', '1', '1', '1', '1', '1', '1', '1')
                            
                        $status = array();

                        foreach($query as $i => $q){
                            $status[$i] = $baza->promijeniDB($q);
                        }

                        $overallStatus = 0;
                        foreach($status as $i => $s){
                            if($s === 0){
                                $overallStatus++;
                            }
                            else{
                                echo "<p>Dogodila se iznimka kod pomaka slika</p>". $i . $s;
                            }
                        }
                        echo "Overall status: " . $overallStatus . "/5<br>";
                    }

                    if($overallStatus === 5){
                        $poruka .= "Image uploaded";
                        echo "<p class='AESresult'>$poruka</p>";
                        echo "<div class='' id='klasa'><img src=" . $lokacija_datoteke . " class='AESdisplay alt=''></div>";
                    }
                    else{
                        $poruka .= "Update error";
                        echo $overallStatus . "/5";
                        echo "<p class='AESresult'>$poruka</p>";
                        echo "<div class='AESimage' id='klasa'><img src='' class='AESdisplay alt=''></div>";
                    }

                    ?>
            <div>
                <a class="AESa" href="addImage.php"><button class="AESbutton">ADD NEW</button></a>
                <a class="AESa" href="colorGallery.php"><button class="AESbutton">RETURN</button></a>
            </div>
        </div>
    </main>
    <?php include "includes/footer.php"; ?>
</body>
</html>