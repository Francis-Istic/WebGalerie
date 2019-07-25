<!DOCTYPE HTML>
<html>
<head>
  <title>Artiste</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="../style/test.css" />
  <link rel="icon" href="../favicon.ico"/>
  <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<body>
  <header>
  <nav>
      <a href="../accueil.php">Galerie Web</a>
      <a href="galerie.php"> Oeuvres </a>
      <a href="artistes.php"> Artistes </a>
      <a href="ajouter.php">Ajouter Oeuvre</a>
      <a href="">Informations</a>
      <?php
        session_start();
        if(isset($_SESSION['user']) && isset($_SESSION['pwd'])) {
          echo  ("<a class='active' href='../account/deconnexion.php'> Deconnexion </a>");
          echo ("<a class='active' href='../account/moncompte.php'> Mon Compte </a>");
          echo  ("<a class='active' href='mesoeuvres.php'> Mes oeuvres </a>");
        } else {
          echo ("<a class='active' href='../account/seconnecter.php'> Connexion </a>");
          echo ("<a class='active' href='../account/inscription.php'> Inscription </a>");
        }
       ?>
  </nav>
  </header>
  </br>
  <div class="main">
      <?php
        require('../BDDConnect.php');
        $co = getConnection();
        $name = $_GET["name"];
        echo ("<h1 align='center'> Profil de $name </h1>");
        echo ("<table border=1 align='center' width=60%");
        echo ("<tr>");
        echo ("<th> Nom </th>");
        echo ("<td align='center'> $name </td>");
        echo ("</tr>");
        echo ("<tr>");
        echo ("<th> Oeuvres </th>");
        echo ("<td align='center' >");
        $query = "SELECT `Nom` FROM `oeuvre` WHERE `User` = '$name'";
        $result = $co->query($query);
        while($donnée = $result->fetch()){
          echo("<li>");
          echo($donnée['Nom']);
          echo("</li>");
          echo("</br>");
        }
        echo("</td>");
        echo("</tr>");
        echo ("</table>");
       ?>
  </div>
  </body>
</html>
