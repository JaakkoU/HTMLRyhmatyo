<?php
session_start();
$json = isset($_POST["user"]) ? $_POST["user"] : "";

if (!($user = tarkistaJson($json))) {
    print "Täytä kaikki kentät";
    exit();
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $yhteys = mysqli_connect("db", "root", "password", "userdata");
} catch (Exception $e) {
    print "ei toimi";
    exit;
}

$sql = "select * from users where tunnus=? and salasana=SHA2(?, 256)";
try {
    $stmt = mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user->tunnus, $user->salasana);
    mysqli_stmt_execute($stmt);
    $tulos = mysqli_stmt_get_result($stmt);
    if ($rivi = mysqli_fetch_object($tulos)) {
        $_SESSION["kayttaja"] = "$rivi->tunnus";
        print "ok";
        exit();
    }
    mysqli_close($yhteys);
    print $json;
} catch (Exception $e) {
    print "Jokin virhe!";
}
?>


<?php

function tarkistaJson($json)
{
    if (empty($json)) {
        return false;
    }
    $user = json_decode($json, false);
    if (empty($user->tunnus) || empty($user->salasana)) {
        return false;
    }
    return $user;
}
?>