<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <?php
    session_start();

    $_SESSION['podatci'] = array('title' => 'GALLERY', 'breadcrumbs' => 'Welcome / Portfolio / Main Gallery');
    $getDataFrom = 'cimages';

    if(isset($_SESSION['status'])){
        if($_SESSION['status'] == 1){
            echo '<script src="js/columnGeneratorAdmin.js"></script>';
        } 
        else {
            echo '<script src="js/columnGenerator.js"></script>';
        }
    }

    ?>
    <link rel="stylesheet" href="css/colorGallery.css">
    <link rel="stylesheet" href="css/modal.css">
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
    <div class="modalSlika" id="modalSlika">
        <!-- <div><img src="images/Color/494715.jpg" alt=""></div> -->
    </div>
    <main class="mainGallery" id="Galerija">
    </main>
    <?php include "includes/footer.php" ?>
    <script src="js/modal.js"></script>
</body>
<!-- novi komentari -->

</html>