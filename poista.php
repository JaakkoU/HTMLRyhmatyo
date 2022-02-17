<?php
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

$poistettava = isset($_GET["poistettava"]) ? $_GET["poistettava"] : 0;

if (empty($poistettava)) {
    header("Location:./admin.php");
    exit;
}

try {
    $yhteys = mysqli_connect("db", "root", "password", "userdata");
} catch (Exception $e) {

    exit;
}

$sql = "delete from users where tunnus=?";

//valmistellaan sql-lause
$stmt = mysqli_prepare($yhteys, $sql);
//sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 's', $poistettava);
//suoritetaan sql-lause
mysqli_stmt_execute($stmt);


mysqli_close($yhteys);

header("Location:./admin.php");
