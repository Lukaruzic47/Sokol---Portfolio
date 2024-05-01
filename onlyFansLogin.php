<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/addImage.css">
    <link rel="stylesheet" href="css/loginForm.css">
    <?php
    session_start();
    ?>
</head>
<body>
    <main>
    <?php
    require "includes/bazafolio.php";
    include "includes/nav.php";
    ?>
        <section>
            <div class="form inter-font">
                <form action="loginProvjera.php" method="post">
                    <h2 class="inter-font">ADMIN</h2>
                    <label for="usrnm">Korisničko ime</label><br/>
                    <input placeholder="Korisnicko ime" type="text" name="usrnm" id="usrnm"><br/>
                    <label for="psswrd">Lozinka</label><br/>
                    <input placeholder="Lozinka" type="password" name="psswrd" id="psswrd"><br/>
                    <button class="submit" type="submit">Prijavi se</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>