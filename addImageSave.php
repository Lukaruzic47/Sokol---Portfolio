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

        var_dump($_POST);
        include "includes/nav.php";
        include "includes/title.php";
    ?>
    <main class="AESave">
        <div class="AEScontainer">
            <h2>Add image</h2>
                <?php
                    if(!isset($_POST["submit"])){
                        var_dump($_POST);
                        echo "<p class='AESresult'>Error, you left something empty</p>";
                        echo "<div class='AESimage' id='klasa'><img src='' class='AESdisplay alt=''></div>";
                        echo "<a class='AESa' href='addImage.php'><button class='AESbutton'>RETURN</button></a>";
                        exit;
                    }

                    require_once "includes/bazafolio.php";
                    $baza = new Baza();
                    $poruka = "";
                    if(empty(trim($_POST["naziv"]))){
                        $poruka .= "Name field is required </br>";
                    }
                    else{
                        $naziv = strip_tags($_POST["naziv"]);
                    }

                    if(empty(trim($_POST["date"]))){
                        $poruka .= "Date field is required </br>";
                    }
                    else{
                        $datum = strip_tags($_POST["date"]);
                    }

                    if(empty(trim($_POST["type"]))){
                        $poruka .= "Image type field is required </br>";
                    }
                    else{
                        $type = strip_tags($_POST["type"]);
                    }
                    
                    if(empty(trim($_POST["redTV"]))){
                        $poruka .= "TV column is required </br>";
                    }
                    else{
                        $TVColumn = strip_tags($_POST["redTV"]);
                    }

                    if(empty(trim($_POST["rbTV"]))){
                        $poruka .= "TV ordinal number is required </br>";
                    }
                    else{
                        $TVnumber = strip_tags($_POST["rbTV"]);
                    }

                    if(empty(trim($_POST["redDesk"]))){
                        $poruka .= "Desktop column is required </br>";
                    }
                    else{
                        $DeskColumn = strip_tags($_POST["redDesk"]);
                    }

                    if(empty(trim($_POST["rbDesk"]))){
                        $poruka .= "Desktop ordinal number is required </br>";
                    }
                    else{
                        $Desknumber = strip_tags($_POST["rbDesk"]);
                    }

                    if(empty(trim($_POST["redTablet"]))){
                        $poruka .= "Tablet column is required </br>";
                    }
                    else{
                        $TabColumn = strip_tags($_POST["redTablet"]);
                    }
                    
                    if(empty(trim($_POST["rbTab"]))){
                        $poruka .= "Tablet ordinal number is required </br>";
                    }
                    else{
                        $Tabnumber = strip_tags($_POST["rbTab"]);
                    }

                    if(empty(trim($_POST["redMob"]))){
                        $poruka .= "Mobile column is required </br>";
                    }
                    else{
                        $MobColumn = strip_tags($_POST["redMob"]);
                    }

                    if(empty(trim($_POST["rbMob"]))){
                        $poruka .= "Mobile ordinal number is required </br>";
                    }
                    else{
                        $Mobnumber = strip_tags($_POST["rbMob"]);
                    }

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

                    $status = 0;

                    $varijableBrojevi = [$TVnumber, $Desknumber, $Tabnumber, $Mobnumber];
                    $varijableStupci = [$TVColumn, $DeskColumn, $TabColumn, 1];
                    if(empty($poruka)){
                        if($type == "boja"){
                            $redniBrojevi = ["CI_TV_no", "CI_Desktop_no", "CI_Tablet_no", "CI_Mobile_no"];
                            $stupci = ["CI_TV_Column", "CI_Desktop_Column", "CI_Tablet_Column", 1];
                            foreach($redniBrojevi as $i => $redniBrojevi){
                                $upit = "UPDATE cimages SET $redniBrojevi = $redniBrojevi + 1 WHERE $redniBrojevi >= {$varijableBrojevi[$i]} AND {$stupci[$i]} = {$varijableStupci[$i]}";
                                $status = $baza->promijeniDB($upit);
                            }
                            if($status){
                                echo "<p>Slike pomaknute u tablici</p>";
                            }

                            $upit = "INSERT INTO cimages (CI_name, CI_date, CI_image, CI_TV_Column, CI_TV_no, CI_Desktop_Column, CI_Desktop_no, CI_Tablet_Column, CI_Tablet_no, CI_Mobile_no) values ('$naziv', '$datum', '$slika', '$TVColumn', '$TVnumber', '$DeskColumn', '$Desknumber', '$TabColumn', '$Tabnumber', '$Mobnumber')";
                            $status = $baza->promijeniDB($upit);
                        }

                        else{
                            $redniBrojevi = ["BW_TV_no", "BW_Desktop_no", "BW_Tablet_no", "BW_Mobile_no"];
                            $stupci = ["BW_TV_Column", "BW_Desktop_Column", "BW_Tablet_Column", 1];

                            foreach($redniBrojevi as $i => $redniBrojevi){
                                $upit = "UPDATE bwimages SET $redniBrojevi = $redniBrojevi + 1 WHERE $redniBrojevi >= {$varijableBrojevi[$i]} AND {$stupci[$i]} = {$varijableStupci[$i]}";
                                $status = $baza->promijeniDB($upit);
                            }
                            if($status){
                                echo "<p>Slike pomaknute u tablici</p>";
                            }
                            
                            $upit = "INSERT INTO bwimages (BW_name, BW_date, BW_image, BW_TV_Column, BW_TV_no, BW_Desktop_Column, BW_Desktop_no, BW_Tablet_Column, BW_Tablet_no, BW_Mobile_no) values ('$naziv', '$datum', '$slika', '$TVColumn', '$TVnumber', '$DeskColumn', '$Desknumber', '$TabColumn', '$Tabnumber', '$Mobnumber')";
                            $status = $baza->promijeniDB($upit);
                        }
                    }

                    if($status){
                        $poruka .= "Image uploaded";
                        echo "<p class='AESresult'>$poruka</p>";
                        echo "<div class='' id='klasa'><img src=" . $lokacija_datoteke . " class='AESdisplay alt=''></div>";
                    }
                    else{
                        $poruka .= "Update error";
                        echo "<p class='AESresult'>$poruka</p>";
                        echo "<div class='AESimage' id='klasa'><img src='' class='AESdisplay alt=''></div>";
                    }

                    ?>

            <a class="AESa" href="addImage.php"><button class="AESbutton">RETURN</button></a>
        </div>
    </main>
    <?php include "includes/footer.php"; ?>
</body>
</html>