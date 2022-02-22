<?php
$json = isset($_POST["user"]) ? $_POST["user"] : "";
if (!($user = tarkistaJson($json))) {
    print "notok";
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);


try {
    $yhteys = mysqli_connect("localhost", "TRTKP21A3_12", "gPdxmaLj", "wp_TRTKP21A3_12");
} catch (Exception $e) {
    print "Yhteysvirhe";
    exit;
}

$sql = "update TRTKP21A3_12_users set salasana=?, etunimi=?, sukunimi=?, sposti=?, puhelinnumero=?, osoite=? where tunnus=?";


$stmt = mysqli_prepare($yhteys, $sql);

mysqli_stmt_bind_param(
    $stmt,
    'sssssss',
    $user->salasana,
    $user->etunimi,
    $user->sukunimi,
    $user->sposti,
    $user->puhelinnumero,
    $user->osoite,
    $user->tunnus
);

mysqli_stmt_execute($stmt);

mysqli_close($yhteys);
print "./admin.php";

?>
<?php
function tarkistaJson($json)
{
    if (empty($json)) {
        return false;
    }
    $user = json_decode($json, false);
    if (empty($user->tunnus) 
     || empty($user->salasana) 
     || empty($user->etunimi)
     || empty($user->sukunimi)
     || empty($user->sposti)
     || empty($user->puhelinnumero)
     || empty($user->osoite)
     ) {
        return false;
    }
    return $user;
}
?>