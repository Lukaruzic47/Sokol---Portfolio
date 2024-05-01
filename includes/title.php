<?php
$podatci = isset($_SESSION['podatci']) ? $_SESSION['podatci'] : array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/title.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet" />
</head>

<body>
    <p class="breadCrumbs"> <?php echo $podatci['breadcrumbs']; ?></p>
    <div class="title">
        <h1><?php echo $podatci['title']; ?></h1>
    </div>
    <hr class="mainContentHr">
</body>

</html>