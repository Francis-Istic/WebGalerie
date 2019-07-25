<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content = "text/html;charset =iso-8859-1"  />
		<link rel="stylesheet" href="../style/test.css" />
		<link rel="icon" href="../favicon.ico" />
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<title>Oeuvre</title>
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
				<?php
					$name = $_GET['titre'];
					require('../BDDConnect.php');
					$co = getConnection();
					$query ="SELECT * FROM `oeuvre` WHERE `Nom`= '$name'";
		      $result = $co->query($query);
					$donnée = $result->fetch();
					echo("<h1 align='center'> $name</h1>");
					echo("<h2 align='center'> <a href='pageperso.php?name=$donnée[User]'> $donnée[User] </a> </h2>");
					echo("<div class='real'>");
					echo("<img src=../imgs/$donnée[Path]>");
					echo("</div>");
					echo("</br>");
					echo("<div class='desc'>");
					echo($donnée['Description']);
					echo("</div>");
					echo("</br>");

					echo("<a href='menucomment?attri=$name' align='center'> Commenter </a>");

					$query ="SELECT `content`,`Username` FROM `comment` WHERE `Nom`= '$name' ORDER BY 'content' asc";
					$result = $co->query($query);
	        echo "<ol>";
	        while($donnée = $result->fetch()){
	          echo("<li>");
	          echo("<p> $donnée[Username] : $donnée[content] </p>");
	          echo("</li>");
	        }
					echo("</ol>");
				 ?>
			 </br>
	</div>
  </body>
</html>
