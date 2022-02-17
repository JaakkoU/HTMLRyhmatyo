<?php
session_start();
if (!isset($_SESSION["users"])) {
    header("Location:./kirjaudu.html");
    exit();
}
print "<h2>Tervetuloa, " . $_SESSION["users"] . "!</h2>";
?>
<a href='kirjauduulos.php'>Kirjaudu ulos</a>