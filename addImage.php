<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new image</title>
    <?php
    session_start();

    $_SESSION['podatci'] = array('title' => 'ADD NEW', 'breadcrumbs' => 'Admin / Add New');
    ?>
    <link rel="stylesheet" href="css/addImage.css">
</head>

<body>
    <?php
    require "includes/bazafolio.php";
    include "includes/nav.php";
    include "includes/title.php";
    ?>
    <main id="dodaj">
        <form class="addImage" action="addImageSave.php" enctype="multipart/form-data" method="post">
            <div class="form1">
                <div class="inputElement1">
                    <label for="naziv">Naslov slike</label><br>
                    <input type="text" name="naziv" id="naziv" class="form1-input" required>
                </div>
                <div class="inputElement1">
                    <label for="date">Photoshoot date</label><br>
                    <input type="date" name="date" id="date" class="form1-input" required>
                </div>
                <div class="inputElement7">
                    <label for="type">Tip slike</label><br>
                    <select name="type" id="type" class="form1-input" required onchange="enableFirstSelect(this, redTV)">
                        <option value=""></option>
                        <option value="boja">U boji</option>
                        <option value="crno-bijelo">Crno - bijelo</option>
                    </select>
                </div>
            </div>

            <div class="form2">
                <div class="prviRed">
                    <div class="inputElement2">
                        <label for="redTV">TV Column</label><br>
                        <select name="redTV" id="redTV" onchange="changeData(this); " required disabled="true">
                            <option value=""></option>
                            <option value="1">1/4</option>
                            <option value="2">2/4</option>
                            <option value="3">3/4</option>
                            <option value="4">4/4</option>
                        </select>
                    </div>

                    <div class="inputElement2">
                        <label for="rbTV">Redni broj</label><br>
                        <input type="number" name="rbTV" id="redTV2" class="form2-input" max="4" min="1" required>
                    </div>

                    <div class="inputElement2">
                        <label for="redDesk">Red - Desktop</label>
                        <select name="redDesk" id="redDesk" onchange="changeData(this)" required>
                            <option value=""></option>
                            <option value="1">1/3</option>
                            <option value="2">2/3</option>
                            <option value="3">3/3</option>
                        </select>
                    </div>

                    <div class="inputElement2">
                        <label for="rbDesk">Redni broj</label>
                        <input type="number" name="rbDesk" id="redDesk2" class="form2-input" max="4" min="1" required>
                    </div>
                </div>

                <br><br>
                <br><br>

                <div class="drugiRed">
                    <div class="inputElement3">
                        <label for="redTablet">Red - Tablet</label>
                        <select name="redTablet" id="redTablet" onchange="changeData(this)" required>
                            <option value=""></option>
                            <option value="1">1/2</option>
                            <option value="2">2/2</option>
                        </select>
                    </div>
                    <div class="inputElement3">
                        <label for="rbTab">Redni broj</label>
                        <input type="number" name="rbTab" id="redTablet2" class="form2-input" max="4" min="1" required>
                    </div>
                    <div class="inputElement3">
                        <label for="redMob">Red - Mobitel</label>
                        <select name="redMob" id="redMob" onchange="changeData(this)" required>
                            <option value=""></option>
                            <option value="1">1/1</option>
                        </select>
                    </div>
                    <div class="inputElement3">
                        <label for="rbMob">Redni broj</label>
                        <input type="number" name="rbMob" id="redMob2" class="form2-input" max="4" min="1" required>
                    </div>
                </div>
            </div>
            <hr class="formHR">
            <div class="form3">
                <div class="inputElement5">
                    <span>Prenesi sliku</span><br>
                    <input class="actual-btn" type="file" name="slika" id="slika" required><br><br>
                    <label for="slika" class="actual-btn2">
                        <span class="uploadTekst">Choose file</span>
                    </label>
                </div>
            </div>
            <div class="form5">
                <ul>
                    <li><i>- Naziv slike u sebi ne smije imati razmake pr. "Snimka zaslona (15)"</i></li>
                    <li><i>- Slike ne mogu biti veće od 16MB</i></li>
                    <li><i>- Prihvaćaju se gif, jpeg, jpg i png formati</i></li>
                </ul>
            </div>
            <div class="form4">
                <div class="inputElement6">
                    <button class="submit" name="submit" type="submit">SUBMIT</button>
                </div>
            </div>
        </form>
    </main>
    <?php include "includes/footer.php" ?>
    <script src="js/test.js"></script>
</body>

</html>