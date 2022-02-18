<?php
session_start();
if (!isset($_SESSION["TRTKP21A3_12_users"])) {
    header("Location:./kirjaudu.html");
    exit();
}
print "<h2>Tervetuloa, " . $_SESSION["TRTKP21A3_12_users"] . "!</h2>";
?>
<a href='kirjauduulos.php'>Kirjaudu ulos</a>