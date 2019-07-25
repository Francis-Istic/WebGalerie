<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../style/test.css" />
    <link rel="icon" href="../favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <title> Artistes </title>
  </head>
<body>
  <header>
    <nav>
      <a href="../accueil.php">Galerie Web</a>
      <a href="galerie.php"> Oeuvres </a>
      <a href="artistes.php"> Artistes </a>
      <a href="ajouter.php">Ajouter Oeuvre</a>
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
      <div class="searchbar">
        <form action="searchartiste.php" method="post" align="center">
          <input type="text" name="text"/>
          <input type="submit" value="Chercher" />
        </form>
      </div>
      <?php
        //Recupère la liste des artistes et l'affiche avec un while
        require('../BDDConnect.php');
  		  $co = getConnection();
        $query ="SELECT `Username` FROM `user` ORDER BY `Username` asc";
        $result = $co->query($query);
        echo "<ul>";
        while($donnée = $result->fetch()){
          echo("<li>");
          echo("<a href='pageperso.php?name=$donnée[Username]'> $donnée[Username] </a>");
          echo("</li>");
        }
        echo "</ul>";
      ?>
  </div>
  </body>
</html>
