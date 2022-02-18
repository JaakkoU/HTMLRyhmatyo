<?php
$muokattava = isset($_GET["muokattava"]) ? $_GET["muokattava"] : 0;

if (empty($muokattava)) {
	header("Location:./admin.php");
	exit;
}
try {
	$yhteys = mysqli_connect("shell.hamk.fi", "TRTKP21A3", "gPdxmaLj", "wp_TRTKP21A3_12");
} catch (Exception $e) {
	print "ei toimi";
	exit;
}
$sql = "select * from TRTKP21A3_12_users where tunnus=?";
//valmistellaan sql-lause
$stmt = mysqli_prepare($yhteys, $sql);
//sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 's', $muokattava);
//suoritetaan sql-lause
mysqli_stmt_execute($stmt);
$tulos = mysqli_stmt_get_result($stmt);

if (!$rivi = mysqli_fetch_object($tulos)) {
	header("Location:./admin.php");
	exit;
}

?>
<script>
	function lahetaKayttaja(lomake) {
		var user = new Object();
		user.tunnus = lomake.tunnus.value;
		user.salasana = lomake.salasana.value;
		user.etunimi = lomake.etunimi.value;
		user.sukunimi = lomake.etunimi.value;
		user.sposti = lomake.sposti.value;
		user.puhelinnumero = lomake.puhelinnumero.value;
		user.osoite = lomake.osoite.value;
		var jsonUser = JSON.stringify(user);

		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//document.getElementById("result").innerHTML=this.responseText;


				if (this.responseText == "notok") {
					document.getElementById("result").innerHTML = "Täytä kaikki kentät";
				} else {
					window.location.assign(this.responseText);
				}
			}
		};
		xmlhttp.open("POST", "./paivita.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("user=" + jsonUser);
	}
</script>

<form>
	Tunnus: <input type='text' name='tunnus' value='<?php print $rivi->tunnus; ?>'><br>
	Salasana: <input type='text' name='salasana' value='<?php print $rivi->salasana; ?>'><br>
	Etunimi: <input type='text' name='etunimi' value='<?php print $rivi->etunimi; ?>'><br>
	Sukunimi: <input type='text' name='sukunimi' value='<?php print $rivi->sukunimi; ?>'><br>
	Sähköposti: <input type='text' name='sposti' value='<?php print $rivi->sposti; ?>'><br>
	Puhelinnumero: <input type='text' name='puhelinnumero' value='<?php print $rivi->puhelinnumero; ?>'><br>
	Osoite: <input type='text' name='osoite' value='<?php print $rivi->osoite; ?>'><br>
	<input type='button' name='ok' value='Lähetä' onclick='lahetaKayttaja(this.form);'>
</form>
<p id='result'> Testi </p>
<?php
mysqli_close($yhteys);

?>