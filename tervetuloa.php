<?php
session_start();
if (!isset($_SESSION["TRTKP21A3_12_users"])) {
    header("Location:./kirjaudu.html");
    exit();
}
header('Content-Type: text/html; charset=iso-8859-1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" lang="fi" xml:lang="fi">
 <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Jaakko Uusitalo">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <title>Rekisteröinti Sivu</title>

    <style>

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
                            <a class="nav-link active" aria-current="page" href="index.html">Etusivu</a>
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
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                    <a class="nav-link" href="https://hameenamk-my.sharepoint.com/:w:/g/personal/jesse21007_student_hamk_fi/ES7mcLCTZj1LksRBTsr-qyoBZL5hXFqsXNwkOe0lg7LGpw?e=50kWkK">Dokumentonti</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="kirjaudu.html">Kirjaudu sisään</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kirjauduulos.php">Kirjaudu ulos</a>
                </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Haku</button>
                </form>
            </div>
        </div>
    </nav>


<?php
print "<h1>Tervetuloa, " . $_SESSION["TRTKP21A3_12_users"] . "!</h1>";
?>
<a href='kirjauduulos.php'>Kirjaudu ulos</a>

</div></section>

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

