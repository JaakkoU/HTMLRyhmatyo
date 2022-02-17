<?php
$json = isset($_POST["user"]) ? $_POST["user"] : "";

if (!($user = tarkistaJson($json))) {
    print "Täytä kaikki kentät";
    exit();
}
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try {
    $yhteys = mysqli_connect("db", "root", "password", "userdata");
} catch (Exception $e) {
    print "Yhteysvirhe";
    exit();
}

$sql = "insert into users (tunnus, salasana, etunimi, sukunimi, sposti, puhelinnumero, osoite) values(?, SHA2(?, 256), ?, ?, ?, ?, ?)";
try {
    $stmt = mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssss', $user->tunnus, $user->salasana, $user->enimi, $user->snimi, $user->sposti, $user->puh, $user->osoite);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    print $json;
} catch (Exception $e) {
    print "Tunnus jo olemassa tai muu virhe!";
}
?>


<?php

function tarkistaJson($json)
{
    if (empty($json)) {
        return false;
    }
    $user = json_decode($json, false);
    if (empty($user->tunnus) || empty($user->salasana) || empty($user->enimi) || empty($user->snimi) || empty($user->sposti) || empty($user->puh) || empty($user->osoite)) {
        return false;
    }
    return $user;
}
?>