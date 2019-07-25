  <!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="../style/test.css" />
  <link rel="icon" href="../favicon.ico" />
  <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
  <title>Mon Compte</title>
</head>
<body>
  <header>
    <nav>
      <a href="../accueil.php">Galerie Web</a>
      <a href="../contentphp/galerie.php"> Oeuvres </a>
      <a href="../contentphp/artistes.php"> Artistes </a>
      <a href="../contentphp/ajouter.php">Ajouter Oeuvre</a>
      <a class='active' href='deconnexion.php'> Deconnexion </a>
      <a class='active' href='moncompte.php'> Mon Compte </a>
      <a class='active' href='../contentphp/mesoeuvres.php'> Mes oeuvres </a>
    </nav>
  </header>
</br>
<div class="main">
    <h1 align="center"> Mon Compte</h1>
    </br>
    <table border=1 align="center">
      <?php
        session_start();
        if($_SESSION['CONNECTE'] !== "true") {
          header("Location: login.php");
          exit();
          } else {
            //Script qui récupre les infos de l'utilisateur et les affiche grace aux requetes SQL
            $name = " '" . $_SESSION['user'] . "' " ;
            require("../BDDConnect.php");
            $co = getConnection();
            $query ="SELECT * FROM `user` WHERE Username=$name ";
            $result = $co->query($query);
            $donnée = $result->fetch();
            echo "<tr>";
            echo "<th> Nom </th>";
            echo "<td> $donnée[Username] </td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th> Mot de Passe </th>";
            echo "<td>$donnée[Password]</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th> Mail </th>";
            echo "<td> $donnée[email] </td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th> Date de Naissance </th>";
            echo "<td> $donnée[Birth] </td>";
            echo "</tr>";
          }
      ?>
     </table>
   </br>
  </div>
  </body>
</html>
