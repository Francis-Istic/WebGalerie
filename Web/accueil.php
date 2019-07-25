<!DOCTYPE HTML>
<html>
<head>
<title> WebGalerie </title>
<meta charset="UTF-8" />
<link rel="stylesheet" href="style/test.css" />
<link rel="icon" href="favicon.ico" />
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<body>
  <header>
  <nav>
      <a href="accueil.php">Galerie Web</a>
      <a href="contentphp/galerie.php"> Oeuvres </a>
      <a href="contentphp/artistes.php"> Artistes </a>
      <a href="contentphp/ajouter.php">Ajouter Oeuvre</a>
      <?php
        session_start();
        if(isset($_SESSION['user']) && isset($_SESSION['pwd'])) {
          echo  ("<a class='active' href='account/deconnexion.php'> Deconnexion </a>");
          echo  ("<a class='active' href='account/moncompte.php'> Mon Compte </a>");
          echo  ("<a class='active' href='contentphp/mesoeuvres.php'> Mes oeuvres </a>");
        } else {
          echo ("<a class='active' href='account/seconnecter.php'> Connexion </a>");
          echo ("<a class='active' href='account/inscription.php'> Inscription </a>");
        }
       ?>
  </nav>
  </header>
</br>
    <div class="main">
      <h1 align="center"> Galerie Web </h1>
      <p align="center"> Bienvenue sur ma galerie virtuelle </p>
      <p align="center">Sur cette galerie, vous pouvez voir et commenter les oeuvres magnifiques des utilisateurs </p>
      <p align="center"> Vous pouvez aussi partagez vos prores oeuvres et les gerer a votre facon </p>
      <p align="center"> Ca vous tente ? Alors commencez par <a href="/account/inscription.php"> ici </a> </p>
      </br>
      <h3 align='center'>4 Oeuvres</h3>
      <div class="grid">
        <?php
          require('BDDConnect.php');
          $co = getConnection();
          $query ="SELECT `Nom`,`Path` FROM `oeuvre` ORDER BY `Nom` desc LIMIT 4";
          $result = $co->query($query);
          while($donnée = $result->fetch()){
            echo("<div class='case'>");
            echo("<img src=../imgs/$donnée[Path] width='150' height='150' class='miniature'>");
            echo("</br>");
            echo("<a href='contentphp/oeuvre.php?titre=$donnée[Nom]'> $donnée[Nom] </a>");
            echo("</div>");
          }
        ?>
      </div>
    </div>
</body>
</html>
