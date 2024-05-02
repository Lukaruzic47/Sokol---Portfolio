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
                <form action="includes/otvori-sesiju.php" method="POST">
                    <h2 class="inter-font">ADMIN</h2>
                    <label for="korisnicko_ime">Korisničko ime</label><br/>
                    <input placeholder="korisnicko ime" type="text" name="korisnicko_ime" id="korisnicko_ime"><br/>
                    <label for="lozinka">Lozinka</label><br/>
                    <input placeholder="lozinka" type="password" name="lozinka" id="lozinka"><br/>
                    <button class="submit" type="submit">Prijavi se</button>
                </form>
            </div>
        </section>
    </main>
    <?php include "includes/footer.php" ?>
</body>
</html>