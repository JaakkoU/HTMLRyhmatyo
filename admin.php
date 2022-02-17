<?php
/*
session_start();
if (!isset($_SESSION["isAdmin"])){
    header("Location:../html/kirjaudu.html");
    exit;
}*/
?>




<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Jesse Rajala">
    <meta name="description" content="Store page for Peltonen skinpro 2.0 at SPORTS STORE">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <title>ADMIN</title>
    <style>
    /*Suksi_sivu.html is made by Jesse Rajala, Product page layout as well*/

    
    </style>
</head>

<body>

    

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sports<br>&nbsp;Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="index.html">Etusivu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="info.html">Tietoa meistä</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tuotteet
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="kirves_sivu.html">Fiskars Norden Kirves</a></li>
                                <li><a class="dropdown-item" href="suksi_sivu.html">Peltonen Skinpro 2.0 Sukset</a></li>
                                <li><a class="dropdown-item" href="Tuote404_sivu.html">Rex Omega Ski Sauvat</a></li>
                                <li><a class="dropdown-item" href="Tuote404_sivu.html">SportLife Isolate Maustamaton
                                        -heraproteiini</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Haku</button>
                </form>
            </div>
        </div>
    </nav>






<section>


<?php
try{
    $yhteys=mysqli_connect("db", "root", "password", "kirjakanta");
}

catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}




//Kyselyn tekeminen
$tulos=mysqli_query($yhteys, "select * from users");


//Tulostietojen tulostus
print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<li>$rivi->tunnus
               $rivi->salasana 
               $rivi->etunimi
               $rivi->sukunimi 
               $rivi->sposti 
               $rivi->puhelinnumero 
               $rivi->osoite 
               $rivi->isAdmin
               
               
               
               "."<a href='./poista.php?poistettava=$rivi->tunnus'> Poista</a>
<a href='./muokkaa.php?muokattava=$rivi->tunnus'> Muokkaa</a>";
}
print "</ol>";



mysqli_close($yhteys);
?>

</section>

        <footer>
            <div class="row">
                <div class="column"></div>
                <div class="column">
                    <h4> Ota yhteyttä: </h4>
                    <address>
                        SPORTS SHOP <br>
                        sportshop@email.com <br>
                        044 1234 567 <br>
                        Nimetöntie 1 <br>
                        123456 Tampere
                    </address>
                </div>
                <div class="column">
                    <h4>Avoinna:</h4>
                <p> <strong>Ma:</strong> 9-21<br>
                    <strong>Ti:</strong> 9-21<br>
                    <strong>Ke:</strong> 9-21<br>
                    <strong>To:</strong> 9-21<br>
                    <strong>Pe:</strong> 9-18<br>
                    <strong>La:</strong> 12-18<br>
                    <strong>Su:</strong> Suljettu
                </p>
                </div>
                <div class="column"></div>
            </div>
        </footer>

        
</body>



</html>