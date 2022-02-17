<?php
$json=isset($_POST["user"]) ? $_POST["user"] : "";
/*print $json;
exit;*/
if(!($user=tarkistaJson($json))){
    print "notok";
    exit;
}


/*$tunnus=isset($_POST["tunnus"]) ? $_POST["tunnus"] : "";
$salasana=isset($_POST["salasana"]) ? $_POST["salasana"] : "";
$etunimi=isset($_POST["etunimi"]) ? $_POST["etunimi"] : "";
$sukunimi=isset($_POST["sukunimi"]) ? $_POST["sukunimi"] : "";
$sposti=isset($_POST["sposti"]) ? $_POST["sposti"] : "";
$puhelinnumero=isset($_POST["puhelinnumero"]) ? $_POST["puhelinnumero"] : "";
$osoite=isset($_POST["osoite"]) ? $_POST["osoite"] : "";
$isAdmin=isset($_POST["isAdmin"]) ? $_POST["isAdmin"] : "";



if (empty($tunnus) 
    || empty($salasana) 
    || empty($etunimi) 
    || empty($sukunimi) 
    || empty($sposti) 
    || empty($puhelinnumero) 
    || empty($osoite)
    || empty($isAdmin)){
    header("Location:../php/muokkaa.php");
    print "../php/kirjaudu.php";
    exit;
}
*/

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);


try{
    $yhteys=mysqli_connect("db", "root", "password", "kirjakanta");
}
catch(Exception $e){
    print "Yhteysvirhe"; /* tee yhteysvirhesivu*/
    exit;
}

$sql="update users set salasana=?, etunimi=?, sukunimi=?, sposti=?, puhelinnumero=?, osoite=?, isAdmin=? where tunnus=?";


$stmt=mysqli_prepare($yhteys, $sql);

mysqli_stmt_bind_param($stmt, 'ssssisis', $user->salasana, $user->etunimi, $user->sukunimi, $user->sposti, $user->puhelinnumero, 
    $user->osoite, $user->isAdmin, $user->tunnus);

mysqli_stmt_execute($stmt);

mysqli_close($yhteys);
print "../php/admin.php";

?>
<?php
function tarkistaJson($json){
    if (empty($json)){
        return false;
    }
    $user=json_decode($json, false);
    if (empty($user->tunnus) || empty($user->salasana)){ /*lisää kaikki tiedot tähän*/
        return false;
    }
    return $user;
}
?>