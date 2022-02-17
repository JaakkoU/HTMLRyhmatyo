<?php
session_start();
if (!isset($_SESSION["kayttaja"])) {
    header("Location:/htmlryhmatyo/kirjaudu.html");
    exit();
}
print "<h2>Tervetuloa, " . $_SESSION["kayttaja"] . "!</h2>";
?>
<a href='kirjauduulos.php'>Kirjaudu ulos</a>