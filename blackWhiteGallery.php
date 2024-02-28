<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <?php
    session_start();

    $_SESSION['podatci'] = array('title' => 'GALLERY', 'breadcrumbs' => 'Welcome / Portfolio / Black\'n White Gallery');
    $getDataFrom = 'bwimages';
    ?>
    <link rel="stylesheet" href="css/colorGallery.css">
    <link rel="stylesheet" href="css/modal.css">
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
    <main class="mainGallery" id="Galerija">
        
    </main>
    <?php include "includes/footer.php" ?>
    <script src="js/modal.js"></script>
</body>
</html>