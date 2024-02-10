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
    <script src="js/columnGenerator.js"></script>
    <script>
        getValueLol('<?php echo $getDataFrom; ?>');
    </script>
</head>

<body>
    <?php
    require "includes/bazafolio.php";
    include "includes/nav.php";
    include "includes/title.php";
    ?>
    <main class="addImage" id="dodaj">
        <div class="form1">
            <div class="inputElement1">
                <label for="naziv">Naslov slike</label><br>
                <input type="text" name="naziv" id="naziv" class="form1-input" required>
            </div>
            <div class="placeholder1"></div>
            <div class="inputElement1">
                <label for="date">Photoshoot date</label><br>
                <input type="date" name="date" id="date" class="form1-input" required>
            </div>
        </div>

        <div class="form2">
            <div class="prviRed">
                <div class="inputElement2">
                    <label for="redTV">Red - TV</label><br>
                    <select name="redTV" id="redTV">
                        <option value="1">1/4</option>
                        <option value="2">2/4</option>
                        <option value="3">3/4</option>
                        <option value="4">4/4</option>
                    </select>
                </div>
                <div class="placeholder"></div>
                <div class="inputElement2">
                    <label for="rbTV">Redni broj</label><br>
                    <input type="number" name="rbTV" id="rbTV" class="form2-input" max="4" min="1">
                </div>
                <div class="placeholder"></div>
                <div class="inputElement2">
                    <label for="redTV">Red - Desktop</label>
                    <select name="redTV" id="redTV">
                        <option value="1">1/4</option>
                        <option value="2">2/4</option>
                        <option value="3">3/4</option>
                        <option value="4">4/4</option>
                    </select>
                </div>
                <div class="placeholder"></div>
                <div class="inputElement2">
                    <label for="rbTV">Redni broj</label>
                    <input type="number" name="rbTV" id="rbTV" class="form2-input" max="4" min="1">
                </div>

            </div>
            <br><br>
            <br><br>

            <div class="drugiRed">
                <div class="inputElement3">
                    <label for="redTV">Red - Tablet</label>
                    <select name="redTV" id="redTV">
                        <option value="1">1/4</option>
                        <option value="2">2/4</option>
                        <option value="3">3/4</option>
                        <option value="4">4/4</option>
                    </select>
                </div>
                <div class="placeholder"></div>
                <div class="inputElement3">
                    <label for="rbTV">Redni broj</label>
                    <input type="number" name="rbTV" id="rbTV" class="form2-input" max="4" min="1">
                </div>
                <div class="placeholder"></div>
                <div class="inputElement3">
                    <label for="redTV">Red - Mobitel</label>
                    <select name="redTV" id="redTV">
                        <option value="1">1/4</option>
                        <option value="2">2/4</option>
                        <option value="3">3/4</option>
                        <option value="4">4/4</option>
                    </select>
                </div>
                <div class="placeholder"></div>
                <div class="inputElement3">
                    <label for="rbTV">Redni broj</label>
                    <input type="number" name="rbTV" id="rbTV" class="form2-input" max="4" min="1">
                </div>
            </div>

            <div class="treciRed">
                <div class="inputElement4">
                    <br><br>
                    <label for="opis">Opis slike</label><br>
                    <textarea type="textarea" name="opis" id="opis"></textarea>
                </div>
            </div>
        </div>
        <hr class="formHR">
        <div class="form3">

        </div>
    </main>
    <?php include "includes/footer.php" ?>
</body>

</html>