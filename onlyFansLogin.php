<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/addImage.css">
    <link rel="stylesheet" href="css/loginForm.css">
    <script src="js/provjeraAutentifikacije.js"></script>
    <?php
    session_start();
    ?>
</head>
<body>
    <noscript>
        <p>Please enable JavaScript to continue.</p>
        <meta http-equiv="refresh" content="0;url=error.html">
    </noscript>
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
                    <input oninput="useRegexUsername(this.value); enableSubmit()" placeholder="korisnicko ime" type="text" name="korisnicko_ime" id="korisnicko_ime"><br/>
                    <p>- Minimalno 10 znamenki</p>
                    <p>- Bez razmaka</p>
                    <p>- Bez dijakritičkih znakova</p>
                    <p id="input-name-details"></p>
                    <label for="lozinka">Lozinka</label><br/>
                    <input oninput="useRegexPassword(this.value); enableSubmit()" placeholder="lozinka" type="password" name="lozinka" id="lozinka"><br/>
                    <p>- Minimalno 10 znamenki</p>
                    <p>- Minimalno 1 posebni znak (#%=@$!%*?&)</p>
                    <p>- Minimalno 1 broj</p>
                    <p id="input-pass-details4">- Minimalno jedna uppercase i jedna lowecase znamenka</p>
                    <p id="input-pass-details5">- Bez razmaka</p>
                    <p id="input-pass-details"></p>
                    <button id="submit" class="submit" type="submit" disabled>Prijavi se</button>
                </form>
            </div>
        </section>
    </main>
    <?php include "includes/footer.php" ?>
</body>
</html>