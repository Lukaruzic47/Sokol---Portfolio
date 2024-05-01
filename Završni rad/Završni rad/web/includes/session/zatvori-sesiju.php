<?php
/* PHP skripta koja se poziva kod odjave korisnika, ona radi sljedeće:
	1. dohvaća ID trenutne korisničke sesije
	2. raspušta sve njene sesijske varijable
	3. uništava korisničku sesiju na temelju ranije dohvaćenog ID-a sesije 
	4. vraća korisnika na početnu stranicu
*/
session_start();
session_unset();
session_destroy();
echo "<script>location.href = '../../index.php';</script>";
?>