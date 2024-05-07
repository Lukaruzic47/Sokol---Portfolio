<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new image</title>
    <?php
    session_start();
    $_SESSION['podatci'] = array('title' => 'TEST', 'breadcrumbs' => 'Test');
    ?>
    <link rel="stylesheet" href="css/addImage.css">
</head>

<body>
    <?php
    require "includes/autoriziran-pristup.php";
    require "includes/bazafolio.php";
    include "includes/nav.php";
    include "includes/title.php";
    ?>

    <form class="addImage" action="addImageSave.php" enctype="multipart/form-data" method="post">
        <div class="inputElement2">
            <label for="redTV">Red - TV</label><br>
            <select name="redTV" id="redTV" onchange="changeClass()">
                <option value=""></option>
                <option value="1">1/4</option>
                <option value="2">2/4</option>
                <option value="3">3/4</option>
                <option value="4">4/4</option>
            </select>
        </div>

        <div class="inputElement2">
            <label for="rbTV">Redni broj</label><br>
            <input type="number" name="rbTV" id="rbTV" placeholder="1" class="form2-input" max="4" min="1">
        </div>
        <!-- SELECT COUNT(*) FROM cimages WHERE CI_TV_Column = 1 -->
        <!-- UPDATE cimages SET CI_TV_Column = CI_TV_Column + 1 WHERE CI_TV_Column > n -->
    </form>
    <script src="js/test.js"></script>
</body>

</html>