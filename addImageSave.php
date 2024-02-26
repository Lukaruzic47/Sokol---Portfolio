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
        include "includes/nav.php";
        include "includes/title.php";
    ?>
    <main class="AESave">
        <div class="AEScontainer">
            <h2>Add image</h2>
            <p class="AESresult">Upload succesful</p>
            <div class="AESimage">
                <img src="images/Doslovno doslovno doslovno ja.jpg" alt="">
            </div>
            <button>RETURN</button>
        </div>
    </main>
</body>
</html>